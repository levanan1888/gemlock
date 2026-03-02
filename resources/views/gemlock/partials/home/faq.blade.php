@php
    use App\Helpers\ContentHelper;

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

<section class="faq section-tint">
    <div class="w-layout-blockcontainer container w-container">
        <div class="faq-content-wrapper">
            <div data-w-id="e6d22c1f-ed6d-610d-abb9-3b1ab855a577" class="title-2">
                <h1 class="heading-h2">{{ $faqTitle }}</h1>
                <p class="subtitle _525px">{{ $faqSubtitle }}</p>
            </div>
            <div class="faq-content">
                <div class="faq-wrapper">
                    <div data-hover="false" data-delay="0" class="single-faq w-dropdown">
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
                    <div data-hover="false" data-delay="0" class="single-faq w-dropdown">
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
                    <div data-hover="false" data-delay="0" class="single-faq w-dropdown">
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
                    <div data-hover="false" data-delay="0" class="single-faq padding-none w-dropdown">
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
                     alt="Perfect House Support"
                     class="faq-image"/>
            </div>
        </div>
    </div>
</section>

