@extends('layout_admin')

<link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/styles.css') }}" rel="stylesheet">

@section('content')
<div class="form-register">
    <h2>Thêm mã giảm giá</h2>
    <form action="{{ route('admin.store_voucher') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="code" name="code" placeholder="Mã giảm giá" required>
        @if ($errors->has('code'))
            <span class="text-danger">{{ $errors->first('code') }}</span>
        @endif
        <input type="min_total_amount" name="min_total_amount" placeholder="Số tiền hóa đơn tối thiểu" required>
        @if ($errors->has('min_total_amount'))
            <span class="text-danger">{{ $errors->first('min_total_amount') }}</span>
        @endif
        <input type="max_usage" name="max_usage" placeholder="Số lần dùng tối đa" required>
        @if ($errors->has('max_usage'))
            <span class="text-danger">{{ $errors->first('max_usage') }}</span>
        @endif
        <input type="datetime-local" name="expires_at" placeholder="Hạn sử dụng" required>
        @if ($errors->has('expires_at'))
            <span class="text-danger">{{ $errors->first('expires_at') }}</span>
        @endif
        <input type="submit" value="Thêm">
    </form>
</div>
@endsection

@section('css')
    <style>
        .form-register {
            width: 400px;
            margin: 50px auto;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
        }
    </style>
@endsection