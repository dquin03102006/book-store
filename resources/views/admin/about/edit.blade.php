 @extends('admin.layouts.app')

@section('title', 'Quản lý trang Giới thiệu')

@section('content')
<div class="container-fluid">
    <div class="mb-4">
        <h2>Quản lý trang Giới thiệu</h2>
        <p class="text-muted mb-0">Chỉnh sửa nội dung và hình ảnh trang Giới thiệu.</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Vui lòng kiểm tra lại thông tin:</strong>
            <ul class="mb-0 mt-2">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.about.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white">
                <h5 class="mb-0">1. Phần đầu trang</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Nhãn giới thiệu</label>
                    <input type="text" name="hero_label" class="form-control"
                           value="{{ old('hero_label', $about->hero_label) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tiêu đề chính</label>
                    <input type="text" name="hero_title" class="form-control"
                           value="{{ old('hero_title', $about->hero_title) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Mô tả</label>
                    <textarea name="hero_description" class="form-control" rows="4">{{ old('hero_description', $about->hero_description) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Ảnh đầu trang</label>
                    <input type="file" name="hero_image" class="form-control" accept="image/*">
                    @if($about->hero_image)
                        <div class="mt-3">
                            <img src="{{ asset('images/about/' . basename($about->hero_image)) }}"
                                 alt="Ảnh đầu trang" style="max-width:300px;max-height:200px;object-fit:cover" class="rounded">
                        </div>
                    @endif
                    <small class="text-muted">JPG, PNG, WEBP; tối đa 5 MB.</small>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white">
                <h5 class="mb-0">2. Câu chuyện của chúng tôi</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Nhãn</label>
                    <input type="text" name="story_label" class="form-control"
                           value="{{ old('story_label', $about->story_label) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tiêu đề</label>
                    <input type="text" name="story_title" class="form-control"
                           value="{{ old('story_title', $about->story_title) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nội dung câu chuyện</label>
                    <textarea name="story_content" class="form-control" rows="6">{{ old('story_content', $about->story_content) }}</textarea>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white">
                <h5 class="mb-0">3. Giá trị cốt lõi</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Nhãn</label>
                    <input type="text" name="values_label" class="form-control"
                           value="{{ old('values_label', $about->values_label) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tiêu đề</label>
                    <input type="text" name="values_title" class="form-control"
                           value="{{ old('values_title', $about->values_title) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Mô tả</label>
                    <textarea name="values_description" class="form-control" rows="3">{{ old('values_description', $about->values_description) }}</textarea>
                </div>

                @foreach([1, 2, 3] as $i)
                    <div class="border rounded p-3 mb-3">
                        <h6>Giá trị {{ $i }}</h6>
                        <div class="mb-3">
                            <label class="form-label">Tiêu đề</label>
                            <input type="text" name="value{{ $i }}_title" class="form-control"
                                   value="{{ old('value'.$i.'_title', $about->{'value'.$i.'_title'}) }}" required>
                        </div>
                        <div>
                            <label class="form-label">Nội dung</label>
                            <textarea name="value{{ $i }}_content" class="form-control" rows="3">{{ old('value'.$i.'_content', $about->{'value'.$i.'_content'}) }}</textarea>
                        </div>
                    </div>
                @endforeach

                <div class="mb-3">
                    <label class="form-label">Ảnh phần nội dung</label>
                    <input type="file" name="section_image" class="form-control" accept="image/*">
                    @if($about->section_image)
                        <div class="mt-3">
                            <img src="{{ asset('images/about/' . basename($about->section_image)) }}"
                                 alt="Ảnh phần nội dung" style="max-width:300px;max-height:200px;object-fit:cover" class="rounded">
                        </div>
                    @endif
                    <small class="text-muted">JPG, PNG, WEBP; tối đa 5 MB.</small>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-white">
                <h5 class="mb-0">4. Thông tin nổi bật</h5>
            </div>
            <div class="card-body">
                @foreach([1, 2, 3, 4] as $i)
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Nhãn thông tin {{ $i }}</label>
                            <input type="text" name="info{{ $i }}_label" class="form-control"
                                   value="{{ old('info'.$i.'_label', $about->{'info'.$i.'_label'}) }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Giá trị {{ $i }}</label>
                            <input type="text" name="info{{ $i }}_value" class="form-control"
                                   value="{{ old('info'.$i.'_value', $about->{'info'.$i.'_value'}) }}" required>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="d-flex gap-2 mb-4">
            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
            <a href="{{ url('/gioi-thieu') }}" target="_blank" class="btn btn-outline-secondary">
                Xem trang Giới thiệu
            </a>
        </div>
    </form>
</div>
@endsection