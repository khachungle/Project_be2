<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Products;

class ProductController extends Controller
{
    //
   
    public function index(Request $request){
        $numberOfRecord = Product::count();
        $perPage = 8;
        $numberOfPage = $numberOfRecord % $perPage == 0?
             (int) ($numberOfRecord / $perPage): (int) ($numberOfRecord / $perPage) + 1;
        $pageIndex = 1;
        if($request->has('pageIndex'))
            $pageIndex = $request->input('pageIndex');
        if($pageIndex < 1) $pageIndex = 1;
        if($pageIndex > $numberOfPage) $pageIndex = $numberOfPage;
        //
        $products = Product::orderByDesc('id')
                ->skip(($pageIndex-1)*$perPage)
                ->take($perPage)
                ->get();  
        // dd($arr);
        return view('layout_manage_product', compact( 'products', 'numberOfPage', 'pageIndex'));
    }
    public function store(Request $request){
        Product::create($request->all());
        return redirect()->route('products.index')->with('mes', 'Thêm thành công');
    }
    public function edit(Product $product, Request $request)
    {
        // pageIndex
        $pageIndex = 1;
        if($request->has('pageIndex')) $pageIndex = $request->input('pageIndex');
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
        if($request->has('pageIndex')) $pageIndex = $request->input('pageIndex');
        // echo $pageIndex;
        // update
        $product->update($request->all());
        return redirect()->route('products.index', ['pageIndex' => $pageIndex])->with('mes', 'Cập nhật thành công!');
    }
    public function destroy(Product $product, Request $request)
    {
        //
        $pageIndex = 1;
        if($request->has('pageIndex'))  $pageIndex = $request->input('pageIndex');
        $product->delete();
        return redirect()->route('products.index', ['pageIndex' => $pageIndex])->with('mes', 'Xóa thành công');
    }
}
