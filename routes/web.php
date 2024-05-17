<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\VoucherController;

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

Route::get('/layout_admin', function () {
    return view('layout_admin');
});

// Định nghĩa route cho trang quản lý thông tin "about us"
Route::get('/admin/manage_about_us_information', function () {
    return view('admin.layout_manage_about_us_information');
})->name('admin.manage_about_us_infomation');

// Định nghĩa route để cập nhật thông tin "about us"
Route::get('/admin/manage_about_us_information', [AboutUsController::class, 'editOrCreate'])->name('admin.manage_about_us_information');
Route::post('/update-about-us', [AboutUsController::class, 'update'])->name('update_about_us');

// Route cho trang "About Us" từ người dùng
Route::get('/about_us', [AboutUsController::class, 'showAboutUs'])->name('user.about_us');
Route::get('/about-us', [AboutUsController::class, 'showAboutUs'])->name('about_us');

//Route cho trang admin mã giảm giá
Route::get('/admin/manage_voucher', [VoucherController::class, 'VoucherIndex'])->name('admin.manage_voucher');
Route::delete('Vouchers/{id}', [VoucherController::class, 'VoucherDestroy'])->name('admin.destroy_voucher');

Route::get('create_vouchers', [VoucherController::class, 'VoucherCreate'])->name('admin.add_voucher');
Route::post('add_vouchers', [VoucherController::class, 'VoucherStore'])->name('admin.store_voucher');

Route::get('Vouchers/{id}/edit', [VoucherController::class, 'VoucherEdit'])->name('admin.edit_voucher');
Route::put('Vouchers/{id}', [VoucherController::class, 'VoucherUpdate'])->name('admin.update_voucher');










