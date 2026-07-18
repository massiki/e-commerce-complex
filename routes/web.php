<?php

use App\Http\Controllers\Admin\ActivityController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// admin
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // brands
    Route::resource('brands', BrandController::class)->except(['show'])->names('brands');

    // categories
    Route::resource('categories', CategoryController::class)->except(['show'])->names('categories');

    // products
    Route::resource('products', ProductController::class)->except(['show'])->names('products');

    // coupons
    Route::resource('coupons', CouponController::class)->except(['show'])->names('coupons');

    // user customers
    Route::get('customers', [CustomerController::class, 'index'])->name('customers.index');

    // reviews
    Route::get('reviews', [ReviewController::class, 'index'])->name('reviews.index');

    // activities
    Route::get('activities', [ActivityController::class, 'index'])->name('activities.index');

    // orders
    Route::resource('orders', OrderController::class)->names('orders');

    // sliders
    Route::resource('sliders', SliderController::class)->except(['show'])->names('sliders');

    // settings
    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('settings', [SettingController::class, 'update'])->name('settings.update');
});

// customer
Route::middleware(['auth', 'role:customer'])->prefix('customer')->name('customer.')->group(function () {
    Route::get('dashboard', function () {
        return view('customer.dashboard.index');
    })->name('dashboard');
});

Route::get('products', function () {
    return view('customer.product');
});

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';
