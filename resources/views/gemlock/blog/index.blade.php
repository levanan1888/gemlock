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

    @php
        $posts = [
            [
                'slug' => 'giai-phap-khoa-thong-minh-can-ho-hien-dai',
                'image' => 'post-1.jpg',
                'title' => 'Giải pháp khóa thông minh cho căn hộ hiện đại',
                'excerpt' => 'Giới thiệu các tiêu chí chọn khóa thông minh phù hợp cho căn hộ chung cư: bảo mật, tiện lợi, thẩm mỹ.',
                'author' => 'Gemlock Team',
                'date' => 'Jan 15, 2026',
                'category' => 'Khóa thông minh',
            ],
            [
                'slug' => '5-meo-su-dung-khoa-van-tay-an-toan-hon',
                'image' => 'post-2.jpg',
                'title' => '5 mẹo sử dụng khóa vân tay an toàn hơn',
                'excerpt' => 'Một vài lưu ý đơn giản giúp bạn sử dụng khóa vân tay đúng cách và hạn chế rủi ro bảo mật.',
                'author' => 'Gemlock Team',
                'date' => 'Jan 10, 2026',
                'category' => 'Bảo mật',
            ],
            [
                'slug' => 'tich-hop-khoa-thong-minh-vao-smart-home',
                'image' => 'post-3.jpg',
                'title' => 'Tích hợp khóa thông minh vào hệ sinh thái Smart Home',
                'excerpt' => 'Cách kết nối khóa thông minh với hệ sinh thái nhà thông minh để mở khóa từ xa, tự động hóa ngữ cảnh.',
                'author' => 'Gemlock Team',
                'date' => 'Jan 05, 2026',
                'category' => 'Smart Home',
            ],
            [
                'slug' => 'chon-khoa-cho-cua-nhom-kinh',
                'image' => 'post-1.jpg',
                'title' => 'Chọn khóa phù hợp cho cửa nhôm kính',
                'excerpt' => 'Tổng hợp những lưu ý khi chọn khóa cho cửa nhôm kính: kích thước, kết cấu, tính năng chống cắt phá.',
                'author' => 'Gemlock Team',
                'date' => 'Dec 28, 2025',
                'category' => 'Tư vấn',
            ],
            [
                'slug' => 'so-sanh-khoa-face-id-3d',
                'image' => 'post-2.jpg',
                'title' => 'So sánh các dòng khóa Face ID 3D',
                'excerpt' => 'Đánh giá nhanh ưu nhược điểm giữa các dòng khóa nhận diện khuôn mặt 3D phổ biến hiện nay.',
                'author' => 'Gemlock Team',
                'date' => 'Dec 20, 2025',
                'category' => 'Khóa thông minh',
            ],
            [
                'slug' => 'kinh-nghiem-lap-dat-khoa-thong-minh-biet-thu',
                'image' => 'post-3.jpg',
                'title' => 'Kinh nghiệm lắp đặt khóa thông minh cho biệt thự',
                'excerpt' => 'Chia sẻ kinh nghiệm triển khai khóa thông minh cho nhà diện tích lớn, nhiều cửa ra vào.',
                'author' => 'Gemlock Team',
                'date' => 'Dec 10, 2025',
                'category' => 'Lắp đặt',
            ],
        ];

        $categories = collect($posts)->pluck('category')->unique()->values();

        $q = trim((string) request('q', ''));
        $category = (string) request('category', '');
        $sort = (string) request('sort', 'newest');

        $filteredPosts = collect($posts)
            ->filter(function ($post) use ($q, $category) {
                $matchesKeyword = $q === ''
                    || str_contains(mb_strtolower($post['title'] . ' ' . $post['excerpt']), mb_strtolower($q));

                $matchesCategory = $category === '' || $post['category'] === $category;

                return $matchesKeyword && $matchesCategory;
            })
            ->sortBy(function ($post) {
                return strtotime($post['date']);
            });

        if ($sort === 'newest') {
            $filteredPosts = $filteredPosts->reverse();
        }

        $filteredPosts = $filteredPosts->values();

        $perPage = 6;
        $currentPage = max((int) request('page', 1), 1);
        $totalPosts = $filteredPosts->count();
        $totalPages = max((int) ceil($totalPosts / $perPage), 1);

        if ($currentPage > $totalPages) {
            $currentPage = $totalPages;
        }

        $offset = ($currentPage - 1) * $perPage;
        $paginatedPosts = $filteredPosts->slice($offset, $perPage)->values();
    @endphp

    <div class="container">
        <div class="blog-filter-wrap">
            <div class="blog-filter-title">Bộ lọc bài viết</div>
            <form method="GET" action="{{ url('/gemlock/blog') }}" class="row g-2 align-items-end blog-filter-actions">
                <div class="col-12 col-md-5">
                    <input type="text" class="form-control" name="q" value="{{ $q }}" placeholder="Tìm theo tiêu đề hoặc mô tả...">
                </div>
                <div class="col-12 col-md-3">
                    <select name="category" class="form-select">
                        <option value="">Tất cả chuyên mục</option>
                        @foreach($categories as $item)
                            <option value="{{ $item }}" {{ $category === $item ? 'selected' : '' }}>{{ $item }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 col-md-2">
                    <select name="sort" class="form-select">
                        <option value="newest" {{ $sort === 'newest' ? 'selected' : '' }}>Mới nhất</option>
                        <option value="oldest" {{ $sort === 'oldest' ? 'selected' : '' }}>Cũ nhất</option>
                    </select>
                </div>
                <div class="col-12">
                    <div class="blog-filter-footer">
                        <div class="blog-filter-count">Hiển thị {{ $paginatedPosts->count() }} / {{ $totalPosts }} bài viết</div>
                        <button type="submit" class="btn btn-secondary blog-filter-submit">Lọc</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="blog-section">
        <div class="container">
            <div class="row">
                @forelse($paginatedPosts as $post)
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
                @empty
                    <div class="col-12">
                        <div class="alert alert-light border text-center">Không tìm thấy bài viết phù hợp bộ lọc.</div>
                    </div>
                @endforelse
            </div>

            @if($totalPosts > 0 && $totalPages > 1)
                @php $query = request()->except('page'); @endphp
                <nav class="pagination-wrapper mt-2 mb-0">
                    <ul class="pagination justify-content-center">
                        <li class="page-item {{ $currentPage == 1 ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $currentPage == 1 ? '#' : url('/gemlock/blog') . '?' . http_build_query(array_merge($query, ['page' => $currentPage - 1])) }}" aria-label="Previous">
                                <i class="fas fa-chevron-left"></i>
                            </a>
                        </li>
                        @for($i = 1; $i <= $totalPages; $i++)
                            @if($i == 1 || $i == $totalPages || abs($i - $currentPage) <= 1)
                                <li class="page-item {{ $currentPage == $i ? 'active' : '' }}">
                                    <a class="page-link" href="{{ url('/gemlock/blog') . '?' . http_build_query(array_merge($query, ['page' => $i])) }}">{{ $i }}</a>
                                </li>
                            @elseif(abs($i - $currentPage) == 2)
                                <li class="page-item disabled"><span class="page-link">...</span></li>
                            @endif
                        @endfor
                        <li class="page-item {{ $currentPage == $totalPages ? 'disabled' : '' }}">
                            <a class="page-link" href="{{ $currentPage == $totalPages ? '#' : url('/gemlock/blog') . '?' . http_build_query(array_merge($query, ['page' => $currentPage + 1])) }}" aria-label="Next">
                                <i class="fas fa-chevron-right"></i>
                            </a>
                        </li>
                    </ul>
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
