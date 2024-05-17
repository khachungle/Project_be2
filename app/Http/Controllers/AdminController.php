<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function orders()
    {
        $orders = Order::all();
        return view('admin.orders', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::with('orderItems.product')->findOrFail($id);

        return view('admin.order_detail', compact('order'));
    }
}
