@php
    use App\Helpers\ContentHelper;

    $statsItem1Number = ContentHelper::text('stats_item_1_number', '5+');
    $statsItem1Text = ContentHelper::text('stats_item_1_text', 'Năm kinh nghiệm trong ngành');
    $statsItem2Number = ContentHelper::text('stats_item_2_number', '1,000+');
    $statsItem2Text = ContentHelper::text('stats_item_2_text', 'Khách hàng tin tưởng và hài lòng');
    $statsItem3Number = ContentHelper::text('stats_item_3_number', '50+');
    $statsItem3Text = ContentHelper::text('stats_item_3_text', 'Nhân sự chuyên môn cao');
    $statsItem4Number = ContentHelper::text('stats_item_4_number', '99%');
    $statsItem4Text = ContentHelper::text('stats_item_4_text', 'Tỷ lệ hoàn thành dự án xuất sắc');
@endphp

<section class="stats section-tint" style="padding: 80px 0;">
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

