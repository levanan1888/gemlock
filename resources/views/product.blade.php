@extends('layouts.app')

@push('styles')
    <link href="{{ asset('furni/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('furni/css/tiny-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('furni/css/style.css') }}" rel="stylesheet">
    <style>
        .product-section {
            padding-top: 120px;
            /* Increased to prevent header overlap */
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
            /* Ensure images don't stretch */
            width: 100%;
            margin-bottom: 20px;
        }

        /* Sidebar Styling */
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
            /* Brand Yellow */
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
            /* Ensure list is block */
        }

        .category-list li {
            margin-bottom: 12px;
            display: block;
            /* Force vertical stacking */
            width: 100%;
            /* Take full width */
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

        /* Mobile: Hide sidebar */
        @media (max-width: 991px) {
            .sidebar-column {
                display: none !important;
            }
        }

        /* Fly to cart animation */
        @keyframes flyToCart {
            0% {
                transform: translate(0, 0) scale(1);
                opacity: 1;
            }

            50% {
                transform: translate(var(--tx), var(--ty)) scale(0.5);
                opacity: 0.8;
            }

            100% {
                transform: translate(var(--tx), var(--ty)) scale(0.1);
                opacity: 0;
            }
        }

        .flying-image {
            position: fixed;
            z-index: 9999;
            pointer-events: none;
            animation: flyToCart 1.2s ease-in-out forwards;
        }
    </style>
@endpush

@section('content')
    @include('partials.header')

    <div class="untree_co-section product-section before-footer-section">
        <div class="container">
            <div class="row">
                <!-- Sidebar -->
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

                <!-- Product Grid -->
                <div class="col-lg-9">
                    <div class="row">
                        @php
                            // $products is passed from the route
                        @endphp

                        @foreach($products as $product)
                            <!-- Start Column -->
                            <div class="col-12 col-md-6 col-lg-4 mb-5">
                                <a class="product-item" href="{{ route('product.detail', $product['slug']) }}">
                                    <img src="{{ $product['image'] }}" class="img-fluid product-thumbnail"
                                        onerror="this.src='{{ asset('furni/images/product-1.png') }}'">
                                    <h3 class="product-title">{{ $product['name'] }}</h3>
                                    <strong class="product-price">{{ $product['price'] }}</strong>

                                    <span class="icon-cross add-to-cart-btn" data-name="{{ $product['name'] }}"
                                        data-price="{{ $product['price'] }}" data-image="{{ $product['image'] }}"
                                        onclick="event.preventDefault(); addToCart(this);">
                                        <img src="{{ asset('furni/images/cross.svg') }}" class="img-fluid">
                                    </span>
                                </a>
                            </div>
                            <!-- End Column -->
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function addToCart(element) {
            // Get product data
            const name = element.getAttribute('data-name');
            const price = element.getAttribute('data-price');
            const image = element.getAttribute('data-image');

            // Perform AJAX request
            fetch('{{ route('cart.add') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    name: name,
                    price: price,
                    image: image
                })
            })
            .then(response => response.json())
            .then(data => {
                // Determine if we should fly
                flyToCart(element);
                
                // Update cart count from server response
                const cartCount = document.querySelector('.cart-quantity');
                if (cartCount && data.cart_count) {
                    // Update after a slight delay to match animation arrival
                     setTimeout(() => {
                        cartCount.textContent = data.cart_count;
                    }, 1000);
                }
            })
            .catch(error => console.error('Error:', error));
        }

        function flyToCart(element) {
            // Get the product image
            const productItem = element.closest('.product-item');
            const productImage = productItem.querySelector('.product-thumbnail');

            // Get cart icon position
            const cartIcon = document.querySelector('.w-commerce-commercecartopenlink');
            if (!cartIcon || !productImage) return;

            // Create flying image clone
            const flyingImg = productImage.cloneNode(true);
            flyingImg.classList.add('flying-image');

            // Get positions
            const imgRect = productImage.getBoundingClientRect();
            const cartRect = cartIcon.getBoundingClientRect();

            // Set initial position
            flyingImg.style.position = 'fixed';
            flyingImg.style.left = imgRect.left + 'px';
            flyingImg.style.top = imgRect.top + 'px';
            flyingImg.style.width = imgRect.width + 'px';
            flyingImg.style.height = imgRect.height + 'px';

            // Calculate translation (Center to Center)
            const imgCenterX = imgRect.left + imgRect.width / 2;
            const imgCenterY = imgRect.top + imgRect.height / 2;

            const cartCenterX = cartRect.left + cartRect.width / 2;
            const cartCenterY = cartRect.top + cartRect.height / 2;

            const deltaX = cartCenterX - imgCenterX;
            const deltaY = cartCenterY - imgCenterY;

            flyingImg.style.setProperty('--tx', deltaX + 'px');
            flyingImg.style.setProperty('--ty', deltaY + 'px');

            // Add to body
            document.body.appendChild(flyingImg);

            // Remove after animation
            setTimeout(() => {
                flyingImg.remove();
            }, 1200);
        }
    </script>
@endpush