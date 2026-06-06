<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>

<div class="flex items-center justify-between mb-8">

    <div>

        <p class="text-slate-400 text-[14px] mb-1">
            Detail ASN & Pegawai
        </p>

        <h1 class="text-[52px] font-extrabold text-slate-900 leading-none">
            Detail Pegawai
        </h1>

    </div>

    <!-- ACTION -->
    <div class="flex items-center gap-4">

        <a href="<?= base_url('admin/pegawai/edit/' . $id) ?>"
            class="bg-yellow-400 hover:bg-yellow-500 transition text-white px-7 py-4 rounded-2xl font-bold shadow-lg shadow-yellow-300/30 inline-flex items-center justify-center">

            Edit Pegawai

        </a>
        <a href="<?= base_url('admin/pegawai/akun/' . $id) ?>"
            class="bg-blue-600 hover:bg-blue-700 transition text-white px-7 py-4 rounded-2xl font-bold shadow-lg shadow-blue-500/20 inline-block">

            Kelola Akun

        </a>
    </div>

</div>

<!-- CONTENT -->
<div class="grid grid-cols-3 gap-7">

    <!-- LEFT -->
    <div class="space-y-7">

        <!-- PROFILE -->
        <div class="bg-white rounded-[32px] p-8 border border-slate-100 shadow-sm">

            <div class="text-center">

                <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?q=80&w=1200&auto=format&fit=crop"
                    class="w-40 h-40 rounded-[32px] object-cover mx-auto shadow-lg">

                <h2 class="text-[34px] font-extrabold text-slate-900 mt-6">
                    <?= $pegawai['nama']; ?>
                </h2>

                <div class="flex items-center justify-center gap-3 mt-6">

                    <span class="bg-blue-100 text-blue-700 px-5 py-2 rounded-xl text-[13px] font-bold">
                        ASN Aktif
                    </span>

                    <span class="<?= $pegawai['status'] == 'Aktif'
                        ? 'bg-green-100 text-green-700'
                        : 'bg-red-100 text-red-700'; ?> px-5 py-2 rounded-xl text-[13px] font-bold">

                        <?= $pegawai['status']; ?>

                    </span>

                </div>

            </div>

            <!-- INFO -->
            <div class="space-y-5 mt-8">

                <div class="bg-slate-50 rounded-2xl p-5">

                    <p class="text-slate-400 text-[13px] mb-1">
                        NIM
                    </p>

                    <h4 class="text-slate-900 font-bold text-[16px]">
                        <?= $pegawai['nim']; ?>
                    </h4>

                </div>

                <div class="bg-slate-50 rounded-2xl p-5">

                    <p class="text-slate-400 text-[13px] mb-1">
                        Divisi
                    </p>

                    <h4 class="text-slate-900 font-bold text-[16px]">
                        <?= $pegawai['divisi']; ?>
                    </h4>

                </div>

                <div class="bg-slate-50 rounded-2xl p-5">

                    <p class="text-slate-400 text-[13px] mb-1">
                        Bergabung
                    </p>

                    <h4 class="text-slate-900 font-bold text-[16px]">
                        <?= $pegawai['bergabung']; ?>
                    </h4>

                </div>

            </div>

        </div>

        <!-- RIWAYAT KEHADIRAN -->
        <div class="bg-white rounded-[32px] p-8 border border-slate-100 shadow-sm">

            <h2 class="text-[28px] font-extrabold text-slate-900 mb-1">
                Riwayat Kehadiran
            </h2>

            <p class="text-slate-400 text-[14px] mb-7">
                Aktivitas absensi terbaru pegawai
            </p>

            <div class="space-y-4 h-[320px] overflow-y-auto pr-2 scroll-smooth">
                <!-- ITEM -->
                <div class="bg-slate-50 rounded-2xl p-5 flex items-center justify-between">

                    <div>

                        <h4 class="text-slate-900 font-bold text-[15px]">
                            Hadir Tepat Waktu
                        </h4>

                        <p class="text-slate-400 text-[13px] mt-1">
                            05 Juni 2026 • 07:01 WIB
                        </p>

                    </div>

                    <span class="bg-green-100 text-green-700 px-4 py-2 rounded-xl text-[12px] font-bold">
                        Hadir
                    </span>

                </div>

                <!-- ITEM -->
                <div class="bg-slate-50 rounded-2xl p-5 flex items-center justify-between">

                    <div>

                        <h4 class="text-slate-900 font-bold text-[15px]">
                            Terlambat Absensi
                        </h4>

                        <p class="text-slate-400 text-[13px] mt-1">
                            04 Juni 2026 • 07:20 WIB
                        </p>

                    </div>

                    <span class="bg-red-100 text-red-700 px-4 py-2 rounded-xl text-[12px] font-bold">
                        Terlambat
                    </span>

                </div>

                <!-- ITEM -->
                <div class="bg-slate-50 rounded-2xl p-5 flex items-center justify-between">

                    <div>

                        <h4 class="text-slate-900 font-bold text-[15px]">
                            Tidak Hadir
                        </h4>

                        <p class="text-slate-400 text-[13px] mt-1">
                            03 Juni 2026
                        </p>

                    </div>

                    <span class="bg-slate-200 text-slate-700 px-4 py-2 rounded-xl text-[12px] font-bold">
                        Alfa
                    </span>

                </div>

                <!-- ITEM -->
                <div class="bg-slate-50 rounded-2xl p-5 flex items-center justify-between">

                    <div>

                        <h4 class="text-slate-900 font-bold text-[15px]">
                            Hadir Tepat Waktu
                        </h4>

                        <p class="text-slate-400 text-[13px] mt-1">
                            02 Juni 2026 • 06:58 WIB
                        </p>

                    </div>

                    <span class="bg-green-100 text-green-700 px-4 py-2 rounded-xl text-[12px] font-bold">
                        Hadir
                    </span>

                </div>

            </div>

        </div>

    </div>

    <!-- RIGHT -->
    <div class="col-span-2 space-y-7">

        <!-- STATISTIK -->
        <div class="grid grid-cols-3 gap-6">

            <!-- HADIR -->
            <div class="bg-white rounded-[28px] p-6 border border-slate-100 shadow-sm">

                <div class="w-16 h-16 rounded-3xl bg-green-100 flex items-center justify-center text-3xl mb-6">
                    ✅
                </div>

                <p class="text-slate-400 text-[14px] mb-2">
                    Hadir
                </p>

                <h3 class="text-[42px] font-extrabold text-slate-900">
                    <?= $pegawai['hadir']; ?>
                </h3>

            </div>

            <!-- TERLAMBAT -->
            <div class="bg-white rounded-[28px] p-6 border border-slate-100 shadow-sm">

                <div class="w-16 h-16 rounded-3xl bg-red-100 flex items-center justify-center text-3xl mb-6">
                    ⏰
                </div>

                <p class="text-slate-400 text-[14px] mb-2">
                    Terlambat
                </p>

                <h3 class="text-[42px] font-extrabold text-slate-900">
                    <?= $pegawai['terlambat']; ?>
                </h3>

            </div>

            <!-- IZIN -->
            <div class="bg-white rounded-[28px] p-6 border border-slate-100 shadow-sm">

                <div class="w-16 h-16 rounded-3xl bg-yellow-100 flex items-center justify-center text-3xl mb-6">
                    📄
                </div>

                <p class="text-slate-400 text-[14px] mb-2">
                    Izin
                </p>

                <h3 class="text-[42px] font-extrabold text-slate-900">
                    <?= $pegawai['izin']; ?>
                </h3>

            </div>

            <!-- SAKIT -->
            <div class="bg-white rounded-[28px] p-6 border border-slate-100 shadow-sm">

                <div class="w-16 h-16 rounded-3xl bg-blue-100 flex items-center justify-center text-3xl mb-6">
                    🏥
                </div>

                <p class="text-slate-400 text-[14px] mb-2">
                    Sakit
                </p>

                <h3 class="text-[42px] font-extrabold text-slate-900">
                    <?= $pegawai['sakit']; ?>
                </h3>

            </div>
            <!-- ALFA -->
            <div class="bg-white rounded-[28px] p-6 border border-slate-100 shadow-sm">

                <div class="w-16 h-16 rounded-3xl bg-slate-200 flex items-center justify-center text-3xl mb-6">
                    ❌
                </div>

                <p class="text-slate-400 text-[14px] mb-2">
                    Tidak Hadir
                </p>

                <h3 class="text-[42px] font-extrabold text-slate-900">
                    <?= $pegawai['alfa']; ?>
                </h3>

            </div>

        </div>



        <!-- INFORMASI -->
        <div class="bg-white rounded-[32px] p-8 border border-slate-100 shadow-sm">

            <h2 class="text-[32px] font-extrabold text-slate-900 mb-1">
                Informasi Personal
            </h2>

            <p class="text-slate-400 text-[14px] mb-8">
                Data lengkap pegawai ASN
            </p>

            <div class="grid grid-cols-2 gap-5">

                <div class="bg-slate-50 rounded-2xl p-5">

                    <p class="text-slate-400 text-[13px] mb-1">
                        Email
                    </p>

                    <h4 class="text-slate-900 font-bold text-[16px]">
                        <?= $pegawai['email']; ?>
                    </h4>

                </div>

                <div class="bg-slate-50 rounded-2xl p-5">

                    <p class="text-slate-400 text-[13px] mb-1">
                        No HP
                    </p>

                    <h4 class="text-slate-900 font-bold text-[16px]">
                        <?= $pegawai['nohp']; ?>
                    </h4>

                </div>

                <div class="col-span-2 bg-slate-50 rounded-2xl p-5">

                    <p class="text-slate-400 text-[13px] mb-1">
                        Alamat
                    </p>

                    <h4 class="text-slate-900 font-bold text-[16px]">
                        <?= $pegawai['alamat']; ?>
                    </h4>

                </div>

                <div class="bg-slate-50 rounded-2xl p-5">

                    <p class="text-slate-400 text-[13px] mb-1">
                        Tanggal Lahir
                    </p>

                    <h4 class="text-slate-900 font-bold text-[16px]">
                        <?= $pegawai['lahir']; ?>
                    </h4>

                </div>

                <div class="bg-slate-50 rounded-2xl p-5">

                    <p class="text-slate-400 text-[13px] mb-3">
                        Persentase Kehadiran
                    </p>

                    <div class="flex items-center justify-between mb-3">

                        <h4 class="text-green-600 font-extrabold text-[22px]">
                            <?= $pegawai['persentase']; ?>
                        </h4>

                        <span class="text-[13px] text-slate-400">
                            Sangat Baik
                        </span>

                    </div>

                    <!-- PROGRESS -->
                    <div class="w-full h-3 bg-slate-200 rounded-full overflow-hidden">

                        <div class="h-full bg-green-500 rounded-full w-[96%]"></div>

                    </div>

                </div>

            </div>

        </div>

        <!-- RIWAYAT -->
        <div class="bg-white rounded-[32px] p-8 border border-slate-100 shadow-sm">

            <div class="mb-7">

                <h2 class="text-[32px] font-extrabold text-slate-900 mb-1">
                    Riwayat Pengajuan
                </h2>

                <p class="text-slate-400 text-[14px]">
                    Pengajuan izin dan sakit terbaru
                </p>

            </div>

            <div class="space-y-4 h-[320px] overflow-y-auto pr-2 scroll-smooth">
                <!-- ITEM -->
                <div class="bg-slate-50 rounded-2xl p-5 flex items-center justify-between">

                    <div>

                        <h4 class="text-slate-900 font-bold text-[16px]">
                            Izin Acara Keluarga
                        </h4>

                        <p class="text-slate-400 text-[13px] mt-1">
                            21 Mei 2026
                        </p>

                    </div>

                    <span class="bg-yellow-100 text-yellow-700 px-5 py-2 rounded-xl text-[13px] font-bold">
                        Pending
                    </span>

                </div>

                <!-- ITEM -->
                <div class="bg-slate-50 rounded-2xl p-5 flex items-center justify-between">

                    <div>

                        <h4 class="text-slate-900 font-bold text-[16px]">
                            Sakit Demam
                        </h4>

                        <p class="text-slate-400 text-[13px] mt-1">
                            14 Mei 2026
                        </p>

                    </div>

                    <span class="bg-green-100 text-green-700 px-5 py-2 rounded-xl text-[13px] font-bold">
                        Disetujui
                    </span>

                </div>

            </div>

        </div>

    </div>

</div>

<?= $this->endSection() ?>