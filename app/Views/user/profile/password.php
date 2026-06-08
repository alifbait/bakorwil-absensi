<?= $this->extend('layouts/user_layout') ?>

<?= $this->section('content') ?>

<div class="min-h-screen bg-slate-50 pb-32">

    <!-- BG -->
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
                    href="<?= base_url('profile') ?>"
                    class="w-11 h-11 rounded-2xl bg-white shadow-md flex items-center justify-center text-lg">

                    ←

                </a>

                <div>

                    <p class="text-slate-400 text-[11px]">
                        Keamanan Akun
                    </p>

                    <h2 class="text-slate-900 font-bold text-[22px]">
                        Ubah Password
                    </h2>

                </div>

            </div>

        </div>

    </div>

    <!-- ALERT -->
    <div class="px-5 mt-5 relative z-10">

        <?php if (session()->getFlashdata('error')) : ?>

            <div class="bg-red-50 border border-red-100 text-red-600 rounded-[24px] p-4 text-[13px] shadow-sm mb-4">

                <?= session()->getFlashdata('error') ?>

            </div>

        <?php endif; ?>

        <?php if (session()->getFlashdata('success')) : ?>

            <div class="bg-green-50 border border-green-100 text-green-600 rounded-[24px] p-4 text-[13px] shadow-sm mb-4">

                <?= session()->getFlashdata('success') ?>

            </div>

        <?php endif; ?>

    </div>

    <!-- INFO -->
    <div class="px-5 mt-2 relative z-10">

        <div class="bg-blue-50 border border-blue-100 rounded-[24px] p-4 flex items-start gap-3">

            <div class="w-11 h-11 rounded-2xl bg-blue-600 flex items-center justify-center text-white shrink-0">

                🔒

            </div>

            <div>

                <h3 class="text-slate-900 font-bold text-[14px] mb-1">

                    Keamanan Password

                </h3>

                <p class="text-slate-500 text-[12px] leading-relaxed">

                    Gunakan kombinasi password
                    yang kuat dan mudah diingat.

                </p>

            </div>

        </div>

    </div>

    <!-- FORM -->
    <div class="px-5 mt-5 relative z-10">

        <form
            action="<?= base_url('profile/update-password') ?>"
            method="POST"
            class="bg-white rounded-[28px] border border-slate-100 shadow-lg p-5">

            <!-- PASSWORD LAMA -->
            <div class="mb-5">

                <label class="block text-slate-900 font-semibold text-[14px] mb-2">

                    Password Lama

                </label>

                <div class="relative">

                    <input
                        type="password"
                        name="password_lama"
                        id="password_lama"
                        placeholder="Masukkan password lama"
                        class="w-full border border-slate-200 rounded-2xl px-4 py-4 text-[13px] focus:outline-none focus:ring-4 focus:ring-blue-100">

                    <button
                        type="button"
                        onclick="togglePassword('password_lama', this)"
                        class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400">

                        👁️

                    </button>

                </div>

            </div>

            <!-- PASSWORD BARU -->
            <div class="mb-5">

                <label class="block text-slate-900 font-semibold text-[14px] mb-2">

                    Password Baru

                </label>

                <div class="relative">

                    <input
                        type="password"
                        name="password_baru"
                        id="password_baru"
                        placeholder="Masukkan password baru"
                        class="w-full border border-slate-200 rounded-2xl px-4 py-4 text-[13px] focus:outline-none focus:ring-4 focus:ring-blue-100">

                    <button
                        type="button"
                        onclick="togglePassword('password_baru', this)"
                        class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400">

                        👁️

                    </button>

                </div>

            </div>

            <!-- KONFIRMASI -->
            <div>

                <label class="block text-slate-900 font-semibold text-[14px] mb-2">

                    Konfirmasi Password

                </label>

                <div class="relative">

                    <input
                        type="password"
                        name="konfirmasi_password"
                        id="konfirmasi_password"
                        placeholder="Ulangi password baru"
                        class="w-full border border-slate-200 rounded-2xl px-4 py-4 text-[13px] focus:outline-none focus:ring-4 focus:ring-blue-100">

                    <button
                        type="button"
                        onclick="togglePassword('konfirmasi_password', this)"
                        class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-400">

                        👁️

                    </button>

                </div>

            </div>

            <!-- BUTTON -->
            <div class="mt-6">

                <button
                    type="submit"
                    class="w-full bg-gradient-to-r from-blue-600 to-blue-500 text-white py-4 rounded-[24px] font-bold text-[16px] shadow-xl shadow-blue-500/20 flex items-center justify-center gap-3">

                    Simpan Password

                    <span>→</span>

                </button>

            </div>

        </form>

    </div>

    <!-- SECURITY NOTE -->
    <div class="px-5 mt-4 relative z-10">

        <div class="bg-orange-50 border border-orange-100 rounded-[24px] p-4 flex items-start gap-3">

            <div class="w-10 h-10 rounded-2xl bg-orange-400 flex items-center justify-center text-white shrink-0">

                ⚠️

            </div>

            <div>

                <h3 class="text-slate-900 font-bold text-[14px] mb-1">

                    Tips Keamanan

                </h3>

                <p class="text-slate-500 text-[12px] leading-relaxed">

                    Jangan bagikan password akun
                    kepada pengguna lain.

                </p>

            </div>

        </div>

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

<script>

    /*
    |--------------------------------------------------------------------------
    | SHOW HIDE PASSWORD
    |--------------------------------------------------------------------------
    */

    function togglePassword(id, el)
    {
        const input =
            document.getElementById(id);

        if (input.type === 'password') {

            input.type = 'text';

            el.innerHTML = '🙈';

        } else {

            input.type = 'password';

            el.innerHTML = '👁️';

        }
    }

</script>

<?= $this->endSection() ?>