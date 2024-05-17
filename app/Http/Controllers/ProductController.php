<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    //

    public function index()
    {
        $products = Product::all(); // Lấy tất cả sản phẩm từ cơ sở dữ liệu
        $categories = Category::all();
        // Đây là số trang hiện tại, nếu bạn cần phân trang
        $pageIndex = 1;

        // Số lượng trang (nếu bạn sử dụng phân trang)
        $numberOfPage = 1;

        // Trả về view 'products.index' với dữ liệu sản phẩm đã lấy được
        return view('layout_manage_product', compact('products', 'categories', 'pageIndex', 'numberOfPage'));
    }
    public function create1()
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        $categories = Category::all();
        return view('layout_add_product', compact('categories'));
    }
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        // Validate dữ liệu
        $validatedData = $request->validate([
            'TenSP' => 'required',
            'MoTa' => 'required',
            'Gia' => 'required|numeric',
            'LoaiDanhMuc' => 'required|exists:categories,id',
            'AnhMoTa' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Xử lý lưu sản phẩm vào cơ sở dữ liệu
        $product = new Product;
        $product->TenSP = $request->input('TenSP');
        $product->MoTa = $request->input('MoTa');
        $product->Gia = $request->input('Gia');
        $product->LoaiDanhMuc = $request->input('LoaiDanhMuc');

        // Lưu ảnh vào thư mục lưu trữ và cập nhật đường dẫn vào cơ sở dữ liệu
        if ($request->hasFile('AnhMoTa')) {
            $image = $request->file('AnhMoTa');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $product->AnhMoTa = 'images/' . $imageName;
        }

        $product->save();

        return redirect()->route('products.index')->with('success', 'Sản phẩm đã được thêm thành công!');
    }
    public function destroy($id)
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        $product = Product::find($id);

        if ($product) {
            $product->delete();
            return redirect()->route('products.index')->with('success', 'Đã xoá sản phẩm thành công.');
        } else {
            return redirect()->route('products.index')->with('error', 'Không tìm thấy sản phẩm để xoá.');
        }
    }
    public function edit1($id)
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        // Lấy thông tin sản phẩm cần sửa
        $product = Product::findOrFail($id);

        // Lấy danh sách các danh mục
        $categories = Category::all();

        // Trả về view để hiển thị form sửa sản phẩm
        return view('layout_edit_product', compact('product', 'categories'));
    }
    public function update1(Request $request, $id)
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        // Kiểm tra dữ liệu được gửi từ form
        $validatedData = $request->validate([
            'TenSP' => 'required|max:255',
            'MoTa' => 'required',
            'Gia' => 'required|numeric|min:0',
            'LoaiDanhMuc' => 'required',
            'product-image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Kiểm tra ảnh
        ]);

        // Lấy thông tin sản phẩm cần sửa
        $product = Product::findOrFail($id);

        // Cập nhật thông tin sản phẩm
        $product->TenSP = $request->input('TenSP');
        $product->MoTa = $request->input('MoTa');
        $product->Gia = $request->input('Gia');
        $product->LoaiDanhMuc = $request->input('LoaiDanhMuc');

        // Xử lý ảnh sản phẩm
        if ($request->hasFile('AnhMoTa')) {
            $image = $request->file('AnhMoTa');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $product->AnhMoTa = 'images/' . $imageName;
        }

        // Lưu thông tin sản phẩm đã sửa vào cơ sở dữ liệu
        $product->save();

        // Chuyển hướng về trang danh sách sản phẩm sau khi sửa thành công
        return redirect()->route('products.index')->with('success', '123 updated successfully!');
    }
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('layout_show_product', compact('product', 'categories'));
    }


    public function indexProduct()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('layout_product', compact('categories', 'products'));
    }
    public function showByCategory($id)
    {
        // Lấy danh mục theo ID
        $category = Category::find($id);


        // Lấy các sản phẩm thuộc danh mục bằng trường LoaiDanhMuc
        $products = Product::where('LoaiDanhMuc', $id)->get();

        // Trả về view với dữ liệu sản phẩm
        return view('getProductByCategory', compact('category', 'products'));
    }
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        // Thực hiện tìm kiếm sản phẩm dựa trên từ khóa
        $products = Product::where('TenSp', 'like', '%' . $keyword . '%')
            ->orWhere('MoTa', 'like', '%' . $keyword . '%')
            ->get();
        return view('layout_result_product', ['products' => $products]);
    }

    public function home()
    {
        $products = Product::orderBy('created_at', 'desc') // Sắp xếp theo thời gian tạo mới nhất
            ->take(8) // Giới hạn kết quả trả về cho 8 sản phẩm đầu tiên
            ->get();

        $about = About::first();

        return view('user.home', compact('products', 'about'));
    }
}
