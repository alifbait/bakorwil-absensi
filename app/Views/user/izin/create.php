<?= $this->extend('layouts/user_layout') ?>

<?= $this->section('content') ?>

<div class="min-h-screen bg-slate-50 pb-32">

    <!-- HEADER -->
    <div class="sticky top-0 z-30 bg-white/90 backdrop-blur border-b border-slate-100">

        <div class="px-5 pt-10 pb-5">

            <div class="flex items-center gap-3">

                <a
                    href="<?= base_url('izin') ?>"
                    class="w-11 h-11 rounded-2xl bg-slate-100 shadow-sm flex items-center justify-center text-lg">

                    ←

                </a>

                <div>

                    <p class="text-slate-400 text-[11px]">
                        Pengajuan Kehadiran
                    </p>

                    <h2 class="text-slate-900 font-bold text-[22px]">
                        Tambah Izin
                    </h2>

                </div>

            </div>

        </div>

    </div>

    <!-- CONTENT -->
    <div class="px-5 pt-5">

        <!-- ALERT -->
        <?php if(session()->getFlashdata('error')) : ?>

            <div class="mb-5 bg-red-50 border border-red-100 text-red-600 px-4 py-4 rounded-2xl text-[13px]">

                <?= session()->getFlashdata('error') ?>

            </div>

        <?php endif; ?>

        <!-- FORM -->
        <form
            action="<?= base_url('izin/preview') ?>"
            method="POST"
            enctype="multipart/form-data"
            id="formIzin">

            <!-- CARD -->
            <div class="bg-white rounded-[30px] border border-slate-100 shadow-sm p-5">

                <!-- TITLE -->
                <div class="flex items-center justify-between mb-5">

                    <div>

                        <h3 class="text-slate-900 font-bold text-[18px]">
                            Form Pengajuan
                        </h3>

                        <p class="text-slate-400 text-[12px] mt-1">
                            Lengkapi data pengajuan anda
                        </p>

                    </div>

                    <div class="w-12 h-12 rounded-2xl bg-blue-100 flex items-center justify-center text-blue-600 text-xl">

                        📝

                    </div>

                </div>

                <!-- JENIS -->
                <div class="mb-5">

                    <label class="block text-slate-900 font-semibold text-[14px] mb-3">

                        Jenis Pengajuan

                    </label>

                    <div class="grid grid-cols-2 gap-3">

                        <!-- IZIN -->
                        <label>

                            <input
                                type="radio"
                                name="jenis"
                                value="izin"
                                class="hidden peer"
                                checked>

                            <div class="peer-checked:bg-gradient-to-r peer-checked:from-blue-600 peer-checked:to-blue-500 peer-checked:text-white bg-slate-100 text-slate-600 py-4 rounded-2xl text-center font-bold text-[14px] transition cursor-pointer">

                                Izin

                            </div>

                        </label>

                        <!-- SAKIT -->
                        <label>

                            <input
                                type="radio"
                                name="jenis"
                                value="sakit"
                                class="hidden peer">

                            <div class="peer-checked:bg-gradient-to-r peer-checked:from-red-500 peer-checked:to-red-400 peer-checked:text-white bg-slate-100 text-slate-600 py-4 rounded-2xl text-center font-bold text-[14px] transition cursor-pointer">

                                Sakit

                            </div>

                        </label>

                    </div>

                </div>

                <!-- TANGGAL -->
                <div class="grid grid-cols-2 gap-3 mb-5">

                    <!-- MULAI -->
                    <div>

                        <label class="block text-slate-900 font-semibold text-[14px] mb-2">

                            Tanggal Mulai

                        </label>

                        <input
                            type="date"
                            name="tanggal_mulai"
                            id="tanggal_mulai"
                            min="<?= date('Y-m-d') ?>"
                            required
                            class="w-full rounded-2xl border border-slate-200 px-4 py-3 text-[13px] focus:outline-none focus:ring-4 focus:ring-blue-100">

                    </div>

                    <!-- SELESAI -->
                    <div>

                        <label class="block text-slate-900 font-semibold text-[14px] mb-2">

                            Tanggal Selesai

                        </label>

                        <input
                            type="date"
                            name="tanggal_selesai"
                            id="tanggal_selesai"
                            min="<?= date('Y-m-d') ?>"
                            required
                            class="w-full rounded-2xl border border-slate-200 px-4 py-3 text-[13px] focus:outline-none focus:ring-4 focus:ring-blue-100">

                    </div>

                </div>

                <!-- DURASI -->
                <div class="mb-5">

                    <div class="bg-blue-50 border border-blue-100 rounded-2xl p-4 flex items-center justify-between">

                        <div>

                            <p class="text-slate-400 text-[12px]">
                                Total Durasi
                            </p>

                            <h4
                                id="durasiText"
                                class="text-slate-900 font-bold text-[18px] mt-1">

                                0 Hari

                            </h4>

                        </div>

                        <div class="w-12 h-12 rounded-2xl bg-blue-600 text-white flex items-center justify-center text-xl">

                            📅

                        </div>

                    </div>

                </div>

                <!-- ALASAN -->
                <div class="mb-5">

                    <label class="block text-slate-900 font-semibold text-[14px] mb-2">

                        Alasan Pengajuan

                    </label>

                    <textarea
                        name="alasan"
                        rows="5"
                        required
                        placeholder="Masukkan alasan pengajuan..."
                        class="w-full rounded-2xl border border-slate-200 px-4 py-4 text-[13px] resize-none focus:outline-none focus:ring-4 focus:ring-blue-100"></textarea>

                </div>

                <!-- FILE -->
                <div>

                    <label class="block text-slate-900 font-semibold text-[14px] mb-3">

                        File Pendukung

                    </label>

                    <!-- UPLOAD BOX -->
                    <label
                        class="border-2 border-dashed border-slate-300 rounded-[28px] p-6 bg-slate-50 text-center block cursor-pointer">

                        <input
                            type="file"
                            name="file_pendukung"
                            id="fileInput"
                            accept=".jpg,.jpeg,.png,.pdf"
                            class="hidden">

                        <!-- ICON -->
                        <div class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center text-blue-600 text-2xl mx-auto mb-4">

                            📄

                        </div>

                        <!-- TEXT -->
                        <h3 class="text-slate-900 font-bold text-[15px] mb-1">

                            Upload File

                        </h3>

                        <p class="text-slate-400 text-[12px] leading-relaxed">

                            JPG, PNG atau PDF
                            <br>
                            Maksimal 3MB

                        </p>

                        <!-- FILE NAME -->
                        <div
                            id="fileName"
                            class="mt-4 text-blue-600 font-semibold text-[12px] hidden">

                        </div>

                    </label>

                    <!-- INFO -->
                    <div class="mt-3 bg-yellow-50 border border-yellow-100 rounded-2xl p-3">

                        <p class="text-yellow-700 text-[12px] leading-relaxed">

                            File wajib untuk pengajuan sakit.
                            Untuk izin biasa file bersifat opsional.

                        </p>

                    </div>

                </div>

            </div>

            <!-- INFO -->
            <div class="bg-blue-50 border border-blue-100 rounded-[28px] p-4 mt-5 flex gap-3">

                <div class="w-11 h-11 rounded-2xl bg-blue-600 text-white flex items-center justify-center shrink-0">

                    ℹ️

                </div>

                <div>

                    <h3 class="text-slate-900 font-bold text-[14px] mb-1">

                        Menunggu Verifikasi

                    </h3>

                    <p class="text-slate-500 text-[12px] leading-relaxed">

                        Pengajuan akan diperiksa admin terlebih dahulu.
                        Status dapat dilihat pada riwayat izin.

                    </p>

                </div>

            </div>

            <!-- BUTTON -->
            <div class="mt-5">

                <button
                    type="submit"
                    id="submitBtn"
                    class="w-full bg-gradient-to-r from-blue-600 to-blue-500 text-white py-4 rounded-[24px] font-bold text-[16px] shadow-xl shadow-blue-500/20 flex items-center justify-center gap-3 active:scale-[0.98] transition">

                    Ajukan Sekarang

                    <span>→</span>

                </button>

            </div>

        </form>

    </div>

</div>

<!-- SCRIPT -->
<script>

    /*
    |--------------------------------------------------------------------------
    | HITUNG DURASI
    |--------------------------------------------------------------------------
    */

    const mulai = document.getElementById('tanggal_mulai');

    const selesai = document.getElementById('tanggal_selesai');

    const durasiText = document.getElementById('durasiText');

    function hitungDurasi()
    {
        if(mulai.value && selesai.value)
        {
            const start = new Date(mulai.value);

            const end = new Date(selesai.value);

            const diff = end - start;

            const days = (diff / (1000 * 60 * 60 * 24)) + 1;

            if(days > 0)
            {
                durasiText.innerHTML = days + ' Hari';
            }
            else
            {
                durasiText.innerHTML = '0 Hari';
            }
        }
    }

    mulai.addEventListener('change', function(){

        selesai.min = mulai.value;

        hitungDurasi();

    });

    selesai.addEventListener('change', hitungDurasi);

    /*
    |--------------------------------------------------------------------------
    | FILE NAME
    |--------------------------------------------------------------------------
    */

    const fileInput = document.getElementById('fileInput');

    const fileName = document.getElementById('fileName');

    fileInput.addEventListener('change', function(){

        if(this.files.length > 0)
        {
            fileName.classList.remove('hidden');

            fileName.innerHTML = this.files[0].name;
        }

    });

    /*
    |--------------------------------------------------------------------------
    | VALIDASI FILE
    |--------------------------------------------------------------------------
    */

    document.getElementById('formIzin').addEventListener('submit', function(e){

        const jenis = document.querySelector('input[name="jenis"]:checked').value;

        const file = fileInput.files[0];

        /*
        |--------------------------------------------------------------------------
        | FILE WAJIB UNTUK SAKIT
        |--------------------------------------------------------------------------
        */

        if(jenis === 'sakit' && !file)
        {
            e.preventDefault();

            alert('File pendukung wajib untuk pengajuan sakit');

            return;
        }

        /*
        |--------------------------------------------------------------------------
        | VALIDASI SIZE
        |--------------------------------------------------------------------------
        */

        if(file)
        {
            const maxSize = 3 * 1024 * 1024;

            if(file.size > maxSize)
            {
                e.preventDefault();

                alert('Ukuran file maksimal 3MB');

                return;
            }
        }

        /*
        |--------------------------------------------------------------------------
        | LOADING BUTTON
        |--------------------------------------------------------------------------
        */

        const btn = document.getElementById('submitBtn');

        btn.disabled = true;

        btn.innerHTML = `
            <svg class="animate-spin h-5 w-5" viewBox="0 0 24 24">
                <circle class="opacity-25"
                    cx="12"
                    cy="12"
                    r="10"
                    stroke="currentColor"
                    stroke-width="4">
                </circle>

                <path class="opacity-75"
                    fill="currentColor"
                    d="M4 12a8 8 0 018-8v8z">
                </path>
            </svg>

            Mengirim...
        `;
    });

</script>

<?= $this->endSection() ?>