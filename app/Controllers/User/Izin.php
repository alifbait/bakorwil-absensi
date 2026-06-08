<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

use App\Models\IzinModel;
use App\Models\PesertaModel;

class Izin extends BaseController
{
    protected $izinModel;

    protected $pesertaModel;

    public function __construct()
    {
        $this->izinModel = new IzinModel();

        $this->pesertaModel = new PesertaModel();
    }

    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */

    public function index()
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

        /*
        |--------------------------------------------------------------------------
        | FILTER STATUS
        |--------------------------------------------------------------------------
        */

        $filter = $this->request->getGet('status');

        $query = $this->izinModel
            ->where(
                'peserta_id',
                $peserta['id']
            );

        if ($filter && $filter != 'semua') {

            $query->where(
                'status',
                $filter
            );
        }

        /*
        |--------------------------------------------------------------------------
        | DATA IZIN
        |--------------------------------------------------------------------------
        */

        $izin = $query
            ->orderBy('created_at', 'DESC')
            ->findAll();

        /*
        |--------------------------------------------------------------------------
        | TOTAL
        |--------------------------------------------------------------------------
        */

        $total = $this->izinModel
            ->where(
                'peserta_id',
                $peserta['id']
            )
            ->countAllResults();

        $pending = $this->izinModel
            ->where(
                'peserta_id',
                $peserta['id']
            )
            ->where(
                'status',
                'pending'
            )
            ->countAllResults();

        $approved = $this->izinModel
            ->where(
                'peserta_id',
                $peserta['id']
            )
            ->where(
                'status',
                'disetujui'
            )
            ->countAllResults();

        $rejected = $this->izinModel
            ->where(
                'peserta_id',
                $peserta['id']
            )
            ->where(
                'status',
                'ditolak'
            )
            ->countAllResults();

        /*
        |--------------------------------------------------------------------------
        | VIEW
        |--------------------------------------------------------------------------
        */

        return view('user/izin/index', [

            'title' => 'Status Izin',

            'izin' => $izin,

            'total' => $total,

            'pending' => $pending,

            'approved' => $approved,

            'rejected' => $rejected,

            'filter' => $filter

        ]);
    }
    /*
    |--------------------------------------------------------------------------
    | DETAIL IZIN
    |--------------------------------------------------------------------------
    */

    public function detail($id)
    {
        /*
        |--------------------------------------------------------------------------
        | MODEL
        |--------------------------------------------------------------------------
        */

        $izinModel = new \App\Models\IzinModel();

        $pesertaModel = new \App\Models\PesertaModel();

        /*
        |--------------------------------------------------------------------------
        | USER LOGIN
        |--------------------------------------------------------------------------
        */

        $userId = session()->get('user_id');

        /*
        |--------------------------------------------------------------------------
        | DATA PESERTA
        |--------------------------------------------------------------------------
        */

        $peserta = $pesertaModel
            ->where('user_id', $userId)
            ->first();

        if (!$peserta) {

            return redirect()->to('/dashboard');

        }

        /*
        |--------------------------------------------------------------------------
        | DATA IZIN
        |--------------------------------------------------------------------------
        */

        $izin = $izinModel
            ->where('id', $id)
            ->where('peserta_id', $peserta['id'])
            ->first();

        /*
        |--------------------------------------------------------------------------
        | DATA TIDAK DITEMUKAN
        |--------------------------------------------------------------------------
        */

        if (!$izin) {

            return redirect()->to('/izin')
                ->with(
                    'error',
                    'Data izin tidak ditemukan'
                );

        }

        /*
        |--------------------------------------------------------------------------
        | VIEW
        |--------------------------------------------------------------------------
        */

        $data = [

            'title' => 'Detail Izin',

            'izin' => $izin

        ];

        return view(
            'user/izin/detail',
            $data
        );
    }

    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        return view('user/izin/create', [

            'title' => 'Tambah Izin'

        ]);
    }
    /*
|--------------------------------------------------------------------------
| PREVIEW
|--------------------------------------------------------------------------
*/

    public function preview()
    {
        $session = session();

        /*
        |--------------------------------------------------------------------------
        | VALIDASI
        |--------------------------------------------------------------------------
        */

        $rules = [

            'jenis' => 'required|in_list[izin,sakit]',

            'tanggal_mulai' => 'required',

            'tanggal_selesai' => 'required',

            'alasan' => 'required|min_length[5]',

            'file_pendukung' => [

                'rules' => 'max_size[file_pendukung,3072]|ext_in[file_pendukung,png,jpg,jpeg,pdf]',

            ]

        ];

        if (!$this->validate($rules)) {

            return redirect()->back()
                ->withInput()
                ->with(
                    'error',
                    implode(
                        '<br>',
                        $this->validator->getErrors()
                    )
                );
        }

        /*
        |--------------------------------------------------------------------------
        | DATA
        |--------------------------------------------------------------------------
        */

        $jenis = $this->request->getPost('jenis');

        $tanggalMulai = $this->request->getPost('tanggal_mulai');

        $tanggalSelesai = $this->request->getPost('tanggal_selesai');

        $alasan = $this->request->getPost('alasan');

        /*
        |--------------------------------------------------------------------------
        | VALIDASI TANGGAL
        |--------------------------------------------------------------------------
        */

        if ($tanggalSelesai < $tanggalMulai) {

            return redirect()->back()
                ->withInput()
                ->with(
                    'error',
                    'Tanggal selesai tidak boleh kurang dari tanggal mulai'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | FILE
        |--------------------------------------------------------------------------
        */

        $uploadedFile = $this->request->getFile('file_pendukung');

        $tempFile = null;

        /*
        |--------------------------------------------------------------------------
        | SAKIT WAJIB FILE
        |--------------------------------------------------------------------------
        */

        if ($jenis == 'sakit' && !$uploadedFile->isValid()) {

            return redirect()->back()
                ->withInput()
                ->with(
                    'error',
                    'File pendukung wajib untuk pengajuan sakit'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | SIMPAN TEMP FILE
        |--------------------------------------------------------------------------
        */

        if ($uploadedFile && $uploadedFile->isValid()) {

            $tempName =
                'temp_' .
                time() .
                '_' .
                $uploadedFile->getRandomName();

            $folder = WRITEPATH . 'uploads/temp/';

            if (!is_dir($folder)) {

                mkdir($folder, 0777, true);
            }

            $uploadedFile->move(
                $folder,
                $tempName
            );

            $tempFile = $tempName;
        }

        /*
        |--------------------------------------------------------------------------
        | HITUNG DURASI
        |--------------------------------------------------------------------------
        */

        $mulai = strtotime($tanggalMulai);

        $selesai = strtotime($tanggalSelesai);

        $durasi = (($selesai - $mulai) / 86400) + 1;

        /*
        |--------------------------------------------------------------------------
        | SESSION PREVIEW
        |--------------------------------------------------------------------------
        */

        $session->set('preview_izin', [

            'jenis' => $jenis,

            'tanggal_mulai' => $tanggalMulai,

            'tanggal_selesai' => $tanggalSelesai,

            'alasan' => $alasan,

            'file_pendukung' => $tempFile

        ]);

        /*
        |--------------------------------------------------------------------------
        | VIEW
        |--------------------------------------------------------------------------
        */

        return view('user/izin/preview', [

            'title' => 'Preview Pengajuan',

            'preview' => $session->get('preview_izin'),

            'durasi' => $durasi

        ]);
    }

    /*
|--------------------------------------------------------------------------
| STORE
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

        $preview = $session->get('preview_izin');

        if (!$preview) {

            return redirect()->to('/izin/create');
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
        | FILE FINAL
        |--------------------------------------------------------------------------
        */

        $finalFile = null;

        if ($preview['file_pendukung']) {

            $tempPath =
                WRITEPATH .
                'uploads/temp/' .
                $preview['file_pendukung'];

            $finalFolder =
                FCPATH .
                'uploads/izin/';

            if (!is_dir($finalFolder)) {

                mkdir($finalFolder, 0777, true);
            }

            $finalFile =
                'izin_' .
                time() .
                '_' .
                $preview['file_pendukung'];

            if (file_exists($tempPath)) {

                rename(
                    $tempPath,
                    $finalFolder . $finalFile
                );
            }
        }

        /*
        |--------------------------------------------------------------------------
        | INSERT DATABASE
        |--------------------------------------------------------------------------
        */

        $this->izinModel->insert([

            'peserta_id' => $peserta['id'],

            'jenis' => $preview['jenis'],

            'tanggal_mulai' => $preview['tanggal_mulai'],

            'tanggal_selesai' => $preview['tanggal_selesai'],

            'alasan' => $preview['alasan'],

            'file_pendukung' => $finalFile,

            'status' => 'pending'

        ]);

        /*
        |--------------------------------------------------------------------------
        | INSERT ID
        |--------------------------------------------------------------------------
        */

        $insertId = $this->izinModel->getInsertID();

        /*
        |--------------------------------------------------------------------------
        | HAPUS SESSION
        |--------------------------------------------------------------------------
        */

        $session->remove('preview_izin');

        /*
        |--------------------------------------------------------------------------
        | REDIRECT
        |--------------------------------------------------------------------------
        */

        return redirect()->to('/izin/success/' . $insertId);
    }
    /*
    |--------------------------------------------------------------------------
    | SUCCESS
    |--------------------------------------------------------------------------
    */

    public function success($id = null)
    {
        /*
        |--------------------------------------------------------------------------
        | VALIDASI ID
        |--------------------------------------------------------------------------
        */

        if (!$id) {

            return redirect()->to('/izin');
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
        | DATA IZIN
        |--------------------------------------------------------------------------
        */

        $izin = $this->izinModel

            ->where(
                'id',
                $id
            )

            ->where(
                'peserta_id',
                $peserta['id']
            )

            ->first();

        /*
        |--------------------------------------------------------------------------
        | VALIDASI DATA
        |--------------------------------------------------------------------------
        */

        if (!$izin) {

            return redirect()->to('/izin')
                ->with(
                    'error',
                    'Data pengajuan tidak ditemukan'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | VIEW
        |--------------------------------------------------------------------------
        */

        return view('user/izin/success', [

            'title' => 'Pengajuan Berhasil',

            'izin' => $izin

        ]);
    }
}