<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\IzinModel;

class Izin extends BaseController
{
    /*
    |--------------------------------------------------------------------------
    | LIST IZIN
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        helper('text');
        $search = $this->request->getGet('search');
        $status = $this->request->getGet('status');
        $tanggal = $this->request->getGet('tanggal');

        $izinModel = new IzinModel();

        /*
        |--------------------------------------------------------------------------
        | QUERY
        |--------------------------------------------------------------------------
        */

        $builder = $izinModel

            ->select('
                izin.*,
                peserta.nama_lengkap,
                peserta.nim,
                peserta.foto_profile
            ')

            ->join(
                'peserta',
                'peserta.id = izin.peserta_id'
            );

        /*
        |--------------------------------------------------------------------------
        | SEARCH
        |--------------------------------------------------------------------------
        */

        if ($search) {

            $builder->groupStart()

                ->like('peserta.nama_lengkap', $search)

                ->orLike('peserta.nim', $search)

                ->groupEnd();
        }

        /*
        |--------------------------------------------------------------------------
        | FILTER STATUS
        |--------------------------------------------------------------------------
        */

        if ($status) {

            $builder->where(
                'izin.status',
                strtolower($status)
            );
        }

        /*
        |--------------------------------------------------------------------------
        | FILTER TANGGAL
        |--------------------------------------------------------------------------
        */

        if ($tanggal) {

            $builder->where(
                'izin.tanggal_mulai',
                $tanggal
            );
        }

        /*
        |--------------------------------------------------------------------------
        | GET DATA
        |--------------------------------------------------------------------------
        */

        $izin = $builder
            ->orderBy('izin.id', 'DESC')
            ->findAll();

        $data = [

            'title' => 'Approval Izin',

            'izin' => $izin,

            'search' => $search,

            'status' => $status,

            'tanggal' => $tanggal

        ];

        return view(
            'admin/izin/index',
            $data
        );
    }

    /*
    |--------------------------------------------------------------------------
    | DETAIL IZIN
    |--------------------------------------------------------------------------
    */

    public function detail($id)
    {
        $izinModel = new IzinModel();

        $izin = $izinModel

            ->select('
                izin.*,
                peserta.nama_lengkap,
                peserta.nim,
                peserta.email,
                peserta.no_hp,
                peserta.asal_instansi,
                peserta.foto_profile
            ')

            ->join(
                'peserta',
                'peserta.id = izin.peserta_id'
            )

            ->where(
                'izin.id',
                $id
            )

            ->first();

        /*
        |--------------------------------------------------------------------------
        | DATA TIDAK ADA
        |--------------------------------------------------------------------------
        */

        if (!$izin) {

            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [

            'title' => 'Detail Pengajuan',

            'izin' => $izin

        ];

        return view(
            'admin/izin/detail',
            $data
        );
    }

    /*
    |--------------------------------------------------------------------------
    | APPROVE IZIN
    |--------------------------------------------------------------------------
    */

    public function approve($id)
    {
        $izinModel = new IzinModel();

        $absensiModel = new \App\Models\AbsensiModel();

        /*
        |--------------------------------------------------------------------------
        | DATA IZIN
        |--------------------------------------------------------------------------
        */

        $izin = $izinModel->find($id);

        if (!$izin) {

            return redirect()
                ->back()
                ->with(
                    'error',
                    'Data izin tidak ditemukan'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | UPDATE STATUS IZIN
        |--------------------------------------------------------------------------
        */

        $izinModel->update($id, [

            'status' => 'disetujui',

            'approved_by' => session()->get('user_id')

        ]);

        /*
        |--------------------------------------------------------------------------
        | CEK ABSENSI HARI ITU
        |--------------------------------------------------------------------------
        */

        $absensi = $absensiModel

            ->where('peserta_id', $izin['peserta_id'])

            ->where('tanggal', $izin['tanggal_mulai'])

            ->first();

        /*
        |--------------------------------------------------------------------------
        | STATUS ABSENSI
        |--------------------------------------------------------------------------
        */

        $statusAbsensi =
            strtolower($izin['jenis']);

        /*
        |--------------------------------------------------------------------------
        | JIKA SUDAH ADA RECORD
        |--------------------------------------------------------------------------
        */

        if ($absensi) {

            $absensiModel
                ->update($absensi['id'], [

                    'status' => $statusAbsensi

                ]);

        }

        /*
        |--------------------------------------------------------------------------
        | JIKA BELUM ADA RECORD
        |--------------------------------------------------------------------------
        */ else {

            $absensiModel->insert([

                'peserta_id' => $izin['peserta_id'],

                'tanggal' => $izin['tanggal_mulai'],

                'status' => $statusAbsensi

            ]);
        }

        return redirect()

            ->back()

            ->with(
                'success',
                'Pengajuan berhasil disetujui'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | REJECT IZIN
    |--------------------------------------------------------------------------
    */

    public function reject($id)
    {
        $izinModel = new IzinModel();

        $izinModel->update($id, [

            'status' => 'ditolak',

            'approved_by' => session()->get('user_id')

        ]);

        return redirect()

            ->back()

            ->with(
                'success',
                'Pengajuan berhasil ditolak'
            );
    }
}