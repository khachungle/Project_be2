@extends('layout_user')

@section('content')
    <!-- Banner Start -->
    <div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{ asset('img/banner.png') }}" alt="banner">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-lg-7">
                                    <h1 class="display-2 mb-5 animated slideInDown">Organic Food Is Good For Health</h1>
                                    <a href="" class="btn btn-primary rounded-pill py-sm-3 px-sm-5">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    @isset($about)
        <!-- About Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                        <div class="about-img position-relative overflow-hidden p-5 pe-0">
                            <img class="img-fluid w-100" src="{{ asset($about->AnhMoTa) }}">
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                        <h1 class="display-5 mb-4">{{ $about->TieuDe }}</h1>
                        <p class="mb-4">{{ $about->NoiDung }}</p>
                        <p><i class="fa fa-check text-primary me-3"></i>{{ $about->MucTieu1 }}</p>
                        <p><i class="fa fa-check text-primary me-3"></i>{{ $about->MucTieu2 }}</p>
                        <p><i class="fa fa-check text-primary me-3"></i>{{ $about->MucTieu3 }}</p>
                        <a class="btn btn-primary rounded-pill py-3 px-5 mt-3" href="{{ route('user.about_us') }}">Read More</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->
    @endisset


    <!-- Feature Start -->
    <div class="container-fluid bg-light bg-icon my-5 py-6">
        <div class="container">
            <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s"
                style="max-width: 500px;">
                <h1 class="display-5 mb-3">Our Features</h1>
                <p>Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="bg-white text-center h-100 p-4 p-xl-5">
                        <img class="img-fluid mb-4" src="img/icon-1.png" alt="">
                        <h4 class="mb-3">Natural Process</h4>
                        <p class="mb-4">Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed vero
                            dolor duo.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="bg-white text-center h-100 p-4 p-xl-5">
                        <img class="img-fluid mb-4" src="img/icon-2.png" alt="">
                        <h4 class="mb-3">Organic Products</h4>
                        <p class="mb-4">Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed vero
                            dolor duo.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="bg-white text-center h-100 p-4 p-xl-5">
                        <img class="img-fluid mb-4" src="img/icon-3.png" alt="">
                        <h4 class="mb-3">Biologically Safe</h4>
                        <p class="mb-4">Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed vero
                            dolor duo.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End -->


    <!-- Product Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s"
                        style="max-width: 500px;">
                        <h1 class="display-5 mb-3">Sản phẩm mới</h1>
                        <p>Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.
                        </p>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        @isset($products)
                            @foreach ($products as $product)
                                <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="product-item">
                                        <div class="position-relative bg-light overflow-hidden">
                                            <img class="img-fluid w-100" src="{{ asset($product->AnhMoTa) }}" alt="">
                                            <div
                                                class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                                New</div>
                                        </div>
                                        <div class="text-center p-4">
                                            <a class="d-block h5 mb-2" href="">{{ $product->TenSp }}</a>
                                            <span class="text-primary me-1">{{ $product->Gia }}</span>
                                        </div>
                                        <div class="d-flex border-top">
                                            <small class="w-50 text-center border-end py-2">
                                                <a class="btn btn-success" href="{{ route('products.show', $product->id) }}"><i
                                                        class="fa-regular fa-eye"></i></a>
                                            </small>
                                            <small class="w-50 text-center py-2">
                                                <button class="add-to-cart border-0 bg-white" data-id="{{ $product->id }}"><i
                                                        class="fa fa-shopping-bag text-primary me-2"></i>Add to Cart</button>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product End -->

    <!-- Testimonial Start -->
    <div class="container-fluid bg-light bg-icon py-6 mb-5">
        <div class="container">
            <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s"
                style="max-width: 500px;">
                <h1 class="display-5 mb-3">Customer Review</h1>
                <p>Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                <div class="testimonial-item position-relative bg-white p-5 mt-4">
                    <i class="fa fa-quote-left fa-3x text-primary position-absolute top-0 start-0 mt-n4 ms-5"></i>
                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos.
                        Clita erat ipsum et lorem et sit.</p>
                    <div class="d-flex align-items-center">
                        <img class="flex-shrink-0 rounded-circle" src="img/testimonial-1.jpg" alt="">
                        <div class="ms-3">
                            <h5 class="mb-1">Client Name</h5>
                            <span>Profession</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item position-relative bg-white p-5 mt-4">
                    <i class="fa fa-quote-left fa-3x text-primary position-absolute top-0 start-0 mt-n4 ms-5"></i>
                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos.
                        Clita erat ipsum et lorem et sit.</p>
                    <div class="d-flex align-items-center">
                        <img class="flex-shrink-0 rounded-circle" src="img/testimonial-2.jpg" alt="">
                        <div class="ms-3">
                            <h5 class="mb-1">Client Name</h5>
                            <span>Profession</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item position-relative bg-white p-5 mt-4">
                    <i class="fa fa-quote-left fa-3x text-primary position-absolute top-0 start-0 mt-n4 ms-5"></i>
                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos.
                        Clita erat ipsum et lorem et sit.</p>
                    <div class="d-flex align-items-center">
                        <img class="flex-shrink-0 rounded-circle" src="img/testimonial-3.jpg" alt="">
                        <div class="ms-3">
                            <h5 class="mb-1">Client Name</h5>
                            <span>Profession</span>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item position-relative bg-white p-5 mt-4">
                    <i class="fa fa-quote-left fa-3x text-primary position-absolute top-0 start-0 mt-n4 ms-5"></i>
                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos.
                        Clita erat ipsum et lorem et sit.</p>
                    <div class="d-flex align-items-center">
                        <img class="flex-shrink-0 rounded-circle" src="img/testimonial-4.jpg" alt="">
                        <div class="ms-3">
                            <h5 class="mb-1">Client Name</h5>
                            <span>Profession</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('.add-to-cart').on('click', function() {
                var productId = $(this).data('id');

                $.ajax({
                    url: '{{ route('cart.add', '') }}/' + productId,
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.success) {
                            // Cập nhật số lượng sản phẩm trong biểu tượng giỏ hàng
                            $('.fa-shopping-bag').text(response.cartItemCount);
                            alert('Đã thêm sản phẩm vào giỏ hàng thành công');
                        }
                    },
                    error: function(response) {
                        if (response.error) {
                            alert(response.error);
                        }
                    }
                });
            });
        });
    </script>
@endsection
