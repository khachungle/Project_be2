@extends('layout_admin')

@section('content')
    <h5 class="danhSach">Danh sách sản phẩm hiện có</h5>
    <button class="btn_add_product"><a href="{{ url('/layout_add_product') }}">Thêm Sản Phẩm</a></button>
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

                            <td><a href="{{ route('products.edit', $item->id) }}">Sửa</a></td>

                            <td>
                                <form action="/products/{{ $item->id }}" method="POST">
                                    @csrf
                                    <button type="submit">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div style="text-align: center;" class="link"></div>
        </div>
    </main>
@endsection('content')
