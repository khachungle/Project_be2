<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaviconController;
use App\Http\Controllers\BannerController;

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

Route::get('/', function () {
    return view('layout_user');
});

// Đổi favicon
Route::get('/change-favicon', [FaviconController::class, 'showForm'])->name('favicon.form');
Route::post('/save-favicon', [FaviconController::class, 'saveFavicon'])->name('favicon.save');

// Đổi banner
Route::get('/change-banner', [BannerController::class, 'showForm'])->name('banner.form');
Route::post('/save-banner', [BannerController::class, 'saveBanner'])->name('banner.save');

