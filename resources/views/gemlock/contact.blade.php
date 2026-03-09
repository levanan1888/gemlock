@extends('gemlock.layouts.app')

@section('title', 'Liên hệ - Gemlock')
@section('body_class', 'contact-page')

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
        .contact-page .untree_co-section {
            padding: 3rem 0 4rem !important;
        }

        .contact-page .block {
            background: #fff;
            border-radius: 22px;
            padding: 30px;
            box-shadow: 0 18px 40px rgba(15, 23, 42, 0.08);
            border: 1px solid rgba(212, 168, 0, 0.18);
        }

        .contact-page .service.horizontal {
            background: #fffef7;
            border: 1px solid rgba(212, 168, 0, 0.25);
            border-radius: 16px;
            padding: 14px;
            min-height: 105px;
        }

        .contact-page .service .service-icon {
            width: 52px;
            height: 52px;
            border-radius: 12px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 0 !important;
            background: #2f6b54;
        }

        .contact-page .service .service-icon i {
            font-size: 18px;
            color: #fff;
        }

        .contact-page .service .service-contents p {
            margin: 0;
            color: #1f2937;
            line-height: 1.45;
        }

        .contact-page label.text-black {
            font-weight: 700;
            margin-bottom: 8px;
            color: #111827 !important;
        }

        .contact-page .form-control {
            min-height: 50px;
            border-radius: 12px;
            border: 1px solid #d6dbe1;
            box-shadow: none;
        }

        .contact-page textarea.form-control {
            min-height: 150px;
            resize: vertical;
        }

        .contact-page .form-control:focus {
            border-color: var(--brand-yellow, #e3bf35);
            box-shadow: 0 0 0 4px rgba(227, 191, 53, 0.18);
        }

        .contact-page .btn.btn-primary-hover-outline {
            background: var(--brand-yellow, #e3bf35);
            color: #1a1000;
            border-color: var(--brand-yellow, #e3bf35);
            font-weight: 700;
            border-radius: 999px;
            padding: 12px 28px;
        }

        .contact-page .btn.btn-primary-hover-outline:hover {
            background: var(--brand-yellow-dark, #c4a12d);
            border-color: var(--brand-yellow-dark, #c4a12d);
            color: #1a1000;
        }

        @media (max-width: 768px) {
            .contact-page .block {
                padding: 18px;
                border-radius: 16px;
            }

            .contact-page .service.horizontal {
                margin-bottom: 12px;
            }

            .contact-page form .col-6 {
                width: 100%;
            }
        }
    </style>
@endpush

@section('page_content')
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1>Liên hệ</h1>
                        <p class="mb-4">
                            Bạn cần tư vấn về khóa thông minh Gemlock hoặc giải pháp cho dự án?
                            Hãy để lại thông tin, đội ngũ Gemlock sẽ phản hồi sớm nhất.
                        </p>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="hero-img-wrap">
                        <img src="{{ asset('furni/images/couch.png') }}" class="img-fluid" alt="Contact hero">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="untree_co-section">
        <div class="container">
            <div class="block">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-8 pb-4">
                        <div class="row mb-5">
                            <div class="col-lg-4">
                                <div class="service no-shadow align-items-center link horizontal d-flex">
                                    <div class="service-icon color-1 mb-4">
                                        <i class="fa fa-map-marker-alt"></i>
                                    </div>
                                    <div class="service-contents">
                                        <p>Trụ sở: Đông Hòa, TP. Thái Bình, Tỉnh Thái Bình</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="service no-shadow align-items-center link horizontal d-flex">
                                    <div class="service-icon color-1 mb-4">
                                        <i class="fa fa-envelope"></i>
                                    </div>
                                    <div class="service-contents">
                                        <p>info@gemlock.vn</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="service no-shadow align-items-center link horizontal d-flex">
                                    <div class="service-icon color-1 mb-4">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <div class="service-contents">
                                        <p>0967 263 944</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <form>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label class="text-black" for="fname">Họ và tên</label>
                                        <input type="text" class="form-control" id="fname" placeholder="Nhập họ tên">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <label class="text-black" for="phone">Số điện thoại</label>
                                        <input type="text" class="form-control" id="phone" placeholder="Nhập số điện thoại">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="text-black" for="email">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Nhập email (nếu có)">
                            </div>
                            <div class="form-group mb-4">
                                <label class="text-black" for="message">Nội dung cần tư vấn</label>
                                <textarea class="form-control" id="message" cols="30" rows="5"
                                          placeholder="Mô tả ngắn nhu cầu của bạn..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary-hover-outline">Gửi yêu cầu</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('gemlock_scripts')
    <script src="{{ asset('furni/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('furni/js/tiny-slider.js') }}"></script>
    <script src="{{ asset('furni/js/custom.js') }}"></script>
@endpush

