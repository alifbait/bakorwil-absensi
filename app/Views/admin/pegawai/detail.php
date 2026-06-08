<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>

<div class="mb-8 flex items-center justify-between">

    <div>

        <p class="text-slate-400 text-[14px] mb-1">
            Detail Peserta Magang
        </p>

        <h1 class="text-[48px] font-extrabold text-slate-900 leading-none">
            Detail Peserta Magang
        </h1>

    </div>

    <a href="<?= base_url('admin/pegawai') ?>"
        class="bg-slate-100 hover:bg-slate-200 transition px-6 py-4 rounded-2xl font-semibold text-slate-700 text-[14px]">

        Kembali

    </a>

</div>

<div class="grid grid-cols-12 gap-7">

    <!-- LEFT -->
    <div class="col-span-8 space-y-7">

        <!-- INFORMASI PERSONAL -->
        <div class="bg-white rounded-[32px] p-8 shadow-sm border border-slate-100">

            <h2 class="text-[30px] font-extrabold text-slate-900 mb-1">
                Informasi Personal
            </h2>

            <p class="text-slate-400 text-[14px] mb-8">
                Detail identitas peserta magang
            </p>

            <div class="grid grid-cols-2 gap-5">

                <!-- NAMA -->
                <div>

                    <label class="text-[14px] font-semibold text-slate-700 block mb-3">
                        Nama Lengkap
                    </label>

                    <div class="bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 text-slate-700">

                        <?= $pegawai['nama_lengkap']; ?>

                    </div>

                </div>

                <!-- NIM -->
                <div>

                    <label class="text-[14px] font-semibold text-slate-700 block mb-3">
                        NIM
                    </label>

                    <div class="bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 text-slate-700">

                        <?= $pegawai['nim'] ?? '-'; ?>

                    </div>

                </div>

                <!-- EMAIL -->
                <div>

                    <label class="text-[14px] font-semibold text-slate-700 block mb-3">
                        Email
                    </label>

                    <div class="bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 text-slate-700">

                        <?= $pegawai['email'] ?? '-'; ?>

                    </div>

                </div>

                <!-- NO HP -->
                <div>

                    <label class="text-[14px] font-semibold text-slate-700 block mb-3">
                        No HP
                    </label>

                    <div class="bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 text-slate-700">

                        <?= $pegawai['no_hp'] ?? '-'; ?>

                    </div>

                </div>

                <!-- ASAL INSTANSI -->
                <div class="col-span-2">

                    <label class="text-[14px] font-semibold text-slate-700 block mb-3">
                        Asal Instansi
                    </label>

                    <div class="bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 text-slate-700">

                        <?= $pegawai['asal_instansi'] ?? '-'; ?>

                    </div>

                </div>

            </div>

        </div>

        <!-- INFORMASI MAGANG -->
        <div class="bg-white rounded-[32px] p-8 shadow-sm border border-slate-100">

            <h2 class="text-[30px] font-extrabold text-slate-900 mb-1">
                Informasi Magang
            </h2>

            <p class="text-slate-400 text-[14px] mb-8">
                Data keanggotaan & status peserta
            </p>

            <div class="grid grid-cols-2 gap-5">

                <!-- DIVISI -->
                <div>

                    <label class="text-[14px] font-semibold text-slate-700 block mb-3">
                        Divisi
                    </label>

                    <div class="bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 text-slate-700">

                        <?= $pegawai['nama_divisi'] ?? '-'; ?>

                    </div>

                </div>

                <!-- ROLE -->
                <div>

                    <label class="text-[14px] font-semibold text-slate-700 block mb-3">
                        Role
                    </label>

                    <div class="bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 text-slate-700">

                        <?= ucfirst($pegawai['role'] ?? 'anggota'); ?>

                    </div>

                </div>

                <!-- TANGGAL MULAI -->
                <div>

                    <label class="text-[14px] font-semibold text-slate-700 block mb-3">
                        Tanggal Mulai
                    </label>

                    <div class="bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 text-slate-700">

                        <?= $pegawai['tanggal_mulai'] ?? '-'; ?>

                    </div>

                </div>

                <!-- TANGGAL SELESAI -->
                <div>

                    <label class="text-[14px] font-semibold text-slate-700 block mb-3">
                        Tanggal Selesai
                    </label>

                    <div class="bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 text-slate-700">

                        <?= $pegawai['tanggal_selesai'] ?? '-'; ?>

                    </div>

                </div>

                <!-- STATUS -->
                <div class="col-span-2">

                    <label class="text-[14px] font-semibold text-slate-700 block mb-3">
                        Status Peserta
                    </label>

                    <div>

                        <span class="px-5 py-3 rounded-2xl font-semibold text-sm
                            <?= $pegawai['status'] == 'aktif'
                                ? 'bg-green-100 text-green-700'
                                : 'bg-red-100 text-red-700'; ?>">

                            <?= ucfirst($pegawai['status']); ?>

                        </span>

                    </div>

                </div>

            </div>

        </div>

        <!-- STATISTIK -->
        <div class="bg-white rounded-[32px] p-8 shadow-sm border border-slate-100">

            <h2 class="text-[30px] font-extrabold text-slate-900 mb-1">
                Statistik Kehadiran
            </h2>

            <p class="text-slate-400 text-[14px] mb-8">
                Ringkasan absensi peserta magang
            </p>

            <div class="grid grid-cols-3 gap-5">

                <div class="bg-green-50 rounded-2xl p-6 border border-green-100">

                    <p class="text-green-600 text-sm font-semibold mb-2">
                        Hadir
                    </p>

                    <h3 class="text-4xl font-extrabold text-green-700">
                        20
                    </h3>

                </div>

                <div class="bg-yellow-50 rounded-2xl p-6 border border-yellow-100">

                    <p class="text-yellow-600 text-sm font-semibold mb-2">
                        Izin / Sakit
                    </p>

                    <h3 class="text-4xl font-extrabold text-yellow-700">
                        2
                    </h3>

                </div>

                <div class="bg-red-50 rounded-2xl p-6 border border-red-100">

                    <p class="text-red-600 text-sm font-semibold mb-2">
                        Alpha
                    </p>

                    <h3 class="text-4xl font-extrabold text-red-700">
                        0
                    </h3>

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
                Foto peserta magang
            </p>

            <div class="border-2 border-dashed border-slate-200 rounded-[28px] p-8 text-center">

                <?php if (!empty($pegawai['foto_profile'])): ?>

                    <img
                        src="<?= base_url('uploads/profile/' . $pegawai['foto_profile']) ?>"
                        class="w-40 h-40 rounded-[32px] object-cover mx-auto mb-5">

                <?php else: ?>

                    <img
                        src="https://ui-avatars.com/api/?name=<?= urlencode($pegawai['nama_lengkap']); ?>&background=e2e8f0&color=0f172a"
                        class="w-40 h-40 rounded-[32px] object-cover mx-auto mb-5">

                <?php endif; ?>

                <h3 class="font-bold text-slate-900 text-xl">
                    <?= $pegawai['nama_lengkap']; ?>
                </h3>

                <p class="text-slate-400 text-sm mt-1">
                    <?= $pegawai['nim'] ?? '-'; ?>
                </p>

            </div>

        </div>

        <!-- AKSI -->
        <div class="bg-white rounded-[32px] p-8 shadow-sm border border-slate-100">

            <div class="space-y-4">

                <a href="<?= base_url('admin/pegawai/edit/' . $pegawai['id']) ?>"
                    class="w-full bg-blue-600 hover:bg-blue-700 transition text-white py-4 rounded-2xl font-bold text-[15px] shadow-lg shadow-blue-500/20 flex items-center justify-center">

                    Edit Data

                </a>

                <a href="<?= base_url('admin/pegawai/akun/' . $pegawai['id']) ?>"
                    class="w-full bg-orange-500 hover:bg-orange-600 transition text-white py-4 rounded-2xl font-bold text-[15px] flex items-center justify-center">

                    Kelola Akun

                </a>

                <a href="<?= base_url('admin/pegawai') ?>"
                    class="w-full bg-slate-100 hover:bg-slate-200 transition text-slate-700 py-4 rounded-2xl font-bold text-[15px] flex items-center justify-center">

                    Kembali

                </a>

            </div>

        </div>

    </div>

</div>

<?= $this->endSection() ?>