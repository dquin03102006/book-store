@extends('admin.layouts.app')

@section('title', 'Chi tiết đơn hàng')

@section('content')
<div class="container-fluid px-0">

    {{-- TIÊU ĐỀ --}}
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <h2 class="fw-bold mb-1" style="color: #212842;">
                Chi tiết đơn hàng #{{ $order->id }}
            </h2>
            <p class="text-muted mb-0">Xem thông tin và cập nhật trạng thái đơn hàng.</p>
        </div>

        <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-secondary">
            ← Danh sách đơn hàng
        </a>
    </div>

    {{-- THÔNG BÁO --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <div class="row g-4">

        {{-- CỘT TRÁI --}}
        <div class="col-12 col-xl-8">

            {{-- THÔNG TIN ĐƠN HÀNG --}}
            <div class="card border-0 shadow-sm rounded-3 mb-4">
                <div class="card-header bg-white border-bottom p-3">
                    <h5 class="fw-bold mb-0" style="color: #212842;">
                        Thông tin đơn hàng
                    </h5>
                </div>

                <div class="card-body p-4">
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

                    <div class="row g-3">
                        <div class="col-sm-6">
                            <div class="text-muted small mb-1">Mã đơn hàng</div>
                            <div class="fw-semibold">#{{ $order->id }}</div>
                        </div>

                        <div class="col-sm-6">
                            <div class="text-muted small mb-1">Ngày đặt</div>
                            <div class="fw-semibold">
                                {{ $order->created_at?->format('d/m/Y H:i') ?? '—' }}
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="text-muted small mb-1">Phương thức thanh toán</div>
                            <div class="fw-semibold">
                                {{ strtoupper($order->payment_method ?? '—') }}
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="text-muted small mb-1">Trạng thái đơn hàng</div>
                            <span class="badge rounded-pill px-3 py-2 {{ $statusClasses[$order->status] ?? 'bg-secondary-subtle text-secondary-emphasis' }}">
                                {{ $statusLabels[$order->status] ?? $order->status }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- THÔNG TIN KHÁCH HÀNG --}}
            <div class="card border-0 shadow-sm rounded-3 mb-4">
                <div class="card-header bg-white border-bottom p-3">
                    <h5 class="fw-bold mb-0" style="color: #212842;">
                        Thông tin khách hàng
                    </h5>
                </div>

                <div class="card-body p-4">
                    <h6 class="fw-bold mb-3">
                        {{ $order->shipping_name ?? 'Chưa có thông tin' }}
                    </h6>

                    <div class="mb-3">
                        <span class="text-muted">Số điện thoại:</span>
                        <span class="ms-2">{{ $order->shipping_phone ?? '—' }}</span>
                    </div>

                    <div>
                        <span class="text-muted">Địa chỉ:</span>
                        <span class="ms-2">{{ $order->shipping_address ?? '—' }}</span>
                    </div>
                </div>
            </div>

            {{-- SẢN PHẨM --}}
            <div class="card border-0 shadow-sm rounded-3 mb-4">
                <div class="card-header bg-white border-bottom p-3">
                    <h5 class="fw-bold mb-0" style="color: #212842;">
                        Sản phẩm trong đơn
                    </h5>
                </div>

                <div class="card-body p-4">
                    @forelse($order->items as $item)
                        <div class="d-flex flex-wrap align-items-center gap-3 py-3 {{ !$loop->last ? 'border-bottom' : '' }}">

                            <div class="flex-shrink-0 rounded overflow-hidden"
                                 style="width: 65px; height: 80px; background: #f3f4f7;">
                                @if($item->book && $item->book->image)
                                    <img
                                        src="{{ asset('images/books/' . basename($item->book->image)) }}"
                                        alt="{{ $item->book->title }}"
                                        style="width: 100%; height: 100%; object-fit: cover;">
                                @else
                                    <div class="d-flex align-items-center justify-content-center h-100 text-muted">
                                        Không ảnh
                                    </div>
                                @endif
                            </div>

                            <div class="flex-grow-1">
                                <div class="fw-semibold mb-1" style="color: #212842;">
                                    {{ $item->book->title ?? 'Sản phẩm không còn tồn tại' }}
                                </div>
                                <div class="text-muted small">
                                    Số lượng: {{ $item->quantity }}
                                </div>
                                <div class="text-muted small">
                                    Đơn giá:
                                    {{ number_format($item->price, 0, ',', '.') }} đ
                                </div>
                            </div>

                            <div class="fw-bold text-nowrap" style="color: #212842;">
                                {{ number_format($item->price * $item->quantity, 0, ',', '.') }} đ
                            </div>
                        </div>
                    @empty
                        <p class="text-muted text-center py-3 mb-0">
                            Đơn hàng chưa có sản phẩm.
                        </p>
                    @endforelse

                    <div class="d-flex justify-content-between align-items-center gap-3 mt-4 p-3 rounded-3"
                         style="background: #f3f4f7;">
                        <span class="fw-semibold">Tổng tiền đơn hàng</span>
                        <span class="fw-bold fs-4 text-nowrap" style="color: #212842;">
                            {{ number_format($order->total_amount, 0, ',', '.') }} đ
                        </span>
                    </div>
                </div>
            </div>

        </div>

        {{-- CỘT PHẢI --}}
        <div class="col-12 col-xl-4">

            {{-- CẬP NHẬT TRẠNG THÁI --}}
            <div class="card border-0 shadow-sm rounded-3 mb-4">
                <div class="card-header bg-white border-bottom p-3">
                    <h5 class="fw-bold mb-0" style="color: #212842;">
                        Cập nhật trạng thái
                    </h5>
                </div>

                <div class="card-body p-4">
                    <div class="text-muted small mb-2">Trạng thái hiện tại</div>

                    <div class="mb-4">
                        <span class="badge rounded-pill px-3 py-2 {{ $statusClasses[$order->status] ?? 'bg-secondary-subtle text-secondary-emphasis' }}">
                            {{ $statusLabels[$order->status] ?? $order->status }}
                        </span>
                    </div>

                    <form action="{{ route('admin.orders.updateStatus', $order->id) }}"
                          method="POST">
                        @csrf
                        @method('PATCH')

                        <label for="status" class="form-label fw-semibold">
                            Chọn trạng thái mới
                        </label>

                        <select name="status" id="status" class="form-select mb-3" required>
                            @foreach($statusLabels as $value => $label)
                                <option value="{{ $value }}"
                                    {{ $order->status === $value ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                            @endforeach
                        </select>

                        <button type="submit" class="btn text-white w-100"
                                style="background: #212842;">
                            Cập nhật trạng thái
                        </button>
                    </form>
                </div>
            </div>

            {{-- TÓM TẮT --}}
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-header bg-white border-bottom p-3">
                    <h5 class="fw-bold mb-0" style="color: #212842;">
                        Tóm tắt đơn hàng
                    </h5>
                </div>

                <div class="card-body p-4">
                    <div class="d-flex justify-content-between gap-3 mb-3">
                        <span class="text-muted">Mã đơn</span>
                        <span class="fw-semibold">#{{ $order->id }}</span>
                    </div>

                    <div class="d-flex justify-content-between gap-3 mb-3">
                        <span class="text-muted">Số lượng sách</span>
                        <span class="fw-semibold">{{ $order->items->sum('quantity') }}</span>
                    </div>

                    <div class="d-flex justify-content-between gap-3 mb-3">
                        <span class="text-muted">Thanh toán</span>
                        <span class="fw-semibold">{{ strtoupper($order->payment_method ?? '—') }}</span>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-between align-items-center gap-3">
                        <span class="fw-semibold">Tổng cộng</span>
                        <span class="fw-bold fs-5 text-nowrap" style="color: #212842;">
                            {{ number_format($order->total_amount, 0, ',', '.') }} đ
                        </span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
