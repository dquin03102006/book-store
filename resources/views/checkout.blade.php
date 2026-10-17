<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh Toán Đơn Hàng</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container py-5">
        <h2 class="text-center fw-bold mb-4">Thanh Toán Đơn Hàng</h2>

        <!-- Thông báo lỗi nếu có -->
        @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Vui lòng kiểm tra lại thông tin:</strong>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('checkout.process') }}" method="POST">
            @csrf
            <div class="row">
                <!-- Cột thông tin giao hàng -->
                <div class="col-md-7">
                    <div class="card p-4 shadow-sm mb-4">
                        <h4 class="fw-bold mb-3">1. Thông tin giao hàng</h4>

                        <div class="mb-3">
                            <label class="form-label">Họ tên người nhận</label>
                            <input type="text" name="shipping_name" class="form-control" value="{{ old('shipping_name', auth()->user()?->name ?? '') }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Số điện thoại</label>
                            <input type="tel" name="shipping_phone" class="form-control"
                                value="{{ old('shipping_phone') }}"
                                maxlength="10"
                                oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                placeholder="Nhập đúng 10 chữ số" required>
                            <small class="text-muted">Chỉ nhập số và giới hạn chính xác 10 chữ số.</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Địa chỉ giao hàng chi tiết</label>
                            <textarea name="shipping_address" class="form-control" rows="3" required>{{ old('shipping_address') }}</textarea>
                        </div>
                    </div>

                    <div class="card p-4 shadow-sm">
                        <h4 class="fw-bold mb-3">2. Phương thức thanh toán</h4>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="payment_method" id="cod" value="COD" checked>
                            <label class="form-check-label" for="cod">Thanh toán khi nhận hàng (COD)</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment_method" id="banking" value="Banking">
                            <label class="form-check-label" for="banking">Chuyển khoản ngân hàng / Ví điện tử</label>
                        </div>
                    </div>
                </div>

                <!-- Cột xác nhận đơn hàng và giỏ hàng -->
                <div class="col-md-5">
                    <div class="card p-4 shadow-sm">
                        <h4 class="fw-bold mb-3">Đơn hàng của bạn</h4>

                        @if(isset($cart) && count($cart) > 0)
                        @foreach($cart as $item)
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <div>
                                <strong>{{ $item['title'] }}</strong><br>
                                <small class="text-muted">Số lượng: {{ $item['quantity'] }}</small>
                            </div>
                            <span>{{ number_format($item['price'] * $item['quantity']) }} đ</span>
                        </div>
                        <hr class="my-2">
                        @endforeach
                        @endif

                        <div class="d-flex justify-content-between text-muted my-2">
                            <span>Phí vận chuyển:</span>
                            <span>0 đ</span>
                        </div>

                        <hr>

                        <div class="d-flex justify-content-between fw-bold fs-5 mb-4">
                            <span>Tổng cộng:</span>
                            <span class="text-danger">{{ number_format($total ?? 0) }} đ</span>
                        </div>
                        <input type="hidden" name="buy_now" value="{{ $isBuyNow ? '1' : '0' }}">
                        <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">Xác Nhận Đặt Hàng</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>