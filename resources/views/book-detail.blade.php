<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $book->title }}</title>
</head>

<body>

    <h1>{{ $book->title }}</h1>

    <p><strong>Tác giả:</strong> {{ $book->author }}</p>

    <p>
        <strong>Giá:</strong>
        {{ number_format($book->price, 0, ',', '.') }} VNĐ
    </p>

    <p>
        <strong>Số lượng còn lại:</strong>
        {{ $book->quantity }}
    </p>

    <p>
        <strong>Mô tả:</strong>
        {{ $book->description ?? 'Chưa có mô tả.' }}
    </p>

    <a href="/">← Quay lại trang chủ</a>

</body>
</html>