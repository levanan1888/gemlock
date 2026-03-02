@extends('gemlock.layouts.app')

@section('title', $product['name'] . ' - Gemlock')
@section('body_class', 'gemlock-product-page')

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
        .product-section {
            padding-top: 2rem;
        }
        .hero-product {
            background-image: url('https://gemcorp.vn/images/BN02.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 400px;
            display: flex;
            align-items: center;
            position: relative;
        }
        .hero-product::before {
            content: '';
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.3);
        }
        .hero-product .container {
            position: relative;
            z-index: 1;
        }
        .hero-product h1,
        .hero-product p {
            color: #fff;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
        .product-item {
            text-decoration: none;
            display: block;
            transition: .3s all ease;
        }
        .product-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px -5px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        .product-thumbnail {
            height: 250px;
            object-fit: contain;
            width: 100%;
            margin-bottom: 20px;
        }
        .sidebar-search {
            position: relative;
            margin-bottom: 30px;
        }
        .sidebar-search input {
            width: 100%;
            padding: 12px 20px;
            padding-right: 40px;
            border: 1px solid #efefef;
            border-radius: 30px;
            background: #f9f9f9;
            transition: .3s all;
        }
        .sidebar-search input:focus {
            outline: none;
            border-color: #f9bf29;
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        }
        .sidebar-search .fa-search {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #aaa;
        }
        .sidebar-widget {
            margin-bottom: 40px;
        }
        .sidebar-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 20px;
            color: #3b5d50;
        }
        .category-list {
            list-style: none;
            padding: 0;
            margin: 0;
            display: block;
        }
        .category-list li {
            margin-bottom: 12px;
            display: block;
            width: 100%;
        }
        .category-list a {
            color: #666;
            text-decoration: none;
            font-size: 15px;
            transition: .2s;
            display: flex;
            justify-content: space-between;
        }
        .category-list a:hover {
            color: #f9bf29;
            padding-left: 5px;
        }
        @media (max-width: 991px) {
            .sidebar-column {
                display: none !important;
            }
        }
        @keyframes flyToCart {
            0% { transform: translate(0, 0) scale(1); opacity: 1; }
            50% { transform: translate(var(--tx), var(--ty)) scale(0.5); opacity: 0.8; }
            100% { transform: translate(var(--tx), var(--ty)) scale(0.1); opacity: 0; }
        }
        .flying-image {
            position: fixed;
            z-index: 9999;
            pointer-events: none;
            animation: flyToCart 1.2s ease-in-out forwards;
        }
    </style>
@endpush

@section('page_content')
    <div class="hero hero-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="intro-excerpt">
                        <h1>Danh mục sản phẩm</h1>
                        <p class="mb-4">Khám phá các dòng sản phẩm GemLock</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="untree_co-section product-section before-footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 mb-5 sidebar-column">
                    <div class="sidebar-search">
                        <input type="text" placeholder="Tìm kiếm sản phẩm...">
                        <i class="fas fa-search"></i>
                    </div>

                    <div class="sidebar-widget">
                        <h4 class="sidebar-title">Danh mục sản phẩm</h4>
                        <ul class="category-list">
                            <li><a href="#">Khóa vân tay <span>(12)</span></a></li>
                            <li><a href="#">Khóa thẻ từ <span>(8)</span></a></li>
                            <li><a href="#">Khóa mã số <span>(5)</span></a></li>
                            <li><a href="#">Khóa cửa kính <span>(4)</span></a></li>
                            <li><a href="#">Phụ kiện khóa <span>(3)</span></a></li>
                        </ul>
                    </div>

                    <div class="sidebar-widget">
                        <h4 class="sidebar-title">Khoảng giá</h4>
                        <ul class="category-list">
                            <li><a href="#">Dưới 2 triệu</a></li>
                            <li><a href="#">Từ 2 - 5 triệu</a></li>
                            <li><a href="#">Từ 5 - 10 triệu</a></li>
                            <li><a href="#">Trên 10 triệu</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-9">
                    <div class="row">
                        @php
                            $perPage = 9;
                            $currentPage = request()->get('page', 1);
                            $totalProducts = count($products);
                            $totalPages = ceil($totalProducts / $perPage);
                            $offset = ($currentPage - 1) * $perPage;
                            $paginatedProducts = array_slice($products, $offset, $perPage);
                        @endphp

                        @foreach($paginatedProducts as $product)
                            <div class="col-12 col-md-6 col-lg-4 mb-5">
                                <a class="product-item" href="{{ route('product.detail', $product['slug']) }}">
                                    <img src="{{ $product['image'] }}" class="img-fluid product-thumbnail"
                                         onerror="this.src='{{ asset('furni/images/product-1.png') }}'">
                                    <h3 class="product-title">{{ $product['name'] }}</h3>
                                    <strong class="product-price">{{ $product['price'] }}</strong>
                                    <span class="icon-cross add-to-cart-btn"
                                          data-name="{{ $product['name'] }}"
                                          data-price="{{ $product['price'] }}"
                                          data-image="{{ $product['image'] }}"
                                          onclick="event.preventDefault(); addToCart(this);">
                                        <img src="{{ asset('furni/images/cross.svg') }}" class="img-fluid">
                                    </span>
                                </a>
                            </div>
                        @endforeach
                    </div>

                    @if($totalPages > 1)
                        <nav class="pagination-wrapper mt-4">
                            <ul class="pagination justify-content-center">
                                <li class="page-item {{ $currentPage == 1 ? 'disabled' : '' }}">
                                    <a class="page-link" href="?page={{ $currentPage - 1 }}" aria-label="Previous">
                                        <i class="fas fa-chevron-left"></i>
                                    </a>
                                </li>
                                @for($i = 1; $i <= $totalPages; $i++)
                                    @if($i == 1 || $i == $totalPages || abs($i - $currentPage) <= 2)
                                        <li class="page-item {{ $currentPage == $i ? 'active' : '' }}">
                                            <a class="page-link" href="?page={{ $i }}">{{ $i }}</a>
                                        </li>
                                    @elseif(abs($i - $currentPage) == 3)
                                        <li class="page-item disabled"><span class="page-link">...</span></li>
                                    @endif
                                @endfor
                                <li class="page-item {{ $currentPage == $totalPages ? 'disabled' : '' }}">
                                    <a class="page-link" href="?page={{ $currentPage + 1 }}" aria-label="Next">
                                        <i class="fas fa-chevron-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@push('gemlock_scripts')
    <script>
        function addToCart(element) {
            const name = element.getAttribute('data-name');
            const price = element.getAttribute('data-price');
            const image = element.getAttribute('data-image');

            fetch('{{ route('cart.add') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ name, price, image })
            })
            .then(response => response.json())
            .then(data => {
                flyToCart(element);
                const cartCount = document.querySelector('.cart-quantity');
                if (cartCount) {
                    setTimeout(() => {
                        const countValue = data.cart_count || 0;
                        cartCount.textContent = countValue;
                        cartCount.classList.toggle('is-empty', countValue < 1);
                    }, 1000);
                }
            })
            .catch(error => console.error('Error:', error));
        }

        function flyToCart(element) {
            const productItem = element.closest('.product-item');
            const productImage = productItem ? productItem.querySelector('.product-thumbnail') : null;
            const cartIcon = document.querySelector('.header-cart') || document.querySelector('.w-commerce-commercecartopenlink');
            if (!cartIcon || !productImage) return;

            const flyingImg = productImage.cloneNode(true);
            flyingImg.classList.add('flying-image');

            const imgRect = productImage.getBoundingClientRect();
            const cartRect = cartIcon.getBoundingClientRect();

            flyingImg.style.position = 'fixed';
            flyingImg.style.left = imgRect.left + 'px';
            flyingImg.style.top = imgRect.top + 'px';
            flyingImg.style.width = imgRect.width + 'px';
            flyingImg.style.height = imgRect.height + 'px';

            const imgCenterX = imgRect.left + imgRect.width / 2;
            const imgCenterY = imgRect.top + imgRect.height / 2;
            const cartCenterX = cartRect.left + cartRect.width / 2;
            const cartCenterY = cartRect.top + cartRect.height / 2;

            const deltaX = cartCenterX - imgCenterX;
            const deltaY = cartCenterY - imgCenterY;

            flyingImg.style.setProperty('--tx', deltaX + 'px');
            flyingImg.style.setProperty('--ty', deltaY + 'px');

            document.body.appendChild(flyingImg);
            setTimeout(() => flyingImg.remove(), 1200);
        }
    </script>
@endpush

