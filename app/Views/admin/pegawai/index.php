<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>

<div class="mb-6 flex items-center justify-between">

    <div>

        <h1 class="text-[42px] font-extrabold text-slate-900 leading-none">
            Data Pegawai
        </h1>

        <p class="text-slate-400 text-[14px] mt-2">
            Master data ASN & pegawai Bakorwil
        </p>

    </div>

    <a href="<?= base_url('admin/pegawai/create') ?>"
        class="bg-blue-600 hover:bg-blue-700 transition text-white px-7 py-4 rounded-2xl font-semibold text-[14px] shadow-lg shadow-blue-500/20 inline-flex items-center gap-2">

        + Tambah Pegawai

    </a>

</div>

<!-- FILTER -->
<form action="<?= base_url('admin/pegawai') ?>" method="GET" class="mb-6">

    <div class="bg-white rounded-[32px] border border-slate-100 shadow-sm p-6 flex items-center justify-between">

        <div class="flex items-center gap-4">

            <!-- SEARCH -->
            <div class="bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 w-[320px] flex items-center gap-3">

                <span class="text-slate-400 text-lg">
                    🔍
                </span>

                <input type="text" name="search" value="<?= $search ?? ''; ?>" placeholder="Cari pegawai..."
                    class="w-full bg-transparent outline-none text-[14px] text-slate-700">

            </div>

            <!-- STATUS -->
            <select name="status" class="px-5 py-4 rounded-2xl border border-slate-200 bg-white outline-none">

                <option value="">
                    Semua Status
                </option>

                <option value="Aktif" <?= ($status ?? '') == 'Aktif' ? 'selected' : ''; ?>>
                    Aktif
                </option>

                <option value="Nonaktif" <?= ($status ?? '') == 'Nonaktif' ? 'selected' : ''; ?>>
                    Nonaktif
                </option>

            </select>

        </div>

        <!-- BUTTON -->
        <button type="submit"
            class="bg-blue-600 hover:bg-blue-700 transition text-white px-7 py-4 rounded-2xl font-semibold text-[14px]">

            Filter Data

        </button>

    </div>

</form>

<?php if (session()->getFlashdata('success')): ?>

    <div class="mb-6 bg-green-100 border border-green-200 text-green-700 px-6 py-5 rounded-2xl font-semibold">

        <?= session()->getFlashdata('success'); ?>

    </div>

<?php endif; ?>

<!-- TABLE -->
<div class="bg-white rounded-[32px] border border-slate-100 shadow-sm overflow-hidden">

    <!-- HEADER -->
    <div class="px-7 py-6 border-b border-slate-100 flex items-center justify-between">

        <div>

            <h3 class="text-slate-900 font-bold text-[26px]">
                Data ASN & Pegawai
            </h3>

            <p class="text-slate-400 text-[14px]">
                Monitoring seluruh pegawai aktif
            </p>

        </div>

        <button
            class="bg-orange-500 hover:bg-orange-600 transition text-white px-6 py-3 rounded-2xl text-[14px] font-semibold">

            Export Excel

        </button>

    </div>

    <!-- TABLE -->
    <div class="overflow-x-auto">

        <table class="w-full">

            <thead class="bg-slate-50">

                <tr>

                    <th class="px-7 py-5 text-left text-[13px] text-slate-500 font-bold">
                        Pegawai
                    </th>

                    <th class="px-7 py-5 text-left text-[13px] text-slate-500 font-bold">
                        NIM
                    </th>

                    <th class="px-7 py-5 text-left text-[13px] text-slate-500 font-bold">
                        Divisi
                    </th>

                    <th class="px-7 py-5 text-left text-[13px] text-slate-500 font-bold">
                        Status
                    </th>

                    <th class="px-7 py-5 text-center text-[13px] text-slate-500 font-bold">
                        Aksi
                    </th>

                </tr>

            </thead>

            <tbody>

                <?php foreach ($pegawai as $key => $p): ?>

                    <tr class="border-t border-slate-100 hover:bg-slate-50 transition">

                        <!-- PEGAWAI -->
                        <td class="px-6 py-5">

                            <div class="flex items-center gap-4">

                                <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?q=80&w=1200&auto=format&fit=crop"
                                    class="w-14 h-14 rounded-2xl object-cover">

                                <div>

                                    <h3 class="font-bold text-slate-900">
                                        <?= $p['nama']; ?>
                                    </h3>

                                </div>

                            </div>

                        </td>

                        <!-- NIM -->
                        <td class="px-6 py-5 text-slate-600">
                            <?= $p['nim']; ?>
                        </td>

                        <!-- DIVISI -->
                        <td class="px-6 py-5 text-slate-600">
                            <?= $p['divisi']; ?>
                        </td>

                        <!-- STATUS -->
                        <td class="px-6 py-5">

                            <span class="px-4 py-2 rounded-xl text-sm font-semibold
                                <?= $p['status'] == 'Aktif'
                                    ? 'bg-green-100 text-green-700'
                                    : 'bg-red-100 text-red-700'; ?>">

                                <?= $p['status']; ?>

                            </span>

                        </td>

                        <!-- AKSI -->
                        <td class="px-6 py-5 text-center">

                            <a href="<?= base_url('admin/pegawai/detail/' . $key) ?>"
                                class="bg-slate-100 hover:bg-slate-200 transition px-5 h-11 rounded-xl font-semibold text-slate-700 text-sm inline-flex items-center justify-center">

                                Detail

                            </a>

                        </td>

                    </tr>

                <?php endforeach; ?>

            </tbody>

        </table>

    </div>

    <!-- FOOTER -->
    <div class="px-7 py-5 border-t border-slate-100 flex items-center justify-between">

        <p class="text-slate-400 text-[14px]">
            Menampilkan 1-10 data pegawai
        </p>

        <p class="text-slate-400 text-[14px]">
            Menampilkan <?= count($pegawai); ?> data pegawai
        </p>

    </div>

</div>

<?= $this->endSection() ?>