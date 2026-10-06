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
    <hr>

    <h2>Đánh giá sản phẩm</h2>

    @if ($book->reviews->count() > 0)

    @foreach ($book->reviews as $review)
    <div>
        <strong>{{ $review->user->name }}</strong>

        <p>
            Đánh giá:
            {{ $review->rating }}/5
        </p>

        @if ($review->comment)
        <p>{{ $review->comment }}</p>
        @endif

        <small>
            {{ $review->created_at->format('d/m/Y H:i') }}
        </small>
    </div>

    <hr>
    @endforeach

    @else

    <p>Chưa có đánh giá nào cho sản phẩm này.</p>

    @endif
    @if (auth()->check())
    <hr>

    <h2>Viết đánh giá</h2>

    <form action="/review" method="POST">
        @csrf

        <input type="hidden" name="book_id" value="{{ $book->id }}">

        <div>
            <label>Đánh giá:</label>

            <select name="rating" required>
                <option value="">Chọn số sao</option>
                <option value="1">1 sao</option>
                <option value="2">2 sao</option>
                <option value="3">3 sao</option>
                <option value="4">4 sao</option>
                <option value="5">5 sao</option>
            </select>
        </div>

        <br>

        <div>
            <label>Bình luận:</label><br>

            <textarea
                name="comment"
                rows="4"
                cols="50"
                placeholder="Nhập bình luận của bạn..."></textarea>
        </div>

        <br>

        <button type="submit">Gửi đánh giá</button>
    </form>
    @endif
</body>
@if (session('success'))
<p>{{ session('success') }}</p>
@endif

@if (session('error'))
<p>{{ session('error') }}</p>
@endif

</html>