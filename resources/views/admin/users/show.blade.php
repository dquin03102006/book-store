@extends('admin.layouts.app')

@section('title', $user->name)

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h3>{{ $user->name }}</h3>
    <a href="{{ route($prefix.'.index') }}" class="btn btn-outline-secondary">Quay lại</a>
</div>

<div class="card card-body mb-4" style="max-width:560px">
    <div><strong>Email:</strong> {{ $user->email }}</div>
    <div><strong>Ngày tạo:</strong> {{ $user->created_at?->format('d/m/Y H:i') }}</div>
    <div><strong>Số đơn hàng:</strong> {{ $orders->count() }}</div>
    <div><strong>Tổng chi tiêu:</strong> {{ number_format($orders->sum('total_amount'), 0, ',', '.') }} ₫</div>
</div>

<div class="card">
    <div class="card-header">Lịch sử đơn hàng</div>
    <table class="table mb-0">
        <thead><tr><th>Mã đơn</th><th>Ngày đặt</th><th>Người nhận</th><th>Thanh toán</th><th>Trạng thái</th><th>Tổng tiền</th></tr></thead>
        <tbody>
            @forelse($orders as $o)
                <tr>
                    <td>#{{ $o->id }}</td>
                    <td>{{ $o->created_at?->format('d/m/Y H:i') }}</td>
                    <td>{{ $o->shipping_name }}</td>
                    <td>{{ $o->payment_method }}</td>
                    <td>{{ $o->status }}</td>
                    <td>{{ number_format($o->total_amount, 0, ',', '.') }} ₫</td>
                </tr>
            @empty
                <tr><td colspan="6" class="text-center text-muted">Chưa có đơn hàng.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
