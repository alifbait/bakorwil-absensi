<?= $this->extend('layouts/admin_layout') ?>

<?= $this->section('content') ?>

<!-- MAIN -->
<!-- CONTENT -->
<div class="px-8 pb-8">

    <!-- SUMMARY -->
    <div class="grid grid-cols-5 gap-6 mb-7">

        <!-- CARD -->
        <div class="bg-white rounded-[32px] p-7 border border-slate-100 shadow-sm">

            <div class="flex items-center justify-between mb-7">

                <div
                    class="w-16 h-16 rounded-3xl bg-green-100 flex items-center justify-center text-3xl text-green-600">
                    ✓
                </div>

                <span class="text-green-600 text-[13px] font-bold">
                    +12%
                </span>

            </div>

            <p class="text-slate-400 text-[14px] mb-2">
                Hadir Hari Ini
            </p>

            <h1 class="text-slate-900 text-[42px] font-extrabold leading-none">
                <?= $hadir ?>

            </h1>

        </div>

        <!-- CARD -->
        <div class="bg-white rounded-[32px] p-7 border border-slate-100 shadow-sm">

            <div class="flex items-center justify-between mb-7">

                <div
                    class="w-16 h-16 rounded-3xl bg-yellow-100 flex items-center justify-center text-3xl text-yellow-600">
                    ⏰
                </div>

                <span class="text-yellow-600 text-[13px] font-bold">
                    +4%
                </span>

            </div>

            <p class="text-slate-400 text-[14px] mb-2">
                Pegawai Telat
            </p>

            <h1 class="text-slate-900 text-[42px] font-extrabold leading-none">
                <?= $telat ?>

            </h1>

        </div>

        <!-- CARD -->
        <div class="bg-white rounded-[32px] p-7 border border-slate-100 shadow-sm">

            <div class="flex items-center justify-between mb-7">

                <div class="w-16 h-16 rounded-3xl bg-blue-100 flex items-center justify-center text-3xl text-blue-600">
                    📝
                </div>

                <span class="text-blue-600 text-[13px] font-bold">
                    <?= $pendingIzin ?> Pending
                </span>

            </div>

            <p class="text-slate-400 text-[14px] mb-2">
                Pengajuan Izin
            </p>

            <h1 class="text-slate-900 text-[42px] font-extrabold leading-none">
                <?= $izin ?>

            </h1>

        </div>

        <!-- CARD -->
        <div class="bg-white rounded-[32px] p-7 border border-slate-100 shadow-sm">

            <div class="flex items-center justify-between mb-7">

                <div class="w-16 h-16 rounded-3xl bg-red-100 flex items-center justify-center text-3xl text-red-600">
                    ✚
                </div>

                <span class="text-red-600 text-[13px] font-bold">
                    Hari Ini
                </span>

            </div>

            <p class="text-slate-400 text-[14px] mb-2">
                Pegawai Sakit
            </p>

            <h1 class="text-slate-900 text-[42px] font-extrabold leading-none">
                <?= $sakit ?>
            </h1>

        </div>
        <!-- CARD ALPHA -->
        <div class="bg-white rounded-[32px] p-7 border border-slate-100 shadow-sm">

            <div class="flex items-center justify-between mb-7">

                <div
                    class="w-16 h-16 rounded-3xl bg-slate-200 flex items-center justify-center text-3xl text-slate-700">
                    !
                </div>

                <span class="text-slate-600 text-[13px] font-bold">
                    Hari Ini
                </span>

            </div>

            <p class="text-slate-400 text-[14px] mb-2">
                Tidak Hadir
            </p>

            <h1 class="text-slate-900 text-[42px] font-extrabold leading-none">
                <?= $alpha ?>
            </h1>

        </div>

    </div>

    <!-- GRID -->
    <div class="grid grid-cols-12 gap-6">

        <!-- ACTIVITY -->
        <div class="col-span-8 bg-white rounded-[32px] border border-slate-100 shadow-sm p-7">

            <!-- HEADER -->
            <div class="flex items-center justify-between mb-7">

                <div>

                    <h3 class="text-slate-900 font-bold text-[26px]">
                        Aktivitas Terbaru
                    </h3>

                    <p class="text-slate-400 text-[14px]">
                        Monitoring realtime pegawai
                    </p>

                </div>

                <button
                    class="bg-blue-600 hover:bg-blue-700 transition text-white px-6 py-3 rounded-2xl text-[14px] font-semibold">
                    Lihat Semua
                </button>

            </div>

            <!-- LIST -->
            <div class="space-y-4 max-h-[500px] overflow-y-auto pr-2">
                <?php foreach ($aktivitas as $item): ?>

                    <?php

                    $badge = 'bg-green-100 text-green-700';
                    $label = 'Hadir';

                    if ($item['status'] == 'telat') {

                        $badge = 'bg-yellow-100 text-yellow-700';
                        $label = 'Telat';

                    } elseif ($item['status'] == 'alpha') {

                        $badge = 'bg-red-100 text-red-700';
                        $label = 'Alpha';
                    }

                    $foto = base_url('uploads/profile/default.png');

                    if (!empty($item['foto_profile'])) {

                        $foto = base_url('uploads/profile/' . $item['foto_profile']);
                    }

                    ?>
                    <div class="bg-slate-50 rounded-[24px] px-5 py-4 flex items-center justify-between">
                        <div class="flex items-center gap-4">
                            <img src="<?= $foto ?>" class="w-16 h-16 rounded-2xl object-cover" />
                            <div>

                                <h4 class="text-slate-900 font-bold text-[15px]">
                                    <?= esc($item['nama_lengkap']) ?>
                                </h4>

                                <p class="text-slate-400 text-[13px]">

                                    <?= ucfirst($item['status']) ?>

                                    •

                                    <?= date('H:i', strtotime($item['created_at'])) ?> WIB

                                </p>

                            </div>

                        </div>

                        <span class="<?= $badge ?> px-5 py-2 rounded-xl text-[13px] font-bold">

                            <?= $label ?>

                        </span>

                    </div>

                <?php endforeach; ?>

            </div>

        </div>

        <!-- SIDE -->
        <div class="col-span-4 space-y-6">

            <!-- QUICK ACTION -->
            <div class="bg-white rounded-[32px] border border-slate-100 shadow-sm p-7">

                <h3 class="text-slate-900 font-bold text-[26px] mb-1">
                    Quick Action
                </h3>

                <p class="text-slate-400 text-[14px] mb-6">
                    Shortcut administrasi
                </p>

                <div class="space-y-4">

                    <a href="<?= base_url('admin/pegawai/create') ?>"
                        class="w-full block text-center bg-slate-100 hover:bg-slate-200 transition text-slate-700 py-4 rounded-2xl font-semibold text-[15px]">

                        Tambah Pegawai

                    </a>
                    <a href="<?= base_url('admin/izin?status=pending') ?>"
                        class="w-full block text-center bg-slate-100 hover:bg-slate-200 transition text-slate-700 py-4 rounded-2xl font-semibold text-[15px]">

                        Approval Pending

                    </a>

                </div>

            </div>

            <!-- SERVER -->
            <div
                class="bg-gradient-to-br from-blue-600 to-blue-500 rounded-[32px] p-7 text-white shadow-xl shadow-blue-500/20">

                <p class="text-blue-100 text-[14px] mb-3">
                    Realtime Server
                </p>

                <h1 id="server-clock" class="text-[58px] font-extrabold leading-none mb-4">

                    --

                </h1>

                <p id="server-date" class="text-blue-100 text-[14px]">

                    --

                </p>

            </div>

        </div>

    </div>

</div>

<script>

    let serverTime = new Date();

    function updateServerClock()
    {
        document.getElementById('server-clock').innerHTML =
            serverTime.toLocaleTimeString(
                'id-ID',
                {
                    hour: '2-digit',
                    minute: '2-digit'
                }
            );

        document.getElementById('server-date').innerHTML =
            serverTime.toLocaleDateString(
                'id-ID',
                {
                    weekday: 'long',
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric'
                }
            );

        serverTime.setSeconds(
            serverTime.getSeconds() + 1
        );
    }

    updateServerClock();

    setInterval(
        updateServerClock,
        1000
    );

</script>
<?= $this->endSection() ?>