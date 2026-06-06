<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Setting extends BaseController
{
    // =========================
    // ABSENSI
    // =========================
    public function absensi()
    {
        return view('admin/setting/absensi', [
            'title' => 'Setting Absensi'
        ]);
    }

    // =========================
    // LOKASI
    // =========================
    public function lokasi()
    {
        $session = session();

        $data['setting'] = [

            'latitude' =>
                $session->get('latitude') ?? '-7.983908',

            'longitude' =>
                $session->get('longitude') ?? '112.621391',

            'radius' =>
                $session->get('radius') ?? '100',

            'validasi_gps' =>
                $session->get('validasi_gps')
                ?? 'Aktif (Wajib GPS Cocok)',

        ];

        return view('admin/setting/lokasi', $data);
    }

    // =========================
    // HARI LIBUR
    // =========================
    public function harilibur()
    {
        return view('admin/setting/harilibur', [
            'title' => 'Setting Hari Libur'
        ]);
    }

    // =========================
    // UMUM / AKUN
    // =========================
    public function umum()
    {
        return view('admin/setting/umum', [
            'title' => 'Setting Akun'
        ]);
    }

    // =========================
    // NOTIFIKASI
    // =========================
    public function notifikasi()
    {
        return view('admin/setting/notifikasi', [
            'title' => 'Setting Notifikasi'
        ]);
    }

    // =========================
    // SAVE LOKASI
    // =========================
    public function saveLokasi()
    {
        session()->set([

            'latitude' =>
                $this->request->getPost('latitude'),

            'longitude' =>
                $this->request->getPost('longitude'),

            'radius' =>
                $this->request->getPost('radius'),

            'validasi_gps' =>
                $this->request->getPost('validasi_gps'),

        ]);

        return redirect()
            ->to('/admin/setting/lokasi')
            ->with(
                'success',
                'Lokasi berhasil diperbarui'
            );
    }

    // =========================
    // SAVE ABSENSI
    // =========================
    public function saveAbsensi()
    {
        return redirect()->back()->with(
            'success',
            'Setting absensi berhasil disimpan'
        );
    }

    // =========================
    // SAVE HARI LIBUR
    // =========================
    public function saveHariLibur()
    {
        return redirect()->back()->with(
            'success',
            'Hari libur berhasil ditambahkan'
        );
    }

    // =========================
    // SAVE UMUM
    // =========================
    public function saveUmum()
    {
        return redirect()->back()->with(
            'success',
            'Setting akun berhasil disimpan'
        );
    }

    // =========================
    // SAVE NOTIFIKASI
    // =========================
    public function saveNotifikasi()
    {
        $data = [
            'notif_telat' => $this->request->getPost('notif_telat') ? 1 : 0,
            'notif_izin' => $this->request->getPost('notif_izin') ? 1 : 0,
            'notif_reminder' => $this->request->getPost('notif_reminder') ? 1 : 0,
        ];

        // nanti save database

        return redirect()->back()->with(
            'success',
            'Pengaturan notifikasi berhasil disimpan'
        );
    }

    public function saveKeamanan()
    {
        // nanti proses update password & setting

        return redirect()->back()->with(
            'success',
            'Pengaturan keamanan berhasil disimpan'
        );
    }
}