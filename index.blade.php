<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn hàng của tôi - Book Store</title>
    <style>
        body { margin: 0; font-family: Arial, sans-serif; background: #FFF3E5; color: #37192C; }
        .wrap { max-width: 860px; margin: 30px auto; padding: 0 16px; }
        .card { background: #fff; border-radius: 16px; padding: 28px; box-shadow: 0 5px 25px rgba(55, 25, 44, 0.12); }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 10px; border-bottom: 1px solid #eee; text-align: left; }
        .error { background: #ffe5e5; color: #b00020; padding: 10px; border-radius: 8px; margin-bottom: 16px; }
        .success { background: #e6f6ea; color: #1b6b32; padding: 10px; border-radius: 8px; margin-bottom: 16px; }
        a { color: #37192C; font-weight: bold; }
    </style>
</head>
<body>
<div class="wrap">
    <div class="card">
        <h1>Đơn hàng của tôi</h1>

        @if (session('success')) <div class="success">{{ session('success') }}</div> @endif
        @if (session('error'))   <div class="error">{{ session('error') }}</div> @endif

        @if ($orders->isEmpty())
            <p>Bạn chưa có đơn hàng nào.</p>
        @else
            <table>
                <tr><th>Mã đơn</th><th>Ngày đặt</th><th>Tổng tiền</th><th>Trạng thái</th><th></th></tr>
                @foreach ($orders as $order)
                    <tr>
                        <td>DH{{ $order->id }}</td>
                        <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                        <td>{{ number_format($order->total_amount, 0, ',', '.') }}đ</td>
                        <td>{{ $order->status }}</td>
                        <td><a href="{{ route('orders.show', $order) }}">Chi tiết</a></td>
                    </tr>
                @endforeach
            </table>

            <div style="margin-top:16px">{{ $orders->links() }}</div>
        @endif

        <p><a href="/">Về trang chủ</a></p>
    </div>
</div>
</body>
</html>
