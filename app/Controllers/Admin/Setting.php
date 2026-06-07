<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SettingModel;

class Setting extends BaseController
{
    // =========================
    // ABSENSI
    // =========================

    public function absensi()
    {
        $settingModel = new SettingModel();

        $data['setting'] = $settingModel->first();

        return view(
            'admin/setting/absensi',
            $data
        );
    }

    /*
    |--------------------------------------------------------------------------
    | LOKASI
    |--------------------------------------------------------------------------
    */

    public function lokasi()
    {
        $db = \Config\Database::connect();

        $setting = $db->table('settings')
            ->where('id', 1)
            ->get()
            ->getRowArray();

        $data = [

            'title' => 'Setting Lokasi',

            'setting' => $setting

        ];

        return view(
            'admin/setting/lokasi',
            $data
        );
    }


    /*
    |--------------------------------------------------------------------------
    | HARI LIBUR
    |--------------------------------------------------------------------------
    */

    public function hariLibur()
    {
        $db = \Config\Database::connect();

        /*
        |--------------------------------------------------------------------------
        | API HARI LIBUR NASIONAL
        |--------------------------------------------------------------------------
        */

        $apiLibur = [];

        try {

            $response = @file_get_contents(
                'https://api-hari-libur.vercel.app/api'
            );

            $result = json_decode(
                $response,
                true
            );

            $apiLibur = $result['data'] ?? [];

        } catch (\Throwable $e) {

            $apiLibur = [];

        }

        /*
        |--------------------------------------------------------------------------
        | FORMAT DATA API
        |--------------------------------------------------------------------------
        */

        $nasional = [];

        foreach ($apiLibur as $item) {

            $nasional[] = [

                'id' => null,

                'nama_libur' => $item['description'] ?? '-',

                'tanggal' => $item['date'] ?? date('Y-m-d'),

                'tipe' => 'Nasional',

                'keterangan' => 'Hari Libur Nasional',

                'is_api' => true

            ];
        }

        /*
        |--------------------------------------------------------------------------
        | CUSTOM LIBUR INTERNAL
        |--------------------------------------------------------------------------
        */

        $customLibur = $db->table('hari_libur')
            ->orderBy('tanggal', 'ASC')
            ->get()
            ->getResultArray();

        /*
        |--------------------------------------------------------------------------
        | TAMBAH FLAG
        |--------------------------------------------------------------------------
        */

        foreach ($customLibur as &$item) {

            $item['is_api'] = false;

        }

        /*
        |--------------------------------------------------------------------------
        | GABUNGKAN
        |--------------------------------------------------------------------------
        */

        $hariLibur = array_merge(
            $nasional,
            $customLibur
        );

        /*
        |--------------------------------------------------------------------------
        | SORT TANGGAL
        |--------------------------------------------------------------------------
        */

        usort($hariLibur, function ($a, $b) {

            return strtotime($a['tanggal'])
                - strtotime($b['tanggal']);

        });

        /*
        |--------------------------------------------------------------------------
        | TOTAL
        |--------------------------------------------------------------------------
        */

        $totalLibur = count($hariLibur);

        /*
        |--------------------------------------------------------------------------
        | LIBUR TERDEKAT
        |--------------------------------------------------------------------------
        */

        $liburTerdekat = null;

        foreach ($hariLibur as $libur) {

            if ($libur['tanggal'] >= date('Y-m-d')) {

                $liburTerdekat = $libur;

                break;

            }

        }

        $data = [

            'title' => 'Setting Hari Libur',

            'hariLibur' => $hariLibur,

            'totalLibur' => $totalLibur,

            'liburTerdekat' => $liburTerdekat

        ];

        return view(
            'admin/setting/harilibur',
            $data
        );
    }


    // =========================
    // UMUM / AKUN
    // =========================
    public function umum()
    {
        $db = \Config\Database::connect();

        $setting = $db->table('settings')
            ->where('id', 1)
            ->get()
            ->getRowArray();

        $data = [

            'title' => 'Setting Akun',

            'setting' => $setting

        ];

        return view(
            'admin/setting/umum',
            $data
        );
    }

    // =========================
    // NOTIFIKASI
    // =========================
    public function notifikasi()
    {
        $db = \Config\Database::connect();

        $setting = $db->table('settings')
            ->where('id', 1)
            ->get()
            ->getRowArray();

        return view('admin/setting/notifikasi', [

            'title' => 'Setting Notifikasi',

            'setting' => $setting

        ]);
    }
    /*
    |--------------------------------------------------------------------------
    | SAVE LOKASI
    |--------------------------------------------------------------------------
    */

    public function saveLokasi()
    {
        $db = \Config\Database::connect();

        $data = [

            'latitude_kantor' => $this->request->getPost('latitude_kantor'),

            'longitude_kantor' => $this->request->getPost('longitude_kantor'),

            'radius_absensi' => $this->request->getPost('radius_absensi'),

            'mode_validasi_gps' => $this->request->getPost('mode_validasi_gps')

        ];

        $db->table('settings')
            ->where('id', 1)
            ->update($data);

        session()->setFlashdata(
            'success',
            'Setting lokasi berhasil diperbarui.'
        );

        return redirect()->to('/admin/setting/lokasi');
    }


    /*
    |--------------------------------------------------------------------------
    | SAVE ABSENSI
    |--------------------------------------------------------------------------
    */

    public function saveAbsensi()
    {
        $db = \Config\Database::connect();

        $setting = [

            'jam_masuk' => $this->request->getPost('jam_masuk'),

            'jam_pulang' => $this->request->getPost('jam_pulang'),

            'minimal_jam_kerja' => $this->request->getPost('minimal_jam_kerja'),

            'toleransi_terlambat' => $this->request->getPost('toleransi_terlambat'),

            'auto_alpha' => $this->request->getPost('auto_alpha') ? 1 : 0,

            'hari_senin' => $this->request->getPost('hari_senin') ? 1 : 0,

            'hari_selasa' => $this->request->getPost('hari_selasa') ? 1 : 0,

            'hari_rabu' => $this->request->getPost('hari_rabu') ? 1 : 0,

            'hari_kamis' => $this->request->getPost('hari_kamis') ? 1 : 0,

            'hari_jumat' => $this->request->getPost('hari_jumat') ? 1 : 0,

            'hari_sabtu' => $this->request->getPost('hari_sabtu') ? 1 : 0,

            'hari_minggu' => $this->request->getPost('hari_minggu') ? 1 : 0,

            'mode_validasi_gps' => $this->request->getPost('mode_absensi')

        ];

        $db->table('settings')
            ->where('id', 1)
            ->update($setting);

        session()->setFlashdata(
            'success',
            'Pengaturan absensi berhasil disimpan.'
        );

        return redirect()->to('/admin/setting/absensi');
    }

    /*
    |--------------------------------------------------------------------------
    | SAVE HARI LIBUR
    |--------------------------------------------------------------------------
    */

    public function saveHariLibur()
    {
        $db = \Config\Database::connect();

        $db->table('hari_libur')->insert([

            'nama_libur' => $this->request->getPost('nama_libur'),

            'tanggal' => $this->request->getPost('tanggal_libur'),

            'tipe' => $this->request->getPost('tipe_libur'),

            'keterangan' => $this->request->getPost('keterangan')

        ]);

        session()->setFlashdata(
            'success',
            'Hari libur berhasil ditambahkan.'
        );

        return redirect()->to('/admin/setting/harilibur');
    }


    // =========================
    // SAVE UMUM
    // =========================
    public function saveUmum()
    {
        $db = \Config\Database::connect();

        $userModel = new \App\Models\UserModel();

        $userId = session()->get('user_id');

        $user = $userModel->find($userId);

        /*
        |--------------------------------------------------------------------------
        | UPDATE PASSWORD
        |--------------------------------------------------------------------------
        */

        $oldPassword = $this->request->getPost('old_password');

        $newPassword = $this->request->getPost('new_password');

        $confirmPassword = $this->request->getPost('confirm_password');

        if (
            !empty($oldPassword) ||
            !empty($newPassword) ||
            !empty($confirmPassword)
        ) {

            /*
            |--------------------------------------------------------------------------
            | PASSWORD LAMA SALAH
            |--------------------------------------------------------------------------
            */

            if (
                !password_verify(
                    $oldPassword,
                    $user['password']
                )
            ) {

                return redirect()->back()->with(
                    'error',
                    'Password lama tidak sesuai.'
                );
            }

            /*
            |--------------------------------------------------------------------------
            | PASSWORD BARU TIDAK SAMA
            |--------------------------------------------------------------------------
            */

            if ($newPassword != $confirmPassword) {

                return redirect()->back()->with(
                    'error',
                    'Konfirmasi password tidak cocok.'
                );
            }

            /*
            |--------------------------------------------------------------------------
            | UPDATE PASSWORD
            |--------------------------------------------------------------------------
            */

            $userModel->update($userId, [

                'password' => password_hash(
                    $newPassword,
                    PASSWORD_DEFAULT
                )

            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | UPDATE SETTINGS
        |--------------------------------------------------------------------------
        */

        $setting = [

            'session_timeout' => $this->request->getPost('session_timeout'),

            'default_role' => $this->request->getPost('default_role'),

            'auto_logout' => $this->request->getPost('auto_logout') ? 1 : 0,

            'single_session' => $this->request->getPost('single_session') ? 1 : 0

        ];

        $db->table('settings')
            ->where('id', 1)
            ->update($setting);

        session()->setFlashdata(
            'success',
            'Pengaturan akun & keamanan berhasil diperbarui.'
        );

        return redirect()->to('/admin/setting/umum');
    }

    // =========================
    // SAVE NOTIFIKASI
    // =========================
    public function saveNotifikasi()
    {
        $db = \Config\Database::connect();

        $data = [

            'notif_terlambat' => $this->request->getPost('notif_terlambat') ? 1 : 0,

            'notif_izin' => $this->request->getPost('notif_izin') ? 1 : 0,

            'reminder_absensi' => $this->request->getPost('reminder_absensi') ? 1 : 0

        ];

        $db->table('settings')
            ->where('id', 1)
            ->update($data);

        session()->setFlashdata(
            'success',
            'Pengaturan notifikasi berhasil disimpan.'
        );

        return redirect()->to('/admin/setting/notifikasi');
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE HARI LIBUR
    |--------------------------------------------------------------------------
    */

    public function deleteHariLibur($id)
    {
        $db = \Config\Database::connect();

        $db->table('hari_libur')
            ->where('id', $id)
            ->delete();

        session()->setFlashdata(
            'success',
            'Hari libur berhasil dihapus.'
        );

        return redirect()->to('/admin/setting/harilibur');
    }
}
