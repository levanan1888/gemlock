@include('partials.header_styles')
@php
    use App\Helpers\ContentHelper;
    use App\Models\MenuItem;
    
    $headerCategories = \App\Services\ProductService::getCategories();
    $cartCount = collect(session('cart', []))->sum('quantity');
    $isGemlock = request()->is('gemlock') || request()->is('gemlock/*') || request()->is('product') || request()->is('product/*') || request()->is('product-detail/*');
    $pageType = $isGemlock ? 'gemlock' : 'perfect_house';
    $homeUrl = $isGemlock ? '/gemlock' : '/';
    
    $headerLogo = ContentHelper::image('header_logo_'.$pageType, 'image/Logo Tách Nền.png');
    $headerPhone = ContentHelper::text('header_phone_'.$pageType, '0967 263 944');
    
    // Banner slides cho Swiper (Latest Swiper structure)
    $bannerSlides = [
        ContentHelper::image('home_banner_1_'.$pageType, 'image/banner.jpg'),
        ContentHelper::image('home_banner_2_'.$pageType, 'image/banner2.jpg'),
        ContentHelper::image('home_banner_3_'.$pageType, 'image/Banner Solar 1.png'),
    ];

    // Map icon Bootstrap cho sidebar giải pháp dựa trên JWLock
    $iconMap = [
        'face-id-3d' => 'bi-person-bounding-box',
        'one-handle' => 'bi-hand-index-thumb',
        'aluminium-door' => 'bi-door-open',
        'others' => 'bi-shield-lock',
    ];
@endphp
<div class="jw">
    <!-- ===== HEADER TOP ===== -->
    <header class="header">
        <div class="container header-top">
            <div class="logo">
                <a href="{{ $homeUrl }}">
                    <img loading="lazy" src="{{ $headerLogo }}" alt="JW" />
                </a>
            </div>

            <form class="search-box" action="{{ url('/product') }}" method="GET" role="search">
                <input type="text" name="q" placeholder="Tìm kiếm sản phẩm" value="{{ request('q') }}" />
                <button type="submit" aria-label="Tìm kiếm">
                    <i class="bi bi-search"></i>
                </button>
            </form>

            <div class="header-right">
                <a href="{{ url('/product') }}">Cửa hàng</a>
                <span class="hotline">
                    <i class="bi bi-telephone-fill"></i> {{ $headerPhone }}
                </span>
                <a href="{{ route('cart.index') }}" class="header-right-cart" aria-label="Giỏ hàng">
                    <i class="bi bi-cart-fill"></i>
                    <span>({{ $cartCount }})</span>
                </a>
            </div>
        </div>

        <!-- ===== MENU NAV ===== -->
        <div class="menu-bar">
            <div class="container menu-container">
                <div class="menu-left">
                    <span>DANH MỤC SẢN PHẨM</span>
                    <i class="bi bi-chevron-down"></i>
                </div>

                <ul class="menu">
                    <li><a href="{{ url('/about') }}">Giới thiệu</a></li>
                    <li class="has-dropdown">
                        <a href="{{ url('/product') }}">
                            Sản phẩm
                            <i class="bi bi-chevron-down"></i>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{ url('/product?series=face-id-3d') }}">Dòng khoá nhận diện khuôn mặt 3D</a></li>
                            <li><a href="{{ url('/product?series=one-handle') }}">Dòng khoá vân tay một tay cầm</a></li>
                            <li><a href="{{ url('/product?series=aluminium-door') }}">Dòng khoá vân tay cho cửa nhôm</a></li>
                            <li><a href="{{ url('/product?series=others') }}">Dòng khoá khác</a></li>
                        </ul>
                    </li>
                    <li><a href="https://jwlock.com.vn/chinh-sach-bao-hanh.html" target="_blank">Chính sách</a></li>
                    <li><a href="{{ url('/documents') }}">Tài liệu</a></li>
                    <li><a href="{{ url('/blog') }}">Bài viết</a></li>
                    <li><a href="{{ url('/contact') }}">Liên hệ</a></li>
                </ul>
            </div>
        </div>
    </header>

    <!-- ===== MAIN BANNER AREA ===== -->
    <section class="main-banner">
        <div class="container banner-wrapper">

            <!-- Sidebar - Vàng liền khối -->
            <aside class="sidebar" aria-label="Danh mục">
                <ul>
                    @foreach($headerCategories as $category)
                        <li>
                            <i class="bi {{ $iconMap[$category['slug']] ?? 'bi-caret-right-fill' }}"></i>
                            <a href="{{ url("/product?category={$category['slug']}") }}">
                                {{ $category['name'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </aside>

            <!-- Banner Swiper Slider - Full Width trong cột -->
            <div class="banner">
                <div class="swiper jw-banner-swiper">
                    <div class="swiper-wrapper">
                        @foreach($bannerSlides as $slide)
                            <div class="swiper-slide">
                                <img src="{{ $slide }}" alt="Banner" />
                            </div>
                        @endforeach
                    </div>
                    <!-- Pagination (Dots) -->
                    <div class="swiper-pagination"></div>
                    <!-- Navigation (Arrows) -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>

        </div>
    </section>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (typeof Swiper !== 'undefined') {
            new Swiper('.jw-banner-swiper', {
                loop: true,
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false,
                },
                effect: 'slide',
                speed: 800,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                autoHeight: false, // Chiều cao cố định theo content cột
            });
        }
    });
</script>
@endpush
