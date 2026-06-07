<?= $this->extend('layouts/admin_layout'); ?>

<?= $this->section('content'); ?>

<div class="space-y-6">

    <!-- HEADER -->
    <div
        class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between"
    >

        <div>
            <h1 class="text-2xl font-bold text-slate-800">
                Monitoring Absensi
            </h1>

            <p class="text-sm text-slate-500 mt-1">
                Monitoring data kehadiran peserta secara realtime
            </p>
        </div>

    </div>

    <!-- FILTER -->
    <div
        class="bg-white rounded-2xl shadow-sm border border-slate-200 p-4"
    >

        <form
            action="<?= base_url('admin/monitoring'); ?>"
            method="GET"
            class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4"
        >

            <!-- SEARCH -->
            <div>
                <label class="text-sm font-medium text-slate-600 mb-2 block">
                    Cari Nama / NIM
                </label>

                <input
                    type="text"
                    name="search"
                    value="<?= esc($search ?? ''); ?>"
                    placeholder="Cari peserta..."
                    class="w-full rounded-xl border border-slate-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 px-4 py-3 text-sm"
                >
            </div>

            <!-- STATUS -->
            <div>
                <label class="text-sm font-medium text-slate-600 mb-2 block">
                    Status
                </label>

                <select
                    name="status"
                    class="w-full rounded-xl border border-slate-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 px-4 py-3 text-sm"
                >

                    <option value="">
                        Semua Status
                    </option>

                    <option
                        value="hadir"
                        <?= ($status == 'hadir') ? 'selected' : ''; ?>
                    >
                        Hadir
                    </option>

                    <option
                        value="telat"
                        <?= ($status == 'telat') ? 'selected' : ''; ?>
                    >
                        Telat
                    </option>

                    <option
                        value="izin"
                        <?= ($status == 'izin') ? 'selected' : ''; ?>
                    >
                        Izin
                    </option>

                    <option
                        value="sakit"
                        <?= ($status == 'sakit') ? 'selected' : ''; ?>
                    >
                        Sakit
                    </option>

                    <option
                        value="alpha"
                        <?= ($status == 'alpha') ? 'selected' : ''; ?>
                    >
                        Alpha
                    </option>

                </select>
            </div>

            <!-- TANGGAL -->
            <div>
                <label class="text-sm font-medium text-slate-600 mb-2 block">
                    Tanggal
                </label>

                <input
                    type="date"
                    name="tanggal"
                    value="<?= esc($tanggal); ?>"
                    class="w-full rounded-xl border border-slate-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 px-4 py-3 text-sm"
                >
            </div>

            <!-- BUTTON -->
            <div class="flex items-end gap-2">

                <button
                    type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl px-4 py-3 text-sm font-medium transition"
                >
                    Filter
                </button>

                <a
                    href="<?= base_url('admin/monitoring'); ?>"
                    class="w-full text-center bg-slate-200 hover:bg-slate-300 text-slate-700 rounded-xl px-4 py-3 text-sm font-medium transition"
                >
                    Reset
                </a>

            </div>

        </form>

    </div>

    <!-- TABLE -->
    <div
        class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden"
    >

        <div class="overflow-x-auto">

            <table class="w-full min-w-[900px]">

                <thead class="bg-slate-100">

                    <tr>

                        <th
                            class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase"
                        >
                            Peserta
                        </th>

                        <th
                            class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase"
                        >
                            NIM
                        </th>

                        <th
                            class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase"
                        >
                            Jam Masuk
                        </th>

                        <th
                            class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase"
                        >
                            Jam Pulang
                        </th>

                        <th
                            class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase"
                        >
                            Status
                        </th>

                        <th
                            class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase"
                        >
                            Lokasi
                        </th>

                        <th
                            class="px-6 py-4 text-left text-xs font-semibold text-slate-600 uppercase"
                        >
                            Tanggal
                        </th>

                        <th
                            class="px-6 py-4 text-center text-xs font-semibold text-slate-600 uppercase"
                        >
                            Aksi
                        </th>

                    </tr>

                </thead>

                <tbody class="divide-y divide-slate-100">

                    <?php if (!empty($pegawai)) : ?>

                        <?php foreach ($pegawai as $p) : ?>

                            <tr class="hover:bg-slate-50 transition">

                                <!-- PESERTA -->
                                <td class="px-6 py-4">

                                    <div class="flex items-center gap-3">

                                        <div
                                            class="w-11 h-11 rounded-full overflow-hidden bg-slate-200 flex items-center justify-center"
                                        >

                                            <?php if (!empty($p['foto_profile'])) : ?>

                                                <img
                                                    src="<?= base_url('uploads/profile/' . $p['foto_profile']); ?>"
                                                    class="w-full h-full object-cover"
                                                >

                                            <?php else : ?>

                                                <span
                                                    class="text-sm font-bold text-slate-600"
                                                >
                                                    <?= strtoupper(substr($p['nama_lengkap'], 0, 1)); ?>
                                                </span>

                                            <?php endif; ?>

                                        </div>

                                        <div>

                                            <h3
                                                class="font-semibold text-slate-800"
                                            >
                                                <?= esc($p['nama_lengkap']); ?>
                                            </h3>

                                            <p
                                                class="text-sm text-slate-500"
                                            >
                                                Peserta Aktif
                                            </p>

                                        </div>

                                    </div>

                                </td>

                                <!-- NIM -->
                                <td class="px-6 py-4 text-sm text-slate-700">
                                    <?= esc($p['nim']); ?>
                                </td>

                                <!-- JAM MASUK -->
                                <td class="px-6 py-4 text-sm text-slate-700">
                                    <?= $p['jam_masuk'] ?: '-'; ?>
                                </td>

                                <!-- JAM PULANG -->
                                <td class="px-6 py-4 text-sm text-slate-700">
                                    <?= $p['jam_pulang'] ?: '-'; ?>
                                </td>

                                <!-- STATUS -->
                                <td class="px-6 py-4">

                                    <?php

                                    $badge = match ($p['status']) {

                                        'hadir' => 'bg-emerald-100 text-emerald-700',

                                        'telat' => 'bg-yellow-100 text-yellow-700',

                                        'izin' => 'bg-blue-100 text-blue-700',

                                        'sakit' => 'bg-orange-100 text-orange-700',

                                        'alpha' => 'bg-red-100 text-red-700',

                                        default => 'bg-slate-100 text-slate-700'

                                    };

                                    ?>

                                    <span
                                        class="px-3 py-1 rounded-full text-xs font-semibold <?= $badge; ?>"
                                    >
                                        <?= ucfirst($p['status']); ?>
                                    </span>

                                </td>

                                <!-- LOKASI -->
                                <td class="px-6 py-4">

                                    <span
                                        class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-medium bg-emerald-100 text-emerald-700"
                                    >
                                        Valid GPS
                                    </span>

                                </td>

                                <!-- TANGGAL -->
                                <td class="px-6 py-4 text-sm text-slate-700">
                                    <?= date('d M Y', strtotime($p['tanggal'])); ?>
                                </td>

                                <!-- AKSI -->
                                <td class="px-6 py-4 text-center">

                                    <a
                                        href="<?= base_url('admin/monitoring/detail/' . $p['id']); ?>"
                                        class="inline-flex items-center justify-center px-4 py-2 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium transition"
                                    >
                                        Detail
                                    </a>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    <?php else : ?>

                        <tr>

                            <td
                                colspan="8"
                                class="px-6 py-12 text-center"
                            >

                                <div class="flex flex-col items-center">

                                    <div
                                        class="w-16 h-16 rounded-full bg-slate-100 flex items-center justify-center mb-4"
                                    >
                                        📋
                                    </div>

                                    <h3
                                        class="text-lg font-semibold text-slate-700"
                                    >
                                        Data Monitoring Kosong
                                    </h3>

                                    <p
                                        class="text-sm text-slate-500 mt-1"
                                    >
                                        Belum ada data absensi pada tanggal ini.
                                    </p>

                                </div>

                            </td>

                        </tr>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<?= $this->endSection(); ?>