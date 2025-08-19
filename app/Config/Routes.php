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

// Routes Klien dalam group admin
$routes->group('admin', function($routes) {
    $routes->get('klien', 'Klien::index');
    $routes->get('klien/create', 'Klien::create');
    $routes->post('klien/store', 'Klien::store');
    $routes->get('klien/edit/(:num)', 'Klien::edit/$1');
    $routes->post('klien/update/(:num)', 'Klien::update/$1');
    $routes->get('klien/delete/(:num)', 'Klien::delete/$1');
});