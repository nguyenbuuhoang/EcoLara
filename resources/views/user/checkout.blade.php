@extends('user.layouts.template')

@section('content')
    <div class="container">
        <h2 class="my-4 text-center">Final step to place your order</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">Product will be sent to</div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li><strong>Name:</strong> {{ $shipping_address->user_name }}</li>
                            <li><strong>Address:</strong> {{ $shipping_address->city_name }}</li>
                            <li><strong>Phone:</strong> {{ $shipping_address->phone_number }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">Your final products</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Product Image</th>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $total = 0;
                                    @endphp
                                    @foreach ($cart_items as $item)
                                        @php
                                            $product_name = \App\Models\Product::where('id', $item->product_id)->value('product_name');
                                            $img = \App\Models\Product::where('id', $item->product_id)->value('product_img');
                                        @endphp
                                        <tr>
                                            <td><img src="{{ asset('uploads/' . $img) }}" alt="{{ $product_name }}"
                                                    class="img-thumbnail" style="max-width: 100px;"></td>
                                            <td>{{ $product_name }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ number_format($item->price, 0, ',', '.') }} VNĐ</td>
                                        </tr>
                                        @php
                                            $total = $total + $item->price;
                                        @endphp
                                    @endforeach
                                    <tr>
                                        <td colspan="3"><strong>Total:</strong></td>
                                        <td>{{ number_format($total, 0, ',', '.') }} VNĐ</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 text-center">
                <td class="align-middle"><a href="{{ route('cancelorder',$item->id) }}" class="btn btn-warning">Cancel Order</a></td>
                <form action="{{ route('placeorder') }}" method="POST" class="d-inline">
                    @csrf
                    <input type="submit" value="Place Order" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
@endsection
