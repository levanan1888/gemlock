<style>
    :root {
        --header-height: 104px;
        --gemlock-topbar-height: 0px;
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
    .gemlock-topbar-link {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: inherit;
        text-decoration: none;
        font-weight: 700;
        font-size: 14px;
        transition: transform 0.2s ease, opacity 0.2s ease;
    }
    .gemlock-topbar-arrow {
        font-size: 16px;
        display: inline-flex;
        align-items: center;
        transition: transform 0.2s ease;
    }
    .gemlock-topbar-link:hover {
        transform: translateX(-2px);
        opacity: 0.95;
    }
    .gemlock-topbar-link:hover .gemlock-topbar-arrow {
        transform: translateX(-2px);
    }
    .site-header {
        position: fixed;
        top: var(--gemlock-topbar-height, 0px);
        left: 0;
        right: 0;
        z-index: 1000;
        border-bottom: 1px solid #e5e7eb;
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
    }
    .glass-header {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
    }
    .site-header.header--scrolled {
        background: rgba(255, 255, 255, 0.98);
        box-shadow: 0 6px 24px rgba(0, 0, 0, 0.08);
    }
    .header-container {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 16px;
    }
    .header-inner {
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

<script>
    (function() {
        var header = document.querySelector('.site-header');
        if (!header) return;
        function updateHeader() {
            if (window.scrollY > 20) {
                header.classList.add('header--scrolled');
            } else {
                header.classList.remove('header--scrolled');
            }
        }
        window.addEventListener('scroll', function() { requestAnimationFrame(updateHeader); }, { passive: true });
        updateHeader();
    })();

    document.addEventListener('DOMContentLoaded', function() {
        var currentPath = window.location.pathname;
        var links = document.querySelectorAll('.site-header .header-link');
        links.forEach(function(link) {
            var href = link.getAttribute('href');
            if (href === currentPath || (href !== '/' && currentPath.startsWith(href))) {
                link.classList.add('active');
            }
        });

        var toggle = document.querySelector('.header-menu-toggle');
        var mobileMenu = document.querySelector('.header-mobile');
        var mobileSubmenu = document.querySelector('.header-submenu');
        var mobileSubmenuToggle = document.querySelector('.header-mobile-toggle');
        if (toggle && mobileMenu) {
            var icon = toggle.querySelector('.material-icons');
            var closeMenu = function() {
                mobileMenu.classList.remove('is-open');
                toggle.classList.remove('is-open');
                if (icon) icon.textContent = 'menu';
                if (mobileSubmenu) mobileSubmenu.classList.remove('is-open');
                if (mobileSubmenuToggle) {
                    mobileSubmenuToggle.classList.remove('is-open');
                    mobileSubmenuToggle.setAttribute('aria-expanded', 'false');
                }
            };
            toggle.addEventListener('click', function() {
                var isOpen = mobileMenu.classList.toggle('is-open');
                toggle.classList.toggle('is-open', isOpen);
                if (icon) icon.textContent = isOpen ? 'close' : 'menu';
            });
            mobileMenu.querySelectorAll('.header-link, .btn-primary').forEach(function(link) {
                link.addEventListener('click', closeMenu);
            });
            window.addEventListener('resize', function() {
                if (window.innerWidth > 991) {
                    closeMenu();
                }
            });
        }
        if (mobileSubmenuToggle && mobileSubmenu) {
            mobileSubmenuToggle.addEventListener('click', function() {
                var isOpen = mobileSubmenu.classList.toggle('is-open');
                mobileSubmenuToggle.classList.toggle('is-open', isOpen);
                mobileSubmenuToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
            });
        }

        var megaCategories = document.querySelectorAll('.mega-category');
        var megaPanels = document.querySelectorAll('.mega-panel');
        function setMegaActive(targetId) {
            megaCategories.forEach(function(btn) {
                btn.classList.toggle('is-active', btn.dataset.target === targetId);
            });
            megaPanels.forEach(function(panel) {
                panel.classList.toggle('is-active', panel.dataset.panel === targetId);
            });
        }
        megaCategories.forEach(function(btn) {
            btn.addEventListener('mouseenter', function() {
                setMegaActive(btn.dataset.target);
            });
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                setMegaActive(btn.dataset.target);
            });
        });

        var desktopDropdown = document.querySelector('.header-dropdown');
        if (desktopDropdown) {
            var closeTimer;
            desktopDropdown.addEventListener('mouseenter', function() {
                clearTimeout(closeTimer);
                desktopDropdown.classList.add('is-open');
            });
            desktopDropdown.addEventListener('mouseleave', function() {
                closeTimer = setTimeout(function() {
                    desktopDropdown.classList.remove('is-open');
                }, 120);
            });
        }
    });
</script>
