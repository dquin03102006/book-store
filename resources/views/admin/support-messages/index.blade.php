@extends('admin.layouts.app')

@section('title', 'Yêu cầu hỗ trợ')

@section('content')
<div class="container-fluid">
    <h2 class="mb-4">Yêu cầu hỗ trợ khách hàng</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            @if ($messages->isEmpty())
                <p class="text-muted mb-0">Chưa có yêu cầu hỗ trợ nào.</p>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Ngày gửi</th>
                                <th>Khách hàng</th>
                                <th>Email</th>
                                <th>Chủ đề</th>
                                <th>Nội dung</th>
                                <th>Trạng thái</th>
                                <th>Cập nhật</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($messages as $message)
                                <tr>
                                    <td>{{ $message->created_at->format('d/m/Y H:i') }}</td>
                                    <td>{{ $message->name }}</td>
                                    <td>{{ $message->email }}</td>
                                    <td>{{ $message->subject }}</td>
                                    <td style="min-width: 220px; white-space: pre-wrap;">{{ $message->message }}</td>
                                    <td>
                                        @if ($message->status === 'pending')
                                            <span class="badge bg-warning text-dark">Chờ xử lý</span>
                                        @elseif ($message->status === 'processing')
                                            <span class="badge bg-info text-dark">Đang xử lý</span>
                                        @elseif ($message->status === 'resolved')
                                            <span class="badge bg-success">Đã giải quyết</span>
                                        @else
                                            <span class="badge bg-secondary">{{ $message->status }}</span>
                                        @endif
                                    </td>
                                    <td style="min-width: 180px;">
                                        <form action="{{ route('admin.support-messages.updateStatus', $message->id) }}"
                                              method="POST">
                                            @csrf
                                            @method('PATCH')

                                            <select name="status" class="form-select form-select-sm mb-2">
                                                <option value="pending" @selected($message->status === 'pending')>
                                                    Chờ xử lý
                                                </option>
                                                <option value="processing" @selected($message->status === 'processing')>
                                                    Đang xử lý
                                                </option>
                                                <option value="resolved" @selected($message->status === 'resolved')>
                                                    Đã giải quyết
                                                </option>
                                            </select>

                                            <button type="submit" class="btn btn-primary btn-sm">
                                                Lưu trạng thái
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-3">
                    {{ $messages->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection