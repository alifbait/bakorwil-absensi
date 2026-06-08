<?= $this->extend('layouts/user_layout') ?>

<?= $this->section('content') ?>

<div class="min-h-screen bg-slate-50 pb-32">

    <!-- BG -->
    <div class="absolute -top-16 -left-16 w-40 h-40 rounded-full bg-blue-100 opacity-70"></div>

    <!-- HEADER -->
    <div class="sticky top-0 z-30 bg-white/90 backdrop-blur border-b border-slate-100">

        <div class="px-5 pt-10 pb-5">

            <div class="flex items-center gap-3">

                <a
                    href="<?= base_url('dashboard') ?>"
                    class="w-11 h-11 rounded-2xl bg-slate-100 shadow-sm flex items-center justify-center text-lg">

                    ←

                </a>

                <div>

                    <p class="text-slate-400 text-[11px]">
                        Data Kehadiran
                    </p>

                    <h2 class="text-slate-900 font-bold text-[22px]">
                        Riwayat Absensi
                    </h2>

                </div>

            </div>

        </div>

    </div>

    <!-- FILTER -->
    <div class="px-5 mt-5 relative z-10">

        <div class="flex gap-3 overflow-x-auto no-scrollbar pb-1">

            <?php

            $currentFilter = $_GET['status'] ?? 'semua';

            $filters = [

                'semua' => 'Semua',
                'hadir' => 'Hadir',
                'telat' => 'Telat',
                'alpha' => 'Alpha',

            ];

            ?>

            <?php foreach ($filters as $key => $label) : ?>

                <?php

                $active = $currentFilter == $key;

                ?>

                <a
                    href="<?= base_url('riwayat?status=' . $key) ?>"
                    class="<?= $active
                                ? 'bg-gradient-to-r from-blue-600 to-blue-500 text-white shadow-lg shadow-blue-500/20'
                                : 'bg-white border border-slate-200 text-slate-600'
                            ?> px-5 py-3 rounded-2xl text-[13px] font-bold whitespace-nowrap">

                    <?= $label ?>

                </a>

            <?php endforeach; ?>

        </div>

    </div>

    <!-- LIST -->
    <div class="px-5 mt-5 relative z-10 space-y-4">

        <?php if (!empty($riwayat)) : ?>

            <?php foreach ($riwayat as $item) : ?>

                <?php

                /*
                |--------------------------------------------------------------------------
                | DEFAULT STYLE
                |--------------------------------------------------------------------------
                */

                $icon = '✓';

                $iconBg = 'bg-green-100 text-green-600';

                $badge = 'bg-green-100 text-green-700';

                $subtitle = ($item['jam_masuk'] ?? '--:--');

                /*
                |--------------------------------------------------------------------------
                | STATUS TELAT
                |--------------------------------------------------------------------------
                */

                if ($item['status'] == 'telat') {

                    $icon = '⏰';

                    $iconBg = 'bg-yellow-100 text-yellow-600';

                    $badge = 'bg-yellow-100 text-yellow-700';
                }

                /*
                |--------------------------------------------------------------------------
                | STATUS ALPHA
                |--------------------------------------------------------------------------
                */

                if ($item['status'] == 'alpha') {

                    $icon = '✕';

                    $iconBg = 'bg-red-100 text-red-600';

                    $badge = 'bg-red-100 text-red-700';

                    $subtitle = 'Tidak melakukan absensi';
                }

                ?>

                <!-- ITEM -->
                <a
                    href="<?= base_url('riwayat/detail/' . $item['id']) ?>"
                    class="bg-white rounded-[26px] border border-slate-100 shadow-md p-4 flex items-center justify-between active:scale-[0.98] transition block">

                    <div class="flex items-center gap-4">

                        <!-- ICON -->
                        <div class="w-14 h-14 rounded-2xl <?= $iconBg ?> flex items-center justify-center text-xl shrink-0">

                            <?= $icon ?>

                        </div>

                        <!-- CONTENT -->
                        <div>

                            <h3 class="text-slate-900 font-bold text-[15px]">

                                <?= date('d F Y', strtotime($item['tanggal'])) ?>

                            </h3>

                            <p class="text-slate-400 text-[12px]">

                                <?= $subtitle ?>

                            </p>

                        </div>

                    </div>

                    <!-- STATUS -->
                    <div class="text-right">

                        <span class="<?= $badge ?> px-3 py-1 rounded-xl text-[11px] font-semibold capitalize">

                            <?= esc($item['status']) ?>

                        </span>

                    </div>

                </a>

            <?php endforeach; ?>

        <?php else : ?>

            <!-- EMPTY -->
            <div class="bg-white rounded-[28px] border border-slate-100 shadow-md p-8 text-center">

                <div class="text-5xl mb-4">
                    📭
                </div>

                <h3 class="text-slate-900 font-bold text-[18px] mb-2">

                    Belum Ada Riwayat

                </h3>

                <p class="text-slate-400 text-[13px] leading-relaxed">

                    Riwayat absensi akan muncul
                    setelah melakukan kehadiran.

                </p>

            </div>

        <?php endif; ?>

    </div>

    <!-- WAVE -->
    <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none">

        <svg viewBox="0 0 500 150" preserveAspectRatio="none" class="w-full h-12">

            <path
                d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z"
                fill="#0f5fe8">
            </path>

            <path
                d="M0.00,70.00 C149.99,170.00 349.20,-20.00 500.00,70.00 L500.00,150.00 L0.00,150.00 Z"
                fill="#ff9f43">
            </path>

        </svg>

    </div>

</div>

<style>

    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }

</style>

<?= $this->endSection() ?>