@extends('admin.layout.template')

@section('page_title')
    Pending Order
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Trạng thái đơn hàng</div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Tên người đặt</th>
                            <th>Thông tin địa chỉ</th>
                            <th>Tổng giá trị</th>
                            <th>Trạng thái</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->user_id }}</td>
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
                                        <a href="{{ route('approveorder', ['id' => $order->id]) }}" class="btn btn-warning">Phê duyệt ngay</a>
                                    @elseif ($order->status == 'success')
                                    <a href="{{ route('approveorder', ['id' => $order->id]) }}" class="btn btn-success">Thành công</a>
                                    @endif

                                </td>
                                <td>
                                    <a href="{{ route('ordertails', ['id' => $order->id]) }}" class="btn btn-info">Xem chi tiết</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
