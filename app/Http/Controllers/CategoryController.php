<?php

namespace App\Http\Controllers;

use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect('login');
        }
      

        $categorys = Category::paginate(3); 

        // Trả về view 'products.index' với dữ liệu sản phẩm đã lấy được
        return view('layout_manage_category', compact('categorys'));
    }
    public function create()
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        return view('layout_add_category');
    }
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect('login');
        }
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
        if (!Auth::check()) {
            return redirect('login');
        }
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->back()->with('success', 'Danh mục đã được xóa thành công!');
    }
    public function edit($id)
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        $category = Category::findOrFail($id);
        return view('layout_edit_category', compact('category'));
    }

    public function update(Request $request, $id)
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        $request->validate([
            'TenDanhMuc' => 'required|string|max:255',
        ]);

        $category = Category::findOrFail($id);
        $category->TenDanhMuc = $request->input('TenDanhMuc');
        $category->save();

        return redirect()->back();
    }
}
