<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Pegawai extends BaseController
{
    // =========================================
    // MASTER DATA PEGAWAI MAGANG
    // =========================================
    private function pegawaiData()
    {
        return [

            [
                'nama' => 'Ahmad Rizki',
                'nim' => '22110001',
                'divisi' => 'Record Center',
                'role' => 'Admin',
                'username' => 'ahmad_rizki',
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
                'nim' => '22110002',
                'divisi' => 'TU',
                'role' => 'Anggota',
                'username' => 'sinta_permataa',
                'status' => 'Aktif',

                'email' => 'sinta@bakorwil.go.id',
                'nohp' => '081222333444',
                'alamat' => 'Jl. Ijen No.20 Kota Malang',

                'lahir' => '12 Februari 1997',
                'bergabung' => '15 Januari 2024',

                'persentase' => '92%',

                'hadir' => 21,
                'terlambat' => 4,
                'izin' => 2,
                'sakit' => 0,
                'alfa' => 1,

                'riwayat_kehadiran' => [

                    [
                        'title' => 'Hadir Tepat Waktu',
                        'tanggal' => '05 Juni 2026 • 06:59 WIB',
                        'status' => 'Hadir',
                    ],

                ],

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
                'nim' => '22110003',
                'divisi' => 'Sarpras',
                'role' => 'Anggota',
                'username' => 'budi_santoso',
                'status' => 'Nonaktif',

                'email' => 'budi@bakorwil.go.id',
                'nohp' => '081777888999',
                'alamat' => 'Jl. Veteran No.99 Kota Malang',

                'lahir' => '03 Januari 1990',
                'bergabung' => '01 Februari 2024',

                'persentase' => '81%',

                'hadir' => 18,
                'terlambat' => 7,
                'izin' => 5,
                'sakit' => 2,
                'alfa' => 4,

                'riwayat_kehadiran' => [

                    [
                        'title' => 'Tidak Hadir',
                        'tanggal' => '05 Juni 2026',
                        'status' => 'Alfa',
                    ],

                ],

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
    // INDEX
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
                    stripos($item['nim'], $search) !== false;

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
    // DETAIL
    // =========================================
    public function detail($id)
    {
        $pegawai = $this->pegawaiData();

        if (!isset($pegawai[$id])) {

            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        }

        $data = [
            'title' => 'Detail Pegawai',
            'pegawai' => $pegawai[$id],
            'id' => $id,
        ];

        return view('admin/pegawai/detail', $data);
    }

    // =========================================
    // CREATE
    // =========================================
    public function create()
    {
        return view('admin/pegawai/create', [
            'title' => 'Tambah Pegawai',
        ]);
    }

    // =========================================
    // STORE
    // =========================================
    public function store()
    {
        session()->setFlashdata(
            'success',
            'Data pegawai berhasil ditambahkan.'
        );

        return redirect()->to('/admin/pegawai');
    }

    // =========================================
    // EDIT
    // =========================================
    public function edit($id)
    {
        $pegawai = $this->pegawaiData();

        if (!isset($pegawai[$id])) {

            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        }

        $data = [
            'title' => 'Edit Pegawai',
            'pegawai' => $pegawai[$id],
            'id' => $id,
        ];

        return view('admin/pegawai/edit', $data);
    }

    // =========================================
    // UPDATE
    // =========================================
    public function update($id)
    {
        session()->setFlashdata(
            'success',
            'Data pegawai berhasil diperbarui.'
        );

        return redirect()->to('/admin/pegawai/detail/' . $id);
    }

    // =========================================
    // KELOLA AKUN
    // =========================================
    public function akun($id)
    {
        $pegawai = $this->pegawaiData();

        if (!isset($pegawai[$id])) {

            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        }

        $data = [
            'title' => 'Kelola Akun',
            'pegawai' => $pegawai[$id],
            'id' => $id,
        ];

        return view('admin/pegawai/akun', $data);
    }

    // =========================================
    // UPDATE AKUN
    // =========================================
    public function akunUpdate($id)
    {
        session()->setFlashdata(
            'success',
            'Akun berhasil diperbarui.'
        );

        return redirect()->to('/admin/pegawai/akun/' . $id);
    }

}