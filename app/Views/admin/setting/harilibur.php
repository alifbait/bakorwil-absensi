<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>

<?= view('components/alert'); ?>

<?php
$uri = service('uri');
$activeTab = $uri->getSegment(3, 'harilibur');
?>

<!-- HEADER -->
<div class="flex items-center justify-between mb-8">

    <div>
        <p class="text-slate-400 text-[14px] mb-1">
            Konfigurasi Sistem Absensi Magang
        </p>

        <h1 class="text-[56px] font-extrabold text-slate-900 leading-none">
            Setting Hari Libur
        </h1>
    </div>

</div>

<!-- TAB -->
<div class="bg-white rounded-[32px] p-4 border border-slate-100 shadow-sm mb-8">

    <div class="flex items-center gap-4 overflow-x-auto">

        <a href="<?= base_url('admin/setting/absensi') ?>"
            class="min-w-max px-6 py-4 rounded-2xl font-bold transition <?= ($activeTab === 'absensi')
                                                                                ? 'bg-gradient-to-r from-blue-600 to-blue-500 text-white shadow-lg shadow-blue-500/20'
                                                                                : 'bg-slate-100 hover:bg-slate-200 text-slate-700' ?>">

            🕒 Absensi

        </a>

        <a href="<?= base_url('admin/setting/lokasi') ?>"
            class="min-w-max px-6 py-4 rounded-2xl font-bold transition <?= ($activeTab === 'lokasi')
                                                                                ? 'bg-gradient-to-r from-blue-600 to-blue-500 text-white shadow-lg shadow-blue-500/20'
                                                                                : 'bg-slate-100 hover:bg-slate-200 text-slate-700' ?>">

            📍 Lokasi GPS

        </a>

        <a href="<?= base_url('admin/setting/harilibur') ?>"
            class="min-w-max px-6 py-4 rounded-2xl font-bold transition <?= ($activeTab === 'harilibur')
                                                                                ? 'bg-gradient-to-r from-blue-600 to-blue-500 text-white shadow-lg shadow-blue-500/20'
                                                                                : 'bg-slate-100 hover:bg-slate-200 text-slate-700' ?>">

            🎉 Hari Libur

        </a>

        <a href="<?= base_url('admin/setting/umum') ?>"
            class="min-w-max px-6 py-4 rounded-2xl font-bold transition <?= ($activeTab === 'umum')
                                                                                ? 'bg-gradient-to-r from-blue-600 to-blue-500 text-white shadow-lg shadow-blue-500/20'
                                                                                : 'bg-slate-100 hover:bg-slate-200 text-slate-700' ?>">

            🔑 Akun & Keamanan

        </a>

        <a href="<?= base_url('admin/setting/notifikasi') ?>"
            class="min-w-max px-6 py-4 rounded-2xl font-bold transition <?= ($activeTab === 'notifikasi')
                                                                                ? 'bg-gradient-to-r from-blue-600 to-blue-500 text-white shadow-lg shadow-blue-500/20'
                                                                                : 'bg-slate-100 hover:bg-slate-200 text-slate-700' ?>">

            🔔 Notifikasi

        </a>

    </div>

</div>

<!-- CONTENT -->
<div class="grid grid-cols-1 xl:grid-cols-12 gap-7">

    <!-- LEFT -->
    <div class="xl:col-span-8 space-y-7">

        <!-- DAFTAR LIBUR -->
        <div class="bg-white rounded-[36px] border border-slate-100 shadow-sm overflow-hidden">

            <div class="p-8 border-b border-slate-100">

                <h2 class="text-[34px] font-extrabold text-slate-900 leading-tight">
                    Daftar Hari Libur
                </h2>

                <p class="text-slate-400 text-[14px] mt-1">
                    Hari libur nasional dan libur internal instansi
                </p>

            </div>

            <div class="overflow-x-auto">

                <table class="w-full">

                    <thead class="bg-slate-50">

                        <tr>

                            <th class="px-8 py-5 text-left text-[13px] font-bold text-slate-500">
                                Nama Hari Libur
                            </th>

                            <th class="px-8 py-5 text-left text-[13px] font-bold text-slate-500">
                                Tanggal
                            </th>

                            <th class="px-8 py-5 text-left text-[13px] font-bold text-slate-500">
                                Tipe
                            </th>

                            <th class="px-8 py-5 text-center text-[13px] font-bold text-slate-500">
                                Aksi
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        <!-- ITEM -->
                        <tr class="border-t border-slate-100 hover:bg-slate-50/50 transition">

                            <td class="px-8 py-5">

                                <h3 class="font-bold text-slate-900">
                                    Tahun Baru Islam 1448 H
                                </h3>

                                <p class="text-slate-400 text-[12px] mt-1">
                                    Hari Libur Nasional
                                </p>

                            </td>

                            <td class="px-8 py-5 text-slate-600 font-medium">
                                17 Juli 2026
                            </td>

                            <td class="px-8 py-5">

                                <span class="bg-blue-100 text-blue-700 px-4 py-2 rounded-xl text-sm font-bold">
                                    Nasional
                                </span>

                            </td>

                            <td class="px-8 py-5 text-center">

                                <button
                                    class="bg-red-50 hover:bg-red-100 transition text-red-600 px-5 py-3 rounded-2xl text-sm font-bold">

                                    🗑️ Hapus

                                </button>

                            </td>

                        </tr>

                        <!-- ITEM -->
                        <tr class="border-t border-slate-100 hover:bg-slate-50/50 transition">

                            <td class="px-8 py-5">

                                <h3 class="font-bold text-slate-900">
                                    Hari Kemerdekaan RI
                                </h3>

                                <p class="text-slate-400 text-[12px] mt-1">
                                    HUT RI Ke-81
                                </p>

                            </td>

                            <td class="px-8 py-5 text-slate-600 font-medium">
                                17 Agustus 2026
                            </td>

                            <td class="px-8 py-5">

                                <span class="bg-blue-100 text-blue-700 px-4 py-2 rounded-xl text-sm font-bold">
                                    Nasional
                                </span>

                            </td>

                            <td class="px-8 py-5 text-center">

                                <button
                                    class="bg-red-50 hover:bg-red-100 transition text-red-600 px-5 py-3 rounded-2xl text-sm font-bold">

                                    🗑️ Hapus

                                </button>

                            </td>

                        </tr>

                        <!-- ITEM -->
                        <tr class="border-t border-slate-100 hover:bg-slate-50/50 transition">

                            <td class="px-8 py-5">

                                <h3 class="font-bold text-slate-900">
                                    Evaluasi Magang Internal
                                </h3>

                                <p class="text-slate-400 text-[12px] mt-1">
                                    Libur Khusus Internal Bakorwil
                                </p>

                            </td>

                            <td class="px-8 py-5 text-slate-600 font-medium">
                                10 September 2026
                            </td>

                            <td class="px-8 py-5">

                                <span class="bg-purple-100 text-purple-700 px-4 py-2 rounded-xl text-sm font-bold">
                                    Internal
                                </span>

                            </td>

                            <td class="px-8 py-5 text-center">

                                <button
                                    class="bg-red-50 hover:bg-red-100 transition text-red-600 px-5 py-3 rounded-2xl text-sm font-bold">

                                    🗑️ Hapus

                                </button>

                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

        <!-- FORM -->
        <form
            action="<?= base_url('admin/setting/harilibur/save') ?>"
            method="POST"
            class="bg-white rounded-[36px] p-8 border border-slate-100 shadow-sm">

            <div class="flex items-center gap-4 mb-8">

                <div class="w-16 h-16 rounded-3xl bg-blue-100 flex items-center justify-center text-3xl">
                    ➕
                </div>

                <div>

                    <h2 class="text-[34px] font-extrabold text-slate-900">
                        Tambah Hari Libur
                    </h2>

                    <p class="text-slate-400 text-[14px]">
                        Tambahkan hari libur custom di luar kalender nasional
                    </p>

                </div>

            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div class="md:col-span-2">

                    <label class="block text-[14px] font-semibold text-slate-700 mb-3">
                        Nama Hari Libur
                    </label>

                    <input
                        type="text"
                        name="nama_libur"
                        placeholder="Contoh: Evaluasi Peserta Magang"
                        class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none focus:border-blue-500 focus:bg-white transition">

                </div>

                <div>

                    <label class="block text-[14px] font-semibold text-slate-700 mb-3">
                        Tanggal Libur
                    </label>

                    <input
                        type="date"
                        name="tanggal_libur"
                        class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none focus:border-blue-500 focus:bg-white transition">

                </div>

                <div>

                    <label class="block text-[14px] font-semibold text-slate-700 mb-3">
                        Tipe Libur
                    </label>

                    <select
                        name="tipe_libur"
                        class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none focus:border-blue-500 focus:bg-white transition">

                        <option value="Internal">
                            Internal Bakorwil
                        </option>

                        <option value="Khusus">
                            Libur Khusus Magang
                        </option>

                    </select>

                </div>

                <div class="md:col-span-2">

                    <label class="block text-[14px] font-semibold text-slate-700 mb-3">
                        Keterangan
                    </label>

                    <textarea
                        name="keterangan"
                        rows="4"
                        placeholder="Masukkan keterangan tambahan..."
                        class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none resize-none focus:border-blue-500 focus:bg-white transition"></textarea>

                </div>

            </div>

            <div class="flex justify-end mt-8">

                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 transition text-white px-8 py-4 rounded-2xl font-bold shadow-lg shadow-blue-500/20">

                    Tambah Hari Libur

                </button>

            </div>

        </form>

        <!-- API NASIONAL -->
        <div class="bg-white rounded-[36px] p-8 border border-slate-100 shadow-sm">

            <div class="flex items-center gap-4 mb-6">

                <div class="w-16 h-16 rounded-3xl bg-blue-100 flex items-center justify-center text-3xl">
                    📅
                </div>

                <div>

                    <h2 class="text-[34px] font-extrabold text-slate-900">
                        Kalender Nasional
                    </h2>

                    <p class="text-slate-400 text-[14px]">
                        Data hari libur nasional otomatis dari API kalender Indonesia
                    </p>

                </div>

            </div>

            <div class="flex items-center gap-3 mb-6">

                <span class="bg-green-100 text-green-700 px-4 py-2 rounded-xl text-[12px] font-bold">
                    Auto Sync API
                </span>

                <span class="text-slate-400 text-[12px]">
                    Sinkron otomatis kalender nasional Indonesia
                </span>

            </div>

            <div class="bg-slate-50 border border-slate-200 rounded-[28px] p-6 space-y-4">

                <div class="flex items-center justify-between border-b border-slate-200 pb-3">

                    <span class="text-[14px] font-bold text-slate-800">
                        1 Januari 2026
                    </span>

                    <span class="text-[14px] text-slate-500 font-semibold">
                        Tahun Baru Masehi
                    </span>

                </div>

                <div class="flex items-center justify-between border-b border-slate-200 pb-3">

                    <span class="text-[14px] font-bold text-slate-800">
                        17 Februari 2026
                    </span>

                    <span class="text-[14px] text-slate-500 font-semibold">
                        Isra Mikraj Nabi Muhammad SAW
                    </span>

                </div>

                <div class="flex items-center justify-between">

                    <span class="text-[14px] font-bold text-slate-800">
                        17 Agustus 2026
                    </span>

                    <span class="text-[14px] text-slate-500 font-semibold">
                        Hari Kemerdekaan RI
                    </span>

                </div>

            </div>

        </div>

    </div>

    <!-- RIGHT -->
    <div class="xl:col-span-4 space-y-7">

        <!-- CARD -->
        <div class="bg-gradient-to-br from-blue-600 to-blue-500 rounded-[36px] p-8 text-white shadow-xl shadow-blue-500/20">

            <div class="flex items-center justify-between mb-10">

                <div>

                    <p class="text-blue-100 text-[14px] mb-2">
                        Total Hari Libur
                    </p>

                    <h3 class="text-[42px] font-extrabold">
                        16 Hari
                    </h3>

                </div>

                <div class="w-16 h-16 rounded-3xl bg-white/20 flex items-center justify-center text-3xl">
                    🎉
                </div>

            </div>

            <div class="bg-white/10 rounded-3xl p-6">

                <p class="text-blue-100 text-[14px] mb-2">
                    Libur Terdekat
                </p>

                <h2 class="text-[22px] font-extrabold mb-3">
                    Tahun Baru Islam
                </h2>

                <div class="bg-green-400/20 text-green-100 px-4 py-2 rounded-xl inline-block text-[13px] font-bold">
                    Tersisa 41 Hari Lagi
                </div>

            </div>

        </div>

        <!-- LIST -->
        <div class="bg-white rounded-[36px] p-8 border border-slate-100 shadow-sm">

            <h3 class="text-[24px] font-extrabold text-slate-900 mb-6">
                Libur Terdekat
            </h3>

            <div class="space-y-5">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-slate-400 text-[12px]">
                            17 Juli 2026
                        </p>

                        <h4 class="text-slate-900 font-bold text-[15px]">
                            Tahun Baru Islam
                        </h4>

                    </div>

                    <span class="bg-blue-50 text-blue-700 text-[11px] font-extrabold px-3 py-1 rounded-xl">
                        Nasional
                    </span>

                </div>

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-slate-400 text-[12px]">
                            17 Agustus 2026
                        </p>

                        <h4 class="text-slate-900 font-bold text-[15px]">
                            Hari Kemerdekaan RI
                        </h4>

                    </div>

                    <span class="bg-blue-50 text-blue-700 text-[11px] font-extrabold px-3 py-1 rounded-xl">
                        Nasional
                    </span>

                </div>

            </div>

        </div>

    </div>

</div>

<?= $this->endSection() ?>