<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>

<div class="flex items-center justify-between mb-8">

    <div>

        <p class="text-slate-400 text-[14px] mb-2">
            Edit Data ASN & Pegawai
        </p>

        <h1 class="text-[48px] leading-none font-extrabold text-slate-900">
            Edit Pegawai
        </h1>

    </div>

    <a href="<?= base_url('admin/pegawai/detail/' . $id) ?>"
        class="bg-slate-100 hover:bg-slate-200 transition px-6 py-4 rounded-2xl font-bold text-slate-700">

        Kembali

    </a>

</div>

<form action="<?= base_url('admin/pegawai/update/' . $id) ?>" method="POST">

    <div class="grid grid-cols-12 gap-6">

        <!-- LEFT -->
        <div class="col-span-4">

            <div class="bg-white rounded-[32px] p-8 border border-slate-100 shadow-sm">

                <div class="flex flex-col items-center text-center">

                    <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?q=80&w=1200&auto=format&fit=crop"
                        class="w-40 h-40 rounded-[32px] object-cover shadow-lg mb-6">

                    <h2 class="text-[36px] font-extrabold text-slate-900 leading-tight">
                        <?= $pegawai['nama']; ?>
                    </h2>

                    <p class="text-slate-400 text-[16px] mt-2">
                        <?= $pegawai['jabatan']; ?>
                    </p>

                </div>

                <div class="mt-10 space-y-5">

                    <!-- NIP -->
                    <div class="bg-slate-50 rounded-2xl p-5">

                        <p class="text-slate-400 text-[13px] mb-2">
                            NIP
                        </p>

                        <input type="text" name="nip" value="<?= $pegawai['nip']; ?>"
                            class="w-full bg-transparent outline-none font-bold text-slate-900 text-[16px]">

                    </div>

                    <!-- DIVISI -->
                    <div class="bg-slate-50 rounded-2xl p-5">

                        <p class="text-slate-400 text-[13px] mb-2">
                            Divisi
                        </p>

                        <input type="text" name="divisi" value="<?= $pegawai['divisi']; ?>"
                            class="w-full bg-transparent outline-none font-bold text-slate-900 text-[16px]">

                    </div>

                    <!-- STATUS -->
                    <div class="bg-slate-50 rounded-2xl p-5">

                        <p class="text-slate-400 text-[13px] mb-2">
                            Status Pegawai
                        </p>

                        <select name="status"
                            class="w-full bg-transparent outline-none font-bold text-slate-900 text-[16px]">

                            <option value="Aktif" <?= $pegawai['status'] == 'Aktif' ? 'selected' : ''; ?>>

                                Aktif

                            </option>

                            <option value="Nonaktif" <?= $pegawai['status'] == 'Nonaktif' ? 'selected' : ''; ?>>

                                Nonaktif

                            </option>

                        </select>

                    </div>

                </div>

            </div>

        </div>

        <!-- RIGHT -->
        <div class="col-span-8 space-y-6">

            <!-- INFORMASI -->
            <div class="bg-white rounded-[32px] p-8 border border-slate-100 shadow-sm">

                <h2 class="text-[32px] font-extrabold text-slate-900 mb-2">
                    Informasi Personal
                </h2>

                <p class="text-slate-400 text-[14px] mb-8">
                    Edit data lengkap pegawai ASN
                </p>

                <div class="grid grid-cols-2 gap-5">

                    <!-- NAMA -->
                    <div class="bg-slate-50 rounded-2xl p-5">

                        <p class="text-slate-400 text-[13px] mb-2">
                            Nama Lengkap
                        </p>

                        <input type="text" name="nama" value="<?= $pegawai['nama']; ?>"
                            class="w-full bg-transparent outline-none font-bold text-slate-900 text-[16px]">

                    </div>

                    <!-- EMAIL -->
                    <div class="bg-slate-50 rounded-2xl p-5">

                        <p class="text-slate-400 text-[13px] mb-2">
                            Email
                        </p>

                        <input type="email" name="email" value="<?= $pegawai['email']; ?>"
                            class="w-full bg-transparent outline-none font-bold text-slate-900 text-[16px]">

                    </div>

                    <!-- NO HP -->
                    <div class="bg-slate-50 rounded-2xl p-5">

                        <p class="text-slate-400 text-[13px] mb-2">
                            No HP
                        </p>

                        <input type="text" name="nohp" value="<?= $pegawai['nohp']; ?>"
                            class="w-full bg-transparent outline-none font-bold text-slate-900 text-[16px]">

                    </div>

                    <!-- TANGGAL LAHIR -->
                    <div class="bg-slate-50 rounded-2xl p-5">

                        <p class="text-slate-400 text-[13px] mb-2">
                            Tanggal Lahir
                        </p>

                        <input type="text" name="lahir" value="<?= $pegawai['lahir']; ?>"
                            class="w-full bg-transparent outline-none font-bold text-slate-900 text-[16px]">

                    </div>

                    <!-- ALAMAT -->
                    <div class="bg-slate-50 rounded-2xl p-5 col-span-2">

                        <p class="text-slate-400 text-[13px] mb-2">
                            Alamat
                        </p>

                        <textarea name="alamat" rows="4"
                            class="w-full bg-transparent outline-none font-bold text-slate-900 text-[16px] resize-none"><?= $pegawai['alamat']; ?></textarea>

                    </div>

                </div>

            </div>

            <!-- BUTTON -->
            <div
                class="bg-white rounded-[32px] p-8 border border-slate-100 shadow-sm flex items-center justify-end gap-4">

                <a href="<?= base_url('admin/pegawai/detail/' . $id) ?>"
                    class="px-7 py-4 rounded-2xl bg-slate-100 hover:bg-slate-200 transition font-bold text-slate-700">

                    Batal

                </a>

                <button type="submit"
                    class="px-8 py-4 rounded-2xl bg-blue-600 hover:bg-blue-700 transition text-white font-bold shadow-lg shadow-blue-300/30">

                    Simpan Perubahan

                </button>

            </div>

        </div>

    </div>

</form>

<?= $this->endSection() ?>