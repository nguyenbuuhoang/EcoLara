@extends('user.layouts.user_profile_template')
@section('profilecontent')
    <div class="container">
        <div class="card">
            <div class="card-header">Đơn hàng đặt thành công</div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id đơn</th>
                            <th>Tên người đặt</th>
                            <th>Thông tin địa chỉ</th>
                            <th>Tổng giá trị</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($history_orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->user_name }}</td>
                                <td>
                                    <ul>
                                        <li>Phone Number: {{ $order->shipping_phonenumber }}</li>
                                        <li>Địa chỉ: {{ $order->shipping_city }}</li>
                                    </ul>
                                </td>
                                <td>{{ number_format($order->total_price, 0, ',', '.') }} VNĐ</td>
                                <td>
                                    @if ($order->status == 'pending')
                                        <a href="{{ route('approveorder', ['id' => $order->id]) }}"
                                            class="btn btn-success">Phê duyệt ngay</a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('ordertails', ['id' => $order->id]) }}" class="btn btn-info">Xem chi
                                        tiết đơn hàng</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
