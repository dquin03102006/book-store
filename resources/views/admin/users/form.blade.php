@extends('admin.layouts.app')

@section('title', $title)

@section('content')
<h3 class="mb-3">{{ $user->exists ? 'Sửa' : 'Thêm' }} {{ mb_strtolower($title) }}</h3>

<form method="post" action="{{ $user->exists ? route($prefix.'.update', $user) : route($prefix.'.store') }}" class="card card-body" style="max-width:560px">
    @csrf
    @if($user->exists) @method('PUT') @endif

    <div class="mb-3">
        <label class="form-label">Họ tên</label>
        <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control @error('name') is-invalid @enderror">
        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control @error('email') is-invalid @enderror">
        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Mật khẩu @if($user->exists)<small class="text-muted">(để trống nếu không đổi)</small>@endif</label>
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
        @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Nhập lại mật khẩu</label>
        <input type="password" name="password_confirmation" class="form-control">
    </div>

    <div>
        <button class="btn btn-primary">Lưu</button>
        <a href="{{ route($prefix.'.index') }}" class="btn btn-link">Huỷ</a>
    </div>
</form>
@endsection
