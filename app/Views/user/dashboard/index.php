<?= $this->extend('layouts/user_layout') ?>

<?= $this->section('content') ?>

<?php

$active = 'home';

$statusHariIni = $todayAbsensi['status'] ?? 'belum absen';

$warnaStatus = 'bg-slate-100 text-slate-700';

if ($statusHariIni == 'hadir') {

    $warnaStatus = 'bg-green-100 text-green-700';

} elseif ($statusHariIni == 'telat') {

    $warnaStatus = 'bg-yellow-100 text-yellow-700';

} elseif ($statusHariIni == 'izin') {

    $warnaStatus = 'bg-blue-100 text-blue-700';

} elseif ($statusHariIni == 'sakit') {

    $warnaStatus = 'bg-orange-100 text-orange-700';

} elseif ($statusHariIni == 'alpha') {

    $warnaStatus = 'bg-red-100 text-red-700';

}

?>

<div class="relative min-h-screen pb-28">

    <!-- BACKGROUND -->
    <div class="absolute -top-16 -left-16 w-40 h-40 rounded-full bg-blue-100 opacity-70"></div>

    <div class="absolute top-24 right-7 grid grid-cols-4 gap-2 opacity-40">

        <?php for ($i = 0; $i < 8; $i++): ?>

            <span class="w-2 h-2 rounded-full bg-blue-300"></span>

        <?php endfor; ?>

    </div>

    <!-- STATUS CARD -->
    <div class="px-5 mt-6 relative z-10">

        <div
            class="bg-gradient-to-r from-blue-600 to-blue-500 rounded-[30px] p-5 text-white shadow-xl shadow-blue-500/30">

            <div class="flex items-center justify-between mb-5">

                <div>

                    <p class="text-blue-100 text-[13px]">
                        Status Kehadiran
                    </p>

                    <h3 class="text-[24px] font-bold capitalize">
                        <?= esc($statusHariIni) ?>
                    </h3>

                </div>

                <div class="bg-white/20 px-4 py-2 rounded-2xl text-[13px] font-medium">
                    <?= date('d M Y') ?>
                </div>

            </div>

            <div class="grid grid-cols-2 gap-4">

                <!-- JAM MASUK -->
                <div class="bg-white/10 rounded-2xl p-4">

                    <p class="text-blue-100 text-[12px] mb-1">
                        Jam Masuk
                    </p>

                    <h4 class="text-[24px] font-bold">
                        <?= $todayAbsensi['jam_masuk'] ?? '--:--' ?>
                    </h4>

                </div>

                <!-- JAM PULANG -->
                <div class="bg-white/10 rounded-2xl p-4">

                    <p class="text-blue-100 text-[12px] mb-1">
                        Jam Pulang
                    </p>

                    <h4 class="text-[24px] font-bold">
                        <?= $todayAbsensi['jam_pulang'] ?? '--:--' ?>
                    </h4>

                </div>

            </div>

        </div>

    </div>

    <!-- QUICK MENU -->
    <div class="px-5 mt-6 relative z-10">

        <div class="grid grid-cols-2 gap-4">

            <!-- ABSEN MASUK -->
            <a href="<?= base_url('absensi/masuk') ?>"
                class="bg-white rounded-[26px] p-5 shadow-md border border-slate-100 text-left block">

                <div class="w-12 h-12 rounded-2xl bg-blue-100 flex items-center justify-center text-2xl mb-4">
                    📍
                </div>

                <h3 class="text-slate-900 font-bold text-[16px]">
                    Absen
                    <br>
                    Masuk
                </h3>

            </a>

            <!-- ABSEN PULANG -->
            <a href="<?= base_url('absen-pulang') ?>"
                class="bg-white rounded-[26px] p-5 shadow-md border border-slate-100 text-left block">

                <div class="w-12 h-12 rounded-2xl bg-orange-100 flex items-center justify-center text-2xl mb-4">
                    📷
                </div>

                <h3 class="text-slate-900 font-bold text-[16px]">
                    Absen
                    <br>
                    Pulang
                </h3>

            </a>

            <!-- IZIN -->
            <a href="<?= base_url('izin') ?>"
                class="bg-white rounded-[26px] p-5 shadow-md border border-slate-100 text-left block">

                <div class="w-12 h-12 rounded-2xl bg-green-100 flex items-center justify-center text-2xl mb-4">
                    📝
                </div>

                <h3 class="text-slate-900 font-bold text-[16px]">
                    Izin /
                    <br>
                    Sakit
                </h3>

            </a>

            <!-- RIWAYAT -->
            <a href="<?= base_url('riwayat') ?>"
                class="bg-white rounded-[26px] p-5 shadow-md border border-slate-100 text-left block">

                <div class="w-12 h-12 rounded-2xl bg-purple-100 flex items-center justify-center text-2xl mb-4">
                    📋
                </div>

                <h3 class="text-slate-900 font-bold text-[16px]">
                    Riwayat
                    <br>
                    Absensi
                </h3>

            </a>

        </div>

    </div>

    <!-- GPS STATUS -->
    <div class="px-5 mt-5 relative z-10">

        <div class="bg-blue-50 border border-blue-100 rounded-[26px] p-4 flex items-center gap-4">

            <div
                class="w-14 h-14 rounded-2xl bg-blue-600 flex items-center justify-center text-white text-xl shadow-md shrink-0">
                📡
            </div>

            <div>

                <h3 class="text-slate-900 font-bold text-[17px]">
                    GPS Aktif
                </h3>

                <p class="text-slate-500 text-[13px]">
                    Sistem lokasi siap digunakan
                </p>

            </div>

        </div>

    </div>

    <!-- HISTORY -->
    <div class="px-5 mt-5 relative z-10">

        <div class="flex items-center justify-between mb-4">

            <h3 class="text-slate-900 font-bold text-[18px]">
                Riwayat Terakhir
            </h3>

            <a href="<?= base_url('riwayat') ?>" class="text-blue-600 text-[13px] font-medium">

                Lihat Semua

            </a>

        </div>

        <div class="space-y-3">

            <?php if (!empty($riwayat)): ?>

                <?php foreach ($riwayat as $item): ?>

                    <?php

                    $badge = 'bg-slate-100 text-slate-700';

                    if ($item['status'] == 'hadir') {

                        $badge = 'bg-green-100 text-green-700';

                    } elseif ($item['status'] == 'telat') {

                        $badge = 'bg-yellow-100 text-yellow-700';

                    } elseif ($item['status'] == 'izin') {

                        $badge = 'bg-blue-100 text-blue-700';

                    } elseif ($item['status'] == 'sakit') {

                        $badge = 'bg-orange-100 text-orange-700';

                    }

                    ?>

                    <div class="bg-white rounded-2xl p-4 shadow-sm border border-slate-100 flex items-center justify-between">

                        <div>

                            <h4 class="text-slate-900 font-semibold text-[15px]">
                                <?= date('d M Y', strtotime($item['tanggal'])) ?>
                            </h4>

                            <p class="text-slate-400 text-[12px]">
                                <?= $item['jam_masuk'] ?? '--:--' ?>
                                -
                                <?= $item['jam_pulang'] ?? '--:--' ?>
                            </p>

                        </div>

                        <span class="<?= $badge ?> px-3 py-2 rounded-xl text-[12px] font-semibold capitalize">

                            <?= esc($item['status']) ?>

                        </span>

                    </div>

                <?php endforeach; ?>

            <?php else: ?>

                <div class="bg-white rounded-2xl p-5 border border-slate-100 text-center text-slate-400 text-sm">

                    Belum ada riwayat absensi

                </div>

            <?php endif; ?>

        </div>

    </div>

</div>

<?= $this->endSection() ?>