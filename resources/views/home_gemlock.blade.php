<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Gemlock - Khóa Thông Minh Cao Cấp</title>
    <link href="https://fonts.googleapis.com" rel="preconnect"/>
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700;900&amp;family=Inter:wght@300;400;500;600&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        primary: "#D4A800",
                        "primary-dark": "#B8860B",
                        "primary-light": "#E6B800",
                        "brand-text": "#1a1000",
                        "background-light": "#ffffff",
                        "background-dark": "#0f1115",
                        "card-dark": "#18181b",
                        "surface-dark": "#27272a",
                    },
                    fontFamily: {
                        display: ["Montserrat", "sans-serif"],
                        body: ["Inter", "sans-serif"],
                    },
                    borderRadius: {
                        DEFAULT: "0.5rem",
                    },
                },
            },
        };
    </script>
    <style>
        :root {
            --brand-primary: #D4A800;
            --brand-primary-dark: #B8860B;
            --brand-primary-light: #E6B800;
            --brand-text: #1a1000;
        }
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        ::-webkit-scrollbar-thumb {
            background: #ccc;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: var(--brand-primary);
        }
        .glass-header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
        .dark .glass-header {
            background: rgba(15, 17, 21, 0.95);
        }
        
        /* Hero Slider Styles - Full Height */
        .hero-slider-inner {
            position: relative;
            background: linear-gradient(135deg, #f0f4f8 0%, #e8f4fc 50%, #f5f7fa 100%);
        }
        .hero-slides {
            position: relative;
            width: 100%;
            min-height: calc(100vh - 80px);
        }
        .hero-slide {
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            opacity: 0;
            transition: opacity 0.6s ease;
            z-index: 0;
            background-size: contain;
            background-position: center;
            background-repeat: no-repeat;
        }
        .hero-slide.active {
            opacity: 1;
            z-index: 1;
        }
        
        /* Slider Navigation Buttons - FPT Style */
        .hero-slider-prev,
        .hero-slider-next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 56px;
            height: 56px;
            border-radius: 50%;
            background: white;
            border: 1px solid #e5e7eb;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            color: #333;
            font-size: 20px;
            cursor: pointer;
            z-index: 10;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }
        .hero-slider-prev:hover,
        .hero-slider-next:hover {
            background: var(--brand-primary);
            border-color: var(--brand-primary);
            color: var(--brand-text);
            box-shadow: 0 6px 20px rgba(212,168,0,0.3);
        }
        .hero-slider-prev { left: 24px; }
        .hero-slider-next { right: 24px; }
        @media (max-width: 768px) {
            .hero-slider-prev, .hero-slider-next {
                width: 44px;
                height: 44px;
                font-size: 16px;
            }
            .hero-slider-prev { left: 12px; }
            .hero-slider-next { right: 12px; }
        }
        
        /* Slider Dots - FPT Style (thanh ngang) */
        .hero-slider-dots {
            position: absolute;
            bottom: 24px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 8px;
            z-index: 10;
        }
        .hero-dot {
            width: 32px;
            height: 4px;
            border-radius: 2px;
            background: rgba(0,0,0,0.2);
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .hero-dot:hover {
            background: rgba(0,0,0,0.4);
        }
        .hero-dot.active {
            background: var(--brand-primary);
            width: 48px;
        }
        
        /* Brand Button Styles */
        .btn-primary {
            background: linear-gradient(135deg, var(--brand-primary) 0%, var(--brand-primary-light) 100%);
            color: var(--brand-text);
            font-weight: 600;
            padding: 12px 28px;
            border-radius: 4px;
            box-shadow: 0 4px 15px rgba(212,168,0,0.35);
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(212,168,0,0.45);
        }
        
        .btn-outline {
            background: transparent;
            color: var(--brand-primary);
            font-weight: 600;
            padding: 12px 28px;
            border: 2px solid var(--brand-primary);
            border-radius: 4px;
            transition: all 0.3s ease;
        }
        .btn-outline:hover {
            background: var(--brand-primary);
            color: var(--brand-text);
        }
        
        @keyframes fade-in-up {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .animate-fade-in-up {
            animation: fade-in-up 0.8s ease-out forwards;
        }
        
        /* Product Slider Styles */
        .product-slider-container {
            margin: 0 -8px;
            padding: 8px;
        }
        .product-slider-track {
            display: flex;
            gap: 24px;
        }
        .product-slide {
            flex-shrink: 0;
        }
    </style>
</head>
<body class="bg-white text-gray-800 font-body antialiased">
    <div class="relative flex min-h-screen w-full flex-col">

        {{-- ===== NAVIGATION ===== --}}
        <nav class="fixed w-full z-50 glass-header border-b border-gray-200 transition-all duration-300">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-20">
                    <a href="/" class="flex-shrink-0 flex items-center gap-3 cursor-pointer">
                        <img src="{{ asset('image/Logo Tách Nền.png') }}" alt="GemLock Logo" class="h-12 w-auto" />
                    </a>
                    <div class="hidden md:flex items-center space-x-8">
                        <a class="text-sm font-medium text-gray-700 hover:text-primary transition-colors" href="/">Trang chủ</a>
                        <a class="text-sm font-medium text-gray-700 hover:text-primary transition-colors" href="/product">Sản phẩm</a>
                        <a class="text-sm font-medium text-gray-700 hover:text-primary transition-colors" href="/blog">Bài viết</a>
                        <a class="text-sm font-medium text-gray-700 hover:text-primary transition-colors" href="/contact">Liên hệ</a>
                    </div>
                    <div class="flex items-center space-x-4">
                        <a href="tel:0967263944" class="hidden md:inline-flex items-center justify-center gap-2 px-5 py-2.5 text-sm font-bold rounded btn-primary">
                            <span class="material-icons text-sm">phone</span>
                            0967 263 944
                        </a>
                        <button class="md:hidden text-gray-700">
                            <span class="material-symbols-outlined text-2xl">menu</span>
                        </button>
                    </div>
                </div>
            </div>
        </nav>

        {{-- ===== HERO SLIDER (FPT Style) ===== --}}
        <section class="relative pt-20" id="hero-slider">
            <div class="hero-slider-inner">
                <div class="hero-slides">
                    <div class="hero-slide active" data-slide="0" style="background-image: url('{{ asset('furni/images/couch.png') }}');"></div>
                    <div class="hero-slide" data-slide="1" style="background-image: url('{{ asset('image/solar.png') }}');"></div>
                    <div class="hero-slide" data-slide="2" style="background-image: url('{{ asset('image/banner perfect.png') }}');"></div>
                </div>
                <div class="hero-slider-dots">
                    <button type="button" class="hero-dot active" data-index="0" aria-label="Slide 1"></button>
                    <button type="button" class="hero-dot" data-index="1" aria-label="Slide 2"></button>
                    <button type="button" class="hero-dot" data-index="2" aria-label="Slide 3"></button>
                </div>
                <button type="button" class="hero-slider-prev" aria-label="Slide trước">
                    <span class="material-icons">chevron_left</span>
                </button>
                <button type="button" class="hero-slider-next" aria-label="Slide sau">
                    <span class="material-icons">chevron_right</span>
                </button>
            </div>
        </section>

        {{-- ===== PRODUCTS SECTIONS BY CATEGORY ===== --}}
        <main id="products" class="py-8 space-y-8 bg-gray-50">
            @foreach($groupedProducts as $groupIndex => $group)
            <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" data-category="{{ $group['category']['slug'] }}">
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center gap-3">
                        <span class="material-icons text-primary text-3xl">{{ $group['category']['icon'] }}</span>
                        <h2 class="text-2xl font-display font-bold text-gray-900 uppercase tracking-wide">{{ $group['category']['name'] }}</h2>
                    </div>
                    <div class="flex items-center gap-2">
                        <button type="button" class="category-slider-prev w-10 h-10 rounded-full bg-white border border-gray-200 flex items-center justify-center hover:bg-primary hover:border-primary hover:text-brand-text transition-all shadow-sm" data-category="{{ $group['category']['slug'] }}">
                            <span class="material-icons">chevron_left</span>
                        </button>
                        <button type="button" class="category-slider-next w-10 h-10 rounded-full bg-white border border-gray-200 flex items-center justify-center hover:bg-primary hover:border-primary hover:text-brand-text transition-all shadow-sm" data-category="{{ $group['category']['slug'] }}">
                            <span class="material-icons">chevron_right</span>
                        </button>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
                    {{-- Video Card bên trái --}}
                    <div class="lg:col-span-1 bg-white rounded-lg overflow-hidden shadow-xl border border-gray-100 flex flex-col group">
                        <div class="relative h-48 lg:h-56 overflow-hidden">
                            <img alt="{{ $group['category']['name'] }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" src="{{ $group['category']['image'] }}"/>
                            <div class="absolute inset-0 bg-black/40 flex items-center justify-center">
                                <button class="w-12 h-12 bg-primary/90 rounded-full flex items-center justify-center text-white hover:bg-white hover:text-primary transition-colors">
                                    <span class="material-icons">play_arrow</span>
                                </button>
                            </div>
                            <div class="absolute bottom-0 left-0 w-full p-4 bg-gradient-to-t from-black to-transparent">
                                <span class="text-xs font-bold text-primary uppercase">{{ $group['category']['series'] }}</span>
                            </div>
                        </div>
                        <div class="p-6 flex-1 flex flex-col">
                            <h3 class="text-lg font-bold text-gray-900 mb-4">{{ $group['category']['title'] }}</h3>
                            <ul class="space-y-3 mb-6 text-sm text-gray-600">
                                @foreach($group['category']['features'] as $feature)
                                <li class="flex items-start gap-2">
                                    <span class="material-icons text-primary text-base mt-0.5">{{ $feature['icon'] }}</span>
                                    {{ $feature['text'] }}
                                </li>
                                @endforeach
                            </ul>
                            <a href="/product" class="mt-auto w-full py-2.5 btn-outline text-sm uppercase text-center">
                                Xem tất cả
                            </a>
                        </div>
                    </div>
                    
                    {{-- Products Slider bên phải (Drag to scroll) --}}
                    <div class="lg:col-span-3">
                        <div class="category-slider-container relative overflow-hidden cursor-grab active:cursor-grabbing" data-category="{{ $group['category']['slug'] }}">
                            <div class="category-slider-track flex gap-6 transition-transform duration-300 ease-out" data-category="{{ $group['category']['slug'] }}">
                                @foreach($group['products'] as $index => $product)
                                <div class="product-slide flex-shrink-0 w-[280px] sm:w-[260px]">
                                    <a href="{{ route('product.detail', $product['slug']) }}" class="block bg-white rounded-lg p-6 relative group border border-gray-100 hover:border-primary/50 hover:shadow-lg transition-all duration-300 h-full">
                                        @if($index === 0)
                                        <div class="absolute top-4 right-4 z-10">
                                            <span class="px-2 py-1 bg-primary text-black text-xs font-bold rounded-sm">HOT</span>
                                        </div>
                                        @endif
                                        <div class="h-48 flex items-center justify-center mb-4 relative">
                                            <div class="absolute w-24 h-24 bg-primary/20 rounded-full filter blur-xl opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                            <img alt="{{ $product['name'] }}" class="h-full object-contain mix-blend-multiply rounded-md" src="{{ $product['image'] }}"/>
                                        </div>
                                        <h3 class="text-base font-bold text-gray-900 mb-1 group-hover:text-primary transition-colors line-clamp-2">{{ $product['name'] }}</h3>
                                        <p class="text-xs text-gray-500 mb-3 line-clamp-2">{{ $product['description'] }}</p>
                                        <div class="flex items-end justify-between">
                                            <span class="text-lg font-bold text-primary">{{ $product['price'] }}</span>
                                            <span class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center group-hover:bg-primary group-hover:text-black transition-colors">
                                                <span class="material-icons text-sm">add</span>
                                            </span>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @endforeach
        </main>

        {{-- ===== STATS SECTION ===== --}}
        <section class="py-12 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="stats-wrapper rounded-3xl p-10 md:p-16" style="background: linear-gradient(135deg, #D4A800 0%, #E6B800 50%, #D4A800 100%); box-shadow: 0 20px 50px rgba(212, 168, 0, 0.35);">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                        <div class="stats-item">
                            <h3 class="text-4xl md:text-5xl font-display font-black text-brand-text stats-number" data-target="5">0</h3>
                            <p class="text-sm text-brand-text/80 mt-2">Năm kinh nghiệm</p>
                        </div>
                        <div class="stats-item">
                            <h3 class="text-4xl md:text-5xl font-display font-black text-brand-text stats-number" data-target="1000">0</h3>
                            <p class="text-sm text-brand-text/80 mt-2">Khách hàng tin tưởng</p>
                        </div>
                        <div class="stats-item">
                            <h3 class="text-4xl md:text-5xl font-display font-black text-brand-text stats-number" data-target="50">0</h3>
                            <p class="text-sm text-brand-text/80 mt-2">Nhân sự chuyên môn</p>
                        </div>
                        <div class="stats-item">
                            <h3 class="text-4xl md:text-5xl font-display font-black text-brand-text stats-number" data-target="99">0</h3>
                            <p class="text-sm text-brand-text/80 mt-2">% Hoàn thành xuất sắc</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- ===== TESTIMONIALS SECTION ===== --}}
        <section class="py-12 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-10">
                    <h2 class="text-3xl md:text-4xl font-display font-bold text-gray-900 mb-4">Khách hàng <span class="text-primary">Nói gì</span></h2>
                    <p class="text-gray-500 max-w-2xl mx-auto">Sự hài lòng của khách hàng là thước đo thành công lớn nhất của chúng tôi.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100 hover:border-primary/30 transition-all">
                        <div class="flex items-center gap-4 mb-6">
                            <img src="{{ asset('furni/images/person_1.jpg') }}" alt="Khách hàng" class="w-14 h-14 rounded-full object-cover"/>
                            <div>
                                <p class="font-bold text-gray-900">Anh Hoàng</p>
                                <p class="text-sm text-primary">Khóa thông minh</p>
                            </div>
                        </div>
                        <p class="text-gray-600 italic">"Từ khi lắp đặt khóa GemLock, tôi cảm thấy rất an tâm mỗi khi vắng nhà. Công nghệ vân tay rất nhạy và tiện lợi."</p>
                        <div class="flex gap-1 mt-4 text-primary">
                            <span class="material-icons text-sm">star</span>
                            <span class="material-icons text-sm">star</span>
                            <span class="material-icons text-sm">star</span>
                            <span class="material-icons text-sm">star</span>
                            <span class="material-icons text-sm">star</span>
                        </div>
                    </div>
                    <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100 hover:border-primary/30 transition-all">
                        <div class="flex items-center gap-4 mb-6">
                            <img src="{{ asset('furni/images/person_2.jpg') }}" alt="Khách hàng" class="w-14 h-14 rounded-full object-cover"/>
                            <div>
                                <p class="font-bold text-gray-900">Chị Lan</p>
                                <p class="text-sm text-primary">Điện mặt trời</p>
                            </div>
                        </div>
                        <p class="text-gray-600 italic">"Hệ thống điện mặt trời GemSolar giúp gia đình tôi tiết kiệm đáng kể chi phí tiền điện hàng tháng. Dịch vụ lắp đặt rất chuyên nghiệp."</p>
                        <div class="flex gap-1 mt-4 text-primary">
                            <span class="material-icons text-sm">star</span>
                            <span class="material-icons text-sm">star</span>
                            <span class="material-icons text-sm">star</span>
                            <span class="material-icons text-sm">star</span>
                            <span class="material-icons text-sm">star</span>
                        </div>
                    </div>
                    <div class="bg-white rounded-2xl p-8 shadow-lg border border-gray-100 hover:border-primary/30 transition-all">
                        <div class="flex items-center gap-4 mb-6">
                            <img src="{{ asset('furni/images/person_3.jpg') }}" alt="Khách hàng" class="w-14 h-14 rounded-full object-cover"/>
                            <div>
                                <p class="font-bold text-gray-900">Anh Minh</p>
                                <p class="text-sm text-primary">Cửa kính văn phòng</p>
                            </div>
                        </div>
                        <p class="text-gray-600 italic">"Khóa cửa kính GemLock cho văn phòng hoạt động ổn định, tích hợp chấm công tiện lợi. Đội ngũ hỗ trợ nhiệt tình."</p>
                        <div class="flex gap-1 mt-4 text-primary">
                            <span class="material-icons text-sm">star</span>
                            <span class="material-icons text-sm">star</span>
                            <span class="material-icons text-sm">star</span>
                            <span class="material-icons text-sm">star</span>
                            <span class="material-icons text-sm">star_half</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- ===== FAQ SECTION ===== --}}
        <section class="py-12 bg-white">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-10">
                    <h2 class="text-3xl md:text-4xl font-display font-bold text-gray-900 mb-4">Câu hỏi <span class="text-primary">Thường gặp</span></h2>
                    <p class="text-gray-500">Giải đáp thắc mắc của bạn về sản phẩm và dịch vụ của chúng tôi.</p>
                </div>
                <div class="space-y-4">
                    <div class="faq-item bg-gray-50 rounded-xl overflow-hidden border border-gray-100">
                        <button class="faq-question w-full flex items-center justify-between p-6 text-left" onclick="toggleFaq(this)">
                            <span class="font-bold text-gray-900">Khóa thông minh GemLock có an toàn không?</span>
                            <span class="material-icons text-primary faq-icon transition-transform">expand_more</span>
                        </button>
                        <div class="faq-answer px-6 pb-6 hidden">
                            <p class="text-gray-600">Có, GemLock sử dụng công nghệ bảo mật tiên tiến nhất, bao gồm mã hóa AES-256, chip bảo mật riêng biệt và các cảm biến chống phá vỡ, giúp bảo vệ ngôi nhà của bạn an toàn tuyệt đối.</p>
                        </div>
                    </div>
                    <div class="faq-item bg-gray-50 rounded-xl overflow-hidden border border-gray-100">
                        <button class="faq-question w-full flex items-center justify-between p-6 text-left" onclick="toggleFaq(this)">
                            <span class="font-bold text-gray-900">Lợi ích của điện mặt trời GemSolar là gì?</span>
                            <span class="material-icons text-primary faq-icon transition-transform">expand_more</span>
                        </button>
                        <div class="faq-answer px-6 pb-6 hidden">
                            <p class="text-gray-600">GemSolar giúp tiết kiệm từ 40-70% hóa đơn tiền điện, hoàn vốn nhanh trong 3-5 năm và thân thiện với môi trường. Hệ thống có tuổi thọ lên đến 25 năm với bảo hành toàn diện.</p>
                        </div>
                    </div>
                    <div class="faq-item bg-gray-50 rounded-xl overflow-hidden border border-gray-100">
                        <button class="faq-question w-full flex items-center justify-between p-6 text-left" onclick="toggleFaq(this)">
                            <span class="font-bold text-gray-900">GemLock có cung cấp dịch vụ lắp đặt không?</span>
                            <span class="material-icons text-primary faq-icon transition-transform">expand_more</span>
                        </button>
                        <div class="faq-answer px-6 pb-6 hidden">
                            <p class="text-gray-600">Có, chúng tôi cung cấp dịch vụ tư vấn, thiết kế và lắp đặt trọn gói trên toàn quốc. Đội ngũ kỹ thuật viên được đào tạo chuyên nghiệp, đảm bảo chất lượng và sự hài lòng cho khách hàng.</p>
                        </div>
                    </div>
                    <div class="faq-item bg-gray-50 rounded-xl overflow-hidden border border-gray-100">
                        <button class="faq-question w-full flex items-center justify-between p-6 text-left" onclick="toggleFaq(this)">
                            <span class="font-bold text-gray-900">Chính sách bảo hành như thế nào?</span>
                            <span class="material-icons text-primary faq-icon transition-transform">expand_more</span>
                        </button>
                        <div class="faq-answer px-6 pb-6 hidden">
                            <p class="text-gray-600">Tất cả sản phẩm GemLock được bảo hành chính hãng 24 tháng cho linh kiện cơ khí và 12 tháng cho linh kiện điện tử. Hỗ trợ kỹ thuật trọn đời và đổi trả trong 30 ngày nếu không hài lòng.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- ===== CTA SECTION ===== --}}
        <section class="py-12 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="rounded-3xl p-10 md:p-16 text-center relative overflow-hidden" style="background: linear-gradient(135deg, #D4A800 0%, #E6B800 50%, #D4A800 100%); box-shadow: 0 20px 50px rgba(212, 168, 0, 0.35);">
                    <h2 class="text-3xl md:text-4xl font-display font-bold text-brand-text mb-4">Kết nối <span class="underline underline-offset-4">Tương lai</span></h2>
                    <p class="text-brand-text/90 max-w-2xl mx-auto mb-8">Liên hệ với chúng tôi để bắt đầu hành trình nâng tầm không gian sống với giải pháp Smart Home và Năng lượng sạch.</p>
                    <a href="/contact" class="inline-flex items-center gap-2 px-8 py-4 bg-brand-text text-primary font-bold rounded-full hover:bg-brand-text/90 transition-all shadow-lg">
                        Liên hệ ngay
                        <span class="material-icons">arrow_forward</span>
                    </a>
                </div>
            </div>
        </section>

        {{-- ===== TRUST SECTION ===== --}}
        <section class="py-8 bg-white border-t border-gray-200">
            <div class="container mx-auto px-6 max-w-7xl">
                <div class="flex flex-wrap justify-center gap-8 md:gap-16">
                    <div class="flex items-center gap-3">
                        <span class="material-symbols-outlined text-3xl text-primary">workspace_premium</span>
                        <div class="flex flex-col">
                            <span class="text-gray-900 font-bold text-sm uppercase">Bảo hành 2 năm</span>
                            <span class="text-xs text-gray-500">Toàn bộ linh kiện cơ khí</span>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="material-symbols-outlined text-3xl text-primary">support_agent</span>
                        <div class="flex flex-col">
                            <span class="text-gray-900 font-bold text-sm uppercase">Hỗ trợ 24/7</span>
                            <span class="text-xs text-gray-500">Kỹ thuật trọn đời</span>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="material-symbols-outlined text-3xl text-primary">local_shipping</span>
                        <div class="flex flex-col">
                            <span class="text-gray-900 font-bold text-sm uppercase">Miễn phí vận chuyển</span>
                            <span class="text-xs text-gray-500">Toàn quốc</span>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="material-symbols-outlined text-3xl text-primary">published_with_changes</span>
                        <div class="flex flex-col">
                            <span class="text-gray-900 font-bold text-sm uppercase">Đổi trả 30 ngày</span>
                            <span class="text-xs text-gray-500">Hoàn tiền 100%</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- ===== FOOTER ===== --}}
        <footer class="bg-gray-50 text-gray-600 border-t border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
                    <div class="col-span-1 md:col-span-1">
                        <div class="flex items-center gap-2 mb-6">
                            <img src="{{ asset('image/Logo Tách Nền.png') }}" alt="Perfect House Logo" class="h-12 w-auto" />
                        </div>
                        <p class="text-sm leading-relaxed mb-6">
                            Perfect House Việt Nam - Kết nối tương lai. Chuyên cung cấp giải pháp Smart Home và Năng lượng sạch.
                        </p>
                        <div class="flex space-x-4">
                            <a class="text-gray-400 hover:text-primary transition-colors" href="https://facebook.com/" target="_blank"><span class="material-icons">facebook</span></a>
                            <a class="text-gray-400 hover:text-primary transition-colors" href="https://youtube.com/" target="_blank"><span class="material-icons">smart_display</span></a>
                            <a class="text-gray-400 hover:text-primary transition-colors" href="https://zalo.me/" target="_blank"><span class="material-icons">chat</span></a>
                        </div>
                    </div>
                    <div>
                        <h4 class="text-gray-900 font-bold uppercase tracking-wider mb-6">Công ty</h4>
                        <ul class="space-y-4 text-sm">
                            <li><a class="hover:text-primary transition-colors" href="/">Trang chủ</a></li>
                            <li><a class="hover:text-primary transition-colors" href="/about">Giới thiệu</a></li>
                            <li><a class="hover:text-primary transition-colors" href="/blog">Tin tức</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-gray-900 font-bold uppercase tracking-wider mb-6">Thêm</h4>
                        <ul class="space-y-4 text-sm">
                            <li><a class="hover:text-primary transition-colors" href="/testimonial">Cảm nhận</a></li>
                            <li><a class="hover:text-primary transition-colors" href="/contact">Liên hệ</a></li>
                            <li><a class="hover:text-primary transition-colors" href="/privacy-policy">Chính sách bảo mật</a></li>
                            <li><a class="hover:text-primary transition-colors" href="/terms-conditions">Điều khoản sử dụng</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-gray-900 font-bold uppercase tracking-wider mb-6">Liên Hệ</h4>
                        <ul class="space-y-4 text-sm">
                            <li class="flex items-center gap-3">
                                <span class="material-icons text-primary text-sm">phone</span>
                                <a href="tel:0967263944" class="hover:text-primary">0967 263 944</a>
                            </li>
                            <li class="flex items-center gap-3">
                                <span class="material-icons text-primary text-sm">email</span>
                                <span>support@gemcorp.vn</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="border-t border-gray-200 mt-8 pt-6 flex flex-col md:flex-row justify-between items-center gap-4">
                    <img src="{{ asset('image/Logo Tách Nền.png') }}" alt="Perfect House Logo" class="h-10 w-auto" />
                    <p class="text-xs">Copyright © {{ date('Y') }} Perfect House Việt Nam.</p>
                </div>
            </div>
        </footer>

    </div>

    {{-- ===== SCRIPTS ===== --}}
    <script>
        // FAQ Toggle
        function toggleFaq(btn) {
            var item = btn.closest('.faq-item');
            var answer = item.querySelector('.faq-answer');
            var icon = btn.querySelector('.faq-icon');
            
            answer.classList.toggle('hidden');
            icon.style.transform = answer.classList.contains('hidden') ? 'rotate(0deg)' : 'rotate(180deg)';
        }

        document.addEventListener('DOMContentLoaded', function () {
            // Hero Slider
            var heroSlider = document.getElementById('hero-slider');
            if (heroSlider) {
                var slides = heroSlider.querySelectorAll('.hero-slide');
                var dots = heroSlider.querySelectorAll('.hero-dot');
                var btnPrev = heroSlider.querySelector('.hero-slider-prev');
                var btnNext = heroSlider.querySelector('.hero-slider-next');
                var total = slides.length;
                var current = 0;
                var autoplayTimer;

                function goTo(i) {
                    current = (i + total) % total;
                    slides.forEach(function(s, idx) {
                        s.classList.toggle('active', idx === current);
                    });
                    dots.forEach(function(d, idx) {
                        d.classList.toggle('active', idx === current);
                    });
                }

                function next() { goTo(current + 1); }
                function prev() { goTo(current - 1); }

                function startAutoplay() {
                    clearInterval(autoplayTimer);
                    autoplayTimer = setInterval(next, 5000);
                }

                dots.forEach(function(dot, i) {
                    dot.addEventListener('click', function() { goTo(i); startAutoplay(); });
                });

                if (btnPrev) btnPrev.addEventListener('click', function() { prev(); startAutoplay(); });
                if (btnNext) btnNext.addEventListener('click', function() { next(); startAutoplay(); });

                startAutoplay();
            }

            // Category Product Sliders with Drag to Scroll
            document.querySelectorAll('.category-slider-container').forEach(function(container) {
                var category = container.dataset.category;
                var track = container.querySelector('.category-slider-track');
                var prevBtn = document.querySelector('.category-slider-prev[data-category="' + category + '"]');
                var nextBtn = document.querySelector('.category-slider-next[data-category="' + category + '"]');
                
                if (!track) return;
                
                var productSlides = track.querySelectorAll('.product-slide');
                var slideWidth = 284;
                var currentScroll = 0;
                var isDragging = false;
                var startX = 0;
                var scrollLeft = 0;

                function getMaxScroll() {
                    var visibleSlides = Math.floor(container.offsetWidth / slideWidth);
                    return Math.max((productSlides.length - visibleSlides) * slideWidth, 0);
                }

                function updateSlider() {
                    track.style.transform = 'translateX(-' + currentScroll + 'px)';
                }

                // Button navigation
                if (nextBtn) {
                    nextBtn.addEventListener('click', function() {
                        var maxScroll = getMaxScroll();
                        if (currentScroll >= maxScroll) {
                            currentScroll = 0;
                        } else {
                            currentScroll = Math.min(currentScroll + slideWidth, maxScroll);
                        }
                        updateSlider();
                    });
                }

                if (prevBtn) {
                    prevBtn.addEventListener('click', function() {
                        var maxScroll = getMaxScroll();
                        if (currentScroll <= 0) {
                            currentScroll = maxScroll;
                        } else {
                            currentScroll = Math.max(currentScroll - slideWidth, 0);
                        }
                        updateSlider();
                    });
                }

                // Drag to scroll
                container.addEventListener('mousedown', function(e) {
                    isDragging = true;
                    startX = e.pageX - container.offsetLeft;
                    scrollLeft = currentScroll;
                    track.style.transition = 'none';
                });

                container.addEventListener('mouseleave', function() {
                    isDragging = false;
                    track.style.transition = 'transform 0.3s ease-out';
                });

                container.addEventListener('mouseup', function() {
                    isDragging = false;
                    track.style.transition = 'transform 0.3s ease-out';
                });

                container.addEventListener('mousemove', function(e) {
                    if (!isDragging) return;
                    e.preventDefault();
                    var x = e.pageX - container.offsetLeft;
                    var walk = (startX - x) * 1.5;
                    currentScroll = Math.max(0, Math.min(scrollLeft + walk, getMaxScroll()));
                    updateSlider();
                });

                // Touch support
                container.addEventListener('touchstart', function(e) {
                    isDragging = true;
                    startX = e.touches[0].pageX - container.offsetLeft;
                    scrollLeft = currentScroll;
                    track.style.transition = 'none';
                });

                container.addEventListener('touchend', function() {
                    isDragging = false;
                    track.style.transition = 'transform 0.3s ease-out';
                });

                container.addEventListener('touchmove', function(e) {
                    if (!isDragging) return;
                    var x = e.touches[0].pageX - container.offsetLeft;
                    var walk = (startX - x) * 1.5;
                    currentScroll = Math.max(0, Math.min(scrollLeft + walk, getMaxScroll()));
                    updateSlider();
                });
            });

            // Stats Counter Animation
            var statsAnimated = false;
            var statsWrapper = document.querySelector('.stats-wrapper');
            
            function animateStats() {
                if (statsAnimated) return;
                
                document.querySelectorAll('.stats-number').forEach(function(counter) {
                    var target = parseInt(counter.dataset.target);
                    var suffix = target === 99 ? '%' : '+';
                    var duration = 2000;
                    var startTime = null;

                    function animate(currentTime) {
                        if (!startTime) startTime = currentTime;
                        var progress = Math.min((currentTime - startTime) / duration, 1);
                        var current = Math.floor(progress * target);
                        counter.textContent = current.toLocaleString() + suffix;
                        
                        if (progress < 1) {
                            requestAnimationFrame(animate);
                        } else {
                            counter.textContent = target.toLocaleString() + suffix;
                        }
                    }
                    requestAnimationFrame(animate);
                });
                statsAnimated = true;
            }

            // Intersection Observer for stats animation
            if (statsWrapper) {
                var observer = new IntersectionObserver(function(entries) {
                    entries.forEach(function(entry) {
                        if (entry.isIntersecting) {
                            animateStats();
                            observer.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.5 });
                observer.observe(statsWrapper);
            }
        });
    </script>
</body>
</html>
