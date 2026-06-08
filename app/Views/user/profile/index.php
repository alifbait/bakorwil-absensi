<?= $this->extend('layouts/user_layout') ?>

<?= $this->section('content') ?>

<div class="min-h-screen bg-slate-50 pb-32">

    <!-- BG DECOR -->
    <div class="absolute -top-16 -left-16 w-40 h-40 rounded-full bg-blue-100 opacity-70"></div>

    <div class="absolute top-24 right-7 grid grid-cols-4 gap-2 opacity-40">

        <?php for ($i = 0; $i < 8; $i++) : ?>

            <span class="w-2 h-2 rounded-full bg-blue-300"></span>

        <?php endfor; ?>

    </div>

    <!-- HEADER -->
    <div class="sticky top-0 z-30 bg-white/90 backdrop-blur border-b border-slate-100">

        <div class="px-5 pt-10 pb-5 relative z-10">

            <div class="flex items-center gap-3">

                <a
                    href="<?= base_url('dashboard') ?>"
                    class="w-11 h-11 rounded-2xl bg-white shadow-md flex items-center justify-center text-lg">

                    ←

                </a>

                <div>

                    <p class="text-slate-400 text-[11px]">
                        Informasi Akun
                    </p>

                    <h2 class="text-slate-900 font-bold text-[22px]">
                        Profile Saya
                    </h2>

                </div>

            </div>

        </div>

    </div>

    <!-- PROFILE -->
    <div class="px-5 mt-5 relative z-10">

        <div class="bg-gradient-to-r from-blue-600 to-blue-500 rounded-[30px] p-6 text-white shadow-xl shadow-blue-500/20">

            <div class="flex flex-col items-center text-center">

                <!-- FOTO -->
                <div class="w-28 h-28 rounded-full overflow-hidden border-4 border-white/30 shadow-lg mb-4 bg-white">

                    <?php if (!empty($user['foto_profile'])) : ?>

                        <img
                            src="<?= base_url('uploads/profile/' . $user['foto_profile']) ?>"
                            class="w-full h-full object-cover">

                    <?php elseif (!empty($user['foto'])) : ?>

                        <img
                            src="<?= base_url('uploads/users/' . $user['foto']) ?>"
                            class="w-full h-full object-cover">

                    <?php else : ?>

                        <div class="w-full h-full flex items-center justify-center text-5xl bg-white text-blue-500">

                            👤

                        </div>

                    <?php endif; ?>

                </div>

                <!-- NAMA -->
                <h3 class="text-[24px] font-bold">

                    <?= esc($user['nama_lengkap']) ?>

                </h3>

                <!-- NIM -->
                <p class="text-blue-100 text-[13px] mt-1">

                    <?= !empty($user['nim']) ? 'NIM. ' . esc($user['nim']) : 'Peserta Magang' ?>

                </p>

                <!-- BADGE -->
                <div class="bg-white/20 px-4 py-2 rounded-2xl text-[12px] font-semibold mt-4 capitalize">

                    <?= esc($user['divisi'] ?? 'Anggota') ?>

                </div>

            </div>

        </div>

    </div>

    <!-- DETAIL -->
    <div class="px-5 mt-5 relative z-10 space-y-4">

        <!-- UNIT -->
        <div class="bg-white rounded-[24px] border border-slate-100 shadow-md p-4">

            <div class="flex items-center gap-4">

                <div class="w-12 h-12 rounded-2xl bg-blue-100 flex items-center justify-center text-blue-600 text-lg shrink-0">

                    🏢

                </div>

                <div>

                    <h3 class="text-slate-900 font-semibold text-[14px]">
                        Asal Instansi
                    </h3>

                    <p class="text-slate-400 text-[12px]">

                        <?= esc($user['asal_instansi'] ?? '-') ?>

                    </p>

                </div>

            </div>

        </div>

        <!-- EMAIL -->
        <div class="bg-white rounded-[24px] border border-slate-100 shadow-md p-4">

            <div class="flex items-center gap-4">

                <div class="w-12 h-12 rounded-2xl bg-green-100 flex items-center justify-center text-green-600 text-lg shrink-0">

                    ✉️

                </div>

                <div>

                    <h3 class="text-slate-900 font-semibold text-[14px]">
                        Email
                    </h3>

                    <p class="text-slate-400 text-[12px] break-all">

                        <?= esc($user['email'] ?? '-') ?>

                    </p>

                </div>

            </div>

        </div>

        <!-- HP -->
        <div class="bg-white rounded-[24px] border border-slate-100 shadow-md p-4">

            <div class="flex items-center gap-4">

                <div class="w-12 h-12 rounded-2xl bg-purple-100 flex items-center justify-center text-purple-600 text-lg shrink-0">

                    📱

                </div>

                <div>

                    <h3 class="text-slate-900 font-semibold text-[14px]">
                        Nomor HP
                    </h3>

                    <p class="text-slate-400 text-[12px]">

                        <?= esc($user['no_hp'] ?? '-') ?>

                    </p>

                </div>

            </div>

        </div>

        <!-- USERNAME -->
        <div class="bg-white rounded-[24px] border border-slate-100 shadow-md p-4">

            <div class="flex items-center gap-4">

                <div class="w-12 h-12 rounded-2xl bg-orange-100 flex items-center justify-center text-orange-500 text-lg shrink-0">

                    👤

                </div>

                <div>

                    <h3 class="text-slate-900 font-semibold text-[14px]">
                        Username
                    </h3>

                    <p class="text-slate-400 text-[12px]">

                        <?= esc($user['username']) ?>

                    </p>

                </div>

            </div>

        </div>

        <!-- PASSWORD -->
        <a
            href="<?= base_url('profile/password') ?>"
            class="bg-white rounded-[24px] border border-slate-100 shadow-md p-4 flex items-center justify-between block active:scale-[0.98] transition">

            <div class="flex items-center gap-4">

                <div class="w-12 h-12 rounded-2xl bg-red-100 flex items-center justify-center text-red-500 text-lg shrink-0">

                    🔒

                </div>

                <div>

                    <h3 class="text-slate-900 font-semibold text-[14px]">
                        Ubah Password
                    </h3>

                    <p class="text-slate-400 text-[12px]">
                        Keamanan akun pengguna
                    </p>

                </div>

            </div>

            <span class="text-slate-400 text-lg">
                →
            </span>

        </a>

    </div>

    <!-- LOGOUT -->
    <div class="px-5 mt-6 relative z-10">

        <a
            href="<?= base_url('logout') ?>"
            class="w-full bg-red-500 text-white py-4 rounded-[24px] font-bold text-[16px] shadow-xl shadow-red-300/30 flex items-center justify-center gap-3">

            Logout

            <span>
                ↗
            </span>

        </a>

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

<?= $this->endSection() ?>