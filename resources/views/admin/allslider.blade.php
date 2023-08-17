@extends('admin.layout.template')

@section('page_title')
    Add Slider
@endsection

@section('content')
<div class="container">
    @include('admin.alert')
    <h1>Danh sách Slider</h1>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Url</th>
                <th>Image</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sliders as $slider)
                <tr>
                    <td>{{ $slider->id }}</td>
                    <td>{{ $slider->title }}</td>
                    <td>{{ $slider->description }}</td>
                    <td>{{ $slider->url }}</td>
                    <td>
                        <img class="img-fluid" style="max-height: 100px" src="{{ asset('uploads/' . $slider->image) }}" alt="Slider Image">
                    </td>
                    <td>
                        <a href="{{ route('changestatus', ['id' => $slider->id]) }}" class="btn {{ $slider->status == 1 ? 'btn-success' : 'btn-warning' }}">
                            {{ $slider->status == 1 ? 'Hiện' : 'Ẩn' }}
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('editslider', ['id' => $slider->id]) }}" class="btn btn-primary">Sửa</a>
                        <a href="{{ route('deleteslider', ['id' => $slider->id]) }}" class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
