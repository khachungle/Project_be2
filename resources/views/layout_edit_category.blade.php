@extends('layout_admin')
@section('content')
    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Thêm dòng này để Laravel biết đây là phương thức PUT -->
        <h3>Sửa danh mục</h3>
        <div class="form-group">
            <label for="TenDanhMuc">Tên danh mục</label>
            <input type="text" id="TenDanhMuc" name="TenDanhMuc" value="{{ $category->TenDanhMuc }}" required>
        </div>
        <button type="submit">Gửi</button>
    </form>
@endsection
