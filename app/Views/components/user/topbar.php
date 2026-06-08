<div
    class="fixed top-0 left-1/2 -translate-x-1/2 w-full max-w-[430px] z-50 px-5 pt-10 pb-4 bg-white/80 backdrop-blur-xl border-b border-slate-100">

    <div class="flex items-center justify-between">

        <!-- PROFILE -->
        <a href="<?= base_url('profile') ?>" class="flex items-center gap-3 active:scale-[0.98] transition">

            <img src="<?= base_url('uploads/profile/' . (session('foto') ?? 'default.png')) ?>"
                class="w-14 h-14 rounded-2xl object-cover border border-slate-200">

            <div>

                <p class="text-slate-400 text-[12px]">
                    Selamat Datang 👋
                </p>

                <h2 class="text-slate-900 font-bold text-[24px] leading-tight">

                    <?= session('nama') ?>

                </h2>

                <p class="text-blue-600 font-semibold text-[13px]">

                    <?= session('divisi') ?? 'Peserta Magang' ?>

                </p>
                
            </div>

        </a>

        <!-- NOTIF -->
        <button
            class="w-12 h-12 rounded-2xl bg-white shadow-md border border-slate-100 flex items-center justify-center text-xl shrink-0">

            🔔

        </button>

    </div>

</div>