<?= $this->extend('layouts/user_layout') ?>

<?= $this->section('content') ?>

<div class="min-h-screen bg-slate-50 pb-32">

    <!-- HEADER -->
    <div class="sticky top-0 z-30 bg-white/90 backdrop-blur border-b border-slate-100">

        <div class="px-5 pt-10">

            <div class="flex items-center justify-between">

                <div class="flex items-center gap-3">

                    <a href="<?= base_url('izin/create') ?>"
                        class="w-11 h-11 rounded-2xl bg-white shadow-md flex items-center justify-center text-lg">

                        ←

                    </a>

                    <div>

                        <p class="text-slate-400 text-[11px]">
                            Preview Pengajuan
                        </p>

                        <h2 class="text-slate-900 font-bold text-[21px]">
                            Konfirmasi
                        </h2>

                    </div>

                </div>

                <div class="w-11 h-11 rounded-2xl bg-green-100 flex items-center justify-center text-green-600 text-lg">

                    ✓

                </div>

            </div>

        </div>

    </div>

    <!-- STATUS -->
    <div class="px-5 mt-5">

        <div
            class="bg-gradient-to-r from-blue-600 to-blue-500 rounded-[28px] p-5 text-white shadow-xl shadow-blue-500/20">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-blue-100 text-[12px] mb-1">

                        Jenis Pengajuan

                    </p>

                    <h3 class="text-[26px] font-bold capitalize">

                        <?= esc($preview['jenis']) ?>

                    </h3>

                </div>

                <div class="bg-white/20 px-4 py-2 rounded-2xl text-[12px] font-semibold">

                    Pending

                </div>

            </div>

        </div>

    </div>

    <!-- DETAIL -->
    <div class="px-5 mt-5">

        <div class="bg-white rounded-[28px] border border-slate-100 shadow-lg p-5">

            <!-- TITLE -->
            <div class="flex items-center justify-between mb-5">

                <div>

                    <h3 class="text-slate-900 font-bold text-[17px]">

                        Detail Pengajuan

                    </h3>

                    <p class="text-slate-400 text-[11px]">

                        Periksa kembali data

                    </p>

                </div>

                <div class="w-10 h-10 rounded-2xl bg-blue-100 flex items-center justify-center text-blue-600">

                    📝

                </div>

            </div>

            <!-- DETAIL ITEM -->
            <div class="space-y-5">

                <!-- TANGGAL -->
                <div class="flex items-start justify-between gap-4">

                    <p class="text-slate-400 text-[12px]">
                        Tanggal
                    </p>

                    <div class="text-right">

                        <h4 class="text-slate-900 font-semibold text-[13px]">

                            <?= date('d F Y', strtotime($preview['tanggal_mulai'])) ?>

                        </h4>

                        <p class="text-slate-400 text-[11px] my-1">
                            sampai
                        </p>

                        <h4 class="text-slate-900 font-semibold text-[13px]">

                            <?= date('d F Y', strtotime($preview['tanggal_selesai'])) ?>

                        </h4>

                    </div>

                </div>

                <!-- DURASI -->
                <div class="flex items-center justify-between">

                    <p class="text-slate-400 text-[12px]">
                        Durasi
                    </p>

                    <h4 class="text-slate-900 font-semibold text-[13px]">

                        <?= $durasi ?> Hari

                    </h4>

                </div>

                <!-- ALASAN -->
                <div>

                    <p class="text-slate-400 text-[12px] mb-2">

                        Alasan

                    </p>

                    <div class="bg-slate-50 border border-slate-200 rounded-2xl p-4">

                        <p class="text-slate-700 text-[13px] leading-relaxed">

                            <?= esc($preview['alasan']) ?>

                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- FILE -->
    <?php if ($preview['file_pendukung']): ?>

        <div class="px-5 mt-5">

            <div class="bg-white rounded-[28px] border border-slate-100 shadow-md p-5">

                <!-- TITLE -->
                <div class="flex items-center justify-between mb-5">

                    <div>

                        <h3 class="text-slate-900 font-bold text-[16px]">

                            File Bukti

                        </h3>

                        <p class="text-slate-400 text-[11px]">

                            Dokumen terupload

                        </p>

                    </div>

                    <div class="w-10 h-10 rounded-2xl bg-orange-100 flex items-center justify-center text-orange-500">

                        📄

                    </div>

                </div>

                <!-- FILE -->
                <div class="bg-slate-50 border border-slate-200 rounded-2xl p-3 flex items-center gap-3">

                    <div
                        class="w-12 h-12 rounded-2xl bg-red-100 flex items-center justify-center text-red-500 text-lg shrink-0">

                        <?= strtoupper(pathinfo($preview['file_pendukung'], PATHINFO_EXTENSION)) ?>

                    </div>

                    <div class="flex-1 overflow-hidden">

                        <h4 class="text-slate-900 font-semibold text-[13px] truncate">

                            <?= esc($preview['file_pendukung']) ?>

                        </h4>

                        <p class="text-slate-400 text-[11px]">

                            File siap dikirim

                        </p>

                    </div>

                </div>

            </div>

        </div>

    <?php endif; ?>

    <!-- INFO -->
    <div class="px-5 mt-5">

        <div class="bg-blue-50 border border-blue-100 rounded-[24px] p-4 flex items-start gap-3">

            <div class="w-10 h-10 rounded-2xl bg-blue-600 flex items-center justify-center text-white shrink-0">

                ℹ️

            </div>

            <div>

                <h3 class="text-slate-900 font-bold text-[14px] mb-1">

                    Menunggu Persetujuan

                </h3>

                <p class="text-slate-500 text-[11px] leading-relaxed">

                    Pengajuan akan diverifikasi admin
                    sebelum disetujui.

                </p>

            </div>

        </div>

    </div>

    <!-- ACTION -->
    <div class="px-5 mt-5">

        <div class="grid grid-cols-2 gap-3">

            <!-- EDIT -->
            <a href="<?= base_url('izin/create') ?>"
                class="bg-slate-100 text-slate-700 py-4 rounded-[24px] font-semibold text-[14px] text-center">

                Edit Lagi

            </a>

            <!-- SUBMIT -->
            <form action="<?= base_url('izin/store') ?>" method="POST">

                <button type="submit"
                    class="w-full bg-gradient-to-r from-blue-600 to-blue-500 text-white py-4 rounded-[24px] font-bold text-[14px] shadow-xl shadow-blue-500/20">

                    Kirim

                </button>

            </form>

        </div>

    </div>

</div>

<?= $this->endSection() ?>