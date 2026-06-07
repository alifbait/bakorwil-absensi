<div
    class="fixed top-0 left-1/2 -translate-x-1/2 w-full max-w-[430px] z-50 px-5 pt-10 pb-4 bg-white/80 backdrop-blur-xl border-b border-slate-100">

    <div class="flex items-center justify-between">

        <!-- PROFILE -->
        <div class="flex items-center gap-3">

            <!-- FOTO -->
            <div class="w-14 h-14 rounded-2xl overflow-hidden border-2 border-white shadow-md bg-slate-100">

                <img src="<?= base_url('uploads/profile/' . (session()->get('foto') ?? 'default.png')) ?>"
                    class="w-full h-full object-cover">

            </div>

            <!-- INFO -->
            <div>

                <p class="text-slate-400 text-[13px]">
                    Selamat Datang 👋
                </p>

                <h2 class="text-slate-900 font-bold text-[18px] leading-tight">
                    <?= esc(session()->get('nama') ?? 'User') ?>
                </h2>

                <p class="text-blue-600 text-[13px] font-medium capitalize">
                    <?= esc(session()->get('role') ?? 'anggota') ?>
                </p>

            </div>

        </div>

        <!-- NOTIF -->
        <button
            class="w-12 h-12 rounded-2xl bg-white shadow-md border border-slate-100 flex items-center justify-center text-xl shrink-0">

            🔔

        </button>

    </div>

</div>