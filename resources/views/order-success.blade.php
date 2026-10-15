<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt Hàng Thành Công</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm p-4 text-center">
                <div class="mb-3">
                    <span class="text-success display-1">✔</span>
                </div>
                <h2 class="fw-bold text-success mb-3">Đặt Hàng Thành Công!</h2>
                <p class="text-muted">Cảm ơn bạn đã mua hàng. Đơn hàng của bạn đã được ghi nhận vào hệ thống.</p>
                
                <div class="card bg-light p-3 text-start my-4">
                    <h5 class="fw-bold mb-3">Mã đơn hàng: #{{ $order->id }}</h5>
                    <p class="mb-1"><strong>Họ tên người nhận:</strong> {{ $order->shipping_name }}</p>
                    <p class="mb-1"><strong>Số điện thoại:</strong> {{ $order->shipping_phone }}</p>
                    <p class="mb-1"><strong>Địa chỉ giao hàng:</strong> {{ $order->shipping_address }}</p>
                    <p class="mb-1"><strong>Phương thức thanh toán:</strong> {{ $order->payment_method }}</p>
                    <p class="mb-0"><strong>Tổng tiền:</strong> <span class="text-danger fw-bold">{{ number_format($order->total_amount) }} đ</span></p>
                </div>

                <div class="d-flex justify-content-center gap-3">
                    <a href="{{ url('/') }}" class="btn btn-outline-primary px-4">Về Trang Chủ</a>
                    <a href="{{ url('/my-orders') }}" class="btn btn-primary px-4">Xem Lịch Sử Đơn Hàng</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>