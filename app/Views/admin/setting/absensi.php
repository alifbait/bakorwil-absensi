<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>

<?= view('components/alert'); ?>

<?php
$uri = service('uri');
$activeTab = $uri->getSegment(3, 'absensi');
?>

<!-- HEADER -->
<div class="flex items-center justify-between mb-8">

    <div>
        <p class="text-slate-400 text-[14px] mb-1">
            Konfigurasi Sistem Absensi Magang
        </p>

        <h1 class="text-[42px] xl:text-[56px] font-extrabold text-slate-900 leading-none">
            Setting Sistem
        </h1>
    </div>

    <button type="submit" form="form-setting-absensi"
        class="bg-blue-600 hover:bg-blue-700 transition text-white px-8 py-4 rounded-2xl font-bold shadow-lg shadow-blue-500/20">

        Simpan Pengaturan

    </button>

</div>

<!-- TAB NAVIGATION -->
<div class="bg-white rounded-[32px] p-4 border border-slate-100 shadow-sm mb-8">

    <div class="flex items-center gap-4 overflow-x-auto scrollbar-hide pb-2">

        <a href="<?= base_url('admin/setting/absensi') ?>" class="min-w-max px-6 py-4 rounded-2xl font-bold transition <?= ($activeTab === 'absensi')
              ? 'bg-gradient-to-r from-blue-600 to-blue-500 text-white shadow-lg shadow-blue-500/20'
              : 'bg-slate-100 hover:bg-slate-200 text-slate-700' ?>">

            🕒 Absensi

        </a>

        <a href="<?= base_url('admin/setting/lokasi') ?>" class="min-w-max px-6 py-4 rounded-2xl font-bold transition <?= ($activeTab === 'lokasi')
              ? 'bg-gradient-to-r from-blue-600 to-blue-500 text-white shadow-lg shadow-blue-500/20'
              : 'bg-slate-100 hover:bg-slate-200 text-slate-700' ?>">

            📍 Lokasi GPS

        </a>

        <a href="<?= base_url('admin/setting/harilibur') ?>" class="min-w-max px-6 py-4 rounded-2xl font-bold transition <?= ($activeTab === 'harilibur')
              ? 'bg-gradient-to-r from-blue-600 to-blue-500 text-white shadow-lg shadow-blue-500/20'
              : 'bg-slate-100 hover:bg-slate-200 text-slate-700' ?>">

            🎉 Hari Libur

        </a>

        <a href="<?= base_url('admin/setting/umum') ?>" class="min-w-max px-6 py-4 rounded-2xl font-bold transition <?= ($activeTab === 'umum')
              ? 'bg-gradient-to-r from-blue-600 to-blue-500 text-white shadow-lg shadow-blue-500/20'
              : 'bg-slate-100 hover:bg-slate-200 text-slate-700' ?>">

            🔑 Akun & Keamanan

        </a>

        <a href="<?= base_url('admin/setting/notifikasi') ?>" class="min-w-max px-6 py-4 rounded-2xl font-bold transition <?= ($activeTab === 'notifikasi')
              ? 'bg-gradient-to-r from-blue-600 to-blue-500 text-white shadow-lg shadow-blue-500/20'
              : 'bg-slate-100 hover:bg-slate-200 text-slate-700' ?>">

            🔔 Notifikasi

        </a>

    </div>

</div>

<!-- CONTENT -->
<form id="form-setting-absensi" action="<?= base_url('admin/setting/absensi/save') ?>" method="POST">

    <div class="grid grid-cols-1 xl:grid-cols-12 gap-7">

        <!-- LEFT -->
        <div class="xl:col-span-8 space-y-7">

            <!-- JAM KERJA -->
            <div class="bg-white rounded-[36px] p-8 border border-slate-100 shadow-sm">

                <div class="flex items-center gap-4 mb-8">

                    <div class="w-16 h-16 rounded-3xl bg-blue-100 flex items-center justify-center text-3xl">
                        ⏰
                    </div>

                    <div>

                        <h2 class="text-[32px] font-extrabold text-slate-900">
                            Jam Kerja Utama
                        </h2>

                        <p class="text-slate-400 text-[14px]">
                            Pengaturan jam masuk, pulang, dan batas minimal jam kerja
                        </p>

                    </div>

                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">

                    <!-- JAM MASUK -->
                    <div>

                        <label class="block text-[14px] font-semibold text-slate-700 mb-3">
                            Jam Masuk
                        </label>

                        <input type="time" name="jam_masuk" value="08:00"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none focus:border-blue-500 focus:bg-white transition text-slate-800">

                    </div>

                    <!-- JAM PULANG -->
                    <div>

                        <label class="block text-[14px] font-semibold text-slate-700 mb-3">
                            Jam Pulang
                        </label>

                        <input type="time" name="jam_pulang" value="16:00"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none focus:border-blue-500 focus:bg-white transition text-slate-800">

                    </div>

                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- MINIMAL JAM -->
                    <div>

                        <label class="block text-[14px] font-semibold text-slate-700 mb-3">
                            Minimal Jam Kerja
                        </label>

                        <div class="relative">

                            <input type="number" name="minimal_jam_kerja" value="8"
                                class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 pr-16 outline-none focus:border-blue-500 focus:bg-white transition text-slate-800">

                            <span
                                class="absolute right-5 top-1/2 -translate-y-1/2 text-slate-400 text-[13px] font-bold">

                                Jam

                            </span>

                        </div>

                    </div>

                    <!-- MODE -->
                    <div>

                        <label class="block text-[14px] font-semibold text-slate-700 mb-3">
                            Mode Absensi
                        </label>

                        <select name="mode_absensi"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none focus:border-blue-500 focus:bg-white transition text-slate-800">

                            <option value="WFO">
                                WFO
                            </option>

                            <option value="Hybrid">
                                Hybrid
                            </option>

                        </select>

                    </div>

                </div>

            </div>

            <!-- DISIPLIN -->
            <div class="bg-white rounded-[36px] p-8 border border-slate-100 shadow-sm">

                <div class="flex items-center gap-4 mb-8">

                    <div class="w-16 h-16 rounded-3xl bg-yellow-100 flex items-center justify-center text-3xl">
                        ⏱️
                    </div>

                    <div>

                        <h2 class="text-[32px] font-extrabold text-slate-900">
                            Disiplin & Ketidakhadiran
                        </h2>

                        <p class="text-slate-400 text-[14px]">
                            Pengaturan toleransi keterlambatan dan auto alfa
                        </p>

                    </div>

                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                    <!-- TOLERANSI -->
                    <div>

                        <label class="block text-[14px] font-semibold text-slate-700 mb-3">
                            Toleransi Keterlambatan
                        </label>

                        <div class="relative">

                            <input type="number" name="toleransi" value="15"
                                class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 pr-20 outline-none focus:border-blue-500 focus:bg-white transition text-slate-800">

                            <span
                                class="absolute right-5 top-1/2 -translate-y-1/2 text-slate-400 text-[13px] font-bold">

                                Menit

                            </span>

                        </div>

                    </div>

                    <!-- AUTO ALFA -->
                    <div>

                        <label class="block text-[14px] font-semibold text-slate-700 mb-3">
                            Jam Auto Alfa
                        </label>

                        <input type="time" name="jam_auto_alfa" value="09:00"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none focus:border-blue-500 focus:bg-white transition text-slate-800">

                    </div>

                    <!-- STATUS AUTO -->
                    <div>

                        <label class="block text-[14px] font-semibold text-slate-700 mb-3">
                            Status Auto Alfa
                        </label>

                        <select name="status_auto_alfa"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none focus:border-blue-500 focus:bg-white transition text-slate-800">

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

            <!-- HARI KERJA -->
            <div class="bg-white rounded-[36px] p-8 border border-slate-100 shadow-sm">

                <div class="flex items-center gap-4 mb-8">

                    <div class="w-16 h-16 rounded-3xl bg-purple-100 flex items-center justify-center text-3xl">
                        📅
                    </div>

                    <div>

                        <h2 class="text-[32px] font-extrabold text-slate-900">
                            Hari Kerja Aktif
                        </h2>

                        <p class="text-slate-400 text-[14px]">
                            Tentukan hari operasional absensi magang
                        </p>

                    </div>

                </div>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-5">

                    <?php
                    $hariKerja = [
                        'Senin',
                        'Selasa',
                        'Rabu',
                        'Kamis',
                        'Jumat',
                        'Sabtu',
                        'Minggu'
                    ];
                    ?>

                    <?php foreach ($hariKerja as $hari): ?>

                        <label class="cursor-pointer">

                            <input type="checkbox" name="hari_kerja[]" value="<?= $hari; ?>" class="peer hidden"
                                <?= in_array($hari, ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat']) ? 'checked' : ''; ?>>

                            <div
                                class="bg-slate-50 border border-slate-200 rounded-[28px] p-5 transition-all peer-checked:bg-blue-600 peer-checked:border-blue-600 peer-checked:text-white hover:border-blue-300">

                                <div class="flex items-center justify-between mb-3">

                                    <h3 class="font-bold text-[18px]">
                                        <?= $hari; ?>
                                    </h3>

                                    <div class="w-5 h-5 rounded-full border-2 border-current"></div>

                                </div>

                                <p class="text-[12px] opacity-80">
                                    Hari operasional aktif
                                </p>

                            </div>

                        </label>

                    <?php endforeach; ?>

                </div>

            </div>

        </div>

        <!-- RIGHT -->
        <div class="xl:col-span-4 space-y-7">

            <!-- SERVER -->
            <div
                class="bg-gradient-to-br from-blue-600 to-blue-500 rounded-[36px] p-8 text-white shadow-xl shadow-blue-500/20 min-h-[320px]">

                <div class="flex items-center justify-between mb-10">

                    <div>

                        <p class="text-blue-100 text-[14px] mb-2">
                            Waktu Server
                        </p>

                        <h3 class="text-[38px] font-extrabold leading-none">
                            08:42:13
                        </h3>

                        <p class="text-blue-100 text-[14px] mt-3">
                            WIB • Asia/Jakarta
                        </p>

                    </div>

                    <div class="w-16 h-16 rounded-3xl bg-white/20 flex items-center justify-center text-3xl">
                        🕒
                    </div>

                </div>

                <div class="bg-white/10 rounded-3xl p-6 backdrop-blur-sm">

                    <p class="text-blue-100 text-[14px] mb-2">
                        Status Sistem
                    </p>

                    <h2 class="text-[20px] font-extrabold mb-3">
                        Operasional Aktif
                    </h2>

                    <span
                        class="bg-green-400/20 text-green-100 px-4 py-2 rounded-xl inline-block text-[13px] font-bold">

                        Sinkronisasi Berjalan

                    </span>

                </div>

            </div>

            <!-- RINGKASAN -->
            <div class="bg-white rounded-[36px] p-8 border border-slate-100 shadow-sm">

                <h3 class="text-[24px] font-extrabold text-slate-900 mb-6">
                    Ringkasan Jadwal
                </h3>

                <div class="space-y-5">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-slate-400 text-[13px]">
                                Jam Kerja
                            </p>

                            <h4 class="text-slate-900 font-bold text-[16px]">
                                08:00 - 16:00 WIB
                            </h4>

                        </div>

                        <div class="w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center text-lg">
                            ⏰
                        </div>

                    </div>

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-slate-400 text-[13px]">
                                Batas Toleransi
                            </p>

                            <h4 class="text-slate-900 font-bold text-[16px]">
                                15 Menit
                            </h4>

                        </div>

                        <div class="w-10 h-10 rounded-xl bg-yellow-100 flex items-center justify-center text-lg">
                            ⚠️
                        </div>

                    </div>

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-slate-400 text-[13px]">
                                Minimal Jam Kerja
                            </p>

                            <h4 class="text-slate-900 font-bold text-[16px]">
                                8 Jam / Hari
                            </h4>

                        </div>

                        <div class="w-10 h-10 rounded-xl bg-green-100 flex items-center justify-center text-lg">
                            📊
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</form>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<script>

    // =========================
    // INPUT
    // =========================

    const latInput =
        document.getElementById('latitude');

    const lngInput =
        document.getElementById('longitude');

    const radiusInput =
        document.getElementById('radius');

    // =========================
    // VALUE AWAL
    // =========================

    let lat =
        parseFloat(latInput.value);

    let lng =
        parseFloat(lngInput.value);

    let radius =
        parseInt(radiusInput.value);

    // =========================
    // MAP
    // =========================

    const map = L.map('map').setView(
        [lat, lng],
        18
    );

    // TILE
    L.tileLayer(
        'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
        {
            attribution:
                '&copy; OpenStreetMap contributors'
        }
    ).addTo(map);

    // =========================
    // MARKER
    // =========================

    const marker = L.marker(
        [lat, lng],
        {
            draggable: true
        }
    ).addTo(map);

    // =========================
    // RADIUS
    // =========================

    let circle = L.circle(
        [lat, lng],
        {
            radius: radius,
            color: '#2563eb',
            fillColor: '#3b82f6',
            fillOpacity: 0.2
        }
    ).addTo(map);

    // =========================
    // UPDATE MAP
    // =========================

    function updateMap() {
        lat =
            parseFloat(latInput.value);

        lng =
            parseFloat(lngInput.value);

        radius =
            parseInt(radiusInput.value);

        // pindah marker
        marker.setLatLng([lat, lng]);

        // pindah lingkaran
        circle.setLatLng([lat, lng]);

        // update radius
        circle.setRadius(radius);

        // center map
        map.setView([lat, lng], 18);
    }

    // =========================
    // INPUT -> MAP
    // =========================

    latInput.addEventListener(
        'input',
        updateMap
    );

    lngInput.addEventListener(
        'input',
        updateMap
    );

    radiusInput.addEventListener(
        'input',
        updateMap
    );

    // =========================
    // MARKER -> INPUT
    // =========================

    marker.on('dragend', function (e) {
        const position =
            marker.getLatLng();

        latInput.value =
            position.lat.toFixed(6);

        lngInput.value =
            position.lng.toFixed(6);

        updateMap();
    });

</script>
<?= $this->endSection() ?>