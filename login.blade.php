<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập - Tiệm  Sách Nhỏ</title>

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

        .remember {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            color: #37192C;
            font-weight: normal;
        }

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

        .success {
            background: #e6f6ea;
            color: #1b6b32;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 18px;
            font-size: 14px;
        }
    </style>
</head>

<body>

<div class="login-box">

    <h2>Đăng nhập</h2>

    @if (session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="error">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}"
                   placeholder="Nhập email" required autofocus>
        </div>

        <div class="form-group">
            <label for="password">Mật khẩu</label>
            <input type="password" id="password" name="password"
                   placeholder="Nhập mật khẩu" required>
        </div>

        <div class="form-group">
            <label class="remember">
                <input type="checkbox" name="remember" value="1">
                Ghi nhớ đăng nhập
            </label>
        </div>

        <button type="submit" class="login-btn">Đăng nhập</button>
    </form>

    <div class="register-link">
        Chưa có tài khoản?
        <a href="{{ route('register') }}">Đăng ký</a>
    </div>

</div>

</body>
</html>
