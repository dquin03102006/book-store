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

    h1 {
        margin-bottom: 25px;
    }

    .success {
        background: #d4edda;
        color: #155724;
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

    .book-info h3 {
        margin: 0 0 8px;
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

    .total {
        text-align: right;
        margin-top: 25px;
        font-size: 20px;
        font-weight: bold;
    }

    .empty {
        text-align: center;
        padding: 40px;
        color: #777;
    }
</style>


</head>

<body>

<div class="container">


<h1>🛒 Giỏ hàng</h1>

@if (session('success'))
    <div class="success">
        {{ session('success') }}
    </div>
@endif

@php
    $cart = session('cart', []);
    $total = 0;
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

                <p>
                    Tác giả: {{ $item['author'] }}
                </p>

                <p class="price">
                    {{ number_format($item['price'], 0, ',', '.') }} đ
                </p>
            </div>

            <div class="quantity">
                <form action="{{ route('cart.update', $id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <input
                        type="number"
                        name="quantity"
                        value="{{ $item['quantity'] }}"
                        min="1"
                    >

                    <button class="update" type="submit">
                        Cập nhật
                    </button>

                </form>
            </div>

            <div>
                <strong>
                    {{ number_format($subtotal, 0, ',', '.') }} đ
                </strong>
            </div>

            <div>
                <form action="{{ route('cart.remove', $id) }}" method="POST">

                    @csrf
                    @method('DELETE')

                    <button class="delete" type="submit">
                        Xóa
                    </button>

                </form>
            </div>

        </div>

    @endforeach

    <div class="total">
        Tổng tiền:
        {{ number_format($total, 0, ',', '.') }} đ
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
