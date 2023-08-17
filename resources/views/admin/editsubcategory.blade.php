@extends('admin.layout.template')
@section('page_title')
    Edit SubCategory
@endsection
@section('content')
    <div class="container">
        <div class="bg-light rounded p-4">
            <h6 class="mb-4">Sửa loại sản phẩm</h6>
            @include('admin.alert')
            <form method="post" action="{{ route('updatesubcategory') }}">
                @csrf
                <input type="hidden" value="{{ $subcategory_info->id }}" name="subcategory_id">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" value="{{ $subcategory_info->subcategory_name }}"
                        id="subcategory_name" name="subcategory_name" placeholder="Subcategory Name">
                    <label for="subcategoryName">Tên loại sản phẩm</label>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </form>
        </div>
    </div>
@endsection
