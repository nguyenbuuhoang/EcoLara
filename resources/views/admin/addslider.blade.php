@extends('admin.layout.template')
@section('page_title')
    Add Slider
@endsection
@section('content')
    <div class="container">
        <div class="bg-light rounded p-4">
            <h6 class="mb-4">Thêm slider</h6>
            <form method="post" action="{{ route('storeslider') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="title" name="title"
                        placeholder="Slider Title">
                    <label for="title">Tiêu đề slider</label>
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control" id="description" name="description" placeholder="Slider Description"
                        style="height: 100px;"></textarea>
                    <label for="description">Mô tả slider</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="url" name="url"
                        placeholder="Url">
                    <label for="url">url</label>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Hình ảnh:</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" id="status" name="status" value="1">
                    <label class="form-check-label" for="status">Hiển thị</label>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Thêm Slider</button>
            </form>
        </div>
    </div>
@endsection
