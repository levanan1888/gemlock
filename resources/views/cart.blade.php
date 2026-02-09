@extends('layouts.app')

@push('styles')
    <link href="{{ asset('furni/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('furni/css/tiny-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('furni/css/style.css') }}" rel="stylesheet">
    <style>
        .before-footer-section {
            padding-top: 100px;
        }

        /* Full-width banner styling */
        .hero-cart {
            background-image: url('https://gemcorp.vn/images/BN02.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 400px;
            display: flex;
            align-items: center;
            position: relative;
        }

        .hero-cart::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.3);
        }

        .hero-cart .container {
            position: relative;
            z-index: 1;
        }

        .hero-cart h1,
        .hero-cart p {
            color: #fff;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .btn,
        .btn-black,
        .btn-outline-black {
            border-radius: 0 !important;
        }

        .btn-black {
            background-color: var(--brand-yellow);
            border-color: var(--brand-yellow);
            color: var(--brand-text-on-yellow);
        }

        .btn-black:hover,
        .btn-black:focus {
            background-color: var(--brand-yellow-dark);
            border-color: var(--brand-yellow-dark);
            color: var(--brand-text-on-yellow);
        }

        .btn-outline-black {
            border-color: var(--brand-yellow);
            color: var(--brand-yellow-dark);
        }

        .btn-outline-black:hover,
        .btn-outline-black:focus {
            background-color: var(--brand-yellow);
            border-color: var(--brand-yellow);
            color: var(--brand-text-on-yellow);
        }

        .related-products-section {
            padding-top: 20px;
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

    </style>
@endpush

@section('content')
    @include('partials.header')

    <!-- Start Hero Section -->
    <div class="hero hero-cart">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="intro-excerpt">
                        <h1>Giỏ hàng</h1>
                        <p class="mb-4">Xem lại các sản phẩm bạn đã chọn</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Hero Section -->

    <div class="untree_co-section before-footer-section">
        <div class="container">
            @if (session('checkout_success'))
                <div class="alert alert-success">{{ session('checkout_success') }}</div>
            @endif
            @if (session('checkout_error'))
                <div class="alert alert-danger">{{ session('checkout_error') }}</div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="row mb-5">
                <form class="col-md-12" method="post">
                    <div class="site-blocks-table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">Ảnh</th>
                                    <th class="product-name">Sản phẩm</th>
                                    <th class="product-price">Giá</th>
                                    <th class="product-quantity">Số lượng</th>
                                    <th class="product-total">Thành tiền</th>
                                    <th class="product-remove">Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($cart))
                                    @foreach($cart as $id => $details)
                                        <tr data-id="{{ $id }}">
                                            <td class="product-thumbnail">
                                                <img src="{{ $details['image'] }}" alt="Ảnh sản phẩm" class="img-fluid">
                                            </td>
                                            <td class="product-name">
                                                <h2 class="h5 text-black">{{ $details['name'] }}</h2>
                                            </td>
                                            <td>{{ $details['price'] }}</td>
                                            <td>
                                                <div class="input-group mb-3 d-flex align-items-center quantity-container"
                                                    style="max-width: 120px;">
                                                    <div class="input-group-prepend">
                                                        <button class="btn btn-outline-black decrease"
                                                            type="button">&minus;</button>
                                                    </div>
                                                    <input type="text" class="form-control text-center quantity-amount"
                                                        value="{{ $details['quantity'] }}" placeholder=""
                                                        aria-label="Số lượng"
                                                        aria-describedby="button-addon1">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-outline-black increase" type="button">&plus;</button>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                @php
                                                    $priceValue = preg_replace('/[^\d]/', '', $details['price']);
                                                    $price = is_numeric($priceValue) ? (float) $priceValue : 0;
                                                    $lineTotal = $price * $details['quantity'];
                                                @endphp
                                                {{ number_format($lineTotal, 0, ',', '.') }}₫
                                            </td>
                                            <td>
                                                <button class="btn btn-black btn-sm remove-from-cart" data-id="{{ $id }}" aria-label="Xóa"
                                                    title="Xóa">X</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6" class="text-center">Giỏ hàng của bạn đang trống.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="row mb-5">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <button class="btn btn-black btn-sm btn-block" type="button">Cập nhật giỏ hàng</button>
                        </div>
                        <div class="col-md-6">
                            <a class="btn btn-outline-black btn-sm btn-block" href="{{ url('/product') }}">Tiếp tục mua sắm</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label class="text-black h4" for="coupon">Mã ưu đãi</label>
                            <p>Nhập mã ưu đãi nếu bạn có.</p>
                        </div>
                        <div class="col-md-8 mb-3 mb-md-0">
                            <input type="text" class="form-control py-3" id="coupon" placeholder="Mã ưu đãi">
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-black" type="button">Áp dụng</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 pl-5">
                    <div class="row justify-content-end">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-12 text-right border-bottom mb-5">
                                    <h3 class="text-black h4 text-uppercase">Tổng thanh toán</h3>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <span class="text-black">Tạm tính</span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <strong class="text-black">{{ number_format($total, 0, ',', '.') }}₫</strong>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col-md-6">
                                    <span class="text-black">Tổng cộng</span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <strong class="text-black">{{ number_format($total, 0, ',', '.') }}₫</strong>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <a class="btn btn-black btn-lg py-3 btn-block" href="{{ route('cart.checkout') }}">Thanh
                                        toán</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(!empty($relatedProducts))
        <div class="untree_co-section product-section related-products-section">
            <div class="container">
                <div class="row mb-4 align-items-center">
                    <div class="col-md-8">
                        <h2 class="text-black">Sản phẩm liên quan</h2>
                    </div>
                    <div class="col-md-4 text-md-right">
                        <a class="btn btn-outline-black btn-sm" href="{{ url('/product') }}">Xem tất cả</a>
                    </div>
                </div>
                <div class="row">
                    @foreach(array_slice($relatedProducts, 0, 4) as $product)
                        <div class="col-12 col-md-6 col-lg-3 mb-5">
                            <a class="product-item" href="{{ route('product.detail', $product['slug']) }}">
                                <img src="{{ $product['image'] }}" class="img-fluid product-thumbnail"
                                    onerror="this.src='{{ asset('furni/images/product-1.png') }}'">
                                <h3 class="product-title">{{ $product['name'] }}</h3>
                                <strong class="product-price">{{ $product['price'] }}</strong>
                                <span class="icon-cross add-to-cart-btn" data-name="{{ $product['name'] }}"
                                    data-price="{{ $product['price'] }}" data-image="{{ $product['image'] }}"
                                    onclick="event.preventDefault(); addToCart(this);">
                                    <img src="{{ asset('furni/images/cross.svg') }}" class="img-fluid" alt="Thêm vào giỏ">
                                </span>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const removeButtons = document.querySelectorAll('.remove-from-cart');

            removeButtons.forEach(button => {
                button.addEventListener('click', function (e) {
                    e.preventDefault();

                    if (confirm("Bạn có chắc chắn muốn xóa sản phẩm này?")) {
                        const id = this.getAttribute('data-id');
                        const row = this.closest('tr');

                        fetch('{{ route('cart.remove') }}', {
                            method: 'DELETE',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                id: id
                            })
                        })
                            .then(response => {
                                window.location.reload();
                            });
                    }
                });
            });
        });

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
                .then(response => response.json())
                .then(data => {
                    const cartCount = document.querySelector('.cart-quantity');
                    if (cartCount) {
                        const countValue = data.cart_count || 0;
                        cartCount.textContent = countValue;
                        cartCount.classList.toggle('is-empty', countValue < 1);
                    }
                    window.location.reload();
                })
                .catch(error => console.error('Error:', error));
        }
    </script>
@endpush
@endpush