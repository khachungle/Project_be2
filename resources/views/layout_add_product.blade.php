@extends('layout_admin')
@section('css')
<style>
      form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f9f9f9;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        textarea,
        input[type="number"],
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="file"] {
            border: none;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .danhSach{
        text-align: center;
        margin-bottom: 20px ;
    }
   table thead tr th{
        border: 1px solid #000;
        text-align: center;
    }
    table tbody tr th {
        border-left: 1px solid #000;
        border-right: 1px solid #000;
        font-weight: normal;
        
    }
    table {
        border: 1px solid #000;
        margin-bottom: 70px ;
    }
    table tbody tr th a{
        text-decoration: none;
         color: black;
       
    }
    .link {
        text-align: center;
        position: absolute;
        /* top: 150%; */
        left: 45%;

    }
    h3{
        text-align: center;
        color: red;
    }
</style>
@endsection
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
