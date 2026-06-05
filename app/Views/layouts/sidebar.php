<?php $uri = service('uri'); ?>
<aside class="w-[280px] bg-white border-r border-slate-200 flex flex-col justify-between shrink-0">
    <div>

        <!-- LOGO -->
        <div class="px-7 py-6 border-b border-slate-100">

            <div class="flex items-center gap-4">

                <div
                    class="w-14 h-14 rounded-3xl bg-gradient-to-br from-blue-600 to-blue-500 flex items-center justify-center text-white text-2xl shadow-lg shadow-blue-500/20">
                    🏢
                </div>

                <div>

                    <h1 class="text-slate-900 font-extrabold text-[20px] leading-tight">
                        Admin Panel
                    </h1>

                    <p class="text-slate-400 text-[12px]">
                        Bakorwil III Malang
                    </p>

                </div>

            </div>

        </div>

        <!-- NAVIGATION -->
        <div class="p-5 space-y-3">

            <!-- DASHBOARD -->
            <a href="<?= base_url('admin/dashboard') ?>"
                class="w-full <?= $uri->getSegment(2) == 'dashboard' ? 'bg-gradient-to-r from-blue-600 to-blue-500 text-white shadow-lg shadow-blue-500/20' : 'bg-slate-50 hover:bg-slate-100 text-slate-800' ?> px-5 py-4 rounded-[24px] flex items-center gap-4 transition">
                <div class="w-12 h-12 rounded-2xl bg-white/20 flex items-center justify-center text-xl">
                    📊
                </div>

                <div class="text-left">

                    <h3
                        class="<?= $uri->getSegment(2) == 'dashboard' ? 'text-white' : 'text-slate-800' ?> font-semibold text-[15px]">
                        Dashboard
                    </h3>

                    <p
                        class="<?= $uri->getSegment(2) == 'dashboard' ? 'text-blue-100' : 'text-slate-400' ?> text-[12px]">
                        Monitoring sistem
                    </p>

                </div>

            </a>

            <!-- MONITORING -->
            <a href="<?= base_url('admin/monitoring') ?>"
                class="w-full <?= $uri->getSegment(2) == 'monitoring' ? 'bg-gradient-to-r from-blue-600 to-blue-500 text-white shadow-lg shadow-blue-500/20' : 'bg-slate-50 hover:bg-slate-100 text-slate-800' ?> px-5 py-4 rounded-[24px] flex items-center gap-4 transition">
                <div class="w-12 h-12 rounded-2xl bg-white/20 flex items-center justify-center text-xl shadow-sm">
                    🕒
                </div>

                <div class="text-left">

                    <h3 class="font-semibold text-[15px]">
                        Monitoring Absensi
                    </h3>

                    <p class="<?= $uri->getSegment(2) == 'monitoring' ? 'text-blue-100' : 'text-slate-400' ?> text-[12px]">
                        Data kehadiran pegawai
                    </p>

                </div>
            </a>


            <!-- IZIN -->
            <a href="<?= base_url('admin/izin') ?>"
                class="w-full bg-slate-50 hover:bg-slate-100 transition px-5 py-4 rounded-[24px] flex items-center gap-4">

                <div class="w-12 h-12 rounded-2xl bg-white flex items-center justify-center text-xl shadow-sm">
                    📝
                </div>

                <div class="text-left">

                    <h3 class="text-slate-800 font-semibold text-[15px]">
                        Approval Izin
                    </h3>

                    <p class="text-slate-400 text-[12px]">
                        Persetujuan pengajuan
                    </p>

                </div>

            </a>

            <!-- PEGAWAI -->
            <a href="<?= base_url('admin/pegawai') ?>"
                class="w-full bg-slate-50 hover:bg-slate-100 transition px-5 py-4 rounded-[24px] flex items-center gap-4">

                <div class="w-12 h-12 rounded-2xl bg-white flex items-center justify-center text-xl shadow-sm">
                    👥
                </div>

                <div class="text-left">

                    <h3 class="text-slate-800 font-semibold text-[15px]">
                        Data Pegawai
                    </h3>

                    <p class="text-slate-400 text-[12px]">
                        Master data ASN
                    </p>

                </div>

            </a>

            <!-- LAPORAN -->
            <a href="<?= base_url('admin/laporan') ?>"
                class="w-full bg-slate-50 hover:bg-slate-100 transition px-5 py-4 rounded-[24px] flex items-center gap-4">

                <div class="w-12 h-12 rounded-2xl bg-white flex items-center justify-center text-xl shadow-sm">
                    📁
                </div>

                <div class="text-left">

                    <h3 class="text-slate-800 font-semibold text-[15px]">
                        Laporan
                    </h3>

                    <p class="text-slate-400 text-[12px]">
                        Export Excel & PDF
                    </p>

                </div>

            </a>

            <!-- SETTING -->
            <a href="<?= base_url('admin/setting') ?>"
                class="w-full bg-slate-50 hover:bg-slate-100 transition px-5 py-4 rounded-[24px] flex items-center gap-4">

                <div class="w-12 h-12 rounded-2xl bg-white flex items-center justify-center text-xl shadow-sm">
                    ⚙️
                </div>

                <div class="text-left">

                    <h3 class="text-slate-800 font-semibold text-[15px]">
                        Setting
                    </h3>

                    <p class="text-slate-400 text-[12px]">
                        Konfigurasi sistem
                    </p>

                </div>

            </a>

        </div>

    </div>

    <!-- LOGOUT -->
    <div class="p-5 border-t border-slate-100">

        <button
            class="w-full bg-red-500 hover:bg-red-600 transition text-white py-4 rounded-[24px] font-bold text-[15px] shadow-lg shadow-red-300/30">
            Logout
        </button>

    </div>
    ```

</aside>