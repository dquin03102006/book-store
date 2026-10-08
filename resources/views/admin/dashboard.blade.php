<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard - Tiệm Sách Nhỏ</title>

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

        /* ================= HEADER ================= */

        .header {
            height: 82px;
            background: #ffffff;
            padding: 0 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(31, 42, 68, 0.08);
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
            font-size: 14px;
        }

        .logout:hover {
            background: #2f3d5d;
        }

        /* ================= CONTENT ================= */

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
            color: #1f2a44;
        }

        .welcome p {
            margin: 0;
            color: #777;
            font-size: 15px;
        }

        /* ================= STATISTICS ================= */

        .cards {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            background: #ffffff;
            padding: 24px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(31, 42, 68, 0.08);
            border: 1px solid #f0eee8;
            transition: 0.2s;
        }

        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 7px 20px rgba(31, 42, 68, 0.12);
        }

        .card h3 {
            margin: 0;
            font-size: 14px;
            font-weight: normal;
            color: #777;
        }

        .number {
            font-size: 28px;
            font-weight: bold;
            margin-top: 15px;
            color: #1f2a44;
        }

        .revenue {
            font-size: 22px;
        }

        /* ================= MENU ================= */

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
            transition: 0.2s;
        }

        .menu a:hover {
            background: #2f3d5d;
            transform: translateY(-1px);
        }

        /* ================= CHART ================= */

        .chart-box {
            background: #ffffff;
            padding: 28px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(31, 42, 68, 0.08);
            border: 1px solid #f0eee8;
        }

        .chart-box h2 {
            margin: 0 0 25px;
            font-size: 21px;
            color: #1f2a44;
        }

        #orderChart {
            max-height: 400px;
        }

        /* ================= RESPONSIVE ================= */

        @media (max-width: 1100px) {

            .cards {
                grid-template-columns: repeat(2, 1fr);
            }

        }

        @media (max-width: 700px) {

            .header {
                height: auto;
                padding: 18px 20px;
            }

            .header-right {
                gap: 10px;
            }

            .admin-label {
                display: none;
            }

            .container {
                padding: 25px 20px 40px;
            }

            .cards {
                grid-template-columns: 1fr;
            }

            .welcome h1 {
                font-size: 24px;
            }

        }
    </style>
</head>

<body>

    <!-- ================= HEADER ================= -->

    <div class="header">

        <a href="/admin" class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="Tiệm Sách Nhỏ">
        </a>

        <div class="header-right">

            <div class="admin-label">
                👤 Quản trị viên
            </div>

            <form action="/admin/logout" method="POST">
                @csrf

                <button class="logout" type="submit">
                    Đăng xuất
                </button>

            </form>

        </div>

    </div>


    <!-- ================= CONTENT ================= -->

    <div class="container">

        <div class="welcome">

            <h1>
                Xin chào Admin 👋
            </h1>

            <p>
                Tổng quan hoạt động của cửa hàng
            </p>

        </div>


        <!-- ================= STATISTICS ================= -->

        <div class="cards">

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
                    💰 Doanh thu
                </h3>

                <div class="number revenue">
                    {{ number_format($totalRevenue, 0, ',', '.') }} ₫
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
                    ✅ Hoàn thành
                </h3>

                <div class="number">
                    {{ $completedOrders }}
                </div>

            </div>


            <div class="card">

                <h3>
                    ❌ Đã hủy
                </h3>

                <div class="number">
                    {{ $cancelledOrders }}
                </div>

            </div>

        </div>


        <!-- ================= MENU ================= -->

        <div class="menu">

            <a href="/admin/orders">
                📦 Quản lý đơn hàng
            </a>

        </div>


        <!-- ================= CHART ================= -->

        <div class="chart-box">

            <h2>
                📊 Thống kê đơn hàng
            </h2>

            <canvas
                id="orderChart"
                data-pending="{{ $pendingOrders }}"
                data-completed="{{ $completedOrders }}"
                data-cancelled="{{ $cancelledOrders }}"
            ></canvas>

        </div>

    </div>


    <!-- ================= CHART.JS ================= -->

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>

        const orderChart = document.getElementById('orderChart');

        const pending = Number(orderChart.dataset.pending);
        const completed = Number(orderChart.dataset.completed);
        const cancelled = Number(orderChart.dataset.cancelled);

        new Chart(orderChart, {

            type: 'bar',

            data: {

                labels: [
                    'Chờ xử lý',
                    'Hoàn thành',
                    'Đã hủy'
                ],

                datasets: [{

                    label: 'Số lượng đơn hàng',

                    data: [
                        pending,
                        completed,
                        cancelled
                    ]

                }]

            },

            options: {

                responsive: true,

                scales: {

                    y: {

                        beginAtZero: true,

                        ticks: {
                            precision: 0
                        }

                    }

                }

            }

        });

    </script>

</body>

</html>