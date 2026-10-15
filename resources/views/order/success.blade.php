<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt hàng thành công</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-light d-flex align-items-center justify-content-center" style="min-height: 100vh;">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow-lg border-0 rounded-4 p-4 text-center bg-white">
                    
                    <!-- Biểu tượng thành công -->
                    <div class="mb-3">
                        <div class="d-inline-flex align-items-center justify-content-center bg-success bg-opacity-10 text-success rounded-circle" style="width: 80px; height: 80px;">
                            <i class="fa-solid fa-check fa-2x"></i>
                        </div>
                    </div>

                    <!-- Tiêu đề -->
                    <h3 class="fw-bold text-dark mb-2">Đặt Hàng Thành Công!</h3>
                    <p class="text-muted mb-4">Cảm ơn bạn đã mua sắm tại cửa hàng sách của chúng tôi. Đơn hàng của bạn đã được ghi nhận.</p>

                    <!-- Chi tiết mã đơn hàng -->
                    <div class="bg-light rounded-3 p-3 mb-4 border">
                        <span class="text-muted small d-block mb-1">Mã đơn hàng của bạn:</span>
                        <strong class="fs-5 text-primary">#{{ $order ?? '101' }}</strong>
                    </div>

                    <!-- Các nút điều hướng -->
                    <div class="d-grid gap-2">
                        <a href="{{ route('orders.history') }}" class="btn btn-primary py-2 fw-semibold">
                            <i class="fa-solid fa-clock-rotate-left me-2"></i> Xem Lịch Sử Đơn Hàng
                        </a>
                        <a href="{{ url('/') }}" class="btn btn-outline-secondary py-2 fw-semibold">
                            <i class="fa-solid fa-house me-2"></i> Về Trang Chủ
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>

</body>
</html>