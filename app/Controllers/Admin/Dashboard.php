<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\AbsensiModel;
use App\Models\IzinModel;
use App\Models\UserModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $absensiModel = new AbsensiModel();
        $izinModel    = new IzinModel();
        $userModel    = new UserModel();

        $today = date('Y-m-d');

        /*
        |--------------------------------------------------------------------------
        | HADIR
        |--------------------------------------------------------------------------
        */

        $hadir = $absensiModel
            ->where('tanggal', $today)
            ->whereIn('status', ['hadir', 'telat'])
            ->countAllResults();

        /*
        |--------------------------------------------------------------------------
        | TELAT
        |--------------------------------------------------------------------------
        */

        $telat = $absensiModel
            ->where('tanggal', $today)
            ->where('status', 'telat')
            ->countAllResults();

        /*
        |--------------------------------------------------------------------------
        | IZIN
        |--------------------------------------------------------------------------
        */

        $izin = $izinModel
            ->where('status', 'disetujui')
            ->where('jenis', 'izin')
            ->countAllResults();

        /*
        |--------------------------------------------------------------------------
        | SAKIT
        |--------------------------------------------------------------------------
        */

        $sakit = $izinModel
            ->where('status', 'disetujui')
            ->where('jenis', 'sakit')
            ->countAllResults();

        /*
        |--------------------------------------------------------------------------
        | TOTAL PESERTA
        |--------------------------------------------------------------------------
        */

        $totalPeserta = $userModel
            ->where('role', 'anggota')
            ->countAllResults();

        $data = [

            'title' => 'Dashboard',

            'hadir' => $hadir,
            'telat' => $telat,
            'izin'  => $izin,
            'sakit' => $sakit,

            'totalPeserta' => $totalPeserta

        ];

        return view(
            'admin/dashboard/index',
            $data
        );
    }
}