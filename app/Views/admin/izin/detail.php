<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>

<?= view('components/alert'); ?>

<!-- HEADER -->
<div class="mb-8 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-5">

    <div>

        <p class="text-slate-400 text-[14px] mb-1">
            Persetujuan Pengajuan Peserta
        </p>

        <h1 class="text-[42px] md:text-[48px] font-extrabold text-slate-900 leading-none">
            Detail Pengajuan
        </h1>

    </div>

    <a href="<?= base_url('admin/izin') ?>"
        class="bg-white border border-slate-200 hover:bg-slate-100 transition text-slate-700 px-6 py-4 rounded-2xl font-semibold text-[14px] shadow-sm w-fit">

        Kembali

    </a>

</div>

<!-- CONTENT -->
<div class="grid grid-cols-1 xl:grid-cols-12 gap-6">

    <!-- LEFT -->
    <div class="xl:col-span-5 space-y-6">

        <!-- FILE -->
        <div class="bg-white rounded-[32px] border border-slate-100 shadow-sm p-6">

            <div class="flex items-center justify-between mb-5">

                <div>

                    <h3 class="text-slate-900 font-bold text-[26px]">
                        File Pendukung
                    </h3>

                    <p class="text-slate-400 text-[13px]">
                        Lampiran pengajuan peserta
                    </p>

                </div>

            </div>

            <!-- FILE PREVIEW -->
            <div
                class="h-[420px] rounded-[28px] bg-slate-100 overflow-hidden border border-slate-200 flex items-center justify-center">

                <?php if ($izin['file_pendukung']): ?>

                    <div class="text-center px-5">

                        <div class="text-[70px] mb-4">
                            📄
                        </div>

                        <h3 class="text-slate-900 font-bold text-[22px] break-all">
                            <?= $izin['file_pendukung']; ?>
                        </h3>

                        <p class="text-slate-400 text-[14px] mt-2">
                            Klik tombol di bawah untuk download file
                        </p>

                        <a href="<?= base_url('uploads/izin/' . $izin['file_pendukung']); ?>" target="_blank"
                            class="inline-block mt-6 bg-blue-600 hover:bg-blue-700 transition text-white px-7 py-4 rounded-2xl font-bold text-[15px]">

                            Download File

                        </a>

                    </div>

                <?php else: ?>

                    <div class="text-center px-5">

                        <div class="text-[70px] mb-4">
                            📭
                        </div>

                        <h3 class="text-slate-700 font-bold text-[22px]">
                            Tidak Ada File
                        </h3>

                        <p class="text-slate-400 text-[14px] mt-2">
                            Peserta tidak mengupload lampiran
                        </p>

                    </div>

                <?php endif; ?>

            </div>

        </div>

        <!-- APPROVAL -->
        <?php if ($izin['status'] == 'pending'): ?>

            <div class="bg-white rounded-[32px] border border-slate-100 shadow-sm p-7">

                <h3 class="text-slate-900 font-bold text-[28px] mb-5">
                    Approval Pengajuan
                </h3>

                <div class="flex flex-col sm:flex-row items-center justify-end gap-4">

                    <a href="<?= base_url('admin/izin/reject/' . $izin['id']); ?>"
                        onclick="return confirm('Tolak pengajuan ini?')"
                        class="w-full sm:w-auto text-center border-2 border-red-500 text-red-500 hover:bg-red-500 hover:text-white transition px-7 py-4 rounded-2xl font-bold text-[15px]">

                        Tolak Pengajuan

                    </a>

                    <a href="<?= base_url('admin/izin/approve/' . $izin['id']); ?>"
                        onclick="return confirm('Setujui pengajuan ini?')"
                        class="w-full sm:w-auto text-center bg-blue-600 hover:bg-blue-700 transition text-white px-7 py-4 rounded-2xl font-bold text-[15px] shadow-lg shadow-blue-500/20">

                        Approve Pengajuan

                    </a>

                </div>

            </div>

        <?php elseif ($izin['status'] == 'disetujui'): ?>

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

                        <p class="text-green-600 text-[16px] leading-relaxed">
                            Pengajuan berhasil disetujui administrator.
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

                        <p class="text-red-600 text-[16px] leading-relaxed">
                            Pengajuan ditolak administrator.
                        </p>

                    </div>

                </div>

            </div>

        <?php endif; ?>

    </div>

    <!-- RIGHT -->
    <div class="xl:col-span-7 space-y-6">

        <!-- PROFILE -->
        <div class="bg-white rounded-[32px] border border-slate-100 shadow-sm p-7">

            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-5">

                <div class="flex items-center gap-5">

                    <?php if ($izin['foto_profile']): ?>

                        <img src="<?= base_url('uploads/profile/' . $izin['foto_profile']); ?>"
                            class="w-20 h-20 rounded-3xl object-cover" />

                    <?php else: ?>

                        <div
                            class="w-20 h-20 rounded-3xl bg-blue-100 flex items-center justify-center text-3xl font-bold text-blue-700">

                            <?= strtoupper(substr($izin['nama_lengkap'], 0, 1)); ?>

                        </div>

                    <?php endif; ?>

                    <div>

                        <h3 class="text-slate-900 font-extrabold text-[28px]">
                            <?= $izin['nama_lengkap']; ?>
                        </h3>

                        <div
                            class="bg-blue-100 text-blue-700 px-5 py-2 rounded-xl text-[13px] font-bold inline-block mt-2">

                            NIM. <?= $izin['nim']; ?>

                        </div>

                    </div>

                </div>

                <div class="px-6 py-3 rounded-2xl text-[14px] font-bold

                    <?= $izin['status'] == 'pending'
                        ? 'bg-yellow-100 text-yellow-700'
                        : ($izin['status'] == 'disetujui'
                            ? 'bg-green-100 text-green-700'
                            : 'bg-red-100 text-red-700') ?>">

                    <?= ucfirst($izin['status']); ?>

                </div>

            </div>

        </div>

        <!-- DETAIL -->
        <div class="bg-white rounded-[32px] border border-slate-100 shadow-sm p-7">

            <h3 class="text-slate-900 font-bold text-[28px] mb-6">
                Informasi Pengajuan
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                <!-- JENIS -->
                <div class="bg-slate-50 rounded-[24px] p-5">

                    <p class="text-slate-400 text-[13px] mb-2">
                        Jenis Pengajuan
                    </p>

                    <h4 class="font-bold text-[20px]

                        <?= $izin['jenis'] == 'sakit'
                            ? 'text-red-700'
                            : 'text-yellow-700'; ?>">

                        <?= ucfirst($izin['jenis']); ?>

                    </h4>

                </div>

                <!-- TANGGAL -->
                <div class="bg-slate-50 rounded-[24px] p-5">

                    <p class="text-slate-400 text-[13px] mb-2">
                        Tanggal Pengajuan
                    </p>

                    <h4 class="text-slate-900 font-bold text-[18px]">

                        <?= date('d M Y', strtotime($izin['tanggal_mulai'])); ?>

                        <?php if ($izin['tanggal_selesai'] != $izin['tanggal_mulai']): ?>

                            <span class="block text-sm text-slate-400 mt-1">
                                s/d <?= date('d M Y', strtotime($izin['tanggal_selesai'])); ?>
                            </span>

                        <?php endif; ?>

                    </h4>

                </div>

                <!-- ALASAN -->
                <div class="md:col-span-2 bg-slate-50 rounded-[24px] p-5">

                    <p class="text-slate-400 text-[13px] mb-2">
                        Alasan Pengajuan
                    </p>

                    <h4 class="text-slate-900 font-semibold text-[16px] leading-relaxed">
                        <?= $izin['alasan']; ?>
                    </h4>

                </div>

                <!-- EMAIL -->
                <div class="bg-slate-50 rounded-[24px] p-5">

                    <p class="text-slate-400 text-[13px] mb-2">
                        Email
                    </p>

                    <h4 class="text-slate-900 font-bold text-[16px] break-all">
                        <?= $izin['email'] ?: '-'; ?>
                    </h4>

                </div>

                <!-- HP -->
                <div class="bg-slate-50 rounded-[24px] p-5">

                    <p class="text-slate-400 text-[13px] mb-2">
                        No HP
                    </p>

                    <h4 class="text-slate-900 font-bold text-[16px]">
                        <?= $izin['no_hp'] ?: '-'; ?>
                    </h4>

                </div>

                <!-- INSTANSI -->
                <div class="md:col-span-2 bg-slate-50 rounded-[24px] p-5">

                    <p class="text-slate-400 text-[13px] mb-2">
                        Asal Instansi
                    </p>

                    <h4 class="text-slate-900 font-bold text-[16px]">
                        <?= $izin['asal_instansi'] ?: '-'; ?>
                    </h4>

                </div>

            </div>

        </div>

    </div>

</div>

<?= $this->endSection() ?>