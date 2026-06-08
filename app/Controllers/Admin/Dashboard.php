<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\AbsensiModel;
use App\Models\IzinModel;
use App\Models\UserModel;
use App\Models\PesertaModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $absensiModel = new AbsensiModel();
        $izinModel    = new IzinModel();
        $userModel    = new UserModel();
        $pesertaModel = new PesertaModel();

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
        | ALPHA
        |--------------------------------------------------------------------------
        */

        $alpha = $absensiModel
            ->where('tanggal', $today)
            ->where('status', 'alpha')
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
        | PENDING IZIN
        |--------------------------------------------------------------------------
        */

        $pendingIzin = $izinModel
            ->where('status', 'pending')
            ->countAllResults();

        /*
        |--------------------------------------------------------------------------
        | TOTAL PESERTA
        |--------------------------------------------------------------------------
        */

        $totalPeserta = $userModel
            ->where('role', 'anggota')
            ->countAllResults();

        /*
        |--------------------------------------------------------------------------
        | AKTIVITAS TERBARU ABSENSI
        |--------------------------------------------------------------------------
        */

        $aktivitas = $absensiModel
            ->select('absensi.*, peserta.nama_lengkap, peserta.foto_profile')
            ->join('peserta', 'peserta.id = absensi.peserta_id')
            ->orderBy('absensi.created_at', 'DESC')
            ->limit(5)
            ->findAll();

        /*
        |--------------------------------------------------------------------------
        | DATA VIEW
        |--------------------------------------------------------------------------
        */

        $data = [

            'title' => 'Dashboard',

            'hadir' => $hadir,
            'telat' => $telat,
            'alpha' => $alpha,
            'izin'  => $izin,
            'sakit' => $sakit,

            'pendingIzin' => $pendingIzin,

            'totalPeserta' => $totalPeserta,

            'aktivitas' => $aktivitas

        ];

        return view(
            'admin/dashboard/index',
            $data
        );
    }
}