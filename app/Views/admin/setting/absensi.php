<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>

<?= view('components/alert'); ?>

<?php
$uri = service('uri');
$activeTab = $uri->getSegment(3, 'umum');
?>

<!-- HEADER -->
<div class="flex items-center justify-between mb-8">
    <div>
        <p class="text-slate-400 text-[14px] mb-1">
            Konfigurasi Sistem Absensi Magang
        </p>
        <h1 class="text-[56px] font-extrabold text-slate-900 leading-none">
            Setting Sistem
        </h1>
    </div>
    <button type="submit" form="form-setting-absensi" class="bg-blue-600 hover:bg-blue-700 transition text-white px-8 py-4 rounded-2xl font-bold shadow-lg shadow-blue-500/20">
        Simpan Pengaturan
    </button>
</div>

<!-- TAB NAVIGATION -->
<div class="bg-white rounded-[32px] p-4 border border-slate-100 shadow-sm mb-8">
    <div class="flex items-center gap-4 overflow-x-auto">
        <a href="<?= base_url('admin/setting/absensi') ?>" class="min-w-max px-6 py-4 rounded-2xl font-bold transition <?= ($activeTab === 'absensi') ? 'bg-gradient-to-r from-blue-600 to-blue-500 text-white shadow-lg shadow-blue-500/20' : 'bg-slate-100 hover:bg-slate-200 text-slate-700' ?>">
            🕒 Absensi
        </a>
        <a href="<?= base_url('admin/setting/lokasi') ?>" class="min-w-max px-6 py-4 rounded-2xl font-bold transition <?= ($activeTab === 'lokasi') ? 'bg-gradient-to-r from-blue-600 to-blue-500 text-white shadow-lg shadow-blue-500/20' : 'bg-slate-100 hover:bg-slate-200 text-slate-700' ?>">
            📍 Lokasi GPS
        </a>
        <a href="<?= base_url('admin/setting/harilibur') ?>" class="min-w-max px-6 py-4 rounded-2xl font-bold transition <?= ($activeTab === 'harilibur') ? 'bg-gradient-to-r from-blue-600 to-blue-500 text-white shadow-lg shadow-blue-500/20' : 'bg-slate-100 hover:bg-slate-200 text-slate-700' ?>">
            🎉 Hari Libur
        </a>
        <a href="<?= base_url('admin/setting/umum') ?>" class="min-w-max px-6 py-4 rounded-2xl font-bold transition <?= ($activeTab === 'umum' || $activeTab === 'setting') ? 'bg-gradient-to-r from-blue-600 to-blue-500 text-white shadow-lg shadow-blue-500/20' : 'bg-slate-100 hover:bg-slate-200 text-slate-700' ?>">
            🔑 Akun & Keamanan
        </a>
        <a href="<?= base_url('admin/setting/notifikasi') ?>" class="min-w-max px-6 py-4 rounded-2xl font-bold transition <?= ($activeTab === 'notifikasi') ? 'bg-gradient-to-r from-blue-600 to-blue-500 text-white shadow-lg shadow-blue-500/20' : 'bg-slate-100 hover:bg-slate-200 text-slate-700' ?>">
            🔔 Notifikasi
        </a>
    </div>
</div>

<!-- CONTENT -->
<form id="form-setting-absensi" action="<?= base_url('admin/setting/absensi/save') ?>" method="POST">
    <div class="grid grid-cols-1 xl:grid-cols-12 gap-7">

        <!-- LEFT -->
        <div class="xl:col-span-8 space-y-7">

            <!-- JAM OPERASIONAL -->
            <div class="bg-white rounded-[36px] p-8 border border-slate-100 shadow-sm">
                <div class="flex items-center gap-4 mb-8">
                    <div class="w-16 h-16 rounded-3xl bg-blue-100 flex items-center justify-center text-3xl">
                        ⏰
                    </div>
                    <div>
                        <h2 class="text-[32px] font-extrabold text-slate-900">
                            Jam Kerja Utama
                        </h2>
                        <p class="text-slate-400 text-[14px]">
                            Pengaturan jam masuk, pulang, dan batas minimal jam kerja
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-[14px] font-semibold text-slate-700 mb-3">
                            Jam Masuk
                        </label>
                        <input
                            type="time"
                            name="jam_masuk"
                            value="08:00"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none focus:border-blue-500 focus:bg-white transition text-slate-800"
                        >
                    </div>

                    <div>
                        <label class="block text-[14px] font-semibold text-slate-700 mb-3">
                            Jam Pulang
                        </label>
                        <input
                            type="time"
                            name="jam_pulang"
                            value="16:00"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none focus:border-blue-500 focus:bg-white transition text-slate-800"
                        >
                    </div>

                    <div>
                        <label class="block text-[14px] font-semibold text-slate-700 mb-3">
                            Minimal Jam Kerja
                        </label>
                        <div class="relative">
                            <input
                                type="number"
                                name="minimal_jam_kerja"
                                value="8"
                                min="1"
                                max="24"
                                class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none focus:border-blue-500 focus:bg-white transition text-slate-800 pr-16"
                            >
                            <span class="absolute right-5 top-1/2 -translate-y-1/2 text-slate-400 font-semibold text-[14px]">Jam</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- KETERLAMBATAN & AUTO ALFA -->
            <div class="bg-white rounded-[36px] p-8 border border-slate-100 shadow-sm">
                <div class="flex items-center gap-4 mb-8">
                    <div class="w-16 h-16 rounded-3xl bg-yellow-100 flex items-center justify-center text-3xl">
                        ⏱️
                    </div>
                    <div>
                        <h2 class="text-[32px] font-extrabold text-slate-900">
                            Disiplin & Ketidakhadiran
                        </h2>
                        <p class="text-slate-400 text-[14px]">
                            Toleransi keterlambatan dan penentuan absensi otomatis (Auto Alfa)
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-[14px] font-semibold text-slate-700 mb-3">
                            Toleransi Keterlambatan
                        </label>
                        <div class="relative">
                            <input
                                type="number"
                                name="toleransi_menit"
                                value="15"
                                class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none focus:border-blue-500 focus:bg-white transition text-slate-800 pr-16"
                            >
                            <span class="absolute right-5 top-1/2 -translate-y-1/2 text-slate-400 font-semibold text-[14px]">Menit</span>
                        </div>
                    </div>

                    <div>
                        <label class="block text-[14px] font-semibold text-slate-700 mb-3">
                            Jam Auto Alfa
                        </label>
                        <input
                            type="time"
                            name="jam_auto_alfa"
                            value="09:00"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none focus:border-blue-500 focus:bg-white transition text-slate-800"
                        >
                    </div>

                    <div>
                        <label class="block text-[14px] font-semibold text-slate-700 mb-3">
                            Status Auto Alfa
                        </label>
                        <select name="status_auto_alfa" class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none focus:border-blue-500 focus:bg-white transition text-slate-800">
                            <option value="1">Aktif</option>
                            <option value="0">Nonaktif</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- MODE HARI KERJA -->
            <div class="bg-white rounded-[36px] p-8 border border-slate-100 shadow-sm">
                <div class="flex items-center gap-4 mb-8">
                    <div class="w-16 h-16 rounded-3xl bg-purple-100 flex items-center justify-center text-3xl">
                        📅
                    </div>
                    <div>
                        <h2 class="text-[32px] font-extrabold text-slate-900">
                            Mode Hari Kerja
                        </h2>
                        <p class="text-slate-400 text-[14px]">
                            Tentukan konfigurasi hari aktif magang di instansi
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <!-- SENIN - JUMAT -->
                    <div class="bg-blue-50 border-2 border-blue-200 rounded-[28px] p-6 flex items-center justify-between">
                        <div>
                            <h3 class="text-[20px] font-extrabold text-slate-900">
                                Senin - Jumat
                            </h3>
                            <p class="text-slate-500 text-[13px] mt-1">
                                Standar 5 hari kerja (Rekomendasi)
                            </p>
                        </div>
                        <div class="w-16 h-9 bg-blue-600 rounded-full flex items-center px-1 cursor-pointer">
                            <div class="w-7 h-7 bg-white rounded-full ml-auto"></div>
                        </div>
                    </div>

                    <!-- SABTU & MINGGU -->
                    <div class="bg-slate-50 border border-slate-200 rounded-[28px] p-6 flex items-center justify-between">
                        <div>
                            <h3 class="text-[20px] font-extrabold text-slate-900">
                                Sabtu - Minggu
                            </h3>
                            <p class="text-slate-500 text-[13px] mt-1">
                                Libur Akhir Pekan
                            </p>
                        </div>
                        <div class="w-16 h-9 bg-slate-300 rounded-full flex items-center px-1 cursor-pointer">
                            <div class="w-7 h-7 bg-white rounded-full"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- RIGHT -->
        <div class="xl:col-span-4 space-y-7">
            <!-- PREVIEW CARD -->
            <div class="bg-gradient-to-br from-blue-600 to-blue-500 rounded-[36px] p-8 text-white shadow-xl shadow-blue-500/20">
                <div class="flex items-center justify-between mb-10">
                    <div>
                        <p class="text-blue-100 text-[14px] mb-2">
                            Mode Kehadiran
                        </p>
                        <h3 class="text-[32px] font-extrabold">
                            Realtime
                        </h3>
                    </div>
                    <div class="w-16 h-16 rounded-3xl bg-white/20 flex items-center justify-center text-3xl">
                        📈
                    </div>
                </div>

                <div class="bg-white/10 rounded-3xl p-6 backdrop-blur-sm">
                    <p class="text-blue-100 text-[14px] mb-2">
                        Status Jam Operasional
                    </p>
                    <h2 class="text-[20px] font-extrabold mb-3">
                        Aktif Terjadwal
                    </h2>
                    <span class="bg-green-400/20 text-green-100 px-4 py-2 rounded-xl inline-block text-[13px] font-bold">
                        Senin s/d Jumat
                    </span>
                </div>
            </div>

            <!-- RINGKASAN SETTING -->
            <div class="bg-white rounded-[36px] p-8 border border-slate-100 shadow-sm">
                <h3 class="text-[24px] font-extrabold text-slate-900 mb-6">
                    Ringkasan Jadwal
                </h3>

                <div class="space-y-5">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-slate-400 text-[13px]">Jam Kerja</p>
                            <h4 class="text-slate-900 font-bold text-[16px]">08:00 - 16:00 WIB</h4>
                        </div>
                        <div class="w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center text-lg">
                            ⏰
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-slate-400 text-[13px]">Batas Toleransi</p>
                            <h4 class="text-slate-900 font-bold text-[16px]">15 Menit</h4>
                        </div>
                        <div class="w-10 h-10 rounded-xl bg-yellow-100 flex items-center justify-center text-lg">
                            ⚠️
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-slate-400 text-[13px]">Batas Absensi</p>
                            <h4 class="text-slate-900 font-bold text-[16px]">09:00 WIB (Alfa)</h4>
                        </div>
                        <div class="w-10 h-10 rounded-xl bg-red-100 flex items-center justify-center text-lg">
                            🚫
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</form>

<?= $this->endSection() ?>
