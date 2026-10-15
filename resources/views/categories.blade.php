<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh mục sách - Tiệm Sách Nhỏ</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #fffcf5;
            color: #2f2f2f;
        }

        /* HEADER giống trang chủ */
        header {
            background: #fff;
            padding: 18px 60px;
            display: flex;
            align-items: center;
            gap: 35px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, .08);
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
            transition: .2s;
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
            transition: .2s;
        }

        button:hover {
            background: #BED9F4;
        }

        .cart-icon,
        .user-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            color: #212842;
            text-decoration: none;
            transition: .2s;
        }

        .user-icon {
            margin-left: 8px;
        }

        .cart-icon:hover,
        .user-icon:hover {
            transform: scale(1.1);
        }

        /* DANH MỤC */
        main {
            padding: 35px 60px 60px;
        }

        .section-title {
            margin-bottom: 25px;
        }

        .section-title h1 {
            margin: 0 0 10px;
            font-size: 27px;
            color: #212842;
        }

        .section-title p {
            color: #777;
            line-height: 1.6;
        }

        .category-list {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 22px;
            margin-top: 30px;
        }

        .category-card {
            background: #fff;
            padding: 24px 20px;
            border-radius: 14px;
            box-shadow: 0 4px 14px rgba(0, 0, 0, .06);
            text-decoration: none;
            color: #2f2f2f;
            transition: transform .25s, box-shadow .25s;
        }

        .category-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, .12);
        }

        .category-card h2 {
            color: #212842;
            font-size: 20px;
            margin: 8px 0;
        }

        .category-card p {
            color: #777;
            line-height: 1.6;
            font-size: 14px;
        }

        .view-btn {
            display: inline-block;
            background: #212842;
            color: #fff;
            padding: 9px 18px;
            border-radius: 20px;
            margin-top: 10px;
            font-size: 14px;
        }

        /* FOOTER giống trang chủ */
        footer {
            margin-top: 50px;
            background: #212842;
            color: #FFF3E5;
            padding: 45px 60px 20px;
        }

        .footer-content {
            display: grid;
            grid-template-columns: 2fr 1fr 1.5fr 1.5fr;
            gap: 40px;
            max-width: 1200px;
            margin: 0 auto;
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

        .footer-logo {
            margin: 0;
            width: 160px;
        }

        .footer-logo img {
            width: 160px;
            height: auto;
            display: block;
        }

        .footer-bottom {
            margin-top: 35px;
            padding-top: 18px;
            border-top: 1px solid rgba(255, 255, 255, .2);
            text-align: center;
            color: #FFF3E5;
            font-size: 13px;
        }

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

            main {
                padding: 30px;
            }

            .category-list {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .footer-content {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 600px) {
            header {
                padding: 16px 20px;
            }

            nav {
                width: 100%;
                justify-content: space-between;
                gap: 12px;
            }

            main {
                padding: 25px 20px;
            }

            .category-list,
            .footer-content {
                grid-template-columns: 1fr;
            }

            footer {
                padding: 35px 25px 20px;
            }
        }
    </style>
</head>

<body>
    <header>
        <div class="logo">
            <a href="/">
                <img src="{{ asset('images/logo.png') }}" alt="Nhỏ xíu">
            </a>
        </div>

        <nav>
            <a href="/">Trang chủ</a>
            <a href="/gioi-thieu">Giới thiệu</a>
            <a href="/danh-muc">Danh mục</a>

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
                placeholder="Tìm tên sách hoặc tác giả...">
            <button type="submit">Tìm kiếm</button>
        </form>

        <a href="#" class="cart-icon" title="Giỏ hàng">
            <svg xmlns="http://www.w3.org/2000/svg"
                width="25" height="25" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <circle cx="9" cy="20" r="1"></circle>
                <circle cx="19" cy="20" r="1"></circle>
                <path d="M3 4h2l2.4 11.4a2 2 0 0 0 2 1.6h7.6a2 2 0 0 0 2-1.6L21 8H6"></path>
            </svg>
        </a>

        <a href="#" class="user-icon" title="Đăng nhập">
            <svg xmlns="http://www.w3.org/2000/svg"
                width="25" height="25" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="8" r="4"></circle>
                <path d="M4 21c0-4.4 3.6-8 8-8s8 3.6 8 8"></path>
            </svg>
        </a>
    </header>

    <main>
        <h1>Danh mục sách</h1>
        <p>Khám phá những thể loại sách mà m yêu thích.</p>

        <div class="category-list">
            @forelse ($categories as $item)
            <a class="category-card"
                href="{{ url('/danh-muc/' . $item->id) }}">

                <h2>{{ $item->name }}</h2>

                <p>
                    {{ $item->description ?: 'Khám phá những cuốn sách thuộc danh mục này.' }}
                </p>

                <span class="view-btn">Xem sách</span>
            </a>
            @empty
            <p>Chưa có danh mục sách.</p>
            @endforelse
        </div>
    </main>
</body>

</html>