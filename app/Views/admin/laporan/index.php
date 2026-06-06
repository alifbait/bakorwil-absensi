<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>

<?= view('components/alert'); ?>

<!-- HEADER -->
<div class="flex items-start justify-between mb-8">

    <!-- TITLE -->
    <div>

        <p class="text-slate-400 text-[14px] mb-2">
            Rekap Kehadiran Anggota
        </p>

        <h1 class="text-[64px] font-extrabold text-slate-900 leading-none">
            Laporan Absensi
        </h1>

    </div>

    <!-- ACTION -->
    <div class="flex items-center gap-4">

        <!-- EXPORT EXCEL -->
        <a href="<?= base_url(
            'admin/laporan/export-excel?bulan=' .
            urlencode($bulan) .
            '&tahun=' .
            urlencode($tahun) .
            '&divisi=' .
            urlencode($divisi) .
            '&status=' .
            urlencode($status)
        ); ?>"
            class="bg-green-500 hover:bg-green-600 transition text-white px-8 py-4 rounded-2xl font-bold shadow-lg shadow-green-300/30">

            Export Excel

        </a>

        <!-- EXPORT PDF -->
        <a href="<?= base_url(
            'admin/laporan/export-pdf?bulan=' .
            urlencode($bulan) .
            '&tahun=' .
            urlencode($tahun) .
            '&divisi=' .
            urlencode($divisi) .
            '&status=' .
            urlencode($status)
        ); ?>"
            class="bg-orange-500 hover:bg-orange-600 transition text-white px-8 py-4 rounded-2xl font-bold shadow-lg shadow-orange-300/30">

            Export PDF

        </a>

    </div>

</div>

<!-- FILTER -->
<form action="<?= base_url('admin/laporan') ?>" method="GET" class="mb-8">

    <div class="bg-white rounded-[32px] p-7 border border-slate-100 shadow-sm">

        <div class="grid grid-cols-5 gap-5">

            <!-- BULAN -->
            <div>

                <label class="text-[14px] font-semibold text-slate-700 block mb-3">
                    Bulan
                </label>

                <select name="bulan"
                    class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none">

                    <?php
                    $bulanList = [
                        'Januari',
                        'Februari',
                        'Maret',
                        'April',
                        'Mei',
                        'Juni',
                        'Juli',
                        'Agustus',
                        'September',
                        'Oktober',
                        'November',
                        'Desember'
                    ];
                    ?>

                    <?php foreach ($bulanList as $b): ?>

                        <option value="<?= $b; ?>" <?= $bulan == $b ? 'selected' : ''; ?>>

                            <?= $b; ?>

                        </option>

                    <?php endforeach; ?>

                </select>

            </div>

            <!-- TAHUN -->
            <div>

                <label class="text-[14px] font-semibold text-slate-700 block mb-3">
                    Tahun
                </label>

                <select name="tahun"
                    class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none">

                    <?php for ($i = 2024; $i <= 2028; $i++): ?>

                        <option value="<?= $i; ?>" <?= $tahun == $i ? 'selected' : ''; ?>>

                            <?= $i; ?>

                        </option>

                    <?php endfor; ?>

                </select>

            </div>

            <!-- DIVISI -->
            <div>

                <label class="text-[14px] font-semibold text-slate-700 block mb-3">
                    Divisi
                </label>

                <select name="divisi"
                    class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none">

                    <option value="Semua Divisi">
                        Semua Divisi
                    </option>

                    <option value="Record Center" <?= $divisi == 'Record Center' ? 'selected' : ''; ?>>

                        Record Center

                    </option>

                    <option value="Sarpras" <?= $divisi == 'Sarpras' ? 'selected' : ''; ?>>

                        Sarpras

                    </option>

                    <option value="Ajudan" <?= $divisi == 'Ajudan' ? 'selected' : ''; ?>>

                        Ajudan

                    </option>

                    <option value="TU" <?= $divisi == 'TU' ? 'selected' : ''; ?>>

                        TU

                    </option>

                    <option value="PE" <?= $divisi == 'PE' ? 'selected' : ''; ?>>

                        PE

                    </option>

                </select>

            </div>

            <!-- STATUS -->
            <div>

                <label class="text-[14px] font-semibold text-slate-700 block mb-3">
                    Status
                </label>

                <select name="status"
                    class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none">

                    <option value="Semua Status">
                        Semua Status
                    </option>

                    <option value="Aktif" <?= $status == 'Aktif' ? 'selected' : ''; ?>>

                        Aktif

                    </option>

                    <option value="Nonaktif" <?= $status == 'Nonaktif' ? 'selected' : ''; ?>>

                        Nonaktif

                    </option>

                </select>

            </div>

            <!-- BUTTON -->
            <div class="flex items-end">

                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 transition text-white py-4 rounded-2xl font-bold shadow-lg shadow-blue-500/20">

                    Generate Laporan

                </button>

            </div>

        </div>

    </div>

</form>

<!-- SUMMARY -->
<div class="grid grid-cols-5 gap-5 mb-8">

    <!-- HADIR -->
    <div class="bg-white rounded-[28px] p-6 border border-slate-100 shadow-sm">

        <div class="w-16 h-16 rounded-3xl bg-green-100 flex items-center justify-center text-3xl mb-5">
            ✅
        </div>

        <p class="text-slate-400 text-[14px] mb-2">
            Total Hadir
        </p>

        <h3 class="text-[42px] font-extrabold text-slate-900">
            <?= $totalHadir; ?>
        </h3>

    </div>

    <!-- IZIN -->
    <div class="bg-white rounded-[28px] p-6 border border-slate-100 shadow-sm">

        <div class="w-16 h-16 rounded-3xl bg-yellow-100 flex items-center justify-center text-3xl mb-5">
            📄
        </div>

        <p class="text-slate-400 text-[14px] mb-2">
            Izin
        </p>

        <h3 class="text-[42px] font-extrabold text-slate-900">
            <?= $totalIzin; ?>
        </h3>

    </div>

    <!-- SAKIT -->
    <div class="bg-white rounded-[28px] p-6 border border-slate-100 shadow-sm">

        <div class="w-16 h-16 rounded-3xl bg-blue-100 flex items-center justify-center text-3xl mb-5">
            🏥
        </div>

        <p class="text-slate-400 text-[14px] mb-2">
            Sakit
        </p>

        <h3 class="text-[42px] font-extrabold text-slate-900">
            <?= $totalSakit; ?>
        </h3>

    </div>

    <!-- ALFA -->
    <div class="bg-white rounded-[28px] p-6 border border-slate-100 shadow-sm">

        <div class="w-16 h-16 rounded-3xl bg-red-100 flex items-center justify-center text-3xl mb-5">
            ❌
        </div>

        <p class="text-slate-400 text-[14px] mb-2">
            Alfa
        </p>

        <h3 class="text-[42px] font-extrabold text-slate-900">
            <?= $totalAlfa; ?>
        </h3>

    </div>

    <!-- PERSENTASE -->
    <div class="bg-white rounded-[28px] p-6 border border-slate-100 shadow-sm">

        <div class="w-16 h-16 rounded-3xl bg-purple-100 flex items-center justify-center text-3xl mb-5">
            📈
        </div>

        <p class="text-slate-400 text-[14px] mb-2">
            Kehadiran
        </p>

        <h3 class="text-[42px] font-extrabold text-green-600">
            <?= $avgPersentase; ?>%
        </h3>

    </div>

</div>

<!-- TABLE -->
<div class="bg-white rounded-[36px] border border-slate-100 shadow-sm overflow-hidden">

    <!-- HEADER -->
    <div class="px-8 py-7 border-b border-slate-100">

        <h2 class="text-[34px] font-extrabold text-slate-900">
            Rekap Kehadiran Anggota
        </h2>

        <p class="text-slate-400 text-[14px] mt-1">
            Data laporan absensi bulanan anggota magang
        </p>

    </div>

    <!-- TABLE -->
    <div class="overflow-x-auto">

        <table class="w-full">

            <thead class="bg-slate-50">

                <tr>

                    <th class="px-8 py-5 text-left text-[14px] font-bold text-slate-500">
                        Anggota
                    </th>

                    <th class="px-8 py-5 text-left text-[14px] font-bold text-slate-500">
                        NIM
                    </th>

                    <th class="px-8 py-5 text-left text-[14px] font-bold text-slate-500">
                        Divisi
                    </th>

                    <th class="px-8 py-5 text-center text-[14px] font-bold text-slate-500">
                        Hadir
                    </th>

                    <th class="px-8 py-5 text-center text-[14px] font-bold text-slate-500">
                        Izin
                    </th>

                    <th class="px-8 py-5 text-center text-[14px] font-bold text-slate-500">
                        Sakit
                    </th>

                    <th class="px-8 py-5 text-center text-[14px] font-bold text-slate-500">
                        Alfa
                    </th>

                    <th class="px-8 py-5 text-center text-[14px] font-bold text-slate-500">
                        Kehadiran
                    </th>

                </tr>

            </thead>

            <tbody>

                <?php foreach ($laporan as $item): ?>

                    <tr class="border-b border-slate-100 hover:bg-slate-50 transition">

                        <td class="px-8 py-6">

                            <div class="flex items-center gap-4">

                                <img src="https://ui-avatars.com/api/?name=<?= urlencode($item['nama']); ?>&background=e2e8f0&color=0f172a"
                                    class="w-14 h-14 rounded-2xl object-cover">

                                <div>

                                    <h4 class="text-slate-900 font-bold text-[15px]">
                                        <?= $item['nama']; ?>
                                    </h4>

                                    <p class="text-slate-400 text-[13px] mt-1">
                                        <?= $item['divisi']; ?>
                                    </p>

                                </div>

                            </div>

                        </td>

                        <td class="px-8 py-6 font-semibold text-slate-700">
                            <?= $item['nim']; ?>
                        </td>

                        <td class="px-8 py-6 text-slate-700">
                            <?= $item['divisi']; ?>
                        </td>

                        <td class="px-8 py-6 text-center font-bold text-green-600">
                            <?= $item['hadir']; ?>
                        </td>

                        <td class="px-8 py-6 text-center font-bold text-yellow-600">
                            <?= $item['izin']; ?>
                        </td>

                        <td class="px-8 py-6 text-center font-bold text-blue-600">
                            <?= $item['sakit']; ?>
                        </td>

                        <td class="px-8 py-6 text-center font-bold text-red-600">
                            <?= $item['alfa']; ?>
                        </td>

                        <td class="px-8 py-6 text-center">

                            <span class="bg-green-100 text-green-700 px-5 py-2 rounded-xl text-[13px] font-bold">

                                <?= $item['persentase']; ?>

                            </span>

                        </td>

                    </tr>

                <?php endforeach; ?>

            </tbody>

        </table>

    </div>

</div>

<?= $this->endSection() ?>