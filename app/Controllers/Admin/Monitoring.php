<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AbsensiModel;

class Monitoring extends BaseController
{
    protected $absensiModel;

    public function __construct()
    {
        $this->absensiModel = new AbsensiModel();
    }

    /*
    |--------------------------------------------------------------------------
    | HALAMAN MONITORING
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $keyword = $this->request->getGet('search');
        $status  = $this->request->getGet('status');
        $tanggal = $this->request->getGet('tanggal') ?? date('Y-m-d');

        $builder = $this->absensiModel
            ->select('
                absensi.*,
                peserta.nama_lengkap,
                peserta.nim,
                peserta.foto_profile
            ')
            ->join('peserta', 'peserta.id = absensi.peserta_id');

        /*
        |--------------------------------------------------------------------------
        | FILTER TANGGAL
        |--------------------------------------------------------------------------
        */

        $builder->where('absensi.tanggal', $tanggal);

        /*
        |--------------------------------------------------------------------------
        | FILTER SEARCH
        |--------------------------------------------------------------------------
        */

        if ($keyword) {

            $builder->groupStart()
                ->like('peserta.nama_lengkap', $keyword)
                ->orLike('peserta.nim', $keyword)
                ->groupEnd();
        }

        /*
        |--------------------------------------------------------------------------
        | FILTER STATUS
        |--------------------------------------------------------------------------
        */

        if ($status) {

            $builder->where('absensi.status', strtolower($status));
        }

        $pegawai = $builder
            ->orderBy('absensi.id', 'DESC')
            ->findAll();

        $data = [

            'title'   => 'Monitoring Absensi',
            'pegawai' => $pegawai,
            'search'  => $keyword,
            'status'  => $status,
            'tanggal' => $tanggal,

        ];

        return view('admin/monitoring/index', $data);
    }

    /*
    |--------------------------------------------------------------------------
    | DETAIL MONITORING
    |--------------------------------------------------------------------------
    */

    public function detail($id)
    {
        $pegawai = $this->absensiModel
            ->select('
                absensi.*,
                peserta.nama_lengkap,
                peserta.nim,
                peserta.foto_profile
            ')
            ->join('peserta', 'peserta.id = absensi.peserta_id')
            ->where('absensi.id', $id)
            ->first();

        if (!$pegawai) {

            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [

            'title'   => 'Detail Monitoring',
            'pegawai' => $pegawai,

        ];

        return view('admin/monitoring/detail', $data);
    }
}