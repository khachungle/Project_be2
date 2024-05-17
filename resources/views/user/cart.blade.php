@extends('layout_user')

@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="display-3 mb-3 animated slideInDown">Giỏ hàng</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-body" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-body" href="#">Cart</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <div class="container mt-5">
        <a href="" class="btn btn-success my-5">Tiếp tục mua hàng &#8592;</a>
        @if (session('success'))
            <div class="bg-success text-white">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="bg-danger text-white">{{ session('error') }}</div>
        @endif

        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Sản phẩm</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Đơn giá</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Thành tiền</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            @php
                $total = 0;
            @endphp
            <tbody>
                @foreach (session('cart', []) as $id => $item)
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        {{-- <td><img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" style="max-width: 100px;"></td> --}}
                        <td><img src="img/product-1.jpg" style="max-width: 100px;"></td>

                        <td>{{ number_format($item['price'], 0, '.', '.') }}</td>
                        <td class="w-25">
                            <form action="{{ route('cart.update', $id) }}" method="POST">
                                @csrf
                                <input type="number" class="form-control" name="quantity" value="{{ $item['quantity'] }}">
                                <button type="submit" class="btn btn-warning mt-2">Cập nhật số lượng</button>
                            </form>
                        </td>
                        <td>{{ number_format($item['quantity'] * $item['price'], 0, '.', '.') }}</td>
                        <td>
                            <form action="{{ route('cart.remove', $id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Xóa</button>
                            </form>
                        </td>
                    </tr>
                    @php
                        $total += $item['quantity'] * $item['price'];
                    @endphp
                @endforeach
            </tbody>
        </table>
        <div class="total-price text-center">
            <strong class="ps-5">Tổng tiền: {{ number_format($total, 0, '.', '.') }}</strong>
            <td class="text-right">
                <a href="{{ url('checkout') }}" class="btn btn-primary ms-5">Thanh toán &#8594;</a>
            </td>
        </div>
    </div>
@endsection
