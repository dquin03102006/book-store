@extends('admin.layouts.app')

@section('title', $category->exists ? 'Sửa danh mục' : 'Thêm danh mục')

@section('content')
<h3 class="mb-3">{{ $category->exists ? 'Sửa danh mục' : 'Thêm danh mục' }}</h3>

<form method="post" action="{{ $category->exists ? route('admin.categories.update', $category) : route('admin.categories.store') }}" class="card card-body" style="max-width:640px">
    @csrf
    @if($category->exists) @method('PUT') @endif

    <div class="mb-3">
        <label class="form-label">Tên danh mục</label>
        <input type="text" name="name" value="{{ old('name', $category->name) }}" class="form-control @error('name') is-invalid @enderror">
        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Mô tả</label>
        <textarea name="description" rows="4" class="form-control @error('description') is-invalid @enderror">{{ old('description', $category->description) }}</textarea>
        @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div>
        <button class="btn btn-primary">Lưu</button>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-link">Huỷ</a>
    </div>
</form>
@endsection
