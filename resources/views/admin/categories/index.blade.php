@extends('admin.layouts.app')

@section('title', 'Danh mục')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h3>Danh mục</h3>
    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Thêm danh mục</a>
</div>

<form method="get" class="row g-2 mb-3">
    <div class="col-md-4"><input type="text" name="q" value="{{ request('q') }}" class="form-control" placeholder="Tìm theo tên"></div>
    <div class="col-auto"><button class="btn btn-outline-secondary">Tìm</button></div>
</form>

<div class="card">
    <table class="table table-hover mb-0">
        <thead><tr><th>ID</th><th>Tên</th><th>Mô tả</th><th>Số sách</th><th></th></tr></thead>
        <tbody>
            @forelse($categories as $c)
                <tr>
                    <td>{{ $c->id }}</td>
                    <td>{{ $c->name }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($c->description, 60) }}</td>
                    <td>{{ $c->books_count }}</td>
                    <td class="text-end">
                        <a href="{{ route('admin.categories.edit', $c) }}" class="btn btn-sm btn-outline-primary">Sửa</a>
                        <form action="{{ route('admin.categories.destroy', $c) }}" method="post" class="d-inline" onsubmit="return confirm('Xoá danh mục này?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">Xoá</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center text-muted">Chưa có danh mục.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-3">{{ $categories->links() }}</div>
@endsection
