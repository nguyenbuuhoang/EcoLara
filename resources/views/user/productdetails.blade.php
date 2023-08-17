@include('user.layouts.header')
<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 200px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Shop Detail</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Shop Detail</p>
        </div>
    </div>
</div>
<!-- Page Header End -->

<!-- Shop Detail Start -->
<div class="container-fluid py-4">
    <div class="row px-xl-5">
        <div class="col-lg-5 pb-4">
            <div id="product-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner border">
                    <div class="carousel-item active">
                        <img class="d-block w-100" style="max-height: 400px; object-fit: contain;" src="{{ asset('uploads/' . $product->product_img) }}" alt="Dress Shirt">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-7 pb-4">
            <h3 class="font-weight-semi-bold">{{ $product->product_name }}</h3>
            <h3 class="font-weight-semi-bold mb-3">{{ $product->price }} VNĐ</h3>
            <p class="mb-3">{{ $product->product_long_des }}</p>
            <p class="mb-3">Số lượng còn: {{ $product->quantity }} sản phẩm</p>
            <form action="{{ route('addproducttocart', $product->id) }}" method="post" class="d-flex align-items-center mb-3 pt-2">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="hidden" name="price" value="{{ $product->price }}">

                <div class="input-group quantity mr-2" style="width: 100px;">
                    <input class="form-control bg-secondary text-center" type="number" min="1" value="1" name="quantity">
                </div>
                <button class="btn btn-warning px-3" type="submit">
                    <i class="fa fa-shopping-cart mr-1"></i> Add To Cart
                </button>
            </form>
        </div>
    </div>
</div>
<!-- Shop Detail End -->

<!-- Products Start -->
<div class="container-fluid py-4">
    <div class="text-center mb-3">
        <h2 class="section-title px-4"><span class="px-2">Bạn cũng có thể thích</span></h2>
    </div>
    <div class="row px-xl-4">
        <div class="col">
            <div class="owl-carousel related-carousel">
                @foreach ($related_products as $product)
                <div class="card product-item border-0 p-2">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <img class="img-fluid w-100" style="max-height: 250px; object-fit: contain;" src="{{ asset('uploads/' . $product->product_img) }}" alt="">
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-3 pb-2">
                        <h6 class="text-truncate mb-2">{{ $product->product_name }}</h6>
                        <div class="d-flex justify-content-center">
                            <h6>{{ $product->price }}</h6>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="{{ route('productdetails', [$product->id, $product->slug]) }}" class="btn btn-sm text-dark p-0">
                            <i class="fas fa-eye text-primary mr-1"></i>Xem Chi Tiết
                        </a>
                        <form action="{{ route('addproducttocart', $product->id) }}" method="POST" class="m-0">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="price" value="{{ $product->price }}">
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit" class="btn btn-sm text-dark p-0">
                                <i class="fas fa-shopping-cart text-primary mr-1"></i>Mua Ngay
                            </button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- Products End -->

@include('user.layouts.footer')
