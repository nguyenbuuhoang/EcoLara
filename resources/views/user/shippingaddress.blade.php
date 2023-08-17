@extends('user.layouts.user_profile_template')

@section('profilecontent')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm thông tin giao hàng</div>
                <div class="card-body">
                    <form action="{{ route('addshippinginfo') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="phone_number">Số Điện thoại:</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Nhập số điện thoại của bạn">
                        </div>
                        <div class="form-group">
                            <label for="city_name">Địa chỉ:</label>
                            <input type="text" class="form-control" id="city_name" name="city_name" placeholder="Nhập tên thành phố hoặc làng">
                        </div>
                        <!--
                        <div class="form-group">
                            <label for="paymentMethod">Hình thức thanh toán:</label>
                            <select class="form-control" id="paymentMethod" name="paymentMethod">
                                <option value="cash">Tiền mặt</option>
                                <option value="bank">Chuyển khoản ngân hàng</option>
                                <option value="ewallet">Ví điện tử</option>
                            </select>
                        </div>
                        -->
                        <button type="submit" class="btn btn-primary">Tiếp theo</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
