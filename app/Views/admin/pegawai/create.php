<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>

<?= view('components/alert'); ?>

<div class="mb-8 flex items-center justify-between">

    <div>

        <p class="text-slate-400 text-[14px] mb-1">
            Master Data Peserta Magang
        </p>

        <h1 class="text-[48px] font-extrabold text-slate-900 leading-none">
            Tambah Peserta Magang
        </h1>

    </div>

    <a href="<?= base_url('admin/pegawai') ?>"
        class="bg-slate-100 hover:bg-slate-200 transition px-6 py-4 rounded-2xl font-semibold text-slate-700 text-[14px]">

        Kembali

    </a>

</div>

<form
    action="<?= base_url('admin/pegawai/store') ?>"
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
                    Data identitas peserta magang
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
                            required
                            placeholder="Masukkan nama lengkap"
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
                            required
                            placeholder="Masukkan NIM"
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
                            placeholder="anggota@email.com"
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
                            placeholder="08xxxxxxxxxx"
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
                            placeholder="Universitas / Sekolah / Instansi"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none focus:border-blue-500">

                    </div>

                    <!-- TANGGAL MULAI -->
                    <div>

                        <label class="text-[14px] font-semibold text-slate-700 block mb-3">
                            Tanggal Mulai
                        </label>

                        <input
                            type="date"
                            name="tanggal_mulai"
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
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none focus:border-blue-500">

                    </div>

                </div>

            </div>

            <!-- INFORMASI KEANGGOTAAN -->
            <div class="bg-white rounded-[32px] p-8 shadow-sm border border-slate-100">

                <h2 class="text-[30px] font-extrabold text-slate-900 mb-1">
                    Informasi Keanggotaan
                </h2>

                <p class="text-slate-400 text-[14px] mb-8">
                    Divisi dan status akun Peserta Magang
                </p>

                <div class="grid grid-cols-2 gap-5">

                    <!-- DIVISION -->
                    <div>

                        <label class="text-[14px] font-semibold text-slate-700 block mb-3">
                            Divisi
                        </label>

                        <select
                            name="division_id"
                            required
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none">

                            <option value="">
                                Pilih Divisi
                            </option>

                            <?php foreach ($divisions as $division): ?>

                                <option value="<?= $division['id']; ?>">

                                    <?= $division['nama_divisi']; ?>

                                </option>

                            <?php endforeach; ?>

                        </select>

                    </div>

                    <!-- ROLE -->
                    <div>

                        <label class="text-[14px] font-semibold text-slate-700 block mb-3">
                            Role
                        </label>

                        <select
                            name="role"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none">

                            <option value="anggota">
                                Anggota
                            </option>

                            <option value="admin">
                                Admin
                            </option>

                        </select>

                    </div>

                    <!-- STATUS -->
                    <div class="col-span-2">

                        <label class="text-[14px] font-semibold text-slate-700 block mb-3">
                            Status Magang
                        </label>

                        <select
                            name="status"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none">

                            <option value="aktif">
                                Aktif
                            </option>

                            <option value="nonaktif">
                                Nonaktif
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
                    Foto Profile
                </h2>

                <p class="text-slate-400 text-[14px] mb-8">
                    Upload foto Peserta Magang
                </p>

                <div class="border-2 border-dashed border-slate-200 rounded-[28px] p-8 text-center">

                    <img
                        id="preview-image"
                        src="https://ui-avatars.com/api/?name=Pegawai&background=e2e8f0&color=0f172a"
                        class="w-36 h-36 rounded-[30px] object-cover mx-auto mb-5">

                    <input
                        type="file"
                        name="foto"
                        accept="image/*"
                        onchange="previewImage(event)"
                        class="w-full text-sm text-slate-500">

                </div>

            </div>

            <!-- AKUN -->
            <div class="bg-white rounded-[32px] p-8 shadow-sm border border-slate-100">

                <h2 class="text-[28px] font-extrabold text-slate-900 mb-1">
                    Akun Login
                </h2>

                <p class="text-slate-400 text-[14px] mb-8">
                    Password default otomatis:
                    <span class="font-bold text-blue-600">
                        12345678
                    </span>
                </p>

                <div class="space-y-5">

                    <!-- USERNAME -->
                    <div>

                        <label class="text-[14px] font-semibold text-slate-700 block mb-3">
                            Username
                        </label>

                        <input
                            type="text"
                            name="username"
                            required
                            placeholder="Masukkan username"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none">

                    </div>

                </div>

            </div>

            <!-- ACTION -->
            <div class="bg-white rounded-[32px] p-8 shadow-sm border border-slate-100">

                <div class="space-y-4">

                    <button
                        type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 transition text-white py-4 rounded-2xl font-bold text-[15px] shadow-lg shadow-blue-500/20">

                        Simpan Peserta Magang

                    </button>

                    <button
                        type="reset"
                        class="w-full bg-slate-100 hover:bg-slate-200 transition text-slate-700 py-4 rounded-2xl font-bold text-[15px]">

                        Reset Form

                    </button>

                </div>

            </div>

        </div>

    </div>

</form>

<script>

    function previewImage(event)
    {
        const image = document.getElementById('preview-image');

        image.src = URL.createObjectURL(
            event.target.files[0]
        );
    }

</script>

<?= $this->endSection() ?>