<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Đơn Hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Chi Tiết Đơn Hàng #{{ $order->id }}</h2>
        <a href="{{ route('orders.index') }}" class="btn btn-outline-secondary">
            Quay lại lịch sử đơn hàng
        </a>
    </div>

    <div class="card shadow-sm p-4 mb-4">
        <h4 class="fw-bold mb-3">Thông tin giao hàng</h4>
        <p><strong>Người nhận:</strong> {{ $order->shipping_name }}</p>
        <p><strong>Số điện thoại:</strong> {{ $order->shipping_phone }}</p>
        <p><strong>Địa chỉ:</strong> {{ $order->shipping_address }}</p>
        <p><strong>Phương thức thanh toán:</strong> {{ $order->payment_method }}</p>
        <p><strong>Trạng thái:</strong> {{ ucfirst($order->status) }}</p>
        <p class="mb-0"><strong>Ngày đặt:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
    </div>

    <div class="card shadow-sm p-4">
        <h4 class="fw-bold mb-3">Sản phẩm đã đặt</h4>

        @if($order->items->isNotEmpty())
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->items as $item)
                            <tr>
                                <td>
                                    {{ $item->book?->title ?? 'Sách không còn tồn tại' }}
                                </td>
                                <td>{{ number_format($item->price) }} đ</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ number_format($item->price * $item->quantity) }} đ</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="text-muted">Đơn hàng chưa có sản phẩm chi tiết.</p>
        @endif

        <div class="text-end fs-5 fw-bold">
            Tổng tiền:
            <span class="text-danger">{{ number_format($order->total_amount) }} đ</span>
        </div>
    </div>
</div>

</body>
</html>