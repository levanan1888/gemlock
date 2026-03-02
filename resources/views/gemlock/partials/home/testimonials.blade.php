@php
    use App\Helpers\ContentHelper;

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

<section class="testimonial section-white">
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
                        <div class="testimonial-card">
                            <img src="{{ $testimonial1Image }}" loading="lazy"
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
                        <div class="testimonial-card">
                            <img src="{{ $testimonial2Image }}" loading="lazy"
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
                        <div class="testimonial-card">
                            <img
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
                <div class="left-arrow w-slider-arrow-left">
                    <img
                        src="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c2/69420cbdd4e2e39b5eb77afa_arrow-right%20(1).png"
                        loading="lazy" alt="Left-pointing arrow icon." class="arrow-icon"/>
                </div>
                <div class="right-arrow w-slider-arrow-right">
                    <img
                        src="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c2/69420cbdd4e2e39b5eb77af9_arrow-right.png"
                        loading="lazy" alt="Right-pointing arrow icon." class="arrow-icon"/>
                </div>
            </div>
        </div>
    </div>
</section>

