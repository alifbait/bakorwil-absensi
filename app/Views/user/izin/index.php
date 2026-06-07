<?= $this->extend('layouts/user_layout') ?>

<?= $this->section('content') ?>

<div class="min-h-screen bg-slate-50 pb-32">

    <!-- HEADER -->
    <div class="sticky top-0 z-30 bg-white/90 backdrop-blur border-b border-slate-100">

        <div class="px-5 pt-10 pb-5">

            <div class="flex items-center justify-between">

                <div class="flex items-center gap-3">

                    <a
                        href="<?= base_url('dashboard') ?>"
                        class="w-11 h-11 rounded-2xl bg-slate-100 shadow-sm flex items-center justify-center text-lg">

                        ←

                    </a>

                    <div>

                        <p class="text-slate-400 text-[11px]">
                            Pengajuan Kehadiran
                        </p>

                        <h2 class="text-slate-900 font-bold text-[22px]">
                            Status Izin
                        </h2>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- SUMMARY -->
    <div class="px-5 mt-5">

        <div class="bg-gradient-to-r from-blue-600 to-blue-500 rounded-[30px] p-5 text-white shadow-xl shadow-blue-500/20">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-blue-100 text-[12px] mb-1">
                        Total Pengajuan
                    </p>

                    <h3 class="text-[32px] font-extrabold">
                        <?= $total ?>
                    </h3>

                </div>

                <div class="w-16 h-16 rounded-3xl bg-white/20 flex items-center justify-center text-3xl">

                    📝

                </div>

            </div>

            <!-- STATS -->
            <div class="grid grid-cols-3 gap-3 mt-5">

                <div class="bg-white/10 rounded-2xl p-3 text-center">

                    <h4 class="text-[18px] font-bold">
                        <?= $pending ?>
                    </h4>

                    <p class="text-blue-100 text-[11px]">
                        Pending
                    </p>

                </div>

                <div class="bg-white/10 rounded-2xl p-3 text-center">

                    <h4 class="text-[18px] font-bold">
                        <?= $approved ?>
                    </h4>

                    <p class="text-blue-100 text-[11px]">
                        Disetujui
                    </p>

                </div>

                <div class="bg-white/10 rounded-2xl p-3 text-center">

                    <h4 class="text-[18px] font-bold">
                        <?= $rejected ?>
                    </h4>

                    <p class="text-blue-100 text-[11px]">
                        Ditolak
                    </p>

                </div>

            </div>

        </div>

    </div>

    <!-- FILTER -->
    <div class="px-5 mt-5">

        <div class="flex gap-3 overflow-x-auto no-scrollbar pb-1">

            <button class="bg-gradient-to-r from-blue-600 to-blue-500 text-white px-5 py-3 rounded-2xl text-[13px] font-bold whitespace-nowrap shadow-lg shadow-blue-500/20">

                Semua

            </button>

            <button class="bg-white border border-slate-200 text-slate-600 px-5 py-3 rounded-2xl text-[13px] font-semibold whitespace-nowrap">

                Pending

            </button>

            <button class="bg-white border border-slate-200 text-slate-600 px-5 py-3 rounded-2xl text-[13px] font-semibold whitespace-nowrap">

                Disetujui

            </button>

            <button class="bg-white border border-slate-200 text-slate-600 px-5 py-3 rounded-2xl text-[13px] font-semibold whitespace-nowrap">

                Ditolak

            </button>

        </div>

    </div>

    <!-- LIST -->
    <div class="px-5 mt-5 space-y-4">

        <?php if (!empty($izin)) : ?>

            <?php foreach ($izin as $item) : ?>

                <?php

                /*
                |--------------------------------------------------------------------------
                | STATUS STYLE
                |--------------------------------------------------------------------------
                */

                $badge = 'bg-yellow-100 text-yellow-700';

                $iconBg = 'bg-yellow-100 text-yellow-600';

                $icon = '⏳';

                if ($item['status'] == 'disetujui') {

                    $badge = 'bg-green-100 text-green-700';

                    $iconBg = 'bg-green-100 text-green-600';

                    $icon = '✓';
                }

                if ($item['status'] == 'ditolak') {

                    $badge = 'bg-red-100 text-red-700';

                    $iconBg = 'bg-red-100 text-red-600';

                    $icon = '✕';
                }

                /*
                |--------------------------------------------------------------------------
                | FORMAT TANGGAL
                |--------------------------------------------------------------------------
                */

                $tanggalMulai = date(
                    'd M Y',
                    strtotime($item['tanggal_mulai'])
                );

                $tanggalSelesai = date(
                    'd M Y',
                    strtotime($item['tanggal_selesai'])
                );

                /*
                |--------------------------------------------------------------------------
                | HITUNG DURASI
                |--------------------------------------------------------------------------
                */

                $mulai = strtotime($item['tanggal_mulai']);

                $selesai = strtotime($item['tanggal_selesai']);

                $durasi = (($selesai - $mulai) / 86400) + 1;

                ?>

                <!-- ITEM -->
                <a
                    href="<?= base_url('izin/detail/' . $item['id']) ?>"
                    class="bg-white rounded-[28px] border border-slate-100 shadow-md p-4 flex items-center justify-between block active:scale-[0.98] transition">

                    <div class="flex items-center gap-4">

                        <!-- ICON -->
                        <div class="w-14 h-14 rounded-2xl <?= $iconBg ?> flex items-center justify-center text-xl shrink-0">

                            <?= $icon ?>

                        </div>

                        <!-- CONTENT -->
                        <div>

                            <h3 class="text-slate-900 font-bold text-[15px] capitalize">

                                <?= esc($item['jenis']) ?>

                            </h3>

                            <!-- TANGGAL -->
                            <p class="text-slate-400 text-[12px] mt-1">

                                <?= $tanggalMulai ?>

                                <?php if ($item['tanggal_mulai'] != $item['tanggal_selesai']) : ?>

                                    - <?= $tanggalSelesai ?>

                                <?php endif; ?>

                            </p>

                            <!-- DURASI -->
                            <p class="text-slate-400 text-[11px] mt-1">

                                Durasi:
                                <?= $durasi ?> Hari

                            </p>

                        </div>

                    </div>

                    <!-- STATUS -->
                    <span class="<?= $badge ?> px-3 py-1 rounded-xl text-[11px] font-semibold capitalize whitespace-nowrap">

                        <?= esc($item['status']) ?>

                    </span>

                </a>

            <?php endforeach; ?>

        <?php else : ?>

            <!-- EMPTY -->
            <div class="bg-white rounded-[30px] border border-slate-100 shadow-sm p-8 text-center">

                <div class="text-5xl mb-4">
                    📭
                </div>

                <h3 class="text-slate-900 font-bold text-[18px] mb-2">
                    Belum Ada Pengajuan
                </h3>

                <p class="text-slate-400 text-[13px] leading-relaxed">

                    Anda belum pernah membuat
                    pengajuan izin atau sakit.

                </p>

            </div>

        <?php endif; ?>

    </div>

    <!-- FLOAT BUTTON -->
    <a
        href="<?= base_url('izin/create') ?>"
        class="fixed bottom-24 right-5 z-40 w-16 h-16 rounded-full bg-gradient-to-r from-orange-500 to-orange-400 shadow-2xl shadow-orange-300 flex items-center justify-center text-white text-3xl active:scale-95 transition">

        +

    </a>

</div>

<style>

    .no-scrollbar::-webkit-scrollbar{
        display:none;
    }

</style>

<?= $this->endSection() ?>