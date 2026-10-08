<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Quản lý đơn hàng - Tiệm Sách Nhỏ</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #fdfbf6;
            color: #1f2a44;
        }

        /* ================= HEADER ================= */

        .header {
            height: 78px;
            background: #ffffff;
            border-bottom: 1px solid #eee8dc;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 45px;
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .logo {
            display: flex;
            align-items: center;
            text-decoration: none;
        }

        .logo img {
            width: 105px;
            height: auto;
            display: block;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .admin-name {
            font-size: 14px;
            color: #666;
        }

        .admin-name strong {
            color: #1f2a44;
        }

        .logout-btn {
            border: none;
            background: #1f2a44;
            color: #ffffff;
            padding: 10px 18px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
        }

        .logout-btn:hover {
            background: #151d31;
        }

        /* ================= CONTAINER ================= */

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 40px 45px;
        }

        /* ================= TOP ================= */

        .page-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 28px;
            gap: 20px;
        }

        .page-title {
            margin: 0;
            font-size: 30px;
            color: #1f2a44;
        }

        .page-description {
            margin: 7px 0 0;
            color: #777;
            font-size: 14px;
        }

        .back-btn {
            display: inline-block;
            padding: 11px 18px;
            background: #ffffff;
            color: #1f2a44;
            border: 1px solid #ddd6c9;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            transition: 0.2s;
        }

        .back-btn:hover {
            background: #f4efe5;
        }

        /* ================= FILTER ================= */

        .filter-box {
            background: #ffffff;
            border: 1px solid #eee8dc;
            border-radius: 14px;
            padding: 22px;
            margin-bottom: 25px;
            box-shadow: 0 3px 12px rgba(31, 42, 68, 0.04);
        }

        .filter-title {
            margin: 0 0 15px;
            font-size: 16px;
            color: #1f2a44;
        }

        .filter-form {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .filter-form select {
            min-width: 220px;
            padding: 11px 13px;
            border: 1px solid #ddd6c9;
            border-radius: 8px;
            background: #ffffff;
            color: #444;
            font-size: 14px;
            outline: none;
        }

        .filter-form select:focus {
            border-color: #1f2a44;
        }

        .filter-btn {
            padding: 11px 20px;
            border: none;
            border-radius: 8px;
            background: #1f2a44;
            color: #ffffff;
            cursor: pointer;
            font-size: 14px;
        }

        .filter-btn:hover {
            background: #151d31;
        }

        .reset-btn {
            padding: 10px 18px;
            border: 1px solid #ddd6c9;
            border-radius: 8px;
            color: #555;
            background: #ffffff;
            text-decoration: none;
            font-size: 14px;
        }

        .reset-btn:hover {
            background: #f4efe5;
        }

        /* ================= TABLE ================= */

        .table-box {
            background: #ffffff;
            border: 1px solid #eee8dc;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 3px 12px rgba(31, 42, 68, 0.04);
        }

        .table-header {
            padding: 20px 22px;
            border-bottom: 1px solid #eee8dc;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .table-header h2 {
            margin: 0;
            font-size: 18px;
            color: #1f2a44;
        }

        .order-count {
            color: #888;
            font-size: 14px;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1050px;
        }

        thead {
            background: #f6f2e9;
        }

        th {
            padding: 15px 14px;
            text-align: left;
            font-size: 13px;
            color: #1f2a44;
            font-weight: 600;
            border-bottom: 1px solid #e9e2d5;
            white-space: nowrap;
        }

        td {
            padding: 16px 14px;
            border-bottom: 1px solid #f0ece4;
            font-size: 14px;
            color: #555;
            vertical-align: middle;
        }

        tbody tr:hover {
            background: #fcfaf6;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .order-id {
            color: #1f2a44;
            font-weight: 700;
        }

        .customer-name {
            color: #333;
            font-weight: 600;
        }

        .phone {
            white-space: nowrap;
        }

        .price {
            color: #1f2a44;
            font-weight: 700;
            white-space: nowrap;
        }

        /* ================= STATUS ================= */

        .status {
            display: inline-block;
            padding: 6px 11px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            white-space: nowrap;
        }

        .status-pending {
            background: #fff4d6;
            color: #9a6b00;
        }

        .status-processing {
            background: #e8f0ff;
            color: #315ca8;
        }

        .status-shipped {
            background: #e8f7f1;
            color: #24785b;
        }

        .status-completed {
            background: #e5f5e9;
            color: #28753c;
        }

        .status-cancelled {
            background: #fce8e8;
            color: #a43a3a;
        }

        /* ================= ACTION ================= */

        .detail-btn {
            display: inline-block;
            padding: 8px 14px;
            border-radius: 7px;
            background: #1f2a44;
            color: #ffffff;
            text-decoration: none;
            font-size: 13px;
            transition: 0.2s;
            white-space: nowrap;
        }

        .detail-btn:hover {
            background: #151d31;
        }

        /* ================= EMPTY ================= */

        .empty {
            text-align: center;
            padding: 55px 20px;
            color: #888;
        }

        .empty-icon {
            font-size: 40px;
            margin-bottom: 10px;
        }

        .empty p {
            margin: 0;
        }

        /* ================= PAGINATION ================= */

        .pagination-box {
            padding: 20px 22px;
            border-top: 1px solid #eee8dc;
        }

        .pagination-box nav {
            display: flex;
            justify-content: center;
        }

        /* ================= RESPONSIVE ================= */

        @media (max-width: 768px) {

            .header {
                padding: 0 20px;
            }

            .container {
                padding: 25px 18px;
            }

            .page-top {
                flex-direction: column;
                align-items: flex-start;
            }

            .header-right {
                gap: 10px;
            }

            .admin-name {
                display: none;
            }

            .filter-form {
                flex-wrap: wrap;
            }

            .filter-form select {
                width: 100%;
            }

            .filter-btn,
            .reset-btn {
                flex: 1;
                text-align: center;
            }

            .page-title {
                font-size: 25px;
            }
        }
    </style>
</head>

<body>

    {{-- ================= HEADER ================= --}}

    <header class="header">

        <a href="/admin" class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="Tiệm Sách Nhỏ">
        </a>

        <div class="header-right">

            <div class="admin-name">
                Xin chào,
                <strong>{{ auth()->user()->name }}</strong>
            </div>

            <form action="/admin/logout" method="POST">

                @csrf

                <button type="submit" class="logout-btn">
                    Đăng xuất
                </button>

            </form>

        </div>

    </header>


    {{-- ================= CONTENT ================= --}}

    <main class="container">

        <div class="page-top">

            <div>

                <h1 class="page-title">
                    Quản lý đơn hàng
                </h1>

                <p class="page-description">
                    Theo dõi và cập nhật trạng thái các đơn hàng của khách hàng.
                </p>

            </div>

            <a href="/admin" class="back-btn">
                ← Về Dashboard
            </a>

        </div>


        {{-- ================= FILTER ================= --}}

        <div class="filter-box">

            <h3 class="filter-title">
                Lọc đơn hàng
            </h3>

            <form
                action="{{ route('admin.orders.index') }}"
                method="GET"
                class="filter-form"
            >

                <select name="status">

                    <option value="">
                        Tất cả trạng thái
                    </option>

                    <option
                        value="pending"
                        {{ request('status') == 'pending' ? 'selected' : '' }}
                    >
                        Chờ xử lý
                    </option>

                    <option
                        value="processing"
                        {{ request('status') == 'processing' ? 'selected' : '' }}
                    >
                        Đang xử lý
                    </option>

                    <option
                        value="shipped"
                        {{ request('status') == 'shipped' ? 'selected' : '' }}
                    >
                        Đang giao
                    </option>

                    <option
                        value="completed"
                        {{ request('status') == 'completed' ? 'selected' : '' }}
                    >
                        Hoàn thành
                    </option>

                    <option
                        value="cancelled"
                        {{ request('status') == 'cancelled' ? 'selected' : '' }}
                    >
                        Đã hủy
                    </option>

                </select>

                <button type="submit" class="filter-btn">
                    Lọc đơn hàng
                </button>

                <a
                    href="{{ route('admin.orders.index') }}"
                    class="reset-btn"
                >
                    Đặt lại
                </a>

            </form>

        </div>


        {{-- ================= TABLE ================= --}}

        <div class="table-box">

            <div class="table-header">

                <h2>
                    Danh sách đơn hàng
                </h2>

                <span class="order-count">
                    {{ $orders->total() }} đơn hàng
                </span>

            </div>


            @if($orders->count() > 0)

                <div class="table-wrapper">

                    <table>

                        <thead>

                            <tr>
                                <th>Mã đơn</th>
                                <th>Khách hàng</th>
                                <th>SĐT</th>
                                <th>Tổng tiền</th>
                                <th>Thanh toán</th>
                                <th>Trạng thái</th>
                                <th>Ngày đặt</th>
                                <th>Thao tác</th>
                            </tr>

                        </thead>

                        <tbody>

                            @foreach($orders as $order)

                                <tr>

                                    {{-- MÃ ĐƠN --}}

                                    <td>
                                        <span class="order-id">
                                            #{{ $order->id }}
                                        </span>
                                    </td>


                                    {{-- KHÁCH HÀNG --}}

                                    <td>
                                        <span class="customer-name">
                                            {{ $order->shipping_name }}
                                        </span>
                                    </td>


                                    {{-- SĐT --}}

                                    <td>
                                        <span class="phone">
                                            {{ $order->shipping_phone }}
                                        </span>
                                    </td>


                                    {{-- TỔNG TIỀN --}}

                                    <td>
                                        <span class="price">
                                            {{ number_format($order->total_amount, 0, ',', '.') }} đ
                                        </span>
                                    </td>


                                    {{-- THANH TOÁN --}}

                                    <td>
                                        <strong>
                                            {{ strtoupper($order->payment_method ?? '') }}
                                        </strong>
                                    </td>


                                    {{-- TRẠNG THÁI --}}

                                    <td>

                                        @if($order->status === 'pending')

                                            <span class="status status-pending">
                                                Chờ xử lý
                                            </span>

                                        @elseif($order->status === 'processing')

                                            <span class="status status-processing">
                                                Đang xử lý
                                            </span>

                                        @elseif($order->status === 'shipped')

                                            <span class="status status-shipped">
                                                Đang giao
                                            </span>

                                        @elseif($order->status === 'completed')

                                            <span class="status status-completed">
                                                Hoàn thành
                                            </span>

                                        @elseif($order->status === 'cancelled')

                                            <span class="status status-cancelled">
                                                Đã hủy
                                            </span>

                                        @endif

                                    </td>


                                    {{-- NGÀY ĐẶT --}}

                                    <td>
                                        {{ $order->created_at->format('d/m/Y H:i') }}
                                    </td>


                                    {{-- THAO TÁC --}}

                                    <td>

                                        <a
                                            href="{{ route('admin.orders.show', $order->id) }}"
                                            class="detail-btn"
                                        >
                                            Xem chi tiết
                                        </a>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>


                {{-- PAGINATION --}}

                <div class="pagination-box">

                    {{ $orders->links() }}

                </div>


            @else

                <div class="empty">

                    <div class="empty-icon">
                        📦
                    </div>

                    <p>
                        Chưa có đơn hàng nào.
                    </p>

                </div>

            @endif

        </div>

    </main>

</body>

</html>