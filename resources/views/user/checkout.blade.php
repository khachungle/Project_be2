@extends('layout_user')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Thanh toán</h2>
        <div class="row">
            <div class="col-12 col-md-6">
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Sản phẩm</th>
                            <th scope="col">Đơn giá</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Thành tiền</th>
                        </tr>
                    </thead>
                    @php
                        $total = 0;
                    @endphp
                    <tbody>
                        @foreach (session('cart', []) as $id => $item)
                            <tr>
                                <td>{{ $item['name'] }}</td>
                                <td>{{ number_format($item['price'], 0, '.', '.') }}</td>
                                <td>{{ $item['quantity'] }}</td>
                                <td>{{ number_format($item['quantity'] * $item['price'], 0, '.', '.') }}</td>
                            </tr>
                            @php
                                $total += $item['quantity'] * $item['price'];
                            @endphp
                        @endforeach
                    </tbody>
                </table>
                <div class="total-price text-center">
                    <strong class="ps-5">Tổng tiền: {{ number_format($total, 0, '.', '.') }} VND</strong>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <form action="{{ route('checkout.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Họ và tên</label>
                        <input type="text" class="form-control" id="name" name="customer_name" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Địa chỉ</label>
                        <input type="text" class="form-control" id="address" name="customer_address" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Số điện thoại</label>
                        <input type="text" class="form-control" id="phone" name="customer_phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="customer_email" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Đặt hàng</button>
                </form>
            </div>
        </div>
    </div>
@endsection
