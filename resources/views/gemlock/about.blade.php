@extends('gemlock.layouts.app')

@section('title', 'Gemlock - Giới thiệu')
@section('body_class', 'gemlock-about-page')

@section('before_main')
    @include('gemlock.partials.gemlock_topbar')
    @include('gemlock.partials.header')
@endsection

@push('gemlock_styles')
    <link href="{{ asset('furni/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('furni/css/tiny-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('furni/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/gemlock-about.css') }}" rel="stylesheet">
@endpush

@section('page_content')
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1>Giới thiệu</h1>
                        <p class="mb-4">
                            Đây là layout demo (chưa đổ dữ liệu) dựa theo theme Furni.
                        </p>
                        <p>
                            <a href="{{ url('/gemlock/product') }}" class="btn btn-secondary me-2">Xem sản phẩm</a>
                            <a href="{{ url('/gemlock/contact') }}" class="btn btn-white-outline">Liên hệ</a>
                        </p>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="hero-img-wrap">
                        <img src="{{ asset('furni/images/couch.png') }}" class="img-fluid" alt="Hero image">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="why-choose-section">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-6">
                    <h2 class="section-title">Vì sao chọn Gemlock?</h2>
                    <p>
                        Nội dung demo: mô tả ngắn về lợi ích, chất lượng, dịch vụ, bảo hành...
                    </p>

                    <div class="row my-5">
                        <div class="col-6 col-md-6">
                            <div class="feature">
                                <div class="icon">
                                    <img src="{{ asset('furni/images/truck.svg') }}" alt="Shipping" class="imf-fluid">
                                </div>
                                <h3>Giao hàng nhanh</h3>
                                <p>Nội dung demo.</p>
                            </div>
                        </div>

                        <div class="col-6 col-md-6">
                            <div class="feature">
                                <div class="icon">
                                    <img src="{{ asset('furni/images/bag.svg') }}" alt="Easy" class="imf-fluid">
                                </div>
                                <h3>Dễ lựa chọn</h3>
                                <p>Nội dung demo.</p>
                            </div>
                        </div>

                        <div class="col-6 col-md-6">
                            <div class="feature">
                                <div class="icon">
                                    <img src="{{ asset('furni/images/support.svg') }}" alt="Support" class="imf-fluid">
                                </div>
                                <h3>Hỗ trợ 24/7</h3>
                                <p>Nội dung demo.</p>
                            </div>
                        </div>

                        <div class="col-6 col-md-6">
                            <div class="feature">
                                <div class="icon">
                                    <img src="{{ asset('furni/images/return.svg') }}" alt="Warranty" class="imf-fluid">
                                </div>
                                <h3>Bảo hành rõ ràng</h3>
                                <p>Nội dung demo.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="img-wrap">
                        <img src="{{ asset('furni/images/why-choose-us-img.jpg') }}" alt="Why choose us" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="untree_co-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-5 mx-auto text-center">
                    <h2 class="section-title">Đội ngũ</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6 col-lg-3 mb-5 mb-md-0">
                    <img src="{{ asset('furni/images/person_1.jpg') }}" class="img-fluid mb-5" alt="Member 1">
                    <h3><a href="#"><span>Thành viên</span> 01</a></h3>
                    <span class="d-block position mb-4">Chức vụ</span>
                    <p>Nội dung demo.</p>
                </div>

                <div class="col-12 col-md-6 col-lg-3 mb-5 mb-md-0">
                    <img src="{{ asset('furni/images/person_2.jpg') }}" class="img-fluid mb-5" alt="Member 2">
                    <h3><a href="#"><span>Thành viên</span> 02</a></h3>
                    <span class="d-block position mb-4">Chức vụ</span>
                    <p>Nội dung demo.</p>
                </div>

                <div class="col-12 col-md-6 col-lg-3 mb-5 mb-md-0">
                    <img src="{{ asset('furni/images/person_3.jpg') }}" class="img-fluid mb-5" alt="Member 3">
                    <h3><a href="#"><span>Thành viên</span> 03</a></h3>
                    <span class="d-block position mb-4">Chức vụ</span>
                    <p>Nội dung demo.</p>
                </div>

                <div class="col-12 col-md-6 col-lg-3 mb-5 mb-md-0">
                    <img src="{{ asset('furni/images/person_4.jpg') }}" class="img-fluid mb-5" alt="Member 4">
                    <h3><a href="#"><span>Thành viên</span> 04</a></h3>
                    <span class="d-block position mb-4">Chức vụ</span>
                    <p>Nội dung demo.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="testimonial-section before-footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mx-auto text-center">
                    <h2 class="section-title">Khách hàng nói gì</h2>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="testimonial-slider-wrap text-center">
                        <div id="testimonial-nav">
                            <span class="prev" data-controls="prev"><span class="fa fa-chevron-left"></span></span>
                            <span class="next" data-controls="next"><span class="fa fa-chevron-right"></span></span>
                        </div>

                        <div class="testimonial-slider">
                            <div class="item">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8 mx-auto">
                                        <div class="testimonial-block text-center">
                                            <blockquote class="mb-5">
                                                <p>&ldquo;Nội dung demo testimonial 01.&rdquo;</p>
                                            </blockquote>
                                            <div class="author-info">
                                                <div class="author-pic">
                                                    <img src="{{ asset('furni/images/person-1.png') }}" alt="Author" class="img-fluid">
                                                </div>
                                                <h3 class="font-weight-bold">Khách hàng 01</h3>
                                                <span class="position d-block mb-3">Ghi chú</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8 mx-auto">
                                        <div class="testimonial-block text-center">
                                            <blockquote class="mb-5">
                                                <p>&ldquo;Nội dung demo testimonial 02.&rdquo;</p>
                                            </blockquote>
                                            <div class="author-info">
                                                <div class="author-pic">
                                                    <img src="{{ asset('furni/images/person-1.png') }}" alt="Author" class="img-fluid">
                                                </div>
                                                <h3 class="font-weight-bold">Khách hàng 02</h3>
                                                <span class="position d-block mb-3">Ghi chú</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8 mx-auto">
                                        <div class="testimonial-block text-center">
                                            <blockquote class="mb-5">
                                                <p>&ldquo;Nội dung demo testimonial 03.&rdquo;</p>
                                            </blockquote>
                                            <div class="author-info">
                                                <div class="author-pic">
                                                    <img src="{{ asset('furni/images/person-1.png') }}" alt="Author" class="img-fluid">
                                                </div>
                                                <h3 class="font-weight-bold">Khách hàng 03</h3>
                                                <span class="position d-block mb-3">Ghi chú</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
    <script src="{{ asset('js/gemlock-about.js') }}"></script>
@endpush
