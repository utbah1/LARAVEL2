<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Rute Publik (Website Depan)
|--------------------------------------------------------------------------
*/

Route::get('/', [HomepageController::class, 'index'])->name('home');
Route::get('cart', [HomepageController::class, 'cart']);
Route::get('about', function () {
    return view('web.about', ['title' => 'about - toko gue']);
});
Route::get('contact', function () {
    return view('web.contact');
});
Route::get('product', function () {
    return view('web.products');
});
Route::get('product/{slug}', function ($slug) {
    return view('web.single_product');
});
Route::get('categories', function () {
    return view('web.categories');
});
Route::get('category/{slug}', function ($slug) {
    return view('web.single_category');
});

/*
|--------------------------------------------------------------------------
| Rute Dashboard (Admin Area, Authenticated)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->prefix('dashboard')->group(function () {
   Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

   Route::resource('categories', ProductCategoryController::class);
   Route::resource('products', ProductController::class);
});

/*
|--------------------------------------------------------------------------
| Rute Pengaturan User (Volt)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

/*
|--------------------------------------------------------------------------
| Auth Routes (Register, Login, etc.)
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';