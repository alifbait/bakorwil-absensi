<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Monitoring extends BaseController
{
    public function index()
    {
        $keyword = $this->request->getGet('search');
        $status = $this->request->getGet('status');
        $tanggal = $this->request->getGet('tanggal');

        $pegawai = [

            [
                'nama' => 'Ahmad Rizki',
                'jabatan' => 'Staff Kepegawaian',
                'nip' => '198812012024011001',
                'jam_masuk' => '07:01',
                'jam_pulang' => '15:10',
                'status' => 'Hadir',
                'lokasi' => 'Valid',
                'tanggal' => '2026-06-05',
            ],

            [
                'nama' => 'Sinta Permata',
                'jabatan' => 'Staff Administrasi',
                'nip' => '198812012024011002',
                'jam_masuk' => '07:15',
                'jam_pulang' => '15:00',
                'status' => 'Terlambat',
                'lokasi' => 'Valid',
                'tanggal' => '2026-06-05',
            ],

            [
                'nama' => 'Budi Santoso',
                'jabatan' => 'Staff IT',
                'nip' => '198812012024011003',
                'jam_masuk' => '07:20',
                'jam_pulang' => '15:00',
                'status' => 'Terlambat',
                'lokasi' => 'Valid',
                'tanggal' => '2026-06-04',
            ],

        ];

        // FILTER SEARCH
        if ($keyword) {

            $pegawai = array_filter($pegawai, function ($item) use ($keyword) {

                return stripos($item['nama'], $keyword) !== false;

            });

        }

        // FILTER STATUS
        if ($status) {

            $pegawai = array_filter($pegawai, function ($item) use ($status) {

                return $item['status'] == $status;

            });

        }

        // FILTER TANGGAL
        if ($tanggal) {

            $pegawai = array_filter($pegawai, function ($item) use ($tanggal) {

                return $item['tanggal'] == $tanggal;

            });

        }

        $data = [
            'title' => 'Monitoring Absensi',
            'pegawai' => $pegawai,
            'search' => $keyword,
            'status' => $status,
            'tanggal' => $tanggal,
        ];

        return view('admin/monitoring/index', $data);
    }
    public function detail($id)
    {
        $pegawai = [

            [
                'nama' => 'Ahmad Rizki',
                'jabatan' => 'Staff Kepegawaian',
                'nip' => '198812012024011001',
                'jam_masuk' => '07:01',
                'jam_pulang' => '15:10',
                'status' => 'Hadir',
                'lokasi' => 'Valid',
                'tanggal' => '2026-06-05',
            ],

            [
                'nama' => 'Sinta Permata',
                'jabatan' => 'Staff Administrasi',
                'nip' => '198812012024011002',
                'jam_masuk' => '07:15',
                'jam_pulang' => '15:00',
                'status' => 'Terlambat',
                'lokasi' => 'Valid',
                'tanggal' => '2026-06-05',
            ],
            [
                'nama' => 'Budi Santoso',
                'jabatan' => 'Staff IT',
                'nip' => '198812012024011003',
                'jam_masuk' => '07:20',
                'jam_pulang' => '15:00',
                'status' => 'Terlambat',
                'lokasi' => 'Valid',
                'tanggal' => '2026-06-04',
            ],

        ];

        $data = [
            'title' => 'Detail Monitoring',
            'pegawai' => $pegawai[$id],
        ];

        return view('admin/monitoring/detail', $data);
    }
}