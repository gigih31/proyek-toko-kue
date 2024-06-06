<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/cart', 'Cart::index');
$routes->post('/cart/add', 'Cart::add');
$routes->post('/cart/update/(:num)', 'Cart::update/$1');
$routes->get('/cart/remove/(:num)', 'Cart::remove/$1');
$routes->get('/cart/checkout', 'Cart::checkout');
$routes->post('/cart/processCheckout', 'Cart::processCheckout');
$routes->get('/cart/processCheckout', 'Cart::index1');
$routes->get('/cart/checkoutSuccess', 'Cart::checkoutSuccess');
$routes->post('cart/increaseQuantity/(:num)', 'Cart::increaseQuantity/$1');
$routes->post('cart/decreaseQuantity/(:num)', 'Cart::decreaseQuantity/$1');

$routes->group('user', ['filter' => 'auth'], function($routes) {
    $routes->get('', 'Home::index');
    $routes->get('ganti_password', 'AuthController::ganti_password');
$routes->post('proses_ganti_password', 'AuthController::proses_ganti_password');
});

//semua routing yg hanya bisa diakses setelah login dikelompokkan  ke dalam grup bernama //admin 

$routes->group('admin', ['filter' => 'auth'], function($routes) {

    $routes->get('', 'MenuController::index');
    $routes->get('menu', 'MenuController::index');
    $routes->get('AdminDashboard', 'DashboardController::index');
    $routes->get('isi_menu', 'MenuController::create');
    $routes->post('menu_store', 'MenuController::store');
    $routes->get('edit_menu/(:num)', 'MenuController::edit/$1');
    $routes->post('update_menu/(:num)', 'MenuController::update/$1');
    $routes->get('delete_menu/(:num)', 'MenuController::delete/$1');
    $routes->get('delete_user/(:num)', 'AuthController::delete/$1');
    $routes->get('pesanan', 'PesananController::index');
    $routes->get('/pesanan', 'PesananController::index');
    $routes->get('/pesanan/update_status/(:num)', 'PesananController::updateStatus/$1');
    $routes->get('user', 'AuthController::index');

$routes->get('ganti_password', 'AuthController::ganti_password');
$routes->post('proses_ganti_password', 'AuthController::proses_ganti_password');

});
$routes->get('search', 'MenuController::search');
$routes->get('pesanan', 'PesananController::index');
$routes->get('user', 'AuthController::index');
$routes->get('/pesanan', 'PesananController::index');
$routes->get('/pesanan/update_status/(:num)', 'PesananController::updateStatus/$1');
$routes->get('menu', 'MenuController::listmenu');
$routes->get('menudetail/(:num)', 'MenuController::detailmenu/$1');

//route dibawah ini tidak harus login
$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::login');
$routes->get('logout', 'AuthController::logout');

$routes->get('register_user', 'AuthController::form_register');
$routes->post('proses_register_user', 'AuthController::proses_register_user');
$routes->post('proses_register_meja', 'AuthController::proses_register_meja');
$routes->post('proses_register_pelanggan', 'AuthController::proses_register_pelanggan');
$routes->get('activate/(:any)', 'AuthController::activate/$1');


$routes->get('lupa_password', 'AuthController::lupa_password');
$routes->post('proses_lupa_password', 'AuthController::proses_lupa_password');