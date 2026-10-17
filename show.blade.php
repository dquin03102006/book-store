<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết đơn hàng - Tiệm Sách Nhỏ</title>
    <style>
        body { margin: 0; font-family: Arial, sans-serif; background: #FFF3E5; color: #37192C; }
        .wrap { max-width: 860px; margin: 30px auto; padding: 0 16px; }
        .card { background: #fff; border-radius: 16px; padding: 28px; box-shadow: 0 5px 25px rgba(55, 25, 44, 0.12); }
        table { width: 100%; border-collapse: collapse; margin: 14px 0; }
        th, td { padding: 10px; border-bottom: 1px solid #eee; text-align: left; }
        button { padding: 10px 20px; border: none; border-radius: 8px; background: #b00020; color: #fff; cursor: pointer; }
        .error { background: #ffe5e5; color: #b00020; padding: 10px; border-radius: 8px; margin-bottom: 16px; }
        .success { background: #e6f6ea; color: #1b6b32; padding: 10px; border-radius: 8px; margin-bottom: 16px; }
        a { color: #37192C; font-weight: bold; }
    </style>
</head>
<body>
<div class="wrap">
    <div class="card">
        <h1>Đơn hàng DH{{ $order->id }}</h1>

        @if (session('success')) <div class="success">{{ session('success') }}</div> @endif
        @if (session('error'))   <div class="error">{{ session('error') }}</div> @endif

        <p>Trạng thái: <strong>{{ $order->status }}</strong></p>
        <p>Người nhận: {{ $order->shipping_name }} - {{ $order->shipping_phone }}</p>
        <p>Địa chỉ: {{ $order->shipping_address }}</p>
        <p>Thanh toán: {{ $order->payment_method === 'cod' ? 'Khi nhận hàng' : 'Chuyển khoản' }}</p>

        <table>
            <tr><th>Sách</th><th>Giá</th><th>SL</th><th>Thành tiền</th></tr>
            @foreach ($order->items as $item)
                <tr>
                    <td>{{ $item->book->title ?? 'Sách đã xóa' }}</td>
                    <td>{{ number_format($item->price, 0, ',', '.') }}đ</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ number_format($item->price * $item->quantity, 0, ',', '.') }}đ</td>
                </tr>
            @endforeach
        </table>

        <p><strong>Tổng cộng: {{ number_format($order->total_amount, 0, ',', '.') }}đ</strong></p>

        @if ($order->status === 'pending')
            <form action="{{ route('orders.cancel', $order) }}" method="POST"
                  onsubmit="return confirm('Bạn chắc chắn muốn hủy đơn này?')">
                @csrf
                <button type="submit">Hủy đơn hàng</button>
            </form>
        @endif

        <p><a href="{{ route('orders.index') }}">&larr; Quay lại danh sách</a></p>
    </div>
</div>
</body>
</html>
