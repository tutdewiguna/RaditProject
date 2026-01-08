<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\AuthController as FrontendAuthController;
use App\Http\Controllers\Backend\AuthController as BackendAuthController;
use App\Http\Controllers\Backend\HomeController as BackendHomeController;
use App\Http\Controllers\Backend\ProductsController;
use App\Http\Controllers\Backend\CategoriesController;
use App\Http\Controllers\Backend\NewsController;
use App\Http\Controllers\Backend\OrdersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/shop', [HomeController::class, 'shop'])->name('shop');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/news', [HomeController::class, 'news'])->name('news');

// Frontend Auth Routes
Route::get('/register', [FrontendAuthController::class, 'register'])->name('register');
Route::post('/register', [FrontendAuthController::class, 'attemptRegister'])->name('register.post');
Route::get('/login', [FrontendAuthController::class, 'login'])->name('login');
Route::post('/login', [FrontendAuthController::class, 'attemptLogin'])->name('login.post');
Route::get('/logout', [FrontendAuthController::class, 'logout'])->name('logout');

// Backend Auth Routes (Public)
Route::prefix('admin')->group(function () {
    Route::get('/', [BackendAuthController::class, 'login'])->name('admin.login');
    Route::post('/login', [BackendAuthController::class, 'attemptLogin'])->name('admin.login.post');
    Route::get('/register', [BackendAuthController::class, 'register'])->name('admin.register');
    Route::post('/register', [BackendAuthController::class, 'attemptRegister'])->name('admin.register.post');
});

// Backend Routes (Protected)
Route::prefix('admin')->middleware(['admin'])->group(function () {
    Route::get('/home', [BackendHomeController::class, 'index'])->name('admin.home');
    
    // Products
    Route::get('/products', [ProductsController::class, 'index'])->name('admin.products.index');
    Route::get('/products/create', [ProductsController::class, 'create'])->name('admin.products.create');
    Route::post('/products/store', [ProductsController::class, 'store'])->name('admin.products.store');
    Route::get('/products/edit/{id}', [ProductsController::class, 'edit'])->name('admin.products.edit');
    Route::post('/products/update/{id}', [ProductsController::class, 'update'])->name('admin.products.update');
    Route::get('/products/delete/{id}', [ProductsController::class, 'delete'])->name('admin.products.delete');
    
    // News
    Route::get('/news', [NewsController::class, 'index'])->name('admin.news.index');
    Route::get('/news/create', [NewsController::class, 'create'])->name('admin.news.create');
    Route::post('/news/store', [NewsController::class, 'store'])->name('admin.news.store');
    Route::get('/news/edit/{id}', [NewsController::class, 'edit'])->name('admin.news.edit');
    Route::post('/news/update/{id}', [NewsController::class, 'update'])->name('admin.news.update');
    Route::get('/news/delete/{id}', [NewsController::class, 'delete'])->name('admin.news.delete');
    
    // Categories
    Route::get('/categories', [CategoriesController::class, 'index'])->name('admin.categories.index');
    Route::get('/categories/create', [CategoriesController::class, 'create'])->name('admin.categories.create');
    Route::post('/categories/store', [CategoriesController::class, 'store'])->name('admin.categories.store');
    Route::get('/categories/edit/{id}', [CategoriesController::class, 'edit'])->name('admin.categories.edit');
    Route::post('/categories/update/{id}', [CategoriesController::class, 'update'])->name('admin.categories.update');
    Route::get('/categories/delete/{id}', [CategoriesController::class, 'delete'])->name('admin.categories.delete');
    
    // Orders
    Route::get('/orders', [OrdersController::class, 'index'])->name('admin.orders.index');
    Route::get('/orders/view/{id}', [OrdersController::class, 'view'])->name('admin.orders.view');
    Route::get('/orders/delete/{id}', [OrdersController::class, 'delete'])->name('admin.orders.delete');
});

