<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>

<!-- HEADER -->
<div class="mb-8 flex items-center justify-between">

    <div>

        <p class="text-slate-400 text-[14px] mb-1">
            Persetujuan Pengajuan Pegawai
        </p>

        <h1 class="text-[48px] font-extrabold text-slate-900 leading-none">
            Detail Pengajuan
        </h1>

    </div>

    <a href="<?= base_url('admin/izin') ?>"
        class="bg-white border border-slate-200 hover:bg-slate-100 transition text-slate-700 px-6 py-4 rounded-2xl font-semibold text-[14px] shadow-sm">

        Kembali

    </a>

</div>

<!-- CONTENT -->
<div class="grid grid-cols-12 gap-6">

    <!-- LEFT -->
    <div class="col-span-5 space-y-6">

        <!-- FILE -->
        <div class="bg-white rounded-[32px] border border-slate-100 shadow-sm p-6">

            <div class="flex items-center justify-between mb-5">

                <div>

                    <h3 class="text-slate-900 font-bold text-[26px]">
                        File Bukti
                    </h3>

                    <p class="text-slate-400 text-[13px]">
                        Preview surat / lampiran
                    </p>

                </div>

                <span class="bg-blue-100 text-blue-700 px-5 py-2 rounded-xl text-[13px] font-bold">
                    PDF
                </span>

            </div>

            <!-- FILE PREVIEW -->
            <div
                class="h-[420px] rounded-[28px] bg-slate-100 overflow-hidden border border-slate-200 flex items-center justify-center">

                <div class="text-center">

                    <div class="text-[70px] mb-4">
                        📄
                    </div>

                    <h3 class="text-slate-900 font-bold text-[22px]">
                        <?= $izin['file']; ?>
                    </h3>

                    <p class="text-slate-400 text-[14px] mt-2">
                        Klik download untuk melihat detail file
                    </p>

                    <button
                        class="mt-6 bg-blue-600 hover:bg-blue-700 transition text-white px-7 py-4 rounded-2xl font-bold text-[15px]">

                        Download File

                    </button>

                </div>

            </div>

        </div>
        <!-- CATATAN -->
        <?php if ($izin['status'] == 'Pending'): ?>

            <div class="bg-white rounded-[32px] border border-slate-100 shadow-sm p-7">

                <h3 class="text-slate-900 font-bold text-[28px] mb-5">
                    Approval Pengajuan
                </h3>

                <textarea placeholder="Masukkan catatan admin jika diperlukan..."
                    class="w-full h-[140px] rounded-[24px] border border-slate-200 p-5 outline-none resize-none text-[15px]"></textarea>

                <!-- ACTION -->
                <div class="flex items-center justify-end gap-4 mt-6">

                    <button
                        class="border-2 border-red-500 text-red-500 hover:bg-red-500 hover:text-white transition px-7 py-4 rounded-2xl font-bold text-[15px]">

                        Reject Pengajuan

                    </button>

                    <button
                        class="bg-blue-600 hover:bg-blue-700 transition text-white px-7 py-4 rounded-2xl font-bold text-[15px] shadow-lg shadow-blue-500/20">

                        Approve Pengajuan

                    </button>

                </div>

            </div>

        <?php elseif ($izin['status'] == 'Disetujui'): ?>

            <!-- SUCCESS -->
            <div class="bg-green-50 border border-green-200 rounded-[32px] p-8">

                <div class="flex items-start gap-5">

                    <div
                        class="w-20 h-20 rounded-full bg-green-500 flex items-center justify-center text-white text-4xl shrink-0">

                        ✓

                    </div>

                    <div>

                        <h3 class="text-green-700 font-extrabold text-[30px] mb-2">
                            Pengajuan Disetujui
                        </h3>

                        <p class="text-green-600 text-[16px] leading-relaxed max-w-[600px]">
                            Pengajuan izin pegawai telah berhasil disetujui oleh administrator.
                        </p>

                    </div>

                </div>

            </div>

        <?php else: ?>

            <!-- REJECT -->
            <div class="bg-red-50 border border-red-200 rounded-[32px] p-8">

                <div class="flex items-start gap-5">

                    <div
                        class="w-20 h-20 rounded-full bg-red-500 flex items-center justify-center text-white text-4xl shrink-0">

                        ✕

                    </div>

                    <div>

                        <h3 class="text-red-700 font-extrabold text-[30px] mb-2">
                            Pengajuan Ditolak
                        </h3>

                        <p class="text-red-600 text-[16px] leading-relaxed max-w-[600px]">
                            Pengajuan izin pegawai ditolak oleh administrator karena tidak memenuhi persyaratan.
                        </p>

                    </div>

                </div>

            </div>

        <?php endif; ?>

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
                            <?= $izin['nama']; ?>
                        </h3>

                        <div class="bg-blue-100 text-blue-700 px-5 py-2 rounded-xl text-[13px] font-bold inline-block">

                            NIM. 19890111202401002

                        </div>

                    </div>

                </div>

                <div class="px-6 py-3 rounded-2xl text-[14px] font-bold
                    <?= $izin['status'] == 'Pending'
                        ? 'bg-yellow-100 text-yellow-700'
                        : ($izin['status'] == 'Disetujui'
                            ? 'bg-green-100 text-green-700'
                            : 'bg-red-100 text-red-700') ?>">

                    <?= $izin['status']; ?>

                </div>

            </div>

        </div>

        <!-- DETAIL -->
        <div class="bg-white rounded-[32px] border border-slate-100 shadow-sm p-7">

            <h3 class="text-slate-900 font-bold text-[28px] mb-6">
                Informasi Pengajuan
            </h3>

            <div class="grid grid-cols-2 gap-5">

                <!-- JENIS -->
                <div class="bg-slate-50 rounded-[24px] p-5">

                    <p class="text-slate-400 text-[13px] mb-2">
                        Jenis Pengajuan
                    </p>

                    <h4 class="font-bold text-[20px]
                        <?= $izin['jenis'] == 'Sakit'
                            ? 'text-red-700'
                            : 'text-yellow-700'; ?>">

                        <?= $izin['jenis']; ?>

                    </h4>

                </div>

                <!-- TANGGAL -->
                <div class="bg-slate-50 rounded-[24px] p-5">

                    <p class="text-slate-400 text-[13px] mb-2">
                        Tanggal Pengajuan
                    </p>

                    <h4 class="text-slate-900 font-bold text-[20px]">
                        <?= date('d M Y', strtotime($izin['tanggal'])); ?>
                    </h4>

                </div>

                <!-- ALASAN -->
                <div class="col-span-2 bg-slate-50 rounded-[24px] p-5">

                    <p class="text-slate-400 text-[13px] mb-2">
                        Alasan Pengajuan
                    </p>

                    <h4 class="text-slate-900 font-semibold text-[16px] leading-relaxed">
                        <?= $izin['alasan']; ?>
                    </h4>

                </div>

                <!-- UPLOAD -->
                <div class="bg-slate-50 rounded-[24px] p-5">

                    <p class="text-slate-400 text-[13px] mb-2">
                        Tanggal Upload
                    </p>

                    <h4 class="text-slate-900 font-bold text-[18px]">
                        <?= date('d M Y', strtotime($izin['tanggal'])); ?>
                    </h4>

                </div>

                <!-- STATUS -->
                <div class="bg-slate-50 rounded-[24px] p-5">

                    <p class="text-slate-400 text-[13px] mb-2">
                        Status Saat Ini
                    </p>

                    <h4 class="font-bold text-[18px]
                        <?= $izin['status'] == 'Pending'
                            ? 'text-yellow-600'
                            : ($izin['status'] == 'Disetujui'
                                ? 'text-green-600'
                                : 'text-red-600') ?>">

                        <?= $izin['status']; ?>

                    </h4>

                </div>

            </div>

        </div>

        <!-- HISTORY -->
        <div class="bg-white rounded-[32px] border border-slate-100 shadow-sm p-7">

            <div class="mb-6">

                <h3 class="text-slate-900 font-bold text-[28px]">
                    Riwayat Pengajuan
                </h3>

                <p class="text-slate-400 text-[13px]">
                    Pengajuan sebelumnya
                </p>

            </div>

            <div class="space-y-4 h-[300px] overflow-y-auto pr-2 scroll-smooth">
                <div class="bg-slate-50 rounded-[24px] p-5 flex items-center justify-between">

                    <div>

                        <h4 class="text-slate-900 font-bold text-[15px]">
                            Izin Keluarga
                        </h4>

                        <p class="text-slate-400 text-[13px] mt-1">
                            12 Mei 2026
                        </p>

                    </div>

                    <span class="bg-green-100 text-green-700 px-5 py-2 rounded-xl text-[13px] font-bold">
                        Disetujui
                    </span>

                </div>

                <div class="bg-slate-50 rounded-[24px] p-5 flex items-center justify-between">

                    <div>

                        <h4 class="text-slate-900 font-bold text-[15px]">
                            Izin Acara
                        </h4>

                        <p class="text-slate-400 text-[13px] mt-1">
                            03 Mei 2026
                        </p>

                    </div>

                    <span class="bg-red-100 text-red-700 px-5 py-2 rounded-xl text-[13px] font-bold">
                        Ditolak
                    </span>

                </div>

            </div>

        </div>

    </div>

</div>

<?= $this->endSection() ?>