@extends('layout_admin')

@section('content')
    <div class="container">
        @if(isset($order))
            <div class="mb-3">
                <h1>Thông tin khách hàng</h1>
                <p><strong>Tên:</strong> {{ $order->customer_name }}</p>
                <p><strong>Địa chỉ:</strong> {{ $order->customer_address }}</p>
                <p><strong>Số điện thoại:</strong> {{ $order->customer_phone }}</p>
                <p><strong>Email:</strong> {{ $order->customer_email }}</p>
            </div>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">ID sản phẩm</th>
                        <th scope="col">Đơn giá</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->orderItems as $item)
                        <tr>
                            <td>{{ $item->product_id }}</td>
                            <td>{{ number_format($item->price, 0, '.', '.') }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ number_format($item->price * $item->quantity, 0, '.', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="total-price text-right">
                <strong>Tổng tiền: {{ number_format($order->total_amount, 0, '.', '.') }}</strong>
            </div>
        @else
            <p class="text-center">Không tìm thấy đơn hàng.</p>
        @endif
    </div>
@endsection
