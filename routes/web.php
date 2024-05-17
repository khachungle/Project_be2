<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;

Route::get('/layout_admin', function(){
    return view('layout_admin');
});
Route::get('/layout_manage_product', [ProductController::class, 'index'])->name('products.index');
Route::get('/layout_add_product', [ProductController::class, 'create1']);
Route::post('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::get('/edit-products/{id}', [ProductController::class, 'edit1'])->name('products.edit');
Route::put('/update-products/{id}', [ProductController::class, 'update1'])->name('products.update');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/search', [ProductController::class, 'search'])->name('searchProduct');

// Xử lý việc tạo mới sản phẩm
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/layout_manage_category', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/layout_add_category', [CategoryController::class, 'create']);
Route::post('/categories', [CategoryController::class, 'store']);
Route::post('/categories/{id}', [CategoryController::class, 'destroy']);
Route::get('/edit-category/{id}', [CategoryController::class, 'edit'])->name('categories.edit');

Route::get('/update-category/{id}', [CategoryController::class, 'update'])->name('categories.update');


//index
Route::get('/layout_products', [ProductController::class, 'indexProduct'])->name('home');
Route::get('/products/category/{id}', [ProductController::class, 'showByCategory'])->name('showByCategory');

Route::get('/layout_manage_category', [CategoryController::class, 'index'])->name('categorys.index');
Route::get('/layout_product', [ProductController::class, 'show']);

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

Route::get('admin/orders', [AdminController::class, 'orders'])->name('admin.orders');
Route::get('/admin/orders/{id}', [AdminController::class, 'show'])->name('admin.order.show');
