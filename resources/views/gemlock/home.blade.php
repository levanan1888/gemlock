@extends('gemlock.layouts.app')

@section('title', 'GemLock - Trang chủ')
@section('body_class', 'gemlock-page')

@section('before_main')
    @include('gemlock.partials.gemlock_topbar')
    @include('gemlock.partials.header')
@endsection

@push('gemlock_styles')
    <link rel="stylesheet" href="{{ asset('css/gemlock-home.css') }}">
@endpush

@push('gemlock_scripts')
    <script>
        window.gemlockHomeConfig = {
            cartAddUrl: '{{ route('cart.add') }}',
            csrfToken: '{{ csrf_token() }}'
        };
    </script>
    <script src="{{ asset('js/gemlock-home.js') }}"></script>
@endpush

@section('page_content')
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
                </div>
                <a data-w-id="7a0890ec-d742-e9b4-eddc-c0ce1ae0ce88" href="{{ $galleryButtonLink }}"
                   class="secondary-button w-inline-block">
                    <p>{{ $galleryButtonText }}</p>
                    <div class="arrow-wrapper">
                        <img loading="lazy"
                             src="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c2/69420cbdd4e2e39b5eb77ac0_arrow-up-right.svg"
                             alt="Right ICon"/>
                    </div>
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
                     class="gallery-item img-tall"/>
                <img src="{{ $galleryImage2 }}" loading="lazy" alt="Gallery Image"
                     class="gallery-item img-short"/>
                <img src="{{ $galleryImage3 }}" loading="lazy" alt="Gallery Image"
                     class="gallery-item img-tall"/>
                <img src="{{ $galleryImage4 }}" loading="lazy" alt="Gallery Image"
                     class="gallery-item img-short"/>
            </div>
        </div>
    </section>
    {{-- ===== PRODUCTS SECTIONS BY CATEGORY ===== --}}
    @foreach($groupedProducts as $groupIndex => $group)
        <section id="category-{{ $group['category']['slug'] }}"
                 class="category-section {{ $groupIndex % 2 == 0 ? 'section-white' : 'section-tint' }}"
                 data-category="{{ $group['category']['slug'] }}" style="padding: 50px 0;">
            <div class="w-layout-blockcontainer container w-container">
                <div class="category-header"
                     style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 24px; padding-bottom: 16px; border-bottom: 2px solid rgba(212,168,0,0.2);">
                    <div style="display: flex; align-items: center; gap: 14px;">
                        <span class="material-icons"
                              style="font-size: 36px; color: #D4A800;">{{ $group['category']['icon'] }}</span>
                        <h2 class="heading-h2" style="margin: 0; font-size: 24px;">{{ $group['category']['name'] }}</h2>
                    </div>
                    <div style="display: flex; gap: 10px;">
                        <button type="button" class="category-slider-prev slider-btn"
                                data-category="{{ $group['category']['slug'] }}">
                            <span class="material-icons">chevron_left</span>
                        </button>
                        <button type="button" class="category-slider-next slider-btn"
                                data-category="{{ $group['category']['slug'] }}">
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
                                    <a href="{{ route('product.detail', $product['slug']) }}"
                                       class="product-item home-product-item">
                                        <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}"
                                             class="product-thumbnail"
                                             onerror="this.src='{{ asset('furni/images/product-1.png') }}'">
                                        <h3 class="product-title">{{ $product['name'] }}</h3>
                                        <strong class="product-price">{{ $product['price'] }}</strong>
                                        <span class="icon-cross home-add-to-cart"
                                              data-name="{{ $product['name'] }}"
                                              data-price="{{ $product['price'] }}"
                                              data-image="{{ $product['image'] }}"
                                              onclick="event.preventDefault(); event.stopPropagation(); addToCart(this);">
                                    <img src="{{ asset('furni/images/cross.svg') }}" class="img-fluid"
                                         alt="Add to cart">
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
                                                               sizes="100vw" alt="Khách hàng" class="review-image"/>
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
                                                               sizes="100vw" alt="Khách hàng" class="review-image"/>
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
                                    class="review-image"/>
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
                            loading="lazy" alt="Left-pointing arrow icon." class="arrow-icon"/></div>
                    <div class="right-arrow w-slider-arrow-right"><img
                            src="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c2/69420cbdd4e2e39b5eb77af9_arrow-right.png"
                            loading="lazy" alt="Right-pointing arrow icon." class="arrow-icon"/></div>
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
                                    <div>{{ $faq1Question }}</div>
                                    <img
                                        src="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c2/69420cbdd4e2e39b5eb77afe_Chevron.png"
                                        loading="lazy" alt="Downward-facing chevron arrow icon." class="faq-icon"/>
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
                                    <div>{{ $faq2Question }}</div>
                                    <img
                                        src="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c2/69420cbdd4e2e39b5eb77afe_Chevron.png"
                                        loading="lazy" alt="Downward-facing chevron arrow icon." class="faq-icon"/>
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
                                    <div>{{ $faq3Question }}</div>
                                    <img
                                        src="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c2/69420cbdd4e2e39b5eb77afe_Chevron.png"
                                        loading="lazy" alt="Downward-facing chevron arrow icon." class="faq-icon"/>
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
                                    <div>{{ $faq4Question }}</div>
                                    <img
                                        src="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c2/69420cbdd4e2e39b5eb77afe_Chevron.png"
                                        loading="lazy" alt="Downward-facing chevron arrow icon." class="faq-icon"/>
                                </div>
                            </div>
                            <nav class="answer padding-none w-dropdown-list">
                                <p class="faq-answer">{{ $faq4Answer }}</p>
                            </nav>
                        </div>
                    </div>
                    <img src="{{ asset('image/perfect_house_09.png') }}" loading="lazy"
                         data-w-id="e6d22c1f-ed6d-610d-abb9-3b1ab855a5a5" alt="Perfect House Support"
                         class="faq-image"/>
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
                <a href="/blog"
                   style="text-decoration: none; display: block; background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 10px 40px rgba(0,0,0,0.08); border: 1px solid #f0f0f0; transition: all 0.3s ease;"
                   class="news-card">
                    <div style="position: relative; height: 200px; overflow: hidden;">
                        <img src="{{ $news1Image }}" alt="News"
                             style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease;"/>
                        <div style="position: absolute; top: 16px; left: 16px;">
                            <span
                                style="padding: 6px 12px; background: #D4A800; color: #1a1000; font-size: 11px; font-weight: 700; border-radius: 20px; text-transform: uppercase;">{{ $news1Category }}</span>
                        </div>
                    </div>
                    <div style="padding: 24px;">
                        <div
                            style="display: flex; align-items: center; gap: 12px; margin-bottom: 12px; font-size: 13px; color: #888;">
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
                <a href="/blog"
                   style="text-decoration: none; display: block; background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 10px 40px rgba(0,0,0,0.08); border: 1px solid #f0f0f0; transition: all 0.3s ease;"
                   class="news-card">
                    <div style="position: relative; height: 200px; overflow: hidden;">
                        <img src="{{ $news2Image }}" alt="News"
                             style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease;"/>
                        <div style="position: absolute; top: 16px; left: 16px;">
                            <span
                                style="padding: 6px 12px; background: #D4A800; color: #1a1000; font-size: 11px; font-weight: 700; border-radius: 20px; text-transform: uppercase;">{{ $news2Category }}</span>
                        </div>
                    </div>
                    <div style="padding: 24px;">
                        <div
                            style="display: flex; align-items: center; gap: 12px; margin-bottom: 12px; font-size: 13px; color: #888;">
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
                <a href="/blog"
                   style="text-decoration: none; display: block; background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 10px 40px rgba(0,0,0,0.08); border: 1px solid #f0f0f0; transition: all 0.3s ease;"
                   class="news-card">
                    <div style="position: relative; height: 200px; overflow: hidden;">
                        <img src="{{ $news3Image }}" alt="News"
                             style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease;"/>
                        <div style="position: absolute; top: 16px; left: 16px;">
                            <span
                                style="padding: 6px 12px; background: #D4A800; color: #1a1000; font-size: 11px; font-weight: 700; border-radius: 20px; text-transform: uppercase;">{{ $news3Category }}</span>
                        </div>
                    </div>
                    <div style="padding: 24px;">
                        <div
                            style="display: flex; align-items: center; gap: 12px; margin-bottom: 12px; font-size: 13px; color: #888;">
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
                    </div>
                    <a data-w-id="511fb6fc-d96d-c424-3b08-d14cbd2da632" href="{{ $ctaButtonLink }}"
                       class="cta-button-secondary w-inline-block" style="background-color: #1a1000; color: #E6B800;">
                        <p>{{ $ctaButtonText }}</p>
                        <div class="arrow-wrapper"><img loading="lazy"
                                                        src="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c2/69420cbdd4e2e39b5eb77ae3_arrow-up-right%20(1).svg"
                                                        alt="Right Icon" style="filter: invert(1);"/></div>
                    </a>
                </div>
                <div class="cta-orbits">
                    <div class="cta-orbit cta-orbit-1">
                        <div class="cta-orbit-item" style="--angle: 0deg;">
                            <img src="{{ asset('image/Logo Tách Nền.png') }}" loading="lazy" alt="Perfect House"/>
                        </div>
                        <div class="cta-orbit-item" style="--angle: 120deg;">
                            <img
                                src="https://content.pancake.vn/1/s750x750/fwebp/a0/10/53/ce/0c8b304d1a5c085e4718387faaa3e33a09f9f9b5dc201adb4b2db48d-w:5906-h:5906-l:419034-t:image/png.png"
                                loading="lazy" alt="GemLock"/>
                        </div>
                        <div class="cta-orbit-item" style="--angle: 240deg;">
                            <img
                                src="https://content.pancake.vn/1/s569x499/fwebp/07/26/cd/7b/6196f9de02559345bba69d77cd42f862fe5e878c55935a4fbd3720ce-w:4009-h:3509-l:303004-t:image/png.png"
                                loading="lazy" alt="GemSolar"/>
                        </div>
                    </div>
                    <div class="cta-orbit cta-orbit-2">
                        <div class="cta-orbit-item" style="--angle: 60deg;">
                            <img src="{{ asset('image/Logo Tách Nền.png') }}" loading="lazy" alt="Perfect House"/>
                        </div>
                        <div class="cta-orbit-item" style="--angle: 180deg;">
                            <img
                                src="https://content.pancake.vn/1/s750x750/fwebp/a0/10/53/ce/0c8b304d1a5c085e4718387faaa3e33a09f9f9b5dc201adb4b2db48d-w:5906-h:5906-l:419034-t:image/png.png"
                                loading="lazy" alt="GemLock"/>
                        </div>
                        <div class="cta-orbit-item" style="--angle: 300deg;">
                            <img
                                src="https://content.pancake.vn/1/s569x499/fwebp/07/26/cd/7b/6196f9de02559345bba69d77cd42f862fe5e878c55935a4fbd3720ce-w:4009-h:3509-l:303004-t:image/png.png"
                                loading="lazy" alt="GemSolar"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection


