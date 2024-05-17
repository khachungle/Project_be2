@extends('layout_admin')
@section('content')
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <h3>Thêm sản phẩm mới</h3>
        <div class="form-group">
            <label for="TenSP">Tên sản phẩm</label>
            <input type="text" id="TenSP" name="TenSP" required>
        </div>
        <div class="form-group">
            <label for="MoTa">Mô tả sản phẩm</label>
            <textarea id="MoTa" name="MoTa" rows="4" required></textarea>
        </div>
        <div class="form-group">
            <label for="Gia">Giá sản phẩm</label>
            <input type="number" id="Gia" name="Gia" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="LoaiDanhMuc">Loại danh mục</label>
            <select id="LoaiDanhMuc" name="LoaiDanhMuc" required>
                <option value="">Chọn loại danh mục</option>
                @isset($categories)
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->TenDanhMuc }}</option>
                    @endforeach
                @endisset

            </select>
        </div>
        <div class="form-group">
            <label for="AnhMoTa">Ảnh mô tả sản phẩm</label>
            <input type="file" id="AnhMoTa" name="AnhMoTa" accept="image/*" required>
        </div>
        <button type="submit">Gửi</button>
    </form>
@endsection
