@extends('admin.layouts.app')

@section('title', $title)

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h3>{{ $title }}</h3>
    <a href="{{ route($prefix.'.create') }}" class="btn btn-primary">Thêm {{ mb_strtolower($title) }}</a>
</div>

<form method="get" class="row g-2 mb-3">
    <div class="col-md-4"><input type="text" name="q" value="{{ request('q') }}" class="form-control" placeholder="Tìm theo tên hoặc email"></div>
    <div class="col-auto"><button class="btn btn-outline-secondary">Tìm</button></div>
</form>

<div class="card">
    <table class="table table-hover mb-0">
        <thead>
            <tr>
                <th>ID</th><th>Họ tên</th><th>Email</th>
                @if($role === 'customer')<th>Số đơn</th><th>Tổng chi tiêu</th>@endif
                <th>Ngày tạo</th><th></th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $u)
                <tr>
                    <td>{{ $u->id }}</td>
                    <td>{{ $u->name }}</td>
                    <td>{{ $u->email }}</td>
                    @if($role === 'customer')
                        <td>{{ $u->orders_count }}</td>
                        <td>{{ number_format($u->orders_sum_total_amount ?? 0, 0, ',', '.') }} ₫</td>
                    @endif
                    <td>{{ $u->created_at?->format('d/m/Y') }}</td>
                    <td class="text-end">
                        @if($role === 'customer')
                            <a href="{{ route($prefix.'.show', $u) }}" class="btn btn-sm btn-outline-secondary">Xem</a>
                        @endif
                        <a href="{{ route($prefix.'.edit', $u) }}" class="btn btn-sm btn-outline-primary">Sửa</a>
                        <form action="{{ route($prefix.'.destroy', $u) }}" method="post" class="d-inline" onsubmit="return confirm('Xoá tài khoản này?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">Xoá</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="7" class="text-center text-muted">Chưa có dữ liệu.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-3">{{ $users->links() }}</div>
@endsection
