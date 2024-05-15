<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaviconController;

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

Route::get('/change-favicon', [FaviconController::class, 'showForm'])->name('favicon.form');
Route::post('/save-favicon', [FaviconController::class, 'saveFavicon'])->name('favicon.save');



