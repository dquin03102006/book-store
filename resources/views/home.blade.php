<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Store</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f5f5;
        }

        header {
            background: #ffffff;
            padding: 20px 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        header h1 {
            margin: 0;
            color: #333;
        }

        nav a {
            margin-left: 20px;
            text-decoration: none;
            color: #333;
        }

        .banner {
            background: #ddd;
            padding: 60px;
            text-align: center;
        }

        .banner h2 {
            font-size: 32px;
            margin-bottom: 10px;
        }

        .products {
            padding: 40px 50px;
        }

        .products h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        .product-list {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .product {
            background: white;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
        }

        .product h3 {
            margin-bottom: 10px;
        }

        .price {
            color: #e53935;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <header>
        <h1>BOOK STORE</h1>

        <nav>
            <a href="/">Trang chủ</a>
            <a href="#">Sản phẩm</a>
            <a href="#">Giỏ hàng</a>
            <a href="#">Đăng nhập</a>
        </nav>
    </header>

    <section class="banner">
        <h2>Chào mừng đến với Book Store</h2>
        <p>Khám phá những cuốn sách hay dành cho bạn</p>
    </section>

    <section class="products">
        <h2>Sách nổi bật</h2>

        <div class="product-list">

            @foreach ($books as $book)
            <div class="product">
                <h3>{{ $book->title }}</h3>
                <p>{{ $book->author }}</p>
                <p class="price">
                    {{ number_format($book->price, 0, ',', '.') }} VNĐ
                </p>
            </div>
            @endforeach

        </div>
    </section>

</body>

</html>