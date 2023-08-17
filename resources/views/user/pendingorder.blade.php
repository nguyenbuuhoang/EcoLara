@extends('user.layouts.user_profile_template')

@section('profilecontent')
@include('admin.alert')
              <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3 class="mb-0">Đơn hàng đang chờ</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID đơn</th>
                                        <th>Ảnh</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Giá</th>
                                        <th>Giá tổng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pending_orders as $order)
                                    @foreach ($order->orderdetails as $detail)
                                        <tr>
                                            <td>{{ $detail->order_id }}</td>
                                            <td><img src="{{ asset('uploads/' . $detail->product_img) }}" alt="{{ $detail->product_name }}" width="20"></td>
                                            <td>{{ $detail->product_name }}</td>
                                            <td>{{ $detail->quantity }}</td>
                                            <td>{{ number_format($detail->price, 0, ',', '.') }} VNĐ</td>
                                            <td>{{ number_format($detail->total_price, 0, ',', '.') }} VNĐ</td>
                                        </tr>
                                    @endforeach
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
@endsection
