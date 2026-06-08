<?= $this->extend('layouts/user_layout') ?>

<?= $this->section('content') ?>

<?php

/*
|--------------------------------------------------------------------------
| STATUS STYLE
|--------------------------------------------------------------------------
*/

$status = strtolower($izin['status']);

$bgStatus = 'from-yellow-500 to-orange-400';
$iconStatus = '⏳';
$textStatus = 'Pending';
$note = 'Pengajuan sedang diperiksa admin kepegawaian.';

if ($status == 'disetujui') {

    $bgStatus = 'from-green-500 to-green-400';
    $iconStatus = '✓';
    $textStatus = 'Disetujui';
    $note = 'Pengajuan telah disetujui oleh admin.';

}

if ($status == 'ditolak') {

    $bgStatus = 'from-red-500 to-red-400';
    $iconStatus = '✕';
    $textStatus = 'Ditolak';
    $note = 'Pengajuan ditolak oleh admin kepegawaian.';

}

/*
|--------------------------------------------------------------------------
| FORMAT TANGGAL
|--------------------------------------------------------------------------
*/

$tanggalMulai =
    date(
        'd F Y',
        strtotime($izin['tanggal_mulai'])
    );

$tanggalSelesai =
    date(
        'd F Y',
        strtotime($izin['tanggal_selesai'])
    );

/*
|--------------------------------------------------------------------------
| DURASI
|--------------------------------------------------------------------------
*/

$start = new DateTime($izin['tanggal_mulai']);

$end = new DateTime($izin['tanggal_selesai']);

$durasi =
    $start->diff($end)->days + 1;

/*
|--------------------------------------------------------------------------
| FILE
|--------------------------------------------------------------------------
*/

$file = $izin['file_pendukung'] ?? null;

$ext = '';

if ($file) {

    $ext =
        strtolower(
            pathinfo($file, PATHINFO_EXTENSION)
        );

}

$fileColor = 'bg-blue-100 text-blue-600';
$fileIcon = '📄';

if ($ext == 'pdf') {

    $fileColor = 'bg-red-100 text-red-600';
    $fileIcon = 'PDF';

}

if (
    in_array(
        $ext,
        ['jpg', 'jpeg', 'png', 'webp']
    )
) {

    $fileColor = 'bg-green-100 text-green-600';
    $fileIcon = 'IMG';

}

?>

<div class="min-h-screen bg-slate-50 pb-32">

    <!-- HEADER -->
    <div class="sticky top-0 z-30 bg-white/90 backdrop-blur border-b border-slate-100">

        <div class="px-5 pt-10 pb-5">

            <div class="flex items-center gap-3">

                <a
                    href="<?= base_url('izin') ?>"
                    class="w-11 h-11 rounded-2xl bg-white shadow-md flex items-center justify-center text-lg">

                    ←

                </a>

                <div>

                    <p class="text-slate-400 text-[11px]">
                        Monitoring Pengajuan
                    </p>

                    <h2 class="text-slate-900 font-bold text-[22px]">
                        Detail Izin
                    </h2>

                </div>

            </div>

        </div>

    </div>

    <!-- STATUS -->
    <div class="px-5 mt-5">

        <div class="bg-gradient-to-r <?= $bgStatus ?> rounded-[30px] p-5 text-white shadow-xl">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-white/80 text-[12px] mb-1">
                        Status Pengajuan
                    </p>

                    <h3 class="text-[30px] font-extrabold capitalize">

                        <?= $textStatus ?>

                    </h3>

                </div>

                <div class="w-16 h-16 rounded-3xl bg-white/20 flex items-center justify-center text-3xl">

                    <?= $iconStatus ?>

                </div>

            </div>

        </div>

    </div>

    <!-- INFORMASI -->
    <div class="px-5 mt-5">

        <div class="bg-white rounded-[28px] border border-slate-100 shadow-md p-5">

            <div class="flex items-center justify-between mb-5">

                <div>

                    <h3 class="text-slate-900 font-bold text-[18px]">
                        Informasi Pengajuan
                    </h3>

                    <p class="text-slate-400 text-[11px]">
                        Detail data izin / sakit
                    </p>

                </div>

                <div class="w-11 h-11 rounded-2xl bg-blue-100 flex items-center justify-center text-blue-600">

                    📝

                </div>

            </div>

            <div class="space-y-5">

                <!-- JENIS -->
                <div class="flex items-center justify-between">

                    <p class="text-slate-400 text-[13px]">
                        Jenis
                    </p>

                    <h4 class="text-slate-900 font-bold capitalize text-[14px]">

                        <?= esc($izin['jenis']) ?>

                    </h4>

                </div>

                <!-- TANGGAL -->
                <div class="flex items-start justify-between gap-4">

                    <p class="text-slate-400 text-[13px]">
                        Tanggal
                    </p>

                    <div class="text-right">

                        <h4 class="text-slate-900 font-bold text-[14px] leading-relaxed">

                            <?= $tanggalMulai ?>

                            <br>

                            s/d

                            <br>

                            <?= $tanggalSelesai ?>

                        </h4>

                    </div>

                </div>

                <!-- DURASI -->
                <div class="flex items-center justify-between">

                    <p class="text-slate-400 text-[13px]">
                        Durasi
                    </p>

                    <h4 class="text-blue-600 font-bold text-[14px]">

                        <?= $durasi ?> Hari

                    </h4>

                </div>

                <!-- ALASAN -->
                <div>

                    <p class="text-slate-400 text-[13px] mb-2">
                        Alasan
                    </p>

                    <div class="bg-slate-50 border border-slate-200 rounded-2xl p-4">

                        <p class="text-slate-700 text-[13px] leading-relaxed">

                            <?= nl2br(esc($izin['alasan'])) ?>

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- FILE -->
    <div class="px-5 mt-5">

        <div class="bg-white rounded-[28px] border border-slate-100 shadow-md p-5">

            <div class="flex items-center justify-between mb-5">

                <div>

                    <h3 class="text-slate-900 font-bold text-[17px]">
                        File Pendukung
                    </h3>

                    <p class="text-slate-400 text-[11px]">
                        Dokumen pengajuan
                    </p>

                </div>

                <div class="w-11 h-11 rounded-2xl bg-orange-100 flex items-center justify-center text-orange-500">

                    📎

                </div>

            </div>

            <?php if ($file) : ?>

                <a
                    href="<?= base_url('uploads/izin/' . $file) ?>"
                    target="_blank"
                    class="bg-slate-50 border border-slate-200 rounded-2xl p-4 flex items-center gap-4 active:scale-[0.98] transition">

                    <div class="w-14 h-14 rounded-2xl <?= $fileColor ?> flex items-center justify-center font-bold text-sm shrink-0">

                        <?= $fileIcon ?>

                    </div>

                    <div class="flex-1 overflow-hidden">

                        <h4 class="text-slate-900 font-semibold text-[13px] truncate">

                            <?= esc($file) ?>

                        </h4>

                        <p class="text-slate-400 text-[11px] mt-1">
                            Klik untuk membuka file
                        </p>

                    </div>

                    <div class="text-slate-400 text-lg">

                        ↗

                    </div>

                </a>

            <?php else : ?>

                <div class="bg-slate-50 border border-dashed border-slate-300 rounded-2xl p-5 text-center">

                    <div class="text-4xl mb-3">
                        📭
                    </div>

                    <p class="text-slate-500 text-[13px]">

                        Tidak ada file pendukung

                    </p>

                </div>

            <?php endif; ?>

        </div>

    </div>

    <!-- ADMIN NOTE -->
    <div class="px-5 mt-5">

        <div class="bg-yellow-50 border border-yellow-100 rounded-[24px] p-4 flex items-start gap-3">

            <div class="w-11 h-11 rounded-2xl bg-yellow-400 flex items-center justify-center text-white shrink-0">

                💬

            </div>

            <div>

                <h3 class="text-slate-900 font-bold text-[14px] mb-1">
                    Catatan Sistem
                </h3>

                <p class="text-slate-500 text-[12px] leading-relaxed">

                    <?= $note ?>

                </p>

            </div>

        </div>

    </div>

    <!-- BUTTON -->
    <div class="px-5 mt-5">

        <a
            href="<?= base_url('izin') ?>"
            class="w-full bg-gradient-to-r from-blue-600 to-blue-500 text-white py-4 rounded-[24px] font-bold text-[16px] shadow-xl shadow-blue-500/20 flex items-center justify-center gap-3">

            Kembali

            <span>→</span>

        </a>

    </div>

</div>

<?= $this->endSection() ?>