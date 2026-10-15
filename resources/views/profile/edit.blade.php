<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý tài khoản cá nhân</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <h2 class="mb-4 fw-bold text-center">Tài Khoản Của Tôi</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row">
            <!-- Cột cập nhật thông tin -->
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm p-4">
                    <h4 class="mb-3">Thông tin cá nhân</h4>
                    <form action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <div class="mb-3">
                            <label class="form-label">Họ và tên</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                    </form>
                </div>
            </div>

            <!-- Cột đổi mật khẩu -->
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm p-4">
                    <h4 class="mb-3">Đổi mật khẩu</h4>
                    <form action="{{ route('password.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Mật khẩu hiện tại</label>
                            <input type="password" name="current_password" class="form-control" required>
                            @error('current_password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Mật khẩu mới</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Xác nhận mật khẩu mới</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-warning">Đổi mật khẩu</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="text-center mt-3">
            <a href="{{ route('orders.history') }}" class="btn btn-info text-white">Xem Lịch Sử Đơn Hàng</a>
        </div>
    </div>
</body>
</html>