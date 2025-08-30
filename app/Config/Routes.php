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
    // Dashboard
    $routes->get('/', 'Dashboard::index');     
    $routes->get('dashboard/(:num)/(:num)', 'Dashboard::index/$1/$2');

    // Klien
    $routes->get('klien', 'Klien::index');
    $routes->get('klien/create', 'Klien::create');
    $routes->post('klien/store', 'Klien::store');
    $routes->get('klien/edit/(:num)', 'Klien::edit/$1');
    $routes->post('klien/update/(:num)', 'Klien::update/$1');
    $routes->post('klien/delete/(:num)', 'Klien::delete/$1');

    // Paket
    $routes->get('paket', 'Paket::index');
    $routes->get('paket/create', 'Paket::create');
    $routes->post('paket/store', 'Paket::store');
    $routes->get('paket/edit/(:num)', 'Paket::edit/$1');
    $routes->post('paket/update/(:num)', 'Paket::update/$1');
    $routes->post('paket/delete/(:num)', 'Paket::delete/$1'); // pakai POST biar konsisten

    // Jadwal
    $routes->get('jadwal', 'Jadwal::index');
    $routes->get('jadwal/create', 'Jadwal::create');
    $routes->post('jadwal/store', 'Jadwal::store');
    $routes->get('jadwal/edit/(:num)', 'Jadwal::edit/$1');
    $routes->post('jadwal/update/(:num)', 'Jadwal::update/$1');
    $routes->post('jadwal/delete/(:num)', 'Jadwal::delete/$1'); // pakai POST biar konsisten

    // Laporan
    $routes->get('laporan', 'Laporan::index');
    $routes->get('laporan/exportPdf', 'Laporan::exportPdf');
    $routes->get('laporan/exportExcel', 'Laporan::exportExcel');

    // User Management (Admin)
    $routes->get('user', 'Admin::user');
    $routes->get('user/create', 'Admin::create');
    $routes->post('user/store', 'Admin::store');
    $routes->get('user/edit/(:num)', 'Admin::edit/$1');
    $routes->post('user/update/(:num)', 'Admin::update/$1');
    $routes->post('user/delete/(:num)', 'Admin::delete/$1');
});