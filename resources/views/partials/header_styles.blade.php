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
        height: 104px;
    }
    .header-logo {
        display: inline-flex;
        align-items: center;
    }
    .site-logo {
        height: 70px;
        width: auto;
        display: block;
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
</style>
