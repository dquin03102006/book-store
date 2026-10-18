@extends('admin.layouts.app')

@section('title', 'Quản lý tin tức')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2>Quản lý tin tức/bài viết</h2>
            <p class="text-muted mb-0">Thêm và quản lý nội dung bài viết.</p>
        </div>
        <a href="{{ route('admin.news.create') }}" class="btn btn-primary">
            + Thêm bài viết
        </a>
    </div>

    @if($news->isEmpty())
        <div class="alert alert-info">Chưa có bài viết nào.</div>
    @else
        <div class="card border-0 shadow-sm">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Ảnh</th>
                            <th>Tiêu đề</th>
                            <th>Nội dung</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($news as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>
                                @if($item->image)
                                    <img src="{{ asset('images/news/' . basename($item->image)) }}"
                                         alt="{{ $item->title }}"
                                         style="width:90px;height:60px;object-fit:cover"
                                         class="rounded">
                                @else
                                    Chưa có ảnh
                                @endif
                            </td>
                            <td>{{ $item->title }}</td>
                            <td>{{ \Illuminate\Support\Str::limit(strip_tags($item->content), 80) }}</td>
                            <td>
                                @if($item->is_active)
                                    <span class="badge bg-success">Đang bật</span>
                                @else
                                    <span class="badge bg-secondary">Đang tắt</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.news.edit', $item->id) }}"
                                   class="btn btn-sm btn-warning mb-1">Sửa</a>

                                <form action="{{ route('admin.news.destroy', $item->id) }}"
                                      method="POST" class="d-inline"
                                      onsubmit="return confirm('Mày chắc muốn xóa bài viết này chứ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger mb-1">Xóa</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>
@endsection