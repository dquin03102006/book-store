<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $category->name }} - Tiệm Sách Nhỏ</title>

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

        header {
            background: #fff;
            padding: 18px 60px;
            display: flex;
            align-items: center;
            gap: 35px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, .08);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .logo {
            width: 120px;
            height: 55px;
            overflow: hidden;
            flex-shrink: 0;
            margin-left: -35px;
        }

        .logo img {
            width: 120px;
            height: 55px;
            object-fit: cover;
            display: block;
        }

        nav {
            display: flex;
            align-items: center;
            gap: 22px;
            white-space: nowrap;
        }

        nav a {
            color: #444;
            text-decoration: none;
            font-size: 15px;
        }

        nav a:hover {
            color: #212842;
        }

        .dropdown {
            position: relative;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            min-width: 210px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, .13);
            padding: 8px 0;
            z-index: 1000;
        }

        .dropdown-menu a {
            display: block;
            padding: 12px 18px;
            color: #212842;
        }

        .dropdown-menu a:hover {
            background: #212842;
            color: #ffff;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
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
        }

        .search-form button {
            border: none;
            background: #212842;
            color: white;
            padding: 10px 18px;
            border-radius: 22px;
            cursor: pointer;
        }


        .cart-icon {
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
            color: #212842;
            display: flex;
            align-items: center;
            text-decoration: none;
            flex-shrink: 0;
        }

        main.products {
            padding: 45px 60px 70px;
            min-height: 500px;
        }

        .section-title {
            margin-bottom: 28px;
        }

        .section-title h2 {
            color: #212842;
            font-size: 30px;
            margin: 0 0 12px;
        }

        .section-title p {
            color: #777;
            font-size: 16px;
            line-height: 1.7;
            margin: 0;
        }

        .product-list {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 25px;
        }

        .product {
            background: #fff;
            border-radius: 16px;
            padding: 20px 18px 24px;
            text-align: center;
            box-shadow: 0 5px 18px rgba(33, 40, 66, .07);
            transition: transform .25s, box-shadow .25s;
            min-width: 0;
        }

        .product:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 26px rgba(33, 40, 66, .13);
        }

        .book-image {
            display: block;
            width: 100%;
            height: 230px;
            object-fit: contain;
            margin: 0 auto 16px;
            color: #777;
            font-size: 14px;
        }

        .product h3 {
            color: #212842;
            font-size: 16px;
            line-height: 1.5;
            min-height: 48px;
            margin: 10px 0;
        }

        .product .author {
            color: #888;
            font-size: 14px;
            margin: 12px 0;
        }

        .product .price {
            color: #212842;
            font-weight: bold;
            font-size: 18px;
            margin: 16px 0;
        }

        .detail-btn {
            display: inline-block;
            background: #212842;
            color: #fff;
            text-decoration: none;
            padding: 11px 22px;
            border-radius: 25px;
            transition: background .2s;
        }

        .detail-btn:hover {
            background: #405078;
        }

        .book-link {
            display: block;
            color: inherit;
            text-decoration: none;
        }

        .book-link h3 {
            margin-top: 12px;
        }

        .book-link:hover h3 {
            color: #405078;
        }

        .product-actions {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 14px;
        }

        .product-actions form {
            width: 100%;
            margin: 0;
        }

        .product-actions button {
            width: 100%;
            padding: 10px 8px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
        }

        .product-actions .add-cart-btn {
            background: #fff;
            color: #212842;
            border: 1px solid #212842;
        }

        .product-actions .buy-now-btn {
            background: #212842;
            color: #fff;
        }

        .product-actions button:hover {
            opacity: 0.85;
        }


        footer {
            background: #212842;
            color: #FFF3E5;
            padding: 45px 60px 20px;
        }

        .footer-content {
            display: grid;
            grid-template-columns: 2fr 1fr 1.5fr 1.5fr;
            gap: 35px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .footer-column h3 {
            margin: 0 0 18px;
            color: #FFF3E5;
        }

        .footer-column p {
            color: #FFF3E5;
            font-size: 14px;
            line-height: 1.8;
            overflow-wrap: anywhere;
        }

        .footer-column a {
            display: block;
            color: #FFF3E5;
            text-decoration: none;
            font-size: 14px;
            margin-bottom: 12px;
        }

        .footer-column a:hover {
            color: #BED9F4;
        }

        .footer-logo img {
            width: 160px;
            max-width: 100%;
            height: auto;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, .2);
            margin-top: 30px;
            padding-top: 18px;
            text-align: center;
            font-size: 13px;
        }

        @media (max-width: 1100px) {
            header {
                padding: 18px 30px;
                flex-wrap: wrap;
            }

            .product-list {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }

            .footer-content {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .search-form {
                margin-left: 0;
            }
        }

        @media (max-width: 700px) {
            header {
                padding: 16px 20px;
                gap: 18px;
            }

            nav {
                flex-wrap: wrap;
                gap: 14px;
            }

            main.products {
                padding: 30px 20px 45px;
            }

            .product-list {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 15px;
            }

            .book-image {
                height: 180px;
            }

            .footer-content {
                grid-template-columns: 1fr;
            }

            footer {
                padding: 35px 25px 20px;
            }

            .search-form {
                width: 100%;
            }

            .search-form input {
                width: 100%;
                min-width: 0;
            }
        }

        .product-filter {
            background: #fff;
            padding: 22px 25px;
            margin: 25px 0 30px;
            border-radius: 16px;
            box-shadow: 0 5px 18px rgba(33, 40, 66, .07);
        }

        .filter-heading {
            margin-bottom: 18px;
        }

        .filter-heading h3 {
            color: #212842;
            font-size: 19px;
            margin: 0 0 6px;
        }

        .filter-heading span {
            color: #888;
            font-size: 14px;
        }

        .filter-controls {
            display: flex;
            align-items: end;
            flex-wrap: wrap;
            gap: 16px;
        }

        .filter-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
            min-width: 210px;
        }

        .filter-group label {
            color: #444;
            font-size: 14px;
            font-weight: bold;
        }

        .filter-group select {
            padding: 12px 14px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background: #ffffff;
            color: #212842;
            outline: none;
        }

        .filter-group select:focus {
            border-color: #212842;
        }

        .filter-btn,
        .reset-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 20px;
            border: none;
            border-radius: 24px;
            background: #212842;
            color: #fff;
            text-decoration: none;
            cursor: pointer;
            font-size: 14px;
        }

        .reset-btn {
            background: #212842;
            color: #ffff;
        }

        @media (max-width: 700px) {
            .filter-controls {
                align-items: stretch;
                flex-direction: column;
            }

            .filter-group {
                min-width: 0;
            }
        }

        /* Hiệu ứng rê chuột nút Áp dụng */
        .filter-btn {
            transition: background-color 0.25s ease,
                transform 0.25s ease,
                box-shadow 0.25s ease;
        }

        .filter-btn:hover {
            background-color: #BED9F4;
            transform: translateY(-2px);
            box-shadow: 0 5px 12px rgba(33, 40, 66, 0.2);
        }

        /* Hiệu ứng rê chuột nút Xóa lọc */
        .reset-btn {
            transition: background-color 0.25s ease,
                transform 0.25s ease,
                box-shadow 0.25s ease;
        }

        .reset-btn:hover {
            background-color: #BED9F4;
            color: #212842;
            transform: translateY(-2px);
            box-shadow: 0 5px 12px rgba(33, 40, 66, 0.12);
        }

        /* Hiệu ứng khi bấm nút */
        .filter-btn:active,
        .reset-btn:active {
            transform: translateY(0);
            box-shadow: none;
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

        <form class="search-form"
            action="{{ url('/danh-muc/' . $category->id) }}"
            method="GET">

            <input type="text" name="keyword"
                value="{{ request('keyword') }}"
                placeholder="Tìm tên sách hoặc tác giả...">

            <input type="hidden" name="price" value="{{ request('price') }}">
            <input type="hidden" name="sort" value="{{ request('sort', 'latest') }}">

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


    <main class="products">
        <div class="section-title">
            <h2>{{ $category->name }}</h2>
            <p>{{ $category->description }}</p>
        </div>

        <form class="product-filter" method="GET"
            action="{{ url('/danh-muc/' . $category->id) }}">

            <div class="filter-controls">
                <div class="filter-group">
                    <label for="price">Khoảng giá</label>
                    <select name="price" id="price">
                        <option value="">Tất cả mức giá</option>
                        <option value="under100" {{ request('price') == 'under100' ? 'selected' : '' }}>Dưới 100.000đ</option>
                        <option value="100to150" {{ request('price') == '100to150' ? 'selected' : '' }}>100.000đ – 150.000đ</option>
                        <option value="over150" {{ request('price') == 'over150' ? 'selected' : '' }}>Trên 150.000đ</option>
                    </select>
                </div>

                <div class="filter-group">
                    <label for="sort">Sắp xếp theo</label>
                    <select name="sort" id="sort">
                        <option value="latest" {{ request('sort', 'latest') == 'latest' ? 'selected' : '' }}>Mới nhất</option>
                        <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Giá tăng dần</option>
                        <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Giá giảm dần</option>
                    </select>
                </div>

                <button type="submit" class="filter-btn">Áp dụng</button>
                <a href="{{ url('/danh-muc/' . $category->id) }}" class="reset-btn">Xóa lọc</a>
            </div>
        </form>



        <div class="product-list">
            @forelse ($books as $book)
            <div class="product">
                <a href="{{ url('/book/' . $book->id) }}" class="book-link">
                    <img
                        src="{{ asset('images/books/' . $book->image) }}"
                        alt="{{ $book->title }}"
                        class="book-image">

                    <h3>{{ $book->title }}</h3>
                </a>

                <p class="author">{{ $book->author }}</p>

                <p class="price">
                    {{ number_format($book->price, 0, ',', '.') }} VNĐ
                </p>

                <div class="product-actions">
                    <form action="{{ route('cart.add', $book->id) }}"
                        method="POST" class="ajax-cart-form">
                        @csrf
                        <input type="hidden" name="quantity" value="1">

                        <button type="submit" class="add-cart-btn">
                            Thêm vào giỏ
                        </button>
                    </form>

                    <form action="{{ route('cart.add', $book->id) }}"
                        method="POST">
                        @csrf
                        <input type="hidden" name="quantity" value="1">
                        <input type="hidden" name="buy_now" value="1">

                        <button type="submit" class="buy-now-btn">
                            Mua ngay
                        </button>
                    </form>
                </div>
            </div>
            @empty
            <p>Danh mục này chưa có sách.</p>
            @endforelse
        </div>
    </main>

    </main>

    <footer>
        <div class="footer-content">
            <div class="footer-column">
                <div class="footer-logo">
                    <a href="/">
                        <img src="{{ asset('images/logofooter.png') }}" alt="Tiệm Sách Nhỏ">
                    </a>
                </div>
                <p>Tiệm Sách Nhỏ – nơi tìm thấy những cuốn sách dành riêng cho bạn.</p>
            </div>

            <div class="footer-column">
                <h3>Liên kết</h3>
                <a href="/">Trang chủ</a>
                <a href="{{ route('cart.index') }}">Giỏ hàng</a>
                <a href="{{ Auth::check() ? route('profile.edit') : route('login') }}"> Tài khoản </a>
                <a href="/gioi-thieu">Giới thiệu</a>
                <a href="{{ route('news.public.index') }}">Tin tức</a>
                <a href="{{ route('support.index') }}">Hộp thư</a>
            </div>

            <div class="footer-column">
                <h3>Danh mục sách</h3>
                @foreach ($categories as $item)
                <a href="{{ url('/danh-muc/' . $item->id) }}">
                    {{ $item->name }}
                </a>
                @endforeach
            </div>

            <div class="footer-column">

                <h3>Liên hệ</h3>

                <p>Email: tiemsachnho@gmail.com</p>
                <p>Điện thoại: 0900 123 456</p>
                <p>TP. Hồ Chí Minh, Việt Nam</p>

            </div>
        </div>

        <div class="footer-bottom">
            © {{ date('Y') }} Tiệm Sách Nhỏ. All rights reserved.
        </div>
    </footer>
    <script>
        document.querySelectorAll('.ajax-cart-form').forEach(form => {
            form.addEventListener('submit', async function(e) {
                e.preventDefault();

                const button = form.querySelector('button[type="submit"]');
                button.disabled = true;

                try {
                    const response = await fetch(form.action, {
                        method: 'POST',
                        body: new FormData(form),
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json'
                        }
                    });

                    if (!response.ok) {
                        throw new Error('Không thể thêm sách vào giỏ hàng.');
                    }

                    const data = await response.json();
                    const count = document.getElementById('cart-count');

                    if (count && data.cart_count !== undefined) {
                        count.textContent = data.cart_count;
                        count.style.display = 'inline-block';
                    } else {
                        location.reload();
                    }

                    button.textContent = 'Đã thêm!';
                    setTimeout(() => {
                        button.textContent = 'Thêm vào giỏ';
                    }, 1200);

                } catch (error) {
                    alert('Có lỗi khi thêm sách. Mày thử lại nha!');
                } finally {
                    button.disabled = false;
                }
            });
        });
    </script>
</body>

</html>