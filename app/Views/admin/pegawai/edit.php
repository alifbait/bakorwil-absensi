<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>

<?= view('components/alert'); ?>

<div class="mb-8 flex items-center justify-between">

    <div>

        <p class="text-slate-400 text-[14px] mb-1">
            Edit Data Peserta Magang
        </p>

        <h1 class="text-[48px] font-extrabold text-slate-900 leading-none">
            Edit Peserta Magang
        </h1>

    </div>

    <a href="<?= base_url('admin/pegawai/detail/' . $pegawai['id']) ?>"
        class="bg-slate-100 hover:bg-slate-200 transition px-6 py-4 rounded-2xl font-semibold text-slate-700 text-[14px]">

        Kembali

    </a>

</div>

<form
    action="<?= base_url('admin/pegawai/update/' . $pegawai['id']) ?>"
    method="POST"
    enctype="multipart/form-data">

    <?= csrf_field(); ?>

    <div class="grid grid-cols-12 gap-7">

        <!-- LEFT -->
        <div class="col-span-8 space-y-7">

            <!-- INFORMASI PERSONAL -->
            <div class="bg-white rounded-[32px] p-8 shadow-sm border border-slate-100">

                <h2 class="text-[30px] font-extrabold text-slate-900 mb-1">
                    Informasi Personal
                </h2>

                <p class="text-slate-400 text-[14px] mb-8">
                    Update informasi Peserta Magang
                </p>

                <div class="grid grid-cols-2 gap-5">

                    <!-- NAMA -->
                    <div>

                        <label class="text-[14px] font-semibold text-slate-700 block mb-3">
                            Nama Lengkap
                        </label>

                        <input
                            type="text"
                            name="nama_lengkap"
                            value="<?= old('nama_lengkap', $pegawai['nama_lengkap']) ?>"
                            required
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none focus:border-blue-500">

                    </div>

                    <!-- NIM -->
                    <div>

                        <label class="text-[14px] font-semibold text-slate-700 block mb-3">
                            NIM
                        </label>

                        <input
                            type="text"
                            name="nim"
                            value="<?= old('nim', $pegawai['nim']) ?>"
                            required
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none focus:border-blue-500">

                    </div>

                    <!-- EMAIL -->
                    <div>

                        <label class="text-[14px] font-semibold text-slate-700 block mb-3">
                            Email
                        </label>

                        <input
                            type="email"
                            name="email"
                            value="<?= old('email', $pegawai['email']) ?>"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none focus:border-blue-500">

                    </div>

                    <!-- NO HP -->
                    <div>

                        <label class="text-[14px] font-semibold text-slate-700 block mb-3">
                            No HP
                        </label>

                        <input
                            type="text"
                            name="no_hp"
                            value="<?= old('no_hp', $pegawai['no_hp']) ?>"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none focus:border-blue-500">

                    </div>

                    <!-- ASAL INSTANSI -->
                    <div class="col-span-2">

                        <label class="text-[14px] font-semibold text-slate-700 block mb-3">
                            Asal Instansi
                        </label>

                        <input
                            type="text"
                            name="asal_instansi"
                            value="<?= old('asal_instansi', $pegawai['asal_instansi']) ?>"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none focus:border-blue-500">

                    </div>

                </div>

            </div>

            <!-- INFORMASI MAGANG -->
            <div class="bg-white rounded-[32px] p-8 shadow-sm border border-slate-100">

                <h2 class="text-[30px] font-extrabold text-slate-900 mb-1">
                    Informasi Magang
                </h2>

                <p class="text-slate-400 text-[14px] mb-8">
                    Data penempatan dan status peserta magang
                </p>

                <div class="grid grid-cols-2 gap-5">

                    <!-- DIVISI -->
                    <div>

                        <label class="text-[14px] font-semibold text-slate-700 block mb-3">
                            Divisi
                        </label>

                        <select
                            name="division_id"
                            required
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none">

                            <option value="">
                                -- Pilih Divisi --
                            </option>

                            <?php foreach ($divisions as $divisi): ?>

                                <option
                                    value="<?= $divisi['id']; ?>"
                                    <?= $pegawai['division_id'] == $divisi['id'] ? 'selected' : ''; ?>>

                                    <?= $divisi['nama_divisi']; ?>

                                </option>

                            <?php endforeach; ?>

                        </select>

                    </div>

                    <!-- STATUS -->
                    <div>

                        <label class="text-[14px] font-semibold text-slate-700 block mb-3">
                            Status
                        </label>

                        <select
                            name="status"
                            required
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none">

                            <option
                                value="aktif"
                                <?= $pegawai['status'] == 'aktif' ? 'selected' : ''; ?>>
                                Aktif
                            </option>

                            <option
                                value="nonaktif"
                                <?= $pegawai['status'] == 'nonaktif' ? 'selected' : ''; ?>>
                                Nonaktif
                            </option>

                        </select>

                    </div>

                    <!-- TANGGAL MULAI -->
                    <div>

                        <label class="text-[14px] font-semibold text-slate-700 block mb-3">
                            Tanggal Mulai
                        </label>

                        <input
                            type="date"
                            name="tanggal_mulai"
                            value="<?= old('tanggal_mulai', $pegawai['tanggal_mulai']) ?>"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none focus:border-blue-500">

                    </div>

                    <!-- TANGGAL SELESAI -->
                    <div>

                        <label class="text-[14px] font-semibold text-slate-700 block mb-3">
                            Tanggal Selesai
                        </label>

                        <input
                            type="date"
                            name="tanggal_selesai"
                            value="<?= old('tanggal_selesai', $pegawai['tanggal_selesai']) ?>"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none focus:border-blue-500">

                    </div>

                </div>

            </div>

        </div>

        <!-- RIGHT -->
        <div class="col-span-4 space-y-7">

            <!-- FOTO -->
            <div class="bg-white rounded-[32px] p-8 shadow-sm border border-slate-100">

                <h2 class="text-[28px] font-extrabold text-slate-900 mb-1">
                    Foto Profil
                </h2>

                <p class="text-slate-400 text-[14px] mb-8">
                    Upload foto baru jika ingin mengganti
                </p>

                <div class="border-2 border-dashed border-slate-200 rounded-[28px] p-8 text-center">

                    <?php if (!empty($pegawai['foto_profile'])): ?>

                        <img
                            src="<?= base_url('uploads/profile/' . $pegawai['foto_profile']) ?>"
                            class="w-36 h-36 rounded-[30px] object-cover mx-auto mb-5">

                    <?php else: ?>

                        <img
                            src="https://ui-avatars.com/api/?name=<?= urlencode($pegawai['nama_lengkap']) ?>&background=e2e8f0&color=0f172a"
                            class="w-36 h-36 rounded-[30px] object-cover mx-auto mb-5">

                    <?php endif; ?>

                    <input
                        type="file"
                        name="foto_profile"
                        class="w-full text-sm text-slate-500">

                </div>

            </div>

            <!-- AKSI -->
            <div class="bg-white rounded-[32px] p-8 shadow-sm border border-slate-100">

                <div class="space-y-4">

                    <button
                        type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 transition text-white py-4 rounded-2xl font-bold text-[15px] shadow-lg shadow-blue-500/20">

                        Simpan Perubahan

                    </button>

                    <a href="<?= base_url('admin/pegawai/detail/' . $pegawai['id']) ?>"
                        class="w-full block text-center bg-slate-100 hover:bg-slate-200 transition text-slate-700 py-4 rounded-2xl font-bold text-[15px]">

                        Batal

                    </a>

                </div>

            </div>

        </div>

    </div>

</form>

<?= $this->endSection() ?>