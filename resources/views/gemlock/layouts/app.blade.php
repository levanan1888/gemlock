<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8" />
    <title>@yield('title', 'GemLock - Giải pháp Smart Home & Năng lượng mặt trời')</title>
    <meta
        content="GemLock Việt Nam - Chuyên cung cấp khóa thông minh GemLock, giải pháp điện năng lượng mặt trời GemSolar và thi công cửa nhôm kính cao cấp."
        name="description" />
    <meta content="GemLock - Giải pháp Smart Home & Năng lượng mặt trời" property="og:title" />
    <meta
        content="GemLock Việt Nam - Chuyên cung cấp khóa thông minh GemLock, giải pháp điện năng lượng mặt trời GemSolar và thi công cửa nhôm kính cao cấp."
        property="og:description" />
    <meta content="{{ asset('image/banner perfect.png') }}" property="og:image" />
    <meta content="Perfect House - Giải pháp Smart Home & Năng lượng mặt trời" property="twitter:title" />
    <meta
        content="GemLock Việt Nam - Chuyên cung cấp khóa thông minh GemLock, giải pháp điện năng lượng mặt trời GemSolar và thi công cửa nhôm kính cao cấp."
        property="twitter:description" />
    <meta property="og:type" content="website" />
    <meta content="summary_large_image" name="twitter:card" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <link href="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c2/css/mindoor.webflow.shared.f865d2c40.css"
        rel="stylesheet" type="text/css"
        integrity="sha384-+GXSxATrBRDgHMgupxwjl/Vb+2/UUh6/71XnS2lkuGL6q4vTcftcIOhfMRhfJyPS" crossorigin="anonymous" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link href="{{ asset('css/gemlock-layout.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
    <script src="{{ asset('js/gemlock-layout.js') }}" type="text/javascript"></script>
    <link href="{{ asset('image/Logo Tách Nền.png') }}" rel="shortcut icon" type="image/x-icon" />
    <link href="{{ asset('image/Logo Tách Nền.png') }}" rel="apple-touch-icon" />
    <script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "Organization",
  "name": "Perfect House Việt Nam",
  "description": "Chuyên cung cấp khóa thông minh GemLock, giải pháp điện năng lượng mặt trời GemSolar và thi công cửa nhôm kính cao cấp.",
  "url": "https://gemcorp.vn/",
  "logo": "{{ asset('image/Logo Tách Nền.png') }}",
  "contactPoint": {
    "@@type": "ContactPoint",
    "telephone": "+84-967-263-944",
    "contactType": "customer service"
  }
}
</script>
    @stack('gemlock_styles')
    @stack('styles')
</head>

<body class="@yield('body_class')">

    @yield('before_main')

    <main class="main-with-fixed-header">
        @hasSection('page_content')
            @yield('page_content')
        @else
            @yield('content')
        @endif
    </main>

    @include('gemlock.partials.footer')

    <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=69420cbdd4e2e39b5eb779c2"
        type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>
    <script src="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c2/js/webflow.schunk.f3a08821b4e31f89.js"
        type="text/javascript" integrity="sha384-jdiRdsaXtUN5LkaeQxuxSJeDi/u9yfDo8k3p7iBrSa0ZxuEsPQsdVokoQHgyJGi/"
        crossorigin="anonymous"></script>
    <script src="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c2/js/webflow.schunk.92de2661b1205911.js"
        type="text/javascript" integrity="sha384-NWDDyWQoAu4U41tEXGgEh1wGlOce4SZrFC857pyq2ThBThK5MksTpJuFd/RewoSV"
        crossorigin="anonymous"></script>
    <script src="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c2/js/webflow.schunk.3646b0bdbfc7a235.js"
        type="text/javascript" integrity="sha384-gZLOmXIblLyHGDncyBxqMlIEL8LJqhq9+vw5KOasKHD2NajOGW1wkj4KYV+Vfhm5"
        crossorigin="anonymous"></script>
    <script src="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c2/js/webflow.0ea7b6f0.38320fdc28c4744e.js"
        type="text/javascript" integrity="sha384-W0I5nlr2OAKtAApLg9QJ+kbia/1klRCsLiuS7XiDoSChJGa2WuWXBa4v9bJvQdjL"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    @stack('gemlock_scripts')
    @stack('scripts')
</body>

</html>
