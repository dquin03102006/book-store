<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách sách</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            margin: 0;
            padding: 30px;
        }

        .menu {
            background: white;
            padding: 15px 25px;
            margin-bottom: 30px;
            border-radius: 10px;
            display: flex;
            justify-content: space-between;
        }

        .menu a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }

        .books {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .book {
            background: white;
            padding: 20px;
            border-radius: 10px;
        }

        .book h3 {
            margin-top: 0;
        }

        .price {
            color: red;
            font-weight: bold;
        }

        .btn {
            display: inline-block;
            background: #2196f3;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 6px;
            cursor: pointer;
        }
    </style>
</head>

<body>

<div class="menu">
    <a href="{{ url('/') }}">🏠 Trang chủ</a>

    <a href="{{ route('cart.index') }}">
        🛒 Giỏ hàng ({{ count(session('cart', [])) }})
    </a>
</div>

<h1>📚 Danh sách sách</h1>

<div class="books">

    @foreach ($books as $book)

        <div class="book">

            <h3>{{ $book->title }}</h3>

            <p>
                Tác giả: {{ $book->author }}
            </p>

            <p class="price">
                {{ number_format($book->price, 0, ',', '.') }} đ
            </p>

            <form action="{{ route('cart.add', $book->id) }}" method="POST">
                @csrf

                <button class="btn" type="submit">
                    🛒 Thêm vào giỏ hàng
                </button>
            </form>

        </div>

    @endforeach

</div>

</body>
</html>