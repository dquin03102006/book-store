 @extends('admin.layouts.app')

@section('title', 'Thống kê')

@section('content')
<div class="container-fluid">
    <div class="mb-4">
        <h2 class="fw-bold" style="color: #1f2a44;">Thống kê kinh doanh</h2>
        <p class="text-muted mb-0">Tổng quan tình hình đơn hàng và doanh thu của Tiệm Sách Nhỏ.</p>
    </div>

    {{-- Tổng quan --}}
    <div class="row g-3 mb-4">
        <div class="col-12 col-md-6 col-xl-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <p class="text-muted mb-2">Tổng đơn hàng</p>
                    <h3 class="fw-bold mb-0">{{ number_format($totalOrders) }}</h3>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-xl-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <p class="text-muted mb-2">Tổng doanh thu đơn hoàn thành</p>
                    <h3 class="fw-bold mb-0 text-success">
                        {{ number_format($totalRevenue, 0, ',', '.') }} đ
                    </h3>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-6 col-xl-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <p class="text-muted mb-2">Đơn chờ xử lý</p>
                    <h3 class="fw-bold mb-0 text-warning">{{ number_format($pendingOrders) }}</h3>
                </div>
            </div>
        </div>
    </div>

    {{-- Trạng thái đơn hàng --}}
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <h5 class="fw-bold mb-3">Tình trạng đơn hàng</h5>
            <div class="row g-3">
                <div class="col-6 col-md">
                    <div class="p-3 rounded bg-light">
                        <div class="text-muted small">Chờ xử lý</div>
                        <div class="fs-4 fw-bold text-warning">{{ $pendingOrders }}</div>
                    </div>
                </div>
                <div class="col-6 col-md">
                    <div class="p-3 rounded bg-light">
                        <div class="text-muted small">Đang xử lý</div>
                        <div class="fs-4 fw-bold text-primary">{{ $processingOrders }}</div>
                    </div>
                </div>
                <div class="col-6 col-md">
                    <div class="p-3 rounded bg-light">
                        <div class="text-muted small">Đang giao</div>
                        <div class="fs-4 fw-bold text-info">{{ $shippedOrders }}</div>
                    </div>
                </div>
                <div class="col-6 col-md">
                    <div class="p-3 rounded bg-light">
                        <div class="text-muted small">Hoàn thành</div>
                        <div class="fs-4 fw-bold text-success">{{ $completedOrders }}</div>
                    </div>
                </div>
                <div class="col-6 col-md">
                    <div class="p-3 rounded bg-light">
                        <div class="text-muted small">Đã hủy</div>
                        <div class="fs-4 fw-bold text-danger">{{ $cancelledOrders }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Doanh thu theo tháng --}}
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <h5 class="fw-bold mb-3">Doanh thu theo tháng</h5>
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Tháng</th>
                            <th class="text-end">Doanh thu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($monthlyRevenue as $item)
                            <tr>
                                <td>{{ \Carbon\Carbon::createFromFormat('Y-m', $item->month)->format('m/Y') }}</td>
                                <td class="text-end fw-semibold">
                                    {{ number_format($item->revenue, 0, ',', '.') }} đ
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="text-center text-muted py-4">Chưa có dữ liệu doanh thu.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Doanh thu theo danh mục --}}
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <h5 class="fw-bold mb-3">Doanh thu theo danh mục</h5>
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Danh mục</th>
                            <th class="text-end">Số lượng sách bán</th>
                            <th class="text-end">Doanh thu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($revenueByCategory as $item)
                            <tr>
                                <td>{{ $item->category_name }}</td>
                                <td class="text-end">{{ number_format($item->quantity) }}</td>
                                <td class="text-end fw-semibold">{{ number_format($item->revenue, 0, ',', '.') }} đ</td>
                            </tr>
                        @empty
                            <tr><td colspan="3" class="text-center text-muted py-4">Chưa có dữ liệu.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Sản phẩm bán chạy --}}
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <h5 class="fw-bold mb-3">Top 10 sản phẩm theo doanh thu</h5>
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Tên sách</th>
                            <th class="text-end">Số lượng bán</th>
                            <th class="text-end">Doanh thu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($revenueByProduct as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->title }}</td>
                                <td class="text-end">{{ number_format($item->quantity) }}</td>
                                <td class="text-end fw-semibold">{{ number_format($item->revenue, 0, ',', '.') }} đ</td>
                            </tr>
                        @empty
                            <tr><td colspan="4" class="text-center text-muted py-4">Chưa có dữ liệu.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Doanh thu theo khách hàng --}}
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <h5 class="fw-bold mb-3">Top 10 khách hàng theo doanh thu</h5>
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Khách hàng</th>
                            <th>Email</th>
                            <th class="text-end">Số đơn hoàn thành</th>
                            <th class="text-end">Tổng chi tiêu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($revenueByCustomer as $item)
                            <tr>
                                <td>{{ $item->customer_name }}</td>
                                <td>{{ $item->customer_email ?: '—' }}</td>
                                <td class="text-end">{{ number_format($item->total_orders) }}</td>
                                <td class="text-end fw-semibold">{{ number_format($item->revenue, 0, ',', '.') }} đ</td>
                            </tr>
                        @empty
                            <tr><td colspan="4" class="text-center text-muted py-4">Chưa có dữ liệu.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Doanh thu theo phương thức thanh toán --}}
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <h5 class="fw-bold mb-3">Doanh thu theo phương thức thanh toán</h5>
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Phương thức</th>
                            <th class="text-end">Số đơn</th>
                            <th class="text-end">Doanh thu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($revenueByPayment as $item)
                            <tr>
                                <td>{{ strtoupper($item->payment_method ?? 'Chưa xác định') }}</td>
                                <td class="text-end">{{ number_format($item->total_orders) }}</td>
                                <td class="text-end fw-semibold">{{ number_format($item->revenue, 0, ',', '.') }} đ</td>
                            </tr>
                        @empty
                            <tr><td colspan="3" class="text-center text-muted py-4">Chưa có dữ liệu.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection