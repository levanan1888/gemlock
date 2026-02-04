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

        /* Video Thumbnail */
        .thumbnail-item.video-thumb {
            background: linear-gradient(135deg, #f9bf29 0%, #D4A800 100%);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .video-thumb-inner {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: #1a1000;
            gap: 4px;
        }
        .video-thumb-inner i {
            font-size: 24px;
        }
        .video-thumb-inner span {
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
        }
        .thumbnail-item.video-thumb:hover {
            border-color: #1a1000;
            transform: scale(1.05);
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
            min-width: 180px;
            text-align: center;
            box-shadow: 0 4px 15px rgba(59, 93, 80, 0.35);
        }

        .btn-buy:hover {
            background: var(--text-dark);
            transform: scale(1.02);
            box-shadow: 0 6px 20px rgba(59, 93, 80, 0.45);
        }

        .btn-video {
            flex: 1;
            background: linear-gradient(135deg, #f9bf29 0%, #D4A800 100%);
            color: #1a1000;
            border: none;
            padding: 15px 30px;
            border-radius: 50px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: .3s;
            cursor: pointer;
            box-shadow: 0 4px 15px rgba(212, 168, 0, 0.35);
            min-width: 180px;
            text-align: center;
        }
        .btn-video:hover {
            background: linear-gradient(135deg, #D4A800 0%, #B8860B 100%);
            transform: scale(1.02);
            box-shadow: 0 6px 20px rgba(212, 168, 0, 0.45);
        }

        /* Video Popup Modal */
        #videoPopup {
            display: none;
            position: fixed;
            z-index: 3000;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.9);
            justify-content: center;
            align-items: center;
        }
        #videoPopup.active {
            display: flex;
        }
        .video-popup-content {
            position: relative;
            width: 90%;
            max-width: 400px;
            aspect-ratio: 9/16;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0,0,0,0.5);
        }
        .video-popup-content iframe {
            width: 100%;
            height: 100%;
            border: none;
        }
        .video-popup-close {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 50px;
            height: 50px;
            background: rgba(255,255,255,0.2);
            border: none;
            border-radius: 50%;
            color: #fff;
            font-size: 24px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 3001;
        }
        .video-popup-close:hover {
            background: var(--accent-color);
            transform: rotate(90deg);
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

        /* Related Products - Modern Card Style */
        .related-section {
            background: #f8f9fa;
            padding: 60px 0;
            margin: 0 -15px;
            padding-left: 15px;
            padding-right: 15px;
            border-radius: 30px;
        }

        .related-product-card {
            background: #fff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0,0,0,0.06);
            transition: all 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .related-product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 40px rgba(0,0,0,0.12);
        }

        .related-product-link {
            text-decoration: none;
            color: inherit;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .related-product-img-wrap {
            position: relative;
            background: linear-gradient(135deg, #f5f7fa 0%, #e8edf2 100%);
            padding: 20px;
            height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .related-product-img {
            max-width: 100%;
            max-height: 160px;
            object-fit: contain;
            transition: transform 0.5s ease;
        }

        .related-product-card:hover .related-product-img {
            transform: scale(1.1);
        }

        .related-product-badge {
            position: absolute;
            top: 12px;
            left: 12px;
            background: linear-gradient(135deg, #ff6b6b 0%, #ee5a5a 100%);
            color: #fff;
            font-size: 10px;
            font-weight: 700;
            padding: 4px 10px;
            border-radius: 20px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .quick-view-btn {
            position: absolute;
            top: 12px;
            right: 12px;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: rgba(255,255,255,0.9);
            border: none;
            color: var(--text-dark);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            opacity: 0;
            transform: translateY(-10px);
            transition: all 0.3s ease;
        }

        .related-product-card:hover .quick-view-btn {
            opacity: 1;
            transform: translateY(0);
        }

        .quick-view-btn:hover {
            background: var(--accent-color);
            color: #fff;
        }

        .related-product-info {
            padding: 20px;
            text-align: center;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .related-product-brand {
            font-size: 10px;
            font-weight: 700;
            color: var(--accent-color);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 8px;
        }

        .related-product-name {
            font-size: 14px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 10px;
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            min-height: 40px;
        }

        .related-product-rating {
            color: #ffc107;
            font-size: 12px;
            margin-bottom: 10px;
        }

        .related-product-rating span {
            color: var(--text-muted);
            font-size: 11px;
            margin-left: 5px;
        }

        .related-product-price {
            font-size: 18px;
            font-weight: 800;
            color: var(--primary-color);
            margin-top: auto;
        }

        .related-product-actions {
            display: flex;
            gap: 8px;
            padding: 0 15px 15px;
        }

        .btn-add-cart {
            flex: 1;
            background: var(--primary-color);
            color: #fff;
            border: none;
            padding: 12px 15px;
            border-radius: 10px;
            font-size: 12px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }

        .btn-add-cart:hover {
            background: var(--text-dark);
            transform: scale(1.02);
        }

        .btn-view-detail {
            padding: 12px 18px;
            border: 2px solid #eee;
            border-radius: 10px;
            font-size: 12px;
            font-weight: 700;
            color: var(--text-muted);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-view-detail:hover {
            border-color: var(--accent-color);
            color: var(--accent-color);
        }

        /* Quick View Modal */
        .quick-view-modal {
            display: none;
            position: fixed;
            z-index: 3000;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.85);
            justify-content: center;
            align-items: center;
            cursor: zoom-out;
        }

        .quick-view-modal.active {
            display: flex;
        }

        .quick-view-modal img {
            max-width: 80%;
            max-height: 80%;
            object-fit: contain;
            border-radius: 10px;
            animation: zoomIn 0.3s ease;
        }

        .quick-view-close {
            position: absolute;
            top: 30px;
            right: 30px;
            color: #fff;
            font-size: 40px;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .quick-view-close:hover {
            transform: rotate(90deg);
        }

        /* Fly to Cart Animation */
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
            animation: flyToCart 0.8s ease-in-out forwards;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }

        /* Cart shake animation */
        @keyframes cartShake {
            0%, 100% { transform: rotate(0deg); }
            25% { transform: rotate(-15deg); }
            50% { transform: rotate(15deg); }
            75% { transform: rotate(-10deg); }
        }

        .cart-shake {
            animation: cartShake 0.5s ease-in-out;
        }

        /* Success toast */
        .toast-success {
            position: fixed;
            top: 100px;
            right: 30px;
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            color: #fff;
            padding: 15px 25px;
            border-radius: 10px;
            font-weight: 600;
            box-shadow: 0 10px 30px rgba(40, 167, 69, 0.3);
            z-index: 9999;
            transform: translateX(120%);
            transition: transform 0.4s ease;
        }

        .toast-success.show {
            transform: translateX(0);
        }

        .toast-success i {
            margin-right: 10px;
        }

        /* Video Section - Removed, using popup instead */

        /* Reviews Section */
        .reviews-section {
            background: #fff;
        }
        .rating-breakdown {
            background: #f8f9fa;
            padding: 25px;
            border-radius: 15px;
        }
        .rating-label {
            width: 50px;
            font-size: 13px;
            color: #666;
        }
        .rating-bar {
            height: 8px;
            background: #e9ecef;
            border-radius: 4px;
            overflow: hidden;
        }
        .rating-fill {
            height: 100%;
            background: linear-gradient(90deg, #ffc107, #ffca2c);
            border-radius: 4px;
        }
        .rating-count {
            width: 30px;
            text-align: right;
            font-size: 13px;
            color: #666;
        }
        .review-item {
            padding: 25px 0;
            border-bottom: 1px solid #eee;
        }
        .review-item:last-child {
            border-bottom: none;
        }
        .review-header {
            display: flex;
            gap: 15px;
            margin-bottom: 15px;
        }
        .review-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            overflow: hidden;
            flex-shrink: 0;
        }
        .review-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .reviewer-name {
            font-size: 15px;
            font-weight: 700;
            margin-bottom: 3px;
            color: var(--text-dark);
        }
        .review-stars {
            font-size: 12px;
        }
        .review-date {
            font-size: 12px;
        }
        .verified-badge {
            font-size: 11px;
            color: #28a745;
            background: rgba(40, 167, 69, 0.1);
            padding: 3px 8px;
            border-radius: 20px;
        }
        .review-content p {
            color: #555;
            line-height: 1.7;
            margin-bottom: 15px;
        }
        .review-images {
            display: flex;
            gap: 10px;
        }
        .review-images img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 8px;
            cursor: pointer;
            transition: transform 0.3s ease;
        }
        .review-images img:hover {
            transform: scale(1.1);
        }
        .review-actions {
            display: flex;
            gap: 15px;
        }
        .btn-helpful, .btn-reply {
            background: none;
            border: 1px solid #ddd;
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 13px;
            color: #666;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .btn-helpful:hover, .btn-reply:hover {
            border-color: var(--accent-color);
            color: var(--accent-color);
        }

        /* Related Products - Sync with /product page */
        .related-products-wrapper {
            background: #f8f9fa;
            padding: 40px;
            border-radius: 20px;
            margin: 0 -15px;
        }
        .related-products-wrapper .product-item {
            text-align: center;
            text-decoration: none;
            display: block;
            position: relative;
            padding: 30px;
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            transition: .3s all ease;
        }
        .related-products-wrapper .product-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.1);
        }
        .related-products-wrapper .product-thumbnail {
            height: 200px;
            object-fit: contain;
            width: 100%;
            margin-bottom: 20px;
            transition: .3s all ease;
        }
        .related-products-wrapper .product-item:hover .product-thumbnail {
            transform: translateY(-10px);
        }
        .related-products-wrapper .product-title {
            font-size: 15px;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 10px;
            min-height: 40px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .related-products-wrapper .product-price {
            font-size: 18px;
            font-weight: 800;
            color: var(--primary-color);
            display: block;
        }
        .related-products-wrapper .icon-cross {
            position: absolute;
            width: 35px;
            height: 35px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: var(--text-dark);
            bottom: 15px;
            left: 50%;
            transform: translateX(-50%);
            margin-bottom: -17.5px;
            border-radius: 50%;
            opacity: 0;
            visibility: hidden;
            transition: .3s all ease;
            cursor: pointer;
        }
        .related-products-wrapper .icon-cross img {
            width: 14px;
            height: 14px;
            filter: brightness(0) invert(1);
        }
        .related-products-wrapper .product-item:hover .icon-cross {
            bottom: 0;
            opacity: 1;
            visibility: visible;
        }
        .related-products-wrapper .product-item:before {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: #fdf2cc;
            height: 0%;
            z-index: -1;
            border-radius: 10px;
            transition: .3s all ease;
        }
        .related-products-wrapper .product-item:hover:before {
            height: 70%;
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
                        <!-- Video Thumbnail -->
                        <div class="thumbnail-item video-thumb" onclick="openVideoPopup()">
                            <div class="video-thumb-inner">
                                <i class="fas fa-play-circle"></i>
                                <span>Video</span>
                            </div>
                        </div>
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

                        <div class="d-flex align-items-center flex-wrap gap-3 mb-5">
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

            <!-- Customer Reviews Section -->
            <div class="reviews-section mt-5 pt-5">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h2 class="fw-bold mb-1">Đánh giá từ khách hàng</h2>
                        <div class="d-flex align-items-center gap-3">
                            <div class="review-summary-stars text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <span class="fw-bold">4.8/5</span>
                            <span class="text-muted">(128 đánh giá)</span>
                        </div>
                    </div>
                    <button class="btn btn-outline-primary" onclick="openReviewForm()">
                        <i class="fas fa-pen me-2"></i>Viết đánh giá
                    </button>
                </div>

                <!-- Rating Breakdown -->
                <div class="rating-breakdown mb-4">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="rating-bar-item d-flex align-items-center gap-2 mb-2">
                                <span class="rating-label">5 sao</span>
                                <div class="rating-bar flex-grow-1"><div class="rating-fill" style="width: 75%;"></div></div>
                                <span class="rating-count">96</span>
                            </div>
                            <div class="rating-bar-item d-flex align-items-center gap-2 mb-2">
                                <span class="rating-label">4 sao</span>
                                <div class="rating-bar flex-grow-1"><div class="rating-fill" style="width: 15%;"></div></div>
                                <span class="rating-count">19</span>
                            </div>
                            <div class="rating-bar-item d-flex align-items-center gap-2 mb-2">
                                <span class="rating-label">3 sao</span>
                                <div class="rating-bar flex-grow-1"><div class="rating-fill" style="width: 7%;"></div></div>
                                <span class="rating-count">9</span>
                            </div>
                            <div class="rating-bar-item d-flex align-items-center gap-2 mb-2">
                                <span class="rating-label">2 sao</span>
                                <div class="rating-bar flex-grow-1"><div class="rating-fill" style="width: 2%;"></div></div>
                                <span class="rating-count">3</span>
                            </div>
                            <div class="rating-bar-item d-flex align-items-center gap-2">
                                <span class="rating-label">1 sao</span>
                                <div class="rating-bar flex-grow-1"><div class="rating-fill" style="width: 1%;"></div></div>
                                <span class="rating-count">1</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Review List -->
                <div class="review-list">
                    <div class="review-item">
                        <div class="review-header">
                            <div class="review-avatar">
                                <img src="{{ asset('furni/images/person_1.jpg') }}" alt="Avatar">
                            </div>
                            <div class="review-meta">
                                <h5 class="reviewer-name">Nguyễn Văn An</h5>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="review-stars text-warning">
                                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                    </div>
                                    <span class="review-date text-muted">20/01/2026</span>
                                    <span class="verified-badge"><i class="fas fa-check-circle"></i> Đã mua hàng</span>
                                </div>
                            </div>
                        </div>
                        <div class="review-content">
                            <p>Khóa rất tốt, lắp đặt dễ dàng và hoạt động mượt mà. Tính năng vân tay nhận diện nhanh, chỉ khoảng 0.3 giây. Rất hài lòng với sản phẩm này!</p>
                            <div class="review-images">
                                <img src="{{ $product['image'] }}" alt="Review image" onclick="openQuickView('{{ $product['image'] }}')">
                            </div>
                        </div>
                        <div class="review-actions">
                            <button class="btn-helpful"><i class="far fa-thumbs-up"></i> Hữu ích (24)</button>
                            <button class="btn-reply"><i class="far fa-comment"></i> Trả lời</button>
                        </div>
                    </div>

                    <div class="review-item">
                        <div class="review-header">
                            <div class="review-avatar">
                                <img src="{{ asset('furni/images/person_2.jpg') }}" alt="Avatar">
                            </div>
                            <div class="review-meta">
                                <h5 class="reviewer-name">Trần Thị Hương</h5>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="review-stars text-warning">
                                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                                    </div>
                                    <span class="review-date text-muted">15/01/2026</span>
                                    <span class="verified-badge"><i class="fas fa-check-circle"></i> Đã mua hàng</span>
                                </div>
                            </div>
                        </div>
                        <div class="review-content">
                            <p>Sản phẩm chất lượng cao, đóng gói cẩn thận. Đội ngũ lắp đặt chuyên nghiệp, hướng dẫn sử dụng tận tình. Khóa hoạt động êm ái, thiết kế sang trọng phù hợp với nội thất nhà mình.</p>
                        </div>
                        <div class="review-actions">
                            <button class="btn-helpful"><i class="far fa-thumbs-up"></i> Hữu ích (18)</button>
                            <button class="btn-reply"><i class="far fa-comment"></i> Trả lời</button>
                        </div>
                    </div>

                    <div class="review-item">
                        <div class="review-header">
                            <div class="review-avatar">
                                <img src="{{ asset('furni/images/person_3.jpg') }}" alt="Avatar">
                            </div>
                            <div class="review-meta">
                                <h5 class="reviewer-name">Lê Minh Tuấn</h5>
                                <div class="d-flex align-items-center gap-2">
                                    <div class="review-stars text-warning">
                                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
                                    </div>
                                    <span class="review-date text-muted">10/01/2026</span>
                                    <span class="verified-badge"><i class="fas fa-check-circle"></i> Đã mua hàng</span>
                                </div>
                            </div>
                        </div>
                        <div class="review-content">
                            <p>Khóa đẹp, chất lượng tốt. Tuy nhiên pin hơi nhanh hết khi sử dụng thường xuyên. Dịch vụ hỗ trợ kỹ thuật rất nhiệt tình.</p>
                        </div>
                        <div class="review-actions">
                            <button class="btn-helpful"><i class="far fa-thumbs-up"></i> Hữu ích (12)</button>
                            <button class="btn-reply"><i class="far fa-comment"></i> Trả lời</button>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <button class="btn btn-outline-secondary px-5">Xem thêm đánh giá</button>
                </div>
            </div>

            <!-- Related Products - Synced with /product page -->
            <div class="related-products-wrapper mt-5 pt-5">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="fw-bold">Sản phẩm liên quan</h2>
                    <a href="{{ url('/product') }}" class="text-primary fw-bold text-decoration-none">Xem tất cả <i class="fas fa-arrow-right ms-2"></i></a>
                </div>
                <div class="row">
                    @php $count = 0; @endphp
                    @foreach($relatedProducts as $p)
                        @if($p['slug'] !== $product['slug'] && $count < 4)
                        @php $count++; @endphp
                        <div class="col-12 col-md-6 col-lg-3 mb-4">
                            <a class="product-item" href="{{ route('product.detail', $p['slug']) }}">
                                <img src="{{ $p['image'] }}" class="img-fluid product-thumbnail"
                                    onerror="this.src='{{ asset('furni/images/product-1.png') }}'">
                                <h3 class="product-title">{{ $p['name'] }}</h3>
                                <strong class="product-price">{{ $p['price'] }}</strong>
                                <span class="icon-cross add-to-cart-btn" 
                                    data-name="{{ $p['name'] }}"
                                    data-price="{{ $p['price'] }}" 
                                    data-image="{{ $p['image'] }}"
                                    onclick="event.preventDefault(); event.stopPropagation(); addToCartWithFly(this);">
                                    <img src="{{ asset('furni/images/cross.svg') }}" class="img-fluid">
                                </span>
                            </a>
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>
            
            <!-- Quick View Modal -->
            <div id="quickViewModal" class="quick-view-modal" onclick="closeQuickView()">
                <span class="quick-view-close">&times;</span>
                <img id="quickViewImg" src="" onclick="event.stopPropagation()">
            </div>
            
            <!-- Video Popup Modal -->
            <div id="videoPopup" onclick="closeVideoPopup()">
                <button class="video-popup-close" onclick="closeVideoPopup()">
                    <i class="fas fa-times"></i>
                </button>
                <div class="video-popup-content" onclick="event.stopPropagation()">
                    <iframe id="videoFrame" src="" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
            const btn = document.querySelector('.btn-buy');
            
            // Disable button while processing
            btn.disabled = true;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> ĐANG THÊM...';
            
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
                // Update cart count
                const cartCount = document.querySelector('.cart-quantity');
                if (cartCount) {
                    const countValue = data.cart_count || 0;
                    cartCount.textContent = countValue;
                    cartCount.classList.toggle('is-empty', countValue < 1);
                    
                    // Shake cart icon
                    const cartIcon = document.querySelector('.header-cart');
                    if (cartIcon) {
                        cartIcon.classList.add('cart-shake');
                        setTimeout(() => cartIcon.classList.remove('cart-shake'), 500);
                    }
                }
                
                // Show success toast
                showToast('Đã thêm ' + qty + ' sản phẩm vào giỏ hàng!');
                
                // Reset button
                btn.disabled = false;
                btn.innerHTML = '<i class="fas fa-shopping-cart me-2"></i> THÊM VÀO GIỎ HÀNG';
            })
            .catch(error => {
                console.error('Error:', error);
                btn.disabled = false;
                btn.innerHTML = '<i class="fas fa-shopping-cart me-2"></i> THÊM VÀO GIỎ HÀNG';
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

        // Add to cart with fly animation
        function addToCartWithFly(element) {
            const name = element.getAttribute('data-name');
            const price = element.getAttribute('data-price');
            const image = element.getAttribute('data-image');

            // Create flying image
            flyToCart(element, image);

            // Add to cart via AJAX
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
                // Update cart count after animation
                setTimeout(() => {
                    const cartCount = document.querySelector('.cart-quantity');
                    if (cartCount) {
                        const countValue = data.cart_count || 0;
                        cartCount.textContent = countValue;
                        cartCount.classList.toggle('is-empty', countValue < 1);
                        
                        // Shake cart icon
                        const cartIcon = document.querySelector('.header-cart');
                        if (cartIcon) {
                            cartIcon.classList.add('cart-shake');
                            setTimeout(() => cartIcon.classList.remove('cart-shake'), 500);
                        }
                    }
                    
                    // Show success toast
                    showToast('Đã thêm vào giỏ hàng!');
                }, 800);
            })
            .catch(error => console.error('Error:', error));
        }

        function flyToCart(element, imageUrl) {
            // Get cart icon position
            const cartIcon = document.querySelector('.header-cart') || document.querySelector('.cart-quantity');
            if (!cartIcon) return;

            // Create flying image
            const flyingImg = document.createElement('img');
            flyingImg.src = imageUrl;
            flyingImg.classList.add('flying-image');
            
            // Get button position
            const btnRect = element.getBoundingClientRect();
            const cartRect = cartIcon.getBoundingClientRect();

            // Set initial position & size
            flyingImg.style.left = btnRect.left + 'px';
            flyingImg.style.top = btnRect.top + 'px';
            flyingImg.style.width = '80px';
            flyingImg.style.height = '80px';
            flyingImg.style.objectFit = 'contain';
            flyingImg.style.background = '#fff';
            flyingImg.style.padding = '5px';

            // Calculate translation
            const deltaX = cartRect.left - btnRect.left;
            const deltaY = cartRect.top - btnRect.top;

            flyingImg.style.setProperty('--tx', deltaX + 'px');
            flyingImg.style.setProperty('--ty', deltaY + 'px');

            // Add to body
            document.body.appendChild(flyingImg);

            // Remove after animation
            setTimeout(() => flyingImg.remove(), 800);
        }

        function showToast(message) {
            // Remove existing toast
            const existingToast = document.querySelector('.toast-success');
            if (existingToast) existingToast.remove();

            // Create toast
            const toast = document.createElement('div');
            toast.className = 'toast-success';
            toast.innerHTML = '<i class="fas fa-check-circle"></i>' + message;
            document.body.appendChild(toast);

            // Show toast
            setTimeout(() => toast.classList.add('show'), 10);

            // Hide toast
            setTimeout(() => {
                toast.classList.remove('show');
                setTimeout(() => toast.remove(), 400);
            }, 3000);
        }

        // Quick View functions
        function openQuickView(imageUrl) {
            const modal = document.getElementById('quickViewModal');
            const img = document.getElementById('quickViewImg');
            img.src = imageUrl;
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeQuickView() {
            const modal = document.getElementById('quickViewModal');
            modal.classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        // Close on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeZoom();
                closeQuickView();
                closeVideoPopup();
            }
        });

        // Video Popup functions
        function openVideoPopup() {
            const popup = document.getElementById('videoPopup');
            const iframe = document.getElementById('videoFrame');
            // YouTube Shorts embed URL
            iframe.src = 'https://www.youtube.com/embed/yYfdfvos1lA?autoplay=1';
            popup.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeVideoPopup() {
            const popup = document.getElementById('videoPopup');
            const iframe = document.getElementById('videoFrame');
            popup.classList.remove('active');
            iframe.src = ''; // Stop video
            document.body.style.overflow = 'auto';
        }

        // Review form
        function openReviewForm() {
            const form = `
                <div id="reviewFormModal" style="position: fixed; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0,0,0,0.8); z-index: 3000; display: flex; align-items: center; justify-content: center; padding: 20px;">
                    <div style="background: #fff; border-radius: 20px; max-width: 500px; width: 100%; max-height: 90vh; overflow-y: auto; padding: 30px;">
                        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                            <h3 style="margin: 0; font-weight: 700;">Viết đánh giá</h3>
                            <button onclick="closeReviewForm()" style="background: none; border: none; font-size: 24px; cursor: pointer;">&times;</button>
                        </div>
                        <div style="margin-bottom: 20px;">
                            <label style="font-weight: 600; display: block; margin-bottom: 10px;">Đánh giá của bạn</label>
                            <div class="star-rating" style="font-size: 30px; color: #ddd;">
                                <i class="fas fa-star" onclick="setRating(1)" style="cursor: pointer;"></i>
                                <i class="fas fa-star" onclick="setRating(2)" style="cursor: pointer;"></i>
                                <i class="fas fa-star" onclick="setRating(3)" style="cursor: pointer;"></i>
                                <i class="fas fa-star" onclick="setRating(4)" style="cursor: pointer;"></i>
                                <i class="fas fa-star" onclick="setRating(5)" style="cursor: pointer;"></i>
                            </div>
                        </div>
                        <div style="margin-bottom: 20px;">
                            <label style="font-weight: 600; display: block; margin-bottom: 10px;">Tiêu đề</label>
                            <input type="text" placeholder="Tóm tắt đánh giá của bạn" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 10px;">
                        </div>
                        <div style="margin-bottom: 20px;">
                            <label style="font-weight: 600; display: block; margin-bottom: 10px;">Nội dung đánh giá</label>
                            <textarea placeholder="Chia sẻ trải nghiệm của bạn về sản phẩm..." rows="4" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 10px; resize: none;"></textarea>
                        </div>
                        <div style="margin-bottom: 20px;">
                            <label style="font-weight: 600; display: block; margin-bottom: 10px;">Thêm hình ảnh (tùy chọn)</label>
                            <div style="border: 2px dashed #ddd; padding: 30px; text-align: center; border-radius: 10px; cursor: pointer;">
                                <i class="fas fa-cloud-upload-alt" style="font-size: 30px; color: #999;"></i>
                                <p style="margin: 10px 0 0; color: #666;">Kéo thả hoặc click để upload</p>
                            </div>
                        </div>
                        <button onclick="submitReview()" style="width: 100%; background: var(--primary-color, #3b5d50); color: #fff; border: none; padding: 15px; border-radius: 10px; font-weight: 700; cursor: pointer;">Gửi đánh giá</button>
                    </div>
                </div>
            `;
            document.body.insertAdjacentHTML('beforeend', form);
            document.body.style.overflow = 'hidden';
        }

        function closeReviewForm() {
            const modal = document.getElementById('reviewFormModal');
            if (modal) {
                modal.remove();
                document.body.style.overflow = 'auto';
            }
        }

        let currentRating = 0;
        function setRating(rating) {
            currentRating = rating;
            const stars = document.querySelectorAll('.star-rating .fa-star');
            stars.forEach((star, index) => {
                star.style.color = index < rating ? '#ffc107' : '#ddd';
            });
        }

        function submitReview() {
            if (currentRating === 0) {
                alert('Vui lòng chọn số sao đánh giá!');
                return;
            }
            alert('Cảm ơn bạn đã gửi đánh giá! Đánh giá sẽ được hiển thị sau khi được duyệt.');
            closeReviewForm();
        }
    </script>
@endpush
