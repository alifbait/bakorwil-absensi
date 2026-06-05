<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Pegawai extends BaseController
{
    // =========================================
    // MASTER DATA PEGAWAI
    // =========================================
    private function pegawaiData()
    {
        return [

            [
                'nama' => 'Ahmad Rizki',
                'nip' => '19881201202401001',
                'jabatan' => 'Staff ASN',
                'divisi' => 'Kepegawaian',
                'status' => 'Aktif',

                'email' => 'ahmad@bakorwil.go.id',
                'nohp' => '081234567890',
                'alamat' => 'Jl. Soekarno Hatta No.10 Kota Malang',

                'lahir' => '10 Mei 1995',
                'bergabung' => '12 Januari 2024',

                'persentase' => '96%',

                // STATISTIK
                'hadir' => 24,
                'terlambat' => 2,
                'izin' => 3,
                'sakit' => 1,
                'alfa' => 0,

                // RIWAYAT KEHADIRAN
                'riwayat_kehadiran' => [

                    [
                        'title' => 'Hadir Tepat Waktu',
                        'tanggal' => '05 Juni 2026 • 07:01 WIB',
                        'status' => 'Hadir',
                    ],

                    [
                        'title' => 'Terlambat Absensi',
                        'tanggal' => '04 Juni 2026 • 07:20 WIB',
                        'status' => 'Terlambat',
                    ],

                    [
                        'title' => 'Tidak Hadir',
                        'tanggal' => '03 Juni 2026',
                        'status' => 'Alfa',
                    ],

                    [
                        'title' => 'Hadir Tepat Waktu',
                        'tanggal' => '02 Juni 2026 • 06:58 WIB',
                        'status' => 'Hadir',
                    ],

                ],

                // RIWAYAT PENGAJUAN
                'riwayat_pengajuan' => [

                    [
                        'title' => 'Izin Acara Keluarga',
                        'tanggal' => '21 Mei 2026',
                        'status' => 'Pending',
                    ],

                    [
                        'title' => 'Sakit Demam',
                        'tanggal' => '14 Mei 2026',
                        'status' => 'Disetujui',
                    ],

                ],

            ],

            [
                'nama' => 'Sinta Permata',
                'nip' => '19890111202401002',
                'jabatan' => 'Staff Administrasi',
                'divisi' => 'Administrasi',
                'status' => 'Aktif',

                'email' => 'sinta@bakorwil.go.id',
                'nohp' => '081222333444',
                'alamat' => 'Jl. Ijen No.20 Kota Malang',

                'lahir' => '12 Februari 1997',
                'bergabung' => '15 Januari 2024',

                'persentase' => '92%',

                // STATISTIK
                'hadir' => 21,
                'terlambat' => 4,
                'izin' => 2,
                'sakit' => 0,
                'alfa' => 1,

                // RIWAYAT KEHADIRAN
                'riwayat_kehadiran' => [

                    [
                        'title' => 'Hadir Tepat Waktu',
                        'tanggal' => '05 Juni 2026 • 06:59 WIB',
                        'status' => 'Hadir',
                    ],

                    [
                        'title' => 'Izin Tidak Masuk',
                        'tanggal' => '04 Juni 2026',
                        'status' => 'Izin',
                    ],

                ],

                // RIWAYAT PENGAJUAN
                'riwayat_pengajuan' => [

                    [
                        'title' => 'Izin Acara Keluarga',
                        'tanggal' => '01 Juni 2026',
                        'status' => 'Disetujui',
                    ],

                ],

            ],

            [
                'nama' => 'Budi Santoso',
                'nip' => '19900212202401003',
                'jabatan' => 'Staff Operasional',
                'divisi' => 'Operasional',
                'status' => 'Nonaktif',

                'email' => 'budi@bakorwil.go.id',
                'nohp' => '081777888999',
                'alamat' => 'Jl. Veteran No.99 Kota Malang',

                'lahir' => '03 Januari 1990',
                'bergabung' => '01 Februari 2024',

                'persentase' => '81%',

                // STATISTIK
                'hadir' => 18,
                'terlambat' => 7,
                'izin' => 5,
                'sakit' => 2,
                'alfa' => 4,

                // RIWAYAT KEHADIRAN
                'riwayat_kehadiran' => [

                    [
                        'title' => 'Tidak Hadir',
                        'tanggal' => '05 Juni 2026',
                        'status' => 'Alfa',
                    ],

                    [
                        'title' => 'Terlambat Absensi',
                        'tanggal' => '04 Juni 2026 • 07:40 WIB',
                        'status' => 'Terlambat',
                    ],

                ],

                // RIWAYAT PENGAJUAN
                'riwayat_pengajuan' => [

                    [
                        'title' => 'Izin Keperluan Keluarga',
                        'tanggal' => '28 Mei 2026',
                        'status' => 'Ditolak',
                    ],

                ],

            ],

        ];
    }

    // =========================================
    // INDEX PEGAWAI
    // =========================================
    public function index()
    {
        $search = $this->request->getGet('search');
        $status = $this->request->getGet('status');

        $pegawai = $this->pegawaiData();

        // FILTER SEARCH
        if ($search) {

            $pegawai = array_filter($pegawai, function ($item) use ($search) {

                return
                    stripos($item['nama'], $search) !== false ||
                    stripos($item['nip'], $search) !== false;

            });

        }

        // FILTER STATUS
        if ($status) {

            $pegawai = array_filter($pegawai, function ($item) use ($status) {

                return $item['status'] == $status;

            });

        }

        $data = [
            'title' => 'Data Pegawai',
            'pegawai' => $pegawai,
            'search' => $search,
            'status' => $status,
        ];

        return view('admin/pegawai/index', $data);
    }

    // =========================================
    // DETAIL PEGAWAI
    // =========================================
    public function detail($id)
    {
        $pegawai = $this->pegawaiData();

        // VALIDASI ID
        if (!isset($pegawai[$id])) {

            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        }

        $data = [
            'title' => 'Detail Pegawai',
            'pegawai' => $pegawai[$id],
        ];

        return view('admin/pegawai/detail', $data);
    }

    // =========================================
    // CREATE PEGAWAI
    // =========================================
    public function create()
    {
        $data = [
            'title' => 'Tambah Pegawai',
        ];

        return view('admin/pegawai/create', $data);
    }

    // =========================================
    // STORE PEGAWAI
    // =========================================
    public function store()
    {
        $nama = $this->request->getPost('nama');
        $nip = $this->request->getPost('nip');

        // SIMULASI SAVE
        session()->setFlashdata(
            'success',
            'Data pegawai berhasil ditambahkan.'
        );

        return redirect()->to('/admin/pegawai');
    }
    public function edit($id)
    {
        $pegawai = $this->pegawaiData();

        if (!isset($pegawai[$id])) {

            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        }

        $data = [
            'title' => 'Edit Pegawai',
            'pegawai' => $pegawai[$id],
        ];

        return view('admin/pegawai/edit', $data);
    }

    public function update($id)
    {
        session()->setFlashdata(
            'success',
            'Data pegawai berhasil diperbarui.'
        );

        return redirect()->to('/admin/pegawai/detail/' . $id);
    }
}