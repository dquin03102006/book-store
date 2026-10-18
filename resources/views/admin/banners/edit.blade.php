
@extends('admin.layouts.app')

@section('title', 'Sửa Banner')

@section('content')
<div class="container-fluid">
    <div class="mb-4">
        <a href="{{ route('admin.banners.index') }}"
           class="btn btn-outline-secondary btn-sm mb-3">
            ← Quay lại
        </a>

        <h2>Sửa Banner</h2>
        <p class="text-muted">Cập nhật thông tin banner.</p>
    </div>

    <div class="card border-0 shadow-sm" style="max-width: 800px;">
        <div class="card-body p-4">
            <form action="{{ route('admin.banners.update', $banner->id) }}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Tiêu đề banner</label>
                    <input
                        type="text"
                        id="title"
                        name="title"
                        class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title', $banner->title) }}"
                        required>

                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label d-block">Ảnh hiện tại</label>

                    @if($banner->image)
                        <img
                            src="{{ asset('images/banners/' . basename($banner->image)) }}"
                            alt="{{ $banner->title }}"
                            class="rounded border mb-2"
                            style="max-width: 100%; width: 360px; height: 160px; object-fit: cover;">
                    @else
                        <p class="text-muted">Chưa có ảnh.</p>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Thay ảnh mới (không bắt buộc)</label>
                    <input
                        type="file"
                        id="image"
                        name="image"
                        class="form-control @error('image') is-invalid @enderror"
                        accept=".jpg,.jpeg,.png,.webp">

                    <div class="form-text">
                        JPG, JPEG, PNG hoặc WEBP; tối đa 5 MB.
                        Để trống nếu muốn giữ ảnh hiện tại.
                    </div>

                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="link" class="form-label">Đường dẫn khi bấm banner</label>
                    <input
                        type="text"
                        id="link"
                        name="link"
                        class="form-control @error('link') is-invalid @enderror"
                        value="{{ old('link', $banner->link) }}"
                        placeholder="Ví dụ: /danh-muc/1">

                    @error('link')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-check form-switch mb-4">
                    <input type="hidden" name="is_active" value="0">

                    <input
                        class="form-check-input"
                        type="checkbox"
                        role="switch"
                        id="is_active"
                        name="is_active"
                        value="1"
                        @checked(old('is_active', $banner->is_active ? '1' : '0') == '1')>

                    <label class="form-check-label" for="is_active">
                        Hiển thị banner
                    </label>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        Lưu thay đổi
                    </button>

                    <a href="{{ route('admin.banners.index') }}"
                       class="btn btn-outline-secondary">
                        Hủy
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
