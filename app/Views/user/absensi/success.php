<?= $this->extend('layouts/user_layout') ?>

<?= $this->section('content') ?>

<div class="min-h-screen flex flex-col items-center justify-center px-6 text-center">

    <!-- ICON -->
    <div class="w-32 h-32 rounded-full bg-green-100 flex items-center justify-center text-6xl mb-8 shadow-xl">

        ✅

    </div>

    <!-- TITLE -->
    <h1 class="text-[36px] font-extrabold text-slate-900 leading-tight mb-4">

        Absensi
        <br>
        Berhasil

    </h1>

    <!-- DESC -->
    <p class="text-slate-500 text-[15px] leading-relaxed mb-10 max-w-sm">

        Data kehadiran berhasil disimpan
        ke sistem secara realtime.

    </p>

    <!-- CARD -->
    <div class="w-full bg-white rounded-[32px] p-6 shadow-lg border border-slate-100 mb-8">

        <div class="flex items-center justify-between mb-4">

            <p class="text-slate-400 text-[13px]">
                Status Kehadiran
            </p>

            <div class="w-10 h-10 rounded-2xl bg-green-100 flex items-center justify-center text-green-600">
                ✓
            </div>

        </div>

        <div class="space-y-4 text-left">

            <div class="flex items-center justify-between">

                <span class="text-slate-400 text-[13px]">
                    Status
                </span>

                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-xl text-[12px] font-bold capitalize">
                    <?= $absensi['status'] ?>
                </span>

            </div>

            <div class="flex items-center justify-between">

                <span class="text-slate-400 text-[13px]">
                    Jam Masuk
                </span>

                <span class="font-bold text-slate-900">
                    <?= $absensi['jam_masuk'] ?>
                </span>

            </div>

            <div class="flex items-center justify-between">

                <span class="text-slate-400 text-[13px]">
                    Tanggal
                </span>

                <span class="font-bold text-slate-900">
                    <?= date('d F Y', strtotime($absensi['tanggal'])) ?>
                </span>

            </div>

        </div>

    </div>

    <!-- BUTTON -->
    <a
        href="<?= base_url('dashboard') ?>"
        class="w-full bg-gradient-to-r from-blue-600 to-blue-500 text-white py-4 rounded-[24px] font-bold text-[16px] shadow-xl shadow-blue-500/30 flex items-center justify-center gap-3">

        Kembali ke Dashboard

        <span>→</span>

    </a>

</div>

<?= $this->endSection() ?>