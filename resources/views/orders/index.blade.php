<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch Sử Đơn Hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold">Lịch Sử Đơn Hàng Của Bạn</h2>
            <a href="{{ url('/') }}" class="btn btn-outline-secondary">Về Trang Chủ</a>
        </div>

        @if(isset($orders) && count($orders) > 0)
        <div class="card shadow-sm p-3">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Mã đơn</th>
                            <th>Ngày đặt</th>
                            <th>Người nhận</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái</th>
                            <th class="text-center">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td><strong>#{{ $order->id }}</strong></td>
                            <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                            <td>{{ $order->shipping_name }}<br><small class="text-muted">{{ $order->shipping_phone }}</small></td>
                            <td class="text-danger fw-bold">{{ number_format($order->total_amount) }} đ</td>
                            <td>
                                @switch($order->status)
                                @case('pending')
                                Chờ xác nhận
                                @break
                                @case('confirmed')
                                Đã xác nhận
                                @break
                                @case('processing')
                                Đang xử lý
                                @break
                                @case('shipping')
                                Đang giao hàng
                                @break
                                @case('completed')
                                Đã giao hàng
                                @break
                                @case('cancelled')
                                Đã hủy
                                @break
                                @default
                                {{ ucfirst($order->status) }}
                                @endswitch
                            </td>
                            <td class="text-center">
                                <a href="{{ route('orders.show', $order->id) }}" class="btn btn-sm btn-primary">Chi tiết</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @else
        <div class="alert alert-info text-center">
            Bạn chưa có đơn hàng nào. <a href="{{ route('checkout.index') }}" class="alert-link">Đặt hàng ngay</a>
        </div>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>