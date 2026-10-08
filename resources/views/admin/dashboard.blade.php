<!DOCTYPE html>
<html lang="vi">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Admin Dashboard - Tiệm Sách Nhỏ</title>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #fdfbf6;
            color: #1f2a44;
        }


        /* ==============================
           HEADER
        ============================== */

        .header {
            height: 82px;

            background: #ffffff;

            padding: 0 50px;

            display: flex;

            justify-content: space-between;

            align-items: center;

            box-shadow:
                0 2px 10px rgba(31, 42, 68, 0.08);
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


        .admin-label {
            font-size: 15px;

            color: #555;
        }


        .logout {
            background: #1f2a44;

            color: white;

            border: none;

            padding: 10px 20px;

            border-radius: 25px;

            cursor: pointer;
        }


        .logout:hover {
            background: #2f3d5d;
        }


        /* ==============================
           CONTAINER
        ============================== */

        .container {
            max-width: 1500px;

            margin: auto;

            padding: 40px 50px 60px;
        }


        .welcome {
            margin-bottom: 30px;
        }


        .welcome h1 {
            margin: 0 0 8px;

            font-size: 30px;
        }


        .welcome p {
            margin: 0;

            color: #777;
        }


        /* ==============================
           CARDS
        ============================== */

        .cards {
            display: grid;

            grid-template-columns:
                repeat(5, 1fr);

            gap: 20px;

            margin-bottom: 30px;
        }


        .card {
            background: white;

            padding: 24px;

            border-radius: 15px;

            box-shadow:
                0 4px 15px rgba(31, 42, 68, 0.08);

            border: 1px solid #f0eee8;
        }


        .card h3 {
            margin: 0;

            font-size: 14px;

            font-weight: normal;

            color: #777;
        }


        .number {
            font-size: 27px;

            font-weight: bold;

            margin-top: 15px;
        }


        .revenue-number {
            font-size: 20px;
        }


        /* ==============================
           MENU
        ============================== */

        .menu {
            margin-bottom: 30px;
        }


        .menu a {
            display: inline-block;

            background: #1f2a44;

            color: white;

            text-decoration: none;

            padding: 13px 24px;

            border-radius: 25px;

            font-size: 14px;
        }


        .menu a:hover {
            background: #2f3d5d;
        }


        /* ==============================
           CHART
        ============================== */

        .chart-box {
            background: white;

            padding: 28px;

            border-radius: 15px;

            box-shadow:
                0 4px 15px rgba(31, 42, 68, 0.08);

            border: 1px solid #f0eee8;

            margin-bottom: 30px;
        }


        .chart-box h2 {
            margin: 0 0 25px;

            font-size: 21px;
        }


        .chart-container {
            height: 380px;
        }


        /* ==============================
           REPORT GRID
        ============================== */

        .report-grid {
            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 25px;

            margin-bottom: 30px;
        }


        .report-box {
            background: white;

            padding: 25px;

            border-radius: 15px;

            box-shadow:
                0 4px 15px rgba(31, 42, 68, 0.08);

            border: 1px solid #f0eee8;

            overflow-x: auto;
        }


        .report-box h2 {
            margin: 0 0 20px;

            font-size: 19px;
        }


        /* ==============================
           TABLE
        ============================== */

        table {
            width: 100%;

            border-collapse: collapse;

            min-width: 480px;
        }


        th {
            background: #f7f4ec;

            text-align: left;

            padding: 12px;

            font-size: 13px;
        }


        td {
            padding: 12px;

            border-bottom: 1px solid #eee;

            font-size: 14px;
        }


        tr:hover td {
            background: #faf9f5;
        }


        .money {
            font-weight: bold;

            white-space: nowrap;
        }


        .rank {
            font-weight: bold;

            width: 40px;
        }


        .payment {
            font-weight: bold;

            text-transform: uppercase;
        }


        .email {
            color: #888;

            font-size: 12px;
        }


        /* ==============================
           RESPONSIVE
        ============================== */

        @media (max-width: 1200px) {

            .cards {
                grid-template-columns:
                    repeat(3, 1fr);
            }

        }


        @media (max-width: 900px) {

            .report-grid {
                grid-template-columns: 1fr;
            }

            .cards {
                grid-template-columns:
                    repeat(2, 1fr);
            }

        }


        @media (max-width: 700px) {

            .header {
                height: auto;

                padding: 18px 20px;
            }


            .admin-label {
                display: none;
            }


            .container {
                padding:
                    25px
                    20px
                    40px;
            }


            .cards {
                grid-template-columns: 1fr;
            }


            .welcome h1 {
                font-size: 24px;
            }


            .chart-container {
                height: 300px;
            }

        }

    </style>

</head>


<body>


    <!-- ==============================
         HEADER
    ============================== -->

    <header class="header">

        <a
            href="/admin"
            class="logo"
        >

            <img
                src="{{ asset('images/logo.png') }}"
                alt="Tiệm Sách Nhỏ"
            >

        </a>


        <div class="header-right">

            <div class="admin-label">
                👤 Quản trị viên
            </div>


            <form
                action="/admin/logout"
                method="POST"
            >

                @csrf

                <button
                    type="submit"
                    class="logout"
                >
                    Đăng xuất
                </button>

            </form>

        </div>

    </header>


    <!-- ==============================
         MAIN
    ============================== -->

    <main class="container">


        <!-- TIÊU ĐỀ -->

        <section class="welcome">

            <h1>
                Xin chào Admin 👋
            </h1>

            <p>
                Tổng quan hoạt động và doanh thu của cửa hàng
            </p>

        </section>


        <!-- ==============================
             THỐNG KÊ TỔNG QUAN
        ============================== -->

        <section class="cards">


            <div class="card">

                <h3>
                    📦 Tổng đơn hàng
                </h3>

                <div class="number">
                    {{ $totalOrders }}
                </div>

            </div>


            <div class="card">

                <h3>
                    💰 Tổng doanh thu
                </h3>

                <div class="number revenue-number">

                    {{ number_format($totalRevenue, 0, ',', '.') }}
                    ₫

                </div>

            </div>


            <div class="card">

                <h3>
                    ⏳ Chờ xử lý
                </h3>

                <div class="number">
                    {{ $pendingOrders }}
                </div>

            </div>


            <div class="card">

                <h3>
                    🚚 Đang giao
                </h3>

                <div class="number">
                    {{ $shippedOrders }}
                </div>

            </div>


            <div class="card">

                <h3>
                    ✅ Hoàn thành
                </h3>

                <div class="number">
                    {{ $completedOrders }}
                </div>

            </div>


        </section>


        <!-- ==============================
             QUẢN LÝ ĐƠN HÀNG
        ============================== -->

        <div class="menu">

            <a href="/admin/orders">
                📦 Quản lý đơn hàng
            </a>

        </div>


        <!-- ==============================
             DOANH THU THEO THỜI GIAN
        ============================== -->

        <section class="chart-box">

            <h2>
                📈 Doanh thu theo thời gian
            </h2>


            <div class="chart-container">

                <canvas id="revenueChart"></canvas>

            </div>

        </section>


        <!-- ==============================
             DANH MỤC + THANH TOÁN
        ============================== -->

        <div class="report-grid">


            <!-- DANH MỤC -->

            <section class="report-box">

                <h2>
                    📚 Doanh thu theo danh mục
                </h2>


                <table>

                    <thead>

                        <tr>

                            <th>
                                Danh mục
                            </th>

                            <th>
                                Số lượng
                            </th>

                            <th>
                                Doanh thu
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse(
                            $revenueByCategory
                            as $category
                        )

                            <tr>

                                <td>
                                    {{ $category->category_name }}
                                </td>

                                <td>
                                    {{ $category->quantity }}
                                </td>

                                <td class="money">

                                    {{ number_format(
                                        $category->revenue,
                                        0,
                                        ',',
                                        '.'
                                    ) }}
                                    ₫

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="3">
                                    Chưa có dữ liệu.
                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </section>


            <!-- THANH TOÁN -->

            <section class="report-box">

                <h2>
                    💳 Doanh thu theo phương thức thanh toán
                </h2>


                <table>

                    <thead>

                        <tr>

                            <th>
                                Phương thức
                            </th>

                            <th>
                                Số đơn
                            </th>

                            <th>
                                Doanh thu
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse(
                            $revenueByPayment
                            as $payment
                        )

                            <tr>

                                <td class="payment">

                                    @if(
                                        strtolower(
                                            $payment->payment_method ?? ''
                                        ) === 'cod'
                                    )

                                        COD

                                    @else

                                        {{
                                            strtoupper(
                                                $payment->payment_method
                                                ?? 'Không xác định'
                                            )
                                        }}

                                    @endif

                                </td>


                                <td>
                                    {{ $payment->total_orders }}
                                </td>


                                <td class="money">

                                    {{ number_format(
                                        $payment->revenue,
                                        0,
                                        ',',
                                        '.'
                                    ) }}
                                    ₫

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="3">
                                    Chưa có dữ liệu.
                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </section>


        </div>


        <!-- ==============================
             SẢN PHẨM + KHÁCH HÀNG
        ============================== -->

        <div class="report-grid">


            <!-- SẢN PHẨM -->

            <section class="report-box">

                <h2>
                    🔥 Top 10 sản phẩm bán chạy
                </h2>


                <table>

                    <thead>

                        <tr>

                            <th>
                                #
                            </th>

                            <th>
                                Sản phẩm
                            </th>

                            <th>
                                Đã bán
                            </th>

                            <th>
                                Doanh thu
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse(
                            $revenueByProduct
                            as $index => $product
                        )

                            <tr>

                                <td class="rank">
                                    {{ $index + 1 }}
                                </td>

                                <td>
                                    {{ $product->title }}
                                </td>

                                <td>
                                    {{ $product->quantity }}
                                </td>

                                <td class="money">

                                    {{ number_format(
                                        $product->revenue,
                                        0,
                                        ',',
                                        '.'
                                    ) }}
                                    ₫

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="4">
                                    Chưa có dữ liệu.
                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </section>


            <!-- KHÁCH HÀNG -->

            <section class="report-box">

                <h2>
                    👥 Top 10 khách hàng
                </h2>


                <table>

                    <thead>

                        <tr>

                            <th>
                                #
                            </th>

                            <th>
                                Khách hàng
                            </th>

                            <th>
                                Số đơn
                            </th>

                            <th>
                                Doanh thu
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse(
                            $revenueByCustomer
                            as $index => $customer
                        )

                            <tr>

                                <td class="rank">
                                    {{ $index + 1 }}
                                </td>


                                <td>

                                    <strong>
                                        {{ $customer->customer_name }}
                                    </strong>

                                    @if(
                                        !empty(
                                            $customer->customer_email
                                        )
                                    )

                                        <br>

                                        <span class="email">
                                            {{ $customer->customer_email }}
                                        </span>

                                    @endif

                                </td>


                                <td>
                                    {{ $customer->total_orders }}
                                </td>


                                <td class="money">

                                    {{ number_format(
                                        $customer->revenue,
                                        0,
                                        ',',
                                        '.'
                                    ) }}
                                    ₫

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="4">
                                    Chưa có dữ liệu.
                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </section>


        </div>


        <!-- ==============================
             TRẠNG THÁI ĐƠN HÀNG
        ============================== -->

        <section class="report-box">

            <h2>
                📊 Tổng quan trạng thái đơn hàng
            </h2>


            <div class="chart-container">

                <canvas id="orderChart"></canvas>

            </div>

        </section>


    </main>


    <!-- ==============================
         DỮ LIỆU CHO JAVASCRIPT
         Không viết Blade trực tiếp trong JS
    ============================== -->

    <div
        id="dashboard-data"

        data-revenue-labels='@json(
            $monthlyRevenue->pluck("month")->values()
        )'

        data-revenue-values='@json(
            $monthlyRevenue->pluck("revenue")->values()
        )'

        data-pending="{{ $pendingOrders }}"

        data-processing="{{ $processingOrders }}"

        data-shipped="{{ $shippedOrders }}"

        data-completed="{{ $completedOrders }}"

        data-cancelled="{{ $cancelledOrders }}"
    ></div>


    <!-- ==============================
         JAVASCRIPT
    ============================== -->

    <script>

        const dashboardData =
            document.getElementById(
                'dashboard-data'
            );


        // ==============================
        // DỮ LIỆU DOANH THU
        // ==============================

        const revenueLabels =
            JSON.parse(
                dashboardData.dataset.revenueLabels
            );


        const revenueData =
            JSON.parse(
                dashboardData.dataset.revenueValues
            );


        // ==============================
        // DỮ LIỆU TRẠNG THÁI
        // ==============================

        const pendingOrders =
            Number(
                dashboardData.dataset.pending
            );


        const processingOrders =
            Number(
                dashboardData.dataset.processing
            );


        const shippedOrders =
            Number(
                dashboardData.dataset.shipped
            );


        const completedOrders =
            Number(
                dashboardData.dataset.completed
            );


        const cancelledOrders =
            Number(
                dashboardData.dataset.cancelled
            );


        // ==============================
        // BIỂU ĐỒ DOANH THU
        // ==============================

        new Chart(

            document.getElementById(
                'revenueChart'
            ),

            {

                type: 'line',


                data: {

                    labels: revenueLabels,


                    datasets: [

                        {

                            label: 'Doanh thu',


                            data: revenueData,


                            borderWidth: 3,


                            tension: 0.3,


                            fill: true

                        }

                    ]

                },


                options: {

                    responsive: true,


                    maintainAspectRatio: false,


                    scales: {

                        y: {

                            beginAtZero: true,


                            ticks: {

                                callback: function(value) {

                                    return new Intl.NumberFormat(
                                        'vi-VN'
                                    ).format(value)
                                    + ' ₫';

                                }

                            }

                        }

                    },


                    plugins: {

                        tooltip: {

                            callbacks: {

                                label: function(context) {

                                    return new Intl.NumberFormat(
                                        'vi-VN'
                                    ).format(
                                        context.raw
                                    )
                                    + ' ₫';

                                }

                            }

                        }

                    }

                }

            }

        );


        // ==============================
        // BIỂU ĐỒ TRẠNG THÁI ĐƠN
        // ==============================

        new Chart(

            document.getElementById(
                'orderChart'
            ),

            {

                type: 'bar',


                data: {

                    labels: [

                        'Chờ xử lý',

                        'Đang xử lý',

                        'Đang giao',

                        'Hoàn thành',

                        'Đã hủy'

                    ],


                    datasets: [

                        {

                            label:
                                'Số lượng đơn hàng',


                            data: [

                                pendingOrders,

                                processingOrders,

                                shippedOrders,

                                completedOrders,

                                cancelledOrders

                            ],


                            borderWidth: 1

                        }

                    ]

                },


                options: {

                    responsive: true,


                    maintainAspectRatio: false,


                    scales: {

                        y: {

                            beginAtZero: true,


                            ticks: {

                                precision: 0

                            }

                        }

                    }

                }

            }

        );

    </script>


</body>

</html>