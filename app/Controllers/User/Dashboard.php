<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;

use App\Models\PesertaModel;
use App\Models\AbsensiModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $this->generateAbsensiHarian();
        $userId = session()->get('user_id');

        $pesertaModel = new PesertaModel();

        $absensiModel = new AbsensiModel();

        /*
        |--------------------------------------------------------------------------
        | DATA USER
        |--------------------------------------------------------------------------
        */

        $user = $pesertaModel
            ->select('
                peserta.*,
                users.nama,
                users.username,
                users.foto,
                users.role
            ')
            ->join(
                'users',
                'users.id = peserta.user_id'
            )
            ->where(
                'peserta.user_id',
                $userId
            )
            ->first();

        /*
        |--------------------------------------------------------------------------
        | TANGGAL HARI INI
        |--------------------------------------------------------------------------
        */

        $today = date('Y-m-d');

        /*
        |--------------------------------------------------------------------------
        | ABSENSI HARI INI
        |--------------------------------------------------------------------------
        */

        $todayAbsensi = $absensiModel
            ->where('peserta_id', $user['id'])
            ->where('tanggal', $today)
            ->first();

        /*
        |--------------------------------------------------------------------------
        | DEFAULT STATUS
        |--------------------------------------------------------------------------
        */

        $statusHariIni = 'Belum Hadir';

        /*
        |--------------------------------------------------------------------------
        | JIKA SUDAH ABSEN
        |--------------------------------------------------------------------------
        */

        if ($todayAbsensi) {

            $statusHariIni = $todayAbsensi['status'];
        }

        /*
        |--------------------------------------------------------------------------
        | RIWAYAT TERAKHIR
        |--------------------------------------------------------------------------
        */

        $riwayat = $absensiModel
            ->where('peserta_id', $user['id'])
            ->orderBy('tanggal', 'DESC')
            ->findAll(5);

        /*
        |--------------------------------------------------------------------------
        | DATA VIEW
        |--------------------------------------------------------------------------
        */

        $data = [

            'title' => 'Dashboard User',

            'user' => $user,

            'todayAbsensi' => $todayAbsensi,

            'riwayat' => $riwayat,

            'statusHariIni' => $statusHariIni

        ];

        return view(
            'user/dashboard/index',
            $data
        );
    }
}