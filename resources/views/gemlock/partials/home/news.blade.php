@php
    use App\Helpers\ContentHelper;

    $newsTitle = ContentHelper::html('news_title', 'Tin tức <span class="text-span">Mới nhất</span>');
    $newsSubtitle = ContentHelper::text('news_subtitle', 'Cập nhật những thông tin mới nhất về sản phẩm và công nghệ Smart Home.');

    // Lấy 3 tin tức mới nhất, fallback sang data tĩnh nếu không có
    $newsItems = !empty($latestNews) && $latestNews->count() > 0 ? $latestNews : [];
@endphp

<section class="news section-white" style="padding: 80px 0;">
    <div class="w-layout-blockcontainer container w-container">
        <div class="news-header">
            <div class="title">
                <h1 class="heading-h2">{!! $newsTitle !!}</h1>
                <p class="hero-subtitle">{{ $newsSubtitle }}</p>
            </div>
            <a href="{{ route('blog.index') }}" class="secondary-button w-inline-block news-view-all">
                <p style="margin: 0;">Xem tất cả</p>
                <span class="material-icons" style="font-size: 18px;">arrow_forward</span>
            </a>
        </div>
        <div class="news-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 30px;">
            @foreach($newsItems as $news)
                @php
                    $image = $news->thumbnailMedia?->url ?? asset('image/no-image.jpg');
                    $category = is_object($news->category) ? ($news->category->name ?? 'Tin tức') : ($news->category ?? 'Tin tức');
                    $date = $news->published_at ? ($news->published_at instanceof \Carbon\Carbon ? $news->published_at->format('d/m/Y') : date('d/m/Y', strtotime($news->published_at))) : date('d/m/Y');
                    $readTime = $news->read_time ?? '5 phút đọc';
                    $title = $news->title ?? 'Tin tức';
                    $excerpt = $news->excerpt ?? '';
                    $slug = $news->slug ?? '#';
                @endphp
                <a href="{{ route('blog.show', $slug) }}"
                   style="text-decoration: none; display: block; background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 10px 40px rgba(0,0,0,0.08); border: 1px solid #f0f0f0; transition: all 0.3s ease;"
                   class="news-card">
                    <div style="position: relative; height: 200px; overflow: hidden;">
                        <img src="{{ $image }}" alt="News"
                             style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease;"
                             onerror="this.src='{{ asset('furni/images/img-grid-1.jpg') }}'"/>
                        <div style="position: absolute; top: 16px; left: 16px;">
                            <span
                                style="padding: 6px 12px; background: #D4A800; color: #1a1000; font-size: 11px; font-weight: 700; border-radius: 20px; text-transform: uppercase;">{{ $category }}</span>
                        </div>
                    </div>
                    <div style="padding: 24px;">
                        <div
                            style="display: flex; align-items: center; gap: 12px; margin-bottom: 12px; font-size: 13px; color: #888;">
                            <span style="display: flex; align-items: center; gap: 4px;">
                                <span class="material-icons" style="font-size: 16px;">calendar_today</span>
                                {{ $date }}
                            </span>
                            <span style="display: flex; align-items: center; gap: 4px;">
                                <span class="material-icons" style="font-size: 16px;">schedule</span>
                                {{ $readTime }}
                            </span>
                        </div>
                        <h3 style="font-size: 18px; font-weight: 700; color: #1a1a1a; margin: 0 0 12px 0; line-height: 1.4;">{{ $title }}</h3>
                        <p style="font-size: 14px; color: #666; margin: 0; line-height: 1.6; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">{{ $excerpt }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>
