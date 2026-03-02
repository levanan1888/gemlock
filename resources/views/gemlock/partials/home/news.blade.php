@php
    use App\Helpers\ContentHelper;

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

