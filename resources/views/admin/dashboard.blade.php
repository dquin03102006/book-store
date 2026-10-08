<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Dashboard</title>

    <style>
        * {
            box-sizing: border-box;
        }

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

        .logout {
            background: white;
            color: #333;
            border: none;
            padding: 9px 16px;
            border-radius: 6px;
            cursor: pointer;
        }

        .container {
            padding: 40px;
        }

        .welcome {
            margin-bottom: 30px;
        }

        .welcome h1 {
            margin-bottom: 5px;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 20px;
            margin-bottom: 35px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
        }

        .card h3 {
            margin-top: 0;
            font-size: 16px;
            color: #666;
        }

        .number {
            font-size: 28px;
            font-weight: bold;
            margin-top: 15px;
        }

        .revenue {
            font-size: 22px;
        }

        .menu {
            display: flex;
            gap: 20px;
            margin-bottom: 30px;
        }

        .menu a {
            display: block;
            background: #333;
            color: white;
            text-decoration: none;
            padding: 14px 22px;
            border-radius: 6px;
        }

        .menu a:hover {
            background: #555;
        }

        .chart-box {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
        }

        .chart-box h2 {
            margin-top: 0;
            margin-bottom: 25px;
        }

        @media (max-width: 1000px) {
            .cards {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 600px) {
            .cards {
                grid-template-columns: 1fr;
            }

            .container {
                padding: 20px;
            }

            .header {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

    <!-- HEADER -->
    <div class="header">

        <h2>ADMIN DASHBOARD</h2>

        <form action="/admin/logout" method="POST">
            @csrf

            <button class="logout" type="submit">
                Đăng xuất
            </button>
        </form>

    </div>


    <!-- NỘI DUNG -->
    <div class="container">

        <div class="welcome">

            <h1>
                Xin chào Admin 👋
            </h1>

            <p>
                Tổng quan hoạt động của cửa hàng
            </p>

        </div>


        <!-- CÁC Ô THỐNG KÊ -->
        <div class="cards">

            <div class="card">

                <h3>📦 Tổng đơn hàng</h3>

                <div class="number">
                    {{ $totalOrders }}
                </div>

            </div>


            <div class="card">

                <h3>💰 Doanh thu</h3>

                <div class="number revenue">
                    {{ number_format($totalRevenue, 0, ',', '.') }} ₫
                </div>

            </div>


            <div class="card">

                <h3>⏳ Chờ xử lý</h3>

                <div class="number">
                    {{ $pendingOrders }}
                </div>

            </div>


            <div class="card">

                <h3>✅ Hoàn thành</h3>

                <div class="number">
                    {{ $completedOrders }}
                </div>

            </div>


            <div class="card">

                <h3>❌ Đã hủy</h3>

                <div class="number">
                    {{ $cancelledOrders }}
                </div>

            </div>

        </div>


        <!-- MENU -->
        <div class="menu">

            <a href="/admin/orders">
                📦 Quản lý đơn hàng
            </a>

        </div>


        <!-- BIỂU ĐỒ -->
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


    <!-- CHART.JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <!-- BIỂU ĐỒ ĐƠN HÀNG -->
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