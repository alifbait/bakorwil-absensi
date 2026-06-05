<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>

<div class="mb-6 flex items-center justify-between">

    <div>

        <h1 class="text-[42px] font-extrabold text-slate-900 leading-none">
            Approval Izin
        </h1>

        <p class="text-slate-400 text-[14px] mt-2">
            Monitoring pengajuan izin & sakit pegawai
        </p>

    </div>

</div>

<!-- FILTER -->
<form action="<?= base_url('admin/izin') ?>" method="GET" class="mb-6">

    <div class="bg-white rounded-[32px] border border-slate-100 shadow-sm p-6 flex items-center justify-between">

        <div class="flex items-center gap-4">

            <!-- SEARCH -->
            <div
                class="bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 w-[320px] flex items-center gap-3">

                <span class="text-slate-400 text-lg">
                    🔍
                </span>

                <input
                    type="text"
                    name="search"
                    value="<?= $search ?? ''; ?>"
                    placeholder="Cari pegawai..."
                    class="w-full bg-transparent outline-none text-[14px] text-slate-700">

            </div>

            <!-- DATE -->
            <input
                type="date"
                name="tanggal"
                value="<?= $tanggal ?? ''; ?>"
                class="border border-slate-200 rounded-2xl px-5 py-4 text-[14px] outline-none">

            <!-- STATUS -->
            <select
                name="status"
                class="px-5 py-4 rounded-2xl border border-slate-200 bg-white outline-none">

                <option value="">
                    Semua Status
                </option>

                <option value="Pending" <?= ($status ?? '') == 'Pending' ? 'selected' : ''; ?>>
                    Pending
                </option>

                <option value="Disetujui" <?= ($status ?? '') == 'Disetujui' ? 'selected' : ''; ?>>
                    Disetujui
                </option>

                <option value="Ditolak" <?= ($status ?? '') == 'Ditolak' ? 'selected' : ''; ?>>
                    Ditolak
                </option>

            </select>

        </div>

        <!-- BUTTON -->
        <button
            type="submit"
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
                Pengajuan Tanggal
                <?= date('d M Y', strtotime($tanggal ?? date('Y-m-d'))); ?>
            </h3>

            <p class="text-slate-400 text-[14px]">
                Monitoring pengajuan izin pegawai harian
            </p>

        </div>

        <button
            class="bg-orange-500 hover:bg-orange-600 transition text-white px-6 py-3 rounded-2xl text-[14px] font-semibold">

            Export PDF

        </button>

    </div>

    <!-- EMPTY STATE -->
    <?php if (empty($izin)): ?>

        <div class="py-24 flex flex-col items-center justify-center text-center">

            <div
                class="w-24 h-24 rounded-full bg-slate-100 flex items-center justify-center text-4xl mb-5">
                📄
            </div>

            <h3 class="text-[24px] font-bold text-slate-800 mb-2">
                Tidak Ada Pengajuan
            </h3>

            <p class="text-slate-400 text-[15px] max-w-[400px] leading-relaxed">
                Belum ada data pengajuan izin pada tanggal yang dipilih.
            </p>

        </div>

    <?php else: ?>

        <!-- TABLE -->
        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-slate-50">

                    <tr>

                        <th class="px-7 py-5 text-left text-[13px] text-slate-500 font-bold">
                            Pegawai
                        </th>

                        <th class="px-7 py-5 text-left text-[13px] text-slate-500 font-bold">
                            Jenis
                        </th>

                        <th class="px-7 py-5 text-left text-[13px] text-slate-500 font-bold">
                            Tanggal
                        </th>

                        <th class="px-7 py-5 text-left text-[13px] text-slate-500 font-bold">
                            Alasan
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

                    <?php foreach ($izin as $key => $i): ?>

                        <tr class="border-t border-slate-100 hover:bg-slate-50 transition">

                            <!-- PEGAWAI -->
                            <td class="px-6 py-5">

                                <div class="flex items-center gap-4">

                                    <img
                                        src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?q=80&w=1200&auto=format&fit=crop"
                                        class="w-14 h-14 rounded-2xl object-cover">

                                    <div>

                                        <h3 class="font-bold text-slate-900">
                                            <?= $i['nama']; ?>
                                        </h3>

                                        <p class="text-slate-400 text-sm">
                                            <?= $i['jabatan']; ?>
                                        </p>

                                    </div>

                                </div>

                            </td>

                            <!-- JENIS -->
                            <td class="px-6 py-5">

                                <span class="px-4 py-2 rounded-xl text-sm font-semibold
                                    <?= $i['jenis'] == 'Sakit'
                                        ? 'bg-red-100 text-red-700'
                                        : 'bg-yellow-100 text-yellow-700'; ?>">

                                    <?= $i['jenis']; ?>

                                </span>

                            </td>

                            <!-- TANGGAL -->
                            <td class="px-6 py-5 text-slate-600">
                                <?= date('d M Y', strtotime($i['tanggal'])); ?>
                            </td>

                            <!-- ALASAN -->
                            <td class="px-6 py-5 text-slate-600 max-w-[280px]">
                                <?= $i['alasan']; ?>
                            </td>

                            <!-- STATUS -->
                            <td class="px-6 py-5">

                                <span class="px-4 py-2 rounded-xl text-sm font-semibold
                                    <?= $i['status'] == 'Pending'
                                        ? 'bg-yellow-100 text-yellow-700'
                                        : ($i['status'] == 'Disetujui'
                                            ? 'bg-green-100 text-green-700'
                                            : 'bg-red-100 text-red-700') ?>">

                                    <?= $i['status']; ?>

                                </span>

                            </td>

                            <!-- AKSI -->
                            <td class="px-6 py-5 text-center">

                                <a href="<?= base_url('admin/izin/detail/' . $key) ?>"
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

    <!-- FOOTER -->
    <div class="px-7 py-5 border-t border-slate-100 flex items-center justify-between">

        <p class="text-slate-400 text-[14px]">
            Menampilkan <?= count($izin); ?> data pengajuan
        </p>

        <div class="flex items-center gap-3">

            <button class="w-12 h-12 rounded-xl bg-slate-100 text-slate-600">
                ←
            </button>

            <button class="w-12 h-12 rounded-xl bg-blue-600 text-white font-bold">
                1
            </button>

            <button class="w-12 h-12 rounded-xl bg-slate-100 text-slate-600">
                →
            </button>

        </div>

    </div>

</div>

<?= $this->endSection() ?>