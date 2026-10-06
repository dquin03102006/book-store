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
        <form action="/" method="GET">
            <input
                type="text"
                name="keyword"
                placeholder="Tìm tên sách hoặc tác giả..."
                value="{{ $keyword ?? '' }}">

            <button type="submit">Tìm kiếm</button>
        </form>
        <form action="/" method="GET">
            <select name="category">
                <option value="">Tất cả danh mục</option>

                @foreach ($categories as $item)
                <option value="{{ $item->id }}"
                    {{ ($category ?? '') == $item->id ? 'selected' : '' }}>
                    {{ $item->name }}
                </option>
                @endforeach
            </select>

            <select name="price">
                <option value="">Tất cả mức giá</option>
                <option value="under100" {{ ($price ?? '') == 'under100' ? 'selected' : '' }}>
                    Dưới 100.000đ
                </option>
                <option value="100to150" {{ ($price ?? '') == '100to150' ? 'selected' : '' }}>
                    100.000đ - 150.000đ
                </option>
                <option value="over150" {{ ($price ?? '') == 'over150' ? 'selected' : '' }}>
                    Trên 150.000đ
                </option>
            </select>

            <button type="submit">Lọc</button>
            <select name="sort">
                <option value="">Mặc định</option>
                <option value="price_asc" {{ ($sort ?? '') == 'price_asc' ? 'selected' : '' }}>
                    Giá thấp → cao
                </option>
                <option value="price_desc" {{ ($sort ?? '') == 'price_desc' ? 'selected' : '' }}>
                    Giá cao → thấp
                </option>
                <option value="latest" {{ ($sort ?? '') == 'latest' ? 'selected' : '' }}>
                    Mới nhất
                </option>
            </select>
        </form>
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
                <a href="/book/{{ $book->id }}">Xem chi tiết</a>
            </div>
            @endforeach

        </div>
    </section>

</body>

</html>