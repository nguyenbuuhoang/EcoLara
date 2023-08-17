@extends('admin.layout.template')
@section('page_title')
    Add SubCategory
@endsection
@section('content')
    <div class="container">
        <div class="bg-light rounded p-4">
            <h6 class="mb-4">Thêm loại sản phẩm</h6>
            @include('admin.alert')
            <form method="post" action="{{ route('storesubcategory') }}">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="subcategory_name" name="subcategory_name"
                        placeholder="Subcategory Name">
                    <label for="subcategory_name">Tên loại sản phẩm</label>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" id="category_id" name="category_id" aria-label="Select Category">
                        <option selected>Chọn danh mục</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                    <label for="selectCategory">Chọn</label>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Hoàn tất</button>
            </form>
        </div>
    </div>
@endsection
