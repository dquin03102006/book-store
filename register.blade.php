<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký - Book Store</title>

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #FFF3E5;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px 0;
        }

        .login-box {
            width: 400px;
            max-width: 92%;
            background: white;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 5px 25px rgba(55, 25, 44, 0.12);
        }

        .login-box h2 {
            text-align: center;
            color: #37192C;
            margin-top: 0;
            margin-bottom: 30px;
        }

        .form-group { margin-bottom: 18px; }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #37192C;
            font-weight: 600;
        }

        .form-group input[type="email"],
        .form-group input[type="password"],
        .form-group input[type="text"] {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #ddd;
            border-radius: 8px;
            outline: none;
        }

        .form-group input:focus { border-color: #37192C; }

        .login-btn {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            background: #37192C;
            color: white;
            cursor: pointer;
            font-size: 15px;
        }

        .login-btn:hover { opacity: 0.9; }

        .register-link {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }

        .register-link a {
            color: #37192C;
            text-decoration: none;
            font-weight: bold;
        }

        .error {
            background: #ffe5e5;
            color: #b00020;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 18px;
            font-size: 14px;
        }
    </style>
</head>

<body>

<div class="login-box">

    <h2>Đăng ký</h2>

    @if ($errors->any())
        <div class="error">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form action="{{ route('register') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Họ tên</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Nhập họ tên" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Nhập email" required>
        </div>

        <div class="form-group">
            <label for="phone">Số điện thoại</label>
            <input type="text" id="phone" name="phone" value="{{ old('phone') }}" placeholder="Không bắt buộc">
        </div>

        <div class="form-group">
            <label for="password">Mật khẩu</label>
            <input type="password" id="password" name="password" placeholder="Tối thiểu 6 ký tự" required>
        </div>

        <div class="form-group">
            <label for="password_confirmation">Nhập lại mật khẩu</label>
            <input type="password" id="password_confirmation" name="password_confirmation"
                   placeholder="Nhập lại mật khẩu" required>
        </div>

        <button type="submit" class="login-btn">Đăng ký</button>
    </form>

    <div class="register-link">
        Đã có tài khoản?
        <a href="{{ route('login') }}">Đăng nhập</a>
    </div>

</div>

</body>
</html>
