<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #fffcf5;
            color: #212842;
            margin: 0;
            padding: 40px 24px;
        }

        .container {
            max-width: 1160px;
            margin: auto;
            background: transparent;
            padding: 0;
        }

        h1 {
            font-size: 30px;
            margin: 0 0 28px;
            color: #212842;
        }

        .success,
        .error {
            padding: 14px 18px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .success {
            background: #e8f5e9;
            color: #25633a;
        }

        .error {
            background: #fff0ee;
            color: #b42318;
        }

        .back-to-shop {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-bottom: 20px;
            color: #212842;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            transition: color 0.2s ease;
        }

        .back-to-shop:hover {
            color: #647da8;
        }

        .cart-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 22px;
            padding: 24px;
            margin-bottom: 14px;
            background: #fff;
            border: 1px solid #eee9df;
            border-radius: 16px;
            box-shadow: 0 4px 14px rgba(33, 40, 66, .04);
        }

        .book-cover {
            width: 100px;
            height: 135px;
            flex-shrink: 0;
            overflow: hidden;
            border-radius: 8px;
            background: #f1eee7;
            box-shadow: 0 3px 10px rgba(33, 40, 66, .10);
        }

        .book-cover img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .book-cover-placeholder {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 8px;
            color: #777;
            font-size: 12px;
        }

        .cart-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            padding: 24px;
            margin-bottom: 14px;
            background: #fff;
            border: 1px solid #eee9df;
            border-radius: 16px;
            box-shadow: 0 4px 14px rgba(33, 40, 66, .04);
        }

        .book-info {
            flex: 1;
            min-width: 120px;
        }

        @media (max-width: 800px) {
            .book-cover {
                width: 80px;
                height: 110px;
            }
        }

        .book-info {
            flex: 1;
            min-width: 140px;
        }

        .book-info h3 {
            margin: 0 0 8px;
            font-size: 17px;
            line-height: 1.5;
            color: #212842;
        }

        .book-info p {
            margin: 5px 0;
            font-size: 14px;
            color: #777;
        }

        .book-info .price {
            color: #212842;
            font-weight: 700;
            font-size: 16px;
        }

        .quantity form {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
        }

        .quantity input {
            width: 64px;
            padding: 10px 6px;
            text-align: center;
            border: 1px solid #dce3ec;
            border-radius: 8px;
            color: #212842;
            background: #fffcf5;
            font-size: 14px;
        }

        button {
            border: none;
            padding: 10px 14px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 600;
            transition: .2s;
        }

        .update {
            background: #BED9F4;
            color: #212842;
        }

        .update:hover {
            background: #a9c9eb;
        }

        .delete {
            background: #fff0ee;
            color: #b42318;
        }

        .delete:hover {
            background: #ffe0dc;
        }

        .coupon-box {
            margin-top: 28px;
            padding: 24px;
            background: #fff;
            border: 1px solid #eee9df;
            border-radius: 16px;
        }

        .coupon-box h3 {
            margin: 0 0 16px;
            font-size: 18px;
        }

        .coupon-box input {
            width: min(100%, 320px);
            padding: 12px 14px;
            border: 1px solid #dce3ec;
            border-radius: 8px;
            outline: none;
            font-size: 14px;
        }

        .coupon-box input:focus {
            border-color: #829fc4;
            box-shadow: 0 0 0 3px rgba(190, 217, 244, .3);
        }

        .apply {
            background: #212842;
            color: #fff;
            margin-left: 6px;
        }

        .apply:hover {
            background: #344264;
        }

        .remove-coupon {
            background: #f0f2f6;
            color: #212842;
        }

        .summary {
            max-width: 460px;
            margin: 24px 0 0 auto;
            padding: 24px;
            background: #fff;
            border: 1px solid #eee9df;
            border-radius: 16px;
        }

        .summary p {
            display: flex;
            justify-content: space-between;
            gap: 16px;
            margin: 0 0 16px;
            font-size: 14px;
            color: #666;
        }

        .summary p strong {
            color: #212842;
            white-space: nowrap;
        }

        .summary .discount {
            color: #27824a;
        }

        .summary .discount strong {
            color: #27824a;
        }

        .final-total {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            border-top: 1px solid #eee9df;
            padding-top: 18px;
            margin-top: 8px;
            font-size: 17px;
            font-weight: 700;
            color: #212842;
        }

        .empty {
            text-align: center;
            padding: 60px 20px;
            background: #fff;
            border: 1px solid #eee9df;
            border-radius: 16px;
        }

        .empty h2 {
            font-size: 23px;
            margin: 0 0 10px;
        }

        .empty p {
            color: #777;
            font-size: 14px;
        }

        .back {
            display: inline-block;
            margin-top: 26px;
            text-decoration: none;
            color: #344264;
            font-size: 14px;
            font-weight: 600;
        }

        .back:hover {
            color: #6689b7;
        }

        .checkout-button {
            display: inline-block;
            background: #212842;
            color: #fff;
            padding: 13px 28px;
            border-radius: 9px;
            text-decoration: none;
            font-weight: 700;
            font-size: 14px;
            transition: .2s;
        }

        .checkout-button:hover {
            background: #344264;
            transform: translateY(-2px);
        }

        @media (max-width: 800px) {
            body {
                padding: 28px 16px;
            }

            .cart-item {
                flex-wrap: wrap;
                gap: 16px;
            }

            .book-info {
                flex-basis: 100%;
            }

            .summary {
                max-width: 100%;
            }
        }

        @media (max-width: 480px) {
            h1 {
                font-size: 25px;
            }

            .cart-item,
            .coupon-box,
            .summary {
                padding: 18px;
            }

            .quantity form {
                gap: 6px;
            }

            .coupon-box input {
                width: 100%;
            }

            .apply {
                margin: 10px 0 0;
            }

            .final-total {
                font-size: 15px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <a href="{{ url('/') }}" class="back-to-shop">
            ← Tiếp tục mua sách
        </a>

        <h1>🛒 Giỏ hàng</h1>

        @if (session('success'))
        <div class="success">{{ session('success') }}</div>
        @endif

        @if ($errors->has('code'))
        <div class="error">{{ $errors->first('code') }}</div>
        @endif

        @php
        $cart = session('cart', []);
        $total = 0;
        $discount = $discount ?? 0;
        $coupon = $coupon ?? null;
        @endphp

        @if (count($cart) > 0)

        @foreach ($cart as $id => $item)
        @php
        $subtotal = $item['price'] * $item['quantity'];
        $total += $subtotal;
        @endphp

        <div class="cart-item">
            <div class="book-cover">
                @if (!empty($item['image']))
                <img
                    src="{{ asset('images/books/' . $item['image']) }}"
                    alt="{{ $item['title'] }}"
                    onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                <div class="book-cover-placeholder" style="display: none;">
                    Không có ảnh
                </div>
                @else
                <div class="book-cover-placeholder">
                    Không có ảnh
                </div>
                @endif
            </div>

            <div class="book-info">
                <h3>{{ $item['title'] }}</h3>
                <p>Tác giả: {{ $item['author'] }}</p>
                <p class="price">
                    {{ number_format($item['price'], 0, ',', '.') }} đ
                </p>
            </div>

            <div class="quantity">
                <form action="{{ route('cart.update', $id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <input type="number" name="quantity"
                        value="{{ $item['quantity'] }}" min="1" required>

                    <button class="update" type="submit">Cập nhật</button>
                </form>
            </div>

            <strong>{{ number_format($subtotal, 0, ',', '.') }} đ</strong>

            <form action="{{ route('cart.remove', $id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="delete" type="submit">Xóa</button>
            </form>
        </div>
        @endforeach

        <div class="coupon-box">
            <h3>🎁 Mã khuyến mãi</h3>

            @if ($coupon)
            <p>Mã đang áp dụng: <strong>{{ $coupon->code }}</strong></p>

            <form action="{{ route('cart.removeCoupon') }}" method="POST">
                @csrf
                <button class="remove-coupon" type="submit">
                    Gỡ mã khuyến mãi
                </button>
            </form>
            @else
            <form action="{{ route('cart.applyCoupon') }}" method="POST">
                @csrf

                <input type="text" name="code"
                    placeholder="Nhập mã khuyến mãi"
                    value="{{ old('code') }}" required>

                <button class="apply" type="submit">Áp dụng</button>
            </form>
            @endif
        </div>

        <div class="summary">
            <p>
                Tổng tiền hàng:
                <strong>{{ number_format($total, 0, ',', '.') }} đ</strong>
            </p>

            @if ($coupon && $discount > 0)
            <p class="discount">
                Tiền được giảm:
                -{{ number_format($discount, 0, ',', '.') }} đ
            </p>
            @endif

            <div class="final-total">
                Thành tiền:
                {{ number_format(max(0, $total - $discount), 0, ',', '.') }} đ
            </div>
        </div>

        <div style="text-align: right; margin-top: 20px;">
            <a href="{{ route('checkout.index') }}"
                style="display: inline-block; background: #212842; color: white;
              padding: 12px 24px; border-radius: 8px;
              text-decoration: none; font-weight: bold;">
                Thanh toán
            </a>
        </div>


        @else
        <div class="empty">
            <h2>Giỏ hàng đang trống</h2>
            <p>Chưa có sản phẩm nào trong giỏ hàng.</p>
        </div>
        @endif

    </div>
</body>

</html>