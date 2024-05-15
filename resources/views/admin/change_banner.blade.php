@extends('layout_admin')

@section('css')
    <link rel="stylesheet" href="css/change_banner.css">
@endsection

@section('content')
    <div class="container">
        <h1>Đổi Banner</h1>
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

        <form action="{{ route('banner.save') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="banner">Yêu cầu định dạng .png và dung lượng dưới 5MB. Ưu tiên ảnh có tỉ lệ 9:16 để hiển thị tốt nhất</label>
                <input type="file" class="form-control" name="banner" id="banner" accept=".png" required
                    onchange="previewBanner(event)">
                    <div class="preview">
                        <img class="mt-3 w-50" id="bannerPreview" alt="Banner Preview">
                    </div>
            </div>
            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    </div>
@endsection

@section('js')
    <script src="/js/change_banner.js"></script>
@endsection
