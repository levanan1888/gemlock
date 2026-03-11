@extends('gemlock.layouts.app')

@section('title', ($product['name'] ?? 'Sản phẩm') . ' - Gemlock')
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
                        $productName = $product['name'] ?? 'Sản phẩm';
                        $productBrand = $product['brand'] ?? 'Gem Smart Lock';
                        $rawPrice = $product['price'] ?? null;
                        $productPrice = is_numeric($rawPrice) ? number_format($rawPrice, 0, ',', '.') . ' VNĐ' : ($rawPrice ?? 'Liên hệ');
                        $productImage = $product['image'] ?? asset('image/no-image.jpg');
                        $galleryImages = collect($product['images'] ?? [])->filter()->values();
                        if ($galleryImages->isEmpty() && !empty($product['image'])) {
                            $galleryImages = collect([$product['image']]);
                        }
                        if ($galleryImages->isEmpty()) {
                            $galleryImages = collect([asset('image/no-image.jpg')]);
                        }
                        $productFeatures = is_array($product['features'] ?? null) ? $product['features'] : [];
                        $productSpecs = is_array($product['specs'] ?? null) ? $product['specs'] : [];
                    @endphp

                    <div class="product-detail-gallery">
                        <div class="product-main-image-wrap text-center">
                            <img
                                id="product-main-image"
                                src="{{ $galleryImages->first() }}"
                                alt="{{ $productName }}"
                                class="img-fluid product-main-image"
                                onerror="this.src='{{ asset('image/no-image.jpg') }}'"
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
                                            alt="{{ $productName }} - {{ $index + 1 }}"
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
                    <h2 class="mb-3">{{ $productName }}</h2>
                    <p class="mb-2 text-muted">{{ $productBrand }}</p>
                    <p class="h4 text-primary mb-4">{{ $productPrice }}</p>

                    @if (!empty($productFeatures) && is_array($productFeatures))
                        <h5 class="mb-3">Tính năng nổi bật</h5>
                        <ul class="list-unstyled mb-4">
                            @foreach ($productFeatures as $feature)
                                @php
                                    // Handle both formats: ['title' => ..., 'desc' => ...] and key-value pairs
                                    $featureTitle = is_array($feature) ? ($feature['title'] ?? ($feature[0] ?? '')) : '';
                                    $featureDesc = is_array($feature) ? ($feature['desc'] ?? ($feature[1] ?? '')) : (is_string($feature) ? '' : '');
                                    // If it's a key-value pair from JSON: ["title" => "desc"]
                                    if (is_array($feature) && empty($featureTitle) && empty($featureDesc)) {
                                        $firstKey = array_key_first($feature);
                                        $featureTitle = $firstKey;
                                        $featureDesc = is_array($feature[$firstKey] ?? null) ? json_encode($feature[$firstKey]) : ($feature[$firstKey] ?? '');
                                    }
                                @endphp
                                <li class="mb-2">
                                    @if (!empty($feature['icon']))
                                        <i class="{{ $feature['icon'] }} me-2"></i>
                                    @endif
                                    <strong>{{ $featureTitle }}</strong>
                                    @if (!empty($featureDesc) && is_string($featureDesc))
                                        – {{ $featureDesc }}
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    @if (!empty($productSpecs) && is_array($productSpecs))
                        <h5 class="mb-3">Thông số kỹ thuật</h5>
                        <ul class="list-unstyled mb-4">
                            @foreach ($productSpecs as $label => $value)
                                @php
                                    // Ensure value is a string
                                    $specValue = is_array($value) ? json_encode($value) : (is_string($value) ? $value : '');
                                @endphp
                                <li class="mb-1">
                                    <strong>{{ $label }}:</strong> {{ $specValue }}
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    <div class="d-flex gap-3 mt-4">
                        <button class="btn-card-action btn-card-cart"
                                data-name="{{ $productName }}"
                                data-price="{{ $productPrice }}"
                                data-image="{{ $productImage }}"
                                onclick="event.preventDefault(); addToCart(this);">
                            Thêm vào giỏ
                        </button>
                        <a href="https://zalo.me/0967263944" target="_blank" class="btn-card-action btn-card-detail">
                            Tư vấn Zalo
                        </a>
                    </div>
                </div>
            </div>

            @if (!empty($relatedProducts) && is_array($relatedProducts))
                @php
                    $filteredRelated = collect($relatedProducts)
                        ->filter(fn($related) => isset($related['slug']) && $related['slug'] !== ($product['slug'] ?? ''))
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
                                    @php
                                        $relatedRawPrice = $related['price'] ?? null;
                                        $relatedDisplayPrice = is_numeric($relatedRawPrice) ? number_format($relatedRawPrice, 0, ',', '.') . ' VNĐ' : ($relatedRawPrice ?? 'Liên hệ');
                                    @endphp
                                    <div class="related-slide">
                                        <div class="product-item">
                                            <a href="{{ route('product.detail', $related['slug'] ?? '#') }}" class="product-card-image-link">
                                                <img src="{{ $related['image'] ?? asset('image/no-image.jpg') }}" class="img-fluid product-thumbnail"
                                                     onerror="this.src='{{ asset('image/no-image.jpg') }}'">
                                            </a>
                                            <h3 class="product-title">{{ $related['name'] ?? 'Sản phẩm' }}</h3>
                                            <strong class="product-price">{{ $relatedDisplayPrice }}</strong>

                                            <div class="product-card-actions">
                                                <a class="btn-card-action btn-card-detail" href="{{ route('product.detail', $related['slug'] ?? '#') }}">
                                                    Chi tiết
                                                </a>
                                                <button type="button"
                                                        class="btn-card-action btn-card-cart"
                                                        data-name="{{ $related['name'] ?? 'Sản phẩm' }}"
                                                        data-price="{{ $relatedRawPrice ?? 'Liên hệ' }}"
                                                        data-image="{{ $related['image'] ?? asset('image/no-image.jpg') }}"
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

