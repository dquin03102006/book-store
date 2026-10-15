@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="text-center fw-bold mb-4">Thanh Toán Đơn Hàng</h2>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('checkout.process') }}" method="POST">
        @csrf
        <div class="row">
            <!-- Cột 1: Thông tin giao hàng & Thanh toán -->
            <div class="col-md-7">
                <div class="card p-4 shadow-sm mb-4">
                    <h4 class="fw-bold mb-3">1. Thông tin giao hàng</h4>
                    
                    <div class="mb-3">
                        <label class="form-label">Họ tên người nhận</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', auth()->user()->name ?? '') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Số điện thoại</label>
                        <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Địa chỉ giao hàng chi tiết</label>
                        <textarea name="address" class="form-control" rows="3" required>{{ old('address') }}</textarea>
                    </div>
                </div>

                <div class="card p-4 shadow-sm">
                    <h4 class="fw-bold mb-3">2. Phương thức thanh toán</h4>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="payment_method" id="cod" value="COD" checked>
                        <label class="form-check-label" for="cod">
                            Thanh toán khi nhận hàng (COD)
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment_method" id="banking" value="Banking">
                        <label class="form-check-label" for="banking">
                            Chuyển khoản ngân hàng / Ví điện tử
                        </label>
                    </div>
                </div>
            </div>

            <!-- Cột 2: Tóm tắt đơn hàng của bạn -->
            <div class="col-md-5">
                <div class="card p-4 shadow-sm">
                    <h4 class="fw-bold mb-3">Đơn hàng của bạn</h4>

                    @if(isset($cart) && count($cart) > 0)
                        @foreach($cart as $item)
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <div>
                                    <strong>{{ $item['name'] }}</strong>
                                    <br>
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
                        <span class="text-danger">{{ number_format($total ?? 150000) }} đ</span>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">Xác Nhận Đặt Hàng</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
