@extends('user.layouts.template')
@section('content')
    @include('admin.alert')
    <div class="container">
        <section class="vh-100" style="background-color: #beafa8;">
            <div class="container h-100">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="box_main ">
                            <h2 class="text-left mt-4 mb-4">Your Shopping Cart</h2>
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th>Product Image</th>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                    @php
                                        $total = 0;
                                    @endphp
                                    @foreach ($cart_items as $item)
                                        <tr>
                                            @php
                                                $product_name = \App\Models\Product::where('id', $item->product_id)->value('product_name');
                                                $img = \App\Models\Product::where('id', $item->product_id)->value('product_img');
                                            @endphp
                                            <td class="align-middle"> <img src="{{ asset('uploads/' . $img) }}" style="height: 100px"> </td>
                                            <td class="align-middle">{{ $product_name }}</td>
                                            <td class="align-middle">{{ $item->quantity }}</td>
                                            <td class="align-middle">{{ number_format($item->price, 0, ',', '.') }} VNĐ</td>
                                            <td class="align-middle"><a href="{{ route('removecartitem',$item->id) }}" class="btn btn-warning">Remove</a></td>
                                        </tr>
                                        @php
                                            $total= $total+ $item->price;
                                        @endphp
                                    @endforeach
                                    @if ($total>0)
                                    <tr>
                                        <td>
                                            <a href="{{ route('home') }}" class="btn btn-secondary">Tiếp tục mua</a>
                                        </td>
                                        <td></td>
                                        <td>Total</td>
                                        <td>{{ number_format($total, 0, ',', '.') }} VNĐ</td>
                                        <td>
                                            <a href="{{ route('shippingaddress') }}" class="btn btn-primary">Checkout</a>
                                        </td>
                                        @endif
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
