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
    <button class="bg-blue-600 hover:bg-blue-700 transition text-white px-8 py-4 rounded-2xl font-bold shadow-lg shadow-blue-500/20">
        Simpan Jam Kerja
    </button>
</div>

<!-- TAB NAVIGATION -->
<div class="bg-white rounded-[32px] p-4 border border-slate-100 shadow-sm mb-8">
    <div class="flex items-center gap-4 overflow-x-auto">
        <a href="<?= base_url('admin/setting/umum') ?>" class="min-w-max px-6 py-4 rounded-2xl font-bold transition <?= ($activeTab === 'umum') ? 'bg-gradient-to-r from-blue-600 to-blue-500 text-white shadow-lg shadow-blue-500/20' : 'bg-slate-100 hover:bg-slate-200 text-slate-700' ?>">
            ⚙️ Umum
        </a>
        <a href="<?= base_url('admin/setting/lokasi') ?>" class="min-w-max px-6 py-4 rounded-2xl font-bold transition <?= ($activeTab === 'lokasi') ? 'bg-gradient-to-r from-blue-600 to-blue-500 text-white shadow-lg shadow-blue-500/20' : 'bg-slate-100 hover:bg-slate-200 text-slate-700' ?>">
            📍 Lokasi GPS
        </a>
        <a href="<?= base_url('admin/setting/absensi') ?>" class="min-w-max px-6 py-4 rounded-2xl font-bold transition <?= ($activeTab === 'absensi') ? 'bg-gradient-to-r from-blue-600 to-blue-500 text-white shadow-lg shadow-blue-500/20' : 'bg-slate-100 hover:bg-slate-200 text-slate-700' ?>">
            🕒 Absensi
        </a>
        <a href="<?= base_url('admin/setting/jamkerja') ?>" class="min-w-max px-6 py-4 rounded-2xl font-bold transition <?= ($activeTab === 'jamkerja') ? 'bg-gradient-to-r from-blue-600 to-blue-500 text-white shadow-lg shadow-blue-500/20' : 'bg-slate-100 hover:bg-slate-200 text-slate-700' ?>">
            📅 Jam Kerja
        </a>
        <a href="<?= base_url('admin/setting/harilibur') ?>" class="min-w-max px-6 py-4 rounded-2xl font-bold transition <?= ($activeTab === 'harilibur') ? 'bg-gradient-to-r from-blue-600 to-blue-500 text-white shadow-lg shadow-blue-500/20' : 'bg-slate-100 hover:bg-slate-200 text-slate-700' ?>">
            🎉 Hari Libur
        </a>
        <a href="<?= base_url('admin/setting/notifikasi') ?>" class="min-w-max px-6 py-4 rounded-2xl font-bold transition <?= ($activeTab === 'notifikasi') ? 'bg-gradient-to-r from-blue-600 to-blue-500 text-white shadow-lg shadow-blue-500/20' : 'bg-slate-100 hover:bg-slate-200 text-slate-700' ?>">
            🔔 Notifikasi
        </a>
    </div>
</div>

<!-- CONTENT -->
<div class="grid grid-cols-12 gap-7">

    <!-- LEFT -->
    <div class="col-span-8 space-y-7">

        <!-- HARI KERJA -->
        <div class="bg-white rounded-[36px] p-8 border border-slate-100 shadow-sm">

            <div class="flex items-center gap-4 mb-8">
                <div class="w-16 h-16 rounded-3xl bg-blue-100 flex items-center justify-center text-3xl">
                    📅
                </div>
                <div>
                    <h2 class="text-[32px] font-extrabold text-slate-900">
                        Pengaturan Hari Kerja
                    </h2>
                    <p class="text-slate-400 text-[14px]">
                        Tentukan hari operasional instansi
                    </p>
                </div>
            </div>

            <!-- DAYS GRID -->
            <div class="grid grid-cols-2 gap-5">

                <!-- SENIN -->
                <div class="bg-blue-50 border-2 border-blue-200 rounded-[28px] p-6 flex items-center justify-between">
                    <div>
                        <h3 class="text-[22px] font-extrabold text-slate-900">
                            Senin
                        </h3>
                        <p class="text-slate-500 text-[13px] mt-1">
                            Hari kerja aktif
                        </p>
                    </div>
                    <div class="w-16 h-9 bg-blue-600 rounded-full flex items-center px-1 cursor-pointer">
                        <div class="w-7 h-7 bg-white rounded-full ml-auto"></div>
                    </div>
                </div>

                <!-- SELASA -->
                <div class="bg-blue-50 border-2 border-blue-200 rounded-[28px] p-6 flex items-center justify-between">
                    <div>
                        <h3 class="text-[22px] font-extrabold text-slate-900">
                            Selasa
                        </h3>
                        <p class="text-slate-500 text-[13px] mt-1">
                            Hari kerja aktif
                        </p>
                    </div>
                    <div class="w-16 h-9 bg-blue-600 rounded-full flex items-center px-1 cursor-pointer">
                        <div class="w-7 h-7 bg-white rounded-full ml-auto"></div>
                    </div>
                </div>

                <!-- RABU -->
                <div class="bg-blue-50 border-2 border-blue-200 rounded-[28px] p-6 flex items-center justify-between">
                    <div>
                        <h3 class="text-[22px] font-extrabold text-slate-900">
                            Rabu
                        </h3>
                        <p class="text-slate-500 text-[13px] mt-1">
                            Hari kerja aktif
                        </p>
                    </div>
                    <div class="w-16 h-9 bg-blue-600 rounded-full flex items-center px-1 cursor-pointer">
                        <div class="w-7 h-7 bg-white rounded-full ml-auto"></div>
                    </div>
                </div>

                <!-- KAMIS -->
                <div class="bg-blue-50 border-2 border-blue-200 rounded-[28px] p-6 flex items-center justify-between">
                    <div>
                        <h3 class="text-[22px] font-extrabold text-slate-900">
                            Kamis
                        </h3>
                        <p class="text-slate-500 text-[13px] mt-1">
                            Hari kerja aktif
                        </p>
                    </div>
                    <div class="w-16 h-9 bg-blue-600 rounded-full flex items-center px-1 cursor-pointer">
                        <div class="w-7 h-7 bg-white rounded-full ml-auto"></div>
                    </div>
                </div>

                <!-- JUMAT -->
                <div class="bg-blue-50 border-2 border-blue-200 rounded-[28px] p-6 flex items-center justify-between">
                    <div>
                        <h3 class="text-[22px] font-extrabold text-slate-900">
                            Jumat
                        </h3>
                        <p class="text-slate-500 text-[13px] mt-1">
                            Hari kerja aktif
                        </p>
                    </div>
                    <div class="w-16 h-9 bg-blue-600 rounded-full flex items-center px-1 cursor-pointer">
                        <div class="w-7 h-7 bg-white rounded-full ml-auto"></div>
                    </div>
                </div>

                <!-- SABTU -->
                <div class="bg-slate-50 border-2 border-slate-200 rounded-[28px] p-6 flex items-center justify-between">
                    <div>
                        <h3 class="text-[22px] font-extrabold text-slate-900">
                            Sabtu
                        </h3>
                        <p class="text-slate-500 text-[13px] mt-1">
                            Hari libur
                        </p>
                    </div>
                    <div class="w-16 h-9 bg-slate-300 rounded-full flex items-center px-1 cursor-pointer">
                        <div class="w-7 h-7 bg-white rounded-full"></div>
                    </div>
                </div>

                <!-- MINGGU -->
                <div class="bg-slate-50 border-2 border-slate-200 rounded-[28px] p-6 flex items-center justify-between">
                    <div>
                        <h3 class="text-[22px] font-extrabold text-slate-900">
                            Minggu
                        </h3>
                        <p class="text-slate-500 text-[13px] mt-1">
                            Hari libur
                        </p>
                    </div>
                    <div class="w-16 h-9 bg-slate-300 rounded-full flex items-center px-1 cursor-pointer">
                        <div class="w-7 h-7 bg-white rounded-full"></div>
                    </div>
                </div>

            </div>

        </div>

        <!-- MODE OPERASIONAL -->
        <div class="bg-white rounded-[36px] p-8 border border-slate-100 shadow-sm">

            <div class="flex items-center gap-4 mb-8">
                <div class="w-16 h-16 rounded-3xl bg-purple-100 flex items-center justify-center text-3xl">
                    🏢
                </div>
                <div>
                    <h2 class="text-[32px] font-extrabold text-slate-900">
                        Mode Operasional
                    </h2>
                    <p class="text-slate-400 text-[14px]">
                        Pengaturan sistem kerja instansi
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-3 gap-5">

                <!-- WFO (ACTIVE) -->
                <div class="bg-blue-600 text-white rounded-[28px] p-6 border-2 border-blue-600 cursor-pointer">
                    <div class="text-4xl mb-5">
                        🏢
                    </div>
                    <h3 class="text-[24px] font-extrabold mb-2">
                        WFO
                    </h3>
                    <p class="text-blue-100 text-[13px] leading-relaxed">
                        Anggota wajib hadir ke kantor
                    </p>
                </div>

                <!-- HYBRID -->
                <div class="bg-white rounded-[28px] p-6 border-2 border-slate-200 cursor-pointer hover:border-blue-300 transition">
                    <div class="text-4xl mb-5">
                        🔄
                    </div>
                    <h3 class="text-[24px] font-extrabold text-slate-900 mb-2">
                        Hybrid
                    </h3>
                    <p class="text-slate-500 text-[13px] leading-relaxed">
                        Kombinasi WFO dan WFH
                    </p>
                </div>

                <!-- WFH -->
                <div class="bg-white rounded-[28px] p-6 border-2 border-slate-200 cursor-pointer hover:border-blue-300 transition">
                    <div class="text-4xl mb-5">
                        🏠
                    </div>
                    <h3 class="text-[24px] font-extrabold text-slate-900 mb-2">
                        WFH
                    </h3>
                    <p class="text-slate-500 text-[13px] leading-relaxed">
                        Anggota bekerja dari rumah
                    </p>
                </div>

            </div>

        </div>

    </div>

    <!-- RIGHT -->
    <div class="col-span-4 space-y-7">

        <!-- STATUS -->
        <div class="bg-gradient-to-br from-blue-600 to-blue-500 rounded-[36px] p-8 text-white shadow-xl shadow-blue-500/20">

            <div class="flex items-center justify-between mb-10">
                <div>
                    <p class="text-blue-100 text-[14px] mb-2">
                        Hari Aktif
                    </p>
                    <h3 class="text-[42px] font-extrabold">
                        5 Hari
                    </h3>
                </div>
                <div class="w-16 h-16 rounded-3xl bg-white/20 flex items-center justify-center text-3xl">
                    📅
                </div>
            </div>

            <div class="bg-white/10 rounded-3xl p-6 backdrop-blur-sm">
                <p class="text-blue-100 text-[14px] mb-2">
                    Status Operasional
                </p>
                <h2 class="text-[24px] font-extrabold mb-3">
                    Sistem Aktif
                </h2>
                <div class="bg-green-400/20 text-green-100 px-5 py-3 rounded-2xl inline-block text-[14px] font-bold">
                    Operasional Senin - Jumat
                </div>
            </div>

        </div>

        <!-- RINGKASAN -->
        <div class="bg-white rounded-[36px] p-8 border border-slate-100 shadow-sm">

            <h3 class="text-[28px] font-extrabold text-slate-900 mb-8">
                Ringkasan Hari Kerja
            </h3>

            <div class="space-y-6">

                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-slate-400 text-[13px]">
                            Hari Aktif
                        </p>
                        <h4 class="text-slate-900 font-bold text-[18px]">
                            Senin - Jumat
                        </h4>
                    </div>
                    <div class="w-12 h-12 rounded-2xl bg-blue-100 flex items-center justify-center text-xl">
                        ✅
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-slate-400 text-[13px]">
                            Hari Libur
                        </p>
                        <h4 class="text-slate-900 font-bold text-[18px]">
                            Sabtu & Minggu
                        </h4>
                    </div>
                    <div class="w-12 h-12 rounded-2xl bg-red-100 flex items-center justify-center text-xl">
                        🚫
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-slate-400 text-[13px]">
                            Mode Kerja
                        </p>
                        <h4 class="text-slate-900 font-bold text-[18px]">
                            Work From Office
                        </h4>
                    </div>
                    <div class="w-12 h-12 rounded-2xl bg-purple-100 flex items-center justify-center text-xl">
                        🏢
                    </div>
                </div>

            </div>

        </div>

        <!-- WARNING -->
        <div class="bg-red-50 border border-red-100 rounded-[36px] p-7">
            <div class="flex items-start gap-4">
                <div class="w-14 h-14 rounded-2xl bg-red-100 flex items-center justify-center text-2xl flex-shrink-0">
                    ⚠️
                </div>
                <div>
                    <h3 class="text-red-600 font-extrabold text-[22px] mb-2">
                        Perhatian
                    </h3>
                    <p class="text-red-500 text-[14px] leading-relaxed">
                        Hari kerja aktif akan mempengaruhi seluruh jadwal absensi dan perhitungan kehadiran anggota magang.
                    </p>
                </div>
            </div>
        </div>

    </div>

</div>

<?= $this->endSection() ?>
