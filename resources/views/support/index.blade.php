<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hỗ trợ khách hàng - Book Store</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f6fa;
            color: #212842;
        }

        header {
            background: #212842;
            color: white;
            padding: 18px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
        }

        header a {
            color: white;
            text-decoration: none;
        }

        .container {
            max-width: 1000px;
            margin: 35px auto;
            padding: 0 20px;
        }

        .intro {
            text-align: center;
            margin-bottom: 30px;
        }

        .intro h1 {
            color: #212842;
            margin-bottom: 10px;
        }

        .content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 3px 12px #0000000d;
        }

        .card h2 {
            margin-top: 0;
            font-size: 21px;
        }

        .faq-item {
            padding: 14px 0;
            border-bottom: 1px solid #eee;
        }

        .faq-item:last-child {
            border-bottom: none;
        }

        .faq-item h3 {
            font-size: 16px;
            margin: 0 0 8px;
        }

        .faq-item p {
            margin: 0;
            line-height: 1.6;
            color: #555;
            overflow-wrap: anywhere;
        }

        label {
            display: block;
            margin: 14px 0 6px;
            font-weight: bold;
        }

        input, textarea {
            width: 100%;
            padding: 11px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        button {
            width: 100%;
            margin-top: 18px;
            padding: 12px;
            background: #212842;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 15px;
        }

        button:hover {
            background: #35416b;
        }

        .success {
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 6px;
            background: #e4f8e9;
            color: #176b31;
        }

        .error {
            color: #c62828;
            font-size: 13px;
            margin-top: 5px;
        }

        footer {
            text-align: center;
            padding: 22px;
            color: #666;
        }

        @media (max-width: 700px) {
            .content {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <header>
        <a href="{{ url('/') }}"><strong>BOOK STORE</strong></a>
        <a href="{{ url('/') }}">← Quay lại trang chủ</a>
    </header>

    <main class="container">
        <div class="intro">
            <h1>Hỗ trợ khách hàng</h1>
            <p>Book Store luôn sẵn sàng lắng nghe và hỗ trợ bạn.</p>
        </div>

        <div class="content">
            <section class="card">
                <h2>Câu hỏi thường gặp</h2>

                @forelse ($faqs as $faq)
                    <div class="faq-item">
                        <h3>{{ $faq->question }}</h3>
                        <p>{{ $faq->answer }}</p>
                    </div>
                @empty
                    <div class="faq-item">
                        <h3>Làm thế nào để mua sách?</h3>
                        <p>Chọn sách bạn muốn mua, thêm vào giỏ hàng và làm theo hướng dẫn đặt hàng.</p>
                    </div>

                    <div class="faq-item">
                        <h3>Làm thế nào để liên hệ hỗ trợ?</h3>
                        <p>Điền thông tin vào biểu mẫu bên cạnh và gửi yêu cầu cho chúng tôi.</p>
                    </div>

                    <div class="faq-item">
                        <h3>Làm thế nào để xem khuyến mãi?</h3>
                        <p>Kiểm tra mã giảm giá tại khu vực khuyến mãi hoặc trong giỏ hàng.</p>
                    </div>
                @endforelse
            </section>

            <section class="card">
                <h2>Gửi yêu cầu hỗ trợ</h2>

                @if (session('success'))
                    <div class="success">{{ session('success') }}</div>
                @endif

                @if ($errors->any())
                    <div class="error">Vui lòng kiểm tra lại thông tin đã nhập.</div>
                @endif

                <form action="{{ route('support.store') }}" method="POST">
                    @csrf

                    <label for="name">Họ và tên</label>
                    <input
                        id="name"
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        required
                    >
                    @error('name')
                        <div class="error">{{ $message }}</div>
                    @enderror

                    <label for="email">Email</label>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                    >
                    @error('email')
                        <div class="error">{{ $message }}</div>
                    @enderror

                    <label for="subject">Tiêu đề</label>
                    <input
                        id="subject"
                        type="text"
                        name="subject"
                        value="{{ old('subject') }}"
                        required
                    >
                    @error('subject')
                        <div class="error">{{ $message }}</div>
                    @enderror

                    <label for="message">Nội dung cần hỗ trợ</label>
                    <textarea
                        id="message"
                        name="message"
                        required
                    >{{ old('message') }}</textarea>
                    @error('message')
                        <div class="error">{{ $message }}</div>
                    @enderror

                    <button type="submit">Gửi yêu cầu</button>
                </form>
            </section>
        </div>
    </main>

    <footer>© {{ date('Y') }} Book Store</footer>
</body>
</html>
