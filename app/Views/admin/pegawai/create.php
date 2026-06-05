<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>

<div class="mb-8 flex items-center justify-between">

    <div>

        <p class="text-slate-400 text-[14px] mb-1">
            Master Data ASN
        </p>

        <h1 class="text-[48px] font-extrabold text-slate-900 leading-none">
            Tambah Pegawai
        </h1>

    </div>

    <a href="<?= base_url('admin/pegawai') ?>"
        class="bg-slate-100 hover:bg-slate-200 transition px-6 py-4 rounded-2xl font-semibold text-slate-700 text-[14px]">

        Kembali

    </a>

</div>

<form action="<?= base_url('admin/pegawai/store') ?>" method="POST" enctype="multipart/form-data">
    <div class="grid grid-cols-3 gap-7">

        <!-- LEFT -->
        <div class="col-span-2 space-y-7">

            <!-- PERSONAL -->
            <div class="bg-white rounded-[32px] p-8 shadow-sm border border-slate-100">

                <h2 class="text-[30px] font-extrabold text-slate-900 mb-1">
                    Informasi Personal
                </h2>

                <p class="text-slate-400 text-[14px] mb-8">
                    Data identitas pegawai ASN
                </p>

                <div class="grid grid-cols-2 gap-5">

                    <!-- NAMA -->
                    <div>

                        <label class="text-[14px] font-semibold text-slate-700 block mb-3">
                            Nama Lengkap
                        </label>

                        <input type="text" name="nama" placeholder="Masukkan nama lengkap"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none focus:border-blue-500">

                    </div>

                    <!-- NIP -->
                    <div>

                        <label class="text-[14px] font-semibold text-slate-700 block mb-3">
                            NIP
                        </label>

                        <input type="text" name="nip" placeholder="Masukkan NIP"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none focus:border-blue-500">

                    </div>

                    <!-- EMAIL -->
                    <div>

                        <label class="text-[14px] font-semibold text-slate-700 block mb-3">
                            Email
                        </label>

                        <input type="email" name="email" placeholder="pegawai@email.com"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none focus:border-blue-500">

                    </div>

                    <!-- NO HP -->
                    <div>

                        <label class="text-[14px] font-semibold text-slate-700 block mb-3">
                            No HP
                        </label>

                        <input type="text" name="no_hp" placeholder="08xxxxxxxxxx"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none focus:border-blue-500">

                    </div>

                    <!-- TANGGAL LAHIR -->
                    <div>

                        <label class="text-[14px] font-semibold text-slate-700 block mb-3">
                            Tanggal Lahir
                        </label>

                        <input type="date" name="tanggal_lahir"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none focus:border-blue-500">

                    </div>

                    <!-- GABUNG -->
                    <div>

                        <label class="text-[14px] font-semibold text-slate-700 block mb-3">
                            Tanggal Bergabung
                        </label>

                        <input type="date" name="tanggal_gabung"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none focus:border-blue-500">

                    </div>

                    <!-- ALAMAT -->
                    <div class="col-span-2">

                        <label class="text-[14px] font-semibold text-slate-700 block mb-3">
                            Alamat
                        </label>

                        <textarea rows="4" name="alamat" placeholder="Masukkan alamat lengkap..."
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none resize-none focus:border-blue-500"></textarea>

                    </div>

                </div>

            </div>

            <!-- KEPEGAWAIAN -->
            <div class="bg-white rounded-[32px] p-8 shadow-sm border border-slate-100">

                <h2 class="text-[30px] font-extrabold text-slate-900 mb-1">
                    Informasi Kepegawaian
                </h2>

                <p class="text-slate-400 text-[14px] mb-8">
                    Data jabatan dan status pegawai
                </p>

                <div class="grid grid-cols-2 gap-5">

                    <!-- JABATAN -->
                    <div>

                        <label class="text-[14px] font-semibold text-slate-700 block mb-3">
                            Jabatan
                        </label>

                        <input type="text" name="jabatan" placeholder="Masukkan jabatan"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none focus:border-blue-500">

                    </div>

                    <!-- DIVISI -->
                    <div>

                        <label class="text-[14px] font-semibold text-slate-700 block mb-3">
                            Divisi
                        </label>

                        <select name="divisi"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none">

                            <option value="">
                                Pilih Divisi
                            </option>

                            <option value="Kepegawaian">
                                Kepegawaian
                            </option>

                            <option value="Administrasi">
                                Administrasi
                            </option>

                            <option value="Operasional">
                                Operasional
                            </option>

                            <option value="IT">
                                IT
                            </option>

                        </select>

                    </div>

                    <!-- ROLE -->
                    <div>

                        <label class="text-[14px] font-semibold text-slate-700 block mb-3">
                            Role Akun
                        </label>

                        <select name="role"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none">

                            <option value="pegawai">
                                Pegawai
                            </option>

                            <option value="admin">
                                Admin
                            </option>

                        </select>

                    </div>

                    <!-- STATUS -->
                    <div>

                        <label class="text-[14px] font-semibold text-slate-700 block mb-3">
                            Status Akun
                        </label>

                        <select name="status"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none">

                            <option value="Aktif">
                                Aktif
                            </option>

                            <option value="Nonaktif">
                                Nonaktif
                            </option>

                        </select>

                    </div>

                </div>

            </div>

        </div>

        <!-- RIGHT -->
        <div class="space-y-7">

            <!-- FOTO -->
            <div class="bg-white rounded-[32px] p-8 shadow-sm border border-slate-100">

                <h2 class="text-[28px] font-extrabold text-slate-900 mb-1">
                    Foto Pegawai
                </h2>

                <p class="text-slate-400 text-[14px] mb-8">
                    Upload foto profil ASN
                </p>

                <div class="border-2 border-dashed border-slate-200 rounded-[28px] p-8 text-center">

                    <img src="https://ui-avatars.com/api/?name=Pegawai&background=e2e8f0&color=0f172a"
                        class="w-36 h-36 rounded-[30px] object-cover mx-auto mb-5">

                    <input type="file" name="foto" class="w-full text-sm text-slate-500">

                </div>

            </div>

            <!-- LOGIN -->
            <div class="bg-white rounded-[32px] p-8 shadow-sm border border-slate-100">

                <h2 class="text-[28px] font-extrabold text-slate-900 mb-1">
                    Akun Login
                </h2>

                <p class="text-slate-400 text-[14px] mb-8">
                    Informasi login pegawai
                </p>

                <div class="space-y-5">

                    <!-- USERNAME -->
                    <div>

                        <label class="text-[14px] font-semibold text-slate-700 block mb-3">
                            Username
                        </label>

                        <input type="text" name="username" placeholder="username"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none">

                    </div>

                    <!-- PASSWORD -->
                    <div>

                        <label class="text-[14px] font-semibold text-slate-700 block mb-3">
                            Password Default
                        </label>

                        <input type="password" name="password" placeholder="••••••••"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none">

                    </div>

                </div>

            </div>

            <!-- ACTION -->
            <div class="bg-white rounded-[32px] p-8 shadow-sm border border-slate-100">

                <div class="space-y-4">

                    <button type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 transition text-white py-4 rounded-2xl font-bold text-[15px] shadow-lg shadow-blue-500/20">

                        Simpan Pegawai

                    </button>

                    <button type="reset"
                        class="w-full bg-slate-100 hover:bg-slate-200 transition text-slate-700 py-4 rounded-2xl font-bold text-[15px]">

                        Reset Form

                    </button>

                </div>

            </div>

        </div>

    </div>

</form>

<?= $this->endSection() ?>