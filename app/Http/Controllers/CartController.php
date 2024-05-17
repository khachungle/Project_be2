<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('user.cart', compact('cart'));
    }

    public function add(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['error' => 'Product not found.'], 404);
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->TenSp,
                "quantity" => 1,
                "image" => $product->AnhMoTa,
                "price" => $product->Gia
            ];
        }

        session()->put('cart', $cart);

        $cartItemCount = array_sum(array_column($cart, 'quantity'));

        return response()->json([
            'success' => true,
            'cartItemCount' => $cartItemCount,
        ]);
    }

    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $newQuantity = $request->quantity;

            // Kiểm tra nếu số lượng mới bằng hoặc nhỏ hơn 0
            if ($newQuantity <= 0) {
                $cart[$id]['quantity'] = 1;
                session()->put('cart', $cart);
                return redirect()->route('cart.index')->with('error', 'Số lượng sản phẩm phải lớn hơn 0');
            }

            $cart[$id]['quantity'] = $newQuantity;
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Cập nhật số lượng thành công!');
    }


    public function remove(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Product removed from cart.');
    }
}
