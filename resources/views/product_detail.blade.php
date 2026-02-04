@extends('layouts.app')

@push('styles')
    <link href="{{ asset('furni/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('furni/css/tiny-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('furni/css/style.css') }}" rel="stylesheet">
    <style>
        :root {
            --primary-color: #3b5d50;
            --accent-color: #f9bf29;
            --text-dark: #2f2f2f;
            --text-muted: #6a6a6a;
        }

        .product-detail-section {
            padding: 60px 0;
            background: #fff;
        }

        .product-section .product-item .product-thumbnail {
            height: 250px;
            object-fit: contain;
            width: 100%;
        }

        .related-products-section {
            margin-top: 20px;
            padding-top: 10px;
        }

        /* Image Gallery & Slider */
        .slider-wrapper {
            position: relative;
            background: #f9f9f9;
            border-radius: 20px;
            padding: 20px;
            margin-bottom: 20px;
            overflow: hidden;
        }
        
        .product-slider img {
            max-width: 100%;
            height: 450px;
            object-fit: contain;
            cursor: zoom-in;
            transition: transform 0.3s ease;
        }

        /* Slider Arrows */
        .slider-controls {
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            transform: translateY(-50%);
            display: flex;
            justify-content: space-between;
            padding: 0 10px;
            pointer-events: none;
            z-index: 10;
        }

        .slider-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.8);
            border: 1px solid #eee;
            color: var(--text-dark);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            pointer-events: auto;
            transition: .3s;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .slider-btn:hover {
            background: var(--accent-color);
            color: #fff;
            border-color: var(--accent-color);
        }

        .thumbnail-nav {
            display: flex;
            gap: 10px;
            justify-content: center;
            margin-top: 20px;
        }

        .thumbnail-item {
            width: 80px;
            height: 80px;
            border: 2px solid transparent;
            border-radius: 10px;
            overflow: hidden;
            cursor: pointer;
            transition: .3s;
            background: #f9f9f9;
            padding: 5px;
        }

        .thumbnail-item img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .thumbnail-item.active {
            border-color: var(--accent-color);
        }

        /* Info Column */
        .product-info-column {
            padding-left: 40px;
        }

        .brand-badge {
            background: rgba(249, 191, 41, 0.1);
            color: #d1a000;
            padding: 5px 15px;
            border-radius: 50px;
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            display: inline-block;
            margin-bottom: 15px;
        }

        .product-detail-title {
            font-size: 36px;
            font-weight: 800;
            color: var(--text-dark);
            margin-bottom: 10px;
            line-height: 1.2;
        }

        .price-box {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 25px;
        }

        .current-price {
            font-size: 32px;
            font-weight: 800;
            color: var(--primary-color);
        }

        /* Interactive Features */
        .feature-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin-bottom: 30px;
        }

        .feature-card {
            background: #fdfdfd;
            border: 1px solid #f1f1f1;
            padding: 15px;
            border-radius: 15px;
            display: flex;
            align-items: flex-start;
            gap: 12px;
            transition: .3s;
        }

        .feature-card:hover {
            border-color: var(--accent-color);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        .feature-card i {
            font-size: 20px;
            color: var(--accent-color);
            margin-top: 3px;
        }

        .feature-card h5 {
            font-size: 14px;
            font-weight: 700;
            margin-bottom: 3px;
            color: var(--text-dark);
        }

        .feature-card p {
            font-size: 12px;
            color: var(--text-muted);
            margin: 0;
            line-height: 1.4;
        }

        /* Actions */
        .quantity-selector {
            display: flex;
            align-items: center;
            background: #f4f4f4;
            border-radius: 50px;
            padding: 5px;
            width: fit-content;
            margin-right: 20px;
        }

        .quantity-selector button {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            border: none;
            background: #fff;
            color: var(--text-dark);
            font-weight: 700;
            transition: .2s;
        }

        .quantity-selector button:hover {
            background: var(--accent-color);
            color: #fff;
        }

        .quantity-selector input {
            width: 50px;
            border: none;
            background: transparent;
            text-align: center;
            font-weight: 700;
        }

        .btn-buy {
            flex: 1;
            background: var(--primary-color);
            color: #fff;
            border: none;
            padding: 15px 30px;
            border-radius: 50px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: .3s;
        }

        .btn-buy:hover {
            background: var(--text-dark);
            transform: scale(1.02);
        }

        /* Zoom Modal */
        #zoomModal {
            display: none;
            position: fixed;
            z-index: 2000;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.9);
            justify-content: center;
            align-items: center;
        }

        #zoomModal img {
            max-width: 90%;
            max-height: 90%;
            object-fit: contain;
            animation: zoomIn .3s ease;
            cursor: zoom-out;
        }

        .zoom-controls {
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            transform: translateY(-50%);
            display: flex;
            justify-content: space-between;
            padding: 0 30px;
            pointer-events: none;
        }

        .zoom-btn {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            pointer-events: auto;
            transition: .3s;
            font-size: 24px;
        }

        .zoom-btn:hover {
            background: var(--accent-color);
            border-color: var(--accent-color);
            color: var(--text-dark);
        }

        .zoom-close {
            position: absolute;
            top: 20px;
            right: 20px;
            color: #fff;
            font-size: 30px;
            cursor: pointer;
            z-index: 2001;
        }

        @keyframes zoomIn {
            from { transform: scale(0.8); opacity: 0; }
            to { transform: scale(1); opacity: 1; }
        }

        /* Tabs styling */
        .nav-tabs .nav-link {
            border: none !important;
            padding: 15px 40px;
            font-weight: 800;
            color: var(--text-muted);
            position: relative;
            background: transparent;
            cursor: pointer;
        }

        .nav-tabs .nav-link.active {
            color: var(--primary-color);
            background: transparent !important;
        }

        .nav-tabs .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: var(--accent-color);
        }

        @media (max-width: 991px) {
            .product-info-column { padding-left: 15px; margin-top: 50px; }
            .feature-grid { grid-template-columns: 1fr; }
        }
    </style>
@endpush

@section('content')
    @include('partials.header')

    <!-- Breadcrumbs -->
    <div class="custom-breadcrumbs py-3 bg-light border-bottom">
        <div class="container">
            <a href="{{ url('/') }}" class="text-decoration-none text-muted">Trang chủ</a>
            <span class="mx-2">/</span>
            <a href="{{ url('/product') }}" class="text-decoration-none text-muted">Sản phẩm</a>
            <span class="mx-2">/</span>
            <span class="fw-bold text-dark">{{ $product['name'] }}</span>
        </div>
    </div>

    <section class="product-detail-section">
        <div class="container">
            <div class="row">
                <!-- Image Slider Column -->
                <div class="col-lg-6">
                    <div class="slider-wrapper">
                        <div class="product-slider">
                            @php $imgList = isset($product['images']) ? $product['images'] : [$product['image']]; @endphp
                            @foreach($imgList as $index => $img)
                                <div><img src="{{ $img }}" alt="{{ $product['name'] }}" onclick="openZoom({{ $index }})"></div>
                            @endforeach
                        </div>
                        <!-- Custom Slider Controls -->
                        <div class="slider-controls">
                            <button id="slider-prev" class="slider-btn prev"><i class="fas fa-chevron-left"></i></button>
                            <button id="slider-next" class="slider-btn next"><i class="fas fa-chevron-right"></i></button>
                        </div>
                    </div>
                    
                    <div class="thumbnail-nav">
                        @if(isset($product['images']))
                            @foreach($product['images'] as $index => $img)
                                <div class="thumbnail-item {{ $index == 0 ? 'active' : '' }}" onclick="goToSlide({{ $index }}, this)">
                                    <img src="{{ $img }}" alt="Thumbnail">
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

                <!-- Info Column -->
                <div class="col-lg-6">
                    <div class="product-info-column">
                        <span class="brand-badge">{{ $product['brand'] }}</span>
                        <h1 class="product-detail-title">{{ $product['name'] }}</h1>
                        
                        <div class="d-flex align-items-center mb-4">
                            <div class="text-warning me-3">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <span class="text-muted small fw-bold">128 Reviewers</span>
                        </div>

                        <div class="price-box">
                            <span class="current-price">{{ $product['price'] }}</span>
                            @if($product['price'] !== 'Liên hệ')
                                <span class="text-muted text-decoration-line-through">12.500.000đ</span>
                            @endif
                        </div>

                        <p class="product-description mb-4">
                            {{ $product['description'] }}
                        </p>

                        <!-- Featured Highlights - Redesigned -->
                        <div class="feature-grid">
                            @foreach($product['features'] as $feature)
                                <div class="feature-card">
                                    <i class="{{ $feature['icon'] ?? 'fas fa-check-circle' }}"></i>
                                    <div>
                                        <h5>{{ $feature['title'] }}</h5>
                                        <p>{{ $feature['desc'] }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="d-flex align-items-center mb-5">
                            <div class="quantity-selector">
                                <button onclick="changeQty(-1)">-</button>
                                <input type="text" value="1" id="main-qty" readonly>
                                <button onclick="changeQty(1)">+</button>
                            </div>
                            <button class="btn-buy" onclick="addToCartDetail()">
                                <i class="fas fa-shopping-cart me-2"></i> THÊM VÀO GIỎ HÀNG
                            </button>
                        </div>

                        <div class="pt-4 border-top">
                            <div class="row g-4">
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-truck text-primary me-3 fs-3"></i>
                                        <span class="small fw-bold">Giao hàng & Lắp đặt miễn phí</span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-shield-alt text-primary me-3 fs-3"></i>
                                        <span class="small fw-bold">Bảo hành 24 tháng (1 đổi 1)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tabs Section -->
            <div class="product-section related-products-section">
                <ul class="nav nav-tabs justify-content-center border-0 mb-5" id="productTab">
                    <li class="nav-item">
                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab-desc" type="button">MÔ TẢ CHI TIẾT</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-spec" type="button">THÔNG SỐ KỸ THUẬT</button>
                    </li>
                </ul>
                <div class="tab-content bg-light p-5 rounded-4 border">
                    <div class="tab-pane fade show active" id="tab-desc">
                        <div class="row align-items-center">
                            <div class="col-lg-7">
                                <h3 class="mb-4 fw-bold">Vượt qua mọi giới hạn an ninh</h3>
                                <p>Sản phẩm mang tính đột phá với những công nghệ tiên tiến nhất từ Châu Âu. Mỗi chiếc khóa Gemlock không chỉ là thiết bị bảo vệ, mà là một tác phẩm trang trí tuyệt mỹ cho cánh cửa ngôi nhà bạn.</p>
                                <ul class="list-unstyled mt-4">
                                    <li class="mb-3"><i class="fas fa-check-circle text-success me-2"></i> Chế tác từ hợp kim đúc nguyên khối siêu bền.</li>
                                    <li class="mb-3"><i class="fas fa-check-circle text-success me-2"></i> Kính cường lực chống xước, chống bám vân tay.</li>
                                    <li><i class="fas fa-check-circle text-success me-2"></i> Pin sạc Lithium dung lượng cao, thời gian chờ lên đến 1 năm.</li>
                                </ul>
                            </div>
                            <div class="col-lg-5">
                                <img src="{{ $product['image'] }}" class="img-fluid rounded-4 shadow-sm">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-spec">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                @foreach($product['specs'] as $label => $val)
                                    <tr>
                                        <th class="py-3 px-4 bg-white" width="30%">{{ $label }}</th>
                                        <td class="py-3 px-4">{{ $val }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Related Products -->
            <div class="mt-5 pt-5">
                <div class="d-flex justify-content-between align-items-center mb-5">
                    <h2 class="fw-bold">Sản phẩm liên quan</h2>
                    <a href="{{ url('/product') }}" class="text-primary fw-bold text-decoration-none">Xem tất cả <i class="fas fa-arrow-right ms-2"></i></a>
                </div>
                <div class="row">
                    @foreach($relatedProducts as $p)
                        @if($p['slug'] !== $product['slug'])
                        <div class="col-12 col-md-6 col-lg-4 mb-5">
                            <a class="product-item" href="{{ route('product.detail', $p['slug']) }}">
                                <img src="{{ $p['image'] }}" class="img-fluid product-thumbnail"
                                    onerror="this.src='{{ asset('furni/images/product-1.png') }}'">
                                <h3 class="product-title">{{ $p['name'] }}</h3>
                                <strong class="product-price">{{ $p['price'] }}</strong>
                                <span class="icon-cross add-to-cart-btn" data-name="{{ $p['name'] }}"
                                    data-price="{{ $p['price'] }}" data-image="{{ $p['image'] }}"
                                    onclick="event.preventDefault(); addToCart(this);">
                                    <img src="{{ asset('furni/images/cross.svg') }}" class="img-fluid" alt="Thêm vào giỏ">
                                </span>
                            </a>
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Zoom Modal -->
    <div id="zoomModal">
        <span class="zoom-close" onclick="closeZoom()">&times;</span>
        <div class="zoom-controls">
            <button class="zoom-btn" onclick="prevZoom(event)"><i class="fas fa-chevron-left"></i></button>
            <button class="zoom-btn" onclick="nextZoom(event)"><i class="fas fa-chevron-right"></i></button>
        </div>
        <img id="zoomImg" src="" onclick="closeZoom()">
    </div>

    @include('partials.footer')
@endsection

@push('scripts')
    <script src="{{ asset('furni/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('furni/js/tiny-slider.js') }}"></script>
    <script>
        // Init Slider
        const slider = tns({
            container: '.product-slider',
            items: 1,
            slideBy: 'page',
            autoplay: false,
            controls: true,
            autoplayButtonOutput: false,
            nav: false,
            mouseDrag: true,
            prevButton: '#slider-prev',
            nextButton: '#slider-next'
        });

        // Update active thumbnail on slide change
        slider.events.on('indexChanged', (info) => {
            const index = (info.displayIndex - 1);
            const thumbnails = document.querySelectorAll('.thumbnail-item');
            thumbnails.forEach(t => t.classList.remove('active'));
            if(thumbnails[index]) thumbnails[index].classList.add('active');
        });

        function goToSlide(index, element) {
            slider.goTo(index);
            document.querySelectorAll('.thumbnail-item').forEach(i => i.classList.remove('active'));
            element.classList.add('active');
        }

        // Qty logic
        function changeQty(delta) {
            const input = document.getElementById('main-qty');
            let val = parseInt(input.value) + delta;
            if (val < 1) val = 1;
            input.value = val;
        }

        // Zoom logic
        let currentZoomIndex = 0;
        const allImages = @json($imgList);

        function openZoom(index) {
            currentZoomIndex = index;
            document.getElementById('zoomImg').src = allImages[currentZoomIndex];
            document.getElementById('zoomModal').style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }

        function closeZoom() {
            document.getElementById('zoomModal').style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        function nextZoom(e) {
            e.stopPropagation();
            currentZoomIndex = (currentZoomIndex + 1) % allImages.length;
            document.getElementById('zoomImg').src = allImages[currentZoomIndex];
        }

        function prevZoom(e) {
            e.stopPropagation();
            currentZoomIndex = (currentZoomIndex - 1 + allImages.length) % allImages.length;
            document.getElementById('zoomImg').src = allImages[currentZoomIndex];
        }

        // Action logic
        function addToCartDetail() {
            const qty = document.getElementById('main-qty').value;
            fetch('{{ route('cart.add') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    name: '{{ $product['name'] }}',
                    price: '{{ $product['price'] }}',
                    image: '{{ $product['image'] }}',
                    quantity: qty
                })
            })
            .then(r => r.json())
            .then(data => {
                alert('Đã thêm ' + qty + ' sản phẩm vào giỏ hàng!');
                location.reload();
            });
        }

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
                body: JSON.stringify({
                    name: name,
                    price: price,
                    image: image
                })
            })
            .then(r => r.json())
            .then(data => {
                const cartCount = document.querySelector('.cart-quantity');
                if (cartCount) {
                    const countValue = data.cart_count || 0;
                    cartCount.textContent = countValue;
                    cartCount.classList.toggle('is-empty', countValue < 1);
                }
            })
            .catch(error => console.error('Error:', error));
        }
    </script>
@endpush
