<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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

        .danhSach {
            text-align: center;
            margin-bottom: 20px;
        }

        table thead tr th {
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
            margin-bottom: 70px;
        }

        table tbody tr th a {
            text-decoration: none;
            color: black;

        }

        .link {
            text-align: center;
            position: absolute;
            /* top: 150%; */
            left: 45%;

        }

        h3 {
            text-align: center;
            color: red;
        }
    </style>
</head>

<body>
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- Thêm dòng này để Laravel biết đây là phương thức PUT -->
        <h3>Sửa sản phẩm</h3>
        <div class="form-group">
            <label for="TenSP">Tên sản phẩm</label>
            <input type="text" id="TenSP" name="TenSP" value="{{ $product->TenSp }}" required>
        </div>
        <div class="form-group">
            <label for="MoTa">Mô tả sản phẩm</label>
            <textarea id="MoTa" name="MoTa" rows="4" required value="{{ $product->MoTa }}">{{ $product->MoTa }}</textarea>
        </div>
        <div class="form-group">
            <label for="Gia">Giá sản phẩm</label>
            <input type="number" id="Gia" name="Gia" step="0.01" value="{{ $product->Gia }}" required>
        </div>
        <div class="form-group">
            <label for="LoaiDanhMuc">Loại danh mục</label>
            <select id="LoaiDanhMuc" name="LoaiDanhMuc" required>
                <option value="">Chọn loại danh mục</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->TenDanhMuc }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="product-image">Ảnh mô tả sản phẩm</label>
            <input type="file" id="product-image" name="product-image" accept="image/*" required>
        </div>
        <button type="submit">Gửi</button>
    </form>

</body>

</html>
