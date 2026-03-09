@extends('gemlock.layouts.app')

@section('title', 'Bài viết - Gemlock')
@section('body_class', 'blog-page')

@section('before_main')
    @include('gemlock.partials.gemlock_topbar')
    @include('gemlock.partials.header')
@endsection

@push('gemlock_styles')
    <link href="{{ asset('furni/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('furni/css/tiny-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('furni/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/gemlock-blog.css') }}" rel="stylesheet">
@endpush

@section('page_content')
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1>Tin tức &amp; Bài viết</h1>
                        <p class="mb-4">
                            Cập nhật thông tin, kinh nghiệm và xu hướng mới nhất về khóa thông minh.
                        </p>
                        <p>
                            <a href="{{ url('/gemlock/product') }}" class="btn btn-secondary me-2">Xem sản phẩm</a>
                            <a href="{{ url('/gemlock/contact') }}" class="btn btn-white-outline">Liên hệ</a>
                        </p>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="hero-img-wrap">
                        <img src="{{ asset('furni/images/couch.png') }}" class="img-fluid" alt="Blog hero">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="blog-filter-wrap">
            <div class="blog-filter-title">Bộ lọc bài viết</div>
            <form method="GET" action="{{ url('/gemlock/blog') }}" class="row g-2 align-items-end blog-filter-actions">
                <div class="col-12 col-md-4">
                    <input type="text" class="form-control" name="q" value="{{ $q }}" placeholder="Tìm theo tiêu đề hoặc mô tả...">
                </div>
                <div class="col-12 col-md-4">
                    <select name="category" class="form-select">
                        <option value="">Tất cả chuyên mục</option>
                        @foreach($categories as $item)
                            <option value="{{ $item }}" {{ $category === $item ? 'selected' : '' }}>{{ $item }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 col-md-4">
                    <select name="sort" class="form-select">
                        <option value="newest" {{ $sort === 'newest' ? 'selected' : '' }}>Mới nhất</option>
                        <option value="oldest" {{ $sort === 'oldest' ? 'selected' : '' }}>Cũ nhất</option>
                    </select>
                </div>
                <div class="col-12">
                    <div class="blog-filter-footer">
                        <div class="blog-filter-count">Hiển thị {{ $posts->count() }} / {{ $posts->total() }} bài viết</div>
                        <button type="submit" class="btn btn-secondary blog-filter-submit">Lọc</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="blog-section">
        <div class="container">
            <div class="row">
                @forelse($posts as $post)
                    <div class="col-12 col-sm-6 col-md-4 mb-5">
                        <div class="post-entry">
                            <a href="{{ url('/gemlock/blog/' . $post->slug) }}" class="post-thumbnail">
                                <img
                                    src="{{ $post->thumbnailMedia?->thumbnail_url ?? asset('image/no-image.jpg') }}"
                                    onerror="this.onerror=null;this.src='{{ asset('image/no-image.jpg') }}';"
                                    alt="{{ $post->title }}"
                                    class="img-fluid"
                                >
                            </a>
                            <div class="post-content-entry">
                                <h3><a href="{{ url('/gemlock/blog/' . $post->slug) }}">{{ $post->title }}</a></h3>
                                <p class="mb-2">{{ $post->excerpt }}</p>
                                <div class="meta">
                                    <span>by <a href="#">{{ $post->author_name }}</a></span>
                                    <span>ngày <a href="#">{{ optional($post->published_at)->format('d/m/Y') }}</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-light border text-center">Không tìm thấy bài viết phù hợp bộ lọc.</div>
                    </div>
                @endforelse
            </div>

            @if($posts->hasPages())
                <nav class="pagination-wrapper mt-2 mb-0">
                    {{ $posts->links() }}
                </nav>
            @endif
        </div>
    </div>
@endsection

@push('gemlock_scripts')
    <script src="{{ asset('furni/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('furni/js/tiny-slider.js') }}"></script>
    <script src="{{ asset('furni/js/custom.js') }}"></script>
    <script src="{{ asset('js/gemlock-blog.js') }}"></script>
@endpush
