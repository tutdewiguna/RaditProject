<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index', ['namespace' => 'Frontend\Controllers']);
// Shop Routes
$routes->get('shop', 'Shop::index', ['namespace' => 'Frontend\Controllers']);
$routes->get('shop/(:segment)', 'Shop::detail/$1', ['namespace' => 'Frontend\Controllers']);
$routes->addRedirect('product/(:segment)', 'shop/$1');
$routes->addRedirect('product', 'shop');

// Cart Routes
$routes->get('cart', 'Cart::index', ['namespace' => 'Frontend\Controllers']);
$routes->post('cart/add', 'Cart::add', ['namespace' => 'Frontend\Controllers']);
$routes->get('cart/remove/(:num)', 'Cart::remove/$1', ['namespace' => 'Frontend\Controllers']);

// Checkout Routes
$routes->get('checkout', 'Checkout::index', ['namespace' => 'Frontend\Controllers']);
$routes->post('checkout/process', 'Checkout::process', ['namespace' => 'Frontend\Controllers']);

$routes->get('contact', 'Home::contact', ['namespace' => 'Frontend\Controllers']);
$routes->get('news', 'NewsController::index', ['namespace' => 'Frontend\Controllers']);
$routes->get('news/(:segment)', 'NewsController::detail/$1', ['namespace' => 'Frontend\Controllers']);


$routes->get('/register', 'Auth::register', ['namespace' => 'Frontend\Controllers']);
$routes->post('/register', 'Auth::attemptRegister', ['namespace' => 'Frontend\Controllers']);
$routes->get('/login', 'Auth::login', ['namespace' => 'Frontend\Controllers']);
$routes->post('/login', 'Auth::attemptLogin', ['namespace' => 'Frontend\Controllers']);
$routes->get('/logout', 'Auth::logout', ['namespace' => 'Frontend\Controllers']);

$routes->group('admin', ['namespace' => 'Backend\Controllers'], function ($routes) {
    $routes->get('/', 'Auth::login');
    $routes->post('login', 'Auth::attemptLogin');
    $routes->get('register', 'Auth::register');
    $routes->post('register', 'Auth::attemptRegister');
});

$routes->group('admin/home', [
    'namespace' => 'Backend\Controllers',
    'filter' => 'adminAuth:admin'
], function ($routes) {
    $routes->get('/', 'Home::index');
});

$routes->group('admin', ['namespace' => 'Backend\Controllers', 'filter' => 'adminAuth:admin'], function ($routes) {
    $routes->get('/', 'Home::index'); // dashboard admin
    $routes->get('products', 'ProductsController::index');
    $routes->get('products/create', 'ProductsController::create');
    $routes->post('products/store', 'ProductsController::store');
    $routes->get('products/edit/(:num)', 'ProductsController::edit/$1');
    $routes->post('products/update/(:num)', 'ProductsController::update/$1');
    $routes->get('products/delete/(:num)', 'ProductsController::delete/$1');

    $routes->get('news', 'NewsController::index');
    $routes->get('news/create', 'NewsController::create');
    $routes->post('news/store', 'NewsController::store');
    $routes->get('news/edit/(:num)', 'NewsController::edit/$1');
    $routes->post('news/update/(:num)', 'NewsController::update/$1');
    $routes->get('news/delete/(:num)', 'NewsController::delete/$1');

    $routes->get('categories', 'CategoriesController::index');
    $routes->get('categories/create', 'CategoriesController::create');
    $routes->post('categories/store', 'CategoriesController::store');
    $routes->get('categories/edit/(:num)', 'CategoriesController::edit/$1');
    $routes->post('categories/update/(:num)', 'CategoriesController::update/$1');
    $routes->get('categories/delete/(:num)', 'CategoriesController::delete/$1');

    $routes->get('orders', 'OrdersController::index');
    $routes->get('orders/view/(:num)', 'OrdersController::view/$1');
    $routes->get('orders/delete/(:num)', 'OrdersController::delete/$1');
});


