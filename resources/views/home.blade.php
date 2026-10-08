<!DOCTYPE html>

<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Store</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800&display=swap');
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #fffcf5;
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
            width: 120px;
            height: 55px;
            overflow: hidden;
            flex-shrink: 0;
            margin-left: -35px;
        }

        .logo a {
            display: block;
            width: 100%;
            height: 100%;
        }

        .logo img {
            width: 120px;
            height: 55px;
            object-fit: cover;
            object-position: center;
            display: block;
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
            color: #212842;
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
            border-color: #212842;
        }

        button {
            border: none;
            cursor: pointer;
            background: #212842;
            color: white;
            padding: 10px 18px;
            border-radius: 22px;
            font-size: 14px;
            transition: 0.2s;
        }

        button:hover {
            background: #BED9F4;
        }

        .cart-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            color: #212842;
            text-decoration: none;
            transition: 0.2s;
        }

        .cart-icon:hover {
            color: #212842;
            transform: scale(1.1);
        }

        .user-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            color: #212842;
            text-decoration: none;
            margin-left: 8px;
            transition: 0.2s;
        }

        .user-icon:hover {
            transform: scale(1.1);
        }

        /* =================================
           HERO BANNER - TRANG CHỦ
        ================================= */

        .book-hero {
            position: relative;
            width: calc(100% - 120px);
            height: 360px;
            margin: 0 60px 35px;
            overflow: hidden;
            border-radius: 0 0 18px 18px;
            background: linear-gradient(110deg, #eef7ff 0%, #dcecf9 52%, #c7def3 100%);
            box-shadow: 0 8px 25px rgba(60, 90, 120, .10);
        }

        .hero-light {
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
        }

        .hero-light-1 {
            width: 430px;
            height: 430px;
            right: 80px;
            top: -250px;
            background: rgba(255, 255, 255, .55);
        }

        .hero-light-2 {
            width: 330px;
            height: 330px;
            right: -80px;
            bottom: -220px;
            background: rgba(255, 255, 255, .40);
        }

        .hero-spark {
            position: absolute;
            color: #ffffff;
            text-shadow: 0 2px 10px rgba(70, 110, 150, .25);
            z-index: 2;
        }

        .spark-1 {
            top: 35px;
            left: 48%;
            font-size: 20px;
        }

        .spark-2 {
            top: 80px;
            right: 31%;
            font-size: 27px;
        }

        .spark-3 {
            top: 28px;
            right: 12%;
            font-size: 17px;
        }

        .spark-4 {
            bottom: 50px;
            right: 43%;
            font-size: 22px;
        }

        .hero-content {
            position: absolute;
            left: 65px;
            top: 50%;
            transform: translateY(-50%);
            width: 45%;
            z-index: 6;
            font-family: 'Playfair Display', serif;
        }

        .hero-label {
            display: inline-block;
            margin-bottom: 12px;
            font-size: 18px;
            font-weight: 700;
            letter-spacing: 3px;
            color: #6689aa;
        }

        .hero-content h1 {
            margin: 0;
            font-size: 43px;
            line-height: 1.05;
            font-weight: 800;
            letter-spacing: -1px;
            color: #17233f;
        }

        .hero-content h1 strong {
            color: #17233f;
        }

        .hero-content p {
            margin: 16px 0 20px;
            font-size: 15px;
            line-height: 1.6;
            color: #53677e;
        }

        .hero-button {
            display: inline-block;
            padding: 11px 25px;
            border-radius: 25px;
            background: #212842;
            color: #fff;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .5px;
            transition: .25s;
        }

        .hero-button:hover {
            background: #668eb5;
            transform: translateY(-2px);
            box-shadow: 0 7px 15px rgba(40, 70, 100, .18);
        }

        /* CỤM 4 ẢNH BÊN PHẢI */
        .hero-books {
            position: absolute;
            right: 20px;
            bottom: 0;
            width: 620px;
            height: 330px;
            z-index: 4;
        }

        .books-glow {
            position: absolute;
            width: 430px;
            height: 230px;
            right: 65px;
            top: 15px;
            border-radius: 50%;
            background: radial-gradient(ellipse,
                    rgba(255, 255, 255, .95) 0%,
                    rgba(255, 255, 255, .55) 42%,
                    rgba(255, 255, 255, 0) 72%);
        }

        .books-platform {
            position: absolute;
            width: 500px;
            height: 72px;
            right: 15px;
            bottom: 18px;
            border-radius: 50%;
            background: linear-gradient(to bottom, #fff 0%, #edf6fc 70%, #d2e7f6 100%);
            box-shadow: 0 14px 25px rgba(70, 100, 130, .16);
            transform: perspective(400px) rotateX(52deg);
        }

        .books-platform::after {
            content: "";
            position: absolute;
            left: 15px;
            right: 15px;
            bottom: 4px;
            height: 7px;
            border-radius: 50%;
            background: #bdd8ed;
        }

        .hero-book {
            position: absolute;
            bottom: 58px;
            width: 145px;
            height: 210px;
            overflow: hidden;
            border-radius: 5px;
            background: #fff;
            box-shadow: 0 15px 28px rgba(30, 60, 90, .22);
            transition: transform .3s ease, box-shadow .3s ease;
        }

        .hero-book img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .hero-book-1 {
            right: 390px;
            transform: rotate(-13deg) translateY(10px);
            z-index: 2;
        }

        .hero-book-2 {
            right: 275px;
            width: 155px;
            height: 225px;
            transform: rotate(-3deg);
            z-index: 5;
        }

        .hero-book-3 {
            right: 150px;
            transform: rotate(8deg) translateY(4px);
            z-index: 4;
        }

        .hero-book-4 {
            right: 35px;
            width: 135px;
            height: 200px;
            transform: rotate(15deg) translateY(15px);
            z-index: 3;
        }

        .hero-book:hover {
            z-index: 10;
            transform: translateY(-10px) rotate(0deg);
            box-shadow: 0 20px 35px rgba(35, 65, 95, .28);
        }

        .floating-page {
            position: absolute;
            width: 55px;
            height: 38px;
            background: rgba(255, 255, 255, .75);
            border-radius: 4px;
            box-shadow: 0 8px 18px rgba(60, 90, 120, .12);
            z-index: 1;
        }

        .page-1 {
            right: 450px;
            top: 75px;
            transform: rotate(-18deg);
        }

        .page-2 {
            right: 15px;
            top: 55px;
            transform: rotate(17deg);
        }

        /* =================================
           RESPONSIVE HERO
        ================================= */

        @media (max-width: 1000px) {
            .book-hero {
                width: calc(100% - 60px);
                margin-left: 30px;
                margin-right: 30px;
            }

            .hero-content {
                left: 40px;
                width: 48%;
            }

            .hero-content h1 {
                font-size: 34px;
            }

            .hero-books {
                right: -170px;
                opacity: .55;
            }
        }

        @media (max-width: 700px) {
            .book-hero {
                width: calc(100% - 40px);
                height: 330px;
                margin: 20px;
            }

            .hero-content {
                left: 25px;
                width: 75%;
            }

            .hero-content h1 {
                font-size: 28px;
            }

            .hero-books {
                display: none;
            }
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
            border-color: #212842;
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
            color: #212842;
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
            color: #212842;
            font-size: 18px;
            font-weight: bold;
            margin: 12px 0 18px;
        }

        .detail-btn {
            display: inline-block;
            padding: 9px 18px;
            border-radius: 20px;
            background: #212842;
            color: white;
            text-decoration: none;
            font-size: 14px;
            transition: 0.2s;
        }

        .detail-btn:hover {
            background: #BED9F4;
        }

        /* FOOTER */
        footer {
            margin-top: 50px;
            background: #212842;
            color: #FFF3E5;
            padding: 45px 60px 20px;
            width: 100%;
            box-sizing: border-box;
            overflow: hidden;
        }

        .footer-content {
            display: grid;
            grid-template-columns: 2fr 1fr 1.5fr 1.5fr;
            gap: 40px;
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            box-sizing: border-box;
        }

        .footer-column {
            min-width: 0;
        }

        .footer-column h3 {
            margin-top: 0;
            margin-bottom: 18px;
            color: #FFF3E5;
        }

        .footer-column p {
            color: #FFF3E5;
            line-height: 1.7;
            font-size: 14px;
            overflow-wrap: break-word;
        }

        .footer-column a {
            display: block;
            color: #FFF3E5;
            text-decoration: none;
            margin-bottom: 10px;
            font-size: 14px;
        }

        .footer-column a:hover {
            color: #FFF3E5;
        }

        .footer-logo {
            margin: 0;
            width: 160px;
            height: auto;
            overflow: visible;
        }

        .footer-logo img {
            width: 160px;
            height: auto;
            display: block;
        }

        .footer-bottom {
            margin-top: 35px;
            padding-top: 18px;
            border-top: 1px solid rgba(0, 0, 0, 0.2);
            text-align: center;
            color: #FFF3E5;
            font-size: 13px;
        }

        @media (max-width: 700px) {
            footer {
                padding: 35px 25px 20px;
            }

            .footer-content {
                display: grid;
                grid-template-columns: 1fr;
                gap: 25px;
                width: 100%;
            }

            .footer-column {
                width: 100%;
            }
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

        .book-image {
            width: 100%;
            height: 190px;
            object-fit: contain;
            border-radius: 10px;
            margin-bottom: 18px;
        }

        /* ===== 4 ẢNH BANNER RIÊNG ===== */
        .hero-books {
            position: absolute;
            right: 35px;
            bottom: 0;
            width: 680px;
            height: 320px;
        }

        .hero-book {
            position: absolute;
            bottom: 58px;
            width: 145px;
            height: 210px;
            overflow: hidden;
            border-radius: 5px;
            background: #fff;
            box-shadow: 0 15px 28px rgba(30, 60, 90, .22);
            transition: transform .3s ease, box-shadow .3s ease;
        }

        .hero-book img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .hero-book-1 {
            right: 600px;
            transform: rotate(-10deg);
            z-index: 2;
        }

        .hero-book-2 {
            right: 500px;
            transform: rotate(-6deg);
            z-index: 5;
        }

        .hero-book-3 {
            right: 400px;
            transform: rotate(-2deg);
            z-index: 4;
        }

        .hero-book-4 {
            right: 300px;
            transform: rotate(2deg);
            z-index: 5;
        }

        .hero-book-5 {
            right: 200px;
            transform: rotate(5deg);
            z-index: 3;
        }

        .hero-book-6 {
            right: 100px;
            transform: rotate(7deg);
            z-index: 3;
        }

        .hero-book-7 {
            right: 0;
            transform: rotate(9deg);
            z-index: 3;
        }

        .hero-book:hover {
            z-index: 10;
            transform: translateY(-10px) rotate(0deg);
            box-shadow: 0 20px 35px rgba(35, 65, 95, .28);
        }

        .books-glow {
            position: absolute;
            width: 430px;
            height: 230px;
            right: 110px;
            top: 15px;
            border-radius: 50%;
            background: radial-gradient(ellipse, rgba(255, 255, 255, .95) 0%, rgba(255, 255, 255, .55) 42%, rgba(255, 255, 255, 0) 72%);
        }

        .books-platform {
            position: absolute;
            width: 500px;
            height: 72px;
            right: 55px;
            bottom: 18px;
            border-radius: 50%;
            background: linear-gradient(to bottom, #fff 0%, #edf6fc 70%, #d2e7f6 100%);
            box-shadow: 0 14px 25px rgba(70, 100, 130, .16);
            transform: perspective(400px) rotateX(52deg);
        }

        .books-platform::after {
            content: "";
            position: absolute;
            left: 15px;
            right: 15px;
            bottom: 4px;
            height: 7px;
            border-radius: 50%;
            background: #bdd8ed;
        }

        @media (max-width: 900px) {
            .hero-books {
                right: -100px;
                opacity: .55;
            }
        }

        @media (max-width: 600px) {
            .hero-books {
                display: none;
            }
        }
    </style>


</head>

<body>
    <!-- HEADER -->
    <header>
        <div class="logo">
            <a href="/">
                <img src="{{ asset('images/logo.png') }}" alt="Nhỏ xíu">
            </a>
        </div>

        <nav>
            <a href="/">Trang chủ</a>
            <a href="/gioi-thieu">Giới thiệu</a>
            <a href="#">Sản phẩm</a>
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
        <a href="#" class="user-icon" title="Đăng nhập">
            <svg xmlns="http://www.w3.org/2000/svg"
                width="25" height="25"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round">
                <circle cx="12" cy="8" r="4"></circle>
                <path d="M4 21c0-4.4 3.6-8 8-8s8 3.6 8 8"></path>
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

    <!-- ========================= BOOKSTORE HERO BANNER ========================= -->
    <section class="book-hero">
        <!-- Background decoration -->
        <div class="hero-light hero-light-1"></div>
        <div class="hero-light hero-light-2"></div>
        <span class="hero-spark spark-1">✦</span>
        <span class="hero-spark spark-2">✧</span>
        <span class="hero-spark spark-3">✦</span>
        <span class="hero-spark spark-4">·</span>
        <!-- LEFT CONTENT -->
        <div class="hero-content">
            <div class="hero-label"> TIỆM SÁCH NHỎ </div>
            <h1> MỞ RA MỘT<br>
                <strong>THẾ GIỚI</strong>
                <br> QUA TỪNG TRANG SÁCH
            </h1>
            <p> Những câu chuyện hay đang chờ bạn khám phá. </p>
            <a href="#products" class="hero-button"> KHÁM PHÁ SÁCH <span>→</span> </a>
        </div>
        <!-- RIGHT BOOK DISPLAY -->
        <div class="hero-books">
            <!-- glow phía sau sách -->
            <div class="books-glow"></div>
            <!-- bục tròn -->
            <div class="books-platform"></div>
            <!-- sách -->
            @php
            $bannerFiles = [
            'images/banner/banner-1.jpg',
            'images/banner/banner-2.jpg',
            'images/banner/banner-3.jpg',
            'images/banner/banner-4.jpg',
            'images/banner/banner-5.jpg',
            'images/banner/banner-6.jpg',
            'images/banner/banner-7.jpg',
            ];
            $bannerFallbacks = $books->take(4)->values();
            @endphp

            @for ($i = 0; $i < 7; $i++)
                @php
                $bannerFile=$bannerFiles[$i];
                $fallbackImage=$bannerFallbacks->get($i)->image ?? null;
                $imagePath = file_exists(public_path($bannerFile))
                ? asset($bannerFile)
                : ($fallbackImage ? asset('images/books/' . $fallbackImage) : '');
                @endphp

                <div class="hero-book hero-book-{{ $i + 1 }}">
                    @if ($imagePath)
                    <img src="{{ $imagePath }}" alt="Banner {{ $i + 1 }}">
                    @endif
                </div>
                @endfor <!-- decorative floating pages -->
                <div class="floating-page page-1"></div>
                <div class="floating-page page-2"></div>
        </div>
    </section>

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
    <section class="products" id="products">

        <div class="section-title">
            <h2>Sách nổi bật</h2>
        </div>

        <div class="product-list">

            @foreach ($books as $book)

            <div class="product">
                <img
                    src="{{ asset('images/books/' . $book->image) }}"
                    alt="{{ $book->title }}"
                    class="book-image">

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
                <h3 class="footer-logo">
                    <img src="{{ asset('images/logofooter.png') }}" alt="Nhỏ xíu">
                </h3>
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
                <p>Email: tiemsachnho@gmail.com</p>
                <p>Điện thoại: 0900 123 456</p>
                <p>TP. Hồ Chí Minh, Việt Nam</p>
            </div>

        </div>

        <div class="footer-bottom">
            © {{ date('Y') }} TIỆM SÁCH NHỎ. All rights reserved.
        </div>
    </footer>

</body>

</html>