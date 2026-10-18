@extends('admin.layouts.app')

@section('title', 'Quản lý đơn hàng')

@section('content')
<div class="container-fluid px-0">

    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <h2 class="fw-bold mb-1" style="color: #212842;">Quản lý đơn hàng</h2>
            <p class="text-muted mb-0">Theo dõi và quản lý đơn hàng của khách hàng.</p>
        </div>
    </div>

    {{-- LỌC ĐƠN HÀNG --}}
    <div class="card border-0 shadow-sm rounded-3 mb-4">
        <div class="card-body p-4">
            <h5 class="fw-bold mb-3" style="color: #212842;">Lọc đơn hàng</h5>

            <form action="{{ route('admin.orders.index') }}" method="GET"
                  class="d-flex flex-wrap align-items-center gap-2">

                <select name="status" class="form-select" style="max-width: 260px;">
                    <option value="">Tất cả trạng thái</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>
                        Chờ xử lý
                    </option>
                    <option value="processing" {{ request('status') == 'processing' ? 'selected' : '' }}>
                        Đang xử lý
                    </option>
                    <option value="shipped" {{ request('status') == 'shipped' ? 'selected' : '' }}>
                        Đang giao
                    </option>
                    <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>
                        Hoàn thành
                    </option>
                    <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>
                        Đã hủy
                    </option>
                </select>

                <button type="submit" class="btn text-white" style="background: #212842;">
                    Lọc đơn hàng
                </button>

                <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-secondary">
                    Đặt lại
                </a>
            </form>
        </div>
    </div>

    {{-- DANH SÁCH ĐƠN HÀNG --}}
    <div class="card border-0 shadow-sm rounded-3">
        <div class="card-body p-0">

            <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 p-4 border-bottom">
                <h5 class="fw-bold mb-0" style="color: #212842;">Danh sách đơn hàng</h5>
                <span class="text-muted small">
                    Tổng cộng: {{ $orders->total() }} đơn hàng
                </span>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead style="background: #f3f4f7;">
                        <tr>
                            <th class="px-4 py-3">Mã đơn</th>
                            <th class="py-3">Khách hàng</th>
                            <th class="py-3">Số điện thoại</th>
                            <th class="py-3 text-end">Tổng tiền</th>
                            <th class="py-3">Thanh toán</th>
                            <th class="py-3">Trạng thái</th>
                            <th class="py-3">Ngày đặt</th>
                            <th class="px-4 py-3 text-center">Thao tác</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($orders as $order)
                            <tr>
                                <td class="px-4 fw-semibold" style="color: #212842;">
                                    #{{ $order->id }}
                                </td>

                                <td>
                                    {{ $order->shipping_name ?? '—' }}
                                </td>

                                <td>
                                    {{ $order->shipping_phone ?? '—' }}
                                </td>

                                <td class="text-end fw-semibold text-nowrap">
                                    {{ number_format($order->total_amount, 0, ',', '.') }} đ
                                </td>

                                <td>
                                    {{ strtoupper($order->payment_method ?? '—') }}
                                </td>

                                <td>
                                    @php
                                        $statusLabels = [
                                            'pending' => 'Chờ xử lý',
                                            'processing' => 'Đang xử lý',
                                            'shipped' => 'Đang giao',
                                            'completed' => 'Hoàn thành',
                                            'cancelled' => 'Đã hủy',
                                        ];

                                        $statusClasses = [
                                            'pending' => 'bg-warning-subtle text-warning-emphasis',
                                            'processing' => 'bg-primary-subtle text-primary-emphasis',
                                            'shipped' => 'bg-info-subtle text-info-emphasis',
                                            'completed' => 'bg-success-subtle text-success-emphasis',
                                            'cancelled' => 'bg-danger-subtle text-danger-emphasis',
                                        ];
                                    @endphp

                                    <span class="badge rounded-pill px-3 py-2 {{ $statusClasses[$order->status] ?? 'bg-secondary-subtle text-secondary-emphasis' }}">
                                        {{ $statusLabels[$order->status] ?? $order->status }}
                                    </span>
                                </td>

                                <td class="text-nowrap">
                                    {{ $order->created_at?->format('d/m/Y H:i') ?? '—' }}
                                </td>

                                <td class="px-4 text-center">
                                    <a href="{{ route('admin.orders.show', $order->id) }}"
                                       class="btn btn-sm text-white text-nowrap"
                                       style="background: #212842;">
                                        Xem chi tiết
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-5">
                                    <div class="text-muted mb-2">Chưa có đơn hàng nào.</div>
                                    @if(request('status'))
                                        <a href="{{ route('admin.orders.index') }}"
                                           class="btn btn-sm btn-outline-secondary">
                                            Xem tất cả đơn hàng
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- PHÂN TRANG --}}
            @if($orders->hasPages())
                <div class="d-flex justify-content-center p-4 border-top">
                    {{ $orders->withQueryString()->links() }}
                </div>
            @endif

        </div>
    </div>

</div>
@endsection