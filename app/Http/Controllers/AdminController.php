<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function orders()
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        $orders = Order::all();
        return view('admin.orders', compact('orders'));
    }

    public function show($id)
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        $order = Order::with('orderItems.product')->findOrFail($id);

        return view('admin.order_detail', compact('order'));
    }
}
