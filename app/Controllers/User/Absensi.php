<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\AbsensiModel;
use App\Models\SettingModel;


class Absensi extends BaseController
{

    protected $absensiModel;
    protected $settingModel;

    public function __construct()
    {
        $this->absensiModel = new AbsensiModel();
        $this->settingModel = new SettingModel();
    }

    /*
    |--------------------------------------------------------------------------
    | PAGE ABSEN MASUK
    |--------------------------------------------------------------------------
    */

    public function masuk()
    {
        /*
        |--------------------------------------------------------------------------
        | GET DATA PESERTA
        |--------------------------------------------------------------------------
        */

        $pesertaModel = new \App\Models\PesertaModel();

        $absensiModel = new \App\Models\AbsensiModel();

        $peserta = $pesertaModel
            ->where(
                'user_id',
                session()->get('user_id')
            )
            ->first();

        /*
        |--------------------------------------------------------------------------
        | CEK ABSENSI HARI INI
        |--------------------------------------------------------------------------
        */

        $today = date('Y-m-d');

        $existing = $absensiModel
            ->where('peserta_id', $peserta['id'])
            ->where('tanggal', $today)
            ->first();

        /*
        |--------------------------------------------------------------------------
        | JIKA SUDAH ABSEN
        |--------------------------------------------------------------------------
        */

        if ($existing) {

            return redirect()->to('/absensi/success');

        }

        /*
        |--------------------------------------------------------------------------
        | GET SETTING
        |--------------------------------------------------------------------------
        */

        $setting = $this->settingModel->first();

        /*
        |--------------------------------------------------------------------------
        | RETURN VIEW
        |--------------------------------------------------------------------------
        */

        return view('user/absensi/masuk', [

            'title' => 'Absen Masuk',

            'setting' => $setting

        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | PREVIEW ABSENSI
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
        | VALIDASI DASAR
        |--------------------------------------------------------------------------
        */

        if (!$selfie || !$latitude || !$longitude) {

            return redirect()->back()->with(
                'error',
                'Data absensi tidak lengkap'
            );
        }

        /*
        |--------------------------------------------------------------------------
        | WAKTU SERVER SEKALI SAJA
        |--------------------------------------------------------------------------
        */

        $jamServer = date('H:i:s');

        $tanggalServer = date('Y-m-d');

        /*
        |--------------------------------------------------------------------------
        | SIMPAN SESSION PREVIEW
        |--------------------------------------------------------------------------
        */

        $session->set('preview_absensi', [

            'selfie' => $selfie,

            'latitude' => $latitude,

            'longitude' => $longitude,

            'jam' => $jamServer,

            'tanggal' => $tanggalServer

        ]);

        /*
        |--------------------------------------------------------------------------
        | MODEL
        |--------------------------------------------------------------------------
        */

        $absensiModel = new \App\Models\AbsensiModel();

        $pesertaModel = new \App\Models\PesertaModel();

        /*
        |--------------------------------------------------------------------------
        | DATA PESERTA
        |--------------------------------------------------------------------------
        */

        $peserta = $pesertaModel
            ->where(
                'user_id',
                session()->get('user_id')
            )
            ->first();

        /*
        |--------------------------------------------------------------------------
        | CEK ABSENSI HARI INI
        |--------------------------------------------------------------------------
        */

        $existing = $absensiModel

            ->where(
                'peserta_id',
                $peserta['id']
            )

            ->where(
                'tanggal',
                $tanggalServer
            )

            ->first();

        /*
        |--------------------------------------------------------------------------
        | STATUS KEHADIRAN
        |--------------------------------------------------------------------------
        */

        $statusKehadiran = 'Belum Hadir';

        if ($existing) {

            $statusKehadiran =
                ucfirst($existing['status'] ?? 'Belum Hadir');
        }

        /*
        |--------------------------------------------------------------------------
        | BADGE STATUS
        |--------------------------------------------------------------------------
        */

        $statusBadge =
            'bg-slate-100 text-slate-700';

        if ($statusKehadiran == 'Hadir') {

            $statusBadge =
                'bg-green-100 text-green-700';

        } elseif ($statusKehadiran == 'Telat') {

            $statusBadge =
                'bg-yellow-100 text-yellow-700';

        } elseif ($statusKehadiran == 'Izin') {

            $statusBadge =
                'bg-blue-100 text-blue-700';

        } elseif ($statusKehadiran == 'Sakit') {

            $statusBadge =
                'bg-red-100 text-red-700';
        }

        /*
        |--------------------------------------------------------------------------
        | DATA VIEW
        |--------------------------------------------------------------------------
        */

        $data = [

            'title' => 'Preview Absensi',

            'selfie' => $selfie,

            'jam' => $jamServer,

            'tanggal' => date(
                'd F Y',
                strtotime($tanggalServer)
            ),

            'statusGps' => 'Dalam Radius',

            'statusKehadiran' => $statusKehadiran,

            'statusBadge' => $statusBadge,  

            'server_time' => time(),

        ];

        /*
        |--------------------------------------------------------------------------
        | VIEW
        |--------------------------------------------------------------------------
        */

        return view(
            'user/absensi/preview',
            $data
        );
    }

    /*
    |--------------------------------------------------------------------------
    | STORE ABSENSI
    |--------------------------------------------------------------------------
    */

    public function store()
    {
        $session = session();

        /*
        |--------------------------------------------------------------------------
        | AMBIL DATA SESSION PREVIEW
        |--------------------------------------------------------------------------
        */

        $preview = $session->get('preview_absensi');

        if (!$preview) {

            return redirect()->to('/absensi/masuk')
                ->with('error', 'Data preview tidak ditemukan');

        }

        /*
        |--------------------------------------------------------------------------
        | AMBIL DATA PESERTA
        |--------------------------------------------------------------------------
        */

        $pesertaModel = new \App\Models\PesertaModel();

        $peserta = $pesertaModel
            ->where(
                'user_id',
                session()->get('user_id')
            )
            ->first();

        if (!$peserta) {

            return redirect()->to('/dashboard')
                ->with('error', 'Data peserta tidak ditemukan');

        }

        /*
        |--------------------------------------------------------------------------
        | CEK SUDAH ABSEN ATAU BELUM
        |--------------------------------------------------------------------------
        */

        $absensiModel = new \App\Models\AbsensiModel();

        $today = date('Y-m-d');

        $existing = $absensiModel
            ->where('peserta_id', $peserta['id'])
            ->where('tanggal', $today)
            ->first();

        if ($existing) {

            return redirect()->to('/dashboard')
                ->with('error', 'Anda sudah melakukan absensi hari ini');

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

        $image_parts = explode(";base64,", $preview['selfie']);

        $image_base64 = base64_decode($image_parts[1]);

        $fileName = 'selfie_' . time() . '.png';

        $filePath = $folderPath . $fileName;

        file_put_contents($filePath, $image_base64);

        /*
        |--------------------------------------------------------------------------
        | SIMPAN ABSENSI
        |--------------------------------------------------------------------------
        */

        $absensiModel->insert([

            'peserta_id' => $peserta['id'],

            'tanggal' => $preview['tanggal'],

            'jam_masuk' => $preview['jam'],

            'latitude_masuk' => $preview['latitude'],

            'longitude_masuk' => $preview['longitude'],

            'selfie_masuk' => $fileName,

            'status' => 'hadir'

        ]);

        /*
        |--------------------------------------------------------------------------
        | HAPUS SESSION PREVIEW
        |--------------------------------------------------------------------------
        */

        $session->remove('preview_absensi');

        /*
        |--------------------------------------------------------------------------
        | REDIRECT SURVEY
        |--------------------------------------------------------------------------
        */

        return redirect()->to('/absensi/success');
    }

    /*
    |--------------------------------------------------------------------------
    | SUCCESS PAGE
    |--------------------------------------------------------------------------
    */

    public function success()
    {
        $pesertaModel = new \App\Models\PesertaModel();

        $absensiModel = new \App\Models\AbsensiModel();

        /*
        |--------------------------------------------------------------------------
        | DATA PESERTA
        |--------------------------------------------------------------------------
        */

        $peserta = $pesertaModel
            ->where(
                'user_id',
                session()->get('user_id')
            )
            ->first();

        /*
        |--------------------------------------------------------------------------
        | ABSENSI HARI INI
        |--------------------------------------------------------------------------
        */

        $today = date('Y-m-d');

        $absensi = $absensiModel
            ->where('peserta_id', $peserta['id'])
            ->where('tanggal', $today)
            ->first();

        if (!$absensi) {

            return redirect()->to('/dashboard');

        }

        $data = [

            'title' => 'Absensi Berhasil',

            'absensi' => $absensi

        ];

        return view(
            'user/absensi/success',
            $data
        );
    }
}