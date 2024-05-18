@extends('layout_admin')
@section('css')
<style>
     form {
            max-width: 600px;
            margin: 0 auto;
            padding: 10px;
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
            margin: 25px;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
         
        }

        .btn_add_product a {
            color: white;
            text-decoration: none;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 70px;
        }

        table thead th {
            border: 1px solid #000;
            text-align: center;
            padding: 8px;
        }

        table tbody th,
        table tbody td {
            border-left: 1px solid #000;
            border-right: 1px solid #000;
            border-bottom: 1px solid #000;
            text-align: center;
            padding: 8px;
        }

        table tbody th:last-child,
        table tbody td:last-child {
            border-right: 1px solid #000;
        }

        table tbody tr th a {
            text-decoration: none;
            color: black;
        }

        .link {
            text-align: center;
            position: absolute;
            left: 45%;
        }

        h5 {
            text-align: center;
            color: red;
        }
</style>
@endsection
@section('content')
<div class="header-container">
    <h5 class="danhSach">Danh sách sản phẩm hiện có</h5>
    <button class="btn_add_product"><a href="{{ url('/layout_add_product') }}">Thêm Sản Phẩm</a></button>
</div>
    <main class="login-form">
        <div class="container">

            <div class="row justify-content-center">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Mô Tả</th>
                            <th>Giá</th>
                            <th>Loại Danh Mục</th>
                            <th>Ảnh</th>
                            <th></th>
                            <th></th>
                            <th></th>

                        </tr>
                    </thead>
                    @foreach ($products as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->TenSp }}</td>
                            <!-- Giả sử category được lưu trong cột category -->
                            <td>{{ $item->MoTa }}</td> <!-- Tên sản phẩm -->
                            <td>{{ $item->Gia }}</td> <!-- Giá -->
                            <td>
                                @foreach ($categories as $category)
                                    @if ($category->id == $item->LoaiDanhMuc)
                                        {{ $category->TenDanhMuc }}
                                    @endif
                                @endforeach
                            </td> <!-- Giá -->
                            <td><img src="{{ $item->AnhMoTa }}" alt="Product Image" style="width: 100px;">
                            </td> <!-- Ảnh sản phẩm -->
                            <!-- Các nút thao tác -->
                            <td>
                                <a class="btn btn-success" href="{{ route('products.show', $item->id) }}"><i
                                        class="fa-regular fa-eye"></i></a>
                            </td>

                            <td><a class="btn btn-danger" href="{{ route('products.edit', $item->id) }}">Sửa <i class="fa-regular fa-pen-to-square"></i></a></td>

                            <td>
                                <form action="/products/{{ $item->id }}" method="POST">
                                    @csrf
                                    <button  type="submit">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div style="text-align: center;" class="link"></div>
        </div>
    </main>
    <div class="d-flex justify-content-center">
        {{ $products->links() }}
    </div>
@endsection('content')
