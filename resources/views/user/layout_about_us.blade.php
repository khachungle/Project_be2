@extends('layout_user')

@section('content')
    <div class="container mt-5">
        @isset($about)
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset($about->AnhMoTa) }}" alt="Ảnh mô tả" class="img-fluid w-100 h-auto mb-4">
                </div>
                <div class="col-md-6">
                    <div class="about-info">
                        <h2 class="mb-3">{{ $about->TieuDe }}</h2>
                        <p class="mb-3">{{ $about->NoiDung }}</p>
                        <ul class="list-unstyled">
                            <li>{{ $about->MucTieu1 }}</li>
                            <li>{{ $about->MucTieu2 }}</li>
                            <li>{{ $about->MucTieu3 }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        @endisset
    </div>
@endsection
