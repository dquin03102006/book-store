
@extends('admin.layouts.app')

@section('title', 'Thêm Banner')

@section('content')
<div class="container-fluid">
    <div class="mb-4">
        <a href="{{ route('admin.banners.index') }}"
           class="btn btn-outline-secondary btn-sm mb-3">
            ← Quay lại
        </a>

        <h2>Thêm Banner</h2>
        <p class="text-muted">Nhập thông tin banner hiển thị trên trang chủ.</p>
    </div>

    <div class="card border-0 shadow-sm" style="max-width: 800px;">
        <div class="card-body p-4">
            <form action="{{ route('admin.banners.store') }}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Tiêu đề banner</label>
                    <input
                        type="text"
                        id="title"
                        name="title"
                        class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title') }}"
                        required>

                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Ảnh banner</label>
                    <input
                        type="file"
                        id="image"
                        name="image"
                        class="form-control @error('image') is-invalid @enderror"
                        accept=".jpg,.jpeg,.png,.webp"
                        required>

                    <div class="form-text">
                        Hỗ trợ JPG, JPEG, PNG, WEBP; dung lượng tối đa 5 MB.
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
                        value="{{ old('link') }}"
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
                        @checked(old('is_active', '1') == '1')>

                    <label class="form-check-label" for="is_active">
                        Hiển thị banner
                    </label>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        Lưu banner
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
