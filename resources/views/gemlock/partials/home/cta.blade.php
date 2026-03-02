@php
    use App\Helpers\ContentHelper;

    $ctaTitle = ContentHelper::html('cta_title', 'Kết nối <span class="text-span-2" style="color: #1a1000; font-weight: 700;">tương lai</span>');
    $ctaSubtitle = ContentHelper::text('cta_subtitle', 'Liên hệ với chúng tôi để bắt đầu hành trình nâng tầm không gian sống của bạn với giải pháp Smart Home và Năng lượng sạch.');
    $ctaButtonText = ContentHelper::text('cta_button_text', 'Liên hệ ngay');
    $ctaButtonLink = ContentHelper::link('cta_button_link', '/booking');
@endphp

<section class="cta section-tint" style="padding: 100px 0;">
    <div class="w-layout-blockcontainer container w-container">
        <div class="cta-content cta-brand"
             style="background: linear-gradient(135deg, #D4A800 0%, #E6B800 50%, #D4A800 100%); border-radius: 30px; padding: 80px 40px; position: relative; overflow: hidden; box-shadow: 0 20px 50px rgba(212, 168, 0, 0.35); border: 2px solid rgba(184, 134, 11, 0.4);">
            <div class="cta-text">
                <div class="title-2">
                    <h1 class="heading-h2 white" style="color: #1a1000;">{!! $ctaTitle !!}</h1>
                    <p class="cta-subtitle" style="color: #1a1000; opacity: 0.9;">{{ $ctaSubtitle }}</p>
                </div>
                <a href="{{ $ctaButtonLink }}"
                   class="cta-button-secondary w-inline-block" style="background-color: #1a1000; color: #E6B800;">
                    <p>{{ $ctaButtonText }}</p>
                    <div class="arrow-wrapper">
                        <img loading="lazy"
                             src="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c2/69420cbdd4e2e39b5eb77ae3_arrow-up-right%20(1).svg"
                             alt="Right Icon" style="filter: invert(1);"/>
                    </div>
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

