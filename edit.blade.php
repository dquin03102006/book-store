<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tài khoản của tôi - Book Store</title>
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; font-family: Arial, sans-serif; background: #FFF3E5; color: #37192C; }
        .wrap { max-width: 640px; margin: 30px auto; padding: 0 16px; }
        .card { background: #fff; border-radius: 16px; padding: 28px; margin-bottom: 20px;
                box-shadow: 0 5px 25px rgba(55, 25, 44, 0.12); }
        h1, h3 { margin-top: 0; }
        label { display: block; margin-bottom: 6px; font-weight: 600; }
        input[type="text"], input[type="password"] {
            width: 100%; padding: 11px 14px; border: 1px solid #ddd; border-radius: 8px; margin-bottom: 14px;
        }
        input:disabled { background: #f3f3f3; }
        button { padding: 11px 20px; border: none; border-radius: 8px; background: #37192C; color: #fff; cursor: pointer; }
        .error { background: #ffe5e5; color: #b00020; padding: 10px; border-radius: 8px; margin-bottom: 16px; font-size: 14px; }
        .success { background: #e6f6ea; color: #1b6b32; padding: 10px; border-radius: 8px; margin-bottom: 16px; font-size: 14px; }
        a { color: #37192C; font-weight: bold; }
    </style>
</head>
<body>
<div class="wrap">

    @if (session('success')) <div class="success">{{ session('success') }}</div> @endif
    @if ($errors->any())
        <div class="error">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <div class="card">
        <h1>Tài khoản của tôi</h1>
        <h3>Thông tin cá nhân</h3>
        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            @method('PUT')

            <label>Email</label>
            <input type="text" value="{{ $user->email }}" disabled>

            <label for="name">Họ tên</label>
            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>

            <label for="phone">Số điện thoại</label>
            <input type="text" id="phone" name="phone" value="{{ old('phone', $user->phone) }}">

            <label for="address">Địa chỉ</label>
            <input type="text" id="address" name="address" value="{{ old('address', $user->address) }}">

            <button type="submit">Lưu thông tin</button>
        </form>
    </div>

    <div class="card">
        <h3>Đổi mật khẩu</h3>
        <form action="{{ route('profile.password') }}" method="POST">
            @csrf
            @method('PUT')

            <label for="current_password">Mật khẩu hiện tại</label>
            <input type="password" id="current_password" name="current_password" required>

            <label for="password">Mật khẩu mới</label>
            <input type="password" id="password" name="password" required>

            <label for="password_confirmation">Nhập lại mật khẩu mới</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>

            <button type="submit">Đổi mật khẩu</button>
        </form>
    </div>

    <p><a href="{{ route('orders.index') }}">Đơn hàng của tôi</a> &nbsp;|&nbsp; <a href="/">Về trang chủ</a></p>
</div>
</body>
</html>
