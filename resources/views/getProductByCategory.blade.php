@foreach($products as $product)
    <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
        <div class="product-item">
            <div class="position-relative bg-light overflow-hidden">
                <img class="img-fluid w-100" src="{{ asset($product->AnhMoTa) }}" alt="{{ $product->TenSp }}">
            </div>
            <div class="text-center p-4">
                <span class="text-primary me-1">Tên: {{ $product->TenSp }}</span><br>
                <span class="text-primary me-1">Giá: {{ $product->Gia }}</span><br>
                <span class="text-primary me-1">Mô tả: {{ $product->MoTa }}</span>
            </div>
            <div class="d-flex border-top">
                <small class="w-50 text-center border-end py-2">
                <a class="btn btn-success" href="{{ route('products.show', $product->id) }}"><i class="fa-regular fa-eye"></>View</a>

                </small>
                <small class="w-50 text-center py-2">
                    <a class="text-body" href=""><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                </small>
            </div>
        </div>
    </div>
@endforeach
