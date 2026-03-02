@extends('gemlock.layouts.app')

@section('title', 'GemLock - Trang chủ')
@section('body_class', 'gemlock-page')

@section('before_main')
    @include('gemlock.partials.gemlock_topbar')
    @include('gemlock.partials.header')
@endsection

@push('gemlock_styles')
    <link rel="stylesheet" href="{{ asset('css/gemlock-home.css') }}">
@endpush

@push('gemlock_scripts')
    <script>
        window.gemlockHomeConfig = {
            cartAddUrl: '{{ route('cart.add') }}',
            csrfToken: '{{ csrf_token() }}'
        };
    </script>
    <script src="{{ asset('js/gemlock-home.js') }}"></script>
@endpush

@section('page_content')
    @include('gemlock.partials.home.gallery')
    @include('gemlock.partials.home.categories')
    @include('gemlock.partials.home.stats')
    @include('gemlock.partials.home.testimonials')
    @include('gemlock.partials.home.faq')
    @include('gemlock.partials.home.news')
    @include('gemlock.partials.home.cta')
@endsection


