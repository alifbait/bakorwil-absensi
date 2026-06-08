# Sistem Presensi Magang Berbasis Web

### Bakorwil III Malang - Provinsi Jawa Timur

<p align="center">
  <img src="https://img.shields.io/badge/CodeIgniter-4-red?style=for-the-badge">
  <img src="https://img.shields.io/badge/PHP-8+-blue?style=for-the-badge">
  <img src="https://img.shields.io/badge/TailwindCSS-3.x-06B6D4?style=for-the-badge">
  <img src="https://img.shields.io/badge/MySQL-Database-orange?style=for-the-badge">
</p>

---

# 📌 Deskripsi Project

Sistem Presensi Magang berbasis web mobile-first yang dikembangkan untuk mendukung proses kehadiran peserta magang di lingkungan **Bakorwil III Malang Provinsi Jawa Timur**.

Aplikasi ini dirancang agar:

* mudah digunakan melalui smartphone,
* memiliki validasi GPS realtime,
* mendukung selfie absensi,
* pengajuan izin/sakit,
* monitoring kehadiran,
* serta pelaporan data presensi secara digital.

---

# 🎯 Tujuan Sistem

* Digitalisasi absensi peserta magang
* Mengurangi manipulasi kehadiran
* Mempermudah monitoring admin
* Menyediakan riwayat absensi realtime
* Mempermudah pengajuan izin/sakit
* Menyediakan dashboard monitoring kehadiran

---

# 🛠️ Teknologi Yang Digunakan

| Teknologi        | Keterangan              |
| ---------------- | ----------------------- |
| PHP 8+           | Backend utama           |
| CodeIgniter 4    | Framework backend       |
| Tailwind CSS     | UI Styling              |
| Alpine.js        | Interaktivitas frontend |
| MySQL            | Database                |
| HTML5 Camera API | Selfie realtime         |
| Geolocation API  | Validasi GPS            |
| PhpSpreadsheet   | Export Excel            |
| TCPDF            | Export PDF              |

---

# 📱 Konsep UI

Sistem menggunakan konsep:

* Mobile First
* Modern Dashboard
* Clean UI
* Glassmorphism ringan
* Rounded Card Interface
* Gradient Accent Color

---

# 🔐 Fitur Utama

## 1. Login Authentication

* Login username & password
* Session authentication
* Role access:

  * Admin
  * Peserta Magang

---

## 2. Dashboard User

Menampilkan:

* Data profile user
* Status absensi hari ini
* Jam masuk
* Jam pulang
* Riwayat absensi terbaru

---

## 3. Absensi Masuk

### Fitur:

* Selfie kamera realtime
* Validasi GPS
* Preview selfie
* Validasi radius kantor
* Simpan lokasi latitude & longitude
* Redirect survey otomatis
* Success page

### Flow:

```text
Masuk Page
↓
Aktifkan GPS
↓
Ambil Selfie
↓
Preview Absensi
↓
Simpan Database
↓
Redirect Survey
↓
Success Page
```

---

## 4. Absensi Pulang

### Fitur:

* Validasi sudah absen masuk
* Selfie pulang
* Simpan jam pulang
* Hitung total jam kerja
* Success page

### Flow:

```text
Absen Pulang
↓
Validasi Absen Masuk
↓
Selfie
↓
Preview
↓
Simpan Database
↓
Success
```

---

## 5. Pengajuan Izin / Sakit

### Fitur:

* Multi hari izin
* Upload file pendukung
* Preview pengajuan
* Validasi file
* Status approval

### Flow:

```text
Tambah Izin
↓
Preview Pengajuan
↓
Submit
↓
Menunggu Approval
↓
Success Page
```

---

## 6. Riwayat Kehadiran

Menampilkan:

* Riwayat hadir
* Telat
* Izin
* Sakit
* Detail absensi
* Selfie absensi
* Jam masuk & pulang

---

## 7. Profile User

### Fitur:

* Data peserta realtime
* Informasi profile
* Ubah password
* Logout

---

## 8. Dashboard Admin

### Fitur admin:

* Monitoring peserta
* Approval izin
* Statistik kehadiran
* Export laporan
* Setting lokasi GPS
* Setting jam absensi
* Hari libur
* Manajemen peserta

---

# 🗂️ Struktur Database

## Tabel Users

Digunakan untuk:

* login
* role
* password
* session user

## Tabel Peserta

Digunakan untuk:

* data peserta magang
* asal instansi
* kontak
* profile

## Tabel Absensi

Digunakan untuk:

* jam masuk
* jam pulang
* lokasi GPS
* selfie absensi
* total jam kerja

## Tabel Izin

Digunakan untuk:

* pengajuan izin
* pengajuan sakit
* upload bukti
* approval admin

---

# 🔒 Keamanan Sistem

Sistem menggunakan:

* Password Hashing
* Session Authentication
* GPS Validation
* Radius Validation
* File Validation
* Role Access Control

---

# 📸 Validasi GPS

Sistem akan:

* mengambil lokasi realtime user
* membandingkan dengan titik kantor
* menghitung radius jarak
* menolak absensi di luar area

---

# 📊 Fitur Reporting

Admin dapat:

* export Excel
* export PDF
* monitoring kehadiran
* melihat statistik absensi

---

# 🚀 Status Pengembangan

## ✅ Selesai

* Authentication
* Dashboard User
* Absensi Masuk
* Absensi Pulang
* GPS Validation
* Selfie Validation
* Survey Redirect
* Izin / Sakit
* Preview & Success Page
* Profile User
* Ubah Password

## 🔄 Dalam Pengembangan

* Riwayat Absensi
* Monitoring Realtime
* Statistik Dashboard
* Push Notification
* Mobile Optimization

---

# 📁 Struktur Folder

```bash
app/
├── Controllers/
│   ├── Admin/
│   └── User/
│
├── Models/
│
├── Views/
│   ├── admin/
│   ├── user/
│   │   ├── absensi/
│   │   ├── izin/
│   │   ├── profile/
│   │   └── dashboard/
│
public/
├── uploads/
│   ├── selfie/
│   ├── izin/
│   └── profile/
```

---

# 👨‍💻 Developer

Dikembangkan oleh peserta MBKM / Magang
untuk Bakorwil III Malang Provinsi Jawa Timur.

---

# 📌 Catatan

Project ini masih dalam tahap pengembangan aktif dan akan terus dikembangkan untuk mendukung digitalisasi pelayanan internal secara lebih modern dan efisien.

# CodeIgniter 4 Application Starter

## What is CodeIgniter?

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible and secure.
More information can be found at the [official site](https://codeigniter.com).

This repository holds a composer-installable app starter.
It has been built from the
[development repository](https://github.com/codeigniter4/CodeIgniter4).

More information about the plans for version 4 can be found in [CodeIgniter 4](https://forum.codeigniter.com/forumdisplay.php?fid=28) on the forums.

You can read the [user guide](https://codeigniter.com/user_guide/)
corresponding to the latest version of the framework.

## Installation & updates

`composer create-project codeigniter4/appstarter` then `composer update` whenever
there is a new release of the framework.

When updating, check the release notes to see if there are any changes you might need to apply
to your `app` folder. The affected files can be copied or merged from
`vendor/codeigniter4/framework/app`.

## Setup

Copy `env` to `.env` and tailor for your app, specifically the baseURL
and any database settings.

## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!

## Repository Management

We use GitHub issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss
FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script.
Problems with it can be raised on our forum, or as issues in the main repository.

## Server Requirements

PHP version 8.2 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

> [!WARNING]
> - The end of life date for PHP 7.4 was November 28, 2022.
> - The end of life date for PHP 8.0 was November 26, 2023.
> - The end of life date for PHP 8.1 was December 31, 2025.
> - If you are still using below PHP 8.2, you should upgrade immediately.
> - The end of life date for PHP 8.2 will be December 31, 2026.

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library
