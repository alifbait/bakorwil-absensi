<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

/*
|--------------------------------------------------------------------------
| PUBLIC
|--------------------------------------------------------------------------
*/

$routes->get('/', 'Home::index');


/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

$routes->get('login', 'Auth::login');
$routes->post('login/process', 'Auth::attemptLogin');
$routes->get('logout', 'Auth::logout');


/*
|--------------------------------------------------------------------------
| TEST DATABASE
|--------------------------------------------------------------------------
*/

$routes->get('test-db', 'Test::db');


/*
|--------------------------------------------------------------------------
| ADMIN AREA
|--------------------------------------------------------------------------
*/

$routes->group(
    'admin',
    [
        'namespace' => 'App\Controllers\Admin',
        'filter'    => 'auth'
    ],
    function ($routes) {

        /*
        |--------------------------------------------------------------------------
        | DASHBOARD
        |--------------------------------------------------------------------------
        */

        $routes->get(
            'dashboard',
            'Dashboard::index'
        );


        /*
        |--------------------------------------------------------------------------
        | MONITORING
        |--------------------------------------------------------------------------
        */

        $routes->get(
            'monitoring',
            'Monitoring::index'
        );

        $routes->get(
            'monitoring/detail/(:num)',
            'Monitoring::detail/$1'
        );


        /*
        |--------------------------------------------------------------------------
        | APPROVAL IZIN
        |--------------------------------------------------------------------------
        */

        $routes->get(
            'izin',
            'Izin::index'
        );

        $routes->get(
            'izin/detail/(:num)',
            'Izin::detail/$1'
        );


        /*
        |--------------------------------------------------------------------------
        | PESERTA MAGANG
        |--------------------------------------------------------------------------
        */

        $routes->get(
            'pegawai',
            'Pegawai::index'
        );

        $routes->get(
            'pegawai/detail/(:num)',
            'Pegawai::detail/$1'
        );

        $routes->get(
            'pegawai/create',
            'Pegawai::create'
        );

        $routes->post(
            'pegawai/store',
            'Pegawai::store'
        );

        $routes->get(
            'pegawai/edit/(:num)',
            'Pegawai::edit/$1'
        );

        $routes->post(
            'pegawai/update/(:num)',
            'Pegawai::update/$1'
        );

        $routes->get(
            'pegawai/akun/(:num)',
            'Pegawai::akun/$1'
        );

        $routes->post(
            'pegawai/akun-update/(:num)',
            'Pegawai::akunUpdate/$1'
        );


        /*
        |--------------------------------------------------------------------------
        | LAPORAN
        |--------------------------------------------------------------------------
        */

        $routes->get(
            'laporan',
            'Laporan::index'
        );

        $routes->get(
            'laporan/export-excel',
            'Laporan::exportExcel'
        );

        $routes->get(
            'laporan/export-pdf',
            'Laporan::exportPdf'
        );


        /*
        |--------------------------------------------------------------------------
        | SETTING SYSTEM
        |--------------------------------------------------------------------------
        */

        /*
        |--------------------------------------------------------------------------
        | PAGE
        |--------------------------------------------------------------------------
        */

        $routes->get(
            'setting',
            'Setting::absensi'
        );

        $routes->get(
            'setting/absensi',
            'Setting::absensi'
        );

        $routes->get(
            'setting/lokasi',
            'Setting::lokasi'
        );

        $routes->get(
            'setting/harilibur',
            'Setting::harilibur'
        );

        $routes->get(
            'setting/umum',
            'Setting::umum'
        );

        $routes->get(
            'setting/notifikasi',
            'Setting::notifikasi'
        );


        /*
        |--------------------------------------------------------------------------
        | SAVE SETTING
        |--------------------------------------------------------------------------
        */

        $routes->post(
            'setting/absensi/save',
            'Setting::saveAbsensi'
        );

        $routes->post(
            'setting/lokasi/save',
            'Setting::saveLokasi'
        );

        $routes->post(
            'setting/harilibur/save',
            'Setting::saveHariLibur'
        );

        $routes->post(
            'setting/umum/save',
            'Setting::saveUmum'
        );

        $routes->post(
            'setting/notifikasi/save',
            'Setting::saveNotifikasi'
        );

    }
);


/*
|--------------------------------------------------------------------------
| USER / PESERTA AREA
|--------------------------------------------------------------------------
*/

$routes->group(
    '',
    [
        'namespace' => 'App\Controllers\User',
        'filter'    => 'auth'
    ],
    function ($routes) {

        /*
        |--------------------------------------------------------------------------
        | DASHBOARD USER
        |--------------------------------------------------------------------------
        */

        $routes->get(
            'dashboard',
            'Dashboard::index'
        );

        /*
        |--------------------------------------------------------------------------
        | ABSENSI
        |--------------------------------------------------------------------------
        */

        $routes->get(
            'absensi/masuk',
            'Absensi::masuk'
        );

        $routes->post(
            'absensi/masuk/process',
            'Absensi::processMasuk'
        );

        $routes->get(
            'absensi/pulang',
            'Absensi::pulang'
        );

        $routes->post(
            'absensi/pulang/process',
            'Absensi::processPulang'
        );

        /*
        |--------------------------------------------------------------------------
        | IZIN / SAKIT
        |--------------------------------------------------------------------------
        */

        $routes->get(
            'izin',
            'Izin::index'
        );

        $routes->post(
            'izin/store',
            'Izin::store'
        );

        /*
        |--------------------------------------------------------------------------
        | RIWAYAT ABSENSI
        |--------------------------------------------------------------------------
        */

        $routes->get(
            'riwayat',
            'Riwayat::index'
        );

    }
);