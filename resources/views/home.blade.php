@extends('layouts.app')

@section('title', 'GemLock - Trang chủ')
@section('body_class', 'gemlock-page')

@section('content')
    @include('partials.gemlock_topbar')
    @include('partials.header')

    {{-- Banner cũ (hero slider) đã bỏ theo yêu cầu --}}

    <section class="gallery section-tint">
        @php
            use App\Helpers\ContentHelper;
            $galleryTitle = ContentHelper::text('gallery_title', 'Sản phẩm & Giải pháp');
            $gallerySubtitle = ContentHelper::text('gallery_subtitle', 'Perfect House cung cấp giải pháp thông minh và bền vững cho ngôi nhà của bạn.');
            $galleryButtonText = ContentHelper::text('gallery_button_text', 'Tìm hiểu thêm');
            $galleryButtonLink = ContentHelper::link('gallery_button_link', '/about');
        @endphp
        <div class="w-layout-blockcontainer container w-container">
            <div data-w-id="a8b3ed35-d0d6-484a-a7de-5e4e34eccb6d" class="gallery-content-wrapper">
                <div class="title">
                    <h1 class="heading-h2">{!! $galleryTitle !!}</h1>
                    <p class="hero-subtitle">{{ $gallerySubtitle }}</p>
                </div><a data-w-id="7a0890ec-d742-e9b4-eddc-c0ce1ae0ce88" href="{{ $galleryButtonLink }}"
                    class="secondary-button w-inline-block">
                    <p>{{ $galleryButtonText }}</p>
                    <div class="arrow-wrapper"><img loading="lazy"
                            src="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c2/69420cbdd4e2e39b5eb77ac0_arrow-up-right.svg"
                            alt="Right ICon" /></div>
                </a>
            </div>
        </div>
        <div class="gallery-slider">
            @php
                $galleryImage1 = ContentHelper::image('gallery_image_1', 'image/banner2.jpg');
                $galleryImage2 = ContentHelper::image('gallery_image_2', 'furni/images/img-grid-1.jpg');
                $galleryImage3 = ContentHelper::image('gallery_image_3', 'image/Banner Solar 1.png');
                $galleryImage4 = ContentHelper::image('gallery_image_4', 'furni/images/img-grid-2.jpg');
            @endphp
            <div class="gallery-track">
                <img src="{{ $galleryImage1 }}" loading="lazy" alt="Gallery Image"
                    class="gallery-item img-tall" />
                <img src="{{ $galleryImage2 }}" loading="lazy" alt="Gallery Image"
                    class="gallery-item img-short" />
                <img src="{{ $galleryImage3 }}" loading="lazy" alt="Gallery Image"
                    class="gallery-item img-tall" />
                <img src="{{ $galleryImage4 }}" loading="lazy" alt="Gallery Image"
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
                        @foreach($group['products'] as $product)
                        <div class="product-slide">
                            <a href="{{ route('product.detail', $product['slug']) }}" class="product-item home-product-item">
                                <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="product-thumbnail"
                                    onerror="this.src='{{ asset('furni/images/product-1.png') }}'">
                                <h3 class="product-title">{{ $product['name'] }}</h3>
                                <strong class="product-price">{{ $product['price'] }}</strong>
                                <span class="icon-cross home-add-to-cart"
                                    data-name="{{ $product['name'] }}"
                                    data-price="{{ $product['price'] }}"
                                    data-image="{{ $product['image'] }}"
                                    onclick="event.preventDefault(); event.stopPropagation(); addToCart(this);">
                                    <img src="{{ asset('furni/images/cross.svg') }}" class="img-fluid" alt="Add to cart">
                                </span>
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
        @php
            $statsItem1Number = ContentHelper::text('stats_item_1_number', '5+');
            $statsItem1Text = ContentHelper::text('stats_item_1_text', 'Năm kinh nghiệm trong ngành');
            $statsItem2Number = ContentHelper::text('stats_item_2_number', '1,000+');
            $statsItem2Text = ContentHelper::text('stats_item_2_text', 'Khách hàng tin tưởng và hài lòng');
            $statsItem3Number = ContentHelper::text('stats_item_3_number', '50+');
            $statsItem3Text = ContentHelper::text('stats_item_3_text', 'Nhân sự chuyên môn cao');
            $statsItem4Number = ContentHelper::text('stats_item_4_number', '99%');
            $statsItem4Text = ContentHelper::text('stats_item_4_text', 'Tỷ lệ hoàn thành dự án xuất sắc');
        @endphp
        <div class="w-layout-blockcontainer container w-container">
            <div data-w-id="8a627d31-0e76-5837-a07c-bc600c688747" class="stats-wrapper stats-brand"
                style="background: linear-gradient(135deg, #D4A800 0%, #E6B800 50%, #D4A800 100%); border-radius: 30px; padding: 60px 40px; color: #1a1000; display: flex; justify-content: space-around; align-items: center; box-shadow: 0 20px 50px rgba(212, 168, 0, 0.35); border: 2px solid rgba(184, 134, 11, 0.4);">
                <div class="stats-item">
                    <h2 class="large-stats-number">{{ $statsItem1Number }}</h2>
                    <p class="large-stats-text opacity-76">{{ $statsItem1Text }}</p>
                </div>
                <div class="stats-item">
                    <h2 class="large-stats-number">{{ $statsItem2Number }}</h2>
                    <p class="large-stats-text opacity-76">{{ $statsItem2Text }}</p>
                </div>
                <div class="stats-item">
                    <h2 class="large-stats-number">{{ $statsItem3Number }}</h2>
                    <p class="large-stats-text opacity-76">{{ $statsItem3Text }}</p>
                </div>
                <div class="stats-item">
                    <h2 class="large-stats-number">{{ $statsItem4Number }}</h2>
                    <p class="large-stats-text opacity-76">{{ $statsItem4Text }}</p>
                </div>
            </div>
        </div>
    </section>
    <section class="testimonial section-white">
        @php
            $testimonialTitle = ContentHelper::html('testimonial_title', 'Khách hàng <span class="text-span">Nói gì</span>');
            $testimonialSubtitle = ContentHelper::text('testimonial_subtitle', 'Sự hài lòng của khách hàng là thước đo thành công lớn nhất của chúng tôi.');
            $testimonial1Image = ContentHelper::image('testimonial_1_image', 'furni/images/person_1.jpg');
            $testimonial1Text = ContentHelper::text('testimonial_1_text', 'Từ khi lắp đặt khóa GemLock, tôi cảm thấy rất an tâm mỗi khi vắng nhà. Công nghệ vân tay rất nhạy và tiện lợi.');
            $testimonial1Name = ContentHelper::text('testimonial_1_name', 'Anh Hoàng');
            $testimonial1Service = ContentHelper::text('testimonial_1_service', 'Khóa thông minh');
            $testimonial2Image = ContentHelper::image('testimonial_2_image', 'furni/images/person_2.jpg');
            $testimonial2Text = ContentHelper::text('testimonial_2_text', 'Hệ thống điện mặt trời GemSolar giúp gia đình tôi tiết kiệm đáng kể chi phí tiền điện hàng tháng. Dịch vụ lắp đặt rất chuyên nghiệp.');
            $testimonial2Name = ContentHelper::text('testimonial_2_name', 'Chị Lan');
            $testimonial2Service = ContentHelper::text('testimonial_2_service', 'Điện mặt trời');
        @endphp
        <div class="w-layout-blockcontainer container w-container">
            <div data-w-id="8de69b20-474c-2e2d-f11b-e8d5589e390e" class="testimonial-content-wrapper">
                <div class="title _335">
                    <h1 class="heading-h2">{!! $testimonialTitle !!}</h1>
                    <p class="subtitle">{{ $testimonialSubtitle }}</p>
                </div>
                <div data-delay="4000" data-animation="cross" class="testimonial-slider w-slider" data-autoplay="false"
                    data-easing="linear" data-hide-arrows="false" data-disable-swipe="false" data-autoplay-limit="0"
                    data-nav-spacing="3" data-duration="500" data-infinite="true">
                    <div class="testimonial-silder-mask w-slider-mask">
                        <div class="testimonial-slide w-slide">
                            <div class="testimonial-card"><img src="{{ $testimonial1Image }}" loading="lazy"
                                    sizes="100vw" alt="Khách hàng" class="review-image" />
                                <div class="review-content">
                                    <p class="review-text">"{{ $testimonial1Text }}"</p>
                                    <div class="review-author">
                                        <p class="review-author-name">{{ $testimonial1Name }}</p>
                                        <p class="reviewer-service">{{ $testimonial1Service }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-slide w-slide">
                            <div class="testimonial-card"><img src="{{ $testimonial2Image }}" loading="lazy"
                                    sizes="100vw" alt="Khách hàng" class="review-image" />
                                <div class="review-content">
                                    <p class="review-text">"{{ $testimonial2Text }}"</p>
                                    <div class="review-author">
                                        <p class="review-author-name">{{ $testimonial2Name }}</p>
                                        <p class="reviewer-service">{{ $testimonial2Service }}</p>
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
        @php
            $faqTitle = ContentHelper::text('faq_title', 'Câu hỏi thường gặp');
            $faqSubtitle = ContentHelper::text('faq_subtitle', 'Giải đáp thắc mắc của bạn về sản phẩm và dịch vụ của chúng tôi.');
            $faq1Question = ContentHelper::text('faq_1_question', 'Khóa thông minh GemLock có an toàn không?');
            $faq1Answer = ContentHelper::text('faq_1_answer', 'Có, GemLock sử dụng công nghệ bảo mật tiên tiến nhất, giúp bảo vệ ngôi nhà của bạn an toàn tuyệt đối trước mọi nguy cơ.');
            $faq2Question = ContentHelper::text('faq_2_question', 'Lợi ích của điện mặt trời GemSolar là gì?');
            $faq2Answer = ContentHelper::text('faq_2_answer', 'GemSolar giúp tiết kiệm từ 40-70% hóa đơn tiền điện, hoàn vốn nhanh và thân thiện với môi trường.');
            $faq3Question = ContentHelper::text('faq_3_question', 'GemLock có cung cấp dịch vụ lắp đặt không?');
            $faq3Answer = ContentHelper::text('faq_3_answer', 'Có, chúng tôi cung cấp dịch vụ tư vấn, thiết kế và lắp đặt trọn gói, đảm bảo chất lượng và sự hài lòng cho khách hàng.');
            $faq4Question = ContentHelper::text('faq_4_question', 'Tại sao chọn GemLock?');
            $faq4Answer = ContentHelper::text('faq_4_answer', 'Bạn có thể liên hệ với chúng tôi qua số điện thoại hotline hoặc gửi email trực tiếp qua website.');
        @endphp
        <div class="w-layout-blockcontainer container w-container">
            <div class="faq-content-wrapper">
                <div data-w-id="e6d22c1f-ed6d-610d-abb9-3b1ab855a577" class="title-2">
                    <h1 class="heading-h2">{{ $faqTitle }}</h1>
                    <p class="subtitle _525px">{{ $faqSubtitle }}</p>
                </div>
                <div class="faq-content">
                    <div data-w-id="e6d22c1f-ed6d-610d-abb9-3b1ab855a57d" class="faq-wrapper">
                        <div data-hover="false" data-delay="0" data-w-id="e6d22c1f-ed6d-610d-abb9-3b1ab855a57e"
                            class="single-faq w-dropdown">
                            <div class="question w-dropdown-toggle">
                                <div class="question-wrapper">
                                    <div>{{ $faq1Question }}</div><img
                                        src="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c2/69420cbdd4e2e39b5eb77afe_Chevron.png"
                                        loading="lazy" alt="Downward-facing chevron arrow icon." class="faq-icon" />
                                </div>
                            </div>
                            <nav class="answer w-dropdown-list">
                                <p class="faq-answer">{{ $faq1Answer }}</p>
                            </nav>
                        </div>
                        <div class="faq-line"></div>
                        <div data-hover="false" data-delay="0" data-w-id="e6d22c1f-ed6d-610d-abb9-3b1ab855a588"
                            class="single-faq w-dropdown">
                            <div class="question w-dropdown-toggle">
                                <div class="question-wrapper">
                                    <div>{{ $faq2Question }}</div><img
                                        src="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c2/69420cbdd4e2e39b5eb77afe_Chevron.png"
                                        loading="lazy" alt="Downward-facing chevron arrow icon." class="faq-icon" />
                                </div>
                            </div>
                            <nav class="answer w-dropdown-list">
                                <p class="faq-answer">{{ $faq2Answer }}</p>
                            </nav>
                        </div>
                        <div class="faq-line"></div>
                        <div data-hover="false" data-delay="0" data-w-id="e6d22c1f-ed6d-610d-abb9-3b1ab855a592"
                            class="single-faq w-dropdown">
                            <div class="question w-dropdown-toggle">
                                <div class="question-wrapper">
                                    <div>{{ $faq3Question }}</div><img
                                        src="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c2/69420cbdd4e2e39b5eb77afe_Chevron.png"
                                        loading="lazy" alt="Downward-facing chevron arrow icon." class="faq-icon" />
                                </div>
                            </div>
                            <nav class="answer w-dropdown-list">
                                <p class="faq-answer">{{ $faq3Answer }}</p>
                            </nav>
                        </div>
                        <div class="faq-line"></div>
                        <div data-hover="false" data-delay="0" data-w-id="e6d22c1f-ed6d-610d-abb9-3b1ab855a59c"
                            class="single-faq padding-none w-dropdown">
                            <div class="question w-dropdown-toggle">
                                <div class="question-wrapper">
                                    <div>{{ $faq4Question }}</div><img
                                        src="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c2/69420cbdd4e2e39b5eb77afe_Chevron.png"
                                        loading="lazy" alt="Downward-facing chevron arrow icon." class="faq-icon" />
                                </div>
                            </div>
                            <nav class="answer padding-none w-dropdown-list">
                                <p class="faq-answer">{{ $faq4Answer }}</p>
                            </nav>
                        </div>
                    </div><img src="{{ asset('image/perfect_house_09.png') }}" loading="lazy"
                        data-w-id="e6d22c1f-ed6d-610d-abb9-3b1ab855a5a5" alt="Perfect House Support" class="faq-image" />
                </div>
            </div>
        </div>
    </section>
    {{-- ===== NEWS SECTION ===== --}}
    @php
        $newsTitle = ContentHelper::html('news_title', 'Tin tức <span class="text-span">Mới nhất</span>');
        $newsSubtitle = ContentHelper::text('news_subtitle', 'Cập nhật những thông tin mới nhất về sản phẩm và công nghệ Smart Home.');
        $news1Image = ContentHelper::image('news_1_image', 'furni/images/img-grid-1.jpg');
        $news1Category = ContentHelper::text('news_1_category', 'Khóa thông minh');
        $news1Date = ContentHelper::text('news_1_date', '15/01/2026');
        $news1ReadTime = ContentHelper::text('news_1_read_time', '5 phút đọc');
        $news1Title = ContentHelper::text('news_1_title', 'Top 5 khóa thông minh bán chạy nhất năm 2026');
        $news1Description = ContentHelper::text('news_1_description', 'Khám phá những mẫu khóa thông minh được người dùng Việt Nam yêu thích nhất với công nghệ tiên tiến và thiết kế sang trọng.');
        $news2Image = ContentHelper::image('news_2_image', 'image/solar.png');
        $news2Category = ContentHelper::text('news_2_category', 'Điện mặt trời');
        $news2Date = ContentHelper::text('news_2_date', '10/01/2026');
        $news2ReadTime = ContentHelper::text('news_2_read_time', '7 phút đọc');
        $news2Title = ContentHelper::text('news_2_title', 'Lợi ích của điện mặt trời cho gia đình Việt');
        $news2Description = ContentHelper::text('news_2_description', 'Tìm hiểu cách điện mặt trời giúp tiết kiệm chi phí điện năng và bảo vệ môi trường cho ngôi nhà của bạn.');
        $news3Image = ContentHelper::image('news_3_image', 'image/perfect_house_09.png');
        $news3Category = ContentHelper::text('news_3_category', 'Smart Home');
        $news3Date = ContentHelper::text('news_3_date', '05/01/2026');
        $news3ReadTime = ContentHelper::text('news_3_read_time', '6 phút đọc');
        $news3Title = ContentHelper::text('news_3_title', 'Xu hướng Smart Home năm 2026: Những điều cần biết');
        $news3Description = ContentHelper::text('news_3_description', 'Cập nhật những xu hướng công nghệ nhà thông minh mới nhất và cách áp dụng cho ngôi nhà của bạn.');
    @endphp
    <section class="news section-white" style="padding: 80px 0;">
        <div class="w-layout-blockcontainer container w-container">
            <div class="news-header">
                <div class="title">
                    <h1 class="heading-h2">{!! $newsTitle !!}</h1>
                    <p class="hero-subtitle">{{ $newsSubtitle }}</p>
                </div>
                <a href="/blog" class="secondary-button w-inline-block news-view-all">
                    <p style="margin: 0;">Xem tất cả</p>
                    <span class="material-icons" style="font-size: 18px;">arrow_forward</span>
                </a>
            </div>
            <div class="news-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 30px;">
                {{-- News Card 1 --}}
                <a href="/blog" style="text-decoration: none; display: block; background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 10px 40px rgba(0,0,0,0.08); border: 1px solid #f0f0f0; transition: all 0.3s ease;" class="news-card">
                    <div style="position: relative; height: 200px; overflow: hidden;">
                        <img src="{{ $news1Image }}" alt="News" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease;" />
                        <div style="position: absolute; top: 16px; left: 16px;">
                            <span style="padding: 6px 12px; background: #D4A800; color: #1a1000; font-size: 11px; font-weight: 700; border-radius: 20px; text-transform: uppercase;">{{ $news1Category }}</span>
                        </div>
                    </div>
                    <div style="padding: 24px;">
                        <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 12px; font-size: 13px; color: #888;">
                            <span style="display: flex; align-items: center; gap: 4px;">
                                <span class="material-icons" style="font-size: 16px;">calendar_today</span>
                                {{ $news1Date }}
                            </span>
                            <span style="display: flex; align-items: center; gap: 4px;">
                                <span class="material-icons" style="font-size: 16px;">schedule</span>
                                {{ $news1ReadTime }}
                            </span>
                        </div>
                        <h3 style="font-size: 18px; font-weight: 700; color: #1a1a1a; margin: 0 0 12px 0; line-height: 1.4;">{{ $news1Title }}</h3>
                        <p style="font-size: 14px; color: #666; margin: 0; line-height: 1.6; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">{{ $news1Description }}</p>
                    </div>
                </a>
                
                {{-- News Card 2 --}}
                <a href="/blog" style="text-decoration: none; display: block; background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 10px 40px rgba(0,0,0,0.08); border: 1px solid #f0f0f0; transition: all 0.3s ease;" class="news-card">
                    <div style="position: relative; height: 200px; overflow: hidden;">
                        <img src="{{ $news2Image }}" alt="News" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease;" />
                        <div style="position: absolute; top: 16px; left: 16px;">
                            <span style="padding: 6px 12px; background: #D4A800; color: #1a1000; font-size: 11px; font-weight: 700; border-radius: 20px; text-transform: uppercase;">{{ $news2Category }}</span>
                        </div>
                    </div>
                    <div style="padding: 24px;">
                        <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 12px; font-size: 13px; color: #888;">
                            <span style="display: flex; align-items: center; gap: 4px;">
                                <span class="material-icons" style="font-size: 16px;">calendar_today</span>
                                {{ $news2Date }}
                            </span>
                            <span style="display: flex; align-items: center; gap: 4px;">
                                <span class="material-icons" style="font-size: 16px;">schedule</span>
                                {{ $news2ReadTime }}
                            </span>
                        </div>
                        <h3 style="font-size: 18px; font-weight: 700; color: #1a1a1a; margin: 0 0 12px 0; line-height: 1.4;">{{ $news2Title }}</h3>
                        <p style="font-size: 14px; color: #666; margin: 0; line-height: 1.6; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">{{ $news2Description }}</p>
                    </div>
                </a>
                
                {{-- News Card 3 --}}
                <a href="/blog" style="text-decoration: none; display: block; background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 10px 40px rgba(0,0,0,0.08); border: 1px solid #f0f0f0; transition: all 0.3s ease;" class="news-card">
                    <div style="position: relative; height: 200px; overflow: hidden;">
                        <img src="{{ $news3Image }}" alt="News" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease;" />
                        <div style="position: absolute; top: 16px; left: 16px;">
                            <span style="padding: 6px 12px; background: #D4A800; color: #1a1000; font-size: 11px; font-weight: 700; border-radius: 20px; text-transform: uppercase;">{{ $news3Category }}</span>
                        </div>
                    </div>
                    <div style="padding: 24px;">
                        <div style="display: flex; align-items: center; gap: 12px; margin-bottom: 12px; font-size: 13px; color: #888;">
                            <span style="display: flex; align-items: center; gap: 4px;">
                                <span class="material-icons" style="font-size: 16px;">calendar_today</span>
                                {{ $news3Date }}
                            </span>
                            <span style="display: flex; align-items: center; gap: 4px;">
                                <span class="material-icons" style="font-size: 16px;">schedule</span>
                                {{ $news3ReadTime }}
                            </span>
                        </div>
                        <h3 style="font-size: 18px; font-weight: 700; color: #1a1a1a; margin: 0 0 12px 0; line-height: 1.4;">{{ $news3Title }}</h3>
                        <p style="font-size: 14px; color: #666; margin: 0; line-height: 1.6; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">{{ $news3Description }}</p>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <section class="cta section-tint" style="padding: 100px 0;">
        @php
            $ctaTitle = ContentHelper::html('cta_title', 'Kết nối <span class="text-span-2" style="color: #1a1000; font-weight: 700;">tương lai</span>');
            $ctaSubtitle = ContentHelper::text('cta_subtitle', 'Liên hệ với chúng tôi để bắt đầu hành trình nâng tầm không gian sống của bạn với giải pháp Smart Home và Năng lượng sạch.');
            $ctaButtonText = ContentHelper::text('cta_button_text', 'Liên hệ ngay');
            $ctaButtonLink = ContentHelper::link('cta_button_link', '/booking');
        @endphp
        <div class="w-layout-blockcontainer container w-container">
            <div data-w-id="a90f08e8-b8cb-0d7a-1c6e-ea4374ad5744" class="cta-content cta-brand"
                style="background: linear-gradient(135deg, #D4A800 0%, #E6B800 50%, #D4A800 100%); border-radius: 30px; padding: 80px 40px; position: relative; overflow: hidden; box-shadow: 0 20px 50px rgba(212, 168, 0, 0.35); border: 2px solid rgba(184, 134, 11, 0.4);">
                <div class="cta-text">
                    <div class="title-2">
                        <h1 class="heading-h2 white" style="color: #1a1000;">{!! $ctaTitle !!}</h1>
                        <p class="cta-subtitle" style="color: #1a1000; opacity: 0.9;">{{ $ctaSubtitle }}</p>
                    </div><a data-w-id="511fb6fc-d96d-c424-3b08-d14cbd2da632" href="{{ $ctaButtonLink }}"
                        class="cta-button-secondary w-inline-block" style="background-color: #1a1000; color: #E6B800;">
                        <p>{{ $ctaButtonText }}</p>
                        <div class="arrow-wrapper"><img loading="lazy"
                                src="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c2/69420cbdd4e2e39b5eb77ae3_arrow-up-right%20(1).svg"
                                alt="Right Icon" style="filter: invert(1);" /></div>
                    </a>
                </div>
                <div class="cta-orbits">
                    <div class="cta-orbit cta-orbit-1">
                        <div class="cta-orbit-item" style="--angle: 0deg;">
                            <img src="{{ asset('image/Logo Tách Nền.png') }}" loading="lazy" alt="Perfect House" />
                        </div>
                        <div class="cta-orbit-item" style="--angle: 120deg;">
                            <img src="https://content.pancake.vn/1/s750x750/fwebp/a0/10/53/ce/0c8b304d1a5c085e4718387faaa3e33a09f9f9b5dc201adb4b2db48d-w:5906-h:5906-l:419034-t:image/png.png" loading="lazy" alt="GemLock" />
                        </div>
                        <div class="cta-orbit-item" style="--angle: 240deg;">
                            <img src="https://content.pancake.vn/1/s569x499/fwebp/07/26/cd/7b/6196f9de02559345bba69d77cd42f862fe5e878c55935a4fbd3720ce-w:4009-h:3509-l:303004-t:image/png.png" loading="lazy" alt="GemSolar" />
                        </div>
                    </div>
                    <div class="cta-orbit cta-orbit-2">
                        <div class="cta-orbit-item" style="--angle: 60deg;">
                            <img src="{{ asset('image/Logo Tách Nền.png') }}" loading="lazy" alt="Perfect House" />
                        </div>
                        <div class="cta-orbit-item" style="--angle: 180deg;">
                            <img src="https://content.pancake.vn/1/s750x750/fwebp/a0/10/53/ce/0c8b304d1a5c085e4718387faaa3e33a09f9f9b5dc201adb4b2db48d-w:5906-h:5906-l:419034-t:image/png.png" loading="lazy" alt="GemLock" />
                        </div>
                        <div class="cta-orbit-item" style="--angle: 300deg;">
                            <img src="https://content.pancake.vn/1/s569x499/fwebp/07/26/cd/7b/6196f9de02559345bba69d77cd42f862fe5e878c55935a4fbd3720ce-w:4009-h:3509-l:303004-t:image/png.png" loading="lazy" alt="GemSolar" />
                        </div>
                    </div>
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
            background: linear-gradient(135deg, #f0f4f8 0%, #e8f4fc 50%, #f5f7fa 100%);
            padding: 0;
            overflow: hidden;
            margin-top: calc(-1 * var(--header-height, 104px));
            padding-top: var(--header-height, 104px);
        }
        /* Hero Slide Effects */
        .hero-slide::before {
            content: "";
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at 20% 50%, rgba(212, 168, 0, 0.15), transparent 50%),
                        radial-gradient(circle at 80% 50%, rgba(59, 93, 80, 0.1), transparent 50%);
            pointer-events: none;
            z-index: 1;
            opacity: 0;
            transition: opacity 0.8s ease;
        }
        .hero-slide.active::before {
            opacity: 1;
        }
        .hero-slide::after {
            content: "";
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent 40%, rgba(255,255,255,0.1) 50%, transparent 60%);
            transform: translateX(-100%);
            pointer-events: none;
            z-index: 2;
        }
        .hero-slide.active::after {
            animation: slideShine 3s ease-in-out infinite;
        }
        @keyframes slideShine {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }
        .hero-slider-wrapper {
            position: relative;
            width: 100%;
            min-height: calc(100vh - var(--header-height, 104px));
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1;
        }
        .hero-slides {
            position: relative;
            width: 100%;
            height: calc(100vh - var(--header-height, 104px));
            display: flex;
            align-items: center;
            justify-content: center;
            user-select: none;
            -webkit-user-select: none;
            background: #f5f7fa;
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
            padding: 0;
            overflow: hidden;
            background: #f5f7fa;
        }
        .hero-slide.active {
            opacity: 1;
            visibility: visible;
            z-index: 1;
        }
        .hero-slide img {
            width: 90%;
            height: 90%;
            object-fit: contain;
            object-position: center;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.15);
            background: transparent;
            transform: scale(0.95);
            opacity: 0.8;
            transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .hero-slide.active img {
            transform: scale(1);
            opacity: 1;
            animation: slideFloat 4s ease-in-out infinite;
        }
        @keyframes slideFloat {
            0%, 100% { transform: scale(1) translateY(0); }
            50% { transform: scale(1.02) translateY(-8px); }
        }
        .hero-slide::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(110deg, transparent 0%, rgba(255, 255, 255, 0.4) 50%, transparent 100%);
            opacity: 0;
            transform: translateX(-140%);
            mix-blend-mode: screen;
            pointer-events: none;
        }
        .hero-slide.active::after {
            opacity: 0.5;
            animation: heroSweep 4.5s ease-in-out infinite;
        }
        /* Mobile - Full width slider with full image */
        @media (max-width: 768px) {
            .hero-slider-section {
                margin-top: calc(-1 * var(--header-height, 80px));
                padding-top: var(--header-height, 80px);
                padding-left: 0;
                padding-right: 0;
            }
            .hero-slider-wrapper {
                min-height: 50vh;
                border-radius: 0;
                margin: 0 -15px; /* Full width beyond container padding */
                width: calc(100% + 30px);
                background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            }
            .hero-slides {
                height: 50vh;
                min-height: 280px;
                max-height: 400px;
            }
            .hero-slide {
                padding: 0;
                display: flex;
                align-items: center;
                justify-content: center;
                background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            }
            .hero-slide img {
                width: 100% !important;
                height: 100% !important;
                object-fit: contain !important;
                border-radius: 0 !important;
                box-shadow: none !important;
                transform: none !important;
            }
            .hero-slide.active img {
                animation: none !important;
                transform: none !important;
            }
            .hero-slider-dots {
                bottom: 15px;
            }
            .hero-dot {
                width: 24px;
                height: 3px;
            }
            .hero-dot.active {
                width: 36px;
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

        /* Button text clarity & consistency */
        .primary-button,
        .primary-button-white,
        .secondary-button,
        .secondary-button-white,
        .cta-button-secondary,
        .btn-primary,
        .btn-outline,
        .btn-view-all {
            font-weight: 700 !important;
            letter-spacing: 0.2px;
        }
        .secondary-button,
        .secondary-button-white {
            color: #1a1000 !important;
        }
        .primary-button p,
        .secondary-button p,
        .cta-button-secondary p {
            font-weight: 700 !important;
            color: inherit !important;
            margin: 0 !important;
        }

        @keyframes heroPulse {
            0%, 100% { opacity: 0.4; transform: scale(1); }
            50% { opacity: 0.7; transform: scale(1.03); }
        }
        @keyframes heroSweep {
            0% { transform: translateX(-140%); }
            50% { transform: translateX(10%); }
            100% { transform: translateX(140%); }
        }
        @keyframes heroFloat {
            0%, 100% { transform: translateY(0) scale(1); }
            50% { transform: translateY(-10px) scale(1.02); }
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

        /* CTA Text */
        .cta-text {
            max-width: 55%;
            position: relative;
            z-index: 2;
        }
        @media (max-width: 992px) {
            .cta-text {
                max-width: 100%;
                text-align: center;
            }
        }

        /* CTA Orbits - Rotating Icons */
        .cta-orbits {
            position: absolute;
            right: 60px;
            top: 50%;
            transform: translateY(-50%);
            width: 280px;
            height: 280px;
        }
        .cta-orbit {
            position: absolute;
            top: 50%;
            left: 50%;
            border: 1px dashed rgba(26, 16, 0, 0.2);
            border-radius: 50%;
            transform: translate(-50%, -50%);
        }
        .cta-orbit-1 {
            width: 200px;
            height: 200px;
            animation: orbitSpin 20s linear infinite;
        }
        .cta-orbit-2 {
            width: 280px;
            height: 280px;
            animation: orbitSpin 30s linear infinite reverse;
        }
        .cta-orbit-item {
            position: absolute;
            width: 50px;
            height: 50px;
            top: 50%;
            left: 50%;
            transform: rotate(var(--angle)) translateX(calc(50% + 50px)) rotate(calc(-1 * var(--angle)));
            animation: orbitItemSpin 20s linear infinite reverse;
        }
        .cta-orbit-2 .cta-orbit-item {
            transform: rotate(var(--angle)) translateX(calc(50% + 90px)) rotate(calc(-1 * var(--angle)));
            animation: orbitItemSpin 30s linear infinite;
        }
        .cta-orbit-item img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            background: white;
            border-radius: 50%;
            padding: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.15);
        }
        @keyframes orbitSpin {
            from { transform: translate(-50%, -50%) rotate(0deg); }
            to { transform: translate(-50%, -50%) rotate(360deg); }
        }
        @keyframes orbitItemSpin {
            from { transform: rotate(var(--angle)) translateX(calc(50% + 50px)) rotate(calc(-1 * var(--angle) - 0deg)); }
            to { transform: rotate(var(--angle)) translateX(calc(50% + 50px)) rotate(calc(-1 * var(--angle) - 360deg)); }
        }
        @media (max-width: 992px) {
            .cta-orbits {
                display: none;
            }
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
            align-items: stretch;
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
            height: 100%;
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
            height: 100%;
            display: flex;
        }
        .category-slider-container:active {
            cursor: grabbing;
        }
        .category-slider-track {
            display: flex;
            gap: 20px;
            transition: transform 0.4s ease;
            align-items: stretch;
            height: 100%;
        }
        .product-slide {
            flex-shrink: 0;
            width: 280px;
            height: 100%;
        }
        .home-product-item {
            text-align: center;
            text-decoration: none;
            display: flex;
            flex-direction: column;
            position: relative;
            padding: 30px;
            background: #ffffff;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            cursor: pointer;
            transition: 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275) all;
            perspective: 1000px;
            height: 100%;
        }
        .home-product-item:hover {
            transform: translateY(-15px) rotateX(5deg) rotateY(2deg);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }
        .home-product-item .product-thumbnail {
            margin-bottom: 30px;
            position: relative;
            top: 0;
            transition: 0.3s all ease;
            height: 200px;
            object-fit: contain;
            width: 100%;
        }
        .home-product-item h3 {
            font-weight: 600;
            font-size: 16px;
            line-height: 1.4;
            min-height: 2.6rem;
        }
        .home-product-item strong {
            font-weight: 800 !important;
            font-size: 18px !important;
        }
        .home-product-item h3,
        .home-product-item strong {
            color: #2f2f2f;
            text-decoration: none;
        }
        .home-product-item .icon-cross {
            position: absolute;
            width: 35px;
            height: 35px;
            display: inline-block;
            background: #2f2f2f;
            bottom: 15px;
            left: 50%;
            transform: translateX(-50%);
            margin-bottom: -17.5px;
            border-radius: 50%;
            opacity: 0;
            visibility: hidden;
            transition: 0.3s all ease;
        }
        .home-product-item .icon-cross img {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }
        .home-product-item:before {
            bottom: 0;
            left: 0;
            right: 0;
            position: absolute;
            content: "";
            background: #fdf2cc;
            height: 0%;
            z-index: -1;
            border-radius: 10px;
            transition: 0.3s all ease;
        }
        .home-product-item:hover .product-thumbnail {
            top: -25px;
        }
        .home-product-item:hover .icon-cross {
            bottom: 0;
            opacity: 1;
            visibility: visible;
        }
        .home-product-item:hover:before {
            height: 70%;
        }
        @keyframes flyToCart {
            0% {
                transform: translate(0, 0) scale(1);
                opacity: 1;
            }
            50% {
                transform: translate(var(--tx), var(--ty)) scale(0.5);
                opacity: 0.8;
            }
            100% {
                transform: translate(var(--tx), var(--ty)) scale(0.1);
                opacity: 0;
            }
        }
        .flying-image {
            position: fixed;
            z-index: 9999;
            pointer-events: none;
            animation: flyToCart 1.2s ease-in-out forwards;
        }

        /* News Section Styles */
        /* News Section Styles */
        .news-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 40px;
            gap: 20px;
        }
        .news-view-all {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            white-space: nowrap;
        }
        .news-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }
        .news-card {
            text-decoration: none;
            display: block;
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0,0,0,0.08);
            border: 1px solid #f0f0f0;
            transition: all 0.3s ease;
        }
        .news-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 50px rgba(212,168,0,0.2) !important;
            border-color: rgba(212,168,0,0.3) !important;
        }
        .news-card:hover img {
            transform: scale(1.08);
        }
        
        /* News Responsive - Tablet */
        @media (max-width: 992px) {
            .news-grid {
                grid-template-columns: repeat(2, 1fr) !important;
                gap: 20px;
            }
            .news-header {
                flex-direction: column;
                align-items: flex-start;
                text-align: left;
            }
        }
        
        /* News Responsive - Mobile */
        @media (max-width: 768px) {
            .news.section-white {
                padding: 50px 0 !important;
            }
            .news-header {
                margin-bottom: 25px;
            }
            .news-header .title {
                margin-bottom: 15px;
            }
            .news-header .heading-h2 {
                font-size: 24px !important;
            }
            .news-header .hero-subtitle {
                font-size: 14px;
            }
            .news-grid {
                grid-template-columns: 1fr !important;
                gap: 20px;
            }
            .news-card > div:first-child {
                height: 180px !important;
            }
            .news-card > div:last-child {
                padding: 18px !important;
            }
            .news-card h3 {
                font-size: 16px !important;
            }
            .news-card p {
                font-size: 13px !important;
            }
        }
        
        /* News Responsive - Small Mobile */
        @media (max-width: 480px) {
            .news-view-all {
                width: 100%;
                justify-content: center;
            }
        }
        
        /* Slider - Small Mobile Full Width */
        @media (max-width: 480px) {
            .hero-slider-wrapper {
                min-height: 45vh;
            }
            .hero-slides {
                height: 45vh;
                min-height: 240px;
                max-height: 320px;
            }
            .hero-slider-prev,
            .hero-slider-next {
                width: 36px;
                height: 36px;
            }
            .hero-slider-prev .material-icons,
            .hero-slider-next .material-icons {
                font-size: 18px;
            }
            .hero-slider-prev { left: 8px; }
            .hero-slider-next { right: 8px; }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Hero slider (chuyển mượt + kéo để chuyển slide)
            (function() {
                var slider = document.getElementById('hero-slider');
                if (!slider) return;
                var slidesContainer = slider.querySelector('.hero-slides');
                var slides = slider.querySelectorAll('.hero-slide');
                var dots = slider.querySelectorAll('.hero-dot');
                var btnPrev = slider.querySelector('.hero-slider-prev');
                var btnNext = slider.querySelector('.hero-slider-next');
                var total = slides.length;
                var current = 0;
                var autoplayTimer;
                var isDragging = false;
                var startX = 0;
                var dragThreshold = 50; // px để trigger chuyển slide

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

                // Click dots
                dots.forEach(function(dot, i) {
                    dot.addEventListener('click', function() { goTo(i); startAutoplay(); });
                });

                // Click buttons
                if (btnPrev) btnPrev.addEventListener('click', function() { prev(); startAutoplay(); });
                if (btnNext) btnNext.addEventListener('click', function() { next(); startAutoplay(); });

                // Drag/Swipe support
                slidesContainer.style.cursor = 'grab';
                
                slidesContainer.addEventListener('mousedown', function(e) {
                    isDragging = true;
                    startX = e.pageX;
                    slidesContainer.style.cursor = 'grabbing';
                    clearInterval(autoplayTimer);
                });

                slidesContainer.addEventListener('mousemove', function(e) {
                    if (!isDragging) return;
                    e.preventDefault();
                });

                slidesContainer.addEventListener('mouseup', function(e) {
                    if (!isDragging) return;
                    isDragging = false;
                    slidesContainer.style.cursor = 'grab';
                    var deltaX = e.pageX - startX;
                    if (deltaX < -dragThreshold) {
                        next();
                    } else if (deltaX > dragThreshold) {
                        prev();
                    }
                    startAutoplay();
                });

                slidesContainer.addEventListener('mouseleave', function() {
                    if (isDragging) {
                        isDragging = false;
                        slidesContainer.style.cursor = 'grab';
                        startAutoplay();
                    }
                });

                // Touch support
                slidesContainer.addEventListener('touchstart', function(e) {
                    isDragging = true;
                    startX = e.touches[0].pageX;
                    clearInterval(autoplayTimer);
                });

                slidesContainer.addEventListener('touchmove', function(e) {
                    if (!isDragging) return;
                });

                slidesContainer.addEventListener('touchend', function(e) {
                    if (!isDragging) return;
                    isDragging = false;
                    var deltaX = e.changedTouches[0].pageX - startX;
                    if (deltaX < -dragThreshold) {
                        next();
                    } else if (deltaX > dragThreshold) {
                        prev();
                    }
                    startAutoplay();
                });

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

        function addToCart(element) {
            var name = element.getAttribute('data-name');
            var price = element.getAttribute('data-price');
            var image = element.getAttribute('data-image');

            fetch('{{ route('cart.add') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    name: name,
                    price: price,
                    image: image
                })
            })
            .then(function(response) { return response.json(); })
            .then(function(data) {
                flyToCart(element);

                var cartCount = document.querySelector('.cart-quantity');
                if (cartCount) {
                    setTimeout(function() {
                        var countValue = data.cart_count || 0;
                        cartCount.textContent = countValue;
                        cartCount.classList.toggle('is-empty', countValue < 1);
                    }, 1000);
                }
            })
            .catch(function(error) { console.error('Error:', error); });
        }

        function flyToCart(element) {
            var productItem = element.closest('.product-item');
            var productImage = productItem ? productItem.querySelector('.product-thumbnail') : null;
            var cartIcon = document.querySelector('.header-cart') || document.querySelector('.w-commerce-commercecartopenlink');

            if (!cartIcon || !productImage) return;

            var flyingImg = productImage.cloneNode(true);
            flyingImg.classList.add('flying-image');

            var imgRect = productImage.getBoundingClientRect();
            var cartRect = cartIcon.getBoundingClientRect();

            flyingImg.style.position = 'fixed';
            flyingImg.style.left = imgRect.left + 'px';
            flyingImg.style.top = imgRect.top + 'px';
            flyingImg.style.width = imgRect.width + 'px';
            flyingImg.style.height = imgRect.height + 'px';

            var imgCenterX = imgRect.left + imgRect.width / 2;
            var imgCenterY = imgRect.top + imgRect.height / 2;
            var cartCenterX = cartRect.left + cartRect.width / 2;
            var cartCenterY = cartRect.top + cartRect.height / 2;

            var deltaX = cartCenterX - imgCenterX;
            var deltaY = cartCenterY - imgCenterY;

            flyingImg.style.setProperty('--tx', deltaX + 'px');
            flyingImg.style.setProperty('--ty', deltaY + 'px');

            document.body.appendChild(flyingImg);

            setTimeout(function() {
                flyingImg.remove();
            }, 1200);
        }

        // Consultation Popup - Show on first visit, with 2 hour hide option
        (function() {
            var POPUP_KEY = 'gemlock_consultation_hidden';
            var TWO_HOURS = 2 * 60 * 60 * 1000; // 2 hours in milliseconds
            
            function shouldShowPopup() {
                var hiddenUntil = localStorage.getItem(POPUP_KEY);
                if (!hiddenUntil) return true;
                return Date.now() > parseInt(hiddenUntil);
            }
            
            function hidePopupFor2Hours() {
                localStorage.setItem(POPUP_KEY, Date.now() + TWO_HOURS);
            }
            
            function createPopup() {
                var popupHtml = `
                    <div id="consultationPopup" class="consultation-popup">
                        <div class="consultation-popup-overlay" onclick="closeConsultationPopup()"></div>
                        <div class="consultation-popup-content">
                            <button class="consultation-popup-close" onclick="closeConsultationPopup()">
                                <i class="material-icons">close</i>
                            </button>
                            <div class="consultation-popup-header">
                                <div class="consultation-icon">
                                    <span class="material-icons">support_agent</span>
                                </div>
                                <h3>Nhận Thông Tin Tư Vấn</h3>
                                <p>Để lại thông tin để được tư vấn miễn phí về sản phẩm khóa thông minh & điện mặt trời</p>
                            </div>
                            <form class="consultation-form" onsubmit="submitConsultation(event)">
                                <div class="form-group">
                                    <input type="text" placeholder="Họ và tên *" required>
                                </div>
                                <div class="form-group">
                                    <input type="tel" placeholder="Số điện thoại *" required>
                                </div>
                                <div class="form-group">
                                    <select required>
                                        <option value="">Chọn sản phẩm quan tâm *</option>
                                        <option value="khoa">Khóa thông minh</option>
                                        <option value="solar">Điện mặt trời</option>
                                        <option value="noithat">Nội thất</option>
                                        <option value="xaydung">Xây dựng</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn-consultation-submit">
                                    <span class="material-icons">send</span>
                                    Gửi yêu cầu tư vấn
                                </button>
                            </form>
                            <div class="consultation-footer">
                                <label class="dont-show-checkbox">
                                    <input type="checkbox" id="dontShowAgain" onchange="handleDontShowAgain()">
                                    <span>Không hiển thị trong 2 giờ tới</span>
                                </label>
                            </div>
                        </div>
                    </div>
                `;
                document.body.insertAdjacentHTML('beforeend', popupHtml);
                
                // Show popup with delay
                setTimeout(function() {
                    document.getElementById('consultationPopup').classList.add('active');
                }, 2000);
            }
            
            window.closeConsultationPopup = function() {
                var popup = document.getElementById('consultationPopup');
                if (popup) {
                    popup.classList.remove('active');
                    setTimeout(function() {
                        popup.remove();
                    }, 300);
                }
            };
            
            window.handleDontShowAgain = function() {
                var checkbox = document.getElementById('dontShowAgain');
                if (checkbox && checkbox.checked) {
                    hidePopupFor2Hours();
                }
            };
            
            window.submitConsultation = function(e) {
                e.preventDefault();
                alert('Cảm ơn bạn! Chúng tôi sẽ liên hệ tư vấn trong thời gian sớm nhất.');
                closeConsultationPopup();
            };
            
            // Initialize
            if (shouldShowPopup()) {
                createPopup();
            }
        })();
    </script>

    <style>
        /* Consultation Popup Styles */
        .consultation-popup {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }
        .consultation-popup.active {
            opacity: 1;
            visibility: visible;
        }
        .consultation-popup-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.6);
            backdrop-filter: blur(5px);
        }
        .consultation-popup-content {
            position: relative;
            background: #fff;
            border-radius: 24px;
            padding: 40px;
            max-width: 420px;
            width: 90%;
            box-shadow: 0 25px 80px rgba(0,0,0,0.3);
            transform: translateY(30px) scale(0.95);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .consultation-popup.active .consultation-popup-content {
            transform: translateY(0) scale(1);
        }
        .consultation-popup-close {
            position: absolute;
            top: 15px;
            right: 15px;
            width: 36px;
            height: 36px;
            border: none;
            background: #f5f5f5;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }
        .consultation-popup-close:hover {
            background: #D4A800;
            color: #fff;
            transform: rotate(90deg);
        }
        .consultation-popup-close .material-icons {
            font-size: 20px;
        }
        .consultation-popup-header {
            text-align: center;
            margin-bottom: 25px;
        }
        .consultation-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #D4A800 0%, #E6B800 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            box-shadow: 0 10px 30px rgba(212, 168, 0, 0.3);
        }
        .consultation-icon .material-icons {
            font-size: 32px;
            color: #fff;
        }
        .consultation-popup-header h3 {
            font-size: 22px;
            font-weight: 700;
            color: #1a1a1a;
            margin-bottom: 10px;
        }
        .consultation-popup-header p {
            font-size: 14px;
            color: #666;
            line-height: 1.6;
        }
        .consultation-form .form-group {
            margin-bottom: 15px;
        }
        .consultation-form input,
        .consultation-form select {
            width: 100%;
            padding: 14px 18px;
            border: 2px solid #eee;
            border-radius: 12px;
            font-size: 14px;
            transition: all 0.3s ease;
        }
        .consultation-form input:focus,
        .consultation-form select:focus {
            outline: none;
            border-color: #D4A800;
            box-shadow: 0 0 0 4px rgba(212, 168, 0, 0.1);
        }
        .btn-consultation-submit {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #D4A800 0%, #E6B800 100%);
            color: #1a1000;
            border: none;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(212, 168, 0, 0.3);
        }
        .btn-consultation-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 35px rgba(212, 168, 0, 0.4);
        }
        .btn-consultation-submit .material-icons {
            font-size: 20px;
        }
        .consultation-footer {
            margin-top: 20px;
            padding-top: 15px;
            border-top: 1px solid #eee;
        }
        .dont-show-checkbox {
            display: flex;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            font-size: 13px;
            color: #666;
        }
        .dont-show-checkbox input {
            width: 18px;
            height: 18px;
            accent-color: #D4A800;
        }
    </style>
@endsection