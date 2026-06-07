<?= $this->extend('layouts/user_layout') ?>

<?= $this->section('content') ?>

<div class="min-h-screen flex items-center justify-center px-6">

    <div class="w-full max-w-md text-center">

        <!-- ICON -->
        <div class="w-28 h-28 rounded-full bg-blue-100 mx-auto flex items-center justify-center text-5xl mb-8 shadow-lg">

            📝

        </div>

        <!-- TITLE -->
        <h1 class="text-[32px] font-extrabold text-slate-900 mb-4">

            Survey Sedang Disiapkan

        </h1>

        <!-- DESC -->
        <p class="text-slate-500 text-[15px] leading-relaxed mb-10">

            Sistem absensi berhasil disimpan.
            Link survey resmi dari pihak Bakorwil
            sedang menunggu aktivasi.

        </p>

        <!-- BUTTON -->
        <a
            href="<?= base_url('absensi/success') ?>"
            class="w-full bg-gradient-to-r from-blue-600 to-blue-500 text-white py-4 rounded-[24px] font-bold text-[16px] shadow-xl shadow-blue-500/30 inline-flex items-center justify-center gap-3">

            Lanjutkan

            <span>→</span>

        </a>

    </div>

</div>

<?= $this->endSection() ?>