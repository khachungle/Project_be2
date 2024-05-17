@extends('layout_admin')
@section('content')
    <form action="{{ url('/categories') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <h3>Thêm danh mục mới</h3>
        <div class="form-group">
            <label for="TenDanhMuc">Tên danh mục</label>
            <input type="text" id="TenDanhMuc" name="TenDanhMuc" required>
        </div>
        <button type="submit">Gửi</button>
    </form>
@endsection
