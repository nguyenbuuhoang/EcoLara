@extends('admin.layout.template')
@section('page_title')
    All Product
@endsection
@section('content')
    @include('admin.alert')
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Danh sách Sản phẩm</h6>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">IMG</th>
                            <th scope="col">Giá sản phẩm</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->product_name }}</td>
                                <td>
                                    <img style="height: 100px" src="{{ asset('uploads/' . $product->product_img) }}"
                                        alt="">
                                    <br>
                                </td>
                                <td>{{ number_format($product->price, 0, ',', '.') }} VNĐ</td>
                                <td>

                                    <a href="{{ route('editproduct', $product->id) }}" class="btn btn-primary">Sửa</a>
                                    <a href="{{ route('deleteproduct', $product->id) }}" class="btn btn-danger">Xoá</a>
                                    <a href="{{ route('editproductimg', $product->id) }}" class="btn btn-primary">Cập nhật
                                        ảnh</a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
