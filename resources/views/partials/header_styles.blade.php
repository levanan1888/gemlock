<style>
    /* Reset một số style mặc định của project để ăn theo mẫu */
    .gemlock-page .main-with-fixed-header {
        padding-top: 0;
    }

    .hero-wrapper {
        padding: 0; 
        background: #f4f6f9;
        width: 100%;
    }

    .hero-container {
        max-width: 1290px; /* Thống nhất 1290px để rộng bằng section dưới */
        margin: auto;
        padding: 0 15px; 
    }

    .hero-flex {
        display: flex;
        background: #fff;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        border-radius: 0; 
        overflow: hidden;
        align-items: stretch; /* Cố định chiều cao cân bằng 2 cột */
        height: 460px; /* Chiều cao cố định khớp với ảnh mẫu */
        margin-left: 0; 
        gap: 0;
    }

    /* ================= SIDEBAR ================= */
    .sidebar {
        width: 280px;
        background: #D4A800; 
        color: #1a1000;
        flex-shrink: 0;
        display: flex;
        flex-direction: column;
        font-family: 'Montserrat', sans-serif;
        position: relative;
        z-index: 10;
    }

    .sidebar .menu {
        list-style: none;
        padding: 0;
        margin: 0;
        flex: 1;
        display: flex;
        flex-direction: column;
        background: #D4A800;
    }

    .sidebar .menu li {
        flex: 1;
        display: flex;
        border-bottom: 1px solid rgba(0,0,0,0.05);
        cursor: pointer;
        transition: 0.2s;
        position: relative;
        z-index: 11;
    }

    .sidebar .menu li:last-child {
        border-bottom: none;
    }

    .sidebar .menu li a {
        padding: 0 20px;
        display: flex;
        align-items: center;
        gap: 12px;
        font-size: 14px;
        color: #1a1000;
        text-decoration: none;
        font-weight: 700;
        width: 100%;
        font-family: 'Montserrat', sans-serif;
        background: #D4A800;
    }

    .sidebar .menu li:hover {
        background: rgba(0,0,0,0.1);
    }

    .sidebar .menu li a span.icon {
        font-size: 18px;
        width: 24px;
        text-align: center;
    }

    /* ================= BANNER ================= */
    .banner {
        position: relative;
        height: 100%; 
        overflow: hidden;
        flex: 1;
        cursor: grab;
        z-index: 1;
    }

    .banner:active {
        cursor: grabbing;
    }

    .banner-track {
        display: flex;
        width: 100%;
        height: 100%;
        transition: transform 0.4s ease;
        will-change: transform;
    }

    .banner-slide {
        flex: 0 0 100%;
        width: 100%;
        height: 100%;
        position: relative;
    }

    .banner-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        pointer-events: none;
        -webkit-user-drag: none;
    }

    /* Pattern chấm */
    .banner-pattern {
        position: absolute;
        left: 0;
        top: 0;
        width: 25%;
        height: 100%;
        background: radial-gradient(circle, var(--brand-yellow) 2px, transparent 2px);
        background-size: 12px 12px;
        opacity: 0.2;
    }

    /* Slider arrows */
    .nav-btn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: white;
        border: none;
        width: 44px;
        height: 44px;
        border-radius: 50%;
        cursor: pointer;
        box-shadow: 0 5px 15px rgba(0,0,0,0.15);
        font-size: 18px;
        transition: 0.2s;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 10;
        color: #333;
    }

    .nav-btn:hover {
        background: var(--brand-yellow);
        color: var(--brand-text-on-yellow);
        transform: translateY(-50%) scale(1.1);
    }

    .nav-btn.prev {
        left: 20px;
    }

    .nav-btn.next {
        right: 20px;
    }

    /* Responsive */
    @media (max-width: 1024px) {
        .hero-container {
            width: 100%;
            padding: 0 10px;
        }
        .hero-flex {
            height: 380px;
        }
        .sidebar {
            width: 240px;
        }
    }

    @media (max-width: 991px) {
        .hero-container {
            padding: 0;
            max-width: 100%;
        }
        .hero-flex {
            height: auto;
            flex-direction: column;
            box-shadow: none;
        }
        .sidebar {
            display: none !important; /* Ẩn triệt để sidebar vàng thừa trên mobile */
        }
        .banner {
            width: 100% !important;
            height: 250px !important; /* Chỉnh chiều cao banner mobile gọn gàng */
            flex: none;
        }
        .banner-img {
            height: 250px;
        }
        .nav-btn {
            width: 36px;
            height: 36px;
            font-size: 14px;
        }
    }
</style>
