<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\FaviconController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AuthController;
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

Route::get('/', [ProductController::class, 'home'])->name('user.home');

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

// Đổi favicon
Route::get('/change-favicon', [FaviconController::class, 'showForm'])->name('favicon.form');
Route::post('/save-favicon', [FaviconController::class, 'saveFavicon'])->name('favicon.save');

// Đổi banner
Route::get('/change-banner', [BannerController::class, 'showForm'])->name('banner.form');
Route::post('/save-banner', [BannerController::class, 'saveBanner'])->name('banner.save');


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

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'auth'])->name('auth');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

