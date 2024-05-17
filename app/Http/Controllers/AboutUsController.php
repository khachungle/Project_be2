<?php

namespace App\Http\Controllers;

use Hash;
use Session;
use Illuminate\Http\Request;
use App\Models\About;
use Illuminate\Support\Facades\File;

class AboutUsController extends Controller
{
    // Phương thức để hiển thị form chỉnh sửa hoặc tạo mới thông tin "About Us"
    public function editOrCreate()
    {
        // Kiểm tra xem có thông tin "About Us" nào tồn tại trong cơ sở dữ liệu không
        $about = About::first();

        // Trả về view để chỉnh sửa hoặc tạo mới thông tin "About Us" và truyền dữ liệu "about" vào view
        return view('admin.layout_manage_about_us_information', compact('about'));
    }

    // Phương thức để cập nhật thông tin "About Us" vào cơ sở dữ liệu
    public function update(Request $request)
    {
        // Kiểm tra xem có thông tin "About Us" nào tồn tại trong cơ sở dữ liệu không
        $about = About::firstOrNew();
    
            // Khởi tạo giá trị mặc định cho biến $imagePath
        //$imagePath = $about->AnhMoTa;

        // Cập nhật thông tin "About Us" từ dữ liệu form gửi lên
        $about->TieuDe = $request->input('TieuDe');
        $about->NoiDung = $request->input('NoiDung');
        $about->MucTieu1 = $request->input('MucTieu1');
        $about->MucTieu2 = $request->input('MucTieu2');
        $about->MucTieu3 = $request->input('MucTieu3');
    
        // Xử lý ảnh mô tả
        if ($request->hasFile('AnhMoTa')) {
            $image = $request->file('AnhMoTa');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $imagePath = 'images/' . $imageName;
        } else {
            $imagePath = null;
        }
        $about->AnhMoTa = $imagePath; // Gán đường dẫn của ảnh

        // Lưu hoặc cập nhật bản ghi
        $about->save();

        // Chuyển hướng hoặc trả về thông báo thành công

        return redirect()->back()->with('success', 'Cập nhật thông tin thành công');
    }

    public function showAboutUs()
    {
        // Lấy thông tin "About Us" đầu tiên từ cơ sở dữ liệu
        $about = About::first();

        // Kiểm tra xem có dữ liệu hay không
        if (!$about) {
            return redirect()->back()->with('error', 'Thông tin About Us chưa được thiết lập.');
        }

        // Truyền biến $about đến view
        return view('user.layout_about_us', compact('about'));
    }
    
}
