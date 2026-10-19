<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin') - Tiệm Sách Nhỏ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="d-flex" style="min-height:100vh">
        <aside class="text-white p-3" style="width:240px; background-color:#212842;">
            <a href="{{ url('/') }}" class="d-block text-center mb-4">
                <img src="{{ asset('images/logofooter.png') }}"
                    alt="Tiệm Sách Nhỏ"
                    style="max-width: 170px; max-height: 80px; object-fit: contain;">
            </a>
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link text-white {{ request()->routeIs('admin.dashboard') ? 'fw-bold' : '' }}" href="{{ route('admin.dashboard') }}">Tổng quan</a></li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->routeIs('admin.statistics.*') ? 'fw-bold' : '' }}"
                        href="{{ route('admin.statistics.index') }}">
                        Thống kê
                    </a>
                </li>
                <li class="nav-item"><a class="nav-link text-white {{ request()->routeIs('admin.books.*') ? 'fw-bold' : '' }}" href="{{ route('admin.books.index') }}">Sản phẩm</a></li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->is('admin/orders*') ? 'fw-bold' : '' }}"
                        href="{{ url('/admin/orders') }}">
                        Đơn hàng
                    </a>
                </li>

                <li class="nav-item"><a class="nav-link text-white {{ request()->routeIs('admin.categories.*') ? 'fw-bold' : '' }}" href="{{ route('admin.categories.index') }}">Danh mục</a></li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->routeIs('admin.banners.*') ? 'fw-bold' : '' }}"
                        href="{{ route('admin.banners.index') }}">
                        Banner
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->routeIs('admin.about.*') ? 'fw-bold' : '' }}"
                        href="{{ route('admin.about.edit') }}">
                        Giới thiệu
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->routeIs('admin.news.*') ? 'fw-bold' : '' }}"
                        href="{{ route('admin.news.index') }}">
                        Tin tức/bài viết
                    </a>
                </li>
                <li class="nav-item"><a class="nav-link text-white {{ request()->routeIs('admin.customers.*') ? 'fw-bold' : '' }}" href="{{ route('admin.customers.index') }}">Khách hàng</a></li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->routeIs('admin.support-messages.*') ? 'fw-bold' : '' }}"
                        href="{{ route('admin.support-messages.index') }}">
                        Yêu cầu hỗ trợ
                    </a>
                </li>

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