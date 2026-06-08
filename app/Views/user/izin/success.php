<?= $this->extend('layouts/user_layout') ?>

<?= $this->section('content') ?>

<div class="min-h-screen bg-slate-50 pb-32 overflow-hidden relative">

    <!-- BG -->
    <div class="absolute -top-20 -left-20 w-56 h-56 rounded-full bg-green-100 opacity-70"></div>

    <div class="absolute top-28 right-6 grid grid-cols-4 gap-2 opacity-40">

        <?php for($i = 0; $i < 8; $i++) : ?>

            <span class="w-2 h-2 rounded-full bg-green-300"></span>

        <?php endfor; ?>

    </div>

    <!-- CONTENT -->
    <div class="relative z-10 px-5 pt-16">

        <!-- ICON -->
        <div class="flex justify-center">

            <div class="w-32 h-32 rounded-full bg-green-100 flex items-center justify-center shadow-2xl shadow-green-200">

                <div class="w-20 h-20 rounded-[28px] bg-gradient-to-br from-green-500 to-green-400 flex items-center justify-center text-white text-5xl shadow-lg">

                    ✓

                </div>

            </div>

        </div>

        <!-- TITLE -->
        <div class="text-center mt-8">

            <h1 class="text-[34px] font-extrabold text-slate-900 leading-tight">

                Pengajuan
                <br>
                Berhasil

            </h1>

            <p class="text-slate-500 text-[14px] leading-relaxed mt-4 max-w-sm mx-auto">

                Pengajuan berhasil dikirim
                dan sedang menunggu verifikasi admin.

            </p>

        </div>

        <!-- CARD -->
        <div class="bg-white rounded-[32px] border border-slate-100 shadow-xl p-5 mt-8">

            <!-- TOP -->
            <div class="flex items-center justify-between mb-5">

                <div>

                    <p class="text-slate-400 text-[12px]">

                        Status Pengajuan

                    </p>

                    <h3 class="text-slate-900 font-bold text-[22px] mt-1 capitalize">

                        <?= esc($izin['jenis']) ?>

                    </h3>

                </div>

                <div class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-2xl text-[12px] font-bold">

                    Pending

                </div>

            </div>

            <!-- DETAIL -->
            <div class="space-y-5">

                <!-- TANGGAL -->
                <div class="flex items-start justify-between gap-4">

                    <p class="text-slate-400 text-[13px]">
                        Tanggal
                    </p>

                    <div class="text-right">

                        <h4 class="text-slate-900 font-bold text-[14px]">

                            <?= date('d M Y', strtotime($izin['tanggal_mulai'])) ?>

                        </h4>

                        <p class="text-slate-400 text-[11px] my-1">

                            sampai

                        </p>

                        <h4 class="text-slate-900 font-bold text-[14px]">

                            <?= date('d M Y', strtotime($izin['tanggal_selesai'])) ?>

                        </h4>

                    </div>

                </div>

                <!-- DURASI -->
                <div class="flex items-center justify-between">

                    <p class="text-slate-400 text-[13px]">
                        Durasi
                    </p>

                    <?php

                        $mulai = strtotime($izin['tanggal_mulai']);

                        $selesai = strtotime($izin['tanggal_selesai']);

                        $durasi =
                            (($selesai - $mulai) / 86400) + 1;

                    ?>

                    <h4 class="text-slate-900 font-bold text-[14px]">

                        <?= $durasi ?> Hari

                    </h4>

                </div>

                <!-- STATUS -->
                <div class="flex items-center justify-between">

                    <p class="text-slate-400 text-[13px]">
                        Status
                    </p>

                    <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-xl text-[11px] font-bold">

                        Menunggu

                    </span>

                </div>

                <!-- FILE -->
                <?php if($izin['file_pendukung']) : ?>

                    <div class="flex items-center justify-between gap-4">

                        <p class="text-slate-400 text-[13px]">
                            File
                        </p>

                        <div class="flex items-center gap-2 bg-slate-50 border border-slate-200 rounded-2xl px-3 py-2 max-w-[180px]">

                            <div class="w-8 h-8 rounded-xl bg-red-100 text-red-500 flex items-center justify-center text-[11px] font-bold shrink-0">

                                <?= strtoupper(pathinfo($izin['file_pendukung'], PATHINFO_EXTENSION)) ?>

                            </div>

                            <p class="text-slate-700 text-[11px] font-semibold truncate">

                                <?= esc($izin['file_pendukung']) ?>

                            </p>

                        </div>

                    </div>

                <?php endif; ?>

                <!-- ALASAN -->
                <div>

                    <p class="text-slate-400 text-[13px] mb-2">
                        Alasan
                    </p>

                    <div class="bg-slate-50 border border-slate-200 rounded-2xl p-4">

                        <p class="text-slate-700 text-[13px] leading-relaxed">

                            <?= esc($izin['alasan']) ?>

                        </p>

                    </div>

                </div>

            </div>

        </div>

        <!-- INFO -->
        <div class="bg-blue-50 border border-blue-100 rounded-[28px] p-4 mt-5 flex gap-3">

            <div class="w-11 h-11 rounded-2xl bg-blue-600 text-white flex items-center justify-center shrink-0">

                ℹ️

            </div>

            <div>

                <h3 class="text-slate-900 font-bold text-[14px] mb-1">

                    Menunggu Persetujuan

                </h3>

                <p class="text-slate-500 text-[12px] leading-relaxed">

                    Admin akan memverifikasi pengajuan anda.
                    Status dapat dilihat pada halaman riwayat izin.

                </p>

            </div>

        </div>

        <!-- BUTTON -->
        <div class="mt-6 space-y-3">

            <!-- RIWAYAT -->
            <a
                href="<?= base_url('izin') ?>"
                class="w-full bg-gradient-to-r from-blue-600 to-blue-500 text-white py-4 rounded-[24px] font-bold text-[16px] shadow-xl shadow-blue-500/20 flex items-center justify-center gap-3">

                Lihat Riwayat

                <span>→</span>

            </a>

            <!-- DASHBOARD -->
            <a
                href="<?= base_url('dashboard') ?>"
                class="w-full bg-white border border-slate-200 text-slate-700 py-4 rounded-[24px] font-bold text-[15px] flex items-center justify-center">

                Kembali ke Dashboard

            </a>

        </div>

    </div>

</div>

<?= $this->endSection() ?>