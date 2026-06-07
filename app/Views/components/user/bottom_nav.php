<?php

$active = $active ?? 'home';

?>

<div class="fixed bottom-0 left-1/2 -translate-x-1/2 w-full max-w-[430px] bg-white border-t border-slate-100 px-6 py-4 flex items-center justify-between z-20">

    <!-- HOME -->
    <a
        href="<?= base_url('dashboard') ?>"
        class="flex flex-col items-center gap-1 <?= $active == 'home'
                                                    ? 'text-blue-600'
                                                    : 'text-slate-400' ?>">

        <span class="text-xl">🏠</span>

        <span class="text-[11px] font-semibold">
            Home
        </span>

    </a>

    <!-- ABSENSI -->
    <a
        href="<?= base_url('absensi') ?>"
        class="flex flex-col items-center gap-1 <?= $active == 'absensi'
                                                    ? 'text-blue-600'
                                                    : 'text-slate-400' ?>">

        <span class="text-xl">📍</span>

        <span class="text-[11px]">
            Absensi
        </span>

    </a>

    <!-- IZIN -->
    <a
        href="<?= base_url('izin') ?>"
        class="flex flex-col items-center gap-1 <?= $active == 'izin'
                                                    ? 'text-blue-600'
                                                    : 'text-slate-400' ?>">

        <span class="text-xl">📝</span>

        <span class="text-[11px]">
            Izin
        </span>

    </a>

    <!-- PROFILE -->
    <a
        href="<?= base_url('profile') ?>"
        class="flex flex-col items-center gap-1 <?= $active == 'profile'
                                                    ? 'text-blue-600'
                                                    : 'text-slate-400' ?>">

        <span class="text-xl">👤</span>

        <span class="text-[11px]">
            Profile
        </span>

    </a>

</div>