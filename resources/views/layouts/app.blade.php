<!DOCTYPE html>
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
    <link href="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c2/css/mindoor.webflow.shared.f865d2c40.css"
        rel="stylesheet" type="text/css"
        integrity="sha384-+GXSxATrBRDgHMgupxwjl/Vb+2/UUh6/71XnS2lkuGL6q4vTcftcIOhfMRhfJyPS" crossorigin="anonymous" />
    <style>
        :root {
            /* Brand Yellow Overrides */
            --theme--color-01: #ffcf00;
            /* Rich Golden Yellow from logo */
            --theme--color-02: #b89600;
            /* Darker golden for text/accents */
            --theme--color-03: #000;
            /* Background theme color 3 should be dark for contrast if needed */
            --others--color-01: #e0e0e0;
            /* Gray for rings/borders */
            --others--color-02: #fafafa;
            /* Very light neutral for cards */
        }

        body {
            /* Reverted global background */
            background-color: #fff;
            color: #333;
        }

        /* Ensure heading spans and buttons use brand yellow */
        .text-span,
        .menu-link:hover,
        .menu-link.w--current {
            color: var(--theme--color-01) !important;
            font-weight: 600;
        }

        .primary-button {
            background-color: var(--theme--color-01) !important;
            color: #2e1a00 !important;
            /* Dark brown for best contrast on yellow */
        }

        .primary-button-white {
            background-color: #fff !important;
            color: #2e1a00 !important;

        }

        .primary-button-white:hover {
            background-color: var(--theme--color-01) !important;
            color: #fff !important;
        }

        .secondary-button,
        .secondary-button-white {
            border-color: var(--theme--color-01) !important;
        }

        .cta-subtitle {
            color: #fff !important;
            opacity: 0.9;
        }
    </style>
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
    <script
        type="text/javascript">WebFont.load({ google: { families: ["IBM Plex Sans:100,200,300,regular,500,600,700", "IBM Plex Serif:100,200,300,regular,500,600,700"] } });</script>
    <script
        type="text/javascript">!function (o, c) { var n = c.documentElement, t = " w-mod-"; n.className += t + "js", ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n.className += t + "touch") }(window, document);</script>
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
    @stack('styles')
</head>

<body>

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

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
    @stack('scripts')
</body>

</html>