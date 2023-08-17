@extends('admin.layout.template')
@section('page_title')
    Edit Product
@endsection
@section('content')
    <div class="container">
        <div class="bg-light rounded p-4">
            <h6 class="mb-4">Sửa sản phẩm</h6>
            @include('admin.alert')
            <form method="post" action="{{ route('updateproduct') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{ $productinfo->id }}" name="id">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" value="{{ $productinfo->product_name }}" id="product_name"
                        name="product_name" placeholder="Product Name">
                    <label for="product_name">Tên sản phẩm</label>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <input type="number" class="form-control" value="{{ $productinfo->price }}" id="price"
                                name="price" placeholder="Product Price">
                            <label for="price">Giá sản phẩm</label>

                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <input type="number" class="form-control" value="{{ $productinfo->quantity }}" id="quantity"
                                name="quantity" placeholder="Product Quantity">
                            <label for="quantity">Số lượng</label>
                        </div>
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control" id="product_short_des" name="product_short_des" placeholder="Mô tả ngắn"
                        style="height: 100px;">{{ $productinfo->product_short_des }}</textarea>
                    <label for="product_short_des">Mô tả ngắn</label>
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control" id="product_long_des" name="product_long_des" placeholder="Mô tả Chi tiết"
                        style="height: 150px;">{{ $productinfo->product_long_des }}</textarea>
                    <label for="product_long_des">Mô tả chi tiết</label>
                </div>

                <br>
                <button type="submit" class="btn btn-primary">Hoàn tất</button>
            </form>
        </div>
    </div>
@endsection
