@extends('layout_admin')

@section('content')
    <div class="container">
        <h1>Danh sách đơn hàng</h1>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Khách hàng</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Tổng tiền</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($orders) && $orders->count() > 0)
                    @foreach ($orders as $index => $order)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $order->customer_name }}</td>
                            <td>{{ $order->customer_phone }}</td>
                            <td>{{ $order->customer_address }}</td>
                            <td>{{ number_format($order->total_amount, 0, '.', '.') }}</td>
                            <td>
                                <a href="{{ route('admin.order.show', $order->id) }}" class="btn btn-primary btn-sm">Xem chi tiết</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6" class="text-center">Không có đơn hàng nào.</td>
                    </tr>
                @endif
                {{ $orders->links() }}
            </tbody>
        </table>
    </div>
@endsection
