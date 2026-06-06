<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('/admin/dashboard', 'Admin\Dashboard::index');
$routes->get('/admin/monitoring', 'Admin\Monitoring::index');
$routes->get('admin/monitoring/detail/(:num)', 'Admin\Monitoring::detail/$1');
$routes->get('admin/izin', 'Admin\Izin::index');
$routes->get('admin/izin/detail/(:num)', 'Admin\Izin::detail/$1');
$routes->get('admin/pegawai', 'Admin\Pegawai::index');
$routes->get('admin/pegawai/detail/(:num)', 'Admin\Pegawai::detail/$1');
$routes->get('admin/pegawai/create', 'Admin\Pegawai::create');
$routes->post('admin/pegawai/store', 'Admin\Pegawai::store');
$routes->get('admin/pegawai/edit/(:num)', 'Admin\Pegawai::edit/$1');
$routes->post('admin/pegawai/update/(:num)', 'Admin\Pegawai::update/$1');
$routes->get('admin/pegawai/akun/(:num)', 'Admin\Pegawai::akun/$1');
$routes->post('admin/pegawai/akun-update/(:num)', 'Admin\Pegawai::akunUpdate/$1');
$routes->get('admin/laporan', 'Admin\Laporan::index');
$routes->get('admin/laporan/export-excel', 'Admin\Laporan::exportExcel');
$routes->get('admin/laporan/export-pdf', 'Admin\Laporan::exportPdf');
$routes->group('admin', ['namespace' => 'App\Controllers\Admin'], function($routes) {
    $routes->get('setting', 'Setting::umum');
    $routes->get('setting/umum', 'Setting::umum');
    $routes->get('setting/lokasi', 'Setting::lokasi');
    $routes->get('setting/absensi', 'Setting::absensi');
    $routes->get('setting/jamkerja', 'Setting::jamkerja');
    $routes->get('setting/harilibur', 'Setting::harilibur');
    $routes->get('setting/notifikasi', 'Setting::notifikasi');

});