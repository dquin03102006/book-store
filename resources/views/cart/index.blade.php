<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            margin: 0;
            padding: 40px;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
        }

        .success {
            background: #d4edda;
            color: #155724;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .error {
            background: #f8d7da;
            color: #721c24;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .cart-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            padding: 20px 0;
            border-bottom: 1px solid #ddd;
        }

        .book-info {
            flex: 1;
        }

        .price {
            color: #e53935;
            font-weight: bold;
        }

        .quantity input {
            width: 60px;
            padding: 8px;
            text-align: center;
        }

        button {
            border: none;
            padding: 8px 14px;
            border-radius: 6px;
            cursor: pointer;
        }

        .update {
            background: #2196f3;
            color: white;
        }

        .delete {
            background: #e53935;
            color: white;
        }

        .coupon-box {
            margin-top: 25px;
            padding: 20px;
            background: #f8f9fa;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        .coupon-box input {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            max-width: 90%;
        }

        .apply {
            background: #28a745;
            color: white;
        }

        .remove-coupon {
            background: #6c757d;
            color: white;
        }

        .summary {
            margin-top: 25px;
            padding-top: 15px;
            border-top: 1px solid #ddd;
        }

        .summary p,
        .final-total {
            text-align: right;
            font-size: 18px;
        }

        .discount {
            color: #28a745;
            font-weight: bold;
        }

        .final-total {
            margin-top: 20px;
            font-size: 22px;
            font-weight: bold;
            color: #e53935;
        }

        .empty {
            text-align: center;
            padding: 40px;
            color: #777;
        }

        .back {
            display: inline-block;
            margin-top: 25px;
            text-decoration: none;
            color: #2196f3;
        }

        @media (max-width: 700px) {
            body {
                padding: 12px;
            }

            .container {
                padding: 18px;
            }

            .cart-item {
                flex-wrap: wrap;
            }
        }
    </style>
</head>

<body>
<div class="container">

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

    @else
        <div class="empty">
            <h2>Giỏ hàng đang trống</h2>
            <p>Chưa có sản phẩm nào trong giỏ hàng.</p>
        </div>
    @endif

    <a href="{{ route('books.index') }}" class="back">
        ← Tiếp tục mua sách
    </a>

</div>
</body>
</html>
