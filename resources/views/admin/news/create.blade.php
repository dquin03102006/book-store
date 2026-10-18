@extends('admin.layouts.app')

@section('title', 'Thêm bài viết')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4">Thêm bài viết</h2>

    <form action="{{ route('admin.news.store') }}" method="POST"
          enctype="multipart/form-data" class="card border-0 shadow-sm p-4">
        @csrf

        <div class="mb-3">
            <label class="form-label">Tiêu đề</label>
            <input type="text" name="title" class="form-control"
                   value="{{ old('title') }}" required>
            @error('title') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Nội dung bài viết</label>
            <textarea name="content" rows="8" class="form-control"
                      required>{{ old('content') }}</textarea>
            @error('content') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Ảnh bài viết</label>
            <input type="file" name="image" class="form-control"
                   accept=".jpg,.jpeg,.png,.webp">
            @error('image') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <input type="hidden" name="is_active" value="0">
        <div class="form-check mb-4">
            <input type="checkbox" name="is_active" value="1"
                   class="form-check-input" id="is_active"
                   {{ old('is_active', '1') == '1' ? 'checked' : '' }}>
            <label class="form-check-label" for="is_active">Hiển thị bài viết</label>
        </div>

        <div>
            <button class="btn btn-primary">Lưu bài viết</button>
            <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">Quay lại</a>
        </div>
    </form>
</div>
@endsection