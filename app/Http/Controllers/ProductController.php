<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Products;

class ProductController extends Controller
{
    //
    public function show(Request $request)
    {
        $products = Product::paginate(8); // Số người dùng trên mỗi trang là 3
        // Trả về view 'user.list' và truyền biến $users vào view
        return view('layout_product', compact('products'));
    }
    public function index(Request $request)
    {
        $products = Product::paginate(8); // Số người dùng trên mỗi trang là 3
        // Trả về view 'user.list' và truyền biến $users vào view
        return view('layout_manage_product', compact('products'));
    }
    public function store(Request $request)
    {
        Product::create($request->all());
        return redirect()->route('products.index')->with('mes', 'Thêm thành công');
    }
    public function edit(Product $product, Request $request)
    {
        // pageIndex
        $pageIndex = 1;
        if ($request->has('pageIndex')) $pageIndex = $request->input('pageIndex');
        // show form edit
        $categorys = Category::all();
        return view('layout_edit_product', compact('product', 'categorys', 'pageIndex'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        // pageIndex
        $pageIndex = 1;
        if ($request->has('pageIndex')) $pageIndex = $request->input('pageIndex');
        // echo $pageIndex;
        // update
        $product->update($request->all());
        return redirect()->route('products.index', ['pageIndex' => $pageIndex])->with('mes', 'Cập nhật thành công!');
    }
    public function destroy(Product $product, Request $request)
    {
        //
        $pageIndex = 1;
        if ($request->has('pageIndex'))  $pageIndex = $request->input('pageIndex');
        $product->delete();
        return redirect()->route('products.index', ['pageIndex' => $pageIndex])->with('mes', 'Xóa thành công');
    }
}
