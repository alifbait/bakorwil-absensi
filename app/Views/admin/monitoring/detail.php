<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>

<div class="flex items-center justify-between mb-6">

    <div>

        <p class="text-slate-400 text-[13px] mb-1">
            Audit Kehadiran Pegawai
        </p>

        <h2 class="text-slate-900 font-extrabold text-[38px]">
            Detail Absensi
        </h2>

    </div>

    <div class="flex items-center gap-4">

        <button
            class="bg-orange-500 hover:bg-orange-600 transition text-white px-6 py-4 rounded-2xl font-semibold text-[14px]">

            Print Detail

        </button>

        <a href="<?= base_url('admin/monitoring') ?>"
            class="bg-white border border-slate-200 hover:bg-slate-100 transition text-slate-700 px-6 py-4 rounded-2xl font-semibold text-[14px] shadow-sm">

            Kembali

        </a>

    </div>

</div>

<div class="grid grid-cols-12 gap-6">

    <!-- LEFT -->
    <div class="col-span-5 space-y-6">

        <!-- SELFIE -->
        <div class="bg-white rounded-[32px] border border-slate-100 shadow-sm p-6">

            <div class="flex items-center justify-between mb-5">

                <div>

                    <h3 class="text-slate-900 font-bold text-[24px]">
                        Selfie Absensi
                    </h3>

                    <p class="text-slate-400 text-[13px]">
                        Bukti kehadiran pegawai
                    </p>

                </div>

                <span class="bg-green-100 text-green-700 px-5 py-2 rounded-xl text-[13px] font-bold">
                    <?= $pegawai['status']; ?>
                </span>

            </div>

            <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?q=80&w=1200&auto=format&fit=crop"
                class="w-full h-[320px] object-cover rounded-[28px]" />

        </div>

        <!-- GPS -->
        <div class="bg-white rounded-[32px] border border-slate-100 shadow-sm p-6">

            <div class="flex items-center justify-between mb-5">

                <div>

                    <h3 class="text-slate-900 font-bold text-[24px]">
                        Validasi GPS
                    </h3>

                    <p class="text-slate-400 text-[13px]">
                        Lokasi absensi realtime
                    </p>

                </div>

                <span class="bg-blue-100 text-blue-700 px-5 py-2 rounded-xl text-[13px] font-bold">
                    Radius Valid
                </span>

            </div>

            <div class="h-[220px] rounded-[28px] overflow-hidden relative">

                <img src="https://images.unsplash.com/photo-1524661135-423995f22d0b?q=80&w=1400&auto=format&fit=crop"
                    class="w-full h-full object-cover" />

            </div>

        </div>

    </div>

    <!-- RIGHT -->
    <div class="col-span-7 space-y-6">

        <!-- PROFILE -->
        <div class="bg-white rounded-[32px] border border-slate-100 shadow-sm p-7">

            <div class="flex items-center justify-between">

                <div class="flex items-center gap-5">

                    <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?q=80&w=1200&auto=format&fit=crop"
                        class="w-20 h-20 rounded-3xl object-cover" />

                    <div>

                        <h3 class="text-slate-900 font-extrabold text-[28px]">
                            <?= $pegawai['nama']; ?>
                        </h3>

                        <div class="bg-blue-100 text-blue-700 px-5 py-2 rounded-xl text-[13px] font-bold inline-block">

                            NIM. <?= $pegawai['nim']; ?>

                        </div>

                    </div>

                </div>

                <div class="bg-green-100 text-green-700 px-6 py-3 rounded-2xl text-[14px] font-bold">
                    <?= $pegawai['status']; ?>
                </div>

            </div>

        </div>

        <!-- ABSENSI -->
        <div class="bg-white rounded-[32px] border border-slate-100 shadow-sm p-7">

            <h3 class="text-slate-900 font-bold text-[26px] mb-6">
                Informasi Absensi
            </h3>

            <div class="grid grid-cols-2 gap-5">

                <div class="bg-slate-50 rounded-[24px] p-5">

                    <p class="text-slate-400 text-[13px] mb-2">
                        Tanggal
                    </p>

                    <h4 class="text-slate-900 font-bold text-[20px]">
                        <?= $pegawai['tanggal']; ?>
                    </h4>

                </div>

                <div class="bg-slate-50 rounded-[24px] p-5">

                    <p class="text-slate-400 text-[13px] mb-2">
                        Jam Masuk
                    </p>

                    <h4 class="text-slate-900 font-bold text-[20px]">
                        <?= $pegawai['jam_masuk']; ?>
                    </h4>

                </div>

                <div class="bg-slate-50 rounded-[24px] p-5">

                    <p class="text-slate-400 text-[13px] mb-2">
                        Jam Pulang
                    </p>

                    <h4 class="text-slate-900 font-bold text-[20px]">
                        <?= $pegawai['jam_pulang']; ?>
                    </h4>

                </div>

                <div class="bg-slate-50 rounded-[24px] p-5">

                    <p class="text-slate-400 text-[13px] mb-2">
                        Lokasi
                    </p>

                    <h4 class="text-slate-900 font-bold text-[20px]">
                        <?= $pegawai['lokasi']; ?>
                    </h4>

                </div>

            </div>

        </div>

    </div>

</div>

<?= $this->endSection() ?>