<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Chi tiết đơn hàng - Tiệm Sách Nhỏ</title>

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
            color: #777;
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
            max-width: 1200px;
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

        .title-area h1 {
            margin: 0;
            font-size: 30px;
            color: #1f2a44;
        }

        .title-area p {
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
        }

        .back-btn:hover {
            background: #f4efe5;
        }

        /* ================= SUCCESS ================= */

        .success-message {
            background: #eaf7ed;
            color: #28753c;
            border: 1px solid #ccebd3;
            padding: 14px 18px;
            border-radius: 10px;
            margin-bottom: 22px;
            font-size: 14px;
        }

        /* ================= GRID ================= */

        .grid {
            display: grid;
            grid-template-columns: 1fr 360px;
            gap: 24px;
        }

        /* ================= CARD ================= */

        .card {
            background: #ffffff;
            border: 1px solid #eee8dc;
            border-radius: 14px;
            box-shadow: 0 3px 12px rgba(31, 42, 68, 0.04);
            margin-bottom: 24px;
            overflow: hidden;
        }

        .card-header {
            padding: 20px 22px;
            border-bottom: 1px solid #eee8dc;
            background: #ffffff;
        }

        .card-header h2 {
            margin: 0;
            font-size: 18px;
            color: #1f2a44;
        }

        .card-body {
            padding: 22px;
        }

        /* ================= ORDER INFO ================= */

        .info-row {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            padding: 12px 0;
            border-bottom: 1px solid #f0ece4;
            font-size: 14px;
        }

        .info-row:last-child {
            border-bottom: none;
        }

        .info-label {
            color: #777;
        }

        .info-value {
            color: #333;
            font-weight: 600;
            text-align: right;
        }

        /* ================= CUSTOMER ================= */

        .customer-name {
            font-size: 18px;
            font-weight: 700;
            color: #1f2a44;
            margin-bottom: 15px;
        }

        .customer-info {
            display: flex;
            flex-direction: column;
            gap: 11px;
        }

        .customer-item {
            display: flex;
            gap: 10px;
            font-size: 14px;
            line-height: 1.5;
        }

        .customer-label {
            min-width: 90px;
            color: #888;
        }

        .customer-value {
            color: #444;
        }

        /* ================= PRODUCTS ================= */

        .product-row {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 16px 0;
            border-bottom: 1px solid #f0ece4;
        }

        .product-row:first-child {
            padding-top: 0;
        }

        .product-row:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .product-image {
            width: 70px;
            height: 85px;
            background: #f6f2e9;
            border-radius: 8px;
            overflow: hidden;
            flex-shrink: 0;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .no-image {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 25px;
        }

        .product-info {
            flex: 1;
        }

        .product-name {
            font-size: 15px;
            font-weight: 600;
            color: #1f2a44;
            margin-bottom: 7px;
        }

        .product-meta {
            color: #888;
            font-size: 13px;
        }

        .product-price {
            text-align: right;
            min-width: 110px;
        }

        .unit-price {
            color: #888;
            font-size: 12px;
            margin-bottom: 5px;
        }

        .total-price {
            color: #1f2a44;
            font-weight: 700;
            font-size: 14px;
        }

        /* ================= TOTAL ================= */

        .total-box {
            background: #f6f2e9;
            border-radius: 10px;
            padding: 18px;
            margin-top: 20px;
        }

        .total-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .total-label {
            color: #555;
            font-size: 15px;
        }

        .total-value {
            color: #1f2a44;
            font-size: 22px;
            font-weight: 700;
        }

        /* ================= STATUS ================= */

        .status-current {
            margin-bottom: 20px;
        }

        .status-label {
            display: block;
            color: #777;
            font-size: 13px;
            margin-bottom: 8px;
        }

        .status {
            display: inline-block;
            padding: 7px 13px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
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

        /* ================= FORM ================= */

        .status-form label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            color: #555;
        }

        .status-form select {
            width: 100%;
            padding: 12px 13px;
            border: 1px solid #ddd6c9;
            border-radius: 8px;
            background: #ffffff;
            color: #444;
            outline: none;
            font-size: 14px;
            margin-bottom: 12px;
        }

        .status-form select:focus {
            border-color: #1f2a44;
        }

        .update-btn {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            background: #1f2a44;
            color: #ffffff;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
        }

        .update-btn:hover {
            background: #151d31;
        }

        /* ================= RESPONSIVE ================= */

        @media (max-width: 900px) {

            .grid {
                grid-template-columns: 1fr;
            }
        }

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

            .admin-name {
                display: none;
            }

            .product-row {
                align-items: flex-start;
            }

            .product-price {
                min-width: 90px;
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

            <div class="title-area">

                <h1>
                    Chi tiết đơn hàng #{{ $order->id }}
                </h1>

                <p>
                    Xem thông tin và cập nhật trạng thái đơn hàng.
                </p>

            </div>

            <a
                href="{{ route('admin.orders.index') }}"
                class="back-btn"
            >
                ← Danh sách đơn hàng
            </a>

        </div>


        {{-- ================= SUCCESS ================= --}}

        @if(session('success'))

            <div class="success-message">
                ✓ {{ session('success') }}
            </div>

        @endif


        <div class="grid">

            {{-- ================= LEFT ================= --}}

            <div>

                {{-- THÔNG TIN ĐƠN HÀNG --}}

                <div class="card">

                    <div class="card-header">

                        <h2>
                            Thông tin đơn hàng
                        </h2>

                    </div>

                    <div class="card-body">

                        <div class="info-row">

                            <span class="info-label">
                                Mã đơn hàng
                            </span>

                            <span class="info-value">
                                #{{ $order->id }}
                            </span>

                        </div>


                        <div class="info-row">

                            <span class="info-label">
                                Ngày đặt
                            </span>

                            <span class="info-value">
                                {{ $order->created_at->format('d/m/Y H:i') }}
                            </span>

                        </div>


                        <div class="info-row">

                            <span class="info-label">
                                Phương thức thanh toán
                            </span>

                            <span class="info-value">

                                @if(strtolower($order->payment_method ?? '') === 'cod')
                                    COD
                                @else
                                    {{ strtoupper($order->payment_method ?? '') }}
                                @endif

                            </span>

                        </div>


                        <div class="info-row">

                            <span class="info-label">
                                Trạng thái
                            </span>

                            <span class="info-value">

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

                            </span>

                        </div>

                    </div>

                </div>


                {{-- THÔNG TIN KHÁCH HÀNG --}}

                <div class="card">

                    <div class="card-header">

                        <h2>
                            Thông tin khách hàng
                        </h2>

                    </div>

                    <div class="card-body">

                        <div class="customer-name">
                            {{ $order->shipping_name }}
                        </div>

                        <div class="customer-info">

                            <div class="customer-item">

                                <span class="customer-label">
                                    Số điện thoại:
                                </span>

                                <span class="customer-value">
                                    {{ $order->shipping_phone }}
                                </span>

                            </div>


                            <div class="customer-item">

                                <span class="customer-label">
                                    Địa chỉ:
                                </span>

                                <span class="customer-value">
                                    {{ $order->shipping_address }}
                                </span>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- SẢN PHẨM TRONG ĐƠN --}}

                <div class="card">

                    <div class="card-header">

                        <h2>
                            Sản phẩm trong đơn
                        </h2>

                    </div>

                    <div class="card-body">

                        @foreach($order->items as $item)

                            <div class="product-row">

                                <div class="product-image">

                                    @if($item->book && $item->book->image)

                                        <img
                                            src="{{ asset('storage/' . $item->book->image) }}"
                                            alt="{{ $item->book->title }}"
                                        >

                                    @else

                                        <div class="no-image">
                                            📚
                                        </div>

                                    @endif

                                </div>


                                <div class="product-info">

                                    <div class="product-name">
                                        {{ $item->book->title ?? 'Sản phẩm' }}
                                    </div>

                                    <div class="product-meta">
                                        Số lượng: {{ $item->quantity }}
                                    </div>

                                </div>


                                <div class="product-price">

                                    <div class="unit-price">
                                        {{ number_format($item->price, 0, ',', '.') }} đ / cuốn
                                    </div>

                                    <div class="total-price">
                                        {{ number_format($item->price * $item->quantity, 0, ',', '.') }} đ
                                    </div>

                                </div>

                            </div>

                        @endforeach


                        <div class="total-box">

                            <div class="total-row">

                                <span class="total-label">
                                    Tổng tiền đơn hàng
                                </span>

                                <span class="total-value">
                                    {{ number_format($order->total_amount, 0, ',', '.') }} đ
                                </span>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- ================= RIGHT ================= --}}

            <div>

                {{-- CẬP NHẬT TRẠNG THÁI --}}

                <div class="card">

                    <div class="card-header">

                        <h2>
                            Cập nhật trạng thái
                        </h2>

                    </div>

                    <div class="card-body">

                        <div class="status-current">

                            <span class="status-label">
                                Trạng thái hiện tại
                            </span>


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

                        </div>


                        <form
                            action="{{ route('admin.orders.updateStatus', $order->id) }}"
                            method="POST"
                            class="status-form"
                        >

                            @csrf
                            @method('PATCH')

                            <label>
                                Chọn trạng thái mới
                            </label>

                            <select name="status">

                                <option
                                    value="pending"
                                    {{ $order->status === 'pending' ? 'selected' : '' }}
                                >
                                    Chờ xử lý
                                </option>

                                <option
                                    value="processing"
                                    {{ $order->status === 'processing' ? 'selected' : '' }}
                                >
                                    Đang xử lý
                                </option>

                                <option
                                    value="shipped"
                                    {{ $order->status === 'shipped' ? 'selected' : '' }}
                                >
                                    Đang giao
                                </option>

                                <option
                                    value="completed"
                                    {{ $order->status === 'completed' ? 'selected' : '' }}
                                >
                                    Hoàn thành
                                </option>

                                <option
                                    value="cancelled"
                                    {{ $order->status === 'cancelled' ? 'selected' : '' }}
                                >
                                    Đã hủy
                                </option>

                            </select>

                            <button
                                type="submit"
                                class="update-btn"
                            >
                                Cập nhật trạng thái
                            </button>

                        </form>

                    </div>

                </div>


                {{-- TÓM TẮT ĐƠN HÀNG --}}

                <div class="card">

                    <div class="card-header">

                        <h2>
                            Tóm tắt đơn hàng
                        </h2>

                    </div>

                    <div class="card-body">

                        <div class="info-row">

                            <span class="info-label">
                                Số sản phẩm
                            </span>

                            <span class="info-value">
                                {{ $order->items->sum('quantity') }}
                            </span>

                        </div>


                        <div class="info-row">

                            <span class="info-label">
                                Mã đơn
                            </span>

                            <span class="info-value">
                                #{{ $order->id }}
                            </span>

                        </div>


                        <div class="info-row">

                            <span class="info-label">
                                Thanh toán
                            </span>

                            <span class="info-value">

                                @if(strtolower($order->payment_method ?? '') === 'cod')
                                    COD
                                @else
                                    {{ strtoupper($order->payment_method ?? '') }}
                                @endif

                            </span>

                        </div>


                        <div class="info-row">

                            <span class="info-label">
                                Tổng cộng
                            </span>

                            <span
                                class="info-value"
                                style="font-size: 18px; color: #1f2a44;"
                            >
                                {{ number_format($order->total_amount, 0, ',', '.') }} đ
                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </main>

</body>

</html>