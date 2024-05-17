<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;

Route::get('/layout_admin', function () {
    return view('layout_admin');
});
Route::resource('/products', ProductController::class);
Route::resource('/categorys', CategoryController::class);

Route::get('/layout_manage_product', [ProductController::class, 'index'])->name('products.index');
Route::get('/layout_manage_category', [CategoryController::class, 'index'])->name('categorys.index');
Route::get('/layout_add_product', function () {
    return view('layout_add_product');
});
Route::get('/layout_add_category', function () {
    return view('layout_add_category');
});
Route::get('/layout_product', [ProductController::class, 'show']);

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

Route::get('admin/orders', [AdminController::class, 'orders'])->name('admin.orders');
Route::get('/admin/orders/{id}', [AdminController::class, 'show'])->name('admin.order.show');
