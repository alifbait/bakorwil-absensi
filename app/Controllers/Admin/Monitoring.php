<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Monitoring extends BaseController
{
    public function index()
    {
        $keyword = $this->request->getGet('search');
        $status  = $this->request->getGet('status');

        $pegawai = [

            [
                'nama' => 'Ahmad Rizki',
                'jabatan' => 'Staff Kepegawaian',
                'nip' => '198812012024011001',
                'jam_masuk' => '07:01',
                'jam_pulang' => '15:10',
                'status' => 'Hadir',
                'lokasi' => 'Valid',
            ],

            [
                'nama' => 'Sinta Permata',
                'jabatan' => 'Staff Administrasi',
                'nip' => '198812012024011002',
                'jam_masuk' => '07:15',
                'jam_pulang' => '15:00',
                'status' => 'Terlambat',
                'lokasi' => 'Valid',
            ],

            [
                'nama' => 'Budi Santoso',
                'jabatan' => 'Staff IT',
                'nip' => '198812012024011003',
                'jam_masuk' => '07:20',
                'jam_pulang' => '15:00',
                'status' => 'Terlambat',
                'lokasi' => 'Valid',
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

        $data = [
            'title'    => 'Monitoring Absensi',
            'pegawai'  => $pegawai,
            'search'   => $keyword,
            'status'   => $status,
        ];

        return view('admin/monitoring/index', $data);
    }
}