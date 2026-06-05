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