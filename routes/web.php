<?php

use App\Http\Controllers\Site\Auth\GoogleController;
use App\Http\Controllers\Site\CartController;
use App\Http\Controllers\Site\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\Auth\LoginController;
use App\Http\Controllers\Site\Auth\RegisterController;
use App\Http\Controllers\Site\ProfileController;
use Laravel\Socialite\Socialite;
use App\Http\Controllers\Site\ProductController;

require __DIR__.'/admin.php';



Route::get('/', [HomeController::class, 'index'])->name('home');

// Auth Site .....
Route::get('/login', [LoginController::class , 'index'])->name('login');
Route::post('/login', [LoginController::class , 'store'])->name('login');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register');
Route::post('/logout', [LoginController::class , 'logout'])->name('logout');

// auth by google
Route::get('auth/google', [GoogleController::class, 'redirect'])->name('google.redirect');
Route::get('auth/google/callback', [GoogleController::class, 'callback'])->name('google.callback');

// My Profile .....
Route::get('/profile/{profile}', [ProfileController::class, 'index'])->name('profile');

Route::get('/products/search', [HomeController::class, 'search'])->name('products.search');
Route::get('/products/{product}', [ProductController::class, 'index'])->name('products.show');
Route::get('/products/user/create', [ProductController::class, 'create'])->name('products.user.create');
Route::post('/products/user/create', [ProductController::class, 'store'])->name('products.user.store');
Route::post('/products/{product}/rate', [ProductController::class, 'rating'])->name('products.rate');


// Cart Route
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{product}', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');


