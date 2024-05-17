<?php

namespace App\Http\Controllers;
use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categorys = Category::all(); // Lấy tất cả sản phẩm từ cơ sở dữ liệu

        // Đây là số trang hiện tại, nếu bạn cần phân trang
        $pageIndex = 1;

        // Số lượng trang (nếu bạn sử dụng phân trang)
        $numberOfPage = 1;

        // Trả về view 'products.index' với dữ liệu sản phẩm đã lấy được
        return view('layout_manage_category', compact('categorys', 'pageIndex', 'numberOfPage'));
    }
    public function create()
    {
        return view('layout_add_category');
    }
    public function store(Request $request)
    {
        $request->validate([
            'TenDanhMuc' => 'required|string|max:255|unique:categories,TenDanhMuc',
        ]);

        $category = new Category();
        $category->TenDanhMuc = $request->input('TenDanhMuc');
        $category->save();

        return redirect()->back()->with('success', 'Category added successfully!');
    }
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->back()->with('success', 'Danh mục đã được xóa thành công!');
    }
    public function edit($id)
{
    $category = Category::findOrFail($id);
    return view('layout_edit_category', compact('category'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'TenDanhMuc' => 'required|string|max:255',
    ]);

    $category = Category::findOrFail($id);
    $category->TenDanhMuc = $request->input('TenDanhMuc');
    $category->save();

    return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
}
}