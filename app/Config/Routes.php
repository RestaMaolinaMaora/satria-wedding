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
});