<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>

<?= view('components/alert'); ?>

<div class="mb-6 flex items-center justify-between">

    <div>

        <h1 class="text-[42px] font-extrabold text-slate-900 leading-none">
            Approval Izin
        </h1>

        <p class="text-slate-400 text-[14px] mt-2">
            Monitoring pengajuan izin & sakit peserta
        </p>

    </div>

</div>

<!-- FILTER -->
<form action="<?= base_url('admin/izin') ?>" method="GET" class="mb-6">

    <div
        class="bg-white rounded-[32px] border border-slate-100 shadow-sm p-6 flex flex-wrap items-center justify-between gap-4">

        <div class="flex flex-wrap items-center gap-4">

            <!-- SEARCH -->
            <div class="bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 w-[320px] flex items-center gap-3">

                <span class="text-slate-400 text-lg">
                    🔍
                </span>

                <input type="text" name="search" value="<?= $search ?? ''; ?>" placeholder="Cari nama / NIM..."
                    class="w-full bg-transparent outline-none text-[14px] text-slate-700">

            </div>

            <!-- DATE -->
            <input type="date" name="tanggal" value="<?= $tanggal ?? ''; ?>"
                class="border border-slate-200 rounded-2xl px-5 py-4 text-[14px] outline-none">

            <!-- STATUS -->
            <select name="status" class="px-5 py-4 rounded-2xl border border-slate-200 bg-white outline-none">

                <option value="">
                    Semua Status
                </option>

                <option value="pending" <?= ($status ?? '') == 'pending' ? 'selected' : ''; ?>>
                    Pending
                </option>

                <option value="disetujui" <?= ($status ?? '') == 'disetujui' ? 'selected' : ''; ?>>
                    Disetujui
                </option>

                <option value="ditolak" <?= ($status ?? '') == 'ditolak' ? 'selected' : ''; ?>>
                    Ditolak
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

<!-- TABLE -->
<div class="bg-white rounded-[32px] border border-slate-100 shadow-sm overflow-hidden">

    <!-- HEADER -->
    <div class="px-7 py-6 border-b border-slate-100 flex items-center justify-between">

        <div>

            <h3 class="text-slate-900 font-bold text-[26px]">

                Data Pengajuan Izin

            </h3>

            <p class="text-slate-400 text-[14px]">
                Total <?= count($izin); ?> pengajuan ditemukan
            </p>

        </div>

    </div>

    <!-- EMPTY -->
    <?php if (empty($izin)): ?>

        <div class="py-24 flex flex-col items-center justify-center text-center">

            <div class="w-24 h-24 rounded-full bg-slate-100 flex items-center justify-center text-4xl mb-5">
                📄
            </div>

            <h3 class="text-[24px] font-bold text-slate-800 mb-2">
                Tidak Ada Pengajuan
            </h3>

            <p class="text-slate-400 text-[15px] max-w-[400px] leading-relaxed">
                Belum ada data pengajuan izin.
            </p>

        </div>

    <?php else: ?>

        <!-- TABLE -->
        <div class="overflow-x-auto">

            <table class="w-full min-w-[1100px]">

                <thead class="bg-slate-50">

                    <tr>

                        <th class="px-6 py-5 text-left text-[13px] text-slate-500 font-bold">
                            Peserta
                        </th>

                        <th class="px-6 py-5 text-left text-[13px] text-slate-500 font-bold">
                            Jenis
                        </th>

                        <th class="px-6 py-5 text-left text-[13px] text-slate-500 font-bold">
                            Tanggal
                        </th>

                        <th class="px-6 py-5 text-left text-[13px] text-slate-500 font-bold">
                            Alasan
                        </th>

                        <th class="px-6 py-5 text-left text-[13px] text-slate-500 font-bold">
                            Status
                        </th>

                        <th class="px-6 py-5 text-center text-[13px] text-slate-500 font-bold">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody>

                    <?php foreach ($izin as $i): ?>

                        <tr class="border-t border-slate-100 hover:bg-slate-50 transition">

                            <!-- PESERTA -->
                            <td class="px-6 py-5">

                                <div class="flex items-center gap-4">

                                    <?php if ($i['foto_profile']): ?>

                                        <img src="<?= base_url('uploads/profile/' . $i['foto_profile']); ?>"
                                            class="w-14 h-14 rounded-2xl object-cover">

                                    <?php else: ?>

                                        <div
                                            class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center font-bold text-blue-700">

                                            <?= strtoupper(substr($i['nama_lengkap'], 0, 1)); ?>

                                        </div>

                                    <?php endif; ?>

                                    <div>

                                        <h3 class="font-bold text-slate-900">
                                            <?= $i['nama_lengkap']; ?>
                                        </h3>

                                        <p class="text-slate-400 text-sm mt-1">
                                            NIM : <?= $i['nim']; ?>
                                        </p>

                                    </div>

                                </div>

                            </td>

                            <!-- JENIS -->
                            <td class="px-6 py-5">

                                <span class="px-4 py-2 rounded-xl text-sm font-semibold
                                    <?= $i['jenis'] == 'sakit'
                                        ? 'bg-red-100 text-red-700'
                                        : 'bg-yellow-100 text-yellow-700'; ?>">

                                    <?= ucfirst($i['jenis']); ?>

                                </span>

                            </td>

                            <!-- TANGGAL -->
                            <td class="px-6 py-5 text-slate-600">

                                <?= date('d M Y', strtotime($i['tanggal_mulai'])); ?>

                                <?php if ($i['tanggal_selesai'] != $i['tanggal_mulai']): ?>

                                    <span class="block text-xs text-slate-400 mt-1">
                                        s/d <?= date('d M Y', strtotime($i['tanggal_selesai'])); ?>
                                    </span>

                                <?php endif; ?>

                            </td>

                            <!-- ALASAN -->
                            <td class="px-6 py-5 text-slate-600 max-w-[300px]">

                                <?= character_limiter($i['alasan'], 80); ?>

                            </td>

                            <!-- STATUS -->
                            <td class="px-6 py-5">

                                <span class="px-4 py-2 rounded-xl text-sm font-semibold

                                    <?= $i['status'] == 'pending'
                                        ? 'bg-yellow-100 text-yellow-700'
                                        : ($i['status'] == 'disetujui'
                                            ? 'bg-green-100 text-green-700'
                                            : 'bg-red-100 text-red-700') ?>">

                                    <?= ucfirst($i['status']); ?>

                                </span>

                            </td>

                            <!-- AKSI -->
                            <td class="px-6 py-5 text-center">

                                <a href="<?= base_url('admin/izin/detail/' . $i['id']) ?>"
                                    class="bg-slate-100 hover:bg-slate-200 transition px-5 py-3 rounded-xl text-[14px] font-bold text-slate-700 inline-block">

                                    Detail

                                </a>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    <?php endif; ?>

</div>

<?= $this->endSection() ?>