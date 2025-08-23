<?php

namespace Config;

$routes = Services::routes();

// Default
$routes->get('/', 'Auth::login');
$routes->get('/login', 'Auth::login');
$routes->post('/auth/prosesLogin', 'Auth::prosesLogin');
$routes->get('/logout', 'Auth::logout');

// Group Admin
$routes->group('admin', function($routes) {
    $routes->get('/', 'Dashboard::index');     // /admin → Dashboard
    $routes->get('klien', 'Klien::index');     // /admin/klien
    $routes->get('paket', 'Paket::index');     // /admin/paket
    $routes->get('jadwal', 'Jadwal::index');   // /admin/jadwal
    $routes->get('dashboard/(:num)/(:num)', 'Dashboard::index/$1/$2'); // /admin/dashboard/2023/10
});

// Routes Klien dalam group admin
$routes->group('admin', function($routes) {
    $routes->get('klien', 'Klien::index');
    $routes->get('klien/create', 'Klien::create');
    $routes->post('klien/store', 'Klien::store');
    $routes->get('klien/edit/(:num)', 'Klien::edit/$1');
    $routes->post('klien/update/(:num)', 'Klien::update/$1');
    $routes->get('klien/delete/(:num)', 'Klien::delete/$1');
});

//Routes Admin
$routes->get('/admin', 'Admin::index'); 
$routes->get('/admin/user', 'Admin::user');
$routes->get('/admin/user/create', 'Admin::create');
$routes->post('/admin/user/store', 'Admin::store');
$routes->get('/admin/user/edit/(:num)', 'Admin::edit/$1');
$routes->post('/admin/user/update/(:num)', 'Admin::update/$1');
$routes->get('/admin/user/delete/(:num)', 'Admin::delete/$1');

// Routes Paket dalam group admin
$routes->group('admin', function($routes) {
    $routes->get('paket', 'Paket::index');
    $routes->get('paket/create', 'Paket::create');
    $routes->post('paket/store', 'Paket::store');
    $routes->get('paket/edit/(:num)', 'Paket::edit/$1');
    $routes->post('paket/update/(:num)', 'Paket::update/$1');
    $routes->get('paket/delete/(:num)', 'Paket::delete/$1');
});

// Routes Jadwal dalam group admin
$routes->get('/admin/jadwal', 'Jadwal::index');
$routes->get('/admin/jadwal/create', 'Jadwal::create');
$routes->post('/admin/jadwal/store', 'Jadwal::store');
$routes->get('/admin/jadwal/edit/(:num)', 'Jadwal::edit/$1');
$routes->post('/admin/jadwal/update/(:num)', 'Jadwal::update/$1');
$routes->get('/admin/jadwal/delete/(:num)', 'Jadwal::delete/$1');

// Routes Laporan dalam group admin
$routes->group('admin', function($routes) {
    $routes->get('laporan', 'Laporan::index');
    $routes->get('laporan/exportPdf', 'Laporan::exportPdf');
    $routes->get('laporan/exportExcel', 'Laporan::exportExcel');
});
