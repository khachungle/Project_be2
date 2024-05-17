<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();

        // Sử dụng view composer để truyền dữ liệu giỏ hàng vào tất cả các view
        View::composer('*', function ($view) {
            $cart = session()->get('cart', []);
            $cartItemCount = array_sum(array_column($cart, 'quantity'));
            $view->with('cartItemCount', $cartItemCount);
        });
    }
}
