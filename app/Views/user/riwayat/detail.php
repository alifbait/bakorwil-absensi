<?= $this->extend('layouts/user_layout') ?>

<?= $this->section('content') ?>

<?php

/*
|--------------------------------------------------------------------------
| STATUS STYLE
|--------------------------------------------------------------------------
*/

$status = strtolower($absensi['status']);

$bgStatus = 'from-green-500 to-green-400';

$badge = 'bg-green-100 text-green-700';

$icon = '✓';

if ($status == 'telat') {

    $bgStatus = 'from-yellow-500 to-yellow-400';

    $badge = 'bg-yellow-100 text-yellow-700';

    $icon = '⏰';

}

if ($status == 'izin') {

    $bgStatus = 'from-blue-500 to-blue-400';

    $badge = 'bg-blue-100 text-blue-700';

    $icon = '📝';

}

if ($status == 'sakit') {

    $bgStatus = 'from-red-500 to-red-400';

    $badge = 'bg-red-100 text-red-700';

    $icon = '✚';

}

/*
|--------------------------------------------------------------------------
| FOTO
|--------------------------------------------------------------------------
*/

$selfieMasuk = !empty($absensi['selfie_masuk'])
    ? base_url('uploads/selfie/' . $absensi['selfie_masuk'])
    : null;

$selfiePulang = !empty($absensi['selfie_pulang'])
    ? base_url('uploads/selfie/' . $absensi['selfie_pulang'])
    : null;

?>

<div class="min-h-screen bg-slate-50 pb-32">

    <!-- BG -->
    <div class="absolute -top-16 -left-16 w-40 h-40 rounded-full bg-blue-100 opacity-70"></div>

    <!-- HEADER -->
    <div class="sticky top-0 z-30 bg-white/90 backdrop-blur border-b border-slate-100">

        <div class="px-5 pt-10 pb-5">

            <div class="flex items-center gap-3">

                <a
                    href="<?= base_url('riwayat') ?>"
                    class="w-11 h-11 rounded-2xl bg-slate-100 shadow-sm flex items-center justify-center text-lg">

                    ←

                </a>

                <div>

                    <p class="text-slate-400 text-[11px]">
                        Riwayat Kehadiran
                    </p>

                    <h2 class="text-slate-900 font-bold text-[22px]">
                        Detail Absensi
                    </h2>

                </div>

            </div>

        </div>

    </div>

    <!-- STATUS -->
    <div class="px-5 mt-5">

        <div class="bg-gradient-to-r <?= $bgStatus ?> rounded-[28px] p-5 text-white shadow-xl">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-white/80 text-[12px] mb-1">
                        Status Kehadiran
                    </p>

                    <h3 class="text-[28px] font-extrabold capitalize">

                        <?= esc($absensi['status']) ?>

                    </h3>

                </div>

                <div class="w-16 h-16 rounded-3xl bg-white/20 flex items-center justify-center text-3xl">

                    <?= $icon ?>

                </div>

            </div>

        </div>

    </div>

    <!-- SELFIE MASUK -->
    <?php if ($selfieMasuk) : ?>

        <div class="px-5 mt-5">

            <div class="bg-white rounded-[28px] border border-slate-100 shadow-md p-4">

                <div class="flex items-center justify-between mb-4">

                    <div>

                        <h3 class="text-slate-900 font-bold text-[18px]">
                            Selfie Masuk
                        </h3>

                        <p class="text-slate-400 text-[11px]">
                            Bukti kehadiran masuk
                        </p>

                    </div>

                    <div class="w-11 h-11 rounded-2xl bg-orange-100 flex items-center justify-center text-orange-500">

                        📷

                    </div>

                </div>

                <div class="rounded-[24px] overflow-hidden border border-slate-200 bg-slate-100">

                    <img
                        src="<?= $selfieMasuk ?>"
                        class="w-full h-[280px] object-cover">

                </div>

            </div>

        </div>

    <?php endif; ?>

    <!-- SELFIE PULANG -->
    <?php if ($selfiePulang) : ?>

        <div class="px-5 mt-5">

            <div class="bg-white rounded-[28px] border border-slate-100 shadow-md p-4">

                <div class="flex items-center justify-between mb-4">

                    <div>

                        <h3 class="text-slate-900 font-bold text-[18px]">
                            Selfie Pulang
                        </h3>

                        <p class="text-slate-400 text-[11px]">
                            Bukti kehadiran pulang
                        </p>

                    </div>

                    <div class="w-11 h-11 rounded-2xl bg-blue-100 flex items-center justify-center text-blue-500">

                        📸

                    </div>

                </div>

                <div class="rounded-[24px] overflow-hidden border border-slate-200 bg-slate-100">

                    <img
                        src="<?= $selfiePulang ?>"
                        class="w-full h-[280px] object-cover">

                </div>

            </div>

        </div>

    <?php endif; ?>

    <!-- INFORMASI -->
    <div class="px-5 mt-5">

        <div class="bg-white rounded-[28px] border border-slate-100 shadow-md p-5">

            <div class="flex items-center justify-between mb-5">

                <div>

                    <h3 class="text-slate-900 font-bold text-[18px]">
                        Informasi Absensi
                    </h3>

                    <p class="text-slate-400 text-[11px]">
                        Data realtime server
                    </p>

                </div>

                <div class="w-11 h-11 rounded-2xl bg-blue-100 flex items-center justify-center text-blue-600">

                    📍

                </div>

            </div>

            <div class="space-y-5">

                <!-- TANGGAL -->
                <div class="flex items-center justify-between">

                    <p class="text-slate-400 text-[13px]">
                        Tanggal
                    </p>

                    <h4 class="text-slate-900 font-bold text-[14px]">

                        <?= date('d F Y', strtotime($absensi['tanggal'])) ?>

                    </h4>

                </div>

                <!-- JAM MASUK -->
                <div class="flex items-center justify-between">

                    <p class="text-slate-400 text-[13px]">
                        Jam Masuk
                    </p>

                    <h4 class="text-slate-900 font-bold text-[14px]">

                        <?= $absensi['jam_masuk'] ?? '--:--' ?>

                    </h4>

                </div>

                <!-- JAM PULANG -->
                <div class="flex items-center justify-between">

                    <p class="text-slate-400 text-[13px]">
                        Jam Pulang
                    </p>

                    <h4 class="text-slate-900 font-bold text-[14px]">

                        <?= $absensi['jam_pulang'] ?? '--:--' ?>

                    </h4>

                </div>

                <!-- TOTAL -->
                <div class="flex items-center justify-between">

                    <p class="text-slate-400 text-[13px]">
                        Total Jam Kerja
                    </p>

                    <h4 class="text-slate-900 font-bold text-[14px]">

                        <?= $absensi['total_jam_kerja'] ?> Jam

                    </h4>

                </div>

                <!-- STATUS -->
                <div class="flex items-center justify-between">

                    <p class="text-slate-400 text-[13px]">
                        Status
                    </p>

                    <span class="<?= $badge ?> px-3 py-1 rounded-xl text-[11px] font-semibold capitalize">

                        <?= esc($absensi['status']) ?>

                    </span>

                </div>

                <!-- LOKASI -->
                <div>

                    <p class="text-slate-400 text-[13px] mb-2">
                        Koordinat Lokasi
                    </p>

                    <div class="bg-slate-50 border border-slate-200 rounded-2xl p-4 space-y-2">

                        <p class="text-slate-700 text-[13px]">

                            Latitude:
                            <?= $absensi['latitude_masuk'] ?>

                        </p>

                        <p class="text-slate-700 text-[13px]">

                            Longitude:
                            <?= $absensi['longitude_masuk'] ?>

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- BUTTON -->
    <div class="px-5 mt-6">

        <a
            href="<?= base_url('riwayat') ?>"
            class="w-full bg-gradient-to-r from-blue-600 to-blue-500 text-white py-4 rounded-[24px] font-bold text-[16px] shadow-xl shadow-blue-500/20 flex items-center justify-center gap-3">

            Kembali

            <span>→</span>

        </a>

    </div>

</div>

<?= $this->endSection() ?>