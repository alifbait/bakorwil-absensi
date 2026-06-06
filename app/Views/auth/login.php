<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Login - Sistem Absensi</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style>

        body{
            font-family:'Inter',sans-serif;
        }

    </style>

</head>

<body class="bg-slate-200 min-h-screen flex items-center justify-center p-5">

    <div class="w-full max-w-[1200px] flex overflow-hidden rounded-[40px] shadow-2xl bg-white">

        <!-- LEFT SIDE -->
        <div class="hidden lg:flex w-1/2 bg-gradient-to-br from-blue-600 to-blue-500 relative overflow-hidden p-14 flex-col justify-between">

            <!-- DECOR -->
            <div class="absolute -top-24 -left-24 w-72 h-72 bg-white/10 rounded-full"></div>

            <div class="absolute bottom-[-120px] right-[-120px] w-80 h-80 bg-orange-400/20 rounded-full"></div>

            <!-- HEADER -->
            <div class="relative z-10">

                <img
                    src="<?= base_url('assets/img/logo-bakorwil-full.png') ?>"
                    class="w-56 object-contain mb-10">

                <h1 class="text-white text-[54px] leading-[58px] font-extrabold mb-5">
                    Sistem
                    <br>
                    Absensi
                </h1>

                <p class="text-blue-100 text-[18px] leading-relaxed max-w-md">
                    Platform monitoring absensi peserta magang Bakorwil III Malang berbasis GPS, selfie, dan validasi realtime.
                </p>

            </div>

            <!-- FOOTER -->
            <div class="relative z-10">

                <div class="bg-white/10 backdrop-blur-sm border border-white/10 rounded-[30px] p-6">

                    <div class="flex items-center gap-4">

                        <div class="w-16 h-16 rounded-3xl bg-white text-blue-600 flex items-center justify-center text-3xl font-bold">
                            ✓
                        </div>

                        <div>

                            <h3 class="text-white font-bold text-[24px] mb-1">
                                Sistem Aman
                            </h3>

                            <p class="text-blue-100 text-[15px]">
                                Pastikan GPS & kamera aktif sebelum absensi.
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- RIGHT SIDE -->
        <div class="w-full lg:w-1/2 flex items-center justify-center bg-slate-50 relative overflow-hidden">

            <!-- MOBILE DECOR -->
            <div class="absolute top-[-70px] left-[-70px] w-40 h-40 bg-blue-100 rounded-full opacity-70 lg:hidden"></div>

            <div class="absolute bottom-[-70px] right-[-70px] w-40 h-40 bg-orange-100 rounded-full opacity-70 lg:hidden"></div>

            <div class="w-full max-w-md p-8 lg:p-14 relative z-10">

                <!-- MOBILE LOGO -->
                <div class="lg:hidden text-center mb-10">

                    <img
                        src="<?= base_url('assets/img/logo-bakorwil-full.png') ?>"
                        class="w-44 mx-auto object-contain mb-5">

                    <h1 class="text-[42px] leading-[44px] font-extrabold text-slate-900 mb-2">
                        Sistem
                        <br>
                        Absensi
                    </h1>

                    <p class="text-slate-400 text-[14px]">
                        Web Absensi Pemerintahan
                    </p>

                </div>

                <!-- DESKTOP TITLE -->
                <div class="hidden lg:block mb-10">

                    <p class="text-blue-600 font-bold mb-2">
                        Selamat Datang 👋
                    </p>

                    <h2 class="text-[44px] leading-[46px] font-extrabold text-slate-900 mb-3">
                        Login Sistem
                    </h2>

                    <p class="text-slate-400">
                        Masuk menggunakan akun peserta atau admin
                    </p>

                </div>

                <!-- ERROR -->
                <?php if(session()->getFlashdata('error')): ?>

                    <div class="bg-red-100 border border-red-200 text-red-600 px-5 py-4 rounded-2xl mb-6 text-sm">

                        <?= session()->getFlashdata('error') ?>

                    </div>

                <?php endif; ?>

                <!-- FORM -->
                <form
                    action="<?= base_url('login/process') ?>"
                    method="POST">

                    <!-- USERNAME -->
                    <div class="mb-5">

                        <label class="flex items-center gap-3 text-slate-900 font-semibold text-[15px] mb-3">

                            <div class="w-10 h-10 rounded-2xl bg-blue-100 flex items-center justify-center text-blue-600">
                                👤
                            </div>

                            Username

                        </label>

                        <input
                            type="text"
                            name="username"
                            required
                            placeholder="Masukkan Username"
                            class="w-full rounded-2xl border border-slate-200 px-5 py-4 text-[15px] bg-white focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition">

                    </div>

                    <!-- PASSWORD -->
                    <div>

                        <label class="flex items-center gap-3 text-slate-900 font-semibold text-[15px] mb-3">

                            <div class="w-10 h-10 rounded-2xl bg-orange-100 flex items-center justify-center text-orange-500">
                                🔒
                            </div>

                            Password

                        </label>

                        <div class="relative">

                            <input
                                type="password"
                                name="password"
                                id="password"
                                required
                                placeholder="Masukkan Password"
                                class="w-full rounded-2xl border border-slate-200 px-5 py-4 text-[15px] bg-white focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition">

                            <button
                                type="button"
                                onclick="togglePassword()"
                                class="absolute right-5 top-1/2 -translate-y-1/2 text-slate-400">

                                👁️

                            </button>

                        </div>

                    </div>

                    <!-- OPTIONS -->
                    <div class="flex items-center justify-between mt-5 mb-8">

                        <label class="flex items-center gap-2 text-slate-500 text-[13px]">

                            <input
                                type="checkbox"
                                class="w-4 h-4 rounded">

                            Ingat saya

                        </label>

                        <a
                            href="#"
                            class="text-blue-600 text-[13px] font-medium">

                            Lupa password?

                        </a>

                    </div>

                    <!-- BUTTON -->
                    <button
                        type="submit"
                        class="w-full bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-700 hover:to-blue-600 transition text-white py-4 rounded-2xl font-bold text-[18px] shadow-xl shadow-blue-500/30 flex items-center justify-center gap-3">

                        Masuk

                        <span>→</span>

                    </button>

                </form>

                <!-- FOOTER -->
                <div class="text-center mt-8">

                    <p class="text-slate-400 text-[13px]">
                        © 2026 Bakorwil III Malang
                    </p>

                </div>

            </div>

        </div>

    </div>

    <!-- SCRIPT -->
    <script>

        function togglePassword()
        {
            const input = document.getElementById('password');

            if(input.type === 'password')
            {
                input.type = 'text';
            }
            else
            {
                input.type = 'password';
            }
        }

    </script>

</body>

</html>