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

        .hero-checkout {
            background-image: url('https://gemcorp.vn/images/BN02.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 400px;
            display: flex;
            align-items: center;
            position: relative;
        }

        .hero-checkout::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.3);
        }

        .hero-checkout .container {
            position: relative;
            z-index: 1;
        }

        .hero-checkout h1,
        .hero-checkout p {
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

        .qr-checkout-image {
            width: 100%;
            max-width: 280px;
            margin: 12px auto;
            display: block;
        }

        .qr-checkout-amount {
            font-size: 18px;
            font-weight: 700;
            color: #111;
            margin-bottom: 12px;
        }

        .qr-checkout-note {
            font-size: 14px;
            color: #555;
        }
    </style>
@endpush

@section('content')
    <!-- Start Hero Section -->
    <div class="hero hero-checkout">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="intro-excerpt">
                        <h1>Thanh toán</h1>
                        <p class="mb-4">Hoàn tất thông tin và chọn phương thức thanh toán</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Hero Section -->

    <div class="untree_co-section before-footer-section">
        <div class="container">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="{{ route('cart.checkout.process') }}">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-5 mb-md-0">
                        <h2 class="h3 mb-3 text-black">Thông tin thanh toán</h2>
                        <div class="p-3 p-lg-5 border bg-white">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="full_name" class="text-black">Họ và tên <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="full_name" name="full_name"
                                        value="{{ old('full_name') }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="phone" class="text-black">Số điện thoại <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="phone" name="phone"
                                        value="{{ old('phone') }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="text-black">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ old('email') }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="address" class="text-black">Địa chỉ nhận hàng <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="address" name="address"
                                        value="{{ old('address') }}" placeholder="Số nhà, đường, phường/xã, quận/huyện"
                                        required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="note" class="text-black">Ghi chú đơn hàng</label>
                                <textarea name="note" id="note" cols="30" rows="4" class="form-control"
                                    placeholder="Ví dụ: giao giờ hành chính, gọi trước khi giao">{{ old('note') }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="row mb-5">
                            <div class="col-md-12">
                                <h2 class="h3 mb-3 text-black">Đơn hàng của bạn</h2>
                                <div class="p-3 p-lg-5 border bg-white">
                                    <table class="table site-block-order-table mb-5">
                                        <thead>
                                            <th>Sản phẩm</th>
                                            <th>Thành tiền</th>
                                        </thead>
                                        <tbody>
                                            @if (!empty($cart))
                                                @foreach ($cart as $item)
                                                    @php
                                                        $priceValue = preg_replace('/[^\d]/', '', $item['price']);
                                                        $price = is_numeric($priceValue) ? (float) $priceValue : 0;
                                                        $lineTotal = $price * $item['quantity'];
                                                    @endphp
                                                    <tr>
                                                        <td>{{ $item['name'] }} <strong class="mx-2">x</strong>
                                                            {{ $item['quantity'] }}</td>
                                                        <td>{{ number_format($lineTotal, 0, ',', '.') }}₫</td>
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td class="text-black font-weight-bold"><strong>Tạm tính</strong></td>
                                                    <td class="text-black">
                                                        {{ number_format($total, 0, ',', '.') }}₫
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-black font-weight-bold"><strong>Tổng cộng</strong></td>
                                                    <td class="text-black font-weight-bold">
                                                        <strong>{{ number_format($total, 0, ',', '.') }}₫</strong>
                                                    </td>
                                                </tr>
                                            @else
                                                <tr>
                                                    <td colspan="2" class="text-center">Giỏ hàng của bạn đang trống.</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>

                                    <div class="border p-3 mb-3">
                                        <h3 class="h6 mb-0">
                                            <a class="d-block" data-bs-toggle="collapse" href="#collapseqr" role="button"
                                                aria-expanded="false" aria-controls="collapseqr">Thanh toán QR</a>
                                        </h3>
                                        <div class="collapse" id="collapseqr">
                                            <div class="py-2">
                                                <p class="qr-checkout-note mb-2">Quét mã QR bên dưới bằng ứng dụng ngân hàng
                                                    hoặc ví điện tử.</p>
                                                <img class="qr-checkout-image" src="https://gemcorp.vn/images/gemlock_qr.jpg"
                                                    alt="Mã QR thanh toán Gemlock" loading="lazy">
                                                <div class="qr-checkout-amount">Số tiền cần thanh toán:
                                                    {{ number_format($total, 0, ',', '.') }}₫</div>
                                                <button class="btn btn-black btn-lg py-3 btn-block" type="submit"
                                                    name="payment_method" value="qr">Tôi đã thanh toán</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="border p-3 mb-3">
                                        <h3 class="h6 mb-0">
                                            <a class="d-block" data-bs-toggle="collapse" href="#collapsecod" role="button"
                                                aria-expanded="false" aria-controls="collapsecod">Thanh toán khi nhận hàng
                                                (COD)</a>
                                        </h3>
                                        <div class="collapse" id="collapsecod">
                                            <div class="py-2">
                                                <p class="mb-2 qr-checkout-note">Thanh toán bằng tiền mặt khi nhận hàng.</p>
                                                <button class="btn btn-black btn-lg py-3 btn-block" type="submit"
                                                    name="payment_method" value="cod">Đặt hàng (COD)</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="border p-3 mb-5">
                                        <h3 class="h6 mb-0">
                                            <a class="d-block" data-bs-toggle="collapse" href="#collapsebank" role="button"
                                                aria-expanded="false" aria-controls="collapsebank">Chuyển khoản ngân hàng</a>
                                        </h3>
                                        <div class="collapse" id="collapsebank">
                                            <div class="py-2">
                                                <p class="mb-2 qr-checkout-note">Nhân viên sẽ liên hệ và gửi thông tin tài khoản
                                                    để bạn chuyển khoản.</p>
                                                <button class="btn btn-black btn-lg py-3 btn-block" type="submit"
                                                    name="payment_method" value="bank">Đặt hàng (Chuyển khoản)</button>
                                            </div>
                                        </div>
                                    </div>

                                    @if (empty($cart))
                                        <a class="btn btn-outline-black btn-lg py-3 btn-block" href="{{ url('/gemlock/product') }}">Quay
                                            lại mua sắm</a>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('furni/js/bootstrap.bundle.min.js') }}"></script>
@endpush
