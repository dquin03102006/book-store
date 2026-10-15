<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh Toán Đơn Hàng</title>
    <!-- Nhúng Bootstrap 5 để giao diện đẹp ngay lập tức -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <h2 class="mb-4 fw-bold text-center">Thanh Toán Đơn Hàng</h2>

        <div class="row">
            <!-- Cột bên trái: Thông tin giao hàng -->
            <div class="col-md-8">
                <div class="card shadow-sm p-4 mb-4">
                    <h4 class="mb-3">1. Thông tin giao hàng</h4>
                    
                    <form action="{{ route('checkout.process') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="name" class="form-label">Họ tên người nhận</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', Auth::user()?->name) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Số điện thoại</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Địa chỉ giao hàng chi tiết</label>
                            <textarea class="form-control" id="address" name="address" rows="3" required>{{ old('address') }}</textarea>
                        </div>

                        <h4 class="mt-4 mb-3">2. Phương thức thanh toán</h4>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="payment_method" id="cod" value="cod" checked>
                            <label class="form-check-label" for="cod">
                                Thanh toán khi nhận hàng (COD)
                            </label>
                        </div>
                        <div class="form-check mb-4">
                            <input class="form-check-input" type="radio" name="payment_method" id="banking" value="banking">
                            <label class="form-check-label" for="banking">
                                Chuyển khoản ngân hàng / Ví điện tử
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg w-100">Xác Nhận Đặt Hàng</button>
                    </form>
                </div>
            </div>

            <!-- Cột bên phải: Tóm tắt giỏ hàng -->
            <div class="col-md-4">
                <div class="card shadow-sm p-4">
                    <h4 class="mb-3">Đơn hàng của bạn</h4>
                    <ul class="list-group list-group-flush mb-3">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Sách Laravel Cơ Bản
                            <span>150,000 đ</span>
                        </li>
                    </ul>
                    <hr>
                    <div class="d-flex justify-content-between fw-bold">
                        <span>Tổng cộng:</span>
                        <span class="text-danger">150,000 đ</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>