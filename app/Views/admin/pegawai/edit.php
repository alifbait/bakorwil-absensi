<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>

<div class="mb-8 flex items-center justify-between">

    <div>

        <p class="text-slate-400 text-[14px] mb-1">
            Edit Data Magang
        </p>

        <h1 class="text-[48px] font-extrabold text-slate-900 leading-none">
            Edit Anggota
        </h1>

    </div>

    <a href="<?= base_url('admin/pegawai/detail/' . $id) ?>"
        class="bg-slate-100 hover:bg-slate-200 transition px-6 py-4 rounded-2xl font-semibold text-slate-700 text-[14px]">

        Kembali

    </a>

</div>

<form action="<?= base_url('admin/pegawai/update/' . $id) ?>"
    method="POST"
    enctype="multipart/form-data">

    <div class="grid grid-cols-12 gap-7">

        <!-- LEFT -->
        <div class="col-span-8 space-y-7">

            <!-- INFORMASI PERSONAL -->
            <div class="bg-white rounded-[32px] p-8 shadow-sm border border-slate-100">

                <h2 class="text-[30px] font-extrabold text-slate-900 mb-1">
                    Informasi Personal
                </h2>

                <p class="text-slate-400 text-[14px] mb-8">
                    Edit data identitas peserta magang
                </p>

                <div class="grid grid-cols-2 gap-5">

                    <!-- NAMA -->
                    <div>

                        <label class="text-[14px] font-semibold text-slate-700 block mb-3">
                            Nama Lengkap
                        </label>

                        <input
                            type="text"
                            name="nama"
                            value="<?= $pegawai['nama']; ?>"
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
                            value="<?= $pegawai['nim']; ?>"
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
                            value="<?= $pegawai['email']; ?>"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none focus:border-blue-500">

                    </div>

                    <!-- NO HP -->
                    <div>

                        <label class="text-[14px] font-semibold text-slate-700 block mb-3">
                            No HP
                        </label>

                        <input
                            type="text"
                            name="nohp"
                            value="<?= $pegawai['nohp']; ?>"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none focus:border-blue-500">

                    </div>

                    <!-- TANGGAL LAHIR -->
                    <div>

                        <label class="text-[14px] font-semibold text-slate-700 block mb-3">
                            Tanggal Lahir
                        </label>

                        <input
                            type="date"
                            name="lahir"
                            value="<?= $pegawai['lahir']; ?>"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none focus:border-blue-500">

                    </div>

                    <!-- TANGGAL BERGABUNG -->
                    <div>

                        <label class="text-[14px] font-semibold text-slate-700 block mb-3">
                            Tanggal Bergabung
                        </label>

                        <input
                            type="date"
                            name="bergabung"
                            value="<?= $pegawai['bergabung']; ?>"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none focus:border-blue-500">

                    </div>

                    <!-- ALAMAT -->
                    <div class="col-span-2">

                        <label class="text-[14px] font-semibold text-slate-700 block mb-3">
                            Alamat
                        </label>

                        <textarea
                            rows="5"
                            name="alamat"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none resize-none focus:border-blue-500"><?= $pegawai['alamat']; ?></textarea>

                    </div>

                </div>

            </div>

            <!-- INFORMASI KEANGGOTAAN -->
            <div class="bg-white rounded-[32px] p-8 shadow-sm border border-slate-100">

                <h2 class="text-[30px] font-extrabold text-slate-900 mb-1">
                    Informasi Keanggotaan
                </h2>

                <p class="text-slate-400 text-[14px] mb-8">
                    Edit data divisi anggota
                </p>

                <div class="grid grid-cols-2 gap-5">

                    <!-- DIVISI -->
                    <div>

                        <label class="text-[14px] font-semibold text-slate-700 block mb-3">
                            Divisi
                        </label>

                        <select
                            name="divisi"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none">

                            <option value="Record Center" <?= $pegawai['divisi'] == 'Record Center' ? 'selected' : ''; ?>>
                                Record Center
                            </option>

                            <option value="Sarpras" <?= $pegawai['divisi'] == 'Sarpras' ? 'selected' : ''; ?>>
                                Sarpras
                            </option>

                            <option value="Ajudan" <?= $pegawai['divisi'] == 'Ajudan' ? 'selected' : ''; ?>>
                                Ajudan
                            </option>

                            <option value="TU" <?= $pegawai['divisi'] == 'TU' ? 'selected' : ''; ?>>
                                TU
                            </option>

                            <option value="PE" <?= $pegawai['divisi'] == 'PE' ? 'selected' : ''; ?>>
                                PE
                            </option>

                        </select>

                    </div>

                </div>

            </div>

        </div>

        <!-- RIGHT -->
        <div class="col-span-4 space-y-7">

            <!-- FOTO -->
            <div class="bg-white rounded-[32px] p-8 shadow-sm border border-slate-100">

                <h2 class="text-[28px] font-extrabold text-slate-900 mb-1">
                    Foto Anggota
                </h2>

                <p class="text-slate-400 text-[14px] mb-8">
                    Update foto profil peserta magang
                </p>

                <div class="border-2 border-dashed border-slate-200 rounded-[28px] p-8 text-center">

                    <img
                        src="https://ui-avatars.com/api/?name=<?= urlencode($pegawai['nama']); ?>&background=e2e8f0&color=0f172a"
                        class="w-36 h-36 rounded-[30px] object-cover mx-auto mb-5">

                    <input
                        type="file"
                        name="foto"
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

                    <a href="<?= base_url('admin/pegawai/detail/' . $id) ?>"
                        class="w-full block text-center bg-slate-100 hover:bg-slate-200 transition text-slate-700 py-4 rounded-2xl font-bold text-[15px]">

                        Batal

                    </a>

                </div>

            </div>

        </div>

    </div>

</form>

<?= $this->endSection() ?>