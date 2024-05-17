@extends('layout_admin')

<link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/styles.css') }}" rel="stylesheet">

@section('content')
    <!-- Nội dung của trang 'manage_about_us_information' -->
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Cập nhật thông tin "About Us"</div>

                    <div class="card-body">
                        <form action="{{ route('update_about_us') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="TieuDe">Tiêu đề:</label>
                                <input type="text" class="form-control" id="TieuDe" name="TieuDe" value="{{ $about ? $about->TieuDe : '' }}">
                            </div>
                            <div class="form-group">
                                <label for="NoiDung">Nội dung:</label>
                                <textarea class="form-control" id="NoiDung" name="NoiDung" rows="3">{{ $about ? $about->NoiDung : '' }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="MucTieu1">Tiêu chí 1:</label>
                                <input type="text" class="form-control" id="MucTieu1" name="MucTieu1" value="{{ $about ? $about->MucTieu1 : '' }}">
                            </div>
                            <div class="form-group">
                                <label for="MucTieu2">Tiêu chí 2:</label>
                                <input type="text" class="form-control" id="MucTieu2" name="MucTieu2" value="{{ $about ? $about->MucTieu2 : '' }}">
                            </div>
                            <div class="form-group">
                                <label for="MucTieu3">Tiêu chí 3:</label>
                                <input type="text" class="form-control" id="MucTieu3" name="MucTieu3" value="{{ $about ? $about->MucTieu3 : '' }}">
                            </div>
                            <div class="form-group">
                                <label for="AnhMoTa">Ảnh mô tả:</label>
                                <input type="file" class="form-control-file" id="AnhMoTa" name="AnhMoTa">
                            </div>
                            <button type="submit" class="btn btn-primary">{{ $about ? 'Cập nhật' : 'Tạo mới' }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
