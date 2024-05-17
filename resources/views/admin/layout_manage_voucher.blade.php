@extends('layout_admin')

<link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/styles.css') }}" rel="stylesheet">

@section('css')
    <style>
.table-responsive {
    margin-top: 20px;
}

.table {
    width: 100%;
    margin-bottom: 1rem;
    color: #212529;
}

.table th,
.table td {
    padding: 0.75rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
}

.table thead th {
    vertical-align: bottom;
    border-bottom: 2px solid #dee2e6;
}

.table tbody + tbody {
    border-top: 2px solid #dee2e6;
}

.table-striped tbody tr:nth-of-type(odd) {
    background-color: rgba(0, 0, 0, 0.05);
}

.table-hover tbody tr:hover {
    background-color: rgba(0, 0, 0, 0.075);
}

.table-bordered {
    border: 1px solid #dee2e6;
}

.table-bordered th,
.table-bordered td {
    border: 1px solid #dee2e6;
}

.table-bordered thead th,
.table-bordered thead td {
    border-bottom-width: 2px;
}

.thead-dark th {
    color: #fff;
    background-color: #343a40;
    border-color: #454d55;
}

.pagination {
    display: flex;
    padding-left: 0;
    list-style: none;
    border-radius: 0.25rem;
}

.pagination li {
    margin: 0 5px;
}

.pagination .page-link {
    position: relative;
    display: block;
    padding: 0.5rem 0.75rem;
    margin-left: -1px;
    line-height: 1.25;
    color: #007bff;
    background-color: #fff;
    border: 1px solid #dee2e6;
}

.pagination .page-link:hover {
    z-index: 2;
    color: #0056b3;
    text-decoration: none;
    background-color: #e9ecef;
    border-color: #dee2e6;
}

.action-btn {
    margin-right: 5px;
}

    </style>
@endsection

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Danh sách mã giảm giá</h2>
        <a href="{{ route('admin.add_voucher') }}" class="btn btn-success">Thêm mã giảm giá</a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Mã voucher</th>
                    <th>GT hóa đơn tối thiểu</th>
                    <th>Số lần sử dụng tối đa</th>
                    <th>Số lần sử dụng đã dùng</th>
                    <th>Ngày hết hạn</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vouchers as $voucher)
                    <tr>
                        <td>{{ $voucher->code }}</td>
                        <td>{{ $voucher->min_total_amount }}</td>
                        <td>{{ $voucher->max_usage }}</td>
                        <td>{{ $voucher->usage_count }}</td>
                        <td>{{ $voucher->expires_at }}</td>
                        <td>
                            <a href="{{ route('admin.edit_voucher', ['id' => $voucher->id]) }}" class="btn btn-primary btn-sm action-btn edit">Edit</a>
                            <form id="delete-form" action="{{ route('admin.destroy_voucher', ['id' => $voucher->id]) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm action-btn delete" type="submit" onclick="return confirm('Bạn có chắc chắn muốn xoá mã này không?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination justify-content-center">
            {{ $vouchers->links() }}
        </div>
    </div>
</div>
@endsection