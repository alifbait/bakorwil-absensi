<?= $this->extend('layouts/user_layout') ?>

<?= $this->section('content') ?>

<div class="min-h-screen bg-slate-50 overflow-hidden relative">

    <!-- BACKGROUND -->
    <div class="absolute -top-20 -left-20 w-56 h-56 rounded-full bg-orange-100 opacity-70"></div>

    <div class="absolute top-24 right-7 grid grid-cols-4 gap-2 opacity-40">

        <?php for ($i = 0; $i < 8; $i++) : ?>

            <span class="w-2 h-2 rounded-full bg-orange-300"></span>

        <?php endfor; ?>

    </div>

    <div class="absolute -bottom-24 -right-24 w-56 h-56 rounded-full bg-blue-100 opacity-70"></div>

    <!-- CONTENT -->
    <div class="relative z-10 min-h-screen flex flex-col items-center justify-center px-6 text-center">

        <!-- SUCCESS ICON -->
        <div class="relative mb-8">

            <div
                class="w-36 h-36 rounded-full bg-orange-100 flex items-center justify-center shadow-xl shadow-orange-200">

                <div
                    class="w-24 h-24 rounded-full bg-orange-500 flex items-center justify-center text-white text-5xl">

                    ✓

                </div>

            </div>

            <div
                class="absolute -bottom-1 -right-1 bg-blue-600 text-white px-4 py-2 rounded-2xl text-[12px] font-semibold shadow-lg">

                Success

            </div>

        </div>

        <!-- TITLE -->
        <h1 class="text-[36px] leading-tight font-extrabold text-slate-900 mb-4">

            Absen Pulang
            <br>
            Berhasil

        </h1>

        <!-- DESC -->
        <p class="text-slate-500 text-[15px] leading-relaxed max-w-[290px] mb-8">

            Data absensi pulang berhasil disimpan
            ke sistem secara realtime.

        </p>

        <!-- CARD -->
        <div
            class="w-full bg-white rounded-[32px] border border-slate-100 shadow-lg p-6 mb-8">

            <!-- HEADER -->
            <div class="flex items-center justify-between mb-6">

                <div class="text-left">

                    <p class="text-slate-400 text-[12px] mb-1">
                        Status Kehadiran
                    </p>

                    <h3 class="text-orange-500 font-extrabold text-[24px]">

                        Selesai

                    </h3>

                </div>

                <div
                    class="w-14 h-14 rounded-2xl bg-orange-100 flex items-center justify-center text-orange-500 text-2xl">

                    🌇

                </div>

            </div>

            <!-- DETAIL -->
            <div class="space-y-4">

                <!-- JAM MASUK -->
                <div class="flex items-center justify-between">

                    <p class="text-slate-400 text-[13px]">
                        Jam Masuk
                    </p>

                    <h4 class="text-slate-900 font-bold text-[15px]">

                        <?= date('H:i', strtotime($absensi['jam_masuk'])) ?>

                    </h4>

                </div>

                <!-- JAM PULANG -->
                <div class="flex items-center justify-between">

                    <p class="text-slate-400 text-[13px]">
                        Jam Pulang
                    </p>

                    <h4 class="text-slate-900 font-bold text-[15px]">

                        <?= date('H:i', strtotime($absensi['jam_pulang'])) ?>

                    </h4>

                </div>

                <!-- TOTAL JAM -->
                <div class="flex items-center justify-between">

                    <p class="text-slate-400 text-[13px]">
                        Total Kerja
                    </p>

                    <h4 class="text-blue-600 font-bold text-[15px]">

                        <?= $absensi['total_jam_kerja'] ?> Jam

                    </h4>

                </div>

                <!-- STATUS -->
                <div class="flex items-center justify-between">

                    <p class="text-slate-400 text-[13px]">
                        Status
                    </p>

                    <span
                        class="bg-green-100 text-green-700 px-4 py-2 rounded-2xl text-[12px] font-bold">

                        Lengkap

                    </span>

                </div>

                <!-- TANGGAL -->
                <div class="flex items-center justify-between">

                    <p class="text-slate-400 text-[13px]">
                        Tanggal
                    </p>

                    <h4 class="text-slate-900 font-bold text-[14px]">

                        <?= date('d F Y', strtotime($absensi['tanggal'])) ?>

                    </h4>

                </div>

            </div>

        </div>

        <!-- BUTTON -->
        <a
            href="<?= base_url('dashboard') ?>"
            class="w-full bg-gradient-to-r from-blue-600 to-blue-500 text-white py-4 rounded-[26px] font-bold text-[18px] shadow-xl shadow-blue-500/30 flex items-center justify-center gap-3">

            Kembali ke Dashboard

            <span>→</span>

        </a>

    </div>

    <!-- WAVE -->
    <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none">

        <svg
            viewBox="0 0 500 150"
            preserveAspectRatio="none"
            class="w-full h-24">

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

<?= $this->endSection() ?>