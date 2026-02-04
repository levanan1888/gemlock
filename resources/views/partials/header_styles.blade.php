<style>
    /* 
     * STRICT HEADER STYLING - VERSION 2.0
     * Forces the header to look like the Home page regardless of external frameworks (Bootstrap, Tailwind)
     */

    /* Reset EVERYTHING for header to avoid leaks */
    .header, .header * {
        box-sizing: border-box !important;
        list-style: none !important;
        list-style-type: none !important;
        text-decoration: none !important;
        background-image: none !important;
        text-transform: none !important;
        margin: 0;
        /* Do NOT set margin: 0 for ALL elements, just resets */
    }

    .header {
        font-family: 'IBM Plex Sans', sans-serif !important;
        color: #1a1000 !important;
        background-color: #D4A800 !important;
        border-bottom: 3px solid #B8860B !important;
        width: 100% !important;
        z-index: 1000 !important;
        position: fixed !important;
        top: 0 !important;
        left: 0 !important;
        right: 0 !important;
        transition: background-color 0.35s ease, box-shadow 0.35s ease, padding 0.35s ease !important;
        box-shadow: 0 2px 12px rgba(212, 168, 0, 0.12) !important;
    }
    .header.header--scrolled {
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08), 0 0 0 1px rgba(212, 168, 0, 0.1) !important;
    }

    /* Force font loading fallback */
    @import url('https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@100;200;300;400;500;600;700&display=swap');

    /* Container alignment */
    .header .container {
        max-width: 1200px !important;
        margin: 0 auto !important;
        padding: 0 15px !important;
    }

    .header .main-container {
        padding: 15px 0 !important;
        transition: padding 0.35s ease !important;
    }
    .header.header--scrolled .main-container {
        padding: 10px 0 !important;
    }

    /* Navbar Brand / Logo */
    .header .nav-wrapper {
        display: flex !important;
        justify-content: space-between !important;
        align-items: center !important;
        width: 100% !important;
        position: relative !important;
    }

    .header .nav-logo {
        display: inline-block !important;
        z-index: 1001 !important;
    }
    
    .header .site-logo {
        max-height: 64px !important;
        height: 64px !important;
        width: auto !important;
        display: block !important;
        transition: max-height 0.35s ease, height 0.35s ease !important;
    }
    .header.header--scrolled .site-logo {
        max-height: 54px !important;
        height: 54px !important;
    }

    /* Navigation Menu Wrapper */
    .header .menu-wrapper {
        display: flex;
        align-items: center;
        z-index: 1000 !important;
    }

    .header .menu-content-wrapper {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
        gap: 40px;
    }

    .header .menu-items {
        display: flex !important;
        align-items: center !important;
        gap: 35px !important;
    }

    /* Navigation Links */
    .header .menu-link {
        color: #1a1000 !important;
        font-weight: 600 !important;
        font-size: 16px !important;
        padding: 10px 0 !important;
        transition: color 0.3s ease !important;
        font-family: 'IBM Plex Sans', sans-serif !important;
    }

    /* Active Link / Hover */
    .header .menu-link:hover,
    .header .menu-link.w--current,
    .header .menu-link.active-link {
        color: #1a1000 !important;
        font-weight: 700 !important;
        text-decoration: underline !important;
        text-underline-offset: 4px !important;
    }

    /* Dropdown Menus */
    .header .w-dropdown-toggle {
        display: flex !important;
        align-items: center !important;
        gap: 8px !important;
        color: #333 !important;
        font-weight: 500 !important;
        font-family: 'IBM Plex Sans', sans-serif !important;
    }

    /* Hide any ghost bullets or icons from Bootstrap/Tailwind */
    .header .menu-link::before,
    .header .menu-link::after,
    .header .single-nav-wrapper::before,
    .header .single-nav-wrapper::after {
        content: none !important;
    }

    /* Primary Button Fix - Brand yellow */
    .header .primary-button {
        background-color: #1a1000 !important;
        color: #E6B800 !important;
        padding: 12px 28px !important;
        border-radius: 50px !important;
        font-weight: 600 !important;
        display: flex !important;
        align-items: center !important;
        gap: 10px !important;
        box-shadow: 0 4px 14px rgba(212, 168, 0, 0.4) !important;
        transition: background-color 0.25s ease, transform 0.2s ease, box-shadow 0.25s ease !important;
    }
    .header .primary-button:hover {
        background-color: #2e1a00 !important;
        transform: translateY(-1px) !important;
        box-shadow: 0 6px 20px rgba(184, 134, 11, 0.45) !important;
    }

    /* Header Right Actions */
    .header .header-right-actions {
        display: flex !important;
        align-items: center !important;
        gap: 5px !important; /* Reduced gap - sát nhau hơn */
        z-index: 1001 !important;
    }

    .header .cart-wrapper {
        display: flex !important;
        align-items: center !important;
    }

    .header .cart-button {
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        padding: 5px !important;
        position: relative !important;
    }

    .header .cart-icon-img {
        width: 22px !important; /* Balanced size */
        height: auto !important;
        display: block !important;
    }

    .header .desktop-only {
        display: flex !important;
    }

    /* Phone Icon adjustment */
    .header .primary-button img {
        width: 16px !important;
        height: 16px !important;
        margin: 0 !important;
        display: inline-block !important;
    }

    /* Mobile Menu Styles */
    @media (max-width: 991px) {
        .header .desktop-only {
            display: none !important;
        }

        .header .menu-wrapper {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: #fffef5 !important;
            padding: 10px 20px 30px !important;
            border: none !important;
            box-shadow: 0 8px 24px rgba(212, 168, 0, 0.12) !important;
            border-bottom: 3px solid #D4A800 !important;
            max-height: 85vh;
            overflow-y: auto;
            z-index: 9999 !important;
            opacity: 1 !important;
            visibility: visible !important;
            border-radius: 0 !important;
        }

        .header .nav-wrapper {
            justify-content: space-between !important;
        }

        .header .header-right-actions {
            order: 3;
            display: flex !important;
            gap: 5px !important; /* Close to hamburger */
            align-items: center !important;
            justify-content: flex-end !important;
        }

        .header .nav-logo {
            order: 1;
        }

        .header .site-logo {
            max-height: 52px !important;
            height: 52px !important;
        }

        .header .menu-wrapper.w--nav-menu-open {
            display: block !important;
            visibility: visible !important;
            opacity: 1 !important;
            height: auto !important; /* Force height if Webflow tries to collapse it */
        }

        /* Ensure links inside are visible */
        .header .menu-wrapper.w--nav-menu-open * {
            visibility: visible !important;
        }

        .header .menu-content-wrapper {
            display: flex !important;
            flex-direction: column !important;
            align-items: flex-start !important;
            gap: 20px !important;
            width: 100% !important;
            background: transparent !important;
            border: none !important;
            box-shadow: none !important;
            border-radius: 0 !important;
            padding: 0 !important;
        }

        .header .menu-item-wrapper {
            width: 100% !important;
            background: transparent !important;
            border: none !important;
            box-shadow: none !important;
            border-radius: 0 !important;
            padding: 0 !important;
        }

        .header .menu-items {
            display: flex !important;
            flex-direction: column !important;
            align-items: flex-start !important;
            width: 100% !important;
            gap: 15px !important;
        }

        /* Dropdown Mobile Fix */
        .header .w-dropdown {
            width: 100%;
        }
        
        .header .w-dropdown-list {
            position: static !important;
            display: none;
            width: 100% !important;
            box-shadow: none !important;
            padding-left: 15px !important;
        }

        .header .w-dropdown.w--open .w-dropdown-list {
            display: block !important;
        }

        .header .megamenu-wrapper {
            padding: 0 !important;
        }

        .header .nav-list-wrapper {
            flex-direction: column !important;
            gap: 15px !important;
        }

        .header .nav-button-wrapper {
            width: 100%;
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
            padding-top: 15px;
            border-top: 1px solid #f5f5f5;
            display: none !important; /* Managed by desktop-only class logic */
        }

        /* Nav Trigger */
        .header .nav-trigger {
            display: flex !important;
            padding: 5px !important; /* Reduced padding */
            cursor: pointer;
            align-items: center !important;
            justify-content: center !important;
            margin: 0 !important;
            background: transparent !important;
        }

        /* Fallback Hamburger Icon */
        .header .nav-trigger::before {
            content: "\f0c9"; /* FontAwesome Bars */
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
            font-size: 22px; /* Matching cart size better */
            color: #333;
            line-height: 1 !important;
        }

        .header .nav-trigger.w--open::before {
            content: "\f00d"; /* FontAwesome Times/Close */
        }
        
        .header .trigger-icon {
            display: none !important; /* Hide original Lottie if broken */
        }
    }

    /* Desktop Menu Visibility */
    @media (min-width: 992px) {
        .header .menu-wrapper {
            display: flex !important;
        }
        .header .nav-trigger {
            display: none !important;
        }
    }

    /* Cart Quantity Counter */
    .header .cart-quantity {
        position: absolute !important;
        top: 0 !important;
        right: 0 !important;
        background-color: #1a1000 !important;
        color: #E6B800 !important;
        font-family: sans-serif !important;
        padding: 2px 5px !important;
        border-radius: 50px !important;
        font-size: 9px !important;
        min-width: 16px !important;
        text-align: center !important;
        font-weight: 700 !important;
        line-height: 1 !important;
    }

</style>

<script>
    // Header smooth scroll effect (kiểu FPT Smart Home)
    (function() {
        var header = document.querySelector('.header');
        if (!header) return;
        function updateHeader() {
            if (window.scrollY > 50) {
                header.classList.add('header--scrolled');
            } else {
                header.classList.remove('header--scrolled');
            }
        }
        window.addEventListener('scroll', function() { requestAnimationFrame(updateHeader); }, { passive: true });
        updateHeader();
    })();
    // Simple script to add active class based on URL
    document.addEventListener('DOMContentLoaded', function() {
        const currentPath = window.location.pathname;
        const links = document.querySelectorAll('.header .menu-link');
        links.forEach(link => {
            const href = link.getAttribute('href');
            if (href === currentPath || (href !== '/' && currentPath.startsWith(href))) {
                link.classList.add('active-link');
            }
        });

        // Mobile menu manual toggle (Fallback in case Webflow JS isn't initialized correctly on new DOM)
        const navTrigger = document.querySelector('.header .nav-trigger');
        const navMenu = document.querySelector('.header .menu-wrapper');
        
        if (navTrigger && navMenu) {
            navTrigger.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopImmediatePropagation(); // Kill Webflow script conflict
                
                const isOpen = navMenu.classList.contains('w--nav-menu-open');
                const header = document.querySelector('.header');
                
                if (isOpen) {
                    navMenu.classList.remove('w--nav-menu-open');
                    navTrigger.classList.remove('w--open');
                    if (window.innerWidth <= 991) navMenu.style.display = 'none';
                    if (header) header.style.overflow = '';
                } else {
                    navMenu.classList.add('w--nav-menu-open');
                    navTrigger.classList.add('w--open');
                    if (window.innerWidth <= 991) navMenu.style.display = 'block';
                    if (header) header.style.overflow = 'visible';
                }
            }, true); // Use capture phase to be first

            // Disable Webflow link jumping but keep functionality
            const menuLinks = document.querySelectorAll('.header .menu-link');
            menuLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    // Just let them be links, but close menu on click
                    if (window.innerWidth <= 991) {
                        navMenu.classList.remove('w--nav-menu-open');
                        navTrigger.classList.remove('w--open');
                        navMenu.style.display = 'none';
                    }
                });
            });

            window.addEventListener('resize', function() {
                if (window.innerWidth > 991) {
                    navMenu.style.display = '';
                    navMenu.classList.remove('w--nav-menu-open');
                    navTrigger.classList.remove('w--open');
                }
            });

            // Dropdown manual toggle for mobile
            const dropdowns = document.querySelectorAll('.header .w-dropdown');
            dropdowns.forEach(dd => {
                const toggle = dd.querySelector('.w-dropdown-toggle');
                if (toggle) {
                    toggle.addEventListener('click', function(e) {
                        if (window.innerWidth <= 991) {
                            e.preventDefault();
                            e.stopPropagation();
                            dd.classList.toggle('w--open');
                            const list = dd.querySelector('.w-dropdown-list');
                            if (list) {
                                list.style.display = dd.classList.contains('w--open') ? 'block' : 'none';
                            }
                        }
                    });
                }
            });
        }
    });
</script>
