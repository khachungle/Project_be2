<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('user.checkout');
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_address' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:15',
            'customer_email' => 'required|email|max:255',
        ]);

        $cart = session('cart', []);
        $total = array_reduce($cart, function ($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);

        $order = Order::create([
            'customer_name' => $request->customer_name,
            'customer_address' => $request->customer_address,
            'customer_phone' => $request->customer_phone,
            'customer_email' => $request->customer_email,
            'total_amount' => $total,
        ]);

        foreach ($cart as $id => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $id,
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        session()->forget('cart');

        return redirect()->route('cart.index')->with('success', 'Đặt hàng thành công! Chúng tôi sẽ sớm liên hệ bạn để xác nhận đơn hàng');
    }
}
