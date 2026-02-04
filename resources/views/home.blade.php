@extends('layouts.app')

@section('title', 'GemLock - Trang chủ')

@section('content')
    @include('partials.header')

    {{-- Hero Slider - Giống ảnh FPT Style --}}
    <section class="hero-slider-section" id="hero-slider">
        <div class="hero-slider-wrapper">
            <div class="hero-slides">
                <div class="hero-slide active" data-slide="0">
                    <img src="{{ asset('image/solar.png') }}" alt="Slide 1" />
                </div>
                <div class="hero-slide" data-slide="1">
                    <img src="{{ asset('furni/images/couch.png') }}" alt="Slide 2" />
                </div>
                <div class="hero-slide" data-slide="2">
                    <img src="{{ asset('image/banner perfect.png') }}" alt="Slide 3" />
                </div>
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
    <section class="gallery section-tint">
        <div class="w-layout-blockcontainer container w-container">
            <div data-w-id="a8b3ed35-d0d6-484a-a7de-5e4e34eccb6d" class="gallery-content-wrapper">
                <div class="title">
                    <h1 class="heading-h2">Sản phẩm & <span class="text-span">Giải pháp</span></h1>
                    <p class="hero-subtitle">Perfect House cung cấp giải pháp thông minh và bền vững cho ngôi nhà của
                        bạn.</p>
                </div><a data-w-id="7a0890ec-d742-e9b4-eddc-c0ce1ae0ce88" href="/about"
                    class="secondary-button w-inline-block">
                    <p>Tìm hiểu thêm</p>
                    <div class="arrow-wrapper"><img loading="lazy"
                            src="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c2/69420cbdd4e2e39b5eb77ac0_arrow-up-right.svg"
                            alt="Right ICon" /></div>
                </a>
            </div>
        </div>
        <div class="gallery-slider">
            <div class="gallery-track">
                <!-- Set 1 -->
                <img src="{{ asset('furni/images/img-grid-1.jpg') }}" loading="lazy" alt="Gallery Image"
                    class="gallery-item img-tall" />
                <img src="{{ asset('furni/images/img-grid-2.jpg') }}" loading="lazy" alt="Gallery Image"
                    class="gallery-item img-short" />
                <img src="{{ asset('image/solar.png') }}" loading="lazy" alt="Gallery Image"
                    class="gallery-item img-tall" />
                <img src="{{ asset('image/perfect_house_09.png') }}" loading="lazy" alt="Gallery Image"
                    class="gallery-item img-short" />
                <img src="{{ asset('furni/images/img-grid-3.jpg') }}" loading="lazy" alt="Gallery Image"
                    class="gallery-item img-tall" />
                <img src="{{ asset('image/banner perfect.png') }}" loading="lazy" alt="Gallery Image"
                    class="gallery-item img-short" />

                <!-- Set 2 (Duplicate for loop) -->
                <img src="{{ asset('furni/images/img-grid-1.jpg') }}" loading="lazy" alt="Gallery Image"
                    class="gallery-item img-tall" />
                <img src="{{ asset('furni/images/img-grid-2.jpg') }}" loading="lazy" alt="Gallery Image"
                    class="gallery-item img-short" />
                <img src="{{ asset('image/solar.png') }}" loading="lazy" alt="Gallery Image"
                    class="gallery-item img-tall" />
                <img src="{{ asset('image/perfect_house_09.png') }}" loading="lazy" alt="Gallery Image"
                    class="gallery-item img-short" />
                <img src="{{ asset('furni/images/img-grid-3.jpg') }}" loading="lazy" alt="Gallery Image"
                    class="gallery-item img-tall" />
                <img src="{{ asset('image/banner perfect.png') }}" loading="lazy" alt="Gallery Image"
                    class="gallery-item img-short" />
            </div>
        </div>
    </section>
    {{-- ===== PRODUCTS SECTIONS BY CATEGORY ===== --}}
    @foreach($groupedProducts as $groupIndex => $group)
    <section class="category-section {{ $groupIndex % 2 == 0 ? 'section-white' : 'section-tint' }}" data-category="{{ $group['category']['slug'] }}" style="padding: 50px 0;">
        <div class="w-layout-blockcontainer container w-container">
            <div class="category-header" style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 24px; padding-bottom: 16px; border-bottom: 2px solid rgba(212,168,0,0.2);">
                <div style="display: flex; align-items: center; gap: 14px;">
                    <span class="material-icons" style="font-size: 36px; color: #D4A800;">{{ $group['category']['icon'] }}</span>
                    <h2 class="heading-h2" style="margin: 0; font-size: 24px;">{{ $group['category']['name'] }}</h2>
                </div>
                <div style="display: flex; gap: 10px;">
                    <button type="button" class="category-slider-prev slider-btn" data-category="{{ $group['category']['slug'] }}">
                        <span class="material-icons">chevron_left</span>
                    </button>
                    <button type="button" class="category-slider-next slider-btn" data-category="{{ $group['category']['slug'] }}">
                        <span class="material-icons">chevron_right</span>
                    </button>
                </div>
            </div>
            
            <div class="category-grid">
                {{-- Video Card bên trái --}}
                <div class="video-card">
                    <div class="video-card-image">
                        <img alt="{{ $group['category']['name'] }}" src="{{ $group['category']['image'] }}"/>
                        <div class="video-card-overlay">
                            <button class="play-btn">
                                <span class="material-icons">play_arrow</span>
                            </button>
                        </div>
                        <div class="video-card-label">
                            <span>{{ $group['category']['series'] }}</span>
                        </div>
                    </div>
                    <div class="video-card-content">
                        <h3>{{ $group['category']['title'] }}</h3>
                        <ul>
                            @foreach($group['category']['features'] as $feature)
                            <li>
                                <span class="material-icons">{{ $feature['icon'] }}</span>
                                {{ $feature['text'] }}
                            </li>
                            @endforeach
                        </ul>
                        <a href="/product" class="btn-view-all">Xem tất cả</a>
                    </div>
                </div>
                
                {{-- Products Slider bên phải --}}
                <div class="category-slider-container" data-category="{{ $group['category']['slug'] }}">
                    <div class="category-slider-track" data-category="{{ $group['category']['slug'] }}">
                        @foreach($group['products'] as $index => $product)
                        <div class="product-slide">
                            <a href="{{ route('product.detail', $product['slug']) }}" class="product-card">
                                @if($index === 0)
                                <span class="product-badge">HOT</span>
                                @endif
                                <div class="product-image">
                                    <div class="product-glow"></div>
                                    <img alt="{{ $product['name'] }}" src="{{ $product['image'] }}"/>
                                </div>
                                <h3 class="product-name">{{ $product['name'] }}</h3>
                                <p class="product-desc">{{ $product['description'] }}</p>
                                <div class="product-footer">
                                    <span class="product-price">{{ $product['price'] }}</span>
                                    <span class="product-add">
                                        <span class="material-icons">add</span>
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
    <section class="stats section-tint" style="padding: 80px 0;">
        <div class="w-layout-blockcontainer container w-container">
            <div data-w-id="8a627d31-0e76-5837-a07c-bc600c688747" class="stats-wrapper stats-brand"
                style="background: linear-gradient(135deg, #D4A800 0%, #E6B800 50%, #D4A800 100%); border-radius: 30px; padding: 60px 40px; color: #1a1000; display: flex; justify-content: space-around; align-items: center; box-shadow: 0 20px 50px rgba(212, 168, 0, 0.35); border: 2px solid rgba(184, 134, 11, 0.4);">
                <div class="stats-item">
                    <h2 class="large-stats-number">5+</h2>
                    <p class="large-stats-text opacity-76">Năm kinh nghiệm trong ngành</p>
                </div>
                <div class="stats-item">
                    <h2 class="large-stats-number">1,000+</h2>
                    <p class="large-stats-text opacity-76">Khách hàng tin tưởng và hài lòng</p>
                </div>
                <div class="stats-item">
                    <h2 class="large-stats-number">50+</h2>
                    <p class="large-stats-text opacity-76">Nhân sự chuyên môn cao</p>
                </div>
                <div class="stats-item">
                    <h2 class="large-stats-number">99%</h2>
                    <p class="large-stats-text opacity-76">Tỷ lệ hoàn thành dự án xuất sắc</p>
                </div>
            </div>
        </div>
    </section>
    <section class="testimonial section-white">
        <div class="w-layout-blockcontainer container w-container">
            <div data-w-id="8de69b20-474c-2e2d-f11b-e8d5589e390e" class="testimonial-content-wrapper">
                <div class="title _335">
                    <h1 class="heading-h2">Khách hàng <span class="text-span">Nói gì</span></h1>
                    <p class="subtitle">Sự hài lòng của khách hàng là thước đo thành công lớn nhất của chúng tôi.</p>
                </div>
                <div data-delay="4000" data-animation="cross" class="testimonial-slider w-slider" data-autoplay="false"
                    data-easing="linear" data-hide-arrows="false" data-disable-swipe="false" data-autoplay-limit="0"
                    data-nav-spacing="3" data-duration="500" data-infinite="true">
                    <div class="testimonial-silder-mask w-slider-mask">
                        <div class="testimonial-slide w-slide">
                            <div class="testimonial-card"><img src="{{ asset('furni/images/person_1.jpg') }}" loading="lazy"
                                    sizes="100vw" alt="Khách hàng" class="review-image" />
                                <div class="review-content">
                                    <p class="review-text">“Từ khi lắp đặt khóa GemLock, tôi cảm thấy rất an tâm mỗi khi
                                        vắng nhà. Công nghệ vân tay rất nhạy và tiện lợi.”</p>
                                    <div class="review-author">
                                        <p class="review-author-name">Anh Hoàng</p>
                                        <p class="reviewer-service">Khóa thông minh</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-slide w-slide">
                            <div class="testimonial-card"><img src="{{ asset('furni/images/person_2.jpg') }}" loading="lazy"
                                    sizes="100vw" alt="Khách hàng" class="review-image" />
                                <div class="review-content">
                                    <p class="review-text">“Hệ thống điện mặt trời GemSolar giúp gia đình tôi tiết kiệm đáng
                                        kể chi phí tiền điện hàng tháng. Dịch vụ lắp đặt rất chuyên nghiệp.”</p>
                                    <div class="review-author">
                                        <p class="review-author-name">Chị Lan</p>
                                        <p class="reviewer-service">Điện mặt trời</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-slide w-slide">
                            <div class="testimonial-card"><img
                                    src="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c2/69420cbdd4e2e39b5eb77afc_Image%20(32).png"
                                    loading="lazy"
                                    alt="Man in a pink checkered shirt sitting on a couch holding a glass of water and touching his forehead, facing a woman with a clipboard in a therapy session."
                                    class="review-image" />
                                <div class="review-content">
                                    <p class="review-text">“Thanks to the clinic’s care, our space has softly evolved
                                        into a place of balance. We communicate with gentle respect now, leaving every
                                        old frustration well behind.”</p>
                                    <div class="review-author">
                                        <p class="review-author-name">Michael Chen</p>
                                        <p class="reviewer-service">Depression Support</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="left-arrow w-slider-arrow-left"><img
                            src="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c2/69420cbdd4e2e39b5eb77afa_arrow-right%20(1).png"
                            loading="lazy" alt="Left-pointing arrow icon." class="arrow-icon" /></div>
                    <div class="right-arrow w-slider-arrow-right"><img
                            src="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c2/69420cbdd4e2e39b5eb77af9_arrow-right.png"
                            loading="lazy" alt="Right-pointing arrow icon." class="arrow-icon" /></div>
                </div>
            </div>
        </div>
    </section>
    <section class="faq section-tint">
        <div class="w-layout-blockcontainer container w-container">
            <div class="faq-content-wrapper">
                <div data-w-id="e6d22c1f-ed6d-610d-abb9-3b1ab855a577" class="title-2">
                    <h1 class="heading-h2">Câu hỏi thường gặp</h1>
                    <p class="subtitle _525px">Giải đáp thắc mắc của bạn về sản phẩm và dịch vụ của chúng tôi.</p>
                </div>
                <div class="faq-content">
                    <div data-w-id="e6d22c1f-ed6d-610d-abb9-3b1ab855a57d" class="faq-wrapper">
                        <div data-hover="false" data-delay="0" data-w-id="e6d22c1f-ed6d-610d-abb9-3b1ab855a57e"
                            class="single-faq w-dropdown">
                            <div class="question w-dropdown-toggle">
                                <div class="question-wrapper">
                                    <div>Khóa thông minh GemLock có an toàn không?</div><img
                                        src="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c2/69420cbdd4e2e39b5eb77afe_Chevron.png"
                                        loading="lazy" alt="Downward-facing chevron arrow icon." class="faq-icon" />
                                </div>
                            </div>
                            <nav class="answer w-dropdown-list">
                                <p class="faq-answer">Có, GemLock sử dụng công nghệ bảo mật tiên tiến nhất, giúp bảo vệ ngôi
                                    nhà của bạn an toàn tuyệt đối trước mọi nguy cơ.</p>
                            </nav>
                        </div>
                        <div class="faq-line"></div>
                        <div data-hover="false" data-delay="0" data-w-id="e6d22c1f-ed6d-610d-abb9-3b1ab855a588"
                            class="single-faq w-dropdown">
                            <div class="question w-dropdown-toggle">
                                <div class="question-wrapper">
                                    <div>Lợi ích của điện mặt trời GemSolar là gì?</div><img
                                        src="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c2/69420cbdd4e2e39b5eb77afe_Chevron.png"
                                        loading="lazy" alt="Downward-facing chevron arrow icon." class="faq-icon" />
                                </div>
                            </div>
                            <nav class="answer w-dropdown-list">
                                <p class="faq-answer">GemSolar giúp tiết kiệm từ 40-70% hóa đơn tiền điện, hoàn vốn nhanh và
                                    thân thiện với môi trường.</p>
                            </nav>
                        </div>
                        <div class="faq-line"></div>
                        <div data-hover="false" data-delay="0" data-w-id="e6d22c1f-ed6d-610d-abb9-3b1ab855a592"
                            class="single-faq w-dropdown">
                            <div class="question w-dropdown-toggle">
                                <div class="question-wrapper">
                                    <div>GemLock có cung cấp dịch vụ lắp đặt không?</div><img
                                        src="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c2/69420cbdd4e2e39b5eb77afe_Chevron.png"
                                        loading="lazy" alt="Downward-facing chevron arrow icon." class="faq-icon" />
                                </div>
                            </div>
                            <nav class="answer w-dropdown-list">
                                <p class="faq-answer">Có, chúng tôi cung cấp dịch vụ tư vấn, thiết kế và lắp đặt trọn gói,
                                    đảm bảo chất lượng và sự hài lòng cho khách hàng.</p>
                            </nav>
                        </div>
                        <div class="faq-line"></div>
                        <div data-hover="false" data-delay="0" data-w-id="e6d22c1f-ed6d-610d-abb9-3b1ab855a59c"
                            class="single-faq padding-none w-dropdown">
                            <div class="question w-dropdown-toggle">
                                <div class="question-wrapper">
                                    <div>Tại sao chọn GemLock?</div><img
                                        src="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c2/69420cbdd4e2e39b5eb77afe_Chevron.png"
                                        loading="lazy" alt="Downward-facing chevron arrow icon." class="faq-icon" />
                                </div>
                            </div>
                            <nav class="answer padding-none w-dropdown-list">
                                <p class="faq-answer">Bạn có thể liên hệ với chúng tôi qua số điện thoại hotline hoặc gửi
                                    email trực tiếp qua website.</p>
                            </nav>
                        </div>
                    </div><img src="{{ asset('image/perfect_house_09.png') }}" loading="lazy"
                        data-w-id="e6d22c1f-ed6d-610d-abb9-3b1ab855a5a5" alt="Perfect House Support" class="faq-image" />
                </div>
            </div>
        </div>
    </section>
    {{-- ===== NEWS SECTION ===== --}}
    <section class="news section-white" style="padding: 80px 0;">
        <div class="w-layout-blockcontainer container w-container">
            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 40px;">
                <div class="title">
                    <h1 class="heading-h2">Tin tức <span class="text-span">Mới nhất</span></h1>
                    <p class="hero-subtitle">Cập nhật những thông tin mới nhất về sản phẩm và công nghệ Smart Home.</p>
                </div>
                <a href="/blog" class="secondary-button w-inline-block" style="display: inline-flex; align-items: center; gap: 8px;">
                    <p style="margin: 0;">Xem tất cả</p>
                    <span class="material-icons" style="font-size: 18px;">arrow_forward</span>
                </a>
            </div>
            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 30px;">
                {{-- News Card 1 --}}
                <a href="/blog" style="text-decoration: none; display: block; background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 10px 40px rgba(0,0,0,0.08); border: 1px solid #f0f0f0; transition: all 0.3s ease;" class="news-card">
                    <div style="position: relative; height: 200px; overflow: hidden;">
                        <img src="{{ asset('furni/images/img-grid-1.jpg') }}" alt="News" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease;" />
                        <div style="position: absolute; top: 16px; left: 16px;">
                            <span style="padding: 6px 12px; background: #D4A800; color: #1a1000; font-size: 11px; font-weight: 700; border-radius: 20px; text-transform: uppercase;">Khóa thông minh</span>
                        </div>
                    </div>
                    <div style="padding: 24px;">
                        <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 12px; font-size: 13px; color: #888;">
                            <span style="display: flex; align-items: center; gap: 4px;">
                                <span class="material-icons" style="font-size: 16px;">calendar_today</span>
                                15/01/2026
                            </span>
                            <span style="display: flex; align-items: center; gap: 4px;">
                                <span class="material-icons" style="font-size: 16px;">schedule</span>
                                5 phút đọc
                            </span>
                        </div>
                        <h3 style="font-size: 18px; font-weight: 700; color: #1a1a1a; margin: 0 0 12px 0; line-height: 1.4;">Top 5 khóa thông minh bán chạy nhất năm 2026</h3>
                        <p style="font-size: 14px; color: #666; margin: 0; line-height: 1.6; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">Khám phá những mẫu khóa thông minh được người dùng Việt Nam yêu thích nhất với công nghệ tiên tiến và thiết kế sang trọng.</p>
                    </div>
                </a>
                
                {{-- News Card 2 --}}
                <a href="/blog" style="text-decoration: none; display: block; background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 10px 40px rgba(0,0,0,0.08); border: 1px solid #f0f0f0; transition: all 0.3s ease;" class="news-card">
                    <div style="position: relative; height: 200px; overflow: hidden;">
                        <img src="{{ asset('image/solar.png') }}" alt="News" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease;" />
                        <div style="position: absolute; top: 16px; left: 16px;">
                            <span style="padding: 6px 12px; background: #D4A800; color: #1a1000; font-size: 11px; font-weight: 700; border-radius: 20px; text-transform: uppercase;">Điện mặt trời</span>
                        </div>
                    </div>
                    <div style="padding: 24px;">
                        <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 12px; font-size: 13px; color: #888;">
                            <span style="display: flex; align-items: center; gap: 4px;">
                                <span class="material-icons" style="font-size: 16px;">calendar_today</span>
                                10/01/2026
                            </span>
                            <span style="display: flex; align-items: center; gap: 4px;">
                                <span class="material-icons" style="font-size: 16px;">schedule</span>
                                7 phút đọc
                            </span>
                        </div>
                        <h3 style="font-size: 18px; font-weight: 700; color: #1a1a1a; margin: 0 0 12px 0; line-height: 1.4;">Lợi ích của điện mặt trời cho gia đình Việt</h3>
                        <p style="font-size: 14px; color: #666; margin: 0; line-height: 1.6; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">Tìm hiểu cách điện mặt trời giúp tiết kiệm chi phí điện năng và bảo vệ môi trường cho ngôi nhà của bạn.</p>
                    </div>
                </a>
                
                {{-- News Card 3 --}}
                <a href="/blog" style="text-decoration: none; display: block; background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 10px 40px rgba(0,0,0,0.08); border: 1px solid #f0f0f0; transition: all 0.3s ease;" class="news-card">
                    <div style="position: relative; height: 200px; overflow: hidden;">
                        <img src="{{ asset('image/perfect_house_09.png') }}" alt="News" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease;" />
                        <div style="position: absolute; top: 16px; left: 16px;">
                            <span style="padding: 6px 12px; background: #D4A800; color: #1a1000; font-size: 11px; font-weight: 700; border-radius: 20px; text-transform: uppercase;">Smart Home</span>
                        </div>
                    </div>
                    <div style="padding: 24px;">
                        <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 12px; font-size: 13px; color: #888;">
                            <span style="display: flex; align-items: center; gap: 4px;">
                                <span class="material-icons" style="font-size: 16px;">calendar_today</span>
                                05/01/2026
                            </span>
                            <span style="display: flex; align-items: center; gap: 4px;">
                                <span class="material-icons" style="font-size: 16px;">schedule</span>
                                6 phút đọc
                            </span>
                        </div>
                        <h3 style="font-size: 18px; font-weight: 700; color: #1a1a1a; margin: 0 0 12px 0; line-height: 1.4;">Xu hướng Smart Home năm 2026: Những điều cần biết</h3>
                        <p style="font-size: 14px; color: #666; margin: 0; line-height: 1.6; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">Cập nhật những xu hướng công nghệ nhà thông minh mới nhất và cách áp dụng cho ngôi nhà của bạn.</p>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <section class="cta section-tint" style="padding: 100px 0;">
        <div class="w-layout-blockcontainer container w-container">
            <div data-w-id="a90f08e8-b8cb-0d7a-1c6e-ea4374ad5744" class="cta-content cta-brand"
                style="background: linear-gradient(135deg, #D4A800 0%, #E6B800 50%, #D4A800 100%); border-radius: 30px; padding: 80px 40px; position: relative; overflow: hidden; box-shadow: 0 20px 50px rgba(212, 168, 0, 0.35); border: 2px solid rgba(184, 134, 11, 0.4);">
                <div class="cta-text">
                    <div class="title-2">
                        <h1 class="heading-h2 white" style="color: #1a1000;">Kết nối <span class="text-span-2" style="color: #1a1000; font-weight: 700;">tương lai</span>
                        </h1>
                        <p class="cta-subtitle" style="color: #1a1000; opacity: 0.9;">Liên hệ với chúng tôi để bắt đầu hành trình nâng tầm
                            không gian sống của bạn
                            với giải pháp Smart Home và Năng lượng sạch.</p>
                    </div><a data-w-id="511fb6fc-d96d-c424-3b08-d14cbd2da632" href="/booking"
                        class="cta-button-secondary w-inline-block" style="background-color: #1a1000; color: #E6B800;">
                        <p>Liên hệ ngay</p>
                        <div class="arrow-wrapper"><img loading="lazy"
                                src="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c2/69420cbdd4e2e39b5eb77ae3_arrow-up-right%20(1).svg"
                                alt="Right Icon" style="filter: invert(1);" /></div>
                    </a>
                </div>
                <div data-w-id="a90f08e8-b8cb-0d7a-1c6e-ea4374ad574d" class="cta-line">
                    <div class="cta-image-wrapper"><img src="{{ asset('image/Logo Tách Nền.png') }}" loading="lazy"
                            data-w-id="a90f08e8-b8cb-0d7a-1c6e-ea4374ad574e" alt="Partner Brand" class="cta-avatar-image"
                            style="background: white; padding: 10px; border-radius: 50%; object-fit: contain;" /><img
                            src="https://content.pancake.vn/1/s750x750/fwebp/a0/10/53/ce/0c8b304d1a5c085e4718387faaa3e33a09f9f9b5dc201adb4b2db48d-w:5906-h:5906-l:419034-t:image/png.png"
                            loading="lazy" data-w-id="a90f08e8-b8cb-0d7a-1c6e-ea4374ad574f" alt="Partner Brand"
                            class="cta-avatar-image"
                            style="background: white; padding: 10px; border-radius: 50%; object-fit: contain;" /></div>
                    <div class="cta-image-wrapper vartical"><img
                            src="https://content.pancake.vn/1/s569x499/fwebp/07/26/cd/7b/6196f9de02559345bba69d77cd42f862fe5e878c55935a4fbd3720ce-w:4009-h:3509-l:303004-t:image/png.png"
                            loading="lazy" data-w-id="8841373c-85bc-8a3d-0925-3d73763368d2" alt="Partner Brand"
                            class="cta-avatar-image vartical"
                            style="background: white; padding: 10px; border-radius: 50%; object-fit: contain;" /><img
                            src="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c9/69420cbdd4e2e39b5eb779d5_Vector%20(7).svg"
                            loading="lazy" data-w-id="8841373c-85bc-8a3d-0925-3d73763368d3" alt="Partner Brand"
                            class="cta-avatar-image vartical"
                            style="background: white; padding: 10px; border-radius: 50%; object-fit: contain;" /></div>
                </div>
                <div data-w-id="a90f08e8-b8cb-0d7a-1c6e-ea4374ad5750" class="cta-line medium">
                    <div class="cta-image-wrapper"><img src="{{ asset('image/Logo Tách Nền.png') }}" loading="lazy"
                            data-w-id="a90f08e8-b8cb-0d7a-1c6e-ea4374ad5751" alt="Partner Brand" class="cta-avatar-image"
                            style="background: white; padding: 10px; border-radius: 50%; object-fit: contain;" /><img
                            src="https://content.pancake.vn/1/s750x750/fwebp/a0/10/53/ce/0c8b304d1a5c085e4718387faaa3e33a09f9f9b5dc201adb4b2db48d-w:5906-h:5906-l:419034-t:image/png.png"
                            loading="lazy" data-w-id="a90f08e8-b8cb-0d7a-1c6e-ea4374ad5752" alt="Partner Brand"
                            class="cta-avatar-image"
                            style="background: white; padding: 10px; border-radius: 50%; object-fit: contain;" /></div>
                    <div class="cta-image-wrapper vartical"><img
                            src="https://content.pancake.vn/1/s569x499/fwebp/07/26/cd/7b/6196f9de02559345bba69d77cd42f862fe5e878c55935a4fbd3720ce-w:4009-h:3509-l:303004-t:image/png.png"
                            loading="lazy" data-w-id="29a3c8a7-39f3-fbff-022b-959c6fa6b621" alt="Partner Brand"
                            class="cta-avatar-image vartical"
                            style="background: white; padding: 10px; border-radius: 50%; object-fit: contain;" /><img
                            src="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c9/69420cbdd4e2e39b5eb779d5_Vector%20(7).svg"
                            loading="lazy" data-w-id="29a3c8a7-39f3-fbff-022b-959c6fa6b622" alt="Partner Brand"
                            class="cta-avatar-image vartical"
                            style="background: white; padding: 10px; border-radius: 50%; object-fit: contain;" /></div>
                </div>
                <div data-w-id="a90f08e8-b8cb-0d7a-1c6e-ea4374ad5753" class="cta-line small">
                    <div class="cta-image-wrapper"><img src="{{ asset('image/Logo Tách Nền.png') }}" loading="lazy"
                            data-w-id="a90f08e8-b8cb-0d7a-1c6e-ea4374ad5754" alt="Partner Brand" class="cta-avatar-image"
                            style="background: white; padding: 10px; border-radius: 50%; object-fit: contain;" /><img
                            src="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c9/69420cbdd4e2e39b5eb779d3_Vector%20(5).svg"
                            loading="lazy" data-w-id="a90f08e8-b8cb-0d7a-1c6e-ea4374ad5755" alt="Partner Brand"
                            class="cta-avatar-image"
                            style="background: white; padding: 10px; border-radius: 50%; object-fit: contain;" /></div>
                    <div class="cta-image-wrapper vartical"><img
                            src="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c9/69420cbdd4e2e39b5eb779d4_Vector%20(6).svg"
                            loading="lazy" data-w-id="6f3df56e-b1e8-3726-8bf9-e8f61f1f2159" alt="Partner Brand"
                            class="cta-avatar-image vartical"
                            style="background: white; padding: 10px; border-radius: 50%; object-fit: contain;" /><img
                            src="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c9/69420cbdd4e2e39b5eb779d5_Vector%20(7).svg"
                            loading="lazy" data-w-id="6f3df56e-b1e8-3726-8bf9-e8f61f1f215a" alt="Partner Brand"
                            class="cta-avatar-image vartical"
                            style="background: white; padding: 10px; border-radius: 50%; object-fit: contain;" /></div>
                </div>
            </div>
        </div>
    </section>

    <style>
        /* === Trang chủ: màu thương hiệu + kích thích mua hàng === */
        .hero-brand {
            background: #D4A800 !important;
            padding: 0 !important;
            position: relative;
        }
        /* Hero Slider - FPT Style (giống ảnh) */
        .hero-slider-section {
            position: relative;
            background: linear-gradient(135deg, #fafafa 0%, #f5f5f5 50%, #fafafa 100%);
            padding: 0;
        }
        .hero-slider-wrapper {
            position: relative;
            width: 100%;
            min-height: calc(100vh - 80px);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .hero-slides {
            position: relative;
            width: 100%;
            height: calc(100vh - 80px);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .hero-slide {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.6s ease, visibility 0.6s ease;
            z-index: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 100px;
        }
        .hero-slide.active {
            opacity: 1;
            visibility: visible;
            z-index: 1;
        }
        .hero-slide img {
            max-width: 100%;
            max-height: 100%;
            width: auto;
            height: auto;
            object-fit: contain;
            border-radius: 8px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.15);
        }
        @media (max-width: 768px) {
            .hero-slide {
                padding: 20px 60px;
            }
        }
        
        /* Slider Buttons - Tròn trắng giống ảnh */
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
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            color: #333;
            cursor: pointer;
            z-index: 10;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }
        .hero-slider-prev:hover,
        .hero-slider-next:hover {
            background: #D4A800;
            border-color: #D4A800;
            color: #1a1000;
            box-shadow: 0 6px 25px rgba(212,168,0,0.35);
            transform: translateY(-50%) scale(1.05);
        }
        .hero-slider-prev .material-icons,
        .hero-slider-next .material-icons {
            font-size: 28px;
        }
        .hero-slider-prev { left: 24px; }
        .hero-slider-next { right: 24px; }
        @media (max-width: 768px) {
            .hero-slider-prev,
            .hero-slider-next {
                width: 44px;
                height: 44px;
            }
            .hero-slider-prev .material-icons,
            .hero-slider-next .material-icons {
                font-size: 22px;
            }
            .hero-slider-prev { left: 12px; }
            .hero-slider-next { right: 12px; }
        }
        
        /* Slider Dots - Thanh ngang giống FPT */
        .hero-slider-dots {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 10px;
            z-index: 10;
        }
        .hero-dot {
            width: 36px;
            height: 4px;
            border-radius: 2px;
            background: rgba(0,0,0,0.15);
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .hero-dot:hover {
            background: rgba(0,0,0,0.3);
        }
        .hero-dot.active {
            background: #D4A800;
            width: 52px;
        }
        .hero-brand .heading-h1 { color: #1a1000 !important; }
        .hero-brand .text-span { color: #1a1000 !important; font-weight: 700; text-decoration: underline; text-underline-offset: 4px; }
        .hero-brand .hero-subtitle { color: #1a1000 !important; opacity: 0.9; }
        .hero-brand .hero-cta {
            background-color: #1a1000 !important;
            color: #E6B800 !important;
            padding: 14px 32px !important;
            border-radius: 50px !important;
            font-weight: 600 !important;
            box-shadow: 0 6px 20px rgba(0,0,0,0.25) !important;
            transition: transform 0.2s ease, box-shadow 0.2s ease !important;
        }
        .hero-brand .hero-cta:hover {
            transform: translateY(-2px) !important;
            box-shadow: 0 8px 24px rgba(0,0,0,0.35) !important;
            color: #E6B800 !important;
        }
        .hero-brand .hero-review .body-14-regular,
        .hero-brand .hero-rating-text { color: #1a1000 !important; opacity: 0.95; }
        .section-tint { background-color: #fffef5 !important; }
        .section-white { background-color: #ffffff !important; }
        .stats-brand .large-stats-number { color: #1a1000 !important; font-weight: 800; }
        .stats-brand .large-stats-text { color: #1a1000 !important; opacity: 0.9; }
        .cta-button-secondary {
            padding: 14px 32px !important;
            border-radius: 50px !important;
            font-weight: 600 !important;
            transition: transform 0.2s ease, background-color 0.25s ease !important;
        }
        .cta-button-secondary:hover {
            background-color: #2e1a00 !important;
            color: #E6B800 !important;
            transform: translateY(-2px) !important;
        }
        /* Gallery Slider */
        .gallery-slider {
            overflow: hidden;
            padding: 40px 0;
            white-space: nowrap;
        }

        .gallery-track {
            display: inline-flex;
            gap: 20px;
            animation: scroll 20s linear infinite;
            /* Adjust speed here (lower = faster) */
            align-items: center;
            /* Center items vertically */
        }

        /* Auto-scroll Animation */
        @keyframes scroll {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }

            /* Access first half of duplicate set */
        }

        .gallery-item {
            border-radius: 20px;
            object-fit: cover;
            flex-shrink: 0;
            transition: transform 0.4s ease, box-shadow 0.4s ease;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .gallery-item:hover {
            transform: scale(1.05);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
            z-index: 10;
        }

        .img-tall {
            height: 450px;
            width: 600px;
        }

        .img-short {
            height: 350px;
            width: 400px;
        }

        @media (max-width: 768px) {
            .img-tall {
                height: 300px;
                width: 400px;
            }

            .img-short {
                height: 250px;
                width: 300px;
            }
        }

        /* Custom Animations */
        .fade-in-up {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }

        .fade-in-up.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        .zoom-in {
            opacity: 0;
            transform: scale(0.9);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }

        .zoom-in.is-visible {
            opacity: 1;
            transform: scale(1);
        }

        /* Ensure logos fit correctly */
        .cta-avatar-image {
            width: 60px;
            height: 60px;
            object-fit: contain;
            background: white;
            border-radius: 50%;
            padding: 10px;
        }

        /* Hover Effects */
        .team-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .team-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(212, 168, 0, 0.35);
        }
        .service-card:hover {
            box-shadow: 0 12px 28px rgba(212, 168, 0, 0.2);
            border-color: rgba(212, 168, 0, 0.4);
        }

        .stats-wrapper {
            transition: transform 0.3s ease;
        }

        .stats-wrapper:hover {
            transform: scale(1.02);
        }

        /* Staggered transition delays for team cards */
        .team-card:nth-child(1) {
            transition-delay: 0.1s;
        }

        .team-card:nth-child(2) {
            transition-delay: 0.2s;
        }

        .team-card:nth-child(3) {
            transition-delay: 0.3s;
        }

        .team-card:nth-child(4) {
            transition-delay: 0.4s;
        }

        /* Category Slider Styles - Beautiful Version */
        .category-grid {
            display: grid;
            grid-template-columns: 280px 1fr;
            gap: 24px;
        }
        @media (max-width: 992px) {
            .category-grid {
                grid-template-columns: 1fr;
            }
        }
        
        /* Slider Buttons */
        .slider-btn {
            width: 46px;
            height: 46px;
            border-radius: 50%;
            background: white;
            border: 1px solid #e5e5e5;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            color: #333;
        }
        .slider-btn:hover {
            background: #D4A800;
            border-color: #D4A800;
            color: #1a1000;
            box-shadow: 0 6px 20px rgba(212,168,0,0.35);
            transform: scale(1.05);
        }
        
        /* Video Card */
        .video-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 15px 50px rgba(0,0,0,0.1);
            border: 1px solid #f0f0f0;
            display: flex;
            flex-direction: column;
            transition: all 0.4s ease;
        }
        .video-card:hover {
            box-shadow: 0 20px 60px rgba(212,168,0,0.2);
            transform: translateY(-4px);
        }
        .video-card-image {
            position: relative;
            height: 200px;
            overflow: hidden;
        }
        .video-card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.7s ease;
        }
        .video-card:hover .video-card-image img {
            transform: scale(1.1);
        }
        .video-card-overlay {
            position: absolute;
            inset: 0;
            background: rgba(0,0,0,0.4);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .play-btn {
            width: 60px;
            height: 60px;
            background: rgba(212,168,0,0.95);
            border-radius: 50%;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(0,0,0,0.3);
        }
        .play-btn .material-icons {
            color: white;
            font-size: 32px;
        }
        .play-btn:hover {
            background: white;
            transform: scale(1.1);
        }
        .play-btn:hover .material-icons {
            color: #D4A800;
        }
        .video-card-label {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 16px;
            background: linear-gradient(to top, rgba(0,0,0,0.85), transparent);
        }
        .video-card-label span {
            font-size: 11px;
            font-weight: 700;
            color: #D4A800;
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }
        .video-card-content {
            padding: 24px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }
        .video-card-content h3 {
            font-size: 18px;
            font-weight: 700;
            color: #1a1a1a;
            margin: 0 0 16px 0;
        }
        .video-card-content ul {
            list-style: none;
            padding: 0;
            margin: 0 0 20px 0;
            flex: 1;
        }
        .video-card-content li {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-bottom: 12px;
            font-size: 13px;
            color: #555;
            line-height: 1.4;
        }
        .video-card-content li .material-icons {
            font-size: 18px;
            color: #D4A800;
            margin-top: 1px;
        }
        .btn-view-all {
            display: block;
            text-align: center;
            padding: 12px 20px;
            border: 2px solid #D4A800;
            color: #D4A800;
            font-weight: 600;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-radius: 8px;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        .btn-view-all:hover {
            background: #D4A800;
            color: #1a1000;
        }
        
        /* Products Slider */
        .category-slider-container {
            overflow: hidden;
            cursor: grab;
        }
        .category-slider-container:active {
            cursor: grabbing;
        }
        .category-slider-track {
            display: flex;
            gap: 20px;
            transition: transform 0.4s ease;
        }
        .product-slide {
            flex-shrink: 0;
            width: 240px;
        }
        .product-card {
            display: block;
            background: white;
            border-radius: 16px;
            padding: 20px;
            border: 1px solid #f0f0f0;
            text-decoration: none;
            transition: all 0.35s ease;
            height: 100%;
            box-shadow: 0 5px 20px rgba(0,0,0,0.06);
            position: relative;
        }
        .product-card:hover {
            border-color: rgba(212,168,0,0.4);
            box-shadow: 0 15px 40px rgba(212,168,0,0.18);
            transform: translateY(-6px);
        }
        .product-badge {
            position: absolute;
            top: 14px;
            right: 14px;
            padding: 5px 12px;
            background: linear-gradient(135deg, #D4A800 0%, #E6B800 100%);
            color: #1a1000;
            font-size: 10px;
            font-weight: 700;
            border-radius: 20px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            box-shadow: 0 4px 12px rgba(212,168,0,0.4);
        }
        .product-image {
            height: 160px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 16px;
            position: relative;
        }
        .product-glow {
            position: absolute;
            width: 100px;
            height: 100px;
            background: rgba(212,168,0,0.15);
            border-radius: 50%;
            filter: blur(30px);
            opacity: 0;
            transition: opacity 0.4s ease;
        }
        .product-card:hover .product-glow {
            opacity: 1;
        }
        .product-image img {
            max-height: 100%;
            max-width: 100%;
            object-fit: contain;
            transition: transform 0.4s ease;
        }
        .product-card:hover .product-image img {
            transform: scale(1.08);
        }
        .product-name {
            font-size: 14px;
            font-weight: 700;
            color: #1a1a1a;
            margin: 0 0 8px 0;
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            transition: color 0.3s ease;
        }
        .product-card:hover .product-name {
            color: #D4A800;
        }
        .product-desc {
            font-size: 12px;
            color: #888;
            margin: 0 0 14px 0;
            line-height: 1.5;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .product-footer {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
        }
        .product-price {
            font-size: 17px;
            font-weight: 700;
            color: #D4A800;
        }
        .product-add {
            width: 34px;
            height: 34px;
            background: #f5f5f5;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }
        .product-add .material-icons {
            font-size: 18px;
            color: #666;
            transition: color 0.3s ease;
        }
        .product-card:hover .product-add {
            background: #D4A800;
        }
        .product-card:hover .product-add .material-icons {
            color: #1a1000;
        }

        /* News Section Styles */
        .news-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 50px rgba(212,168,0,0.2) !important;
            border-color: rgba(212,168,0,0.3) !important;
        }
        .news-card:hover img {
            transform: scale(1.08);
        }
        @media (max-width: 992px) {
            .news section > div > div:last-child {
                grid-template-columns: 1fr !important;
            }
        }
        @media (max-width: 768px) {
            .news section > div > div:first-child {
                flex-direction: column;
                gap: 16px;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Hero slider (chuyển mượt như FPT Smart Home)
            (function() {
                var slider = document.getElementById('hero-slider');
                if (!slider) return;
                var slides = slider.querySelectorAll('.hero-slide');
                var dots = slider.querySelectorAll('.hero-dot');
                var btnPrev = slider.querySelector('.hero-slider-prev');
                var btnNext = slider.querySelector('.hero-slider-next');
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
                function startAutoplay() {
                    clearInterval(autoplayTimer);
                    autoplayTimer = setInterval(next, 5000);
                }
                dots.forEach(function(dot, i) {
                    dot.addEventListener('click', function() { goTo(i); startAutoplay(); });
                });
                if (btnPrev) btnPrev.addEventListener('click', function() { goTo(current - 1); startAutoplay(); });
                if (btnNext) btnNext.addEventListener('click', function() { next(); startAutoplay(); });
                startAutoplay();
            })();

            // Intersection Observer for scroll animations
            const observerOptions = {
                root: null,
                rootMargin: '0px',
                threshold: 0.15
            };

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');

                        // Trigger counter animation if it's the stats section
                        if (entry.target.classList.contains('stats-wrapper')) {
                            animateNumbers();
                        }

                        observer.unobserve(entry.target); // Only animate once
                    }
                });
            }, observerOptions);

            // Observe elements
            document.querySelectorAll('.team-card').forEach(el => {
                el.classList.add('fade-in-up');
                observer.observe(el);
            });

            document.querySelectorAll('.heading-h2').forEach(el => {
                el.classList.add('fade-in-up');
                observer.observe(el);
            });

            const statsWrapper = document.querySelector('.stats-wrapper');
            if (statsWrapper) {
                statsWrapper.classList.add('zoom-in');
                observer.observe(statsWrapper);
            }

            // Number Counter Animation
            function animateNumbers() {
                const statsNumbers = document.querySelectorAll('.large-stats-number');
                statsNumbers.forEach(counter => {
                    const targetText = counter.innerText;
                    const target = parseInt(targetText.replace(/\D/g, '')); // Remove non-digits like '+'
                    const suffix = targetText.replace(/[0-9]/g, ''); // Keep suffix like '+' or '%'

                    let count = 0;
                    const duration = 2000; // 2 seconds
                    const increment = target / (duration / 16); // 60fps

                    const updateCount = () => {
                        count += increment;
                        if (count < target) {
                            counter.innerText = Math.ceil(count) + suffix;
                            requestAnimationFrame(updateCount);
                        } else {
                            counter.innerText = target + suffix;
                        }
                    };
                    updateCount();
                });
            }

            // Category Product Sliders with Drag to Scroll
            document.querySelectorAll('.category-slider-container').forEach(function(container) {
                var category = container.dataset.category;
                var track = container.querySelector('.category-slider-track');
                var prevBtn = document.querySelector('.category-slider-prev[data-category="' + category + '"]');
                var nextBtn = document.querySelector('.category-slider-next[data-category="' + category + '"]');
                
                if (!track) return;
                
                var productSlides = track.querySelectorAll('.product-slide');
                var slideWidth = 280;
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
                    track.style.transition = 'transform 0.4s ease';
                });

                container.addEventListener('mouseup', function() {
                    isDragging = false;
                    track.style.transition = 'transform 0.4s ease';
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
                    track.style.transition = 'transform 0.4s ease';
                });

                container.addEventListener('touchmove', function(e) {
                    if (!isDragging) return;
                    var x = e.touches[0].pageX - container.offsetLeft;
                    var walk = (startX - x) * 1.5;
                    currentScroll = Math.max(0, Math.min(scrollLeft + walk, getMaxScroll()));
                    updateSlider();
                });
            });
        });
    </script>
@endsection