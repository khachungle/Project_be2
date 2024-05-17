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
                    <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                        @foreach ($categories as $category)
                            <li class="nav-item me-2">
                                <a class="btn btn-outline-primary border-2"
                                    href="{{ route('showByCategory', $category->id) }}">{{ $category->TenDanhMuc }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        <div id="cart-message"></div>
                        @foreach ($products as $item)
                            @csrf
                            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="product-item">
                                    <div class="position-relative bg-light overflow-hidden">
                                        <img class="img-fluid w-100" src="{{ asset("$item->AnhMoTa") }}" alt="">
                                    </div>
                                    <div class="text-center p-4">
                                        <a class="d-block h5 mb-2" href="">{{ $item->TenSp }}</a>
                                        <span class="text-primary me-1">{{ $item->Gia }}</span>
                                    </div>
                                    <div class="d-flex border-top">
                                        <small class="w-50 text-center border-end py-2">
                                            <a class="btn btn-success" href="{{ route('products.show', $item->id) }}"><i class="fa-regular fa-eye"></i></a>
                                        </small>
                                        <small class="w-50 text-center py-2">
                                            <button class="add-to-cart border-0 bg-white" data-id="{{ $item->id }}"><i
                                                    class="fa fa-shopping-bag text-primary me-2"></i>Add to Cart</button>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>

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
