@php
    use App\Helpers\ContentHelper;
    use App\Models\MenuItem;
    
    $isGemlock = request()->is('gemlock') || request()->is('gemlock/*') || request()->is('product') || request()->is('product/*') || request()->is('product-detail/*');
    $pageType = $isGemlock ? 'gemlock' : 'perfect_house';
    
    $footerDescription = ContentHelper::text('footer_description_'.$pageType, 'Perfect House Việt Nam - Kết nối tương lai. Chuyên cung cấp giải pháp Smart Home và Năng lượng sạch.');
    $footerSocialTitle = ContentHelper::text('footer_social_title_'.$pageType, 'Liên kết mạng xã hội');
    $footerFacebook = ContentHelper::link('footer_social_facebook_'.$pageType, 'https://facebook.com/');
    $footerYoutube = ContentHelper::link('footer_social_youtube_'.$pageType, 'https://youtube.com/');
    $footerZalo = ContentHelper::link('footer_social_zalo_'.$pageType, 'https://zalo.me/');
    $footerCopyright = ContentHelper::text('footer_copyright_'.$pageType, 'Copyright © 2025 Perfect House Việt Nam.');
    $footerLogo = ContentHelper::image('footer_logo_'.$pageType, 'image/Logo Tách Nền.png');
    
    $footerMenus = MenuItem::getMenu($pageType, 'footer');
@endphp
<section class="footer">
    <div class="w-layout-blockcontainer container w-container">
        <div data-w-id="57013a19-828b-8803-241e-4822ac873827" class="footer-top-content">
            <div class="footer-left">
                <p class="text-18-regular">{{ $footerDescription }}</p>
                <div class="social-icons">
                    <p class="text-18-bold">{{ $footerSocialTitle }}</p>
                    <div class="social-icon-wrapper">
                        <a data-w-id="57013a19-828b-8803-241e-4822ac87382f"
                            href="{{ $footerFacebook }}" target="_blank" class="social-icon w-inline-block">Facebook</a>
                        <a data-w-id="57013a19-828b-8803-241e-4822ac873832" href="{{ $footerYoutube }}" target="_blank"
                            class="social-icon w-inline-block">Youtube</a>
                        <a data-w-id="57013a19-828b-8803-241e-4822ac873835" href="{{ $footerZalo }}" target="_blank"
                            class="social-icon w-inline-block">Zalo</a>
                    </div>
                </div>
            </div>
            <div class="footer-links">
                @foreach($footerMenus as $parentMenu)
                    <div class="footer-link-column">
                        <p class="text-18-bold">{{ $parentMenu['label'] }}</p>
                        <div class="footer-link-wrapper">
                            @foreach($parentMenu['children'] ?? [] as $childMenu)
                                <a href="{{ $childMenu['url'] }}" class="footer-link w-inline-block" {{ $childMenu['open_in_new_tab'] ? 'target="_blank"' : '' }}>
                                    <p>{{ $childMenu['label'] }}</p>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div data-w-id="57013a19-828b-8803-241e-4822ac873860" class="footer-bottom">
            <a href="/" aria-current="page" class="footer-logo w-inline-block w--current">
                <img src="{{ $footerLogo }}" loading="lazy" alt="Logo" style="max-height: 50px;" />
            </a>
            <div class="copyright-text-wrapper">
                <p class="copyright-text">{{ $footerCopyright }}</p>
            </div>
        </div>
    </div>
</section>