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
