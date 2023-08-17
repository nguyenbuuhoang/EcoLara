@extends('admin.layout.template')
@section('page_title')
    Add Category
@endsection
@section('content')
    <div class="container">
        <div class="bg-light rounded p-4">
            <h6 class="mb-4">Thêm danh mục</h6>
            @include('admin.alert')
            <form method="post" action="{{ route('storecategory') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="category_name" name="category_name"
                        placeholder="category_name">
                    <label for="category_name">Nhập tên</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="file" class="form-control" id="category_img" name="category_img">
                    <label for="category_img">Chọn hình ảnh</label>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Hoàn tất</button>
            </form>
        </div>
    </div>
@endsection
