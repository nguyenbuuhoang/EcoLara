@extends('admin.layout.template')
@section('page_title')
    Edit Product
@endsection
@section('content')
    <div class="container">
        <div class="bg-light rounded p-4">
            <h6 class="mb-4">Sửa ảnh</h6>
            @include('admin.alert')
            <form method="post" action="{{ route('updateproductimg') }}" enctype="multipart/form-data">
                <input type="hidden" value="{{ $productinfo->id }}" name="id">
                @csrf
                <div class="form-floating mb-3">
                    <label for="product_name">Ảnh hiện tại</label>
                    <img src="{{ asset('uploads/' . $productinfo->product_img) }}" alt="Previous Image"
                        style="width: 300px;">
                </div>

                <div class="mb-3">
                    <label for="product_img" class="form-label">Chọn ảnh mới</label>
                    <input type="file" class="form-control" id="product_img" name="product_img">
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Lưu</button>
            </form>
        </div>
    </div>
@endsection
