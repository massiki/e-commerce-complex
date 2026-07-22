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
use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Customer\CouponController as CustomerCouponController;
use App\Http\Controllers\Customer\HomeController;
use App\Http\Controllers\Customer\ProductController as CustomerProductController;
use App\Http\Controllers\Customer\SearchController;
use App\Http\Controllers\Customer\WishlistController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products', [CustomerProductController::class, 'index'])->name('products.index');
Route::get('/products/search', [SearchController::class, 'search'])->name('products.search');
Route::get('/products/{product:slug}', [CustomerProductController::class, 'show'])->name('products.show');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');

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

    // carts
    Route::post('/cart/add/{product}', [CartController::class, 'store'])->name('cart.add');
    Route::patch('/cart/update', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{cartItem}', [CartController::class, 'destroy'])->name('cart.remove');

    // wishlists
    Route::post('/wishlist/add/{product}', [WishlistController::class, 'store'])->name('wishlist.add');
    Route::delete('/wishlist/remove/{wishlistItem}', [WishlistController::class, 'remove'])->name('wishlist.remove');

    // coupons
    Route::post('/coupon/apply', [CustomerCouponController::class, 'apply'])->name('coupon.apply');
    Route::delete('/coupon/remove', [CustomerCouponController::class, 'remove'])->name('coupon.remove');
});

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
