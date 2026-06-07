<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>

<?= view('components/alert'); ?>

<?php
$uri = service('uri');
$activeTab = $uri->getSegment(3, 'umum');

/*
|--------------------------------------------------------------------------
| DEFAULT VALUE
|--------------------------------------------------------------------------
| Nanti tinggal ambil dari database:
|
| $setting['session_timeout']
|
*/

$sessionTimeout = $setting['session_timeout'] ?? 120;

$defaultRole = $setting['default_role'] ?? 'mahasiswa';

$autoLogout = $setting['auto_logout'] ?? 1;

$singleSession = $setting['single_session'] ?? 0;

?>

<!-- HEADER -->
<div class="flex items-center justify-between mb-8">

    <div>

        <p class="text-slate-400 text-[14px] mb-1">
            Konfigurasi Sistem Absensi Magang
        </p>

        <h1 class="text-[56px] font-extrabold text-slate-900 leading-none">
            Akun & Keamanan
        </h1>

    </div>

    <button type="submit" form="form-setting-keamanan"
        class="bg-blue-600 hover:bg-blue-700 transition text-white px-8 py-4 rounded-2xl font-bold shadow-lg shadow-blue-500/20">

        Simpan Pengaturan

    </button>

</div>

<!-- TAB -->
<div class="bg-white rounded-[32px] p-4 border border-slate-100 shadow-sm mb-8">

    <div class="flex items-center gap-4 overflow-x-auto">

        <a href="<?= base_url('admin/setting/absensi') ?>" class="min-w-max px-6 py-4 rounded-2xl font-bold transition <?= ($activeTab === 'absensi')
              ? 'bg-gradient-to-r from-blue-600 to-blue-500 text-white shadow-lg shadow-blue-500/20'
              : 'bg-slate-100 hover:bg-slate-200 text-slate-700' ?>">
            🕒 Absensi
        </a>

        <a href="<?= base_url('admin/setting/lokasi') ?>" class="min-w-max px-6 py-4 rounded-2xl font-bold transition <?= ($activeTab === 'lokasi')
              ? 'bg-gradient-to-r from-blue-600 to-blue-500 text-white shadow-lg shadow-blue-500/20'
              : 'bg-slate-100 hover:bg-slate-200 text-slate-700' ?>">
            📍 Lokasi GPS
        </a>

        <a href="<?= base_url('admin/setting/harilibur') ?>" class="min-w-max px-6 py-4 rounded-2xl font-bold transition <?= ($activeTab === 'harilibur')
              ? 'bg-gradient-to-r from-blue-600 to-blue-500 text-white shadow-lg shadow-blue-500/20'
              : 'bg-slate-100 hover:bg-slate-200 text-slate-700' ?>">
            🎉 Hari Libur
        </a>

        <a href="<?= base_url('admin/setting/umum') ?>" class="min-w-max px-6 py-4 rounded-2xl font-bold transition <?= ($activeTab === 'umum')
              ? 'bg-gradient-to-r from-blue-600 to-blue-500 text-white shadow-lg shadow-blue-500/20'
              : 'bg-slate-100 hover:bg-slate-200 text-slate-700' ?>">
            🔑 Akun & Keamanan
        </a>

        <a href="<?= base_url('admin/setting/notifikasi') ?>" class="min-w-max px-6 py-4 rounded-2xl font-bold transition <?= ($activeTab === 'notifikasi')
              ? 'bg-gradient-to-r from-blue-600 to-blue-500 text-white shadow-lg shadow-blue-500/20'
              : 'bg-slate-100 hover:bg-slate-200 text-slate-700' ?>">
            🔔 Notifikasi
        </a>

    </div>

</div>

<!-- FORM -->
<form id="form-setting-keamanan" action="<?= base_url('admin/setting/umum/save') ?>" method="POST">

    <div class="grid grid-cols-1 xl:grid-cols-12 gap-7">

        <!-- LEFT -->
        <div class="xl:col-span-8 space-y-7">

            <!-- PASSWORD -->
            <div class="bg-white rounded-[36px] p-8 border border-slate-100 shadow-sm">

                <div class="flex items-center gap-4 mb-8">

                    <div class="w-16 h-16 rounded-3xl bg-blue-100 flex items-center justify-center text-3xl">
                        🔒
                    </div>

                    <div>

                        <h2 class="text-[32px] font-extrabold text-slate-900">
                            Reset Password Admin
                        </h2>

                        <p class="text-slate-400 text-[14px]">
                            Ganti password administrator utama sistem absensi
                        </p>

                    </div>

                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                    <!-- PASSWORD LAMA -->
                    <div>

                        <label class="block text-[14px] font-semibold text-slate-700 mb-3">
                            Password Lama
                        </label>

                        <input type="password" name="old_password" placeholder="Masukkan password lama"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none focus:border-blue-500 focus:bg-white transition text-slate-800">

                    </div>

                    <!-- PASSWORD BARU -->
                    <div>

                        <label class="block text-[14px] font-semibold text-slate-700 mb-3">
                            Password Baru
                        </label>

                        <input type="password" name="new_password" placeholder="Masukkan password baru"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none focus:border-blue-500 focus:bg-white transition text-slate-800">

                    </div>

                    <!-- KONFIRMASI -->
                    <div>

                        <label class="block text-[14px] font-semibold text-slate-700 mb-3">
                            Konfirmasi Password
                        </label>

                        <input type="password" name="confirm_password" placeholder="Konfirmasi password baru"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none focus:border-blue-500 focus:bg-white transition text-slate-800">

                    </div>

                </div>

            </div>

            <!-- SESSION -->
            <div class="bg-white rounded-[36px] p-8 border border-slate-100 shadow-sm">

                <div class="flex items-center gap-4 mb-8">

                    <div class="w-16 h-16 rounded-3xl bg-yellow-100 flex items-center justify-center text-3xl">
                        ⏳
                    </div>

                    <div>

                        <h2 class="text-[32px] font-extrabold text-slate-900">
                            Session & Role
                        </h2>

                        <p class="text-slate-400 text-[14px]">
                            Pengaturan durasi session login dan role default pengguna
                        </p>

                    </div>

                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- SESSION -->
                    <div>

                        <label class="block text-[14px] font-semibold text-slate-700 mb-3">
                            Session Timeout
                        </label>

                        <div class="relative">

                            <input type="number" name="session_timeout" value="<?= $sessionTimeout ?>"
                                class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 pr-20 outline-none focus:border-blue-500 focus:bg-white transition text-slate-800">

                            <span
                                class="absolute right-5 top-1/2 -translate-y-1/2 text-slate-400 font-semibold text-[14px]">
                                Menit
                            </span>

                        </div>

                    </div>

                    <!-- ROLE -->
                    <div>

                        <label class="block text-[14px] font-semibold text-slate-700 mb-3">
                            Role Default User
                        </label>

                        <select name="default_role"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none focus:border-blue-500 focus:bg-white transition text-slate-800">

                            <option value="mahasiswa" <?= $defaultRole == 'mahasiswa' ? 'selected' : '' ?>>

                                Mahasiswa Magang

                            </option>

                            <option value="siswa" <?= $defaultRole == 'siswa' ? 'selected' : '' ?>>

                                Siswa Magang

                            </option>

                        </select>

                    </div>

                </div>

            </div>

            <!-- SESSION SECURITY -->
            <div class="bg-white rounded-[36px] p-8 border border-slate-100 shadow-sm">

                <div class="flex items-center gap-4 mb-8">

                    <div class="w-16 h-16 rounded-3xl bg-red-100 flex items-center justify-center text-3xl">
                        🛡️
                    </div>

                    <div>

                        <h2 class="text-[32px] font-extrabold text-slate-900">
                            Keamanan Session
                        </h2>

                        <p class="text-slate-400 text-[14px]">
                            Pengaturan tambahan untuk menjaga keamanan akses sistem
                        </p>

                    </div>

                </div>

                <div class="space-y-5">

                    <!-- AUTO LOGOUT -->
                    <label
                        class="bg-slate-50 border border-slate-200 rounded-[28px] p-6 flex items-center justify-between cursor-pointer">

                        <div>

                            <h3 class="text-[20px] font-extrabold text-slate-900">
                                Logout Otomatis
                            </h3>

                            <p class="text-slate-500 text-[13px] mt-1">
                                Sistem akan logout otomatis jika tidak ada aktivitas
                            </p>

                        </div>

                        <input type="checkbox" name="auto_logout" value="1" <?= $autoLogout ? 'checked' : '' ?>
                            class="w-6 h-6 accent-blue-600">

                    </label>

                    <!-- FORCE SINGLE LOGIN -->
                    <label
                        class="bg-slate-50 border border-slate-200 rounded-[28px] p-6 flex items-center justify-between cursor-pointer">

                        <div>

                            <h3 class="text-[20px] font-extrabold text-slate-900">
                                Single Session Login
                            </h3>

                            <p class="text-slate-500 text-[13px] mt-1">
                                User tidak dapat login di banyak device secara bersamaan
                            </p>

                        </div>

                        <input type="checkbox" name="single_session" value="1" <?= $singleSession ? 'checked' : '' ?>
                            class="w-6 h-6 accent-blue-600">

                    </label>

                </div>

            </div>

        </div>

        <!-- RIGHT -->
        <div class="xl:col-span-4 space-y-7">

            <!-- STATUS -->
            <div
                class="bg-gradient-to-br from-blue-600 to-blue-500 rounded-[36px] p-8 text-white shadow-xl shadow-blue-500/20">

                <div class="flex items-center justify-between mb-10">

                    <div>

                        <p class="text-blue-100 text-[14px] mb-2">
                            Status Keamanan
                        </p>

                        <h3 class="text-[32px] font-extrabold">
                            Aman
                        </h3>

                    </div>

                    <div class="w-16 h-16 rounded-3xl bg-white/20 flex items-center justify-center text-3xl">
                        🔐
                    </div>

                </div>

                <div class="bg-white/10 rounded-3xl p-6 backdrop-blur-sm">

                    <p class="text-blue-100 text-[14px] mb-2">
                        Proteksi Sistem
                    </p>

                    <h2 class="text-[20px] font-extrabold mb-3">
                        Session Security Aktif
                    </h2>

                    <span
                        class="bg-green-400/20 text-green-100 px-4 py-2 rounded-xl inline-block text-[13px] font-bold">
                        Secure Access
                    </span>

                </div>

            </div>

            <!-- INFO -->
            <div class="bg-white rounded-[36px] p-8 border border-slate-100 shadow-sm">

                <h3 class="text-[32px] font-extrabold text-slate-900 mb-8">
                    Informasi
                </h3>

                <div class="space-y-6">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-slate-400 text-[13px]">
                                Session Timeout
                            </p>

                            <h4 class="text-[22px] font-extrabold text-slate-900">
                                <?= $sessionTimeout ?> Menit
                            </h4>

                        </div>

                        <div class="w-14 h-14 rounded-2xl bg-yellow-100 flex items-center justify-center text-2xl">
                            ⏳
                        </div>

                    </div>

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-slate-400 text-[13px]">
                                Role Default
                            </p>

                            <h4 class="text-[22px] font-extrabold text-slate-900 capitalize">
                                <?= $defaultRole ?>
                            </h4>

                        </div>

                        <div class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center text-2xl">
                            👤
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</form>

<?= $this->endSection() ?>