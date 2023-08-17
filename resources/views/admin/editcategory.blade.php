@extends('admin.layout.template')
@section('page_title')
    Edit Category
@endsection
@section('content')
    <div class="container">
        <div class="bg-light rounded p-4">
            <h6 class="mb-4">Sửa danh mục</h6>
            @include('admin.alert')
            <form method="post" action="{{ route('updatecategory') }}">
                @csrf
                <input type="hidden" value="{{ $category_info->id }}" name="category_id">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" value="{{ $category_info->category_name }}" id="category_name"
                        name="category_name" placeholder="category_name">
                    <label for="category_name">Tên danh mục</label>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </form>
        </div>
    </div>
@endsection
