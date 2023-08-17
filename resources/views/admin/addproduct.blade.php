@extends('admin.layout.template')
@section('page_title')
    Add Product
@endsection
@section('content')
    <div class="container">
        <div class="bg-light rounded p-4">
            <h6 class="mb-4">Thêm sản phẩm</h6>
            @include('admin.alert')
            <form method="post" action="{{ route('storeproduct') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="product_name" name="product_name"
                        placeholder="Product Name">
                    <label for="product_name">Tên sản phẩm</label>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <input type="number" class="form-control" id="price" name="price"
                                placeholder="Product Price">
                            <label for="price">Giá sản phẩm</label>

                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-floating">
                            <input type="number" class="form-control" id="quantity" name="quantity"
                                placeholder="Product Quantity">
                            <label for="quantity">Số lượng</label>
                        </div>
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control" id="product_short_des" name="product_short_des" placeholder="Product Short Description"
                        style="height: 100px;"></textarea>
                    <label for="product_short_des">Mô tả ngắn gọn</label>
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control" id="product_long_des" name="product_long_des" placeholder="Product Long Description"
                        style="height: 150px;"></textarea>
                    <label for="product_long_des">Mô tả chi tiết</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="product_category_id" name="product_category_id"
                        aria-label="Select Category">
                        <option selected>Chọn danh mục</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                    <label for="selectCategory">Chọn danh mục</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="product_subcategory_id" name="product_subcategory_id"
                        aria-label="Select Subcategory">
                        <option selected>Chọn loại sản phẩm</option>
                        @foreach ($subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name }}</option>
                        @endforeach
                    </select>
                    <label for="selectSubCategory">Chọn loại sản phẩm</label>
                </div>
                <div class="mb-3">
                    <label for="product_img" class="form-label">Thêm hình</label>
                    <input type="file" class="form-control" id="product_img" name="product_img">
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Hoàn tất</button>
            </form>
        </div>
    </div>
@endsection
