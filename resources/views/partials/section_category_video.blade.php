{{-- Phần video đầu trang danh mục sản phẩm (giống FPT Smart Home) --}}
@php
    $videoTitle = $videoTitle ?? 'Giới thiệu sản phẩm GemLock';
    $youtubeId = $youtubeId ?? null;
    $videoUrl = $videoUrl ?? null;
@endphp
<section class="category-video-section">
    <div class="category-video-wrapper">
        <div class="category-video-inner">
            @if($youtubeId)
                <div class="category-video-embed">
                    <iframe
                        src="https://www.youtube.com/embed/{{ $youtubeId }}?rel=0&modestbranding=1"
                        title="{{ $videoTitle }}"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                    ></iframe>
                </div>
            @elseif($videoUrl)
                <div class="category-video-embed">
                    <video controls playsinline class="category-video-native" poster="">
                        <source src="{{ $videoUrl }}" type="video/mp4">
                        Trình duyệt không hỗ trợ video.
                    </video>
                </div>
            @else
                <div class="category-video-placeholder">
                    <div class="category-video-placeholder-inner">
                        <p class="category-video-placeholder-text">{{ $videoTitle }}</p>
                        <p class="category-video-placeholder-hint">Thêm YouTube ID hoặc URL video vào view để hiển thị video tại đây.</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
<style>
    .category-video-section {
        width: 100%;
        background: #fffef5;
        padding: 0 0 2rem 0;
    }
    .category-video-wrapper {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 15px;
    }
    .category-video-inner {
        width: 100%;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 10px 40px rgba(212, 168, 0, 0.15);
        border: 1px solid rgba(212, 168, 0, 0.2);
    }
    .category-video-embed {
        position: relative;
        width: 100%;
        padding-bottom: 56.25%;
        height: 0;
        background: #1a1000;
    }
    .category-video-embed iframe,
    .category-video-embed .category-video-native {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: none;
    }
    .category-video-embed .category-video-native {
        object-fit: contain;
    }
    .category-video-placeholder {
        background: linear-gradient(135deg, #D4A800 0%, #E6B800 100%);
        min-height: 320px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .category-video-placeholder-inner {
        text-align: center;
        color: #1a1000;
        padding: 2rem;
    }
    .category-video-placeholder-text {
        font-size: 1.5rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }
    .category-video-placeholder-hint {
        font-size: 0.9rem;
        opacity: 0.85;
    }
</style>
