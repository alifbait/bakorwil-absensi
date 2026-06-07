<?= $this->extend('layouts/admin_layout'); ?>

<?= $this->section('content'); ?>

<div class="space-y-6">

    <!-- HEADER -->
    <div
        class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4"
    >

        <div>

            <h1 class="text-2xl font-bold text-slate-800">
                Detail Monitoring
            </h1>

            <p class="text-sm text-slate-500 mt-1">
                Detail lengkap data absensi peserta
            </p>

        </div>

        <a
            href="<?= base_url('admin/monitoring'); ?>"
            class="inline-flex items-center justify-center px-4 py-3 rounded-xl bg-slate-200 hover:bg-slate-300 text-slate-700 text-sm font-medium transition"
        >
            ← Kembali
        </a>

    </div>

    <!-- CARD -->
    <div
        class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden"
    >

        <!-- TOP PROFILE -->
        <div
            class="p-6 border-b border-slate-200 bg-gradient-to-r from-indigo-600 to-indigo-700"
        >

            <div class="flex flex-col md:flex-row items-center gap-5">

                <!-- FOTO -->
                <div
                    class="w-28 h-28 rounded-full overflow-hidden bg-white/20 flex items-center justify-center border-4 border-white/30"
                >

                    <?php if (!empty($pegawai['foto_profile'])) : ?>

                        <img
                            src="<?= base_url('uploads/profile/' . $pegawai['foto_profile']); ?>"
                            class="w-full h-full object-cover"
                        >

                    <?php else : ?>

                        <span
                            class="text-4xl font-bold text-white"
                        >
                            <?= strtoupper(substr($pegawai['nama_lengkap'], 0, 1)); ?>
                        </span>

                    <?php endif; ?>

                </div>

                <!-- INFO -->
                <div class="text-center md:text-left text-white">

                    <h2 class="text-2xl font-bold">
                        <?= esc($pegawai['nama_lengkap']); ?>
                    </h2>

                    <p class="text-indigo-100 mt-1">
                        NIM :
                        <?= esc($pegawai['nim']); ?>
                    </p>

                    <div class="mt-4">

                        <?php

                        $badge = match ($pegawai['status']) {

                            'hadir' => 'bg-emerald-100 text-emerald-700',

                            'telat' => 'bg-yellow-100 text-yellow-700',

                            'izin' => 'bg-blue-100 text-blue-700',

                            'sakit' => 'bg-orange-100 text-orange-700',

                            'alpha' => 'bg-red-100 text-red-700',

                            default => 'bg-slate-100 text-slate-700'

                        };

                        ?>

                        <span
                            class="px-4 py-2 rounded-full text-sm font-semibold <?= $badge; ?>"
                        >
                            <?= ucfirst($pegawai['status']); ?>
                        </span>

                    </div>

                </div>

            </div>

        </div>

        <!-- DETAIL -->
        <div class="p-6">

            <div
                class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5"
            >

                <!-- TANGGAL -->
                <div
                    class="rounded-2xl border border-slate-200 p-5"
                >

                    <p class="text-sm text-slate-500">
                        Tanggal Absensi
                    </p>

                    <h3
                        class="mt-2 text-lg font-bold text-slate-800"
                    >
                        <?= date('d F Y', strtotime($pegawai['tanggal'])); ?>
                    </h3>

                </div>

                <!-- JAM MASUK -->
                <div
                    class="rounded-2xl border border-slate-200 p-5"
                >

                    <p class="text-sm text-slate-500">
                        Jam Masuk
                    </p>

                    <h3
                        class="mt-2 text-lg font-bold text-slate-800"
                    >
                        <?= $pegawai['jam_masuk'] ?: '-'; ?>
                    </h3>

                </div>

                <!-- JAM PULANG -->
                <div
                    class="rounded-2xl border border-slate-200 p-5"
                >

                    <p class="text-sm text-slate-500">
                        Jam Pulang
                    </p>

                    <h3
                        class="mt-2 text-lg font-bold text-slate-800"
                    >
                        <?= $pegawai['jam_pulang'] ?: '-'; ?>
                    </h3>

                </div>

                <!-- TOTAL KERJA -->
                <div
                    class="rounded-2xl border border-slate-200 p-5"
                >

                    <p class="text-sm text-slate-500">
                        Total Jam Kerja
                    </p>

                    <h3
                        class="mt-2 text-lg font-bold text-slate-800"
                    >
                        <?= $pegawai['total_jam_kerja']; ?> Jam
                    </h3>

                </div>

                <!-- GPS -->
                <div
                    class="rounded-2xl border border-slate-200 p-5"
                >

                    <p class="text-sm text-slate-500">
                        Validasi GPS
                    </p>

                    <h3
                        class="mt-2 text-lg font-bold text-emerald-600"
                    >
                        Valid GPS
                    </h3>

                </div>

                <!-- SURVEY -->
                <div
                    class="rounded-2xl border border-slate-200 p-5"
                >

                    <p class="text-sm text-slate-500">
                        Survey Harian
                    </p>

                    <h3
                        class="mt-2 text-lg font-bold text-slate-800"
                    >

                        <?= $pegawai['survey_filled']
                            ? 'Sudah Mengisi'
                            : 'Belum Mengisi'; ?>

                    </h3>

                </div>

            </div>

            <!-- FOTO ABSENSI -->
            <div class="mt-8">

                <h3
                    class="text-lg font-bold text-slate-800 mb-4"
                >
                    Foto Absensi
                </h3>

                <div
                    class="grid grid-cols-1 md:grid-cols-2 gap-5"
                >

                    <!-- FOTO MASUK -->
                    <div
                        class="rounded-2xl border border-slate-200 overflow-hidden"
                    >

                        <div
                            class="px-5 py-4 border-b border-slate-200 bg-slate-50"
                        >

                            <h4
                                class="font-semibold text-slate-700"
                            >
                                Selfie Masuk
                            </h4>

                        </div>

                        <div class="p-5">

                            <?php if (!empty($pegawai['selfie_masuk'])) : ?>

                                <img
                                    src="<?= base_url('uploads/selfie/' . $pegawai['selfie_masuk']); ?>"
                                    class="w-full rounded-xl object-cover"
                                >

                            <?php else : ?>

                                <div
                                    class="h-64 rounded-xl bg-slate-100 flex items-center justify-center text-slate-400"
                                >
                                    Tidak Ada Foto
                                </div>

                            <?php endif; ?>

                        </div>

                    </div>

                    <!-- FOTO PULANG -->
                    <div
                        class="rounded-2xl border border-slate-200 overflow-hidden"
                    >

                        <div
                            class="px-5 py-4 border-b border-slate-200 bg-slate-50"
                        >

                            <h4
                                class="font-semibold text-slate-700"
                            >
                                Selfie Pulang
                            </h4>

                        </div>

                        <div class="p-5">

                            <?php if (!empty($pegawai['selfie_pulang'])) : ?>

                                <img
                                    src="<?= base_url('uploads/selfie/' . $pegawai['selfie_pulang']); ?>"
                                    class="w-full rounded-xl object-cover"
                                >

                            <?php else : ?>

                                <div
                                    class="h-64 rounded-xl bg-slate-100 flex items-center justify-center text-slate-400"
                                >
                                    Tidak Ada Foto
                                </div>

                            <?php endif; ?>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<?= $this->endSection(); ?>