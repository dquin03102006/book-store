<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $book->title }} | TIỆM SÁCH NHỎ</title>

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

        /* CHI TIẾT SÁCH - REDESIGN */
        .container {
            max-width: 1240px;
            margin: 38px auto 70px;
            padding: 0 28px;
        }

        .book-detail {
            display: grid;
            grid-template-columns: minmax(300px, 0.85fr) minmax(0, 1.15fr);
            gap: 58px;
            padding: 46px;
            background: #fff;
            border: 1px solid #eee9df;
            border-radius: 24px;
            box-shadow: 0 12px 40px rgba(33, 40, 66, 0.06);
        }

        .book-cover {
            position: relative;
            min-height: 480px;
            padding: 35px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(145deg, #f0f5fa, #e5edf6);
            border-radius: 20px;
            overflow: hidden;
        }

        .book-cover::before {
            content: "";
            position: absolute;
            width: 230px;
            height: 230px;
            border: 1px solid rgba(33, 40, 66, 0.08);
            border-radius: 50%;
        }

        .book-cover img {
            position: relative;
            z-index: 1;
            display: block;
            max-width: 100%;
            max-height: 440px;
            object-fit: contain;
            border-radius: 5px;
            filter: drop-shadow(0 14px 16px rgba(30, 35, 50, 0.18));
            transition: transform 0.3s ease;
        }

        .book-cover:hover img {
            transform: translateY(-5px);
        }

        .book-info {
            padding: 8px 0;
            min-width: 0;
        }

        .book-info h1 {
            margin: 0 0 20px;
            color: #212842;
            font-family: 'Playfair Display', Georgia, serif;
            font-size: clamp(28px, 3vw, 38px);
            font-weight: 700;
            line-height: 1.3;
            letter-spacing: -0.5px;
        }

        .book-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 24px;
        }

        .book-tag {
            display: inline-flex;
            align-items: center;
            padding: 8px 13px;
            border-radius: 30px;
            background: #f0f5fa;
            color: #52698c;
            font-size: 13px;
            font-weight: 600;
        }

        .book-author {
            margin: 0 0 22px;
            color: #777;
            font-size: 15px;
        }

        .book-author strong {
            color: #212842;
        }

        .price-panel {
            margin-bottom: 25px;
            padding: 20px 22px;
            background: #fffcf5;
            border: 1px solid #f0e9dd;
            border-radius: 16px;
        }

        .price-label {
            margin: 0 0 8px;
            color: #777;
            font-size: 13px;
        }

        .book-price {
            margin: 0;
            color: #b64f61;
            font-size: 30px;
            font-weight: 800;
            letter-spacing: -0.5px;
        }

        .purchase-label {
            display: block;
            margin-bottom: 11px;
            color: #212842;
            font-size: 14px;
            font-weight: 700;
        }

        .quantity-control {
            display: inline-flex;
            align-items: center;
            gap: 0;
            padding: 5px;
            border: 1px solid #dce3ed;
            border-radius: 12px;
            background: #fff;
        }

        .quantity-control button {
            width: 38px;
            height: 38px;
            padding: 0;
            border-radius: 9px;
            background: #eef3f9;
            color: #212842;
            font-size: 23px;
            line-height: 1;
        }

        .quantity-control button:hover {
            background: #dce9f7;
        }

        .quantity-control input {
            width: 52px;
            height: 38px;
            padding: 0;
            border: none;
            outline: none;
            background: transparent;
            color: #212842;
            font-size: 16px;
            font-weight: 700;
            text-align: center;
            appearance: textfield;
            -moz-appearance: textfield;
        }

        .quantity-control input::-webkit-inner-spin-button,
        .quantity-control input::-webkit-outer-spin-button {
            margin: 0;
            -webkit-appearance: none;
        }

        .purchase-actions {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin-top: 20px;
        }

        .purchase-btn {
            min-height: 50px;
            padding: 13px 16px;
            border: 1px solid #212842;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 700;
            transition: all 0.2s ease;
        }

        .add-cart-btn {
            background: #fff;
            color: #212842;
        }

        .add-cart-btn:hover {
            background: #eef3f9;
            color: #212842;
        }

        .buy-now-btn {
            background: #212842;
            color: #fff;
        }

        .buy-now-btn:hover {
            background: #354363;
            color: #fff;
            transform: translateY(-1px);
        }

        .purchase-note {
            margin-top: 15px;
            color: #777;
            font-size: 12px;
            line-height: 1.7;
        }

        .description {
            margin-top: 30px;
            padding-top: 24px;
            border-top: 1px solid #eee9df;
        }

        .description h3 {
            margin: 0 0 13px;
            color: #212842;
            font-family: 'Playfair Display', Georgia, serif;
            font-size: 22px;
        }

        .description p {
            margin: 0;
            color: #626262;
            font-size: 15px;
            line-height: 1.9;
            overflow-wrap: anywhere;
        }

        .reviews {
            margin-top: 35px;
            padding: 36px;
            background: #fff;
            border: 1px solid #eee9df;
            border-radius: 22px;
            box-shadow: 0 10px 32px rgba(33, 40, 66, 0.04);
        }

        .reviews h2 {
            margin: 0 0 24px;
            color: #212842;
            font-family: 'Playfair Display', Georgia, serif;
            font-size: 27px;
        }

        .review-item {
            padding: 22px 0;
            border-bottom: 1px solid #eee9df;
        }

        .review-item:last-child {
            border-bottom: none;
        }

        .review-name {
            color: #212842;
            font-weight: 700;
        }

        .review-rating {
            margin: 9px 0;
            color: #d49a36;
            letter-spacing: 2px;
        }

        .review-date {
            color: #999;
            font-size: 12px;
        }

        .review-form {
            margin-top: 28px;
            padding: 26px;
            background: #f5f8fc;
            border-radius: 16px;
        }

        .review-form h3 {
            margin-top: 0;
            color: #212842;
        }

        .review-form label {
            display: block;
            margin: 15px 0 8px;
            color: #30384f;
            font-weight: 600;
        }

        .review-form select,
        .review-form textarea {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid #dce3ed;
            border-radius: 10px;
            background: #fff;
            font: inherit;
        }

        .review-form select:focus,
        .review-form textarea:focus {
            border-color: #52698c;
            outline: 2px solid rgba(82, 105, 140, 0.12);
        }

        .notice {
            padding: 14px 18px;
            margin-bottom: 18px;
            border-radius: 12px;
            background: #edf5ff;
            color: #212842;
        }

        .notice-error {
            background: #fff0f0;
            color: #a43d48;
        }

        @media (max-width: 850px) {
            .container {
                padding: 0 18px;
            }

            .book-detail {
                grid-template-columns: 1fr;
                gap: 30px;
                padding: 28px;
            }

            .book-cover {
                min-height: 340px;
            }

            .book-cover img {
                max-height: 330px;
            }
        }

        @media (max-width: 520px) {

            .book-detail,
            .reviews {
                padding: 20px;
                border-radius: 17px;
            }

            .book-cover {
                min-height: 290px;
                padding: 20px;
            }

            .book-info h1 {
                font-size: 27px;
            }

            .book-price {
                font-size: 26px;
            }

            .purchase-actions {
                grid-template-columns: 1fr;
            }

            .review-form {
                padding: 18px;
            }
        }

        /* FOOTER */
        .footer {
            background: #212842;
            color: white;
            padding: 38px 60px;
        }

        .footer-inner {
            max-width: 1250px;
            margin: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 30px;
            flex-wrap: wrap;
        }

        .footer img {
            width: 150px;
            max-width: 100%;
        }

        .footer p {
            line-height: 1.8;
            font-size: 14px;
        }

        .footer a:hover {
            color: #BED9F4;
        }

        @media (max-width: 950px) {
            .header {
                padding: 18px 25px;
                flex-wrap: wrap;
            }

            .nav {
                flex-wrap: wrap;
                gap: 15px;
            }

            .book-detail {
                grid-template-columns: 1fr;
                gap: 25px;
            }

            .book-cover {
                min-height: 280px;
            }

            .footer {
                padding: 30px 25px;
            }
        }

        @media (max-width: 600px) {
            .container {
                margin-top: 25px;
                padding: 0 15px;
            }

            .book-detail,
            .reviews {
                padding: 22px;
            }

            .book-info h1 {
                font-size: 24px;
            }

            .search-form input {
                width: 170px;
            }
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
        <a href="#" class="cart-icon" title="Giỏ hàng">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="9" cy="20" r="1"></circle>
                <circle cx="19" cy="20" r="1"></circle>
                <path d="M3 4h2l2.4 11.4a2 2 0 0 0 2 1.6h7.6a2 2 0 0 0 2-1.6L21 8H6"></path>
            </svg>
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

    <!-- CHI TIẾT SÁCH -->
    <main class="container">
        @if (session('success'))
        <div class="notice">{{ session('success') }}</div>
        @endif

        @if (session('error'))
        <div class="notice notice-error">{{ session('error') }}</div>
        @endif

        <section class="book-detail">
            <div class="book-cover">
                @if ($book->image)
                <img
                    src="{{ asset('images/books/' . $book->image) }}"
                    alt="{{ $book->title }}">
                @else
                <p>Chưa có ảnh bìa</p>
                @endif
            </div>

            <div class="book-info">
                <div class="book-meta">
                    <span class="book-tag">TIỆM SÁCH NHỎ</span>
                    <span class="book-tag">Sách dành cho bạn</span>
                </div>

                <h1>{{ $book->title }}</h1>

                <p class="book-author">
                    Tác giả: <strong>{{ $book->author }}</strong>
                </p>

                <div class="price-panel">
                    <p class="price-label">Giá bán</p>
                    <p class="book-price">
                        {{ number_format($book->price, 0, ',', '.') }} VNĐ
                    </p>
                </div>

                <div class="quantity-selector">
                    <label class="purchase-label" for="quantity">
                        Chọn số lượng
                    </label>

                    <div class="quantity-control">
                        <button
                            type="button"
                            aria-label="Giảm số lượng"
                            onclick="changeQuantity(-1)">−</button>

                        <input
                            type="number"
                            id="quantity"
                            value="1"
                            min="1"
                            step="1"
                            inputmode="numeric"
                            aria-label="Số lượng sách">

                        <button
                            type="button"
                            aria-label="Tăng số lượng"
                            onclick="changeQuantity(1)">+</button>
                    </div>
                </div>


                <div class="purchase-actions">
                    <form action="{{ route('cart.add', $book->id) }}" method="POST">
                        @csrf

                        <input
                            type="hidden"
                            name="quantity"
                            id="cart-quantity"
                            value="1">

                        <button type="submit" class="purchase-btn add-cart-btn">
                            Thêm vào giỏ hàng
                        </button>
                    </form>

                    <form action="{{ route('cart.add', $book->id) }}" method="POST">
                        @csrf

                        <input
                            type="hidden"
                            name="quantity"
                            id="buy-now-quantity"
                            value="1">

                        <input type="hidden" name="buy_now" value="1">

                        <button type="submit" class="purchase-btn buy-now-btn">
                            Mua ngay
                        </button>
                    </form>
                </div>


                <p class="purchase-note">
                    Chọn cuốn sách bạn yêu thích và lưu lại những phút giây đọc sách duiiiii.
                </p>

                <div class="description">
                    <h3>Giới thiệu sách</h3>
                    <p>
                        {{ $book->description ?: 'Nội dung giới thiệu cho cuốn sách này đang được cập nhật.' }}
                    </p>
                </div>
            </div>
        </section>
        {{-- ĐÁNH GIÁ SÁCH --}}
        <section class="reviews">
            <h2>Đánh giá sản phẩm</h2>

            @if ($book->reviews->count() > 0)
            @foreach ($book->reviews as $review)
            <div class="review-item">
                <div class="review-name">
                    {{ $review->user->name ?? 'Người dùng' }}
                </div>

                <div class="review-rating">
                    @for ($i = 1; $i <= 5; $i++)
                        {{ $i <= $review->rating ? '★' : '☆' }}
                        @endfor
                        <span>({{ $review->rating }}/5)</span>
                </div>

                @if ($review->comment)
                <p>{{ $review->comment }}</p>
                @endif

                <div class="review-date">
                    {{ $review->created_at->format('d/m/Y H:i') }}
                </div>
            </div>
            @endforeach
            @else
            <p>Chưa có đánh giá nào cho sản phẩm này.</p>
            @endif

            @auth
            <div class="review-form">
                <h3>Viết đánh giá của bạn</h3>

                <form action="/review" method="POST">
                    @csrf

                    <input
                        type="hidden"
                        name="book_id"
                        value="{{ $book->id }}">

                    <label for="rating">Đánh giá</label>
                    <select name="rating" id="rating" required>
                        <option value="">Chọn số sao</option>
                        @for ($i = 5; $i >= 1; $i--)
                        <option
                            value="{{ $i }}"
                            {{ old('rating') == $i ? 'selected' : '' }}>
                            {{ $i }} sao
                        </option>
                        @endfor
                    </select>

                    <label for="comment">Bình luận</label>
                    <textarea
                        name="comment"
                        id="comment"
                        rows="4"
                        placeholder="Chia sẻ cảm nhận của mày về cuốn sách...">{{ old('comment') }}</textarea>

                    <button type="submit" class="btn">
                        Gửi đánh giá
                    </button>
                </form>
            </div>
            @endauth
        </section>
    </main>

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

    <script>
        function changeQuantity(change) {
            const input = document.getElementById('quantity');
            let value = parseInt(input.value, 10);

            if (!Number.isInteger(value) || value < 1) {
                value = 1;
            }

            input.value = Math.max(1, value + change);
            syncCartQuantity();
        }

        function syncCartQuantity() {
            const input = document.getElementById('quantity');
            const cartInput = document.getElementById('cart-quantity');

            let value = parseInt(input.value, 10);

            if (!Number.isInteger(value) || value < 1) {
                value = 1;
                input.value = 1;
            }

            if (cartInput) {
                cartInput.value = value;
            }

            const buyNowInput = document.getElementById('buy-now-quantity');

            if (buyNowInput) {
                buyNowInput.value = value;
            }
        }

        document.getElementById('quantity').addEventListener('input', syncCartQuantity);
        document.getElementById('quantity').addEventListener('change', syncCartQuantity);

        syncCartQuantity();
    </script>

</body>

</html>