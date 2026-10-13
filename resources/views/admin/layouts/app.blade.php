<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin') - Book Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="d-flex" style="min-height:100vh">
    <aside class="bg-dark text-white p-3" style="width:240px">
        <h5 class="mb-4">Book Store Admin</h5>
        <ul class="nav flex-column">
            <li class="nav-item"><a class="nav-link text-white {{ request()->routeIs('admin.dashboard') ? 'fw-bold' : '' }}" href="{{ route('admin.dashboard') }}">Tổng quan</a></li>
            <li class="nav-item"><a class="nav-link text-white {{ request()->routeIs('admin.books.*') ? 'fw-bold' : '' }}" href="{{ route('admin.books.index') }}">Sản phẩm</a></li>
            <li class="nav-item"><a class="nav-link text-white {{ request()->routeIs('admin.categories.*') ? 'fw-bold' : '' }}" href="{{ route('admin.categories.index') }}">Danh mục</a></li>
            <li class="nav-item"><a class="nav-link text-white {{ request()->routeIs('admin.customers.*') ? 'fw-bold' : '' }}" href="{{ route('admin.customers.index') }}">Khách hàng</a></li>
            @if(auth()->user()->role === 'admin')
                <li class="nav-item"><a class="nav-link text-white {{ request()->routeIs('admin.staff.*') ? 'fw-bold' : '' }}" href="{{ route('admin.staff.index') }}">Nhân viên</a></li>
            @endif
        </ul>
        <hr>
        <div class="small mb-2">{{ auth()->user()->name }} ({{ auth()->user()->role }})</div>
        <form method="post" action="{{ route('admin.logout') }}">
            @csrf
            <button class="btn btn-outline-light btn-sm w-100">Đăng xuất</button>
        </form>
    </aside>
    <main class="flex-grow-1 p-4">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @yield('content')
    </main>
</div>
</body>
</html>
