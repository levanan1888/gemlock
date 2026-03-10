@php
    use App\Models\MenuItem;
    $pageType = 'gemlock';

    $footerDescription = \App\Helpers\ContentHelper::text('footer_description_'.$pageType, 'Perfect House Việt Nam - Kết nối tương lai. Chuyên cung cấp giải pháp Smart Home và Năng lượng sạch.', $pageType);
    $footerSocialTitle = \App\Helpers\ContentHelper::text('footer_social_title_'.$pageType, 'Liên kết mạng xã hội', $pageType);
    $footerFacebook = \App\Helpers\ContentHelper::link('footer_social_facebook_'.$pageType, 'https://facebook.com/', $pageType);
    $footerYoutube = \App\Helpers\ContentHelper::link('footer_social_youtube_'.$pageType, 'https://youtube.com/', $pageType);
    $footerZalo = \App\Helpers\ContentHelper::link('footer_social_zalo_'.$pageType, 'https://zalo.me/', $pageType);
    $footerCopyright = \App\Helpers\ContentHelper::text('footer_copyright_'.$pageType, 'Copyright © 2025 Perfect House Việt Nam.', $pageType);
    $footerLogo = \App\Helpers\ContentHelper::image('footer_logo_'.$pageType, 'image/Logo Tách Nền.png', $pageType);

    $footerCompanyTitle = \App\Helpers\ContentHelper::text('footer_company_title_'.$pageType, 'Công ty', $pageType);
    $footerMoreTitle = \App\Helpers\ContentHelper::text('footer_more_title_'.$pageType, 'Thêm', $pageType);
    $footerPolicyTitle = \App\Helpers\ContentHelper::text('footer_policy_title_'.$pageType, 'Chính sách & Pháp lý', $pageType);

    // Get footer menu from database
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
                            href="{{ $footerFacebook }}" target="_blank" class="social-icon w-inline-block" aria-label="Facebook">
                            <i class="bi bi-facebook"></i>
                            <span>Facebook</span>
                        </a>
                        <a data-w-id="57013a19-828b-8803-241e-4822ac873832" href="{{ $footerYoutube }}" target="_blank"
                            class="social-icon w-inline-block" aria-label="Youtube">
                            <i class="bi bi-youtube"></i>
                            <span>Youtube</span>
                        </a>
                        <a data-w-id="57013a19-828b-8803-241e-4822ac873835" href="{{ $footerZalo }}" target="_blank"
                            class="social-icon w-inline-block" aria-label="Zalo">
                            <i class="bi bi-chat-dots-fill"></i>
                            <span>Zalo</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="footer-links">
                @if(count($footerMenus) > 0)
                    @foreach($footerMenus as $menu)
                        <div class="footer-link-column">
                            <p class="text-18-bold">{{ $menu['label'] }}</p>
                            <div class="footer-link-wrapper">
                                @foreach($menu['children'] as $child)
                                    <a href="{{ $child['url'] }}" class="footer-link w-inline-block" {{ $child['open_in_new_tab'] ? 'target="_blank"' : '' }}>
                                        <p>{{ $child['label'] }}</p>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="footer-link-column">
                        <p class="text-18-bold">{{ $footerCompanyTitle }}</p>
                        <div class="footer-link-wrapper">
                            <a href="/" class="footer-link w-inline-block"><p>Trang chủ</p></a>
                            <a href="/gemlock/about" class="footer-link w-inline-block"><p>Giới thiệu</p></a>
                            <a href="/gemlock/blog" class="footer-link w-inline-block"><p>Tin tức</p></a>
                        </div>
                    </div>
                    <div class="footer-link-column">
                        <p class="text-18-bold">{{ $footerMoreTitle }}</p>
                        <div class="footer-link-wrapper">
                            <a href="/testimonial" class="footer-link w-inline-block"><p>Cảm nhận</p></a>
                            <a href="/gemlock/contact" class="footer-link w-inline-block"><p>Liên hệ</p></a>
                            <a href="/license" class="footer-link w-inline-block"><p>Giấy phép</p></a>
                        </div>
                    </div>
                    <div class="footer-link-column">
                        <p class="text-18-bold">{{ $footerPolicyTitle }}</p>
                        <div class="footer-link-wrapper">
                            <a href="/privacy-policy" class="footer-link w-inline-block"><p>Chính sách bảo mật</p></a>
                            <a href="/terms-conditions" class="footer-link w-inline-block"><p>Điều khoản sử dụng</p></a>
                        </div>
                    </div>
                @endif
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
