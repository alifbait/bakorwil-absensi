<?= $this->extend('layouts/user_layout') ?>

<?= $this->section('content') ?>

<?php

$setting = $setting ?? [];

$latitudeKantor = $setting['latitude_kantor'] ?? -7.96393700;
$longitudeKantor = $setting['longitude_kantor'] ?? 112.62416500;
$radiusAbsensi = $setting['radius_absensi'] ?? 100;

?>

<div class="min-h-screen bg-slate-50 pb-32">

    <!-- HEADER -->
    <div class="sticky top-0 z-30 bg-white/90 backdrop-blur border-b border-slate-100">

        <div class="px-5 pt-10 pb-5">

            <div class="flex items-center gap-3">

                <a href="<?= base_url('/dashboard') ?>"
                    class="w-11 h-11 rounded-2xl bg-slate-100 flex items-center justify-center text-lg">

                    ←

                </a>

                <div>

                    <p class="text-slate-400 text-[13px]">
                        Absensi Hari Ini
                    </p>

                    <h1 class="text-[28px] font-extrabold text-slate-900 leading-none mt-1">
                        Absen Masuk
                    </h1>

                </div>

            </div>

        </div>

    </div>

    <!-- CONTENT -->
    <div class="px-5 pt-5">

        <!-- JAM -->
        <div
            class="bg-gradient-to-r from-blue-600 to-blue-500 rounded-[30px] p-5 text-white shadow-xl shadow-blue-500/20 mb-5">

            <div class="flex items-center justify-between mb-4">

                <div>

                    <p class="text-blue-100 text-[13px]">
                        Waktu Server
                    </p>

                    <h2 id="clock" class="text-[38px] font-extrabold leading-none mt-2">

                        00:00:00

                    </h2>

                </div>

                <div class="bg-white/20 px-4 py-2 rounded-2xl text-[13px] font-semibold">
                    Realtime
                </div>

            </div>

            <div class="flex items-center justify-between text-[13px] text-blue-100">

                <span id="tanggal">
                    -
                </span>

                <span>
                    Bakorwil III Malang
                </span>

            </div>

        </div>

        <!-- GPS STATUS -->
        <div id="gpsCard" class="bg-white border border-slate-200 rounded-[28px] p-5 mb-5 shadow-sm">

            <div class="flex items-center gap-4">

                <div id="gpsIcon"
                    class="w-14 h-14 rounded-2xl bg-slate-100 flex items-center justify-center text-2xl shrink-0">

                    📡

                </div>

                <div class="flex-1">

                    <h3 id="gpsTitle" class="text-[18px] font-extrabold text-slate-900">

                        Mengecek GPS...

                    </h3>

                    <p id="gpsText" class="text-slate-500 text-[13px] mt-1">

                        Mohon aktifkan lokasi perangkat
                    </p>

                </div>

            </div>

        </div>

        <!-- CAMERA -->
        <div class="bg-white rounded-[30px] border border-slate-100 shadow-sm p-5">

            <div class="flex items-center justify-between mb-5">

                <div>

                    <h2 class="text-[24px] font-extrabold text-slate-900">
                        Selfie Kamera
                    </h2>

                    <p class="text-slate-400 text-[13px] mt-1">
                        Ambil foto untuk absensi
                    </p>

                </div>

                <div class="w-12 h-12 rounded-2xl bg-orange-100 flex items-center justify-center text-xl">
                    📸
                </div>

            </div>

            <!-- VIDEO -->
            <div class="relative rounded-[28px] overflow-hidden bg-slate-100 aspect-[3/4]">

                <video id="video" autoplay playsinline muted class="w-full h-full object-cover">
                </video>

                <canvas id="canvas" class="hidden">
                </canvas>

                <img id="previewImage" class="hidden w-full h-full object-cover">

                <!-- OVERLAY -->
                <div class="absolute inset-0 border-[6px] border-white/30 rounded-[28px] pointer-events-none"></div>

            </div>

            <!-- ALERT -->
            <div id="alertBox" class="hidden mt-5 bg-red-50 border border-red-200 rounded-2xl p-4">

                <h4 class="text-red-600 font-bold text-[15px] mb-1">
                    GPS Tidak Valid
                </h4>

                <p id="alertText" class="text-red-500 text-[13px] leading-relaxed">

                    Anda berada di luar radius kantor
                </p>

            </div>

            <!-- BUTTON -->
            <button id="btnCapture" disabled
                class="mt-5 w-full bg-slate-300 text-white py-4 rounded-2xl font-bold text-[16px] transition">

                Ambil Selfie 📸

            </button>

        </div>

    </div>

</div>

<!-- FORM -->
<form id="formAbsensi" action="<?= base_url('absensi/preview') ?>" method="POST" class="hidden">

    <input type="hidden" name="selfie" id="selfieInput">

    <input type="hidden" name="latitude" id="latitudeInput">

    <input type="hidden" name="longitude" id="longitudeInput">

</form>

<script>

    /*
    |--------------------------------------------------------------------------
    | REALTIME SERVER CLOCK
    |--------------------------------------------------------------------------
    */

    let serverTime = <?= time() ?> * 1000;

    function updateClock() {

        const now = new Date(serverTime);

        document.getElementById('clock').innerHTML =
            now.toLocaleTimeString('id-ID');

        document.getElementById('tanggal').innerHTML =
            now.toLocaleDateString('id-ID', {

                weekday: 'long',
                year: 'numeric',
                month: 'long',
                day: 'numeric'

            });

        serverTime += 1000;

    }

    setInterval(updateClock, 1000);

    updateClock();

    /*
    |--------------------------------------------------------------------------
    | CAMERA
    |--------------------------------------------------------------------------
    */

    const video = document.getElementById('video');

    async function startCamera() {

        try {

            const stream = await navigator.mediaDevices.getUserMedia({

                video: {
                    facingMode: 'user'
                },

                audio: false

            });

            video.srcObject = stream;

        } catch (err) {

            alert('Kamera tidak diizinkan');

            console.log(err);

        }

    }

    startCamera();

    /*
    |--------------------------------------------------------------------------
    | GPS VALIDATION
    |--------------------------------------------------------------------------
    */

    let userLatitude = null;
    let userLongitude = null;
    let gpsValid = false;

    const officeLat = <?= $latitudeKantor ?>;
    const officeLng = <?= $longitudeKantor ?>;
    const radius = <?= $radiusAbsensi ?>;

    function calculateDistance(lat1, lon1, lat2, lon2) {

        const R = 6371e3;

        const φ1 = lat1 * Math.PI / 180;
        const φ2 = lat2 * Math.PI / 180;

        const Δφ = (lat2 - lat1) * Math.PI / 180;
        const Δλ = (lon2 - lon1) * Math.PI / 180;

        const a =
            Math.sin(Δφ / 2) * Math.sin(Δφ / 2) +
            Math.cos(φ1) * Math.cos(φ2) *
            Math.sin(Δλ / 2) * Math.sin(Δλ / 2);

        const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));

        return R * c;
    }

    navigator.geolocation.getCurrentPosition(

        function (position) {

            userLatitude = position.coords.latitude;
            userLongitude = position.coords.longitude;

            document.getElementById('latitudeInput').value = userLatitude;
            document.getElementById('longitudeInput').value = userLongitude;

            const distance = calculateDistance(

                officeLat,
                officeLng,
                userLatitude,
                userLongitude

            );

            if (distance <= radius) {

                gpsValid = true;

                document.getElementById('gpsTitle').innerHTML =
                    'GPS Aktif';

                document.getElementById('gpsText').innerHTML =
                    'Anda berada di area kantor';

                document.getElementById('gpsIcon').className =
                    'w-14 h-14 rounded-2xl bg-blue-600 text-white flex items-center justify-center text-2xl shrink-0';

                const btn = document.getElementById('btnCapture');

                btn.disabled = false;

                btn.className =
                    'mt-5 w-full bg-orange-500 hover:bg-orange-600 text-white py-4 rounded-2xl font-bold text-[16px] transition';

            } else {

                gpsValid = false;

                document.getElementById('gpsTitle').innerHTML =
                    'Diluar Radius';

                document.getElementById('gpsText').innerHTML =
                    'Anda tidak berada di area kantor';

                document.getElementById('gpsIcon').className =
                    'w-14 h-14 rounded-2xl bg-red-500 text-white flex items-center justify-center text-2xl shrink-0';

                document.getElementById('alertBox').classList.remove('hidden');

                document.getElementById('alertText').innerHTML =
                    'Jarak anda terlalu jauh dari titik kantor';

            }

        },

        function (error) {

            document.getElementById('gpsTitle').innerHTML =
                'GPS Tidak Aktif';

            document.getElementById('gpsText').innerHTML =
                'Aktifkan GPS terlebih dahulu';

            document.getElementById('gpsIcon').className =
                'w-14 h-14 rounded-2xl bg-red-500 text-white flex items-center justify-center text-2xl shrink-0';

            document.getElementById('alertBox').classList.remove('hidden');

            document.getElementById('alertText').innerHTML =
                'Browser tidak mendapatkan lokasi GPS';

            console.log(error);

        },

        {
            enableHighAccuracy: true
        }

    );

    /*
    |--------------------------------------------------------------------------
    | CAPTURE SELFIE
    |--------------------------------------------------------------------------
    */

    document.getElementById('btnCapture').addEventListener(

        'click',

        function () {

            if (!gpsValid) {

                alert('GPS tidak valid');

                return;

            }

            const canvas = document.getElementById('canvas');

            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;

            const ctx = canvas.getContext('2d');

            ctx.drawImage(video, 0, 0);

            const image = canvas.toDataURL('image/jpeg');

            document.getElementById('selfieInput').value = image;

            document.getElementById('formAbsensi').submit();

        }

    );

</script>

<?= $this->endSection() ?>