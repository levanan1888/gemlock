@extends('gemlock.layouts.app')

@section('title', 'Danh mục sản phẩm - Gemlock')
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
    <link rel="stylesheet" href="{{ asset('css/gemlock-product.css') }}">
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
                            <li>
                                <label class="filter-option">
                                    <span class="filter-left">
                                        <input type="checkbox" class="filter-checkbox">
                                        <span>Khóa vân tay</span>
                                    </span>
                                    <span class="filter-count">(12)</span>
                                </label>
                            </li>
                            <li>
                                <label class="filter-option">
                                    <span class="filter-left">
                                        <input type="checkbox" class="filter-checkbox">
                                        <span>Khóa thẻ từ</span>
                                    </span>
                                    <span class="filter-count">(8)</span>
                                </label>
                            </li>
                            <li>
                                <label class="filter-option">
                                    <span class="filter-left">
                                        <input type="checkbox" class="filter-checkbox">
                                        <span>Khóa mã số</span>
                                    </span>
                                    <span class="filter-count">(5)</span>
                                </label>
                            </li>
                            <li>
                                <label class="filter-option">
                                    <span class="filter-left">
                                        <input type="checkbox" class="filter-checkbox">
                                        <span>Khóa cửa kính</span>
                                    </span>
                                    <span class="filter-count">(4)</span>
                                </label>
                            </li>
                            <li>
                                <label class="filter-option">
                                    <span class="filter-left">
                                        <input type="checkbox" class="filter-checkbox">
                                        <span>Phụ kiện khóa</span>
                                    </span>
                                    <span class="filter-count">(3)</span>
                                </label>
                            </li>
                        </ul>
                    </div>

                    <div class="sidebar-widget">
                        <h4 class="sidebar-title">Khoảng giá</h4>
                        <ul class="category-list">
                            <li>
                                <label class="filter-option">
                                    <span class="filter-left">
                                        <input type="checkbox" class="filter-checkbox">
                                        <span>Dưới 2 triệu</span>
                                    </span>
                                </label>
                            </li>
                            <li>
                                <label class="filter-option">
                                    <span class="filter-left">
                                        <input type="checkbox" class="filter-checkbox">
                                        <span>Từ 2 - 5 triệu</span>
                                    </span>
                                </label>
                            </li>
                            <li>
                                <label class="filter-option">
                                    <span class="filter-left">
                                        <input type="checkbox" class="filter-checkbox">
                                        <span>Từ 5 - 10 triệu</span>
                                    </span>
                                </label>
                            </li>
                            <li>
                                <label class="filter-option">
                                    <span class="filter-left">
                                        <input type="checkbox" class="filter-checkbox">
                                        <span>Trên 10 triệu</span>
                                    </span>
                                </label>
                            </li>
                        </ul>
                    </div>

                    <div class="sidebar-actions">
                        <button type="button" class="btn-filter btn-filter-primary">
                            Tìm kiếm
                        </button>
                        <button type="button" class="btn-filter btn-filter-outline" id="btn-clear-filters">
                            Xóa lọc
                        </button>
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
                                <div class="product-item">
                                    <a href="{{ route('product.detail', $product['slug']) }}" class="product-card-image-link">
                                        <img src="{{ $product['image'] }}" class="img-fluid product-thumbnail"
                                             onerror="this.src='{{ asset('furni/images/product-1.png') }}'">
                                    </a>
                                    <h3 class="product-title">{{ $product['name'] }}</h3>
                                    <strong class="product-price">{{ $product['price'] }}</strong>

                                    <div class="product-card-actions">
                                        <a class="btn-card-action btn-card-detail" href="{{ route('product.detail', $product['slug']) }}">
                                            Chi tiết
                                        </a>
                                        <button type="button"
                                                class="btn-card-action btn-card-cart"
                                                data-name="{{ $product['name'] }}"
                                                data-price="{{ $product['price'] }}"
                                                data-image="{{ $product['image'] }}"
                                                onclick="addToCart(this);">
                                            Thêm giỏ hàng
                                        </button>
                                    </div>
                                </div>
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
        window.gemlockProductConfig = {
            cartAddUrl: '{{ route('cart.add') }}',
            csrfToken: '{{ csrf_token() }}'
        };
    </script>
    <script src="{{ asset('js/gemlock-product.js') }}"></script>
@endpush

