<!DOCTYPE html>

<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Store</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f7f4ef;
            color: #2f2f2f;
        }

        /* HEADER */
        header {
            background: #ffffff;
            padding: 18px 60px;
            display: flex;
            align-items: center;
            gap: 35px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .logo {
            font-size: 25px;
            font-weight: bold;
            color: #4b3621;
            white-space: nowrap;
        }

        nav {
            display: flex;
            gap: 22px;
            white-space: nowrap;
        }

        nav a {
            text-decoration: none;
            color: #444;
            font-size: 15px;
            font-weight: 500;
            transition: 0.2s;
        }

        nav a:hover {
            color: #37192C;
        }

        .search-form {
            margin-left: auto;
            display: flex;
            gap: 8px;
        }

        .search-form input {
            width: 230px;
            padding: 11px 15px;
            border: 1px solid #ddd;
            border-radius: 25px;
            outline: none;
            font-size: 14px;
        }

        .search-form input:focus {
            border-color: #37192C;
        }

        button {
            border: none;
            cursor: pointer;
            background: #4b3621;
            color: white;
            padding: 10px 18px;
            border-radius: 22px;
            font-size: 14px;
            transition: 0.2s;
        }

        button:hover {
            background: #a66a3f;
        }

        .cart-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            color: #37192C;
            text-decoration: none;
            transition: 0.2s;
        }

        .cart-icon:hover {
            color: #37192C;
            transform: scale(1.1);
        }

        /* BANNER */
        .banner {
            margin: 35px 60px;
            height: 300px;
            border-radius: 18px;
            overflow: hidden;
        }

        .banner img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        /* FILTER */
        .filter-box {
            margin: 0 60px 35px;
            padding: 22px;
            background: #ffffff;
            border-radius: 14px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, 0.06);
        }

        .filter-box form {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        select {
            padding: 11px 14px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background: white;
            color: #444;
            min-width: 180px;
            outline: none;
        }

        select:focus {
            border-color: #37192C;
        }

        /* PRODUCTS */
        .products {
            padding: 10px 60px 60px;
        }

        .section-title {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .section-title h2 {
            margin: 0;
            font-size: 27px;
            color: #4b3621;
        }

        .product-list {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 22px;
        }

        .product {
            background: white;
            padding: 24px 20px;
            border-radius: 14px;
            text-align: center;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.06);
            transition: transform 0.25s, box-shadow 0.25s;
        }

        .product:hover {
            transform: translateY(-6px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
        }

        .book-placeholder {
            width: 100%;
            height: 190px;
            background: #FFF3E5;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #8a7765;
            margin-bottom: 18px;
            font-size: 14px;
        }

        .product h3 {
            margin: 8px 0;
            font-size: 17px;
            color: #333;
            min-height: 42px;
        }

        .author {
            color: #777;
            font-size: 14px;
            margin-bottom: 12px;
        }

        .price {
            color: #37192C;
            font-size: 18px;
            font-weight: bold;
            margin: 12px 0 18px;
        }

        .detail-btn {
            display: inline-block;
            padding: 9px 18px;
            border-radius: 20px;
            background: #4b3621;
            color: white;
            text-decoration: none;
            font-size: 14px;
            transition: 0.2s;
        }

        .detail-btn:hover {
            background: #a66a3f;
        }

        /* FOOTER */
        footer {
            margin-top: 50px;
            background: #37192C;
            color: #FFF3E5;
            padding: 45px 60px 20px;
        }

        .footer-content {
            display: grid;
            grid-template-columns: 2fr 1fr 1.5fr 1.5fr;
            gap: 40px;
            max-width: 1200px;
            margin: auto;
        }

        .footer-column h3 {
            margin-top: 0;
            margin-bottom: 18px;
            color: #FFF3E5;
        }

        .footer-column p {
            color: #e8d8d0;
            line-height: 1.7;
            font-size: 14px;
        }

        .footer-column a {
            display: block;
            color: #e8d8d0;
            text-decoration: none;
            margin-bottom: 10px;
            font-size: 14px;
        }

        .footer-column a:hover {
            color: #ffffff;
        }

        .footer-bottom {
            margin-top: 35px;
            padding-top: 18px;
            border-top: 1px solid rgba(255, 243, 229, 0.2);
            text-align: center;
            color: #d8c5bd;
            font-size: 13px;
        }

        /* RESPONSIVE */
        @media (max-width: 1000px) {
            header {
                padding: 18px 30px;
                flex-wrap: wrap;
            }

            .search-form {
                margin-left: 0;
                width: 100%;
            }

            .search-form input {
                flex: 1;
                width: auto;
            }

            .banner,
            .filter-box,
            .products {
                margin-left: 30px;
                margin-right: 30px;
            }

            .products {
                padding-left: 0;
                padding-right: 0;
            }

            .product-list {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 600px) {
            header {
                padding: 16px 20px;
            }

            nav {
                width: 100%;
                justify-content: space-between;
            }

            .banner {
                margin: 20px;
                padding: 50px 20px;
            }

            .banner h2 {
                font-size: 28px;
            }

            .filter-box {
                margin: 0 20px 25px;
            }

            .products {
                margin: 0 20px;
            }

            .product-list {
                grid-template-columns: 1fr;
            }

            select {
                width: 100%;
            }
        }
    </style>


</head>

<body>
    <!-- HEADER -->
    <header>
        <div class="logo">BOOK STORE</div>

        <nav>
            <a href="/">Trang chủ</a>
            <a href="#">Sản phẩm</a>
            <a href="#">Đăng nhập</a>
        </nav>

        <form class="search-form" action="/" method="GET">
            <input
                type="text"
                name="keyword"
                placeholder="Tìm tên sách hoặc tác giả..."
                value="{{ $keyword ?? '' }}">

            <button type="submit">Tìm kiếm</button>
        </form>
        <a href="#" class="cart-icon" title="Giỏ hàng">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="9" cy="20" r="1"></circle>
                <circle cx="19" cy="20" r="1"></circle>
                <path d="M3 4h2l2.4 11.4a2 2 0 0 0 2 1.6h7.6a2 2 0 0 0 2-1.6L21 8H6"></path>
            </svg>
        </a>
    </header>

    <!-- THÔNG BÁO -->
    @if (session('success'))
    <p style="text-align: center; color: #2e7d32;">
        {{ session('success') }}
    </p>
    @endif

    @if (session('error'))
    <p style="text-align: center; color: #c62828;">
        {{ session('error') }}
    </p>
    @endif

    <!-- BANNER -->
    <div class="banner">
        <img src="{{ asset('images/banner.jpg') }}" alt="Book Store Banner">
    </div>

    <!-- FILTER -->
    <section class="filter-box">
        <form action="/" method="GET">

            <select name="category">
                <option value="">Tất cả danh mục</option>

                @foreach ($categories as $item)
                <option
                    value="{{ $item->id }}"
                    {{ ($category ?? '') == $item->id ? 'selected' : '' }}>
                    {{ $item->name }}
                </option>
                @endforeach
            </select>

            <select name="price">
                <option value="">Tất cả mức giá</option>

                <option
                    value="under100"
                    {{ ($price ?? '') == 'under100' ? 'selected' : '' }}>
                    Dưới 100.000đ
                </option>

                <option
                    value="100to150"
                    {{ ($price ?? '') == '100to150' ? 'selected' : '' }}>
                    100.000đ - 150.000đ
                </option>

                <option
                    value="over150"
                    {{ ($price ?? '') == 'over150' ? 'selected' : '' }}>
                    Trên 150.000đ
                </option>
            </select>

            <select name="sort">
                <option value="">Mặc định</option>

                <option
                    value="price_asc"
                    {{ ($sort ?? '') == 'price_asc' ? 'selected' : '' }}>
                    Giá thấp → cao
                </option>

                <option
                    value="price_desc"
                    {{ ($sort ?? '') == 'price_desc' ? 'selected' : '' }}>
                    Giá cao → thấp
                </option>

                <option
                    value="latest"
                    {{ ($sort ?? '') == 'latest' ? 'selected' : '' }}>
                    Mới nhất
                </option>
            </select>

            <button type="submit">Lọc sản phẩm</button>

        </form>
    </section>

    <!-- PRODUCTS -->
    <section class="products">

        <div class="section-title">
            <h2>Sách nổi bật</h2>
        </div>

        <div class="product-list">

            @foreach ($books as $book)

            <div class="product">

                <div class="book-placeholder">
                    Hình ảnh sách
                </div>

                <h3>{{ $book->title }}</h3>

                <p class="author">
                    {{ $book->author }}
                </p>

                <p class="price">
                    {{ number_format($book->price, 0, ',', '.') }} VNĐ
                </p>

                <a
                    class="detail-btn"
                    href="/book/{{ $book->id }}">
                    Xem chi tiết
                </a>

            </div>

            @endforeach

        </div>

    </section>

    <!-- FOOTER -->
    <footer>
        <div class="footer-content">

            <div class="footer-column">
                <h3>BOOK STORE</h3>
                <p>
                    Nơi bạn tìm thấy những cuốn sách hay
                    và những cảm hứng mới mỗi ngày.
                </p>
            </div>

            <div class="footer-column">
                <h3>Liên kết</h3>
                <a href="/">Trang chủ</a>
                <a href="#">Sản phẩm</a>
                <a href="#">Giỏ hàng</a>
                <a href="#">Đăng nhập</a>
            </div>

            <div class="footer-column">
                <h3>Hỗ trợ</h3>
                <a href="#">Chính sách mua hàng</a>
                <a href="#">Chính sách đổi trả</a>
                <a href="#">Liên hệ</a>
            </div>

            <div class="footer-column">
                <h3>Liên hệ</h3>
                <p>Email: bookstore@gmail.com</p>
                <p>Điện thoại: 0123 456 789</p>
                <p>TP. Hồ Chí Minh, Việt Nam</p>
            </div>

        </div>

        <div class="footer-bottom">
            © {{ date('Y') }} BOOK STORE. All rights reserved.
        </div>
    </footer>

</body>

</html>