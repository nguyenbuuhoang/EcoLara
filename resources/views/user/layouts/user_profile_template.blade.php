@extends('user.layouts.template')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-3">
            <div class="box_main">
                <ul class="list-group">
                    <li class="list-group-item"><a href="{{ route('pendingorders') }}">Pending Orders</a></li>
                    <li class="list-group-item"><a href="{{ route('history') }}">History</a></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="box_main">
                @yield('profilecontent')
            </div>
        </div>
    </div>
</div>
@endsection
