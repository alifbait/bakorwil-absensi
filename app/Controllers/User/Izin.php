<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\PesertaModel;
use App\Models\IzinModel;

class Izin extends BaseController
{
    protected $pesertaModel;

    protected $izinModel;

    public function __construct()
    {
        $this->pesertaModel = new PesertaModel();

        $this->izinModel = new IzinModel();
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
        | USER LOGIN
        |--------------------------------------------------------------------------
        */

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

            return redirect()->to('/dashboard')
                ->with('error', 'Data peserta tidak ditemukan');
        }

        /*
        |--------------------------------------------------------------------------
        | DATA IZIN
        |--------------------------------------------------------------------------
        */

        $izin = $this->izinModel

            ->where('peserta_id', $peserta['id'])

            ->orderBy('created_at', 'DESC')

            ->findAll();

        /*
        |--------------------------------------------------------------------------
        | COUNT STATUS
        |--------------------------------------------------------------------------
        */

        $total = count($izin);

        $pending = $this->izinModel

            ->where('peserta_id', $peserta['id'])

            ->where('status', 'pending')

            ->countAllResults();

        $approved = $this->izinModel

            ->where('peserta_id', $peserta['id'])

            ->where('status', 'disetujui')

            ->countAllResults();

        $rejected = $this->izinModel

            ->where('peserta_id', $peserta['id'])

            ->where('status', 'ditolak')

            ->countAllResults();

        /*
        |--------------------------------------------------------------------------
        | FORMAT DURASI
        |--------------------------------------------------------------------------
        */

        foreach ($izin as &$item) {

            $mulai = strtotime($item['tanggal_mulai']);

            $selesai = strtotime($item['tanggal_selesai']);

            $durasi = (($selesai - $mulai) / 86400) + 1;

            $item['durasi_hari'] = $durasi;
        }

        /*
        |--------------------------------------------------------------------------
        | VIEW
        |--------------------------------------------------------------------------
        */

        $data = [

            'title' => 'Status Izin',

            'izin' => $izin,

            'total' => $total,

            'pending' => $pending,

            'approved' => $approved,

            'rejected' => $rejected

        ];

        return view(
            'user/izin/index',
            $data
        );
    }
}