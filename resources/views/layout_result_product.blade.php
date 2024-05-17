@extends('layout_user')
@section('css')

@endsection
@section('content')
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="display-3 mb-3 animated slideInDown">Products</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-body" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-body" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-dark active" aria-current="page">Products</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Product Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s"
                        style="max-width: 500px;">
                        <h1 class="display-5 mb-3">Danh sách sản phẩm</h1>
                    </div>
                </div>
                <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">

                </div>
            </div>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        @if ($products->isEmpty())
                            <p>No products found</p>
                        @else
                            @foreach ($products as $product)
                                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="product-item">
                                        <div class="position-relative bg-light overflow-hidden">
                                            <img class="img-fluid w-100" src="{{ $product->AnhMoTa }}"
                                                alt="{{ $product->TenSp }}">
                                        </div>

                                        <div class="text-center p-4">
                                            <a class="d-block h5 mb-2" href="">{{ $product->TenSp }}</a>
                                            <span class="text-primary me-1">${{ $product->Gia }}</span>
                                        </div>
                                        <div class="d-flex border-top">
                                            <small class="w-50 text-center border-end py-2">
                                                <a class="btn btn-success"
                                                    href="{{ route('products.show', $product->id) }}"><i
                                                        class="fa-regular fa-eye"></i></a>

                                            </small>
                                            <small class="w-50 text-center py-2">
                                                <a class="text-body" href=""><i
                                                        class="fa fa-shopping-bag text-primary me-2"></i>Add to
                                                    cart</a>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product End -->
@endsection
