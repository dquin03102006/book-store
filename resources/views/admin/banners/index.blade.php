
@extends('admin.layouts.app')

@section('title', 'Quản lý Banner')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="mb-1">Quản lý Banner</h2>
            <p class="text-muted mb-0">Quản lý banner hiển thị trên trang chủ.</p>
        </div>

        <a href="{{ route('admin.banners.create') }}" class="btn btn-primary">
            + Thêm banner
        </a>
    </div>

    @if($banners->isEmpty())
        <div class="alert alert-info">
            Chưa có banner nào. Hãy thêm banner mới.
        </div>
    @else
        <div class="card border-0 shadow-sm">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th style="width: 70px;">ID</th>
                            <th style="width: 130px;">Ảnh</th>
                            <th>Tiêu đề</th>
                            <th>Đường dẫn</th>
                            <th>Trạng thái</th>
                            <th class="text-end" style="width: 180px;">Thao tác</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($banners as $banner)
                            <tr>
                                <td>{{ $banner->id }}</td>

                                <td>
                                    @if($banner->image)
                                        <img
                                            src="{{ asset('images/banners/' . basename($banner->image)) }}"
                                            alt="{{ $banner->title }}"
                                            style="width: 100px; height: 60px; object-fit: cover;"
                                            class="rounded border">
                                    @else
                                        <span class="text-muted">Không ảnh</span>
                                    @endif
                                </td>

                                <td>{{ $banner->title }}</td>

                                <td>
                                    @if($banner->link)
                                        <a href="{{ $banner->link }}" target="_blank">
                                            {{ $banner->link }}
                                        </a>
                                    @else
                                        <span class="text-muted">Chưa có</span>
                                    @endif
                                </td>

                                <td>
                                    @if($banner->is_active)
                                        <span class="badge bg-success">Đang bật</span>
                                    @else
                                        <span class="badge bg-secondary">Đang tắt</span>
                                    @endif
                                </td>

                                <td class="text-end">
                                    <a href="{{ route('admin.banners.edit', $banner->id) }}"
                                       class="btn btn-sm btn-warning">
                                        Sửa
                                    </a>

                                    <form action="{{ route('admin.banners.destroy', $banner->id) }}"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('Mày có chắc muốn xóa banner này không?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-sm btn-danger">
                                            Xóa
                                        </button>
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
