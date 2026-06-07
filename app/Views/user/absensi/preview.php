<?= $this->extend('layouts/user_layout') ?>

<?= $this->section('content') ?>

<?php

$selfie = $selfie ?? null;

$jam = $jam ?? date('H:i:s');

$tanggal = $tanggal ?? date('d F Y');

$statusGps = $statusGps ?? 'Dalam Radius';

?>

<div class="min-h-screen bg-slate-50 pb-32">

    <!-- HEADER -->
    <div class="sticky top-0 z-30 bg-white/90 backdrop-blur border-b border-slate-100">

        <div class="px-5 pt-10 pb-5">

            <div class="flex items-center justify-between">

                <div class="flex items-center gap-3">

                    <a href="<?= base_url('absensi/masuk') ?>"
                        class="w-11 h-11 rounded-2xl bg-slate-100 shadow-sm flex items-center justify-center text-lg">

                        ←

                    </a>

                    <div>

                        <p class="text-slate-400 text-[12px]">
                            Preview Absensi
                        </p>

                        <h2 class="text-slate-900 font-bold text-[24px] leading-tight">
                            Konfirmasi
                        </h2>

                    </div>

                </div>

                <div class="w-11 h-11 rounded-2xl bg-green-100 flex items-center justify-center text-green-600 text-lg">

                    ✓

                </div>

            </div>

        </div>

    </div>

    <!-- CONTENT -->
    <div class="px-5 pt-5">

        <!-- PREVIEW CARD -->
        <div class="bg-white rounded-[30px] border border-slate-100 shadow-sm p-5">

            <!-- TITLE -->
            <div class="flex items-center justify-between mb-5">

                <div>

                    <h3 class="text-slate-900 font-bold text-[20px]">
                        Selfie Preview
                    </h3>

                    <p class="text-slate-400 text-[13px] mt-1">
                        Pastikan wajah terlihat jelas
                    </p>

                </div>

                <div
                    class="w-12 h-12 rounded-2xl bg-orange-100 flex items-center justify-center text-orange-500 text-xl">

                    📷

                </div>

            </div>

            <!-- PHOTO -->
            <div class="rounded-[28px] overflow-hidden bg-slate-100 aspect-[3/4] relative border border-slate-200">

                <img src="<?= $selfie ?>" class="w-full h-full object-cover">

                <!-- VALID -->
                <div
                    class="absolute top-4 right-4 bg-green-500 text-white px-4 py-2 rounded-2xl text-[12px] font-bold shadow-lg">

                    Valid

                </div>

            </div>

            <!-- BUTTON -->
            <div class="mt-5">

                <a href="<?= base_url('absensi/masuk') ?>"
                    class="w-full bg-slate-100 text-slate-700 py-4 rounded-2xl font-bold text-[14px] flex items-center justify-center">

                    Ambil Lagi

                </a>

            </div>

        </div>

        <!-- DETAIL -->
        <div class="bg-white rounded-[28px] border border-slate-100 shadow-sm p-5 mt-5">

            <!-- TITLE -->
            <div class="flex items-center justify-between mb-5">

                <div>

                    <h3 class="text-slate-900 font-bold text-[18px]">
                        Detail Absensi
                    </h3>

                    <p class="text-slate-400 text-[12px] mt-1">
                        Data realtime server
                    </p>

                </div>

                <div class="w-11 h-11 rounded-2xl bg-blue-100 flex items-center justify-center text-blue-600 text-lg">

                    📍

                </div>

            </div>

            <!-- ITEM -->
            <div class="space-y-4">

                <!-- JAM -->
                <div class="flex items-center justify-between">

                    <p class="text-slate-400 text-[13px]">
                        Waktu
                    </p>

                    <h4 class="text-slate-900 font-bold text-[15px]">

                        <span id="clock"></span>
                    </h4>

                </div>

                <!-- TANGGAL -->
                <div class="flex items-center justify-between">

                    <p class="text-slate-400 text-[13px]">
                        Tanggal
                    </p>

                    <h4 class="text-slate-900 font-bold text-[15px]">

                        <span id="tanggal"></span>
                    </h4>

                </div>

                <!-- LOKASI -->
                <div class="flex items-center justify-between">

                    <p class="text-slate-400 text-[13px]">
                        Lokasi
                    </p>

                    <h4 class="text-blue-600 font-bold text-[14px]">

                        <?= $statusGps ?>

                    </h4>

                </div>

                <!-- STATUS -->
                <div class="flex items-center justify-between">

                    <p class="text-slate-400 text-[13px]">
                        Status
                    </p>

                    <span class="<?= $statusBadge ?> px-4 py-2 rounded-2xl text-[12px] font-bold">

                        <?= $statusKehadiran ?>

                    </span> 

                </div>

            </div>

        </div>

        <!-- SUBMIT -->
        <div class="mt-5">

            <form id="form-absensi" action="<?= base_url('absensi/store') ?>" method="POST">

                <button type="submit" onclick="openSurvey()"
                    class="w-full bg-gradient-to-r from-blue-600 to-blue-500 text-white py-4 rounded-[24px] font-bold text-[17px] shadow-xl shadow-blue-500/30 flex items-center justify-center gap-3">

                    Isi Survey

                    <span>→</span>

                </button>

            </form>

        </div>

        <!-- INFO -->
        <div class="mt-5 text-center">

            <p class="text-slate-400 text-[12px] leading-relaxed">

                Dengan melanjutkan absensi,
                anda dianggap hadir pada hari ini

            </p>

        </div>

    </div>

</div>

<!-- FORM STORE -->
<form id="formStore" action="<?= base_url('absensi/store') ?>" method="POST" class="hidden">

    <input type="hidden" name="selfie" value="<?= esc($selfie) ?>">

</form>


<script>

    /*
    |--------------------------------------------------------------------------
    | REALTIME SERVER CLOCK
    |--------------------------------------------------------------------------
    */

    let serverTime = <?= $server_time ?> * 1000;

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

</script>
<script>

    function openSurvey() {
        window.open(
            'https://google.com',
            '_blank'
        );
    }

</script>
<?= $this->endSection() ?>