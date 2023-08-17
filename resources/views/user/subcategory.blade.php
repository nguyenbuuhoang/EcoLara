@include('user.layouts.header')
<!-- Page Header Start -->
<div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">{{ $subcategory->subcategory_name }}</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Subcategory</p>
        </div>
    </div>
</div>
<!-- Page Header End -->
<!-- Shop Start -->
<div class="container-fluid ">
    <div class="row px-xl-5">
        <!-- Shop Sidebar Start -->
        <div class="col-lg-3 col-md-12">
            <div class="border-bottom mb-4 pb-4">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100"
                    data-toggle="collapse" href="#navbar-vertical"
                    style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0">Chọn sản phẩm</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0"
                    id="navbar-vertical">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 410px">
                        @foreach ($categories as $category)
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link"
                                    data-toggle="dropdown">{{ $category->category_name }}<i
                                        class="fa fa-angle-down float-right mt-1"></i></a>
                                <div class="dropdown-menu position-absolute bg-secondary border-0 rounded-0 w-100 m-0">
                                    @foreach ($subcategories as $subcategory)
                                        @if ($subcategory->category_name == $category->category_name)
                                            <a href="{{ route('subcategory',[$subcategory->id,$subcategory->slug]) }}"
                                                class="dropdown-item">{{ $subcategory->subcategory_name }}</a>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </nav>
            </div>
        </div>
        <!-- Shop Sidebar End -->
        <!-- Shop Product Start -->
        <div class="col-lg-9 col-md-12">
            <div class="row pb-3">
                <div class="col-12 pb-1">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <form action="">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search by name">
                                <div class="input-group-append">
                                    <span class="input-group-text bg-transparent text-primary">
                                        <i class="fa fa-search"></i>
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="category-section">
                    <div class="row">
                        @foreach ($products as $product)
                            <div class="col-lg-3 col-md-4 col-sm-6 pb-3">
                                <div class="card product-item border-0 mb-4">
                                    <div
                                        class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                        <div class="img-container"
                                            style="height: 250px; display: flex; justify-content: center; align-items: center;">
                                            <img class="img-fluid" src="{{ asset('uploads/' . $product->product_img) }}" alt="">
                                        </div>
                                    </div>
                                    <div class="card-body border-left border-right text-center p-0 pt-3 pb-2">
                                        <h6 class="text-truncate mb-2">{{ $product->product_name }}</h6>
                                        <div class="d-flex justify-content-center">
                                            <h6>{{ number_format($product->price, 0, ',', '.') }} VNĐ</h6>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex justify-content-between bg-light border">
                                        <a href="{{ route('productdetails', [$product->id, $product->slug]) }}"
                                            class="btn btn-sm text-dark p-0">
                                            <i class="fas fa-eye text-primary mr-1"></i>View Detail
                                        </a>
                                        <form action="{{ route('addproducttocart', $product->id) }}" method="POST"
                                            class="m-0">
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
            </div>
        </div>
        <!-- Shop Product End -->
    </div>
</div>
<!-- Shop End -->

@include('user.layouts.footer')
