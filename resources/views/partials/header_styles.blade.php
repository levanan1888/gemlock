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
        border-bottom: 1px solid #ddd;
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

    .jw .header-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 15px 0;
        gap: 20px;
    }

    .jw .logo img {
        height: 60px;
        display: block;
    }

    .jw .search-box {
        flex: 1;
        margin: 0 60px;
        position: relative;
    }

    .jw .search-box input {
        width: 100%;
        height: 44px;
        border-radius: 8px;
        border: 2px solid #D4A800;
        padding: 0 50px 0 20px;
        outline: none;
        background: #fff;
        font-size: 15px;
        color: #333;
    }

    .jw .search-box button {
        position: absolute;
        right: 6px;
        top: 6px;
        height: 32px;
        width: 40px;
        border: none;
        background: #D4A800;
        color: #fff;
        border-radius: 6px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .jw .header-right {
        display: flex;
        align-items: center;
        gap: 25px;
        font-size: 15px;
        white-space: nowrap;
    }

    .jw .header-right a {
        color: #111827;
        text-decoration: none;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .jw .hotline {
        color: #D4A800;
        font-weight: 800;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .jw .header-right-cart {
        background: #f3f4f6;
        padding: 8px 12px;
        border-radius: 8px;
        transition: background 0.2s;
        color: #111827 !important;
        text-decoration: none;
    }

    /* ===== MENU BAR ===== */
    .jw .menu-bar {
        background: #D4A800;
        color: #1a1000;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }

    .jw .menu-container {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .jw .menu-left {
        background: #B8860B;
        padding: 15px 25px;
        font-weight: 800;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 12px;
        border-radius: 0;
        color: #fff;
        width: 280px;
        text-transform: uppercase;
        font-size: 14px;
        letter-spacing: 0.5px;
    }

    .jw .menu {
        list-style: none;
        display: flex;
        gap: 35px;
        margin-right: 20px;
    }

    .jw .menu li {
        padding: 15px 0;
        cursor: pointer;
        position: relative;
    }

    .jw .menu li a {
        color: #1a1000;
        text-decoration: none;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 15px;
    }

    /* Submenu dropdown */
    .jw .menu li.has-dropdown:hover .submenu {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    .jw .submenu {
        position: absolute;
        top: 100%;
        left: 0;
        min-width: 260px;
        background: #fff;
        box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        list-style: none;
        padding: 10px 0;
        opacity: 0;
        visibility: hidden;
        transform: translateY(10px);
        transition: all 0.3s ease;
        z-index: 1001;
        border-top: 3px solid #B8860B;
    }

    .jw .submenu li a {
        padding: 12px 20px;
        color: #333 !important;
        display: block;
        font-size: 14px;
        font-weight: 600;
    }

    .jw .submenu li a:hover {
        background: #fff8e1;
        color: #D4A800 !important;
    }

    /* ===== MAIN BANNER AREA ===== */
    .jw .main-banner {
        margin-top: 0;
        padding-bottom: 20px;
    }

    .jw .banner-wrapper {
        display: flex;
        gap: 0;
    }

    /* Sidebar - Vàng liền khối */
    .jw .sidebar {
        width: 280px;
        background: #D4A800;
        border-radius: 0;
        overflow: hidden;
        border: none;
    }

    .jw .sidebar ul {
        list-style: none;
    }

    .jw .sidebar li {
        padding: 16px 20px;
        border-bottom: 1px solid rgba(26, 16, 0, 0.1);
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 12px;
        transition: background 0.2s ease;
    }

    .jw .sidebar li:last-child {
        border-bottom: none;
    }

    .jw .sidebar li a {
        color: #1a1000 !important;
        text-decoration: none;
        flex: 1;
        font-size: 15px;
        font-weight: 700;
        display: block;
    }

    .jw .sidebar li i {
        color: #1a1000 !important;
        width: 20px;
        text-align: center;
        font-size: 14px;
    }

    .jw .sidebar li:hover {
        background: #E6B800;
    }

    /* ===== SWIPER BANNER ===== */
    .jw .banner {
        flex: 1;
        overflow: hidden;
        position: relative;
        background: #f3f4f6;
    }

    .jw-banner-swiper {
        width: 100%;
        height: 100%;
    }

    .jw-banner-swiper .swiper-slide img {
        width: 100%;
        height: 100%;
        object-fit: cover; /* Slider full width và lấp đầy khung */
        display: block;
    }

    /* Swiper Controls */
    .jw-banner-swiper .swiper-button-next,
    .jw-banner-swiper .swiper-button-prev {
        color: #D4A800;
        background: rgba(255, 255, 255, 0.8);
        width: 40px;
        height: 40px;
        border-radius: 50%;
    }

    .jw-banner-swiper .swiper-button-next:after,
    .jw-banner-swiper .swiper-button-prev:after {
        font-size: 18px;
        font-weight: bold;
    }

    .jw-banner-swiper .swiper-pagination-bullet-active {
        background: #D4A800;
    }

    /* Responsive */
    @media (max-width: 1240px) {
        .jw .container {
            width: auto;
            margin: 0 16px;
        }
        .jw .search-box {
            margin: 0 20px;
        }
    }

    @media (max-width: 991px) {
        .jw .menu {
            display: none;
        }
        .jw .banner-wrapper {
            flex-direction: column;
        }
        .jw .sidebar {
            width: 100%;
        }
        .jw .banner {
            height: 300px;
        }
    }

    /* ===== Layout Fixes ===== */
    :root {
        --header-height: 104px;
        --gemlock-topbar-height: 40px;
    }
    body.gemlock-page {
        --gemlock-topbar-height: 40px;
        --header-height: 144px;
    }
    .gemlock-topbar {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1002;
        background: var(--brand-yellow);
        color: var(--brand-text-on-yellow);
        border-bottom: 1px solid rgba(26, 16, 0, 0.15);
    }
    .gemlock-topbar .header-container {
        display: flex;
        align-items: center;
        height: var(--gemlock-topbar-height);
    }
</style>
