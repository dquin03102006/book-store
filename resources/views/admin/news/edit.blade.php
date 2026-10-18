@extends('admin.layouts.app')

@section('title', 'Sửa bài viết')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4">Sửa bài viết</h2>

    <form action="{{ route('admin.news.update', $article->id) }}" method="POST"
          enctype="multipart/form-data" class="card border-0 shadow-sm p-4">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Tiêu đề</label>
            <input type="text" name="title" class="form-control"
                   value="{{ old('title', $article->title) }}" required>
            @error('title') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Nội dung bài viết</label>
            <textarea name="content" rows="8" class="form-control"
                      required>{{ old('content', $article->content) }}</textarea>
            @error('content') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Ảnh hiện tại</label><br>
            @if($article->image)
                <img src="{{ asset('images/news/' . basename($article->image)) }}"
                     alt="{{ $article->title }}"
                     style="width:150px;height:100px;object-fit:cover"
                     class="rounded border mb-2">
            @else
                <p class="text-muted">Chưa có ảnh</p>
            @endif
            <input type="file" name="image" class="form-control"
                   accept=".jpg,.jpeg,.png,.webp">
            <small class="text-muted">Để trống nếu không muốn đổi ảnh.</small>
            @error('image') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <input type="hidden" name="is_active" value="0">
        <div class="form-check mb-4">
            <input type="checkbox" name="is_active" value="1"
                   class="form-check-input" id="is_active"
                   {{ old('is_active', $article->is_active ? '1' : '0') == '1' ? 'checked' : '' }}>
            <label class="form-check-label" for="is_active">Hiển thị bài viết</label>
        </div>

        <div>
            <button class="btn btn-primary">Lưu thay đổi</button>
            <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">Quay lại</a>
        </div>
    </form>
</div>
@endsection