<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Book Store</title>
</head>
<body>

    @if (session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <h1>Book Store</h1>

    @auth
        <p>Xin chào, {{ auth()->user()->name }}</p>
        <a href="{{ route('profile.edit') }}">Tài khoản</a>

        <form action="{{ route('logout') }}" method="POST" style="display:inline">
            @csrf
            <button type="submit">Đăng xuất</button>
        </form>
    @else
        <a href="{{ route('login') }}">Đăng nhập</a>
        <a href="{{ route('register') }}">Đăng ký</a>
    @endauth

</body>
</html>