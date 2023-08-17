@extends('admin.layout.template')
@section('page_title')
    All SubCatagory
@endsection
@section('content')
    @include('admin.alert')
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Bảng danh mục</h6>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Loại sản phẩm</th>
                            <th scope="col">Thuộc danh mục</th>
                            <th scope="col">Số sản phẩm</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($allsubcategories as $subcategory)
                            <tr>
                                <td>{{ $subcategory->id }}</td>
                                <td>{{ $subcategory->subcategory_name }}</td>
                                <td>{{ $subcategory->category_name }}</td>
                                <td>{{ $subcategory->product_count }}</td>
                                <td>
                                    <a href="{{ route('editsubcategory', $subcategory->id) }}"
                                        class="btn btn-primary">Sửa</a>
                                    <a href="{{ route('deletesubcategory', $subcategory->id) }}"
                                        class="btn btn-danger">Xoá</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
