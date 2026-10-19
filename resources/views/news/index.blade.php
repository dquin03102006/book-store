<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tin tức - Tiệm Sách Nhỏ</title>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        :root {
            --cream: #fffcf5;
            --navy: #212842;
            --blue: #BED9F4;
            --muted: #777d8c;
            --line: #e7e7e9;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            background: var(--cream);
            color: #333640;
            font-family: Arial, sans-serif;
        }

        a {
            color: inherit;
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

        /* DROPDOWN MENU */
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


        /* PAGE INTRO */
        .page-intro {
            padding: 66px 24px 45px;
            text-align: center;
            background:
                radial-gradient(ellipse at 50% 0%, #e8f2fc 0%, transparent 65%),
                var(--cream);
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            color: #66738e;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 3px;
            text-transform: uppercase;
        }

        .eyebrow::before,
        .eyebrow::after {
            content: "";
            width: 27px;
            height: 1px;
            background: #9cacc5;
        }

        .page-intro h1 {
            margin: 17px 0 14px;
            color: var(--navy);
            font-family: 'Playfair Display', Georgia, serif;
            font-size: clamp(36px, 5vw, 56px);
            font-weight: 600;
            letter-spacing: -.8px;
        }

        .page-intro p {
            max-width: 560px;
            margin: 0 auto;
            color: #727786;
            font-size: 14px;
            line-height: 1.9;
        }

        .intro-line {
            width: 58px;
            height: 3px;
            margin: 27px auto 0;
            background: var(--blue);
        }

        /* MAIN CONTENT */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 22px 32px 80px;
        }

        .section-heading {
            display: flex;
            align-items: end;
            justify-content: space-between;
            gap: 20px;
            margin: 0 0 25px;
            padding-bottom: 15px;
            border-bottom: 1px solid var(--line);
        }

        .section-heading h2 {
            margin: 0;
            color: var(--navy);
            font-family: 'Playfair Display', Georgia, serif;
            font-size: 27px;
            font-weight: 600;
        }

        .section-heading p {
            margin: 7px 0 0;
            color: var(--muted);
            font-size: 13px;
            line-height: 1.6;
        }

        .section-count {
            color: #858a96;
            font-size: 12px;
            white-space: nowrap;
        }

        /* FEATURED ARTICLE */
        .featured-card {
            display: grid;
            grid-template-columns: 1.12fr 1fr;
            min-height: 350px;
            margin-bottom: 65px;
            background: #fff;
            border: 1px solid #e8e8eb;
        }

        .featured-media {
            min-height: 350px;
            overflow: hidden;
            background: #edf2f8;
        }

        .featured-media img {
            display: block;
            width: 100%;
            height: 100%;
            min-height: 350px;
            object-fit: cover;
            transition: transform .5s;
        }

        .featured-card:hover .featured-media img {
            transform: scale(1.035);
        }

        .featured-placeholder,
        .news-placeholder {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;
            min-height: 250px;
            padding: 25px;
            background: linear-gradient(135deg, #e8f2fc, #f8f4e9);
            color: var(--navy);
            font-family: 'Playfair Display', Georgia, serif;
            font-size: 22px;
            text-align: center;
        }

        .featured-content {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: center;
            padding: 42px 40px;
        }

        .article-label {
            display: inline-block;
            margin-bottom: 17px;
            padding: 7px 10px;
            background: #edf4fc;
            color: var(--navy);
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
        }

        .featured-content h2 {
            margin: 0 0 16px;
            color: var(--navy);
            font-family: 'Playfair Display', Georgia, serif;
            font-size: clamp(25px, 2.5vw, 34px);
            font-weight: 600;
            line-height: 1.4;
        }

        .featured-content h2 a {
            text-decoration: none;
        }

        .featured-content h2 a:hover {
            color: #627597;
        }

        .featured-content p {
            margin: 0 0 25px;
            color: #727682;
            font-size: 14px;
            line-height: 1.9;
        }

        .read-more {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            padding-bottom: 7px;
            border-bottom: 1px solid var(--navy);
            color: var(--navy);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: .5px;
            text-decoration: none;
            transition: gap .2s, color .2s;
        }

        .read-more:hover {
            gap: 18px;
            color: #627597;
        }

        /* NEWS GRID */
        .latest-section {
            margin-top: 55px;
        }

        .news-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 42px 28px;
        }

        .news-card {
            min-width: 0;
            background: transparent;
            border: 0;
            border-bottom: 1px solid #dfe3ea;
            padding-bottom: 24px;
            transition: transform .25s ease;
        }

        .news-card:hover {
            transform: translateY(-4px);
        }

        .news-card>a:first-child {
            display: block;
            position: relative;
            overflow: hidden;
            background: #eaf1f8;
            aspect-ratio: 4 / 3;
        }

        .news-image {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform .45s ease;
        }

        .news-card:hover .news-image {
            transform: scale(1.05);
        }

        .news-card .news-placeholder {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;
            min-height: 0;
            padding: 20px;
            background: linear-gradient(135deg, #e5effb, #fffcf5);
            color: #212842;
            font-family: 'Playfair Display', Georgia, serif;
            font-size: 21px;
            text-align: center;
        }

        .news-content {
            padding: 22px 2px 0;
        }

        .news-category {
            display: flex;
            align-items: center;
            gap: 9px;
            margin-bottom: 13px;
            color: #657795;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1.6px;
            text-transform: uppercase;
        }

        .news-category::before {
            content: "";
            width: 22px;
            height: 2px;
            background: #BED9F4;
        }

        .news-content h3 {
            margin: 0 0 13px;
            color: #212842;
            font-family: 'Playfair Display', Georgia, serif;
            font-size: 23px;
            font-weight: 600;
            line-height: 1.45;
        }

        .news-content h3 a {
            color: inherit;
            text-decoration: none;
            transition: color .2s;
        }

        .news-content h3 a:hover {
            color: #7186ad;
        }

        .news-content p {
            margin: 0 0 20px;
            color: #747987;
            font-size: 13px;
            line-height: 1.9;
            overflow-wrap: anywhere;
        }

        .news-content .read-more {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            padding-bottom: 6px;
            border-bottom: 1px solid #212842;
            color: #212842;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1px;
            text-decoration: none;
            transition: gap .2s;
        }

        .news-content .read-more:hover {
            gap: 19px;
        }

        /* EMPTY STATE */
        .empty-news {
            padding: 65px 24px;
            border: 1px solid #e2e7ef;
            background: #fff;
            text-align: center;
        }

        .empty-news h2 {
            margin: 0 0 12px;
            color: #212842;
            font-family: 'Playfair Display', Georgia, serif;
            font-size: 29px;
        }

        .empty-news p {
            color: #777d8c;
            font-size: 14px;
            line-height: 1.8;
        }


        .empty-news p {
            color: var(--muted);
            font-size: 14px;
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
        @media (max-width: 1100px) {
            header {
                padding: 14px 25px;
                gap: 22px;
            }

            nav {
                gap: 15px;
            }

            .search-form input {
                width: 140px;
            }

            .featured-content {
                padding: 30px;
            }

            .news-image {
                height: 190px;
            }
        }

        @media (max-width: 850px) {
            header {
                flex-wrap: wrap;
            }

            .header-right {
                margin-left: 0;
            }

            .featured-card {
                grid-template-columns: 1fr;
            }

            .featured-media,
            .featured-media img {
                min-height: 300px;
                height: 300px;
            }

            .featured-content {
                padding: 30px;
            }

            .news-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 30px 22px;
            }
        }

        @media (max-width: 560px) {
            header {
                padding: 12px 18px;
                gap: 14px;
            }

            .logo {
                width: 100px;
                height: 46px;
            }

            nav {
                width: 100%;
                flex-wrap: wrap;
                gap: 15px;
            }

            nav>a,
            .dropdown-toggle {
                font-size: 13px;
            }

            .header-right {
                width: 100%;
            }

            .search-form {
                flex: 1;
            }

            .search-form input {
                width: 100%;
                min-width: 0;
            }

            .page-intro {
                padding: 48px 20px 35px;
            }

            .page-intro h1 {
                font-size: 36px;
            }

            .container {
                padding: 25px 18px 55px;
            }

            .section-heading h2 {
                font-size: 23px;
            }

            .featured-media,
            .featured-media img {
                min-height: 230px;
                height: 230px;
            }

            .featured-content {
                padding: 25px 22px;
            }

            .featured-content h2 {
                font-size: 27px;
            }

            .news-grid {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .news-card {
                padding-bottom: 25px;
            }

            .news-card>a:first-child {
                aspect-ratio: 16 / 10;
            }

            .news-content h3 {
                font-size: 22px;
            }
        }
    </style>
</head>

<body>

    <header>
        <div class="logo">
            <a href="/">
                <img src="{{ asset('images/logo.png') }}" alt="Tiệm Sách Nhỏ">
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

    <section class="page-intro">
        <div class="eyebrow">Tiệm Sách Nhỏ</div>
        <h1>Góc đọc và khám phá</h1>
        <p>
            Cùng khám phá những câu chuyện thú vị, những cuốn sách đáng đọc
            và nguồn cảm hứng nhỏ dành cho hành trình của bạn.
        </p>
        <div class="intro-line"></div>
    </section>

    <main class="container">

        @if ($news->isNotEmpty())

        @php
        $featuredNews = $news->first();
        $otherNews = $news->skip(1);
        @endphp

        <section class="featured-section">
            <div class="section-heading">
                <div>
                    <h2>Câu chuyện nổi bật</h2>
                    <p>Một góc nhìn đáng đọc dành cho bạn</p>
                </div>
                <span class="section-count">
                    {{ $news->count() }} bài viết
                </span>
            </div>

            <article class="featured-card">
                <a class="featured-media"
                    href="{{ route('news.public.show', $featuredNews->id) }}"
                    aria-label="{{ $featuredNews->title }}">
                    @if ($featuredNews->image)
                    <img
                        src="{{ asset('images/news/' . basename($featuredNews->image)) }}"
                        alt="{{ $featuredNews->title }}">
                    @else
                    <div class="featured-placeholder">
                        Tiệm Sách Nhỏ
                    </div>
                    @endif
                </a>

                <div class="featured-content">
                    <span class="article-label">Bài viết nổi bật</span>

                    <h2>
                        <a href="{{ route('news.public.show', $featuredNews->id) }}">
                            {{ $featuredNews->title }}
                        </a>
                    </h2>

                    <p>
                        {{ \Illuminate\Support\Str::limit(strip_tags($featuredNews->content), 240) }}
                    </p>

                    <a class="read-more"
                        href="{{ route('news.public.show', $featuredNews->id) }}">
                        KHÁM PHÁ BÀI VIẾT <span>→</span>
                    </a>
                </div>
            </article>
        </section>

        @if ($otherNews->isNotEmpty())
        <section class="latest-section">
            <div class="section-heading">
                <div>
                    <h2>Tin tức mới nhất</h2>
                    <p>Những câu chuyện tiếp theo đang chờ bạn khám phá</p>
                </div>
            </div>

            <div class="news-grid">
                @foreach ($otherNews as $item)
                <article class="news-card">
                    <a href="{{ route('news.public.show', $item->id) }}"
                        aria-label="{{ $item->title }}">
                        @if ($item->image)
                        <img
                            class="news-image"
                            src="{{ asset('images/news/' . basename($item->image)) }}"
                            alt="{{ $item->title }}">
                        @else
                        <div class="news-placeholder">
                            Tiệm Sách Nhỏ
                        </div>
                        @endif
                    </a>

                    <div class="news-content">
                        <div class="news-category">Chuyện về sách</div>

                        <h3>
                            <a href="{{ route('news.public.show', $item->id) }}">
                                {{ $item->title }}
                            </a>
                        </h3>

                        <p>
                            {{ \Illuminate\Support\Str::limit(strip_tags($item->content), 145) }}
                        </p>

                        <a class="read-more"
                            href="{{ route('news.public.show', $item->id) }}">
                            ĐỌC TIẾP <span>→</span>
                        </a>
                    </div>
                </article>
                @endforeach
            </div>
        </section>
        @endif

        @else
        <div class="empty-news">
            <h2>Những câu chuyện đang được chuẩn bị</h2>
            <p>Hiện tại chưa có bài viết nào được đăng. Hãy quay lại sau nhé!</p>
        </div>
        @endif

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
    </footer>>

</body>

</html>