@extends('admin.layout.template')
@section('page_title')
    Dashboard
@endsection
@section('content')
    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="bi bi-graph-up text-primary" style="font-size: 3rem;"></i>
                    <div class="ms-3">
                        <p class="mb-2">Doanh thu hôm nay</p>
                        <h6 class="mb-0">{{ number_format($todayRevenue, 0, ',', '.') }} VNĐ</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="bi bi-bar-chart text-primary" style="font-size: 3rem;"></i>
                    <div class="ms-3">
                        <p class="mb-2">Tổng doanh thu</p>
                        <h6 class="mb-0">{{ number_format($totalRevenue, 0, ',', '.') }} VNĐ</h6>

                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="bi bi-cash-stack text-primary" style="font-size: 3rem;"></i>
                    <div class="ms-3">
                        <p class="mb-2">Đơn hàng chờ xử lý</p>
                        <h6 class="mb-0">{{ $pendingOrdersCount }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="bi bi-pie-chart text-primary" style="font-size: 3rem;"></i>
                    <div class="ms-3">
                        <p class="mb-2">Tổng đơn</p>
                        <h6 class="mb-0">{{ $totalOrdersCount }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sale & Revenue End -->
    <!-- Recent Sales Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Recent Salse</h6>
                <a href="">Show All</a>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-dark">
                            <th scope="col"><input class="form-check-input" type="checkbox"></th>
                            <th scope="col">ID đơn</th>
                            <th scope="col">Ngày đặt</th>
                            <th scope="col">Tên</th>
                            <th scope="col">Tổng giá trị</th>
                            <th scope="col">Tình trạng</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td><input class="form-check-input" type="checkbox"></td>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->created_at }}</td>
                                <td>{{ $order->user_name }}</td>
                                <td>{{ number_format($order->total_price, 0, ',', '.') }} VNĐ</td>
                                <td>@if ($order->status == 'pending')
                                    <a href="{{ route('approveorder', ['id' => $order->id]) }}" class="btn btn-warning">Phê duyệt ngay</a>
                                @elseif ($order->status == 'success')
                                <a href="#" class="btn btn-success">Thành công</a>
                                @endif</td>
                                <td> <a href="{{ route('orderdetails', ['id' => $order->id]) }}" class="btn btn-info">Xem chi tiết</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center mt-4">
                {{ $orders->links() }}
            </div>

        </div>
    </div>
    <!-- Recent Sales End -->
@endsection
