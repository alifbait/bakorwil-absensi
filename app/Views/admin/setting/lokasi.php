<?= $this->extend('layouts/admin_layout') ?>
<?= $this->section('content') ?>

<?= view('components/alert'); ?>

<?php
$uri = service('uri');
$activeTab = $uri->getSegment(3, 'lokasi');
?>

<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

<div class="flex items-center justify-between mb-8 flex-wrap gap-5">

    <div>

        <p class="text-slate-400 text-[14px] mb-1">
            Konfigurasi GPS & Lokasi Absensi
        </p>

        <h1 class="text-[56px] font-extrabold text-slate-900 leading-none">
            Setting Lokasi
        </h1>

    </div>

    <button
        type="submit"
        form="form-setting-lokasi"
        class="bg-blue-600 hover:bg-blue-700 transition text-white px-8 py-4 rounded-2xl font-bold shadow-lg shadow-blue-500/20">

        Simpan Lokasi

    </button>

</div>

<!-- TAB -->
<div class="bg-white rounded-[32px] p-4 border border-slate-100 shadow-sm mb-8 overflow-x-auto">

    <div class="flex items-center gap-4 min-w-max">

        <?php
        $tabs = [
            'absensi' => '🕒 Absensi',
            'lokasi' => '📍 Lokasi GPS',
            'harilibur' => '🎉 Hari Libur',
            'umum' => '🔑 Akun & Keamanan',
            'notifikasi' => '🔔 Notifikasi',
        ];
        ?>

        <?php foreach ($tabs as $key => $label): ?>

            <a
                href="<?= base_url('admin/setting/' . $key) ?>"
                class="px-6 py-4 rounded-2xl font-bold transition <?= ($activeTab === $key)
                    ? 'bg-gradient-to-r from-blue-600 to-blue-500 text-white shadow-lg shadow-blue-500/20'
                    : 'bg-slate-100 hover:bg-slate-200 text-slate-700' ?>">

                <?= $label ?>

            </a>

        <?php endforeach; ?>

    </div>

</div>

<form
    id="form-setting-lokasi"
    action="<?= base_url('admin/setting/save-lokasi') ?>"
    method="POST">

    <div class="grid grid-cols-1 xl:grid-cols-12 gap-7">

        <!-- LEFT -->
        <div class="xl:col-span-8 space-y-7">

            <!-- GPS -->
            <div class="bg-white rounded-[36px] p-8 border border-slate-100 shadow-sm">

                <div class="flex items-center gap-4 mb-8">

                    <div class="w-16 h-16 rounded-3xl bg-blue-100 flex items-center justify-center text-3xl">
                        🌍
                    </div>

                    <div>

                        <h2 class="text-[32px] font-extrabold text-slate-900">
                            Koordinat GPS & Validasi
                        </h2>

                        <p class="text-slate-400 text-[14px]">
                            Sinkronisasi realtime titik lokasi kantor
                        </p>

                    </div>

                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- LAT -->
                    <div>

                        <label class="block mb-3 font-semibold text-slate-700">
                            Latitude
                        </label>

                        <input
                            type="text"
                            name="latitude_kantor"
                            value="<?= $setting['latitude_kantor'] ?>"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none focus:border-blue-500">

                    </div>

                    <!-- LNG -->
                    <div>

                        <label class="block mb-3 font-semibold text-slate-700">
                            Longitude
                        </label>

                        <input
                            type="text"
                            name="longitude_kantor"
                            value="<?= $setting['longitude_kantor'] ?>"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none focus:border-blue-500">

                    </div>

                    <!-- RADIUS -->
                    <div>

                        <label class="block mb-3 font-semibold text-slate-700">
                            Radius Absensi
                        </label>

                        <div class="relative">

                            <input
                                type="number"
                                name="radius_absensi"
                                value="<?= $setting['radius_absensi'] ?>"
                                class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 pr-24 outline-none focus:border-blue-500">

                            <span class="absolute right-5 top-1/2 -translate-y-1/2 text-slate-400 font-bold">
                                Meter
                            </span>

                        </div>

                    </div>

                    <!-- VALIDASI -->
                    <div>

                        <label class="block mb-3 font-semibold text-slate-700">
                            Validasi GPS
                        </label>

                        <select
                            name="mode_validasi_gps"
                            class="w-full bg-slate-50 border border-slate-200 rounded-2xl px-5 py-4 outline-none focus:border-blue-500">

                            <option value="aktif"
                                <?= $setting['mode_validasi_gps'] == 'aktif' ? 'selected' : '' ?>>
                                Aktif
                            </option>

                            <option value="nonaktif"
                                <?= $setting['mode_validasi_gps'] == 'nonaktif' ? 'selected' : '' ?>>
                                Nonaktif
                            </option>

                        </select>

                    </div>

                </div>

            </div>

            <!-- MAP -->
            <div class="bg-white rounded-[36px] p-8 border border-slate-100 shadow-sm">

                <div class="mb-6">

                    <h2 class="text-[32px] font-extrabold text-slate-900">
                        Preview Lokasi Kantor
                    </h2>

                    <p class="text-slate-400 text-[14px]">
                        Drag pin untuk mengubah koordinat otomatis
                    </p>

                </div>

                <div
                    id="map"
                    class="h-[500px] rounded-[28px] overflow-hidden border border-slate-200">
                </div>

                <!-- INFO -->
                <div class="mt-6 flex items-center justify-between gap-5 flex-wrap">

                    <div>

                        <h3 class="font-bold text-slate-800 text-[18px]">
                            Bakorwil III Malang
                        </h3>

                        <p class="text-slate-400 text-[13px] mt-1">
                            Latitude:
                            <span id="latText"></span>
                        </p>

                        <p class="text-slate-400 text-[13px]">
                            Longitude:
                            <span id="lngText"></span>
                        </p>

                    </div>

                    <a
                        id="mapsButton"
                        href="#"
                        target="_blank"
                        class="bg-blue-600 hover:bg-blue-700 transition text-white px-6 py-4 rounded-2xl font-bold shadow-lg shadow-blue-500/20">

                        Buka Google Maps

                    </a>

                </div>

            </div>

        </div>

        <!-- RIGHT -->
        <div class="xl:col-span-4 space-y-7">

            <div class="bg-gradient-to-br from-blue-600 to-blue-500 rounded-[36px] p-8 text-white">

                <div class="flex items-center justify-between mb-10">

                    <div>

                        <p class="text-blue-100 text-[14px] mb-2">
                            Akurasi Radius
                        </p>

                        <h3 id="radiusText" class="text-[42px] font-extrabold leading-none">
                            <?= $setting['radius_absensi'] ?>m
                        </h3>

                    </div>

                    <div class="w-16 h-16 rounded-3xl bg-white/20 flex items-center justify-center text-3xl">
                        📍
                    </div>

                </div>

                <div class="bg-white/10 rounded-3xl p-6">

                    <p class="text-blue-100 text-[14px] mb-2">
                        Status Validasi GPS
                    </p>

                    <h2 class="text-[26px] font-extrabold mb-4">
                        <?= ucfirst($setting['mode_validasi_gps']) ?>
                    </h2>

                    <span class="bg-green-400/20 text-green-100 px-5 py-3 rounded-2xl inline-block text-[13px] font-bold">
                        GPS Sinkron Aktif
                    </span>

                </div>

            </div>

        </div>

    </div>

</form>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>

    const latInput = document.querySelector('input[name="latitude_kantor"]');
    const lngInput = document.querySelector('input[name="longitude_kantor"]');
    const radiusInput = document.querySelector('input[name="radius_absensi"]');

    const latText = document.getElementById('latText');
    const lngText = document.getElementById('lngText');
    const radiusText = document.getElementById('radiusText');
    const mapsButton = document.getElementById('mapsButton');

    const map = L.map('map').setView(
        [latInput.value, lngInput.value],
        18
    );

    L.tileLayer(
        'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
        {
            attribution: '&copy; OpenStreetMap'
        }
    ).addTo(map);

    const marker = L.marker(
        [latInput.value, lngInput.value],
        {
            draggable: true
        }
    ).addTo(map);

    const circle = L.circle(
        [latInput.value, lngInput.value],
        {
            radius: radiusInput.value,
            color: '#2563eb',
            fillColor: '#3b82f6',
            fillOpacity: 0.2
        }
    ).addTo(map);

    function updateMap() {

        const lat = parseFloat(latInput.value);
        const lng = parseFloat(lngInput.value);
        const radius = parseInt(radiusInput.value);

        marker.setLatLng([lat, lng]);

        circle.setLatLng([lat, lng]);
        circle.setRadius(radius);

        map.setView([lat, lng], 18);

        latText.innerText = lat;
        lngText.innerText = lng;

        radiusText.innerText = radius + 'm';

        mapsButton.href =
            `https://www.google.com/maps?q=${lat},${lng}`;
    }

    latInput.addEventListener('input', updateMap);
    lngInput.addEventListener('input', updateMap);
    radiusInput.addEventListener('input', updateMap);

    marker.on('dragend', function () {

        const position = marker.getLatLng();

        latInput.value = position.lat.toFixed(6);
        lngInput.value = position.lng.toFixed(6);

        updateMap();

    });

    updateMap();

</script>

<?= $this->endSection() ?>