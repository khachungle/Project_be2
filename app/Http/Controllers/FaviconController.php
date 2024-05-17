<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FaviconController extends Controller
{
    public function showForm()
    {
        return view('admin.change_favicon');
    }

    public function saveFavicon(Request $request)
    {
        $request->validate([
            'favicon' => 'required|mimes:png|max:5120', // 5MB
        ]);

        if ($request->hasFile('favicon')) {
            $file = $request->file('favicon');
            $fileName = 'favicon.png';
            $filePath = public_path('img/' . $fileName);

            // Lưu favicon vào thư mục ảnh
            $file->move(public_path('img'), $fileName);

            return redirect()->route('favicon.form')->with('success', 'Đổi favicon thành công');
        }

        return redirect()->route('favicon.form')->with('error', 'Đổi favicon thất bại');
    }
}
