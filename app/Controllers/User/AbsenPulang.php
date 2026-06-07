<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\AbsensiModel;
use App\Models\PesertaModel;

class AbsenPulang extends BaseController
{
    protected $absensiModel;

    protected $pesertaModel;

    public function __construct()
    {
        $this->absensiModel = new AbsensiModel();

        $this->pesertaModel = new PesertaModel();
    }

    /*
    |--------------------------------------------------------------------------
    | PAGE ABSEN PULANG
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $userId = session()->get('user_id');

        /*
        |--------------------------------------------------------------------------
        | DATA PESERTA
        |--------------------------------------------------------------------------
        */

        $peserta = $this->pesertaModel
            ->where('user_id', $userId)
            ->first();

        if (!$peserta) {

            return redirect()->to('/dashboard');

        }

        /*
        |--------------------------------------------------------------------------
        | ABSENSI HARI INI
        |--------------------------------------------------------------------------
        */

        $today = date('Y-m-d');

        $absensi = $this->absensiModel
            ->where('peserta_id', $peserta['id'])
            ->where('tanggal', $today)
            ->first();

        /*
        |--------------------------------------------------------------------------
        | BELUM ABSEN MASUK
        |--------------------------------------------------------------------------
        */

        if (!$absensi) {

            return redirect()->to('/dashboard')
                ->with(
                    'error',
                    'Anda belum melakukan absen masuk'
                );

        }

        /*
        |--------------------------------------------------------------------------
        | SUDAH ABSEN PULANG
        |--------------------------------------------------------------------------
        */

        if ($absensi['jam_pulang']) {

            return redirect()->to('/absen-pulang/success');

        }

        /*
        |--------------------------------------------------------------------------
        | TOTAL JAM SEMENTARA
        |--------------------------------------------------------------------------
        */

        $jamMasuk = strtotime($absensi['jam_masuk']);

        $jamSekarang = strtotime(date('H:i:s'));

        $selisih = $jamSekarang - $jamMasuk;

        $jamKerja = floor($selisih / 3600);

        /*
        |--------------------------------------------------------------------------
        | DATA VIEW
        |--------------------------------------------------------------------------
        */

        $data = [

            'title' => 'Absen Pulang',

            'absensi' => $absensi,

            'jamKerja' => $jamKerja,

            'server_time' => time()

        ];

        return view(
            'user/absen_pulang/index',
            $data
        );
    }

    /*
    |--------------------------------------------------------------------------
    | PREVIEW ABSEN PULANG
    |--------------------------------------------------------------------------
    */

    public function preview()
    {
        $session = session();

        /*
        |--------------------------------------------------------------------------
        | AMBIL DATA
        |--------------------------------------------------------------------------
        */

        $selfie = $this->request->getPost('selfie');

        $latitude = $this->request->getPost('latitude');

        $longitude = $this->request->getPost('longitude');

        /*
        |--------------------------------------------------------------------------
        | VALIDASI
        |--------------------------------------------------------------------------
        */

        if (!$selfie || !$latitude || !$longitude) {

            return redirect()->back()
                ->with(
                    'error',
                    'Data absensi tidak lengkap'
                );

        }

        /*
        |--------------------------------------------------------------------------
        | DATA PESERTA
        |--------------------------------------------------------------------------
        */

        $peserta = $this->pesertaModel
            ->where(
                'user_id',
                session()->get('user_id')
            )
            ->first();

        if (!$peserta) {

            return redirect()->to('/dashboard');

        }

        /*
        |--------------------------------------------------------------------------
        | ABSENSI HARI INI
        |--------------------------------------------------------------------------
        */

        $today = date('Y-m-d');

        $absensi = $this->absensiModel
            ->where('peserta_id', $peserta['id'])
            ->where('tanggal', $today)
            ->first();

        if (!$absensi) {

            return redirect()->to('/dashboard');

        }

        /*
        |--------------------------------------------------------------------------
        | WAKTU SERVER
        |--------------------------------------------------------------------------
        */

        $jamServer = date('H:i:s');

        $tanggalServer = date('Y-m-d');

        /*
        |--------------------------------------------------------------------------
        | HITUNG TOTAL JAM
        |--------------------------------------------------------------------------
        */

        $jamMasuk = strtotime($absensi['jam_masuk']);

        $jamPulang = strtotime($jamServer);

        $totalDetik = $jamPulang - $jamMasuk;

        $totalJam = round($totalDetik / 3600, 2);

        /*
        |--------------------------------------------------------------------------
        | SIMPAN SESSION PREVIEW
        |--------------------------------------------------------------------------
        */

        $session->set('preview_pulang', [

            'selfie' => $selfie,

            'latitude' => $latitude,

            'longitude' => $longitude,

            'jam' => $jamServer,

            'tanggal' => $tanggalServer,

            'total_jam' => $totalJam

        ]);

        /*
        |--------------------------------------------------------------------------
        | DATA VIEW
        |--------------------------------------------------------------------------
        */

        $data = [

            'title' => 'Preview Absen Pulang',

            'selfie' => $selfie,

            'totalJam' => $totalJam,

            'statusGps' => 'Dalam Radius',

            'server_time' => time()

        ];

        return view(
            'user/absen_pulang/preview',
            $data
        );
    }

    /*
    |--------------------------------------------------------------------------
    | STORE ABSEN PULANG
    |--------------------------------------------------------------------------
    */

    public function store()
    {
        $session = session();

        /*
        |--------------------------------------------------------------------------
        | SESSION PREVIEW
        |--------------------------------------------------------------------------
        */

        $preview = $session->get('preview_pulang');

        if (!$preview) {

            return redirect()->to('/absen-pulang');

        }

        /*
        |--------------------------------------------------------------------------
        | DATA PESERTA
        |--------------------------------------------------------------------------
        */

        $peserta = $this->pesertaModel
            ->where(
                'user_id',
                session()->get('user_id')
            )
            ->first();

        if (!$peserta) {

            return redirect()->to('/dashboard');

        }

        /*
        |--------------------------------------------------------------------------
        | ABSENSI HARI INI
        |--------------------------------------------------------------------------
        */

        $today = date('Y-m-d');

        $absensi = $this->absensiModel
            ->where('peserta_id', $peserta['id'])
            ->where('tanggal', $today)
            ->first();

        if (!$absensi) {

            return redirect()->to('/dashboard');

        }

        /*
        |--------------------------------------------------------------------------
        | SUDAH ABSEN PULANG
        |--------------------------------------------------------------------------
        */

        if ($absensi['jam_pulang']) {

            return redirect()->to('/absen-pulang/success');

        }

        /*
        |--------------------------------------------------------------------------
        | SIMPAN FOTO
        |--------------------------------------------------------------------------
        */

        $folderPath = FCPATH . 'uploads/selfie/';

        if (!is_dir($folderPath)) {

            mkdir($folderPath, 0777, true);

        }

        $image_parts = explode(
            ";base64,",
            $preview['selfie']
        );

        $image_base64 = base64_decode(
            $image_parts[1]
        );

        $fileName =
            'selfie_pulang_' . time() . '.png';

        $filePath =
            $folderPath . $fileName;

        file_put_contents(
            $filePath,
            $image_base64
        );

        /*
        |--------------------------------------------------------------------------
        | UPDATE ABSENSI
        |--------------------------------------------------------------------------
        */

        $this->absensiModel
            ->update($absensi['id'], [

                'jam_pulang' => $preview['jam'],

                'latitude_pulang' => $preview['latitude'],

                'longitude_pulang' => $preview['longitude'],

                'selfie_pulang' => $fileName,

                'total_jam_kerja' => $preview['total_jam']

            ]);

        /*
        |--------------------------------------------------------------------------
        | HAPUS SESSION
        |--------------------------------------------------------------------------
        */

        $session->remove('preview_pulang');

        /*
        |--------------------------------------------------------------------------
        | REDIRECT
        |--------------------------------------------------------------------------
        */

        return redirect()->to('/absen-pulang/success');
    }

    /*
    |--------------------------------------------------------------------------
    | SUCCESS PAGE
    |--------------------------------------------------------------------------
    */

    public function success()
    {
        /*
        |--------------------------------------------------------------------------
        | DATA PESERTA
        |--------------------------------------------------------------------------
        */

        $peserta = $this->pesertaModel
            ->where(
                'user_id',
                session()->get('user_id')
            )
            ->first();

        if (!$peserta) {

            return redirect()->to('/dashboard');

        }

        /*
        |--------------------------------------------------------------------------
        | ABSENSI HARI INI
        |--------------------------------------------------------------------------
        */

        $today = date('Y-m-d');

        $absensi = $this->absensiModel
            ->where('peserta_id', $peserta['id'])
            ->where('tanggal', $today)
            ->first();

        if (!$absensi) {

            return redirect()->to('/dashboard');

        }

        /*
        |--------------------------------------------------------------------------
        | DATA VIEW
        |--------------------------------------------------------------------------
        */

        $data = [

            'title' => 'Absen Pulang Berhasil',

            'absensi' => $absensi

        ];

        return view(
            'user/absen_pulang/success',
            $data
        );
    }
}