@php
    /** @var array $groupedProducts */
@endphp

{{-- Danh mục sản phẩm theo category --}}
@foreach($groupedProducts as $groupIndex => $group)
    <section id="category-{{ $group['category']['slug'] }}"
             class="category-section {{ $groupIndex % 2 == 0 ? 'section-white' : 'section-tint' }}"
             data-category="{{ $group['category']['slug'] }}" style="padding: 50px 0;">
        <div class="w-layout-blockcontainer container w-container">
            <div class="category-header"
                 style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 24px; padding-bottom: 16px; border-bottom: 2px solid rgba(212,168,0,0.2);">
                <div style="display: flex; align-items: center; gap: 14px;">
                    <span class="material-icons"
                          style="font-size: 36px; color: #D4A800;">{{ $group['category']['icon'] }}</span>
                    <h2 class="heading-h2" style="margin: 0; font-size: 24px;">{{ $group['category']['name'] }}</h2>
                </div>
                <div style="display: flex; gap: 10px;">
                    <button type="button" class="category-slider-prev slider-btn"
                            data-category="{{ $group['category']['slug'] }}">
                        <span class="material-icons">chevron_left</span>
                    </button>
                    <button type="button" class="category-slider-next slider-btn"
                            data-category="{{ $group['category']['slug'] }}">
                        <span class="material-icons">chevron_right</span>
                    </button>
                </div>
            </div>

            <div class="category-grid">
                {{-- Video Card bên trái --}}
                <div class="video-card">
                    <div class="video-card-image">
                        <img alt="{{ $group['category']['name'] }}" src="{{ $group['category']['image'] }}"/>
                        <div class="video-card-overlay">
                            <button class="play-btn">
                                <span class="material-icons">play_arrow</span>
                            </button>
                        </div>
                        <div class="video-card-label">
                            <span>{{ $group['category']['series'] }}</span>
                        </div>
                    </div>
                    <div class="video-card-content">
                        <h3>{{ $group['category']['title'] }}</h3>
                        <ul>
                            @foreach($group['category']['features'] as $feature)
                                <li>
                                    <span class="material-icons">{{ $feature['icon'] }}</span>
                                    {{ $feature['text'] }}
                                </li>
                            @endforeach
                        </ul>
                        <a href="/product" class="btn-view-all">Xem tất cả</a>
                    </div>
                </div>

                {{-- Products Slider bên phải --}}
                <div class="category-slider-container" data-category="{{ $group['category']['slug'] }}">
                    <div class="category-slider-track" data-category="{{ $group['category']['slug'] }}">
                        @foreach($group['products'] as $product)
                            @php
                                $rawPrice = $product['price'] ?? null;
                                $rawSalePrice = $product['sale_price'] ?? null;
                                $hasDiscount = is_numeric($rawSalePrice) && $rawSalePrice > 0 && $rawSalePrice < $rawPrice;
                                $displayPrice = $hasDiscount
                                    ? number_format($rawSalePrice, 0, ',', '.') . ' VNĐ'
                                    : (is_numeric($rawPrice) ? number_format($rawPrice, 0, ',', '.') . ' VNĐ' : $rawPrice);
                                $originalPrice = is_numeric($rawPrice) ? number_format($rawPrice, 0, ',', '.') . ' VNĐ' : $rawPrice;
                            @endphp
                            <div class="product-slide">
                                <a href="{{ route('product.detail', $product['slug']) }}"
                                   class="product-item home-product-item">
                                    <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}"
                                         class="product-thumbnail"
                                         onerror="this.src='{{ asset('furni/images/product-1.png') }}'">
                                    <h3 class="product-title">{{ $product['name'] }}</h3>
                                    <strong class="product-price">
                                        @if($hasDiscount)
                                            <span class="text-danger">{{ $displayPrice }}</span>
                                            <span class="text-muted text-decoration-line-through small d-block">{{ $originalPrice }}</span>
                                        @else
                                            {{ $displayPrice }}
                                        @endif
                                    </strong>
                                    <span class="icon-cross home-add-to-cart"
                                          data-name="{{ $product['name'] }}"
                                          data-price="{{ $rawSalePrice ?? $rawPrice }}"
                                          data-image="{{ $product['image'] }}"
                                          onclick="event.preventDefault(); event.stopPropagation(); addToCart(this);">
                                        <img src="{{ asset('furni/images/cross.svg') }}" class="img-fluid"
                                             alt="Add to cart">
                                    </span>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endforeach

