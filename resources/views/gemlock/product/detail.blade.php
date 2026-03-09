@extends('gemlock.layouts.app')

@section('title', $product['name'] . ' - Gemlock')
@section('body_class', 'gemlock-product-detail-page')

@section('before_main')
    @include('gemlock.partials.gemlock_topbar')
    @include('gemlock.partials.header')
@endsection

@push('gemlock_styles')
    <link href="{{ asset('furni/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('furni/css/tiny-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('furni/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/gemlock-product.css') }}">
@endpush

@section('page_content')
    <div class="untree_co-section product-section before-footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-5">
                    @php
                        $galleryImages = collect($product['images'] ?? [])->filter()->values();
                        if ($galleryImages->isEmpty() && !empty($product['image'])) {
                            $galleryImages = collect([$product['image']]);
                        }
                    @endphp

                    <div class="product-detail-gallery">
                        <div class="product-main-image-wrap text-center">
                            <img
                                id="product-main-image"
                                src="{{ $galleryImages->first() ?? asset('furni/images/product-1.png') }}"
                                alt="{{ $product['name'] }}"
                                class="img-fluid product-main-image"
                                onerror="this.src='{{ asset('furni/images/product-1.png') }}'"
                            >
                        </div>

                        @if($galleryImages->count() > 1)
                            <div class="product-thumbs-wrap">
                                @foreach($galleryImages as $index => $img)
                                    <button
                                        type="button"
                                        class="product-thumb-btn {{ $index === 0 ? 'is-active' : '' }}"
                                        data-image="{{ $img }}"
                                        aria-label="Ảnh sản phẩm {{ $index + 1 }}"
                                    >
                                        <img
                                            src="{{ $img }}"
                                            alt="{{ $product['name'] }} - {{ $index + 1 }}"
                                            class="product-thumb-image"
                                            onerror="this.src='{{ asset('furni/images/product-1.png') }}'"
                                        >
                                    </button>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6 mb-5">
                    <h2 class="mb-3">{{ $product['name'] }}</h2>
                    <p class="mb-2 text-muted">{{ $product['brand'] ?? 'Gem Smart Lock' }}</p>
                    <p class="h4 text-primary mb-4">{{ $product['price'] }}</p>

                    @if (!empty($product['features']))
                        <h5 class="mb-3">Tính năng nổi bật</h5>
                        <ul class="list-unstyled mb-4">
                            @foreach ($product['features'] as $feature)
                                <li class="mb-2">
                                    @if (!empty($feature['icon']))
                                        <i class="{{ $feature['icon'] }} me-2"></i>
                                    @endif
                                    <strong>{{ $feature['title'] ?? '' }}</strong>
                                    @if (!empty($feature['desc']))
                                        – {{ $feature['desc'] }}
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    @if (!empty($product['specs']))
                        <h5 class="mb-3">Thông số kỹ thuật</h5>
                        <ul class="list-unstyled mb-4">
                            @foreach ($product['specs'] as $label => $value)
                                <li class="mb-1">
                                    <strong>{{ $label }}:</strong> {{ $value }}
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    <div class="d-flex gap-3 mt-4">
                        <button class="btn btn-primary"
                                data-name="{{ $product['name'] }}"
                                data-price="{{ $product['price'] }}"
                                data-image="{{ $product['image'] }}"
                                onclick="event.preventDefault(); addToCart(this);">
                            Thêm vào giỏ
                        </button>
                        <a href="https://zalo.me/0967263944" target="_blank" class="btn btn-outline-primary">
                            Tư vấn Zalo
                        </a>
                    </div>
                </div>
            </div>

            @if (!empty($relatedProducts))
                @php
                    $filteredRelated = collect($relatedProducts)
                        ->filter(fn($related) => $related['slug'] !== $product['slug'])
                        ->values();
                @endphp

                @if($filteredRelated->isNotEmpty())
                    <div class="related-carousel-section mt-5">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h3 class="mb-0">Sản phẩm liên quan</h3>
                            <div class="related-carousel-nav">
                                <button type="button" class="related-prev" aria-label="Trước">
                                    <i class="fas fa-chevron-left"></i>
                                </button>
                                <button type="button" class="related-next" aria-label="Tiếp theo">
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>

                        <div class="related-carousel" id="related-carousel">
                            <div class="related-track">
                                @foreach ($filteredRelated as $related)
                                    <div class="related-slide">
                                        <div class="product-item">
                                            <a href="{{ route('product.detail', $related['slug']) }}" class="product-card-image-link">
                                                <img src="{{ $related['image'] }}" class="img-fluid product-thumbnail"
                                                     onerror="this.src='{{ asset('furni/images/product-1.png') }}'">
                                            </a>
                                            <h3 class="product-title">{{ $related['name'] }}</h3>
                                            <strong class="product-price">{{ $related['price'] }}</strong>

                                            <div class="product-card-actions">
                                                <a class="btn-card-action btn-card-detail" href="{{ route('product.detail', $related['slug']) }}">
                                                    Chi tiết
                                                </a>
                                                <button type="button"
                                                        class="btn-card-action btn-card-cart"
                                                        data-name="{{ $related['name'] }}"
                                                        data-price="{{ $related['price'] }}"
                                                        data-image="{{ $related['image'] }}"
                                                        onclick="addToCart(this);">
                                                    Thêm giỏ hàng
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
            @endif
        </div>
    </div>
@endsection

@push('gemlock_scripts')
    <script>
        window.gemlockProductConfig = {
            cartAddUrl: '{{ route('cart.add') }}',
            csrfToken: '{{ csrf_token() }}'
        };
    </script>
    <script src="{{ asset('js/gemlock-product.js') }}"></script>
@endpush

