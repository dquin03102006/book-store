@extends('admin.layouts.app')

@section('title', $book->exists ? 'Sửa sản phẩm' : 'Thêm sản phẩm')

@section('content')
<h3 class="mb-3">{{ $book->exists ? 'Sửa sản phẩm' : 'Thêm sản phẩm' }}</h3>

<form method="post" enctype="multipart/form-data" action="{{ $book->exists ? route('admin.books.update', $book) : route('admin.books.store') }}" class="card card-body" style="max-width:720px">
    @csrf
    @if($book->exists) @method('PUT') @endif

    <div class="mb-3">
        <label class="form-label">Danh mục</label>
        <select name="category_id" class="form-select @error('category_id') is-invalid @enderror">
            <option value="">-- Chọn danh mục --</option>
            @foreach($categories as $c)
            <option value="{{ $c->id }}" @selected(old('category_id', $book->category_id) == $c->id)>{{ $c->name }}</option>
            @endforeach
        </select>
        @error('category_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Tên sách</label>
        <input type="text" name="title" value="{{ old('title', $book->title) }}" class="form-control @error('title') is-invalid @enderror">
        @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Tác giả</label>
        <input type="text" name="author" value="{{ old('author', $book->author) }}" class="form-control @error('author') is-invalid @enderror">
        @error('author')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label class="form-label">Giá (₫)</label>
            <input type="number" step="1000" min="0" name="price" value="{{ old('price', $book->price ? (int) $book->price : '') }}" class="form-control @error('price') is-invalid @enderror">
            @error('price')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label">Số lượng tồn</label>
            <input type="number" min="0" name="quantity" value="{{ old('quantity', $book->quantity ?? 0) }}" class="form-control @error('quantity') is-invalid @enderror">
            @error('quantity')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label">Mô tả</label>
        <textarea name="description" rows="4" class="form-control @error('description') is-invalid @enderror">{{ old('description', $book->description) }}</textarea>
        @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Ảnh bìa</label>
        @if($book->image)
        <div class="mb-2">
            <img src="{{ asset('images/books/'.basename($book->image)) }}"
                alt="Ảnh bìa sách"
                style="height:120px; object-fit:cover">
        </div>
        @endif
        <input type="file" name="image" accept="image/*" class="form-control @error('image') is-invalid @enderror">
        @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div>
        <button class="btn btn-primary">Lưu</button>
        <a href="{{ route('admin.books.index') }}" class="btn btn-link">Huỷ</a>
    </div>
</form>
@endsection