@extends('gemlock.layouts.app')

@section('title', $post->title . ' - Gemlock')
@section('body_class', 'blog-detail-page')

@section('before_main')
    @include('gemlock.partials.gemlock_topbar')
    @include('gemlock.partials.header')
@endsection

@push('gemlock_styles')
    <link href="{{ asset('furni/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('furni/css/tiny-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('furni/css/style.css') }}" rel="stylesheet">
@endpush

@section('page_content')
    <section class="blog-detail-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-xl-10">
                    <div class="blog-breadcrumb">
                        <a href="{{ url('/gemlock') }}">Trang chủ</a> /
                        <a href="{{ url('/gemlock/blog') }}">Bài viết</a> /
                        <span>{{ $post->title }}</span>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center blog-detail-row">
                <div class="col-lg-8">
                    <div class="blog-detail-card">
                        <h1 class="blog-detail-title">{{ $post->title }}</h1>
                        <div class="blog-detail-meta mb-3">
                            <span>Tác giả: <strong>{{ $post->author_name }}</strong></span>
                            <span>Ngày đăng: {{ optional($post->published_at)->format('d/m/Y H:i') }}</span>
                        </div>

                        <img src="{{ $post->thumbnailMedia?->large_url ?? asset('furni/images/post-1.jpg') }}"
                             alt="{{ $post->title }}" class="img-fluid blog-detail-hero-img">

                        <div class="blog-detail-content">
                            {!! nl2br(e($post->content)) !!}
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mt-4 mt-lg-0">
                    <div class="blog-sidebar-card">
                        <div class="blog-sidebar-title">Bài viết mới</div>
                        @forelse ($popularPosts as $item)
                            <div class="blog-sidebar-post">
                                <img src="{{ $item->thumbnailMedia?->thumbnail_url ?? asset('furni/images/post-2.jpg') }}" alt="{{ $item->title }}">
                                <div>
                                    <h6><a href="{{ url('/gemlock/blog/' . $item->slug) }}">{{ $item->title }}</a></h6>
                                    <small>{{ optional($item->published_at)->format('d/m/Y') }}</small>
                                </div>
                            </div>
                        @empty
                            <p class="text-muted mb-0">Chưa có bài viết liên quan.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('gemlock_scripts')
    <script src="{{ asset('furni/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('furni/js/tiny-slider.js') }}"></script>
    <script src="{{ asset('furni/js/custom.js') }}"></script>
@endpush
