@extends('admin.layout.template')

@section('content')
    <div class="container">
        <div class="card bg-light rounded p-4">
            <h1>Chỉnh sửa Slider</h1>

            <form action="{{ route('updateslider') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $slider->id }}">
                <div class="mb-3">
                    <label for="title" class="form-label">Tiêu đề:</label>
                    <input type="text" name="title" class="form-control" value="{{ $slider->title }}" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Mô tả:</label>
                    <textarea name="description" class="form-control">{{ $slider->description }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="url" class="form-label">url:</label>
                    <input type="url" name="url" class="form-control" value="{{ $slider->url }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Lưu chỉnh sửa</button>
            </form>
        </div>
    </div>
@endsection
