<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request){
        $numberOfRecord = Category::count();
        $perPage = 8;
        $numberOfPage = $numberOfRecord % $perPage == 0?
             (int) ($numberOfRecord / $perPage): (int) ($numberOfRecord / $perPage) + 1;
        $pageIndex = 1;
        if($request->has('pageIndex'))
            $pageIndex = $request->input('pageIndex');
        if($pageIndex < 1) $pageIndex = 1;
        if($pageIndex > $numberOfPage) $pageIndex = $numberOfPage;
        //
        $categorys = Category::orderByDesc('id')
                ->skip(($pageIndex-1)*$perPage)
                ->take($perPage)
                ->get();  
        // dd($arr);
        return view('layout_manage_category', compact( 'categorys', 'numberOfPage', 'pageIndex'));
    }
    public function store(Request $request)
    {
        Category::create($request->all());
        return redirect()->route('categorys.index')->with('mes', 'Thêm thành công');
    }
}
