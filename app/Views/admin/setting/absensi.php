<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>

<?= view('components/alert'); ?>

<?php
$uri = service('uri');
$activeTab = $uri->getSegment(3, 'absensi');
?>

<!-- HEADER -->
<div class="flex items-center justify-between mb-8">

    <div>
        <p class="text-slate-400 text-[14px] mb-1">
            Konfigurasi Sistem Absensi Magang
        </p>

        <h1 class="text-[42px] xl:text-[56px] font-extrabold text-slate-900 leading-none">
            Setting Sistem
        </h1>
    </div>

    <button type="submit" form="form-setting-absensi"
        class="bg-blue-600 hover:bg-blue-700 transition text-white px-8 py-4 rounded-2xl font-bold shadow-lg shadow-blue-500/20">

        Simpan Pengaturan

    </button>

</div>

<!-- TAB NAVIGATION -->
<div class="bg-white rounded-[32px] p-4 border border-slate-100 shadow-sm mb-8">

    <div class="flex items-center gap-4 overflow-x-auto scrollbar-hide pb-2">

        <a href="<?= base_url('admin/setting/absensi') ?>" class="min-w-max px-6 py-4 rounded-2xl font-bold transition <?= ($activeTab === 'absensi')
              ? 'bg-gradient-to-r from-blue-600 to-blue-500 text-white shadow-lg shadow-blue-500/20'
              : 'bg-slate-100 hover:bg-slate-200 text-slate-700' ?>">

            🕒 Absensi

        </a>

        <a href="<?= base_url('admin/setting/lokasi') ?>" class="min-w-max px-6 py-4 rounded-2xl font-bold transition <?= ($activeTab === 'lokasi')
              ? 'bg-gradient-to-r from-blue-600 to-blue-500 text-white shadow-lg shadow-blue-500/20'
              : 'bg-slate-100 hover:bg-slate-200 text-slate-700' ?>">

            📍 Lokasi GPS

        </a>

        <a href="<?= base_url('admin/setting/harilibur') ?>" class="min-w-max px-6 py-4 rounded-2xl font-bold transition <?= ($activeTab === 'harilibur')
              ? 'bg-gradient-to-r from-blue-600 to-blue-500 text-white shadow-lg shadow-blue-500/20'
              : 'bg-slate-100 hover:bg-slate-200 text-slate-700' ?>">

            🎉 Hari Libur

        </a>

        <a href="<?= base_url('admin/setting/umum') ?>" class="min-w-max px-6 py-4 rounded-2xl font-bold transition <?= ($activeTab === 'umum')
              ? 'bg-gradient-to-r from-blue-600 to-blue-500 text-white shadow-lg shadow-blue-500/20'
              : 'bg-slate-100 hover:bg-slate-200 text-slate-700' ?>">

            🔑 Akun & Keamanan

        </a>

        <a href="<?= base_url('admin/setting/notifikasi') ?>" class="min-w-max px-6 py-4 rounded-2xl font-bold transition <?= ($activeTab === 'notifikasi')
              ? 'bg-gradient-to-r from-blue-600 to-blue-500 text-white shadow-lg shadow-blue-500/20'
              : 'bg-slate-100 hover:bg-slate-200 text-slate-700' ?>">

            🔔 Notifikasi

        </a>

    </div>

</div>

<!-- CONTENT -->
<form id="form-setting-absensi"
    action="<?= base_url('admin/setting/save-absensi') ?>"
    method="POST">

    <?= csrf_field(); ?>

    <div class="grid grid-cols-1 xl:grid-cols-12 gap-7">

        <!-- LEFT -->
        <div class="xl:col-span-8 space-y-7">

            <!-- JAM KERJA -->
            <div class="bg-white rounded-[36px] p-8 border border-slate-100 shadow-sm">

                <div class="flex items-center gap-4 mb-8">

                    <div class="w-16 h-16 rounded-3xl bg-blue-100 flex items-center justify-center text-3xl">
                        ⏰
                    </div>

                    <div>

                        <h2 class="text-[32px] font-extrabold text-slate-900">
                            Jam Kerja Utama
                        </h2>

                        <p class="text-slate-400 text-[14px]">
                            Pengaturan jam masuk, pulang, dan batas minimal jam kerja
                        </p>

                    </div>

                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">

                    <!-- JAM MASUK -->
                    <div>

                        <label class="block text-[14px] font-semibold text-slate-700 mb-3">
                            Jam Masuk
                        </label>

                        <input
                            type="time"
                            name="jam_masuk"
                            value="<?= $setting['jam_masuk']; ?>"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none focus:border-blue-500 focus:bg-white transition text-slate-800">

                    </div>

                    <!-- JAM PULANG -->
                    <div>

                        <label class="block text-[14px] font-semibold text-slate-700 mb-3">
                            Jam Pulang
                        </label>

                        <input
                            type="time"
                            name="jam_pulang"
                            value="<?= $setting['jam_pulang']; ?>"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none focus:border-blue-500 focus:bg-white transition text-slate-800">

                    </div>

                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- MINIMAL JAM -->
                    <div>

                        <label class="block text-[14px] font-semibold text-slate-700 mb-3">
                            Minimal Jam Kerja
                        </label>

                        <div class="relative">

                            <input
                                type="number"
                                name="minimal_jam_kerja"
                                value="<?= $setting['minimal_jam_kerja']; ?>"
                                class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 pr-16 outline-none focus:border-blue-500 focus:bg-white transition text-slate-800">

                            <span
                                class="absolute right-5 top-1/2 -translate-y-1/2 text-slate-400 text-[13px] font-bold">

                                Jam

                            </span>

                        </div>

                    </div>

                    <!-- MODE -->
                    <div>

                        <label class="block text-[14px] font-semibold text-slate-700 mb-3">
                            Mode Absensi
                        </label>

                        <select
                            name="mode_absensi"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none focus:border-blue-500 focus:bg-white transition text-slate-800">

                            <option value="WFO"
                                <?= ($setting['mode_validasi_gps'] ?? '') == 'WFO' ? 'selected' : ''; ?>>

                                WFO

                            </option>

                            <option value="Hybrid"
                                <?= ($setting['mode_validasi_gps'] ?? '') == 'Hybrid' ? 'selected' : ''; ?>>

                                Hybrid

                            </option>

                        </select>

                    </div>

                </div>

            </div>

            <!-- DISIPLIN -->
            <div class="bg-white rounded-[36px] p-8 border border-slate-100 shadow-sm">

                <div class="flex items-center gap-4 mb-8">

                    <div class="w-16 h-16 rounded-3xl bg-yellow-100 flex items-center justify-center text-3xl">
                        ⏱️
                    </div>

                    <div>

                        <h2 class="text-[32px] font-extrabold text-slate-900">
                            Disiplin & Ketidakhadiran
                        </h2>

                        <p class="text-slate-400 text-[14px]">
                            Pengaturan toleransi keterlambatan dan auto alpha
                        </p>

                    </div>

                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                    <!-- TOLERANSI -->
                    <div>

                        <label class="block text-[14px] font-semibold text-slate-700 mb-3">
                            Toleransi Keterlambatan
                        </label>

                        <div class="relative">

                            <input
                                type="number"
                                name="toleransi_terlambat"
                                value="<?= $setting['toleransi_terlambat']; ?>"
                                class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 pr-20 outline-none focus:border-blue-500 focus:bg-white transition text-slate-800">

                            <span
                                class="absolute right-5 top-1/2 -translate-y-1/2 text-slate-400 text-[13px] font-bold">

                                Menit

                            </span>

                        </div>

                    </div>

                    <!-- AUTO ALPHA -->
                    <div>

                        <label class="block text-[14px] font-semibold text-slate-700 mb-3">
                            Auto Alpha
                        </label>

                        <div class="flex items-center h-[58px]">

                            <input
                                type="checkbox"
                                name="auto_alpha"
                                value="1"
                                <?= $setting['auto_alpha'] ? 'checked' : ''; ?>
                                class="w-6 h-6 rounded border-slate-300 text-blue-600">

                        </div>

                    </div>

                    <!-- STATUS AUTO -->
                    <div>

                        <label class="block text-[14px] font-semibold text-slate-700 mb-3">
                            Status Auto Alpha
                        </label>

                        <select
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none focus:border-blue-500 focus:bg-white transition text-slate-800">

                            <option <?= $setting['auto_alpha'] ? 'selected' : ''; ?>>

                                Aktif

                            </option>

                            <option <?= !$setting['auto_alpha'] ? 'selected' : ''; ?>>

                                Nonaktif

                            </option>

                        </select>

                    </div>

                </div>

            </div>

            <!-- HARI KERJA -->
            <div class="bg-white rounded-[36px] p-8 border border-slate-100 shadow-sm">

                <div class="flex items-center gap-4 mb-8">

                    <div class="w-16 h-16 rounded-3xl bg-purple-100 flex items-center justify-center text-3xl">
                        📅
                    </div>

                    <div>

                        <h2 class="text-[32px] font-extrabold text-slate-900">
                            Hari Kerja Aktif
                        </h2>

                        <p class="text-slate-400 text-[14px]">
                            Tentukan hari operasional absensi magang
                        </p>

                    </div>

                </div>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-5">

                    <?php
                    $hariKerja = [
                        'Senin',
                        'Selasa',
                        'Rabu',
                        'Kamis',
                        'Jumat',
                        'Sabtu',
                        'Minggu'
                    ];
                    ?>

                    <?php foreach ($hariKerja as $hari): ?>

                        <?php
                        $field = 'hari_' . strtolower($hari);
                        ?>

                        <label class="cursor-pointer">

                            <input
                                type="checkbox"
                                name="<?= $field; ?>"
                                value="1"
                                class="peer hidden"
                                <?= $setting[$field] ? 'checked' : ''; ?>>

                            <div
                                class="bg-slate-50 border border-slate-200 rounded-[28px] p-5 transition-all peer-checked:bg-blue-600 peer-checked:border-blue-600 peer-checked:text-white hover:border-blue-300">

                                <div class="flex items-center justify-between mb-3">

                                    <h3 class="font-bold text-[18px]">
                                        <?= $hari; ?>
                                    </h3>

                                    <div class="w-5 h-5 rounded-full border-2 border-current"></div>

                                </div>

                                <p class="text-[12px] opacity-80">
                                    Hari operasional aktif
                                </p>

                            </div>

                        </label>

                    <?php endforeach; ?>

                </div>

            </div>

        </div>

        <!-- RIGHT -->
        <div class="xl:col-span-4 space-y-7">

            <!-- SERVER -->
            <div
                class="bg-gradient-to-br from-blue-600 to-blue-500 rounded-[36px] p-8 text-white shadow-xl shadow-blue-500/20 min-h-[320px]">

                <div class="flex items-center justify-between mb-10">

                    <div>

                        <p class="text-blue-100 text-[14px] mb-2">
                            Waktu Server
                        </p>

                        <h3 class="text-[38px] font-extrabold leading-none"
                            id="clock">

                            --

                        </h3>

                        <p class="text-blue-100 text-[14px] mt-3">
                            WIB • Asia/Jakarta
                        </p>

                    </div>

                    <div class="w-16 h-16 rounded-3xl bg-white/20 flex items-center justify-center text-3xl">
                        🕒
                    </div>

                </div>

                <div class="bg-white/10 rounded-3xl p-6 backdrop-blur-sm">

                    <p class="text-blue-100 text-[14px] mb-2">
                        Status Sistem
                    </p>

                    <h2 class="text-[20px] font-extrabold mb-3">
                        Operasional Aktif
                    </h2>

                    <span
                        class="bg-green-400/20 text-green-100 px-4 py-2 rounded-xl inline-block text-[13px] font-bold">

                        Sinkronisasi Berjalan

                    </span>

                </div>

            </div>

            <!-- RINGKASAN -->
            <div class="bg-white rounded-[36px] p-8 border border-slate-100 shadow-sm">

                <h3 class="text-[24px] font-extrabold text-slate-900 mb-6">
                    Ringkasan Jadwal
                </h3>

                <div class="space-y-5">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-slate-400 text-[13px]">
                                Jam Kerja
                            </p>

                            <h4 class="text-slate-900 font-bold text-[16px]">

                                <?= $setting['jam_masuk']; ?>
                                -
                                <?= $setting['jam_pulang']; ?>
                                WIB

                            </h4>

                        </div>

                        <div class="w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center text-lg">
                            ⏰
                        </div>

                    </div>

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-slate-400 text-[13px]">
                                Batas Toleransi
                            </p>

                            <h4 class="text-slate-900 font-bold text-[16px]">

                                <?= $setting['toleransi_terlambat']; ?>
                                Menit

                            </h4>

                        </div>

                        <div class="w-10 h-10 rounded-xl bg-yellow-100 flex items-center justify-center text-lg">
                            ⚠️
                        </div>

                    </div>

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-slate-400 text-[13px]">
                                Minimal Jam Kerja
                            </p>

                            <h4 class="text-slate-900 font-bold text-[16px]">

                                <?= $setting['minimal_jam_kerja']; ?>
                                Jam / Hari

                            </h4>

                        </div>

                        <div class="w-10 h-10 rounded-xl bg-green-100 flex items-center justify-center text-lg">
                            📊
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</form>

<script>

    function updateClock()
    {
        const now = new Date();

        const jam = now.toLocaleTimeString(
            'id-ID',
            {
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit'
            }
        );

        document.getElementById('clock').innerHTML = jam;
    }

    setInterval(updateClock, 1000);

    updateClock();

</script>

<?= $this->endSection() ?>