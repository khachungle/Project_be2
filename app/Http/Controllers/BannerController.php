<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
    public function showForm()
    {
        return view('admin.change_banner');
    }

    public function saveBanner(Request $request)
    {
        $request->validate([
            'banner' => 'required|mimes:png|max:5120', // 5MB
        ]);

        if ($request->hasFile('banner')) {
            $file = $request->file('banner');
            $fileName = 'banner.png';
            $filePath = public_path('img/' . $fileName);

            // Lưu banner vào thư mục ảnh
            $file->move(public_path('img'), $fileName);

            return redirect()->route('banner.form')->with('success', 'Đổi banner thành công');
        }

        return redirect()->route('banner.form')->with('error', 'Đổi banner thất bại');
    }
}
