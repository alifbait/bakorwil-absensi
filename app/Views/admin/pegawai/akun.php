<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>

<?= view('components/alert'); ?>

<div class="flex items-center justify-between mb-8">

    <div>

        <p class="text-slate-400 text-[14px] mb-1">
            Pengaturan akses akun pegawai
        </p>

        <h1 class="text-[48px] font-extrabold text-slate-900 leading-none">
            Kelola Akun
        </h1>

    </div>

    <a href="<?= base_url('admin/pegawai/detail/' . $id) ?>"
        class="bg-slate-100 hover:bg-slate-200 transition px-6 py-4 rounded-2xl font-semibold text-slate-700 text-[14px]">

        ← Kembali

    </a>

</div>

<form action="<?= base_url('admin/pegawai/akun-update/' . $id) ?>"
    method="POST"
    onsubmit="return validasiAkun()">

    <div class="grid grid-cols-12 gap-7">

        <!-- LEFT -->
        <div class="col-span-4">

            <div class="bg-white rounded-[32px] p-8 border border-slate-100 shadow-sm">

                <div class="text-center">

                    <?php if (!empty($pegawai['foto']) && file_exists(FCPATH . 'uploads/profile/' . $pegawai['foto'])): ?>

                        <img src="<?= base_url('uploads/profile/' . $pegawai['foto']); ?>"
                            class="w-40 h-40 rounded-[32px] object-cover mx-auto shadow-lg">

                    <?php else: ?>

                        <img src="https://ui-avatars.com/api/?name=<?= urlencode($pegawai['nama']); ?>&background=e2e8f0&color=0f172a"
                            class="w-40 h-40 rounded-[32px] object-cover mx-auto shadow-lg">

                    <?php endif; ?>

                    <h2 class="text-[32px] font-extrabold text-slate-900 mt-6">
                        <?= $pegawai['nama']; ?>
                    </h2>

                    <p class="text-slate-400 text-[15px] mt-2">
                        <?= $pegawai['divisi']; ?>
                    </p>

                </div>

                <div class="space-y-5 mt-10">

                    <!-- NIM -->
                    <div class="bg-slate-50 rounded-2xl p-5">

                        <p class="text-slate-400 text-[13px] mb-1">
                            NIM
                        </p>

                        <h4 class="text-slate-900 font-bold text-[16px]">
                            <?= $pegawai['nim']; ?>
                        </h4>

                    </div>

                    <!-- LAST LOGIN -->
                    <div class="bg-slate-50 rounded-2xl p-5">

                        <p class="text-slate-400 text-[13px] mb-1">
                            Last Login
                        </p>

                        <h4 class="text-slate-900 font-bold text-[16px]">

                            <?= !empty($pegawai['last_login'])
                                ? date('d M Y H:i', strtotime($pegawai['last_login']))
                                : 'Belum pernah login'; ?>

                        </h4>

                    </div>

                    <!-- STATUS -->
                    <div class="bg-slate-50 rounded-2xl p-5">

                        <p class="text-slate-400 text-[13px] mb-1">
                            Status Akun
                        </p>

                        <h4 class="<?= $pegawai['status'] == 'Aktif'
                            ? 'text-green-600'
                            : 'text-red-500'; ?> font-bold text-[16px]">

                            <?= $pegawai['status']; ?>

                        </h4>

                    </div>

                </div>

            </div>

        </div>

        <!-- RIGHT -->
        <div class="col-span-8 space-y-7">

            <!-- PENGATURAN -->
            <div class="bg-white rounded-[32px] p-8 border border-slate-100 shadow-sm">

                <h2 class="text-[32px] font-extrabold text-slate-900 mb-1">
                    Pengaturan Akun
                </h2>

                <p class="text-slate-400 text-[14px] mb-8">
                    Kelola username, role, status akun dan password pegawai
                </p>

                <div class="grid grid-cols-2 gap-5">

                    <!-- USERNAME -->
                    <div>

                        <label class="text-[14px] font-semibold text-slate-700 block mb-3">
                            Username
                        </label>

                        <input type="text"
                            name="username"
                            value="<?= $pegawai['username']; ?>"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none focus:border-blue-500">

                    </div>

                    <!-- ROLE -->
                    <div>

                        <label class="text-[14px] font-semibold text-slate-700 block mb-3">
                            Role Akun
                        </label>

                        <select name="role"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none">

                            <option value="Admin"
                                <?= $pegawai['role'] == 'Admin' ? 'selected' : ''; ?>>

                                Admin

                            </option>

                            <option value="Anggota"
                                <?= $pegawai['role'] == 'Anggota' ? 'selected' : ''; ?>>

                                Anggota

                            </option>

                        </select>

                    </div>

                    <!-- STATUS -->
                    <div>

                        <label class="text-[14px] font-semibold text-slate-700 block mb-3">
                            Status Akun
                        </label>

                        <select name="status"
                            id="statusAkun"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none">

                            <option value="Aktif"
                                <?= $pegawai['status'] == 'Aktif' ? 'selected' : ''; ?>>

                                Aktif

                            </option>

                            <option value="Nonaktif"
                                <?= $pegawai['status'] == 'Nonaktif' ? 'selected' : ''; ?>>

                                Nonaktif

                            </option>

                        </select>

                    </div>

                    <!-- PASSWORD -->
                    <div>

                        <label class="text-[14px] font-semibold text-slate-700 block mb-3">
                            Password Baru
                        </label>

                        <div class="relative">

                            <input type="password"
                                id="passwordInput"
                                name="password"
                                placeholder="Kosongkan jika tidak diubah"
                                class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 pr-14 outline-none focus:border-blue-500">

                            <button type="button"
                                onclick="togglePassword()"
                                class="absolute right-5 top-1/2 -translate-y-1/2 text-slate-400">

                                👁

                            </button>

                        </div>

                    </div>

                </div>

            </div>

            <!-- INFORMASI -->
            <div class="bg-white rounded-[32px] p-8 border border-slate-100 shadow-sm">

                <h3 class="text-[24px] font-bold text-slate-900 mb-6">
                    Informasi Sistem
                </h3>

                <div class="grid grid-cols-2 gap-5">

                    <div class="bg-slate-50 rounded-2xl p-5">

                        <p class="text-slate-400 text-[13px] mb-2">
                            Username Saat Ini
                        </p>

                        <h4 class="font-bold text-slate-900">
                            <?= $pegawai['username']; ?>
                        </h4>

                    </div>

                    <div class="bg-slate-50 rounded-2xl p-5">

                        <p class="text-slate-400 text-[13px] mb-2">
                            Role Saat Ini
                        </p>

                        <h4 class="font-bold text-slate-900">
                            <?= $pegawai['role']; ?>
                        </h4>

                    </div>

                </div>

            </div>

            <!-- AKSI -->
            <div class="bg-white rounded-[32px] p-8 border border-slate-100 shadow-sm">

                <div class="flex items-center justify-end gap-4">

                    <button type="button"
                        onclick="confirmNonaktif()"
                        class="bg-red-500 hover:bg-red-600 transition text-white px-7 py-4 rounded-2xl font-bold">

                        Nonaktifkan Akun

                    </button>

                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 transition text-white px-8 py-4 rounded-2xl font-bold shadow-lg shadow-blue-500/20">

                        Simpan Perubahan

                    </button>

                </div>

            </div>

        </div>

    </div>

</form>

<script>

    function togglePassword() {

        const input = document.getElementById('passwordInput');

        if (input.type === 'password') {

            input.type = 'text';

        } else {

            input.type = 'password';

        }

    }

    function confirmNonaktif() {

        const konfirmasi = confirm(
            "Yakin ingin menonaktifkan akun ini?"
        );

        if (konfirmasi) {

            document.getElementById('statusAkun').value = 'Nonaktif';

            alert('Status akun berhasil diubah menjadi Nonaktif');

        }

    }

    function validasiAkun() {

        const username = document.querySelector('[name="username"]').value;

        const password = document.querySelector('[name="password"]').value;

        if (username.trim() === '') {

            alert('Username tidak boleh kosong');

            return false;

        }

        if (password.length > 0 && password.length < 6) {

            alert('Password minimal 6 karakter');

            return false;

        }

        return true;

    }

</script>

<?= $this->endSection() ?>