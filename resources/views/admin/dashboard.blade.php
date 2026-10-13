@extends('admin.layouts.app')

@section('title', 'Tổng quan')

@section('content')
<h3 class="mb-4">Tổng quan</h3>

<div class="row g-3 mb-4">
    @foreach($stats as $label => $count)
        <div class="col-md-4 col-lg-2">
            <div class="card text-center">
                <div class="card-body">
                    <div class="fs-3 fw-bold">{{ $count }}</div>
                    <div class="text-muted">{{ $label }}</div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="card">
    <div class="card-header">Sản phẩm sắp hết hàng (≤ 5)</div>
    <table class="table mb-0">
        <thead><tr><th>Tên sách</th><th>Danh mục</th><th>Tồn kho</th></tr></thead>
        <tbody>
            @forelse($lowStock as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->category->name }}</td>
                    <td>{{ $book->quantity }}</td>
                </tr>
            @empty
                <tr><td colspan="3" class="text-center text-muted">Không có sản phẩm nào sắp hết hàng.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
