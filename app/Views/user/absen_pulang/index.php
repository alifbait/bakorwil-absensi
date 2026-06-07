<?= $this->extend('layouts/user_layout') ?>

<?= $this->section('content') ?>

<div class="min-h-screen bg-slate-50 pb-32">

    <!-- HEADER -->
    <div class="sticky top-0 z-30 bg-white/90 backdrop-blur border-b border-slate-100">

        <div class="px-5 pt-10 pb-5">

            <div class="flex items-center justify-between">

                <div class="flex items-center gap-3">

                    <a href="<?= base_url('dashboard') ?>"
                        class="w-11 h-11 rounded-2xl bg-slate-100 shadow-sm flex items-center justify-center text-lg">

                        ←

                    </a>

                    <div>

                        <p class="text-slate-400 text-[12px]">
                            Absensi Hari Ini
                        </p>

                        <h2 class="text-slate-900 font-bold text-[24px] leading-tight">
                            Absen Pulang
                        </h2>

                    </div>

                </div>

                <div
                    class="w-11 h-11 rounded-2xl bg-orange-100 flex items-center justify-center text-orange-500 text-lg">

                    🌇

                </div>

            </div>

        </div>

    </div>

    <!-- CONTENT -->
    <div class="px-5 pt-5">

        <!-- STATUS CARD -->
        <div
            class="bg-gradient-to-r from-orange-500 to-orange-400 rounded-[30px] p-5 text-white shadow-xl shadow-orange-300">

            <div class="flex items-center justify-between mb-5">

                <div>

                    <p class="text-orange-100 text-[12px] mb-1">
                        Jam Masuk Hari Ini
                    </p>

                    <h3 class="text-[34px] font-extrabold leading-none">

                        <?= date('H:i', strtotime($absensi['jam_masuk'])) ?>

                    </h3>

                </div>

                <div
                    class="bg-white/20 px-4 py-2 rounded-2xl text-[12px] font-semibold backdrop-blur">

                    Sudah Masuk

                </div>

            </div>

            <!-- GRID -->
            <div class="grid grid-cols-2 gap-3">

                <!-- JAM SEKARANG -->
                <div class="bg-white/10 rounded-2xl p-4">

                    <p class="text-orange-100 text-[11px] mb-1">
                        Waktu Sekarang
                    </p>

                    <h4
                        id="clock"
                        class="text-[20px] font-bold">
                    </h4>

                </div>

                <!-- TOTAL KERJA -->
                <div class="bg-white/10 rounded-2xl p-4">

                    <p class="text-orange-100 text-[11px] mb-1">
                        Total Kerja
                    </p>

                    <h4 class="text-[20px] font-bold">

                        <?= $jamKerja ?> Jam

                    </h4>

                </div>

            </div>

        </div>

        <!-- GPS CARD -->
        <div
            class="bg-white rounded-[28px] border border-slate-100 shadow-sm p-5 mt-5">

            <div class="flex items-center gap-4">

                <div
                    class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center text-blue-600 text-2xl">

                    📍

                </div>

                <div>

                    <h3 class="text-slate-900 font-bold text-[17px]">
                        GPS Aktif
                    </h3>

                    <p class="text-slate-400 text-[13px] mt-1">
                        Anda berada di area kantor
                    </p>

                </div>

            </div>

        </div>

        <!-- CAMERA -->
        <div
            class="bg-white rounded-[30px] border border-slate-100 shadow-sm p-5 mt-5">

            <!-- TITLE -->
            <div class="flex items-center justify-between mb-5">

                <div>

                    <h3 class="text-slate-900 font-bold text-[22px]">
                        Selfie Pulang
                    </h3>

                    <p class="text-slate-400 text-[13px] mt-1">
                        Ambil foto untuk validasi
                    </p>

                </div>

                <div
                    class="w-12 h-12 rounded-2xl bg-orange-100 flex items-center justify-center text-orange-500 text-xl">

                    📷

                </div>

            </div>

            <!-- CAMERA -->
            <div
                class="rounded-[28px] overflow-hidden bg-slate-100 border border-slate-200 relative aspect-[3/4]">

                <video
                    id="camera"
                    autoplay
                    playsinline
                    class="w-full h-full object-cover">
                </video>

                <canvas
                    id="canvas"
                    class="hidden">
                </canvas>

            </div>

            <!-- BUTTON -->
            <button
                id="btnCapture"
                type="button"
                class="w-full mt-5 bg-orange-500 text-white py-4 rounded-2xl font-bold text-[15px] shadow-lg shadow-orange-300 flex items-center justify-center gap-2">

                Ambil Selfie

                <span>📸</span>

            </button>

        </div>

    </div>

</div>

<!-- FORM -->
<form
    id="formPreview"
    action="<?= base_url('absen-pulang/preview') ?>"
    method="POST"
    class="hidden">

    <input
        type="hidden"
        name="selfie"
        id="selfieInput">

    <input
        type="hidden"
        name="latitude"
        id="latitudeInput">

    <input
        type="hidden"
        name="longitude"
        id="longitudeInput">

</form>

<!-- CAMERA SCRIPT -->
<script>

    /*
    |--------------------------------------------------------------------------
    | CAMERA
    |--------------------------------------------------------------------------
    */

    const video =
        document.getElementById('camera');

    const canvas =
        document.getElementById('canvas');

    const btnCapture =
        document.getElementById('btnCapture');

    navigator.mediaDevices
        .getUserMedia({

            video: {
                facingMode: 'user'
            },

            audio: false

        })

        .then(stream => {

            video.srcObject = stream;

        });

    /*
    |--------------------------------------------------------------------------
    | CAPTURE
    |--------------------------------------------------------------------------
    */

    btnCapture.addEventListener(

        'click',

        function () {

            /*
            |--------------------------------------------------------------------------
            | GPS
            |--------------------------------------------------------------------------
            */

            navigator.geolocation.getCurrentPosition(

                function (position) {

                    const context =
                        canvas.getContext('2d');

                    canvas.width =
                        video.videoWidth;

                    canvas.height =
                        video.videoHeight;

                    context.drawImage(

                        video,
                        0,
                        0,
                        canvas.width,
                        canvas.height

                    );

                    const selfie =
                        canvas.toDataURL('image/png');

                    /*
                    |--------------------------------------------------------------------------
                    | INPUT VALUE
                    |--------------------------------------------------------------------------
                    */

                    document.getElementById('selfieInput').value =
                        selfie;

                    document.getElementById('latitudeInput').value =
                        position.coords.latitude;

                    document.getElementById('longitudeInput').value =
                        position.coords.longitude;

                    /*
                    |--------------------------------------------------------------------------
                    | SUBMIT
                    |--------------------------------------------------------------------------
                    */

                    document.getElementById('formPreview').submit();

                },

                function () {

                    alert(
                        'GPS gagal diakses'
                    );

                }

            );

        }

    );

</script>

<!-- REALTIME CLOCK -->
<script>

    /*
    |--------------------------------------------------------------------------
    | REALTIME SERVER CLOCK
    |--------------------------------------------------------------------------
    */

    let serverTime =
        <?= $server_time ?> * 1000;

    function updateClock()
    {
        const now =
            new Date(serverTime);

        document.getElementById('clock').innerHTML =
            now.toLocaleTimeString('id-ID');

        serverTime += 1000;
    }

    setInterval(updateClock, 1000);

    updateClock();

</script>

<?= $this->endSection() ?>