<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('layout_user');
});
Route::get('/layout_admin', function () {
    return view('layout_admin');
});
Route::get('/layout_user', function () {
    return view('layout_user');
});
Route::resource('/products', ProductController::class);
Route::resource('/categories', CategoryController::class);

Route::get('/layout_manage_product', [ProductController::class, 'index'])->name('products.index');
Route::get('/layout_add_product', [ProductController::class, 'create1']);
Route::post('/products/{id}', [ProductController::class, 'destroyProduct']);
Route::get('/edit-products/{id}', [ProductController::class, 'edit1'])->name('products.edit');
Route::put('/update-products/{id}', [ProductController::class, 'update1'])->name('products.update');
Route::put('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/search', [ProductController::class, 'search'])->name('searchProduct');

// Hiển thị form thêm sản phẩm
// Xử lý việc tạo mới sản phẩm
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/layout_manage_category', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/layout_add_category', [CategoryController::class, 'create']);
Route::post('/categories', [CategoryController::class, 'store']);
Route::post('/categories/{id}', [CategoryController::class, 'destroy']);
Route::get('/edit-category/{id}', [CategoryController::class, 'edit'])->name('categories.edit');

Route::put('/update-category/{id}', [CategoryController::class, 'update'])->name('categories.update');


//index
Route::get('/layout_products', [ProductController::class, 'indexProduct'])->name('home');
Route::get('/products/category/{id}', [ProductController::class, 'showByCategory'])->name('showByCategory');
