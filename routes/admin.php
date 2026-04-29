<?php

use App\Http\Controllers\Dashboard\CategorieController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\OfferController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\ReviewController;
use App\Http\Controllers\Dashboard\RolesController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Site\CartController;
use App\Http\Middleware\DashboardLoginMiddelware;
use Illuminate\Support\Facades\Route;


Route::middleware([
    'auth', DashboardLoginMiddelware::class
])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');


    // User Route ...
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users/create', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/edit/{user}', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/edit/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/delete/{user}', [UserController::class, 'destroy'])->name('users.destroy');

// Product Route
    Route::get('/products', [ProductController::class, 'index'])->name('products');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products/create', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/edit/{product}', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/edit/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/delete/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

// Categories Route
    Route::get('/categories',[CategorieController::class, 'index'] )->name('categories');
    Route::get('/categories/create',[CategorieController::class, 'create'] )->name('categories.create');
    Route::post('/categories/create',[CategorieController::class, 'store'] )->name('categories.store');
    Route::get('/categories/edit/{categorie}', [CategorieController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/edit/{categorie}', [CategorieController::class, 'update'])->name('categories.update');
    Route::delete('/categories/delete/{categorie}', [CategorieController::class, 'destroy'])->name('categories.destroy');

// Roles Route
    Route::get('/roles',[RolesController::class, 'index'] )->name('roles');
    Route::get('/roles/create',[RolesController::class, 'create'] )->name('roles.create');
    Route::post('/roles/create',[RolesController::class, 'store'] )->name('roles.store');
    Route::get('/roles/edit/{role}', [RolesController::class, 'edit'])->name('roles.edit');
    Route::put('/roles/edit/{role}', [RolesController::class, 'update'])->name('roles.update');
    Route::delete('/roles/delete/{role}', [RolesController::class, 'destroy'])->name('roles.destroy');

// View Route
    Route::get('/reviews',[ReviewController::class, 'index'] )->name('reviews');
    Route::delete('reviews/delete/{review}', [ReviewController::class, 'destroy'])->name('reviews.destroy');



// Offers Route
    Route::get('/offers',[OfferController::class, 'index'] )->name('offers');
    Route::get('/offers/create',[OfferController::class, 'create'] )->name('offers.create');
    Route::post('/offers/create',[OfferController::class, 'store'] )->name('offers.store');
    Route::get('/offers/edit/{offer}', [OfferController::class, 'edit'])->name('offers.edit');
    Route::put('/offers/edit/{offer}', [OfferController::class, 'update'])->name('offers.update');
    Route::delete('/offers/delete/{offer}', [OfferController::class, 'destroy'])->name('offers.destroy');
// Carts Route
    Route::get('/cart',[CartController::class, 'index'] )->name('cart');
    Route::delete('/cart/{cart}', [CartController::class, 'destroy'])->name('cart.destroy');


});

Route::get('/login', [DashboardController::class, 'login'])->name('admin.login');
Route::post('/login', [DashboardController::class, 'dologin'])->name('admin.dologin');
Route::get('/logout', [DashboardController::class, 'logout'])->name('admin.logout');

