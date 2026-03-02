<style>
    /* ===== JW header/banner rewrite (scoped) ===== */
    .jw {
        font-family: "IBM Plex Sans", Arial, sans-serif;
    }

    .jw * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: inherit;
    }

    .jw .container {
        width: 1200px;
        margin: auto;
    }

    /* ===== HEADER TOP ===== */
    .jw .header {
        background: #fff;
        border-bottom: 1px solid #e5e7eb;
        position: relative;
        z-index: 1000;
        /* Chỉnh header xuống dưới để không đè topbar */
        margin-top: var(--gemlock-topbar-height, 40px);
    }

    /* Đảm bảo layout không bị chừa khoảng trắng fixed cũ */
    .main-with-fixed-header {
        padding-top: 0 !important;
    }

    .site-header {
        display: none !important;
    }

    /* ===== GEMLOCK TOPBAR ===== */
    :root {
        --gemlock-topbar-height: 40px;
    }

    .gemlock-topbar {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        height: var(--gemlock-topbar-height);
        display: flex;
        align-items: center;
        z-index: 1100;
        background: linear-gradient(90deg, #111827 0%, #1f2937 45%, #111827 100%);
        color: #e5e7eb;
        font-size: 13px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.35);
    }

    .gemlock-topbar .header-container {
        width: 1200px;
        max-width: 100%;
        margin: 0 auto;
        padding: 0 16px;
    }

    .gemlock-topbar-link {
        color: inherit;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-weight: 500;
        letter-spacing: 0.02em;
    }

    .gemlock-topbar-link::before {
        content: "←";
        font-size: 14px;
        opacity: 0.85;
    }

    .gemlock-topbar-text {
        position: relative;
    }

    .gemlock-topbar-text::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: -2px;
        width: 100%;
        height: 1px;
        background: linear-gradient(90deg, #facc15 0%, transparent 100%);
        opacity: 0;
        transform-origin: left;
        transform: scaleX(0.7);
        transition: opacity 0.18s ease, transform 0.18s ease;
    }

    .gemlock-topbar-link:hover .gemlock-topbar-text::after {
        opacity: 1;
        transform: scaleX(1);
    }

    .gemlock-topbar-link:hover {
        color: #facc15;
    }

    @media (max-width: 768px) {
        .gemlock-topbar {
            height: 36px;
            font-size: 12px;
        }

        :root {
            --gemlock-topbar-height: 36px;
        }

        .gemlock-topbar-text {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: calc(100vw - 48px);
        }
    }

    .jw .header-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 32px;
        height: 104px;
    }

    .jw .logo img,
    .header-logo .site-logo {
        height: 70px;
        width: auto;
        display: block;
        object-fit: contain;
    }

    /* ===== SEARCH BOX (giống ảnh 2) ===== */
    .jw .search-box {
        flex: 1;
        max-width: 560px;
        display: flex;
        align-items: center;
        background: #f9fafb;
        border-radius: 999px;
        border: 1px solid #e5e7eb;
        padding-left: 18px;
        overflow: hidden;
    }

    .jw .search-box input {
        flex: 1;
        border: none;
        outline: none;
        background: transparent;
        height: 44px;
        font-size: 14px;
        color: #111827;
    }

    .jw .search-box input::placeholder {
        color: #9ca3af;
    }

    .jw .search-box button {
        width: 52px;
        height: 44px;
        border: none;
        background: var(--brand-yellow, #e3bf35);
        color: var(--brand-text-on-yellow, #1a1000);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: background 0.2s ease;
    }

    .jw .search-box button:hover {
        background: var(--brand-yellow-dark, #c4a12d);
    }

    .jw .search-box i {
        font-size: 18px;
    }

    /* ===== HEADER RIGHT: Cửa hàng / Hotline / Cart ===== */
    .jw .header-right {
        display: flex;
        align-items: center;
        gap: 20px;
        font-size: 14px;
        white-space: nowrap;
    }

    .jw .header-right a {
        text-decoration: none;
        color: #111827;
        font-weight: 600;
    }

    .jw .header-right a:hover {
        color: var(--brand-yellow-dark, #c4a12d);
    }

    .jw .header-right .hotline {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-weight: 700;
        color: var(--brand-yellow-dark, #c4a12d);
    }

    .jw .header-right .hotline i {
        font-size: 16px;
    }

    .jw .header-right-cart {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 8px 14px;
        border-radius: 999px;
        background: #f9fafb;
        border: 1px solid #e5e7eb;
        text-decoration: none;
        color: #111827;
        font-weight: 600;
        transition: background 0.2s ease, border-color 0.2s ease, color 0.2s ease, transform 0.2s ease;
    }

    .jw .header-right-cart i {
        font-size: 18px;
    }

    .jw .header-right-cart span {
        font-size: 13px;
    }

    .jw .header-right-cart:hover {
        background: var(--brand-yellow, #e3bf35);
        border-color: var(--brand-yellow, #e3bf35);
        color: var(--brand-text-on-yellow, #1a1000);
        transform: translateY(-1px);
    }
    .header-nav {
        display: flex;
        align-items: center;
        gap: 28px;
    }
    .header-link {
        color: #4b5563;
        font-weight: 800;
        font-size: 18px;
        text-decoration: none;
        transition: color 0.25s ease;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }
    .header-link:hover,
    .header-link.active {
        color: #D4A800;
    }
    .header-actions {
        display: flex;
        align-items: center;
        gap: 16px;
    }
    .header-cart {
        width: 46px;
        height: 46px;
        border-radius: 50%;
        border: none;
        background: #ffffff;
        color: #4b5563;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        box-shadow: 0 6px 16px rgba(0, 0, 0, 0.08);
        transition: border-color 0.2s ease, color 0.2s ease, transform 0.2s ease;
        position: relative;
    }
    .header-cart:hover {
        color: #D4A800;
        transform: translateY(-1px);
    }
    .header-cart .material-icons {
        font-size: 24px;
    }
    .cart-quantity {
        position: absolute;
        top: -4px;
        right: -6px;
        background: #1a1000;
        color: #E6B800;
        font-size: 10px;
        font-weight: 800;
        min-width: 18px;
        height: 18px;
        border-radius: 999px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0 5px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.18);
    }
    .cart-quantity.is-empty {
        display: none;
    }
    .btn-primary {
        background: linear-gradient(135deg, #D4A800 0%, #E6B800 100%);
        color: #1a1000;
        font-weight: 700;
        padding: 12px 26px;
        border-radius: 8px;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
        box-shadow: 0 4px 15px rgba(212, 168, 0, 0.35);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        font-size: 16px;
    }
    .btn-primary:hover {
        transform: translateY(-1px);
        box-shadow: 0 6px 20px rgba(212, 168, 0, 0.45);
    }
    .btn-primary .material-icons {
        font-size: 18px;
    }
    .header-menu-toggle {
        display: none;
        width: 46px;
        height: 46px;
        border-radius: 50%;
        border: 1px solid #e5e7eb;
        background: #ffffff;
        color: #4b5563;
        cursor: pointer;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        transition: border-color 0.2s ease, color 0.2s ease;
    }
    .header-menu-toggle:hover {
        border-color: #D4A800;
        color: #D4A800;
    }
    .header-mobile {
        display: none;
        flex-direction: column;
        gap: 14px;
        padding: 10px 0 24px;
        border-top: 1px solid #f1f5f9;
    }
    .header-dropdown {
        position: relative;
        display: inline-flex;
        align-items: center;
    }
    .header-dropdown-toggle .material-icons {
        font-size: 20px;
        transition: transform 0.2s ease;
    }
    .header-dropdown:hover .header-dropdown-toggle .material-icons,
    .header-dropdown:focus-within .header-dropdown-toggle .material-icons {
        transform: rotate(180deg);
    }
    .header-dropdown-menu {
        position: absolute;
        top: calc(100% + 6px);
        left: 0;
        min-width: 260px;
        background: #ffffff;
        border-radius: 16px;
        box-shadow: 0 18px 45px rgba(15, 23, 42, 0.12);
        padding: 8px 0;
        opacity: 0;
        transform: translateY(8px);
        pointer-events: none;
        transition: opacity 0.2s ease, transform 0.2s ease;
        z-index: 1001;
    }
    .header-dropdown-menu::before {
        content: "";
        position: absolute;
        top: -10px;
        left: 0;
        right: 0;
        height: 10px;
        background: transparent;
    }
    .header-dropdown:hover .header-dropdown-menu,
    .header-dropdown:focus-within .header-dropdown-menu,
    .header-dropdown.is-open .header-dropdown-menu {
        opacity: 1;
        transform: translateY(0);
        pointer-events: auto;
    }
    .header-dropdown-item {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px 16px;
        font-size: 14px;
        font-weight: 600;
        color: #374151;
        text-decoration: none;
        transition: background 0.2s ease, color 0.2s ease;
    }
    .header-dropdown-item .material-icons {
        font-size: 18px;
        color: #D4A800;
    }
    .header-dropdown-item:hover {
        background: #fff8e1;
        color: #1a1000;
    }
    .header-dropdown-menu.mega-menu {
        width: 880px;
        max-width: calc(100vw - 32px);
        padding: 0;
        display: flex;
        overflow: hidden;
        /* Center on screen */
        position: fixed;
        left: 50%;
        transform: translateX(-50%) translateY(8px);
        top: var(--header-height, 104px);
    }
    .header-dropdown:hover .header-dropdown-menu.mega-menu,
    .header-dropdown:focus-within .header-dropdown-menu.mega-menu,
    .header-dropdown.is-open .header-dropdown-menu.mega-menu {
        transform: translateX(-50%) translateY(0);
    }
    .mega-sidebar {
        width: 250px;
        background: #f5f7fb;
        border-right: 1px solid #eef2f7;
        display: flex;
        flex-direction: column;
        max-height: 420px;
        overflow-y: auto;
    }
    .mega-category {
        width: 100%;
        border: none;
        background: transparent;
        padding: 12px 16px;
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 14px;
        font-weight: 700;
        color: #374151;
        cursor: pointer;
        text-align: left;
        transition: background 0.2s ease, color 0.2s ease;
    }
    .mega-category .material-icons {
        font-size: 20px;
        color: #D4A800;
    }
    .mega-category:hover,
    .mega-category.is-active {
        background: #ffffff;
        color: #1a1000;
    }
    .mega-content {
        flex: 1;
        padding: 16px 20px;
        background: #ffffff;
    }
    .mega-panel {
        display: none;
    }
    .mega-panel.is-active {
        display: block;
    }
    .mega-panel-head {
        margin-bottom: 14px;
    }
    .mega-panel-title {
        font-size: 16px;
        font-weight: 800;
        color: #1a1000;
    }
    .mega-panel-sub {
        font-size: 12px;
        color: #6b7280;
    }
    .mega-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 12px;
    }
    .mega-card {
        background: #f9fafb;
        border-radius: 12px;
        padding: 10px;
        text-decoration: none;
        color: #1f2937;
        display: flex;
        flex-direction: column;
        gap: 8px;
        border: 1px solid #eef2f7;
        transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease;
    }
    .mega-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(15, 23, 42, 0.12);
        border-color: rgba(212, 168, 0, 0.35);
    }
    .mega-card--product .mega-card-image {
        width: 100%;
        aspect-ratio: 1 / 1;
        border-radius: 10px;
        background-color: #ffffff;
        background-position: center;
        background-repeat: no-repeat;
        background-size: contain;
    }
    .mega-card-title {
        font-size: 12px;
        font-weight: 700;
        line-height: 1.35;
    }
    .mega-card-price {
        font-size: 12px;
        font-weight: 700;
        color: #D4A800;
    }
    .mega-card--feature {
        flex-direction: row;
        align-items: center;
        gap: 10px;
        padding: 12px;
        background: #ffffff;
    }
    .mega-card--feature .material-icons {
        font-size: 20px;
        color: #D4A800;
    }
    
    /* Mega Menu Responsive - Laptop nhỏ */
    @media (max-width: 1200px) {
        .header-dropdown-menu.mega-menu {
            width: 750px;
        }
        .mega-sidebar {
            width: 200px;
        }
        .mega-content {
            padding: 16px;
        }
        .mega-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 10px;
        }
        .mega-card {
            padding: 8px;
        }
        .mega-card-title {
            font-size: 11px;
        }
    }
    
    @media (max-width: 1024px) {
        .header-dropdown-menu.mega-menu {
            width: calc(100vw - 40px);
            max-height: 70vh;
            overflow-y: auto;
        }
        .mega-sidebar {
            width: 180px;
            flex-shrink: 0;
        }
        .mega-content {
            padding: 14px;
            overflow-y: auto;
            max-height: 60vh;
        }
        .mega-grid {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }
    }
    
    .header-mobile-group {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }
    .header-mobile-toggle {
        background: none;
        border: none;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
        color: #4b5563;
        font-size: 17px;
        font-weight: 800;
        cursor: pointer;
    }
    .header-mobile-toggle .material-icons {
        font-size: 20px;
        transition: transform 0.2s ease;
    }
    .header-mobile-toggle.is-open .material-icons {
        transform: rotate(180deg);
    }
    .header-submenu {
        display: none;
        flex-direction: column;
        gap: 10px;
        padding-left: 12px;
        border-left: 2px solid #f1f5f9;
    }
    .header-submenu.is-open {
        display: flex;
    }
    .header-submenu .header-link {
        font-size: 15px;
        font-weight: 700;
        color: #6b7280;
        gap: 8px;
    }
    .header-submenu .header-link .material-icons {
        font-size: 16px;
        color: #D4A800;
    }
    .header-phone-mobile {
        align-self: flex-start;
    }
    @media (max-width: 991px) {
        .header-nav {
            display: none;
        }
        .header-phone {
            display: none;
        }
        .header-menu-toggle {
            display: inline-flex;
        }
    .header-mobile.is-open {
            display: flex;
        }
    }

    .jw .menu-bar {
        background: var(--brand-yellow, #e3bf35);
        box-shadow: 0 4px 12px rgba(212, 168, 0, 0.25);
    }

    .jw .menu-container {
        display: flex;
        align-items: center;
        gap: 30px;
        height: 54px;
    }

    .jw .menu-left {
        display: inline-flex;
        align-items: center;
        justify-content: space-between;
        width: 260px;
        padding: 0 18px;
        height: 100%;
        background: var(--brand-yellow-dark, #c4a12d);
        color: var(--brand-text-on-yellow, #1a1000);
        font-weight: 700;
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 0.04em;
        border-radius: 4px 0 0 0;
    }

    .jw .menu-left i {
        font-size: 16px;
    }

    .jw .menu {
        list-style: none;
        display: flex;
        align-items: center;
        gap: 28px;
        margin: 0;
        padding: 0;
    }

    .jw .menu > li {
        position: relative;
    }

    .jw .menu > li > a {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        color: var(--brand-text-on-yellow, #1a1000);
        text-decoration: none;
        font-weight: 600;
        font-size: 14px;
        padding: 16px 0;
        position: relative;
    }

    .jw .menu > li > a i {
        font-size: 13px;
    }

    .jw .menu > li > a::after {
        content: "";
        position: absolute;
        left: 0;
        right: 0;
        bottom: 10px;
        height: 2px;
        background: var(--brand-text-on-yellow, #1a1000);
        transform-origin: center;
        transform: scaleX(0);
        transition: transform 0.2s ease;
    }

    .jw .menu > li:hover > a::after {
        transform: scaleX(1);
    }

    /* Dropdown dưới "Sản phẩm" */
    .jw .menu .submenu {
        position: absolute;
        top: 100%;
        left: 0;
        min-width: 260px;
        background: #ffffff;
        border-radius: 0 0 12px 12px;
        box-shadow: 0 18px 45px rgba(15, 23, 42, 0.18);
        list-style: none;
        padding: 8px 0;
        margin: 0;
        opacity: 0;
        transform: translateY(8px);
        pointer-events: none;
        transition: opacity 0.18s ease, transform 0.18s ease;
        z-index: 1010;
    }

    .jw .menu li.has-dropdown:hover > .submenu {
        opacity: 1;
        transform: translateY(0);
        pointer-events: auto;
    }

    .jw .menu .submenu li a {
        display: block;
        padding: 9px 18px;
        font-size: 14px;
        color: #111827;
        text-decoration: none;
        white-space: nowrap;
    }

    .jw .menu .submenu li a:hover {
        background: #fffef5;
        color: var(--brand-yellow-dark, #c4a12d);
    }

    /* ===== MAIN BANNER LAYOUT: Sidebar + Swiper ===== */
    .jw .main-banner {
        background: #f3f4f6;
        padding: 0;
    }

    .jw .banner-wrapper {
        display: flex;
        align-items: stretch;
        gap: 0;
        min-height: 380px;
    }

    /* Sidebar menu dọc - nền vàng chủ đạo, chữ tối */
    .jw .sidebar {
        width: 260px;
        max-width: 100%;
        background: linear-gradient(180deg, var(--brand-yellow, #e3bf35) 0%, var(--brand-yellow-alt, #f0cc42) 50%, var(--brand-yellow, #e3bf35) 100%);
        box-shadow: 0 18px 45px rgba(212, 168, 0, 0.25);
        display: flex;
        flex-direction: column;
        height: 100%;
        min-height: 380px;
        overflow: hidden;
    }

    .jw .sidebar ul {
        list-style: none;
        margin: 0;
        padding: 0;
        flex: 1;
    }

    .jw .sidebar li {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 8px 16px;
        font-size: 14px;
        color: var(--brand-text-on-yellow, #1a1000);
        cursor: pointer;
        transition: background 0.18s ease, transform 0.18s ease;
    }

    .jw .sidebar li i {
        width: 26px;
        height: 26px;
        border-radius: 999px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: rgba(26, 16, 0, 0.12);
        color: var(--brand-text-on-yellow, #1a1000);
        font-size: 16px;
    }

    .jw .sidebar li a {
        flex: 1;
        color: inherit;
        text-decoration: none;
        white-space: nowrap;
        text-overflow: ellipsis;
        overflow: hidden;
        font-weight: 600;
    }

    .jw .sidebar li:hover {
        background: rgba(26, 16, 0, 0.08);
        transform: translateX(2px);
    }

    /* Banner Swiper */
    .jw .banner {
        flex: 1;
        overflow: hidden;
        box-shadow: 0 18px 50px rgba(15, 23, 42, 0.22);
        background: #000;
        height: 100%;
        min-height: 380px;
    }

    .jw .jw-banner-swiper {
        width: 100%;
        height: 100%;
        min-height: 380px;
    }

    .jw .jw-banner-swiper .swiper-slide img {
        width: 100%;
        height: 100%;
        display: block;
        object-fit: contain;
        object-position: center;
    }

    .jw .jw-banner-swiper .swiper-pagination-bullet {
        width: 10px;
        height: 10px;
        background: rgba(255, 255, 255, 0.6);
        opacity: 1;
    }

    .jw .jw-banner-swiper .swiper-pagination-bullet-active {
        background: #facc15;
    }

    .jw .jw-banner-swiper .swiper-button-next,
    .jw .jw-banner-swiper .swiper-button-prev {
        width: 42px;
        height: 42px;
        border-radius: 999px;
        background: rgba(255, 255, 255, 0.96);
        color: #111827;
        box-shadow: 0 8px 22px rgba(15, 23, 42, 0.35);
    }

    .jw .jw-banner-swiper .swiper-button-next::after,
    .jw .jw-banner-swiper .swiper-button-prev::after {
        font-size: 18px;
        font-weight: 700;
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 1024px) {
        .jw .header-top {
            flex-wrap: wrap;
            height: auto;
            padding: 14px 0 18px;
        }

        .jw .search-box {
            order: 3;
            max-width: 100%;
        }

        .jw .menu-container {
            height: auto;
            flex-wrap: wrap;
            padding: 8px 0;
        }

        .jw .menu-left {
            width: 100%;
            border-radius: 6px;
        }
    }

    @media (max-width: 768px) {
        .jw .container {
            width: 100%;
            padding: 0 16px;
        }

        .jw .header-top {
            gap: 16px;
        }

        .jw .header-right {
            gap: 12px;
            font-size: 13px;
        }

        .jw .menu-bar {
            display: none;
        }

        .jw .main-banner {
            padding-top: 12px;
        }

        .jw .banner-wrapper {
            flex-direction: column;
        }

        .jw .sidebar {
            width: 100%;
            box-shadow: 0 10px 28px rgba(0, 0, 0, 0.15);
        }
    }
</style>
