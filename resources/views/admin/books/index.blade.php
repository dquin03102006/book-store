@extends('admin.layouts.app')

@section('title', 'Sản phẩm')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h3>Sản phẩm</h3>
    <a href="{{ route('admin.books.create') }}" class="btn btn-primary">Thêm sản phẩm</a>
</div>

<form method="get" class="row g-2 mb-3">
    <div class="col-md-4"><input type="text" name="q" value="{{ request('q') }}" class="form-control" placeholder="Tìm theo tên sách hoặc tác giả"></div>
    <div class="col-md-3">
        <select name="category_id" class="form-select">
            <option value="">Tất cả danh mục</option>
            @foreach($categories as $c)
                <option value="{{ $c->id }}" @selected(request('category_id') == $c->id)>{{ $c->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-auto"><button class="btn btn-outline-secondary">Lọc</button></div>
</form>

<div class="card">
    <table class="table table-hover align-middle mb-0">
        <thead>
            <tr><th>ID</th><th>Ảnh</th><th>Tên sách</th><th>Tác giả</th><th>Danh mục</th><th>Giá</th><th>Tồn kho</th><th></th></tr>
        </thead>
        <tbody>
            @forelse($books as $b)
                <tr>
                    <td>{{ $b->id }}</td>
                    <td>
                        @if($b->image)
                            <img src="{{ asset('storage/'.$b->image) }}" alt="" style="width:40px;height:56px;object-fit:cover">
                        @endif
                    </td>
                    <td>{{ $b->title }}</td>
                    <td>{{ $b->author }}</td>
                    <td>{{ $b->category->name }}</td>
                    <td>{{ number_format($b->price, 0, ',', '.') }} ₫</td>
                    <td>{{ $b->quantity }}</td>
                    <td class="text-end">
                        <a href="{{ route('admin.books.edit', $b) }}" class="btn btn-sm btn-outline-primary">Sửa</a>
                        <form action="{{ route('admin.books.destroy', $b) }}" method="post" class="d-inline" onsubmit="return confirm('Xoá sản phẩm này?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">Xoá</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="8" class="text-center text-muted">Chưa có sản phẩm.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-3">{{ $books->links() }}</div>
@endsection
