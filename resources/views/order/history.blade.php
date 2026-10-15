<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch sử đơn hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <h2 class="mb-4 fw-bold">Lịch Sử Đơn Hàng Của Bạn</h2>
        
        <a href="{{ route('profile.edit') }}" class="btn btn-secondary mb-3">&larr; Quay lại trang cá nhân</a>

        <div class="card shadow-sm p-4">
            <table class="table table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Ngày đặt</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!empty($orders))
                        @foreach($orders as $order)
                            <tr>
                                <td>#{{ $order['id'] }}</td>
                                <td>{{ $order['created_at'] }}</td>
                                <td>{{ number_format($order['total_price']) }} đ</td>
                                <td>
                                    <span class="badge bg-success">{{ $order['status'] }}</span>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4" class="text-center text-muted py-4">Bạn chưa có đơn hàng nào.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>