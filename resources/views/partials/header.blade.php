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
    
    $headerMenus = MenuItem::getMenu($pageType, 'header');
@endphp
<header class="site-header glass-header">
    <div class="header-container">
        <div class="header-inner">
            <a href="{{ $homeUrl }}" class="header-logo">
                <img loading="lazy" src="{{ $headerLogo }}" alt="Logo" class="site-logo" />
            </a>
            <nav class="header-nav" aria-label="Main">
                <div class="header-dropdown">
                    <a href="/product" class="header-link header-dropdown-toggle">
                        Sản phẩm
                        <span class="material-icons">expand_more</span>
                    </a>
                    <div class="header-dropdown-menu mega-menu">
                        <div class="mega-sidebar">
                            @foreach($headerCategories as $category)
                                <button type="button"
                                    class="mega-category {{ $loop->first ? 'is-active' : '' }}"
                                    data-target="mega-{{ $category['slug'] }}">
                                    <span class="material-icons">{{ $category['icon'] }}</span>
                                    <span>{{ $category['name'] }}</span>
                                </button>
                            @endforeach
                        </div>
                        <div class="mega-content">
                            @foreach($headerCategories as $category)
                                @php($categoryProducts = \App\Services\ProductService::getProductsByCategory($category['slug']))
                                <div class="mega-panel {{ $loop->first ? 'is-active' : '' }}"
                                    data-panel="mega-{{ $category['slug'] }}">
                                    <div class="mega-panel-head">
                                        <div class="mega-panel-title">{{ $category['name'] }}</div>
                                        <div class="mega-panel-sub">{{ $category['series'] }}</div>
                                    </div>
                                    <div class="mega-grid">
                                        @foreach($categoryProducts as $product)
                                            <a href="{{ route('product.detail', $product['slug']) }}"
                                                class="mega-card mega-card--product">
                                                <div class="mega-card-image"
                                                    style="background-image: url('{{ $product['image'] }}');">
                                                </div>
                                                <div class="mega-card-title">{{ $product['name'] }}</div>
                                                <div class="mega-card-price">{{ $product['price'] }}</div>
                                            </a>
                                        @endforeach
                                        @foreach($category['features'] as $feature)
                                            <a href="{{ url('/product?category=' . $category['slug']) }}"
                                                class="mega-card mega-card--feature">
                                                <span class="material-icons">{{ $feature['icon'] }}</span>
                                                <div class="mega-card-title">{{ $feature['text'] }}</div>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @foreach($headerMenus as $menu)
                    @if(empty($menu['children']))
                        <a href="{{ $menu['url'] }}" class="header-link" {{ $menu['open_in_new_tab'] ? 'target="_blank"' : '' }}>
                            @if($menu['icon'])
                                <span class="material-icons">{{ $menu['icon'] }}</span>
                            @endif
                            {{ $menu['label'] }}
                        </a>
                    @endif
                @endforeach
            </nav>
            <div class="header-actions">
                <a href="{{ route('cart.index') }}" class="header-cart" aria-label="Giỏ hàng">
                    <span class="material-icons">shopping_cart</span>
                    <span class="cart-quantity {{ $cartCount ? '' : 'is-empty' }}">{{ $cartCount }}</span>
                </a>
                <a href="tel:{{ str_replace(' ', '', $headerPhone) }}" class="btn-primary header-phone">
                    <span class="material-icons">phone</span>
                    {{ $headerPhone }}
                </a>
                <button type="button" class="header-menu-toggle" aria-label="Mở menu">
                    <span class="material-icons">menu</span>
                </button>
            </div>
        </div>
        <div class="header-mobile">
            <div class="header-mobile-group">
                <button type="button" class="header-mobile-toggle" aria-expanded="false">
                    Sản phẩm
                    <span class="material-icons">expand_more</span>
                </button>
                <div class="header-submenu">
                    <a href="/product" class="header-link">Tất cả sản phẩm</a>
                    @foreach($headerCategories as $category)
                        <a href="{{ url('/product?category=' . $category['slug']) }}" class="header-link">
                            <span class="material-icons">{{ $category['icon'] }}</span>
                            {{ $category['name'] }}
                        </a>
                    @endforeach
                </div>
            </div>
            @foreach($headerMenus as $menu)
                <a href="{{ $menu['url'] }}" class="header-link" {{ $menu['open_in_new_tab'] ? 'target="_blank"' : '' }}>
                    @if($menu['icon'])
                        <span class="material-icons">{{ $menu['icon'] }}</span>
                    @endif
                    {{ $menu['label'] }}
                </a>
            @endforeach
            <a href="{{ route('cart.index') }}" class="header-link">Giỏ hàng</a>
            <a href="tel:{{ str_replace(' ', '', $headerPhone) }}" class="btn-primary header-phone-mobile">
                <span class="material-icons">phone</span>
                {{ $headerPhone }}
            </a>
        </div>
    </div>
</header>