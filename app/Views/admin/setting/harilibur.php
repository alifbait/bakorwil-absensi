<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>

<?= view('components/alert'); ?>

<?php
$uri = service('uri');
$activeTab = $uri->getSegment(3, 'harilibur');
?>

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
<div class="bg-white rounded-[32px] p-4 border border-slate-100 shadow-sm mb-8 overflow-x-auto">

    <div class="flex items-center gap-4 min-w-max">

        <?php
        $tabs = [
            'absensi' => '🕒 Absensi',
            'lokasi' => '📍 Lokasi GPS',
            'harilibur' => '🎉 Hari Libur',
            'umum' => '🔑 Akun & Keamanan',
            'notifikasi' => '🔔 Notifikasi',
        ];
        ?>

        <?php foreach ($tabs as $key => $label): ?>

            <a
                href="<?= base_url('admin/setting/' . $key) ?>"
                class="px-6 py-4 rounded-2xl font-bold transition <?= ($activeTab === $key)
                    ? 'bg-gradient-to-r from-blue-600 to-blue-500 text-white shadow-lg shadow-blue-500/20'
                    : 'bg-slate-100 hover:bg-slate-200 text-slate-700' ?>">

                <?= $label ?>

            </a>

        <?php endforeach; ?>

    </div>

</div>

<div class="grid grid-cols-1 xl:grid-cols-12 gap-7">

    <!-- LEFT -->
    <div class="xl:col-span-8 space-y-7">

        <!-- TABLE -->
        <div class="bg-white rounded-[36px] border border-slate-100 shadow-sm overflow-hidden">

            <div class="p-8 border-b border-slate-100">

                <h2 class="text-[34px] font-extrabold text-slate-900">
                    Daftar Hari Libur
                </h2>

                <p class="text-slate-400 text-[14px] mt-1">
                    Hari libur nasional dan internal instansi
                </p>

            </div>

            <div class="overflow-x-auto">

                <table class="w-full">

                    <thead class="bg-slate-50">

                        <tr>

                            <th class="px-8 py-5 text-left text-[13px] font-bold text-slate-500">
                                Hari Libur
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

                        <?php if (!empty($hariLibur)) : ?>

                            <?php foreach ($hariLibur as $libur) : ?>

                                <tr class="border-t border-slate-100 hover:bg-slate-50/50 transition">

                                    <td class="px-8 py-5">

                                        <h3 class="font-bold text-slate-900">
                                            <?= esc($libur['nama_libur']) ?>
                                        </h3>

                                        <p class="text-slate-400 text-[12px] mt-1">
                                            <?= esc($libur['keterangan']) ?>
                                        </p>

                                    </td>

                                    <td class="px-8 py-5 text-slate-600 font-medium">

                                        <?= date('d F Y', strtotime($libur['tanggal'])) ?>

                                    </td>

                                    <td class="px-8 py-5">

                                        <span class="bg-blue-100 text-blue-700 px-4 py-2 rounded-xl text-sm font-bold">

                                            <?= esc($libur['tipe']) ?>

                                        </span>

                                    </td>

                                    <td class="px-8 py-5 text-center">

                                        <?php if (empty($libur['is_api'])) : ?>

                                            <a
                                                href="<?= base_url('admin/setting/harilibur/delete/' . $libur['id']) ?>"
                                                onclick="return confirm('Hapus hari libur ini?')"
                                                class="bg-red-50 hover:bg-red-100 transition text-red-600 px-5 py-3 rounded-2xl text-sm font-bold inline-block">

                                                🗑️ Hapus

                                            </a>

                                        <?php else : ?>

                                            <span class="text-slate-400 text-sm font-bold">

                                                API Nasional

                                            </span>

                                        <?php endif; ?>

                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        <?php else : ?>

                            <tr>

                                <td colspan="4" class="px-8 py-10 text-center text-slate-400">

                                    Belum ada data hari libur.

                                </td>

                            </tr>

                        <?php endif; ?>

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
                        Tambahkan hari libur internal tambahan
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
                        required
                        class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none focus:border-blue-500">

                </div>

                <div>

                    <label class="block text-[14px] font-semibold text-slate-700 mb-3">
                        Tanggal
                    </label>

                    <input
                        type="date"
                        name="tanggal_libur"
                        required
                        class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none focus:border-blue-500">

                </div>

                <div>

                    <label class="block text-[14px] font-semibold text-slate-700 mb-3">
                        Tipe Libur
                    </label>

                    <select
                        name="tipe_libur"
                        class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none focus:border-blue-500">

                        <option value="Internal">
                            Internal
                        </option>

                        <option value="Khusus">
                            Khusus
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
                        class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none resize-none focus:border-blue-500"></textarea>

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

    </div>

    <!-- RIGHT -->
    <div class="xl:col-span-4 space-y-7">

        <div class="bg-gradient-to-br from-blue-600 to-blue-500 rounded-[36px] p-8 text-white shadow-xl shadow-blue-500/20">

            <div class="flex items-center justify-between mb-10">

                <div>

                    <p class="text-blue-100 text-[14px] mb-2">
                        Total Hari Libur
                    </p>

                    <h3 class="text-[42px] font-extrabold">
                        <?= $totalLibur ?> Hari
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

                    <?= $liburTerdekat['nama_libur'] ?? '-' ?>

                </h2>

                <span class="bg-green-400/20 text-green-100 px-4 py-2 rounded-xl inline-block text-[13px] font-bold">

                    <?php if ($liburTerdekat) : ?>

                        <?php
                        $selisih = floor(
                            (strtotime($liburTerdekat['tanggal']) - time()) / 86400
                        );
                        ?>

                        Tersisa <?= $selisih ?> Hari Lagi

                    <?php else : ?>

                        Tidak ada libur mendatang

                    <?php endif; ?>

                </span>

            </div>

        </div>

    </div>

</div>

<?= $this->endSection() ?>