<?php

namespace App\Http\Controllers;

use Hash;
use Session;
use Illuminate\Http\Request;
use App\Models\Voucher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class VoucherController extends Controller
{
    //
    public function VoucherIndex()
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        // Lấy danh sách với phân trang
        $vouchers = Voucher::paginate(3); // Số mã trên mỗi trang là 3
        return view('admin.layout_manage_voucher', ['vouchers' => $vouchers]);
    }

    public function VoucherDestroy($id)
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        $vouchers = Voucher::find($id);
        if(!$vouchers){
            return response()->back()->with(['message' => 'Mã không tồn tại'], 404);
        }
        $vouchers->delete();
        return redirect()->back()->with('success', 'Xóa thành công !');
    }

    public function VoucherCreate()
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        return view('admin.layout_add_voucher');
    }

    public function VoucherStore(Request $request)
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        // validate dữ liệu trước khi thực hiện thêm mã giảm giá
        $request->validate([
            'code' => 'required|regex:/^[0-9a-zA-Z]{6}$/|unique:vouchers,code',
            'min_total_amount' => 'required|numeric|min:50000',
            'max_usage' => 'required|integer|min:5|max:50',
            'expires_at' => 'required|date|after:now', // Kiểu dữ liệu timestamp, cần kiểm tra theo định dạng datetime
        ]);

        // Tạo mã mới và lưu mã
        $vouchers = new Voucher();

        $vouchers->code = $request->input('code');
        $vouchers->min_total_amount = $request->input('min_total_amount');
        $vouchers->max_usage = $request->input('max_usage');
        $vouchers->expires_at = $request->input('expires_at');
        $vouchers->usage_count = 0; // Đặt giá trị mặc định là 0 cho usage_count

        // luu vao database
        $vouchers->save();

        // Chuyen den trang chu
        return redirect()->back()->with('success', 'Voucher đã được tạo thành công!');
    }

    public function VoucherEdit(string $id)
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        $vouchers = Voucher::findOrFail($id);
        return view('admin.layout_edit_voucher', compact('vouchers'));
    }

    public function VoucherUpdate(Request $request, string $id)
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        $request->validate([
            'code' => 'required|regex:/^[0-9a-zA-Z]{6}$/|unique:vouchers,code,' . $id,
            'min_total_amount' => 'required|numeric|min:50000',
            'max_usage' => 'required|integer|min:5|max:50',
            'expires_at' => 'required|date|after:now', // Kiểu dữ liệu timestamp, cần kiểm tra theo định dạng datetime
            'usage_count' => 'required|integer|lte:max_usage', // Kiểm tra usage_count không được lớn hơn max_usage
        ]);
    
        $voucher = Voucher::findOrFail($id);
        $voucher->code = $request->code;
        $voucher->min_total_amount = $request->min_total_amount;
        $voucher->max_usage = $request->max_usage;
        $voucher->expires_at = $request->expires_at;
        $voucher->usage_count = $request->usage_count;
    
        // lưu vào database
        $voucher->save();
    
        return redirect()->route('admin.edit_voucher', $voucher->id)->with('success', 'Cập nhật thành công!');
    }
}
