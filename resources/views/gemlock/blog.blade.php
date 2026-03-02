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
    <style>
        .blog-section .post-content-entry p {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
@endpush

@section('page_content')
    <!-- Hero section -->
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1>Tin tức &amp; Bài viết</h1>
                        <p class="mb-4">
                            Trang demo bài viết, layout lấy từ theme Furni. Sau này mình sẽ đổ dữ liệu thực từ CMS.
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

    <!-- Blog list demo -->
    <div class="blog-section">
        <div class="container">
            <div class="row">
                @foreach ([
                    [
                        'slug' => 'giai-phap-khoa-thong-minh-can-ho-hien-dai',
                        'image' => 'post-1.jpg',
                        'title' => 'Giải pháp khóa thông minh cho căn hộ hiện đại',
                        'excerpt' => 'Giới thiệu các tiêu chí chọn khóa thông minh phù hợp cho căn hộ chung cư: bảo mật, tiện lợi, thẩm mỹ.',
                        'author' => 'Gemlock Team',
                        'date' => 'Jan 15, 2026',
                    ],
                    [
                        'slug' => '5-meo-su-dung-khoa-van-tay-an-toan-hon',
                        'image' => 'post-2.jpg',
                        'title' => '5 mẹo sử dụng khóa vân tay an toàn hơn',
                        'excerpt' => 'Một vài lưu ý đơn giản giúp bạn sử dụng khóa vân tay đúng cách và hạn chế rủi ro bảo mật.',
                        'author' => 'Gemlock Team',
                        'date' => 'Jan 10, 2026',
                    ],
                    [
                        'slug' => 'tich-hop-khoa-thong-minh-vao-smart-home',
                        'image' => 'post-3.jpg',
                        'title' => 'Tích hợp khóa thông minh vào hệ sinh thái Smart Home',
                        'excerpt' => 'Cách kết nối khóa thông minh với hệ sinh thái nhà thông minh để mở khóa từ xa, tự động hóa ngữ cảnh.',
                        'author' => 'Gemlock Team',
                        'date' => 'Jan 05, 2026',
                    ],
                    [
                        'slug' => 'chon-khoa-cho-cua-nhom-kinh',
                        'image' => 'post-1.jpg',
                        'title' => 'Chọn khóa phù hợp cho cửa nhôm kính',
                        'excerpt' => 'Tổng hợp những lưu ý khi chọn khóa cho cửa nhôm kính: kích thước, kết cấu, tính năng chống cắt phá.',
                        'author' => 'Gemlock Team',
                        'date' => 'Dec 28, 2025',
                    ],
                    [
                        'slug' => 'so-sanh-khoa-face-id-3d',
                        'image' => 'post-2.jpg',
                        'title' => 'So sánh các dòng khóa Face ID 3D',
                        'excerpt' => 'Đánh giá nhanh ưu nhược điểm giữa các dòng khóa nhận diện khuôn mặt 3D phổ biến hiện nay.',
                        'author' => 'Gemlock Team',
                        'date' => 'Dec 20, 2025',
                    ],
                    [
                        'slug' => 'kinh-nghiem-lap-dat-khoa-thong-minh-biet-thu',
                        'image' => 'post-3.jpg',
                        'title' => 'Kinh nghiệm lắp đặt khóa thông minh cho biệt thự',
                        'excerpt' => 'Chia sẻ kinh nghiệm triển khai khóa thông minh cho nhà diện tích lớn, nhiều cửa ra vào.',
                        'author' => 'Gemlock Team',
                        'date' => 'Dec 10, 2025',
                    ],
                ] as $post)
                    <div class="col-12 col-sm-6 col-md-4 mb-5">
                        <div class="post-entry">
                            <a href="{{ url('/gemlock/blog/' . $post['slug']) }}" class="post-thumbnail">
                                <img src="{{ asset('furni/images/' . $post['image']) }}" alt="Post image" class="img-fluid">
                            </a>
                            <div class="post-content-entry">
                                <h3><a href="{{ url('/gemlock/blog/' . $post['slug']) }}">{{ $post['title'] }}</a></h3>
                                <p class="mb-2">{{ $post['excerpt'] }}</p>
                                <div class="meta">
                                    <span>by <a href="#">{{ $post['author'] }}</a></span>
                                    <span>on <a href="#">{{ $post['date'] }}</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@push('gemlock_scripts')
    <script src="{{ asset('furni/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('furni/js/tiny-slider.js') }}"></script>
    <script src="{{ asset('furni/js/custom.js') }}"></script>
@endpush

