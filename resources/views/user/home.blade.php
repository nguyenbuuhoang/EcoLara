@include('user.layouts.header')
<!-- Navbar Start -->
<div class="container-fluid mb-5">
    <div class="row border-top px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100"
                data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                <h6 class="m-0">Categories</h6>
                <i class="fa fa-angle-down text-dark"></i>
            </a>
            <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0"
                id="navbar-vertical">
                <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                    @foreach ($categories as $category)
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link" data-toggle="dropdown">{{ $category->category_name }}<i
                                    class="fa fa-angle-down float-right mt-1"></i></a>
                            <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                                @foreach ($subcategories as $subcategory)
                                    @if ($subcategory->category_name == $category->category_name)
                                        <a href="{{ route('subcategory',[$subcategory->id,$subcategory->slug]) }}" class="dropdown-item">{{ $subcategory->subcategory_name }}</a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </nav>
        </div>
        <div class="col-lg-9">
            <div id="header-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($sliders as $key => $slider)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" style="height: 410px;">
                        <img class="img-fluid" src="{{ asset('uploads/' . $slider->image) }}" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h4 class="text-light text-uppercase font-weight-medium mb-3">{{ $slider->title }}</h4>
                                <h3 class="display-4 text-white font-weight-semi-bold mb-4">{{ $slider->description }}</h3>
                                <a href="{{ $slider->url }}" class="btn btn-light py-2 px-3">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                    <div class="btn btn-dark" style="width: 45px; height: 45px;">
                        <span class="carousel-control-prev-icon mb-n2"></span>
                    </div>
                </a>
                <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                    <div class="btn btn-dark" style="width: 45px; height: 45px;">
                        <span class="carousel-control-next-icon mb-n2"></span>
                    </div>
                </a>
            </div>

        </div>
    </div>
</div>
<!-- Navbar End -->
<!-- Featured Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5 pb-3">
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
            </div>
        </div>
    </div>
</div>
<!-- Featured End -->
<!-- Categories Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5 pb-3">
        @foreach ($categories as $category)
            <div class="col-lg-4 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 30px;">
                    <p class="text-right">{{ $category->subcategory_count }} Mục</p>
                    <p class="text-right">{{ $category->product_count }} Sản phẩm</p>
                    <a href="{{ route('category',[$category->id,$category->slug]) }}" class="cat-img position-relative overflow-hidden mb-3 d-flex justify-content-center align-items-center">
                        <img class="img-fluid" src="{{ asset('uploads/' . $category->category_img) }}" alt="" style="height: 250px;">
                    </a>
                    <h5 class="font-weight-semi-bold m-0">{{ $category->category_name }}</h5>
                </div>
            </div>
        @endforeach
    </div>
</div>
<!-- Categories End -->
<!-- Products Start -->
<div class="container-fluid pt-5">
    <div class="text-center mb-4">
        <h2 class="section-title px-5"><span class="px-2">Một số sản phẩm</span></h2>
    </div>
    <div class="row px-xl-5 pb-3">
        @foreach ($allproducts as $product)
            <div class="col-lg-3 col-md-6 col-sm-12 pb-3">
                <div class="card product-item border-0 mb-4">
                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                        <div class="img-container" style="height: 250px; display: flex; justify-content: center; align-items: center;">
                            <img class="img-fluid" style="max-height: 100%; max-width: 100%; object-fit: contain;" src="{{ asset('uploads/' . $product->product_img) }}" alt="">
                        </div>
                    </div>
                    <div class="card-body border-left border-right text-center p-0 pt-3 pb-2">
                        <h6 class="text-truncate mb-2">{{ $product->product_name }}</h6>
                        <div class="d-flex justify-content-center">
                            <h6>{{ number_format($product->price, 0, ',', '.') }} VNĐ</h6>
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
            </div>
        @endforeach
    </div>
</div>


<style>
    .img-container {
        width: 100%;
        text-align: center;
    }
</style>

<!-- Products End -->

@include('user.layouts.footer')
</body>

</html>
