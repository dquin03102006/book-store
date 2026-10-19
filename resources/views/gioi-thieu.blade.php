<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Giới thiệu - Tiệm sách nhỏ</title>

    <style>
        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            overflow-x: hidden;
        }

        body {
            font-family: Arial, sans-serif;
            background: #fffcf5;
            color: #000000;
        }

        /* ================= HEADER ================= */

        header {
            width: 100%;
            min-height: 75px;
            background: #ffffff;

            display: flex;
            align-items: center;

            padding: 10px 40px;
            gap: 25px;

            box-sizing: border-box;
        }

        .logo {
            width: 120px;
            height: 55px;

            overflow: hidden;
            flex-shrink: 0;

            margin-left: -10px;
        }

        .logo a {
            display: block;
            width: 100%;
            height: 100%;
        }

        .logo img {
            width: 120px;
            height: 55px;

            object-fit: contain;
            object-position: center;

            display: block;
        }

        nav {
            display: flex;
            align-items: center;
            gap: 25px;

            flex-shrink: 0;
        }

        nav a {
            color: #000000;
            text-decoration: none;

            font-size: 15px;
            font-weight: 500;

            white-space: nowrap;
        }

        nav a:hover {
            opacity: 0.6;
        }

        /* ================= SEARCH ================= */

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

        /* ================= ICONS ================= */

        .cart-icon,
        .user-icon {
            display: flex;
            align-items: center;
            justify-content: center;

            color: #000000;
            text-decoration: none;

            flex-shrink: 0;

            transition: 0.2s;
        }

        .cart-icon {
            margin-left: 5px;
            position: relative;
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
            margin-left: 0;
        }

        .cart-icon:hover,
        .user-icon:hover {
            transform: scale(1.1);
        }

        /* ================= MAIN ================= */

        .about-container {
            width: 100%;
            max-width: 1100px;

            margin: 0 auto;
            padding: 60px 30px 70px;
        }

        .about-title {
            text-align: center;

            margin-bottom: 45px;
        }

        .about-title h1 {
            margin: 0 0 15px;

            font-size: 34px;
            color: #000000;
        }

        .about-title p {
            margin: 0;

            color: #555555;
            font-size: 16px;
            line-height: 1.7;
        }

        .about-intro {
            background: #ffffff;

            padding: 35px;

            border-radius: 12px;

            margin-bottom: 40px;
        }

        .about-intro h2 {
            margin-top: 0;
            margin-bottom: 15px;

            font-size: 24px;
            color: #000000;
        }

        .about-intro p {
            margin: 0;

            font-size: 15px;
            line-height: 1.8;
            color: #333333;
        }

        .about-grid {
            display: grid;

            grid-template-columns: repeat(3, minmax(0, 1fr));

            gap: 25px;

            width: 100%;
        }

        .about-card {
            background: #ffffff;

            padding: 30px 25px;

            border-radius: 12px;

            text-align: center;

            min-width: 0;
        }

        .about-card h3 {
            margin-top: 0;
            margin-bottom: 15px;

            font-size: 20px;
            color: #000000;
        }

        .about-card p {
            margin: 0;

            color: #555555;

            font-size: 14px;
            line-height: 1.7;
        }

        /* ================= FOOTER ================= */

        footer {
            width: 100%;

            margin-top: 20px;

            background: #202942;
            color: #ffffff;

            padding: 45px 60px 20px;

            box-sizing: border-box;

            overflow: hidden;
        }

        .footer-content {
            display: grid;

            grid-template-columns:
                minmax(0, 2fr) minmax(0, 1fr) minmax(0, 1.5fr) minmax(0, 1.5fr);

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

            color: #ffffff;
        }

        .footer-column p {
            color: #ffffff;

            line-height: 1.7;
            font-size: 14px;

            overflow-wrap: break-word;
            word-wrap: break-word;

            margin-top: 0;
        }

        .footer-column a {
            display: block;

            color: #ffffff;

            text-decoration: none;

            margin-bottom: 10px;

            font-size: 14px;
        }

        .footer-column a:hover {
            opacity: 0.7;
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
            width: 100%;

            margin-top: 35px;
            padding-top: 18px;

            border-top: 1px solid rgba(255, 255, 255, 0.2);

            text-align: center;

            color: #ffffff;

            font-size: 13px;
        }

        /* ================= RESPONSIVE ================= */

        @media (max-width: 900px) {

            header {
                padding: 10px 25px;
                gap: 15px;
            }

            nav {
                gap: 15px;
            }

            nav a {
                font-size: 14px;
            }

            .search-form {
                max-width: 300px;
            }

            .footer-content {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 700px) {

            header {
                flex-wrap: wrap;

                padding: 12px 20px;
            }

            .logo {
                width: 100px;
                height: 50px;
            }

            .logo img {
                width: 100px;
                height: 50px;
            }

            nav {
                order: 3;

                width: 100%;

                justify-content: center;

                gap: 20px;
            }

            .search-form {
                flex: 1;
                max-width: none;
            }

            .about-container {
                padding: 40px 20px 50px;
            }

            .about-title h1 {
                font-size: 28px;
            }

            .about-intro {
                padding: 25px;
            }

            .about-grid {
                grid-template-columns: 1fr;
            }

            footer {
                padding: 35px 25px 20px;
            }

            .footer-content {
                grid-template-columns: 1fr;
                gap: 25px;
            }
        }

        /* ================= ABOUT PAGE ================= */

        .about-container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 70px 40px 80px;
        }


        /* HERO */

        .about-hero {
            display: grid;
            grid-template-columns: 1.3fr 0.7fr;
            gap: 70px;
            align-items: center;

            min-height: 430px;
        }

        .about-label {
            display: inline-block;

            font-size: 12px;
            font-weight: 700;
            letter-spacing: 2px;

            color: #000000;

            margin-bottom: 18px;
        }

        .about-hero h1 {
            margin: 0 0 25px;

            font-size: 52px;
            line-height: 1.12;
            font-weight: 700;

            color: #202942;
        }

        .about-hero-text p {
            max-width: 650px;

            margin: 0;

            font-size: 16px;
            line-height: 1.9;

            color: #555555;
        }

        .about-hero-image {
            width: 100%;
            height: 330px;
            border-radius: 18px;
            overflow: hidden;
        }

        .about-hero-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        /* HERO BOX */

        .about-hero-box {
            min-height: 330px;

            background: #BED9F4;

            border-radius: 18px;

            padding: 40px;

            display: flex;
            flex-direction: column;

            justify-content: center;
            align-items: center;

            text-align: center;
        }

        .hero-book-icon {
            width: 150px;
            height: 190px;

            background: #202942;

            border-radius: 8px 14px 14px 8px;

            color: #ffffff;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 22px;
            font-weight: 700;
            letter-spacing: 2px;

            margin-bottom: 25px;

            box-shadow: 12px 12px 0 rgba(255, 255, 255, 0.55);
        }

        .about-hero-box span {
            font-size: 14px;
            line-height: 1.7;

            color: #202942;
        }


        /* SECTION HEADING */

        .section-heading {
            margin-bottom: 35px;
        }

        .section-heading>span {
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 2px;

            color: #777777;
        }

        .section-heading h2 {
            margin: 10px 0 0;

            font-size: 32px;

            color: #202942;
        }

        .section-heading.center {
            text-align: center;
        }

        .section-heading.center p {
            max-width: 600px;

            margin: 15px auto 0;

            color: #666666;

            line-height: 1.7;
        }


        /* STORY */

        .about-story {
            margin-top: 80px;

            padding: 60px 0;

            border-top: 1px solid #ddd;
            border-bottom: 1px solid #ddd;
        }

        .story-content {
            display: grid;

            grid-template-columns: 100px 1fr;

            gap: 35px;

            max-width: 850px;
        }

        .story-number {
            font-size: 48px;
            font-weight: 700;

            color: #BED9F4;
        }

        .story-text {
            max-width: 750px;
        }

        .story-text p {
            margin: 0 0 18px;

            font-size: 16px;
            line-height: 1.9;

            color: #444444;
        }

        .story-text p:last-child {
            margin-bottom: 0;
        }


        /* VALUES */

        .about-values {
            padding: 85px 0 30px;
        }

        .values-grid {
            display: grid;

            grid-template-columns: repeat(3, minmax(0, 1fr));

            gap: 25px;
        }

        .value-card {
            background: #ffffff;

            padding: 35px 30px;

            border-radius: 14px;

            min-height: 280px;

            border: 1px solid #eeeeee;

            transition: 0.25s;
        }

        .value-card:hover {
            transform: translateY(-5px);

            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
        }

        .value-number {
            font-size: 14px;
            font-weight: 700;

            color: #8aaed5;

            margin-bottom: 35px;
        }

        .value-card h3 {
            margin: 0 0 15px;

            font-size: 20px;

            color: #202942;
        }

        .value-card p {
            margin: 0;

            font-size: 14px;
            line-height: 1.8;

            color: #666666;
        }


        /* COMMITMENT */

        .about-commitment {
            margin-top: 80px;

            background: #202942;

            border-radius: 18px;

            padding: 70px 50px;

            text-align: center;
        }

        .commitment-inner {
            max-width: 800px;

            margin: 0 auto;
        }

        .commitment-inner .about-label {
            color: #BED9F4;
        }

        .commitment-inner h2 {
            margin: 10px 0 25px;

            font-size: 34px;
            line-height: 1.4;

            color: #ffffff;
        }

        .commitment-inner p {
            margin: 0 auto;

            max-width: 650px;

            font-size: 15px;
            line-height: 1.8;

            color: #eeeeee;
        }


        /* INFO */

        .about-info {
            display: grid;

            grid-template-columns: repeat(4, minmax(0, 1fr));

            gap: 20px;

            margin-top: 60px;

            padding-top: 40px;

            border-top: 1px solid #ddd;
        }

        .about-info div {
            padding: 10px 0;
        }

        .about-info span {
            display: block;

            margin-bottom: 8px;

            font-size: 11px;
            font-weight: 700;

            letter-spacing: 1.5px;

            color: #888888;
        }

        .about-info strong {
            font-size: 15px;

            color: #202942;
        }


        /* RESPONSIVE */

        @media (max-width: 900px) {

            .about-container {
                padding: 55px 30px 70px;
            }

            .about-hero {
                grid-template-columns: 1fr;

                gap: 40px;
            }

            .about-hero h1 {
                font-size: 42px;
            }

            .about-hero-box {
                min-height: 280px;
            }

            .values-grid {
                grid-template-columns: 1fr;
            }

            .about-info {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }


        @media (max-width: 700px) {

            .about-container {
                padding: 45px 20px 60px;
            }

            .about-hero h1 {
                font-size: 34px;
            }

            .about-hero-text p {
                font-size: 15px;
            }

            .about-story {
                margin-top: 55px;

                padding: 45px 0;
            }

            .story-content {
                grid-template-columns: 1fr;

                gap: 10px;
            }

            .story-number {
                font-size: 36px;
            }

            .section-heading h2 {
                font-size: 27px;
            }

            .about-values {
                padding-top: 55px;
            }

            .about-commitment {
                margin-top: 55px;

                padding: 50px 25px;
            }

            .commitment-inner h2 {
                font-size: 27px;
            }

            .about-info {
                grid-template-columns: 1fr 1fr;

                gap: 25px 15px;
            }
        }


        .dropdown {
            position: relative;
            display: inline-block;
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
            color: #202942;
            background: #fff;
            text-decoration: none;
            white-space: nowrap;
        }

        .dropdown-menu a:hover {
            background: #212842;
            color: #ffff;
        }

        .dropdown:hover .dropdown-menu,
        .dropdown:focus-within .dropdown-menu {
            display: block;
        }

        .about-commitment-image {
            width: 100%;
            height: 350px;
            margin-top: 80px;
            border-radius: 18px;
            overflow: hidden;
        }

        .about-commitment-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }
    </style>
</head>

<body>

    <!-- ================= HEADER ================= -->


    <header>
        <div class="logo">
            <a href="/">
                <img src="{{ asset('images/logo.png') }}" alt="Tiệm sách nhỏ">
            </a>
        </div>

        <nav>
            <a href="/">Trang chủ</a>
            <a href="{{ url('/gioi-thieu') }}">Giới thiệu</a>
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
                value="{{ request('keyword') }}"
                placeholder="Tìm tên sách hoặc tác giả...">
            <button type="submit">Tìm kiếm</button>
        </form>

        @php
        $cartCount = collect(session('cart', []))->sum('quantity');
        @endphp

        <a href="{{ route('cart.index') }}" class="cart-icon" title="Giỏ hàng">
            <svg xmlns="http://www.w3.org/2000/svg"
                width="25" height="25" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <circle cx="9" cy="21" r="1"></circle>
                <circle cx="20" cy="21" r="1"></circle>
                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
            </svg>

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

    <!-- ================= CONTENT ================= -->

    <main class="about-container">

        <!-- HERO GIỚI THIỆU -->
        <section class="about-hero">

            <div class="about-hero-text">
                <span class="about-label">{{ $about->hero_label ?? 'VỀ TIỆM SÁCH NHỎ' }}</span>

                <h1>{{ $about->hero_title ?? 'Một cuốn sách hay, một góc nhỏ, một cảm hứng mới.' }}</h1>

                <p>
                    {{ $about->hero_description ?? 'Tiệm sách nhỏ được tạo ra với mong muốn mang những cuốn sách phù hợp đến gần hơn với mọi người. Từ những trang sách quen thuộc đến những câu chuyện mới mẻ, mỗi cuốn sách đều có thể mở ra một góc nhìn khác về cuộc sống.' }}
                </p>
            </div>

            <div class="about-hero-image">
                <img
                    src="{{ !empty($about->hero_image) ? asset('images/about/' . basename($about->hero_image)) : asset('images/about-banner.jpg') }}"
                    alt="Không gian Tiệm sách nhỏ">
            </div>

        </section>


        <!-- CÂU CHUYỆN -->
        <section class="about-story">

            <div class="section-heading">
                <span>{{ $about->story_label ?? 'CÂU CHUYỆN CỦA CHÚNG TÔI' }}</span>
                <h2>{{ $about->story_title ?? 'Không chỉ là nơi bán sách' }}</h2>
            </div>

            <div class="story-content">

                <div class="story-number">
                    01
                </div>

                <div class="story-text">
                    <p>{!! nl2br(e($about->story_content ?? 'Tiệm sách nhỏ bắt đầu từ một ý tưởng rất đơn giản: tạo ra một không gian nơi mọi người có thể dễ dàng tìm kiếm và lựa chọn những cuốn sách mà mình yêu thích.
                        Chúng tôi tin rằng sách không chỉ cung cấp kiến thức, mà còn mang đến cảm hứng, giúp mỗi người có thêm một góc nhìn, một câu chuyện hoặc một động lực mới trong hành trình của mình.')) !!}</p>
                </div>

            </div>

        </section>


                <!-- GIÁ TRỊ -->
        <section class="about-values">

            <div class="section-heading center">
                <span>{{ $about->values_label ?? 'GIÁ TRỊ CỦA TIỆM' }}</span>

                <h2>{{ $about->values_title ?? 'Những điều chúng tôi hướng đến' }}</h2>

                <p>
                    {{ $about->values_description ?? 'Mỗi trải nghiệm nhỏ đều góp phần tạo nên một tiệm sách gần gũi và đáng tin cậy hơn.' }}
                </p>
            </div>

            <div class="values-grid">

                <div class="value-card">
                    <div class="value-number">01</div>

                    <h3>{{ $about->value1_title ?? 'Đa dạng lựa chọn' }}</h3>

                    <p>
                        {{ $about->value1_content ?? 'Từ văn học, truyện, kỹ năng đến sách học tập và phát triển bản thân, Tiệm sách nhỏ hướng đến một danh mục sách đa dạng để phù hợp với nhiều nhu cầu khác nhau.' }}
                    </p>
                </div>

                <div class="value-card">
                    <div class="value-number">02</div>

                    <h3>{{ $about->value2_title ?? 'Dễ dàng tìm kiếm' }}</h3>

                    <p>
                        {{ $about->value2_content ?? 'Tìm sách theo tên, tác giả, thể loại hoặc mức giá một cách nhanh chóng, giúp bạn tiết kiệm thời gian và dễ dàng tìm được cuốn sách phù hợp.' }}
                    </p>
                </div>

                <div class="value-card">
                    <div class="value-number">03</div>

                    <h3>{{ $about->value3_title ?? 'Trải nghiệm thân thiện' }}</h3>

                    <p>
                        {{ $about->value3_content ?? 'Giao diện đơn giản, rõ ràng và dễ sử dụng để việc khám phá, xem thông tin và lựa chọn sách trở nên nhẹ nhàng hơn.' }}
                    </p>
                </div>

            </div>

        </section>

                <!-- CAM KẾT -->
        <section class="about-commitment-image">
            <img
                src="{{ !empty($about->section_image) ? asset('images/about/' . basename($about->section_image)) : asset('images/about1-banner.jpg') }}"
                alt="Tiệm sách nhỏ">
        </section>

                <!-- THÔNG TIN -->
        <section class="about-info">

            <div>
                <span>{{ $about->info1_label ?? 'ĐỐI TƯỢNG' }}</span>
                <strong>{{ $about->info1_value ?? 'Người yêu sách' }}</strong>
            </div>

            <div>
                <span>{{ $about->info2_label ?? 'THỂ LOẠI' }}</span>
                <strong>{{ $about->info2_value ?? 'Đa dạng' }}</strong>
            </div>

            <div>
                <span>{{ $about->info3_label ?? 'TRẢI NGHIỆM' }}</span>
                <strong>{{ $about->info3_value ?? 'Đơn giản & thuận tiện' }}</strong>
            </div>

            <div>
                <span>{{ $about->info4_label ?? 'ĐỊNH HƯỚNG' }}</span>
                <strong>{{ $about->info4_value ?? 'Gần gũi & tin cậy' }}</strong>
            </div>

        </section>

    </main>

    <!-- ================= FOOTER ================= -->

    <footer>

        <div class="footer-content">

            <div class="footer-column">

                <h3 class="footer-logo">
                    <img
                        src="{{ asset('images/logofooter.png') }}"
                        alt="Tiệm sách nhỏ">
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