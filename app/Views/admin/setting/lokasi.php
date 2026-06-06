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
    <button type="submit" form="form-setting-lokasi" class="bg-blue-600 hover:bg-blue-700 transition text-white px-8 py-4 rounded-2xl font-bold shadow-lg shadow-blue-500/20">
        Simpan Lokasi
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
<form id="form-setting-lokasi" action="<?= base_url('admin/setting/lokasi/save') ?>" method="POST">
    <div class="grid grid-cols-1 xl:grid-cols-12 gap-7">

        <!-- LEFT -->
        <div class="xl:col-span-8 space-y-7">

            <!-- KOORDINAT GPS & VALIDASI -->
            <div class="bg-white rounded-[36px] p-8 border border-slate-100 shadow-sm">
                <div class="flex items-center gap-4 mb-8">
                    <div class="w-16 h-16 rounded-3xl bg-blue-100 flex items-center justify-center text-3xl">
                        🌍
                    </div>
                    <div>
                        <h2 class="text-[32px] font-extrabold text-slate-900">
                            Koordinat GPS & Validasi
                        </h2>
                        <p class="text-slate-400 text-[14px]">
                            Titik koordinat kantor, radius absensi, dan validasi status GPS
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-[14px] font-semibold text-slate-700 mb-3">
                            Latitude
                        </label>
                        <input
                            type="text"
                            name="latitude"
                            value="-7.983908"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none focus:border-blue-500 focus:bg-white transition text-slate-800"
                            required
                        >
                    </div>

                    <div>
                        <label class="block text-[14px] font-semibold text-slate-700 mb-3">
                            Longitude
                        </label>
                        <input
                            type="text"
                            name="longitude"
                            value="112.621391"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none focus:border-blue-500 focus:bg-white transition text-slate-800"
                            required
                        >
                    </div>

                    <div>
                        <label class="block text-[14px] font-semibold text-slate-700 mb-3">
                            Radius Absensi
                        </label>
                        <div class="relative">
                            <input
                                type="number"
                                name="radius"
                                value="100"
                                class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none focus:border-blue-500 focus:bg-white transition text-slate-800 pr-16"
                                required
                            >
                            <span class="absolute right-5 top-1/2 -translate-y-1/2 text-slate-400 font-semibold text-[14px]">Meter</span>
                        </div>
                    </div>

                    <div>
                        <label class="block text-[14px] font-semibold text-slate-700 mb-3">
                            Validasi GPS
                        </label>
                        <select name="validasi_gps" class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none focus:border-blue-500 focus:bg-white transition text-slate-800">
                            <option value="1">Aktif (Wajib GPS Cocok)</option>
                            <option value="0">Nonaktif (Bebas Lokasi)</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- MAP PREVIEW -->
            <div class="bg-white rounded-[36px] p-8 border border-slate-100 shadow-sm">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h2 class="text-[24px] font-extrabold text-slate-900">
                            Preview Google Map
                        </h2>
                        <p class="text-slate-400 text-[13px]">
                            Lokasi presensi kantor Bakorwil III Malang
                        </p>
                    </div>
                </div>

                <!-- MAP FRAME -->
                <div class="rounded-[28px] overflow-hidden border border-slate-200 h-[400px] relative bg-slate-100">
                    <iframe
                        src="https://maps.google.com/maps?q=-7.983908,112.621391&z=17&output=embed"
                        class="w-full h-full border-0"
                        loading="lazy"
                    ></iframe>
                </div>
            </div>

        </div>

        <!-- RIGHT -->
        <div class="xl:col-span-4 space-y-7">
            <!-- STATUS CARD -->
            <div class="bg-gradient-to-br from-blue-600 to-blue-500 rounded-[36px] p-8 text-white shadow-xl shadow-blue-500/20">
                <div class="flex items-center justify-between mb-10">
                    <div>
                        <p class="text-blue-100 text-[14px] mb-2">
                            Akurasi Radius
                        </p>
                        <h3 class="text-[32px] font-extrabold">
                            100m
                        </h3>
                    </div>
                    <div class="w-16 h-16 rounded-3xl bg-white/20 flex items-center justify-center text-3xl">
                        📍
                    </div>
                </div>

                <div class="bg-white/10 rounded-3xl p-6 backdrop-blur-sm">
                    <p class="text-blue-100 text-[14px] mb-2">
                        Status Validasi GPS
                    </p>
                    <h2 class="text-[20px] font-extrabold mb-3">
                        Validasi Aktif
                    </h2>
                    <span class="bg-green-400/20 text-green-100 px-4 py-2 rounded-xl inline-block text-[13px] font-bold">
                        GPS Locker Terintegrasi
                    </span>
                </div>
            </div>

            <!-- WARNING -->
            <div class="bg-red-50 border border-red-100 rounded-[36px] p-7">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-red-100 flex items-center justify-center text-xl flex-shrink-0">
                        ⚠️
                    </div>
                    <div>
                        <h3 class="text-red-700 font-extrabold text-[18px] mb-1">
                            Perhatian
                        </h3>
                        <p class="text-red-600 text-[13px] leading-relaxed">
                            Perubahan titik koordinat atau radius secara acak akan mengakibatkan seluruh peserta magang tidak dapat melakukan absensi. Pastikan titik koordinat sesuai dengan kantor Bakorwil III Malang.
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</form>

<?= $this->endSection() ?>
