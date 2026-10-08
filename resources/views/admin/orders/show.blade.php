<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Chi tiết đơn hàng #{{ $order->id }}</title>

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

        .box {
            background: white;
            padding: 25px;
            margin-bottom: 25px;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.08);
        }

        h1 {
            margin-top: 0;
        }

        h2 {
            margin-top: 0;
        }

        .info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .info p {
            margin: 5px 0;
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

        .total {
            text-align: right;
            font-size: 20px;
            font-weight: bold;
            margin-top: 20px;
        }

        select {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 6px;
            margin-right: 10px;
        }

        button {
            padding: 10px 18px;
            background: #333;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        button:hover {
            background: #555;
        }

        .success {
            background: #d1e7dd;
            color: #0f5132;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 6px;
        }
    </style>
</head>

<body>

<div class="header">

    <h2>📦 CHI TIẾT ĐƠN HÀNG</h2>

    <a href="{{ route('admin.orders.index') }}" class="back">
        ← Danh sách đơn hàng
    </a>

</div>

<div class="container">

    @if (session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <div class="box">

        <h1>Đơn hàng #{{ $order->id }}</h1>

        <div class="info">

            <div>
                <p><strong>Khách hàng:</strong> {{ $order->shipping_name }}</p>

                <p>
                    <strong>Số điện thoại:</strong>
                    {{ $order->shipping_phone }}
                </p>

                <p>
                    <strong>Địa chỉ:</strong>
                    {{ $order->shipping_address }}
                </p>
            </div>

            <div>

                <p>
                    <strong>Thanh toán:</strong>
                    {{ strtoupper($order->payment_method) }}
                </p>

                <p>
                    <strong>Ngày đặt:</strong>
                    {{ $order->created_at->format('d/m/Y H:i') }}
                </p>

                <p>
                    <strong>Trạng thái hiện tại:</strong>
                    {{ $order->status }}
                </p>

            </div>

        </div>

    </div>


    <div class="box">

        <h2>🛒 Sản phẩm trong đơn</h2>

        <table>

            <thead>

                <tr>
                    <th>Sản phẩm</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                </tr>

            </thead>

            <tbody>

                @forelse ($order->items as $item)

                    <tr>

                        <td>
                            {{ $item->book->title ?? 'Sản phẩm không tồn tại' }}
                        </td>

                        <td>
                            {{ number_format($item->price, 0, ',', '.') }} ₫
                        </td>

                        <td>
                            {{ $item->quantity }}
                        </td>

                        <td>
                            {{ number_format($item->price * $item->quantity, 0, ',', '.') }} ₫
                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="4" style="text-align:center;">
                            Đơn hàng chưa có sản phẩm.
                        </td>
                    </tr>

                @endforelse

            </tbody>

        </table>

        <div class="total">
            Tổng tiền:
            {{ number_format($order->total_amount, 0, ',', '.') }} ₫
        </div>

    </div>


    <div class="box">

        <h2>🔄 Cập nhật trạng thái</h2>

        <form
            action="{{ route('admin.orders.updateStatus', $order->id) }}"
            method="POST"
        >

            @csrf
            @method('PATCH')

            <select name="status">

                <option value="pending"
                    {{ $order->status == 'pending' ? 'selected' : '' }}>
                    Chờ xử lý
                </option>

                <option value="processing"
                    {{ $order->status == 'processing' ? 'selected' : '' }}>
                    Đang xử lý
                </option>

                <option value="shipped"
                    {{ $order->status == 'shipped' ? 'selected' : '' }}>
                    Đang giao
                </option>

                <option value="completed"
                    {{ $order->status == 'completed' ? 'selected' : '' }}>
                    Hoàn thành
                </option>

                <option value="cancelled"
                    {{ $order->status == 'cancelled' ? 'selected' : '' }}>
                    Đã hủy
                </option>

            </select>

            <button type="submit">
                Cập nhật trạng thái
            </button>

        </form>

    </div>

</div>

</body>
</html>