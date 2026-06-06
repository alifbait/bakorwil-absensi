<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Izin extends BaseController
{
    public function index()
    {
        $search = $this->request->getGet('search');
        $status = $this->request->getGet('status');

        // DEFAULT TANGGAL = HARI INI
        $tanggal = $this->request->getGet('tanggal') ?? date('Y-m-d');

        $izin = [

            [
                'nama' => 'Sinta Permata',
                'jenis' => 'Izin',
                'tanggal' => '2026-06-05',
                'alasan' => 'Menghadiri acara keluarga',
                'status' => 'Pending',
            ],

            [
                'nama' => 'Ahmad Rizki',
                'jenis' => 'Sakit',
                'tanggal' => '2026-06-05',
                'alasan' => 'Demam dan istirahat',
                'status' => 'Disetujui',
            ],

            [
                'nama' => 'Budi Santoso',
                'jenis' => 'Izin',
                'tanggal' => '2026-06-04',
                'alasan' => 'Keperluan keluarga',
                'status' => 'Ditolak',
            ],

        ];

        // FILTER SEARCH
        if ($search) {

            $izin = array_filter($izin, function ($item) use ($search) {

                return stripos($item['nama'], $search) !== false;

            });

        }

        // FILTER STATUS
        if ($status) {

            $izin = array_filter($izin, function ($item) use ($status) {

                return $item['status'] == $status;

            });

        }

        // FILTER TANGGAL
        if ($tanggal) {

            $izin = array_filter($izin, function ($item) use ($tanggal) {

                return $item['tanggal'] == $tanggal;

            });

        }

        $data = [
            'title' => 'Approval Izin',
            'izin' => $izin,
            'search' => $search,
            'status' => $status,
            'tanggal' => $tanggal,
        ];

        return view('admin/izin/index', $data);
    }
    public function detail($id)
    {
        $izin = [

            [
                'nama' => 'Sinta Permata',
                'jenis' => 'Izin',
                'tanggal' => '2026-06-05',
                'alasan' => 'Menghadiri acara keluarga di luar kota dan tidak dapat mengikuti absensi kantor pada tanggal tersebut.',
                'status' => 'Pending',
                'file' => 'surat_izin.pdf',
            ],

            [
                'nama' => 'Ahmad Rizki',
                'jenis' => 'Sakit',
                'tanggal' => '2026-06-05',
                'alasan' => 'Demam dan harus istirahat total sesuai anjuran dokter.',
                'status' => 'Disetujui',
                'file' => 'surat_sakit.pdf',
            ],

            [
                'nama' => 'Budi Santoso',
                'jenis' => 'Izin',
                'tanggal' => '2026-06-04',
                'alasan' => 'Keperluan keluarga mendadak.',
                'status' => 'Ditolak',
                'file' => 'izin_keluarga.pdf',
            ],

        ];

        $data = [
            'title' => 'Detail Pengajuan',
            'izin' => $izin[$id],
        ];

        return view('admin/izin/detail', $data);
    }
}