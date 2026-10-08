<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Quản lý đơn hàng</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            color: #333;
        }

        .header {
            background: #333;
            color: white;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h2 {
            margin: 0;
        }

        .back {
            color: white;
            text-decoration: none;
        }

        .container {
            padding: 40px;
        }

        .filter-box {
            background: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
        }

        .filter-box label {
            font-weight: bold;
            margin-right: 10px;
        }

        .filter-box select {
            padding: 9px 14px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
        }

        .table-box {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 14px;
            border-bottom: 1px solid #eee;
            text-align: left;
        }

        th {
            background: #f8f8f8;
        }

        .status {
            padding: 6px 10px;
            border-radius: 5px;
            font-size: 13px;
        }

        .pending {
            background: #fff3cd;
            color: #856404;
        }

        .processing {
            background: #cfe2ff;
            color: #084298;
        }

        .shipped {
            background: #d1ecf1;
            color: #0c5460;
        }

        .completed {
            background: #d1e7dd;
            color: #0f5132;
        }

        .cancelled {
            background: #f8d7da;
            color: #842029;
        }

        .view-btn {
            background: #333;
            color: white;
            padding: 7px 12px;
            border-radius: 5px;
            text-decoration: none;
        }

        .view-btn:hover {
            background: #555;
        }

        .success {
            background: #d1e7dd;
            color: #0f5132;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 6px;
        }

        .pagination {
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <div class="header">

        <h2>📦 QUẢN LÝ ĐƠN HÀNG</h2>

        <a href="/admin" class="back">
            ← Về Dashboard
        </a>

    </div>


    <div class="container">

        <h1>Danh sách đơn hàng</h1>


        <!-- THÔNG BÁO -->
        @if (session('success'))

            <div class="success">
                {{ session('success') }}
            </div>

        @endif


        <!-- BỘ LỌC -->
        <div class="filter-box">

            <form method="GET" action="{{ route('admin.orders.index') }}">

                <label for="status">
                    Lọc theo trạng thái:
                </label>

                <select
                    name="status"
                    id="status"
                    onchange="this.form.submit()"
                >

                    <option value="">
                        Tất cả đơn hàng
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

            </form>

        </div>


        <!-- BẢNG ĐƠN HÀNG -->
        <div class="table-box">

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

                    @forelse ($orders as $order)

                        <tr>

                            <td>
                                #{{ $order->id }}
                            </td>

                            <td>
                                {{ $order->shipping_name }}
                            </td>

                            <td>
                                {{ $order->shipping_phone }}
                            </td>

                            <td>
                                {{ number_format($order->total_amount, 0, ',', '.') }} ₫
                            </td>

                            <td>
                                {{ strtoupper($order->payment_method) }}
                            </td>

                            <td>

                                <span class="status {{ $order->status }}">
                                    {{ $order->status }}
                                </span>

                            </td>

                            <td>
                                {{ $order->created_at->format('d/m/Y H:i') }}
                            </td>

                            <td>

                                <a
                                    href="{{ route('admin.orders.show', $order->id) }}"
                                    class="view-btn"
                                >
                                    Xem
                                </a>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="8" style="text-align:center;">

                                Chưa có đơn hàng nào.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>


            <!-- PHÂN TRANG -->
            <div class="pagination">

                {{ $orders->links() }}

            </div>

        </div>

    </div>

</body>

</html>