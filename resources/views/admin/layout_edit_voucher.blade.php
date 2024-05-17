@extends('layout_admin')

<link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/styles.css') }}" rel="stylesheet">

@section('content')

<div class="form-update">
    <h2>Update</h2>
    <form id="form-update" action="{{ route('admin.update_voucher', $vouchers->id) }}" method="post" enctype="multipart/form-data">
        
        @csrf
        @method('PUT')
        <label for="code">Mã voucher:</label>
        <input type="text" id="code" name="code" value="{{ $vouchers->code }}" required><br>

        <label for="min_total_amount">GT hóa đơn tối thiểu:</label>
        <input type="number" id="min_total_amount" name="min_total_amount" value="{{ $vouchers->min_total_amount }}" required><br>

        <label for="max_usage">Số lần sử dụng tối đa:</label>
        <input type="number" id="max_usage" name="max_usage" value="{{ $vouchers->max_usage }}" required><br>

        <label for="expires_at">Ngày hết hạn:</label>
        <input type="date" id="expires_at" name="expires_at" value="{{ $vouchers->expires_at }}" required><br>

        <label for="usage_count">Số lần sử dụng:</label>
        <input type="number" id="usage_count" name="usage_count" value="{{ $vouchers->usage_count }}" required><br>

        <input type="submit" value="Cập Nhật">

        <br>
    </form>
</div>

<style>
    /* Paste your CSS styles here */
    .form-update {
        margin: 20px;
        max-width: 600px; /* Giới hạn chiều rộng của biểu mẫu */
    }
    
    .form-update h2 {
        font-size: 24px;
        margin-bottom: 20px; /* Tăng khoảng cách dưới tiêu đề */
    }
    
    .form-update label {
        display: block; /* Hiển thị các nhãn theo dạng block */
        font-weight: bold;
        margin-bottom: 8px; /* Khoảng cách dưới của nhãn */
    }
    
    .form-update input[type="text"],
    .form-update input[type="number"],
    .form-update input[type="date"] {
        width: calc(100% - 20px); /* Độ rộng của input */
        padding: 10px; /* Khoảng cách nội dung bên trong input */
        margin-bottom: 15px; /* Khoảng cách giữa các input */
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    
    .form-update input[type="submit"] {
        background-color: #007bff; /* Màu nút */
        color: #fff; /* Màu chữ */
        padding: 10px 20px; /* Kích thước nút */
        border: none; /* Loại bỏ đường viền */
        border-radius: 4px; /* Bo tròn các góc */
        cursor: pointer;
    }
    
    .form-update input[type="submit"]:hover {
        background-color: #0056b3; /* Màu nút khi di chuột qua */
    }
    </style>
@endsection
