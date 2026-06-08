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

/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

$routes->get(
    '/',
    'Auth::login'
);

$routes->get(
    'login',
    'Auth::login'
);

$routes->post(
    'login/process',
    'Auth::attemptLogin'
);

$routes->get(
    'logout',
    'Auth::logout'
);


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
        'filter' => 'auth'
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
        $routes->get(
            'izin/approve/(:num)',
            'Izin::approve/$1'
        );

        $routes->get(
            'izin/reject/(:num)',
            'Izin::reject/$1'
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
        | SETTING
        |--------------------------------------------------------------------------
        */
        $routes->get(
            'setting/harilibur/delete/(:num)',
            'Setting::deleteHariLibur/$1'
        );

        $routes->get(
            'setting/absensi',
            'Setting::absensi'
        );

        $routes->post(
            'setting/save-absensi',
            'Setting::saveAbsensi'
        );

        $routes->get(
            'setting/lokasi',
            'Setting::lokasi'
        );

        $routes->post(
            'setting/save-lokasi',
            'Setting::saveLokasi'
        );

        $routes->get(
            'setting/harilibur',
            'Setting::hariLibur'
        );

        $routes->get(
            'setting/notifikasi',
            'Setting::notifikasi'
        );

        $routes->get(
            'setting/umum',
            'Setting::umum'
        );

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

        /*
        |--------------------------------------------------------------------------
        | DELETE HARI LIBUR
        |--------------------------------------------------------------------------
        */
        $routes->get(
            'setting/harilibur/delete/(:num)',
            'Setting::deleteHariLibur/$1'
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
        'filter' => 'auth'
    ],
    function ($routes) {

        $routes->get(
            'dashboard',
            'Dashboard::index'
        );

        $routes->get(
            'riwayat',
            'Riwayat::index'
        );

    }
);

$routes->group(
    '',
    [
        'namespace' => 'App\Controllers\User',
        'filter' => 'auth'
    ],
    function ($routes) {
        /*
|--------------------------------------------------------------------------
| DETAIL IZIN
|--------------------------------------------------------------------------
*/

        $routes->get(
            'izin/detail/(:num)',
            'Izin::detail/$1'
        );

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
            'absensi/preview',
            'Absensi::preview'
        );

        $routes->post(
            'absensi/store',
            'Absensi::store'
        );

        $routes->get(
            'absensi/success',
            'Absensi::success'
        );

        /*
        |--------------------------------------------------------------------------
        | ABSEN PULANG
        |--------------------------------------------------------------------------
        */

        $routes->get(
            'absen-pulang',
            'AbsenPulang::index'
        );

        $routes->post(
            'absen-pulang/preview',
            'AbsenPulang::preview'
        );

        $routes->post(
            'absen-pulang/store',
            'AbsenPulang::store'
        );

        $routes->get(
            'absen-pulang/success',
            'AbsenPulang::success'
        );

        /*
        |--------------------------------------------------------------------------
        | SURVEY
        |--------------------------------------------------------------------------
        */

        $routes->get(
            'survey',
            'User\Survey::index'
        );

        /*
        |--------------------------------------------------------------------------
        | IZIN
        |--------------------------------------------------------------------------
        */

        $routes->get(
            'izin',
            'Izin::index'
        );

        $routes->get(
            'izin/create',
            'Izin::create'
        );

        $routes->post(
            'izin/preview',
            'Izin::preview'
        );

        $routes->post(
            'izin/store',
            'Izin::store'
        );

        $routes->get(
            'izin/success/(:num)',
            'Izin::success/$1'
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

        $routes->get(
            'riwayat/detail/(:num)',
            'Riwayat::detail/$1'
        );

        /*
        |--------------------------------------------------------------------------
        | PROFILE
        |--------------------------------------------------------------------------
        */

        $routes->get(
            'profile',
            'Profile::index'
        );

        $routes->get(
            'profile/password',
            'Profile::password'
        );

        $routes->post(
            'profile/update-password',
            'Profile::updatePassword'
        );

    }

);


$routes->group('', ['filter' => 'auth'], function ($routes) {

    $routes->get(
        'dashboard',
        'User\Dashboard::index'
    );

});




