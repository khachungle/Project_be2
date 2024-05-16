<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request){
        $categorys = Category::paginate(8); // Số người dùng trên mỗi trang là 3
        // Trả về view 'user.list' và truyền biến $users vào view
        return view('layout_manage_category', compact('categorys'));
    }
    public function store(Request $request)
    {
        Category::create($request->all());
        return redirect()->route('categorys.index')->with('mes', 'Thêm thành công');
    }
}
