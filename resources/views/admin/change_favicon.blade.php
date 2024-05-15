@extends('layout_admin')

@section('css')
    <link rel="stylesheet" href="css/change_favicon.css">
@endsection

@section('content')
    <div class="container">
        <h1>Đổi Favicon</h1>
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

        <form action="{{ route('favicon.save') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="favicon">Yêu cầu định dạng .png và dung lượng dưới 5MB</label>
                <input type="file" class="form-control" name="favicon" id="favicon" accept=".png" required
                    onchange="previewFavicon(event)">
                <img class="mt-3" id="faviconPreview" alt="Favicon Preview">
            </div>
            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    </div>
@endsection

@section('js')
    <script src="/js/change_favicon.js"></script>
@endsection
