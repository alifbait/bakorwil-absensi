<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>

<!-- FILTER -->
<form action="<?= base_url('admin/monitoring') ?>" method="GET" class="mb-6">

    <div class="bg-white rounded-[32px] border border-slate-100 shadow-sm p-6 flex items-center justify-between">

        <div class="flex items-center gap-4">

            <input type="text" name="search" value="<?= $search ?? ''; ?>" placeholder="Cari pegawai..."
                class="border border-slate-200 rounded-2xl px-5 py-4 text-[14px] outline-none" />

            <input type="date" name="tanggal" value="<?= $tanggal ?? ''; ?>"
                class="border border-slate-200 rounded-2xl px-5 py-4 text-[14px] outline-none" />

            <select name="status" class="px-5 py-4 rounded-2xl border border-slate-200 bg-white outline-none">

                <option value="">Semua Status</option>

                <option value="Hadir" <?= ($status ?? '') == 'Hadir' ? 'selected' : ''; ?>>
                    Hadir
                </option>

                <option value="Terlambat" <?= ($status ?? '') == 'Terlambat' ? 'selected' : ''; ?>>
                    Terlambat
                </option>

            </select>

        </div>

        <button type="submit"
            class="bg-blue-600 hover:bg-blue-700 transition text-white px-7 py-4 rounded-2xl font-semibold text-[14px]">

            Filter Data

        </button>

    </div>

</form>
<!-- TABLE CARD -->

<div>
    <div class="bg-white rounded-[32px] border border-slate-100 shadow-sm overflow-hidden">

        <!-- HEADER -->
        <div class="px-7 py-6 border-b border-slate-100 flex items-center justify-between">

            <div>

                <h3 class="text-slate-900 font-bold text-[26px]">
                    Data Absensi Hari Ini
                </h3>

                <p class="text-slate-400 text-[14px]">
                    Monitoring realtime pegawai
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
                            Jam Masuk
                        </th>

                        <th class="px-7 py-5 text-left text-[13px] text-slate-500 font-bold">
                            Jam Pulang
                        </th>

                        <th class="px-7 py-5 text-left text-[13px] text-slate-500 font-bold">
                            Status
                        </th>

                        <th class="px-7 py-5 text-left text-[13px] text-slate-500 font-bold">
                            Lokasi
                        </th>

                        <th class="px-7 py-5 text-center text-[13px] text-slate-500 font-bold">
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody>

                    <!-- ROW -->
                                        <?php foreach ($pegawai as $index => $p): ?>
                        <tr class="border-t border-slate-100">

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

                            <td class="px-6 py-5 text-slate-600">
                                <?= $p['nim']; ?>
                            </td>

                            <td class="px-6 py-5 text-slate-600">
                                <?= $p['jam_masuk']; ?>
                            </td>

                            <td class="px-6 py-5 text-slate-600">
                                <?= $p['jam_pulang']; ?>
                            </td>

                            <td class="px-6 py-5">

                                <span class="px-4 py-2 rounded-xl text-sm font-semibold
                    <?= $p['status'] == 'Hadir'
                        ? 'bg-green-100 text-green-700'
                        : 'bg-red-100 text-red-700'; ?>">

                                    <?= $p['status']; ?>

                                </span>

                            </td>

                            <td class="px-6 py-5">

                                <span class="bg-blue-100 text-blue-700 px-4 py-2 rounded-xl text-sm font-semibold">
                                    <?= $p['lokasi']; ?>
                                </span>

                            </td>

                            <td class="px-6 py-5">

                                <a href="<?= base_url('admin/monitoring/detail/' . $index); ?>"
                                    class="bg-slate-100 hover:bg-slate-200 transition px-5 py-2 rounded-xl text-sm font-semibold inline-block">
                                    Detail
                                </a>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </div>
</div>

<?= $this->endSection() ?>