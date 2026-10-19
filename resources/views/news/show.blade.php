<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $article->title }} - Tiệm Sách Nhỏ</title>


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
            position: relative;
        }

        .cart-icon:hover {
            color: #212842;
            transform: scale(1.1);
        }

        .cart-count {
            position: absolute;
            top: -8px;
            right: -9px;
            min-width: 18px;
            height: 18px;
            padding: 0 4px;
            border-radius: 50%;
            background: #e53935;
            color: #fff;
            font-size: 11px;
            font-weight: bold;
            line-height: 18px;
            text-align: center;
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
        /* Menu Danh mục xổ xuống */
        .dropdown {
            position: relative;
        }

        .dropdown-toggle {
            display: inline-block;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            min-width: 200px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.12);
            padding: 8px 0;
            z-index: 1000;
        }

        .dropdown-menu a {
            display: block;
            padding: 12px 18px;
            color: #444;
            text-decoration: none;
            white-space: nowrap;
        }

        .dropdown-menu a:hover {
            background: #212842;
            color: #ffff;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
        }


        .page-banner {
            padding: 25px 20px;
            background: linear-gradient(135deg, #eef5fc, #fffcf5);
            border-bottom: 1px solid #e8eaf0;
            text-align: center;
            color: #777d8c;
            font-size: 14px;
        }

        .page-banner a {
            color: #212842;
            font-weight: 700;
            text-decoration: none;
        }

        .page-banner a:hover {
            color: #53648c;
        }

        .container {
            max-width: 960px;
            margin: 0 auto;
            padding: 45px 25px 65px;
        }

        .article {
            padding: 40px;
            background: #fff;
            border: 1px solid #ececf0;
            border-radius: 16px;
            box-shadow: 0 8px 30px rgba(33, 40, 66, .06);
        }

        .article h1 {
            margin: 0 0 28px;
            color: #212842;
            font-family: 'Playfair Display', Georgia, serif;
            font-size: clamp(28px, 4vw, 40px);
            font-weight: 700;
            line-height: 1.45;
        }

        .article-image {
            display: block;
            width: 100%;
            max-height: 520px;
            object-fit: contain;
            margin: 0 auto 30px;
            border-radius: 10px;
        }

        .article-content {
            color: #424650;
            font-size: 16px;
            line-height: 2;
            overflow-wrap: anywhere;
        }

        .article-content img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .article-content p {
            margin: 0 0 18px;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-top: 32px;
            padding: 11px 20px;
            border-radius: 25px;
            background: #212842;
            color: #fff;
            text-decoration: none;
            font-size: 14px;
            transition: .2s;
        }

        .back-link:hover {
            background: #405078;
            color: #BED9F4;
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

        @media (max-width: 1100px) {
            header {
                padding: 18px 30px;
                gap: 20px;
            }

            .logo {
                margin-left: 0;
            }

            .search-form input {
                width: 180px;
            }
        }

        @media (max-width: 760px) {
            header {
                flex-wrap: wrap;
            }

            .search-form {
                margin-left: 0;
            }

            nav {
                flex-wrap: wrap;
                gap: 15px;
            }

            .container {
                padding: 30px 15px 45px;
            }

            .article {
                padding: 24px 20px;
            }
        }
    </style>

</head>

<body>

    <header>
        <div class="logo">
            <a href="/">
                <img src="{{ asset('images/logo.png') }}" alt="Tiệm sách nhỏ">
            </a>
        </div>

        <nav>
            <a href="/">Trang chủ</a>
            <a href="/gioi-thieu">Giới thiệu</a>
            <a href="{{ route('news.public.index') }}">Tin tức</a>
            <div class="dropdown">
                <a href="#" class="dropdown-toggle">Danh mục ▾</a>
                <div class="dropdown-menu">
                    @foreach ($categories as $item)
                    <a href="{{ url('/danh-muc/' . $item->id) }}">
                        {{ $item->name }}
                    </a>
                    @endforeach
                </div>
            </div>

            @auth
            @if(auth()->user()->role === 'admin')
            <a href="/admin">Quản trị</a>
            @endif
            @endauth
        </nav>

        <form class="search-form" action="/" method="GET">
            <input
                type="text"
                name="keyword"
                placeholder="Tìm tên sách hoặc tác giả..."
                value="{{ $keyword ?? '' }}">

            <button type="submit">Tìm kiếm</button>
        </form>

        <a href="{{ route('cart.index') }}" class="cart-icon" title="Giỏ hàng">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="9" cy="20" r="1"></circle>
                <circle cx="19" cy="20" r="1"></circle>
                <path d="M3 4h2l2.4 11.4a2 2 0 0 0 2 1.6h7.6a2 2 0 0 0 2-1.6L21 8H6"></path>
            </svg>

            @php
            $cartCount = collect(session('cart', []))->sum('quantity');
            @endphp

            @if ($cartCount > 0)
            <span class="cart-count" id="cart-count">{{ $cartCount }}</span>
            @else
            <span class="cart-count" id="cart-count" style="display: none;">0</span>
            @endif
        </a>

        <a href="{{ Auth::check() ? route('profile.edit') : route('login') }}" class="user-icon" title="Tài khoản">
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

    <section class="page-banner">
        <a href="{{ route('news.public.index') }}">Tin tức</a>
        / Chi tiết bài viết
    </section>

    <main class="container">
        <article class="article">
            <h1>{{ $article->title }}</h1>

            @if ($article->image)
            <img class="article-image"
                src="{{ asset('images/news/' . basename($article->image)) }}"
                alt="{{ $article->title }}">
            @endif

            <div class="article-content">
                {!! nl2br(e($article->content)) !!}
            </div>

            <a class="back-link" href="{{ route('news.public.index') }}">
                ← Quay lại tin tức
            </a>
        </article>
    </main>

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
                <a href="{{ route('cart.index') }}">Giỏ hàng</a>
                <a href="{{ Auth::check() ? route('profile.edit') : route('login') }}"> Tài khoản </a>
                <a href="/gioi-thieu">Giới thiệu</a>
                <a href="{{ route('news.public.index') }}">Tin tức</a>
            </div>

            <div class="footer-column">
                <h3>Hỗ trợ</h3>
                <a href="#">Chính sách mua hàng</a>
                <a href="#">Chính sách đổi trả</a>
                <a href="{{ route('support.index') }}">Hộp thư</a>
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