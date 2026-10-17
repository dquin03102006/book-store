<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng nhập - Tiệm Sách Nhỏ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f5f3ef;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial, sans-serif;
        }
        .login-card {
            width: 100%;
            max-width: 430px;
            border: none;
            border-radius: 14px;
            box-shadow: 0 5px 24px rgba(0, 0, 0, 0.08);
        }
        .brand {
            color: #212842;
            font-weight: 700;
        }
        .btn-login {
            background: #212842;
            color: white;
            border: none;
        }
        .btn-login:hover {
            background: #405078;
            color: white;
        }
        .form-control:focus {
            border-color: #405078;
            box-shadow: 0 0 0 0.2rem rgba(64, 80, 120, 0.15);
        }
    </style>
</head>
<body>
<div class="container px-3">
    <div class="card login-card mx-auto">
        <div class="card-body p-4 p-md-5">
            <div class="text-center mb-4">
                <h3 class="brand">TIỆM SÁCH NHỎ</h3>
                <p class="text-secondary mb-0">Đăng nhập để tiếp tục mua sắm</p>
            </div>

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        class="form-control @error('email') is-invalid @enderror"
                        required autofocus autocomplete="username"
                    >
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Mật khẩu</label>
                    <input
                        id="password"
                        type="password"
                        name="password"
                        class="form-control @error('password') is-invalid @enderror"
                        required autocomplete="current-password"
                    >
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-check mb-3">
                    <input
                        id="remember_me"
                        type="checkbox"
                        name="remember"
                        value="1"
                        class="form-check-input"
                    >
                    <label for="remember_me" class="form-check-label">
                        Ghi nhớ đăng nhập
                    </label>
                </div>

                <button type="submit" class="btn btn-login w-100 py-2">
                    Đăng nhập
                </button>

                <div class="text-center mt-3">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-decoration-none small">
                            Quên mật khẩu?
                        </a>
                    @endif
                </div>

                <hr>

                <p class="text-center mb-0 small">
                    Chưa có tài khoản?
                    <a href="{{ route('register') }}" class="text-decoration-none">
                        Đăng ký ngay
                    </a>
                </p>

                <div class="text-center mt-3">
                    <a href="{{ url('/') }}" class="text-secondary text-decoration-none small">
                        ← Quay về trang chủ
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
