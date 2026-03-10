@include('partials.header_styles')
@php
    use App\Helpers\ContentHelper;
    use App\Models\MenuItem;

    $headerCategories = \App\Services\ProductService::getCategories();
    $cartCount = collect(session('cart', []))->sum('quantity');
    $isGemlock = request()->is('gemlock') || request()->is('gemlock/*') || request()->is('product') || request()->is('product/*') || request()->is('product-detail/*');
    $pageType = $isGemlock ? 'gemlock' : 'perfect_house';
    $homeUrl = $isGemlock ? '/gemlock' : '/';

    $headerLogo = ContentHelper::image('header_logo_'.$pageType, 'image/Logo Tách Nền.png', $pageType, 'header');
    $headerPhone = ContentHelper::text('header_phone_'.$pageType, '0967 263 944', $pageType, 'header');

    $rawHeaderSlides = ContentHelper::get('header_banner_slides', '[]', $pageType, 'header');
    $decodedHeaderSlides = json_decode($rawHeaderSlides, true);

    $bannerSlides = collect(is_array($decodedHeaderSlides) ? $decodedHeaderSlides : [])
        ->filter(fn ($slide) => (bool) ($slide['is_active'] ?? true) && ! empty($slide['image']))
        ->map(fn ($slide) => ContentHelper::image('unused', (string) $slide['image'], $pageType, 'header'))
        ->values()
        ->all();

    if (empty($bannerSlides)) {
        $bannerSlides = [
            asset('image/banner.jpg'),
            asset('image/banner2.jpg'),
            asset('image/Banner Solar 1.png'),
        ];
    }

    $showMainBanner = request()->is('gemlock') || request()->is('gemsolar') || request()->is('home-gemlock');

    $headerMenus = MenuItem::getMenu('gemlock', 'header');
    $categoryMenus = MenuItem::getMenu('gemlock', 'category');
@endphp
<div class="jw">
    <header class="header">
        <div class="container header-top">
            <div class="logo">
                <a href="{{ $homeUrl }}">
                    <img loading="lazy" src="{{ $headerLogo }}" alt="JW" />
                </a>
            </div>

            <form class="search-box" action="{{ url('/gemlock/product') }}" method="GET" role="search">
                <input type="text" name="q" placeholder="Tìm kiếm sản phẩm" value="{{ request('q') }}" />
                <button type="submit" aria-label="Tìm kiếm">
                    <i class="bi bi-search"></i>
                </button>
            </form>

            <div class="header-right">
                <a href="{{ url('/gemlock/product') }}">Cửa hàng</a>
                <span class="hotline">
                    <i class="bi bi-telephone-fill"></i> {{ $headerPhone }}
                </span>
                <a href="{{ route('cart.index') }}" class="header-right-cart" aria-label="Giỏ hàng">
                    <i class="bi bi-cart-fill"></i>
                    <span>({{ $cartCount }})</span>
                </a>
            </div>
        </div>

        <div class="menu-bar">
            <div class="container menu-container">
                <div class="menu-left">
                    <span>DANH MỤC SẢN PHẨM</span>
                    <i class="bi bi-chevron-down"></i>
                </div>

                <ul class="menu">
                    @forelse($headerMenus as $menu)
                        @if(count($menu['children']) > 0)
                        <li class="has-dropdown">
                            <a href="{{ $menu['url'] }}"{{ $menu['open_in_new_tab'] ? ' target="_blank"' : '' }}>
                                {{ $menu['label'] }}
                                <i class="bi bi-chevron-down"></i>
                            </a>
                            <ul class="submenu">
                                @foreach($menu['children'] as $child)
                                <li><a href="{{ $child['url'] }}"{{ $child['open_in_new_tab'] ? ' target="_blank"' : '' }}>{{ $child['label'] }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        @else
                        <li><a href="{{ $menu['url'] }}"{{ $menu['open_in_new_tab'] ? ' target="_blank"' : '' }}>{{ $menu['label'] }}</a></li>
                        @endif
                    @empty
                    <li><a href="{{ $isGemlock ? url('/gemlock/about') : url('/about') }}">Giới thiệu</a></li>
                    <li><a href="{{ url('/gemlock/product') }}">Sản phẩm</a></li>
                    <li><a href="https://jwlock.com.vn/chinh-sach-bao-hanh.html" target="_blank">Chính sách</a></li>
                    <li><a href="{{ url('/documents') }}">Tài liệu</a></li>
                    <li><a href="{{ $isGemlock ? url('/gemlock/blog') : url('/blog') }}">Bài viết</a></li>
                    <li><a href="{{ $isGemlock ? url('/gemlock/contact') : url('/contact') }}">Liên hệ</a></li>
                    @endforelse
                </ul>
            </div>
        </div>
    </header>

    @if($showMainBanner)
    <section class="main-banner">
        <div class="container banner-wrapper">
            <aside class="sidebar" aria-label="Danh mục">
                <ul>
                    @forelse($categoryMenus as $category)
                        <li>
                            <i class="bi {{ $category['icon'] ?? 'bi-caret-right-fill' }}"></i>
                            <a href="{{ url($category['url']) }}">
                                {{ $category['label'] }}
                            </a>
                        </li>
                    @empty
                    @foreach($headerCategories as $category)
                        <li>
                            <i class="bi {{ $iconMap[$category['slug']] ?? 'bi-caret-right-fill' }}"></i>
                            <a href="{{ url("/gemlock/product?category={$category['slug']}") }}">
                                {{ $category['name'] }}
                            </a>
                        </li>
                    @endforeach
                    @endforelse
                </ul>
            </aside>

            <div class="banner">
                <div class="swiper jw-banner-swiper">
                    <div class="swiper-wrapper">
                        @foreach($bannerSlides as $slide)
                            <div class="swiper-slide">
                                <img src="{{ $slide }}" alt="Banner" />
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>

        </div>
    </section>
    @endif
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
                autoHeight: false,
            });
        }
    });
</script>
@endpush

