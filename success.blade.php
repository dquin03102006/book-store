<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt hàng thành công - Tiệm Sách Nhỏ</title>
    <style>
        body { margin: 0; font-family: Arial, sans-serif; background: #FFF3E5; color: #37192C; }
        .wrap { max-width: 560px; margin: 40px auto; padding: 0 16px; }
        .card { background: #fff; border-radius: 16px; padding: 32px; box-shadow: 0 5px 25px rgba(55, 25, 44, 0.12); }
        a { color: #37192C; font-weight: bold; }
    </style>
</head>
<body>
<div class="wrap">
    <div class="card">
        <h1>Cảm ơn bạn đã đặt hàng!</h1>

        <p>Mã đơn hàng: <strong>DH{{ $order->id }}</strong></p>
        <p>Tổng tiền: <strong>{{ number_format($order->total_amount, 0, ',', '.') }}đ</strong></p>
        <p>Phương thức: {{ $order->payment_method === 'cod' ? 'Thanh toán khi nhận hàng' : 'Chuyển khoản ngân hàng' }}</p>

        @if ($order->payment_method === 'bank')
            <h3>Thông tin chuyển khoản</h3>
            <p>Ngân hàng: ... (điền thông tin của cửa hàng)</p>
            <p>Số tài khoản: ...</p>
            <p>Chủ tài khoản: ...</p>
            <p>Nội dung chuyển khoản: <strong>DH{{ $order->id }}</strong></p>
        @endif

        <p>
            <a href="{{ route('orders.show', $order) }}">Xem chi tiết đơn</a> &nbsp;|&nbsp;
            <a href="{{ route('orders.index') }}">Đơn hàng của tôi</a> &nbsp;|&nbsp;
            <a href="/">Về trang chủ</a>
        </p>
    </div>
</div>
</body>
</html>
