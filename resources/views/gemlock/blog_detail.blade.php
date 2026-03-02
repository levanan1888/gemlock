@extends('gemlock.layouts.app')

@section('title', $post['title'] . ' - Gemlock')
@section('body_class', 'blog-detail-page')

@section('before_main')
    @include('gemlock.partials.gemlock_topbar')
    @include('gemlock.partials.header')
@endsection

@push('gemlock_styles')
    <link href="{{ asset('furni/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('furni/css/tiny-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('furni/css/style.css') }}" rel="stylesheet">
    <style>
        .blog-detail-wrapper {
            padding: 40px 0 80px;
            background: #f5f5f5;
        }

        .blog-breadcrumb {
            font-size: 13px;
            color: #6b7280;
            margin-bottom: 8px;
        }

        .blog-breadcrumb a {
            color: inherit;
            text-decoration: none;
        }

        .blog-breadcrumb a:hover {
            text-decoration: underline;
        }

        .blog-detail-card {
            background: #ffffff;
            border-radius: 16px;
            padding: 24px 24px 32px;
            box-shadow: 0 12px 40px rgba(15, 23, 42, 0.08);
        }

        .blog-detail-title {
            font-size: 28px;
            font-weight: 800;
            margin-bottom: 12px;
        }

        .blog-detail-meta span {
            color: #6b7280;
            font-size: 14px;
            margin-right: 16px;
        }

        .blog-detail-hero-img {
            border-radius: 16px;
            margin: 20px 0 24px;
        }

        .blog-detail-content p {
            font-size: 16px;
            line-height: 1.8;
            color: #4b5563;
            margin-bottom: 1rem;
        }

        .blog-toc-card,
        .blog-sidebar-card {
            background: #ffffff;
            border-radius: 16px;
            padding: 18px 18px 20px;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.06);
            margin-bottom: 20px;
        }

        .blog-toc-title {
            font-weight: 700;
            font-size: 15px;
            margin-bottom: 8px;
        }

        .blog-toc-list {
            padding-left: 18px;
            margin: 0;
            font-size: 14px;
        }

        .blog-sidebar-title {
            font-weight: 700;
            font-size: 15px;
            margin-bottom: 10px;
        }

        .blog-sidebar-post {
            display: flex;
            gap: 10px;
            margin-bottom: 12px;
        }

        .blog-sidebar-post img {
            width: 64px;
            height: 64px;
            object-fit: cover;
            border-radius: 10px;
        }

        .blog-sidebar-post h6 {
            font-size: 14px;
            margin: 0 0 4px 0;
            font-weight: 600;
        }

        .blog-sidebar-post small {
            font-size: 12px;
            color: #6b7280;
        }

        .blog-search-input {
            border-radius: 999px;
            border: 1px solid #e5e7eb;
            padding-left: 14px;
            padding-right: 36px;
            font-size: 14px;
        }

        .blog-search-wrapper {
            position: relative;
            margin-bottom: 18px;
        }

        .blog-search-wrapper .fa-search {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            font-size: 14px;
        }

        .blog-detail-row {
            align-items: stretch;
        }

        .blog-detail-row > [class^="col-"] {
            display: flex;
        }

        .blog-detail-card,
        .blog-sidebar-card {
            height: 100%;
        }
    </style>
@endpush

@section('page_content')
    <section class="blog-detail-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-xl-10">
                    <div class="blog-breadcrumb">
                        <a href="{{ url('/gemlock') }}">Trang chủ</a> /
                        <a href="{{ url('/gemlock/blog') }}">Bài viết</a> /
                        <span>{{ $post['title'] }}</span>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center blog-detail-row">
                <div class="col-lg-8">
                    <div class="blog-detail-card">
                        <h1 class="blog-detail-title">{{ $post['title'] }}</h1>
                        <div class="blog-detail-meta mb-3">
                            <span>Tác giả: <strong>{{ $post['author'] }}</strong></span>
                            <span>Ngày đăng: {{ $post['date'] }}</span>
                        </div>

                        <div class="blog-toc-card mb-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="blog-toc-title">Mục lục bài viết</div>
                                <i class="fa fa-list-ul text-muted"></i>
                            </div>
                            <ul class="blog-toc-list">
                                <li>Giới thiệu chung</li>
                                <li>Lợi ích nổi bật</li>
                                <li>Lưu ý khi sử dụng</li>
                            </ul>
                        </div>

                        <img src="{{ asset('furni/images/' . $post['image']) }}" alt="{{ $post['title'] }}"
                             class="img-fluid blog-detail-hero-img">

                        <div class="blog-detail-content">
                            <p>{{ $post['content'] }}</p>
                            <p>Nội dung demo thêm cho bài viết. Sau này bạn có thể thay toàn bộ đoạn này bằng dữ liệu thật từ
                                database hoặc CMS.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet, porro qui. In, quae. Quos
                                alias molestias reiciendis neque commodi, veritatis, nobis consequuntur maiores,
                                necessitatibus architecto ipsum.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mt-4 mt-lg-0">
                    <div class="blog-sidebar-card">
                        <div class="blog-search-wrapper">
                            <input type="text" class="form-control blog-search-input" placeholder="Tìm kiếm bài viết">
                            <i class="fa fa-search"></i>
                        </div>

                        <div class="blog-sidebar-title">Bài viết nhiều người xem</div>
                        @foreach ([
                            ['image' => 'post-1.jpg', 'title' => 'Giải pháp khóa thông minh cho căn hộ hiện đại', 'date' => 'Jan 15, 2026'],
                            ['image' => 'post-2.jpg', 'title' => '5 mẹo sử dụng khóa vân tay an toàn hơn', 'date' => 'Jan 10, 2026'],
                            ['image' => 'post-3.jpg', 'title' => 'Tích hợp khóa thông minh vào hệ sinh thái Smart Home', 'date' => 'Jan 05, 2026'],
                        ] as $item)
                            <div class="blog-sidebar-post">
                                <img src="{{ asset('furni/images/' . $item['image']) }}" alt="{{ $item['title'] }}">
                                <div>
                                    <h6>{{ $item['title'] }}</h6>
                                    <small>{{ $item['date'] }}</small>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('gemlock_scripts')
    <script src="{{ asset('furni/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('furni/js/tiny-slider.js') }}"></script>
    <script src="{{ asset('furni/js/custom.js') }}"></script>
@endpush

