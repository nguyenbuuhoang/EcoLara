@extends('admin.layout.template')

@section('page_title')
    Detail
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card mt-4">
                    <div class="card-header">
                        <h2 class="mb-0">Thông tin chi tiết</h2>
                    </div>
                    <div class="card-body">
                        <p class="mb-2"><strong>ID Đơn hàng:</strong> {{ $order->id }}</p>
                        <p class="mb-2"><strong>Tên người đặt:</strong> {{ $order->user_name }}</p>
                        <p class="mb-2"><strong>Số điện thoại:</strong> {{ $order->shipping_phonenumber }}</p>
                        <p class="mb-2"><strong>Địa chỉ:</strong> {{ $order->shipping_city }}</p>
                        <p class="mb-2"><strong>Tổng giá tiền:</strong> {{ number_format($order->total_price, 0, ',', '.') }} VNĐ</p>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="{{ route('dashboard') }}" class="btn btn-secondary">Quay lại</a>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mt-4">
                    <div class="card-header">
                        <h3 class="mb-0">Chi tiết đơn hàng</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Tên sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Giá</th>
                                        <th>Giá tổng</th>
                                        <th>Ảnh</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orderDetails as $detail)
                                        <tr>
                                            <td>{{ $detail->product_name }}</td>
                                            <td>{{ $detail->quantity }}</td>
                                            <td>{{ number_format($detail->price, 0, ',', '.') }} VNĐ</td>
                                            <td>{{ number_format($detail->total_price, 0, ',', '.') }} VNĐ</td>
                                            <td><img src="{{ asset('uploads/' . $detail->product_img) }}"
                                                    alt="{{ $detail->product_name }}" width="100"></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
