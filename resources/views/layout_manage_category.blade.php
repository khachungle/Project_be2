@extends('layout_admin')
@section('content')
    <div class="header-container">
        <h5 class="danhSach">Danh sách danh mục hiện có</h5>
        <button class="btn_add_category"><a href="{{ url('/layout_add_category') }}">Thêm Danh
                Mục</a></button>
    </div>

    <main class="login-form">
        <div class="container">
            <div class="row justify-content-center">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên danh mục</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categorys as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->TenDanhMuc }}</td>
                                <td><a href="{{ route('categories.edit', $item->id) }}">Sửa</a></td>
                                <td>
                                    <form action="/categories/{{ $item->id }}" method="POST">
                                        @csrf
                                        <button type="submit">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Delete Confirmation Modal -->

            <div style="text-align: center;" class="link"></div>
        </div>
    </main>
@endsection
