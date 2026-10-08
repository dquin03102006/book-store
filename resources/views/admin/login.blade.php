<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .login-box {
            width: 380px;
            background: white;
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0 5px 25px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 7px;
        }

        input {
            width: 100%;
            padding: 11px;
            margin-bottom: 18px;
            border: 1px solid #ddd;
            border-radius: 6px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 6px;
            background: #333;
            color: white;
            cursor: pointer;
        }

        button:hover {
            background: #555;
        }

        .error {
            color: #d00;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>

<div class="login-box">

    <h2>ADMIN LOGIN</h2>

    @if ($errors->any())
        <div class="error">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="/admin/login" method="POST">
        @csrf

        <label>Email</label>
        <input
            type="email"
            name="email"
            placeholder="Nhập email"
            required
        >

        <label>Mật khẩu</label>
        <input
            type="password"
            name="password"
            placeholder="Nhập mật khẩu"
            required
        >

        <button type="submit">
            ĐĂNG NHẬP
        </button>
    </form>

</div>

</body>
</html>