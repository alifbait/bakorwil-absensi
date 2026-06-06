```php
<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>

<?= view('components/alert'); ?>

<?php
$uri = service('uri');
$activeTab = $uri->getSegment(3, 'notifikasi');

/*
|--------------------------------------------------------------------------
| DEFAULT VALUE
|--------------------------------------------------------------------------
| Nanti tinggal ganti dari database:
|
| $setting['notif_telat']
|
*/

$notifTelat     = true;
$notifIzin      = true;
$notifReminder  = false;

?>

<!-- HEADER -->
<div class="flex items-center justify-between mb-8">

    <div>

        <p class="text-slate-400 text-[14px] mb-1">
            Konfigurasi Sistem Absensi Magang
        </p>

        <h1 class="text-[56px] font-extrabold text-slate-900 leading-none">
            Setting Notifikasi
        </h1>

    </div>

    <button
        type="submit"
        form="form-setting-notifikasi"
        class="bg-blue-600 hover:bg-blue-700 transition text-white px-8 py-4 rounded-2xl font-bold shadow-lg shadow-blue-500/20">

        Simpan Notifikasi

    </button>

</div>

<!-- TAB -->
<div class="bg-white rounded-[32px] p-4 border border-slate-100 shadow-sm mb-8">

    <div class="flex items-center gap-4 overflow-x-auto">

        <a href="<?= base_url('admin/setting/absensi') ?>"
            class="min-w-max px-6 py-4 rounded-2xl font-bold transition <?= ($activeTab === 'absensi')
                                                                                ? 'bg-gradient-to-r from-blue-600 to-blue-500 text-white shadow-lg shadow-blue-500/20'
                                                                                : 'bg-slate-100 hover:bg-slate-200 text-slate-700' ?>">
            🕒 Absensi
        </a>

        <a href="<?= base_url('admin/setting/lokasi') ?>"
            class="min-w-max px-6 py-4 rounded-2xl font-bold transition <?= ($activeTab === 'lokasi')
                                                                                ? 'bg-gradient-to-r from-blue-600 to-blue-500 text-white shadow-lg shadow-blue-500/20'
                                                                                : 'bg-slate-100 hover:bg-slate-200 text-slate-700' ?>">
            📍 Lokasi GPS
        </a>

        <a href="<?= base_url('admin/setting/harilibur') ?>"
            class="min-w-max px-6 py-4 rounded-2xl font-bold transition <?= ($activeTab === 'harilibur')
                                                                                ? 'bg-gradient-to-r from-blue-600 to-blue-500 text-white shadow-lg shadow-blue-500/20'
                                                                                : 'bg-slate-100 hover:bg-slate-200 text-slate-700' ?>">
            🎉 Hari Libur
        </a>

        <a href="<?= base_url('admin/setting/umum') ?>"
            class="min-w-max px-6 py-4 rounded-2xl font-bold transition <?= ($activeTab === 'umum')
                                                                                ? 'bg-gradient-to-r from-blue-600 to-blue-500 text-white shadow-lg shadow-blue-500/20'
                                                                                : 'bg-slate-100 hover:bg-slate-200 text-slate-700' ?>">
            🔑 Akun & Keamanan
        </a>

        <a href="<?= base_url('admin/setting/notifikasi') ?>"
            class="min-w-max px-6 py-4 rounded-2xl font-bold transition <?= ($activeTab === 'notifikasi')
                                                                                ? 'bg-gradient-to-r from-blue-600 to-blue-500 text-white shadow-lg shadow-blue-500/20'
                                                                                : 'bg-slate-100 hover:bg-slate-200 text-slate-700' ?>">
            🔔 Notifikasi
        </a>

    </div>

</div>

<form
    id="form-setting-notifikasi"
    action="<?= base_url('admin/setting/notifikasi/save') ?>"
    method="POST">

    <div class="grid grid-cols-1 xl:grid-cols-12 gap-7">

        <!-- LEFT -->
        <div class="xl:col-span-8 space-y-7">

            <!-- CARD -->
            <div class="bg-white rounded-[36px] p-8 border border-slate-100 shadow-sm">

                <div class="flex items-center gap-4 mb-8">

                    <div class="w-16 h-16 rounded-3xl bg-blue-100 flex items-center justify-center text-3xl">
                        🔔
                    </div>

                    <div>

                        <h2 class="text-[32px] font-extrabold text-slate-900">
                            Notifikasi Sistem
                        </h2>

                        <p class="text-slate-400 text-[14px]">
                            Pengaturan pemicu notifikasi sistem absensi
                        </p>

                    </div>

                </div>

                <div class="space-y-6">

                    <!-- ITEM -->
                    <label class="bg-slate-50 border border-slate-200 rounded-[28px] p-6 flex items-center justify-between cursor-pointer">

                        <div>

                            <h3 class="text-[20px] font-extrabold text-slate-900">
                                Notifikasi Keterlambatan
                            </h3>

                            <p class="text-slate-500 text-[13px] mt-1">
                                Kirim notifikasi jika peserta terlambat absensi
                            </p>

                        </div>

                        <input
                            type="checkbox"
                            name="notif_telat"
                            value="1"
                            <?= $notifTelat ? 'checked' : '' ?>
                            class="w-6 h-6 accent-blue-600">

                    </label>

                    <!-- ITEM -->
                    <label class="bg-slate-50 border border-slate-200 rounded-[28px] p-6 flex items-center justify-between cursor-pointer">

                        <div>

                            <h3 class="text-[20px] font-extrabold text-slate-900">
                                Approval Izin
                            </h3>

                            <p class="text-slate-500 text-[13px] mt-1">
                                Kirim status persetujuan izin secara realtime
                            </p>

                        </div>

                        <input
                            type="checkbox"
                            name="notif_izin"
                            value="1"
                            <?= $notifIzin ? 'checked' : '' ?>
                            class="w-6 h-6 accent-blue-600">

                    </label>

                    <!-- ITEM -->
                    <label class="bg-slate-50 border border-slate-200 rounded-[28px] p-6 flex items-center justify-between cursor-pointer">

                        <div>

                            <h3 class="text-[20px] font-extrabold text-slate-900">
                                Reminder Absensi
                            </h3>

                            <p class="text-slate-500 text-[13px] mt-1">
                                Pengingat otomatis sebelum jam absensi
                            </p>

                        </div>

                        <input
                            type="checkbox"
                            name="notif_reminder"
                            value="1"
                            <?= $notifReminder ? 'checked' : '' ?>
                            class="w-6 h-6 accent-blue-600">

                    </label>

                </div>

            </div>

        </div>

        <!-- RIGHT -->
        <div class="xl:col-span-4 space-y-7">

            <div class="bg-gradient-to-br from-blue-600 to-blue-500 rounded-[36px] p-8 text-white shadow-xl shadow-blue-500/20">

                <div class="flex items-center justify-between mb-10">

                    <div>

                        <p class="text-blue-100 text-[14px] mb-2">
                            Status Notifikasi
                        </p>

                        <h3 class="text-[32px] font-extrabold">
                            Aktif
                        </h3>

                    </div>

                    <div class="w-16 h-16 rounded-3xl bg-white/20 flex items-center justify-center text-3xl">
                        📢
                    </div>

                </div>

                <div class="bg-white/10 rounded-3xl p-6 backdrop-blur-sm">

                    <p class="text-blue-100 text-[14px] mb-2">
                        Sistem
                    </p>

                    <h2 class="text-[20px] font-extrabold mb-3">
                        Berjalan Normal
                    </h2>

                    <span class="bg-green-400/20 text-green-100 px-4 py-2 rounded-xl inline-block text-[13px] font-bold">
                        Notification Ready
                    </span>

                </div>

            </div>

        </div>

    </div>

</form>

<?= $this->endSection() ?>