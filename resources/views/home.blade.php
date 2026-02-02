@extends('layouts.app')

@section('title', 'GemLock - Trang chủ')

@section('content')
    @include('partials.header')

    <section class="hero">
        <div class="w-layout-blockcontainer container w-container">
            <div data-w-id="87b6bcd2-8c02-6b9e-2108-1e507f18ddfd" class="hero-content-wrapper">
                <div data-w-id="71c240ff-6b04-6908-6e2e-7dad3f886f67" class="hero-left">
                    <div class="hero-left-content">
                        <div class="hero-top-content">
                            <div class="title">
                                <h1 class="heading-h1">GemLock <span class="text-span">Kết nối</span> tương lai</h1>
                                <p class="hero-subtitle">Chuyên cung cấp khóa thông minh GemLock, giải pháp điện năng lượng
                                    mặt trời GemSolar và thi công cửa nhôm kính cao cấp.</p>
                            </div><a data-w-id="7a0890ec-d742-e9b4-eddc-c0ce1ae0ce88" href="/contact"
                                class="secondary-button w-inline-block">
                                <p>Liên hệ ngay</p>
                                <div class="arrow-wrapper"><img loading="lazy"
                                        src="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c2/69420cbdd4e2e39b5eb77ac0_arrow-up-right.svg"
                                        alt="Right ICon" /></div>
                            </a>
                        </div>
                        <div data-w-id="7142b428-a210-40c2-c398-a13470abe48b" class="hero-review">
                            <div class="rating">
                                <div class="author-images"><img
                                        src="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c2/69420cbdd4e2e39b5eb77ac3_Avatar%20Image.png"
                                        loading="lazy" alt="" class="author-image" /><img
                                        src="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c2/69420cbdd4e2e39b5eb77ac1_Avatar%20Image%20(2).png"
                                        loading="lazy" alt="" class="author-image _1" /><img
                                        src="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c2/69420cbdd4e2e39b5eb77ac4_Avatar%20Image%20(1).png"
                                        loading="lazy" alt="" class="author-image _1" /></div>
                                <div class="rating-text">
                                    <div class="star"><img
                                            src="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c2/696dc5a8fe87cca3c9aad4b3_Vector%20(19).png"
                                            loading="lazy" alt="Icon" class="star-image" /><img
                                            src="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c2/696dc5a8fe87cca3c9aad4b3_Vector%20(19).png"
                                            loading="lazy" alt="Icon" class="star-image" /><img
                                            src="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c2/696dc5a8fe87cca3c9aad4b3_Vector%20(19).png"
                                            loading="lazy" alt="Icon" class="star-image" /><img
                                            src="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c2/696dc5a8fe87cca3c9aad4b3_Vector%20(19).png"
                                            loading="lazy" alt="Icon" class="star-image" /><img
                                            src="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c2/696dc5a8fe87cca3c9aad4b3_Vector%20(19).png"
                                            loading="lazy" alt="Icon" class="star-image" /></div>
                                    <p class="hero-rating-text">4.9/5 Star — Rating </p>
                                </div>
                            </div>
                            <p class="body-14-regular text-neutral-03">Hơn 300 cá nhân và doanh nghiệp đã tin tưởng đồng
                                hành cùng
                                GemLock Việt Nam.</p>
                        </div>
                    </div><img src="{{ asset('furni/images/couch.png') }}" loading="lazy" alt="Perfect House Banner"
                        class="image" />
                </div>
            </div>
        </div>
    </section>
    <section class="gallery">
        <div class="w-layout-blockcontainer container w-container">
            <div data-w-id="a8b3ed35-d0d6-484a-a7de-5e4e34eccb6d" class="gallery-content-wrapper">
                <div class="title">
                    <h1 class="heading-h2">Sản phẩm & <span class="text-span">Giải pháp</span></h1>
                    <p class="hero-subtitle">Perfect House cung cấp giải pháp thông minh và bền vững cho ngôi nhà của
                        bạn.</p>
                </div><a data-w-id="7a0890ec-d742-e9b4-eddc-c0ce1ae0ce88" href="/about"
                    class="secondary-button w-inline-block">
                    <p>Tìm hiểu thêm</p>
                    <div class="arrow-wrapper"><img loading="lazy"
                            src="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c2/69420cbdd4e2e39b5eb77ac0_arrow-up-right.svg"
                            alt="Right ICon" /></div>
                </a>
            </div>
        </div>
        <div class="gallery-slider">
            <div class="gallery-track">
                <!-- Set 1 -->
                <img src="{{ asset('furni/images/img-grid-1.jpg') }}" loading="lazy" alt="Gallery Image"
                    class="gallery-item img-tall" />
                <img src="{{ asset('furni/images/img-grid-2.jpg') }}" loading="lazy" alt="Gallery Image"
                    class="gallery-item img-short" />
                <img src="{{ asset('image/solar.png') }}" loading="lazy" alt="Gallery Image"
                    class="gallery-item img-tall" />
                <img src="{{ asset('image/perfect_house_09.png') }}" loading="lazy" alt="Gallery Image"
                    class="gallery-item img-short" />
                <img src="{{ asset('furni/images/img-grid-3.jpg') }}" loading="lazy" alt="Gallery Image"
                    class="gallery-item img-tall" />
                <img src="{{ asset('image/banner perfect.png') }}" loading="lazy" alt="Gallery Image"
                    class="gallery-item img-short" />

                <!-- Set 2 (Duplicate for loop) -->
                <img src="{{ asset('furni/images/img-grid-1.jpg') }}" loading="lazy" alt="Gallery Image"
                    class="gallery-item img-tall" />
                <img src="{{ asset('furni/images/img-grid-2.jpg') }}" loading="lazy" alt="Gallery Image"
                    class="gallery-item img-short" />
                <img src="{{ asset('image/solar.png') }}" loading="lazy" alt="Gallery Image"
                    class="gallery-item img-tall" />
                <img src="{{ asset('image/perfect_house_09.png') }}" loading="lazy" alt="Gallery Image"
                    class="gallery-item img-short" />
                <img src="{{ asset('furni/images/img-grid-3.jpg') }}" loading="lazy" alt="Gallery Image"
                    class="gallery-item img-tall" />
                <img src="{{ asset('image/banner perfect.png') }}" loading="lazy" alt="Gallery Image"
                    class="gallery-item img-short" />
            </div>
        </div>
    </section>
    <section class="service">
        <div class="w-layout-blockcontainer container w-container">
            <div class="service-content-wrapper">
                <div id="w-node-_58489783-667a-081f-3512-3dedffe5f278-5eb779a2" class="rign-wrapper"
                    style="min-height: 600px;">
                    <div data-w-id="9109b7d9-ad10-a876-da55-accf91913a46" class="large-ring"></div>
                    <div data-w-id="830319a5-6fa5-35a9-d7d8-479963ca5a31" class="medium-ring"></div>
                    <div data-w-id="2e7763b3-509a-136c-9d01-da766522da36" class="small-ring"></div>
                    <div data-w-id="88a6f3d6-abd1-bcee-5090-09fe389be2d2" class="title-2 absolute" style="z-index: 10;">
                        <h1 class="heading-h2">Giải pháp <span class="text-span">Toàn diện</span></h1>
                        <p class="subtitle">Liên hệ với chúng tôi để bắt đầu hành trình nâng tầm không gian sống của bạn.
                        </p>
                        <a href="/booking" class="primary-button-white w-inline-block">
                            <p>Liên hệ ngay</p>
                            <div class="arrow-wrapper"><img loading="lazy"
                                    src="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c2/69420cbdd4e2e39b5eb77ae3_arrow-up-right%20(1).svg"
                                    alt="Right Icon" /></div>
                        </a>
                    </div>
                </div>
                <div data-w-id="21491fb6-543c-6fd1-0b01-95dfe9d51762" class="service-1 w-dyn-list">
                    <div role="list" class="w-dyn-items">
                        <div role="listitem" class="w-dyn-item"><a href="/service/individual-therapy"
                                class="service-card w-inline-block"><img
                                    src="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c9/69420cbdd4e2e39b5eb779d1_Vector%20(4).svg"
                                    loading="lazy" alt="Service Icon" class="service-icon" />
                                <div class="service-content">
                                    <p class="service-title">Khóa thông minh GemLock</p>
                                    <p class="service-excerpt">Giải pháp bảo mật hiện đại với công nghệ vân tay, mã số, thẻ
                                        từ và điều khiển từ xa qua smartphone.
                                    </p>
                                </div>
                            </a></div>
                    </div>
                </div>
                <div data-w-id="8b928a03-3d6a-650d-9532-53130f294db1" class="service-2 w-dyn-list">
                    <div role="list" class="w-dyn-items">
                        <div role="listitem" class="w-dyn-item"><a href="/service/depression-support"
                                class="service-card w-inline-block"><img
                                    src="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c9/69420cbdd4e2e39b5eb779d3_Vector%20(5).svg"
                                    loading="lazy" alt="Service Icon" class="service-icon" />
                                <div class="service-content">
                                    <p class="service-title">Điện mặt trời GemSolar</p>
                                    <p class="service-excerpt">Giải pháp năng lượng xanh bền vững, giúp tiết kiệm chi phí
                                        điện năng và bảo vệ môi trường cho gia đình và doanh nghiệp.</p>
                                </div>
                            </a></div>
                    </div>
                </div>
                <div data-w-id="1f10e467-7d96-6e3c-ae6a-08e57b01ed3a" class="service-3 w-dyn-list">
                    <div role="list" class="w-dyn-items">
                        <div role="listitem" class="w-dyn-item"><a href="/service/family-therapy"
                                class="service-card w-inline-block"><img
                                    src="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c9/69420cbdd4e2e39b5eb779d4_Vector%20(6).svg"
                                    loading="lazy" alt="Service Icon" class="service-icon" />
                                <div class="service-content">
                                    <p class="service-title">Cửa nhôm kính cao cấp</p>
                                    <p class="service-excerpt">Tư vấn, thiết kế và thi công các loại cửa nhôm kính, cửa
                                        cuốn, lan can kính với độ bền và thẩm mỹ cao.</p>
                                </div>
                            </a></div>
                    </div>
                </div>
                <div data-w-id="4b11953a-99c2-890d-13a8-9e2fd9e63504" class="service-4 w-dyn-list">
                    <div role="list" class="w-dyn-items">
                        <div role="listitem" class="w-dyn-item"><a href="/service/trauma-ptsd-recovery"
                                class="service-card w-inline-block"><img
                                    src="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c9/69420cbdd4e2e39b5eb779d5_Vector%20(7).svg"
                                    loading="lazy" alt="Service Icon" class="service-icon" />
                                <div class="service-content">
                                    <p class="service-title">CNTT & Hạ tầng</p>
                                    <p class="service-excerpt">Cung cấp thiết bị, vận hành và quản lý hệ thống hạ tầng viễn
                                        thông và CNTT chuyên nghiệp.</p>
                                </div>
                            </a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="stats" style="background-color: #ffffff; padding: 80px 0;">
        <div class="w-layout-blockcontainer container w-container">
            <div data-w-id="8a627d31-0e76-5837-a07c-bc600c688747" class="stats-wrapper"
                style="background-color: #ffd700; border-radius: 30px; padding: 60px 40px; color: #5d4037; display: flex; justify-content: space-around; align-items: center; box-shadow: 0 20px 40px rgba(0,0,0,0.1);">
                <div class="stats-item">
                    <h2 class="large-stats-number">5+</h2>
                    <p class="large-stats-text opacity-76">Năm kinh nghiệm trong ngành</p>
                </div>
                <div class="stats-item">
                    <h2 class="large-stats-number">1,000+</h2>
                    <p class="large-stats-text opacity-76">Khách hàng tin tưởng và hài lòng</p>
                </div>
                <div class="stats-item">
                    <h2 class="large-stats-number">50+</h2>
                    <p class="large-stats-text opacity-76">Nhân sự chuyên môn cao</p>
                </div>
                <div class="stats-item">
                    <h2 class="large-stats-number">99%</h2>
                    <p class="large-stats-text opacity-76">Tỷ lệ hoàn thành dự án xuất sắc</p>
                </div>
            </div>
        </div>
    </section>
    <section class="why-choose">
        <div class="w-layout-blockcontainer container w-container">
            <div class="why-choose-content-wrapper">
                <div data-w-id="cd7c4fdb-c1e9-0153-2d60-0d50fb91fc59" class="why-choose-left">
                    <div class="title">
                        <h1 class="heading-h2">Tại sao chọn <span class="text-span">Perfect House</span></h1>
                        <p class="hero-subtitle">Chúng tôi cam kết mang đến những sản phẩm chất lượng vượt trội và dịch vụ
                            tận tâm nhất.</p>
                    </div>
                    <div class="why-choose-card-wrapper">
                        <div class="why-choose-card"><img
                                src="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c2/69420cbdd4e2e39b5eb77ae6_Vector%20(1).png"
                                loading="lazy" alt="Brown asterisk symbol with rounded, petal-like ends."
                                class="why-choose-icon" />
                            <div class="why-choose-text">
                                <p class="why-choose-title">Chất lượng vượt trội</p>
                                <p>Sản phẩm nhập khẩu chính hãng, đạt tiêu chuẩn chất lượng cao nhất.</p>
                            </div>
                        </div>
                        <div class="why-choose-card"><img
                                src="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c2/69420cbdd4e2e39b5eb77ae5_Vector%20(2).png"
                                loading="lazy" alt="Three stacked brown bowls of decreasing size on a white background."
                                class="why-choose-icon" />
                            <div class="why-choose-text">
                                <p class="why-choose-title">Đội ngũ chuyên nghiệp</p>
                                <p>Nhiều năm kinh nghiệm trong tư vấn và thi công lắp đặt.</p>
                            </div>
                        </div>
                    </div>
                </div><img src="{{ asset('image/perfect_house_09.png') }}" loading="lazy"
                    data-w-id="98f1c9ab-2d4c-9408-977b-0c09ce79d3f3" alt="Perfect House Team" class="why-choose-image" />
            </div>
            <div class="why-choose-bg-shape"></div>
        </div>
    </section>
    <section class="team">
        <div class="w-layout-blockcontainer container w-container">
            <div class="team-content-wrapper">
                <div data-w-id="b622f4f5-9033-9e1b-5b95-20ca6b6c7408" class="title-2 _485-px">
                    <h1 class="heading-h2">Thương hiệu <span class="text-span">Đồng hành</span></h1>
                    <p class="subtitle">Chúng tôi tự hào là đối tác chiến lược của các thương hiệu hàng đầu trong lĩnh vực
                        công nghệ và kiến trúc.</p>
                </div>
                <div class="team-wrapper">
                    <div data-w-id="3308fca4-1cd3-e7b2-bd8a-2dbfb7a0a95e" class="team-card"
                        style="padding: 20px; text-align: center;">
                        <img src="{{ asset('image/Logo Tách Nền.png') }}" loading="lazy" alt="GemLock"
                            style="height: 80px; width: 100%; object-fit: contain; margin-bottom: 15px;" />
                        <div class="team-member-details">
                            <p class="team-member-name">GemLock</p>
                            <p class="team-member-designation">Smart Security</p>
                        </div>
                    </div>
                    <div data-w-id="c2517131-2eb3-47d0-aed2-2b080aa0b43d" class="team-card"
                        style="padding: 20px; text-align: center;">
                        <img src="https://content.pancake.vn/1/s750x750/fwebp/a0/10/53/ce/0c8b304d1a5c085e4718387faaa3e33a09f9f9b5dc201adb4b2db48d-w:5906-h:5906-l:419034-t:image/png.png"
                            loading="lazy" alt="GemSolar"
                            style="height: 80px; width: 100%; object-fit: contain; margin-bottom: 15px;" />
                        <div class="team-member-details">
                            <p class="team-member-name">GemSolar</p>
                            <p class="team-member-designation">Clean Energy</p>
                        </div>
                    </div>
                    <div data-w-id="4c695a9d-f0e0-fc49-c80a-b1c8f4ea40b4" class="team-card"
                        style="padding: 20px; text-align: center;">
                        <img src="https://content.pancake.vn/1/s569x499/fwebp/07/26/cd/7b/6196f9de02559345bba69d77cd42f862fe5e878c55935a4fbd3720ce-w:4009-h:3509-l:303004-t:image/png.png"
                            loading="lazy" alt="Perfect Glass"
                            style="height: 80px; width: 100%; object-fit: contain; margin-bottom: 15px;" />
                        <div class="team-member-details">
                            <p class="team-member-name">Perfect House</p>
                            <p class="team-member-designation">Smart Home & An ninh</p>
                            <p class="paragraph-small" style="font-size: 0.9em; margin-top: 5px; opacity: 0.8;">Giải pháp Hạ
                                tầng viễn thông & Camera an ninh hàng đầu.</p>
                        </div>
                    </div>
                    <div data-w-id="6d69e733-a810-95e9-c820-6062515fbd4d" class="team-card"
                        style="padding: 20px; text-align: center;">
                        <img src="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c9/69420cbdd4e2e39b5eb779d5_Vector%20(7).svg"
                            loading="lazy" alt="GemTech"
                            style="height: 80px; width: 100%; object-fit: contain; margin-bottom: 15px;" />
                        <div class="team-member-details">
                            <p class="team-member-name">GemTech</p>
                            <p class="team-member-designation">Infrastructure</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="team-bg-shape"></div>
        </div>
    </section>
    <section class="testimonial">
        <div class="w-layout-blockcontainer container w-container">
            <div data-w-id="8de69b20-474c-2e2d-f11b-e8d5589e390e" class="testimonial-content-wrapper">
                <div class="title _335">
                    <h1 class="heading-h2">Khách hàng <span class="text-span">Nói gì</span></h1>
                    <p class="subtitle">Sự hài lòng của khách hàng là thước đo thành công lớn nhất của chúng tôi.</p>
                </div>
                <div data-delay="4000" data-animation="cross" class="testimonial-slider w-slider" data-autoplay="false"
                    data-easing="linear" data-hide-arrows="false" data-disable-swipe="false" data-autoplay-limit="0"
                    data-nav-spacing="3" data-duration="500" data-infinite="true">
                    <div class="testimonial-silder-mask w-slider-mask">
                        <div class="testimonial-slide w-slide">
                            <div class="testimonial-card"><img src="{{ asset('furni/images/person_1.jpg') }}" loading="lazy"
                                    sizes="100vw" alt="Khách hàng" class="review-image" />
                                <div class="review-content">
                                    <p class="review-text">“Từ khi lắp đặt khóa GemLock, tôi cảm thấy rất an tâm mỗi khi
                                        vắng nhà. Công nghệ vân tay rất nhạy và tiện lợi.”</p>
                                    <div class="review-author">
                                        <p class="review-author-name">Anh Hoàng</p>
                                        <p class="reviewer-service">Khóa thông minh</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-slide w-slide">
                            <div class="testimonial-card"><img src="{{ asset('furni/images/person_2.jpg') }}" loading="lazy"
                                    sizes="100vw" alt="Khách hàng" class="review-image" />
                                <div class="review-content">
                                    <p class="review-text">“Hệ thống điện mặt trời GemSolar giúp gia đình tôi tiết kiệm đáng
                                        kể chi phí tiền điện hàng tháng. Dịch vụ lắp đặt rất chuyên nghiệp.”</p>
                                    <div class="review-author">
                                        <p class="review-author-name">Chị Lan</p>
                                        <p class="reviewer-service">Điện mặt trời</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-slide w-slide">
                            <div class="testimonial-card"><img
                                    src="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c2/69420cbdd4e2e39b5eb77afc_Image%20(32).png"
                                    loading="lazy"
                                    alt="Man in a pink checkered shirt sitting on a couch holding a glass of water and touching his forehead, facing a woman with a clipboard in a therapy session."
                                    class="review-image" />
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
                            loading="lazy" alt="Left-pointing arrow icon." class="arrow-icon" /></div>
                    <div class="right-arrow w-slider-arrow-right"><img
                            src="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c2/69420cbdd4e2e39b5eb77af9_arrow-right.png"
                            loading="lazy" alt="Right-pointing arrow icon." class="arrow-icon" /></div>
                </div>
            </div>
        </div>
    </section>
    <section class="faq">
        <div class="w-layout-blockcontainer container w-container">
            <div class="faq-content-wrapper">
                <div data-w-id="e6d22c1f-ed6d-610d-abb9-3b1ab855a577" class="title-2">
                    <h1 class="heading-h2">Câu hỏi thường gặp</h1>
                    <p class="subtitle _525px">Giải đáp thắc mắc của bạn về sản phẩm và dịch vụ của chúng tôi.</p>
                </div>
                <div class="faq-content">
                    <div data-w-id="e6d22c1f-ed6d-610d-abb9-3b1ab855a57d" class="faq-wrapper">
                        <div data-hover="false" data-delay="0" data-w-id="e6d22c1f-ed6d-610d-abb9-3b1ab855a57e"
                            class="single-faq w-dropdown">
                            <div class="question w-dropdown-toggle">
                                <div class="question-wrapper">
                                    <div>Khóa thông minh GemLock có an toàn không?</div><img
                                        src="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c2/69420cbdd4e2e39b5eb77afe_Chevron.png"
                                        loading="lazy" alt="Downward-facing chevron arrow icon." class="faq-icon" />
                                </div>
                            </div>
                            <nav class="answer w-dropdown-list">
                                <p class="faq-answer">Có, GemLock sử dụng công nghệ bảo mật tiên tiến nhất, giúp bảo vệ ngôi
                                    nhà của bạn an toàn tuyệt đối trước mọi nguy cơ.</p>
                            </nav>
                        </div>
                        <div class="faq-line"></div>
                        <div data-hover="false" data-delay="0" data-w-id="e6d22c1f-ed6d-610d-abb9-3b1ab855a588"
                            class="single-faq w-dropdown">
                            <div class="question w-dropdown-toggle">
                                <div class="question-wrapper">
                                    <div>Lợi ích của điện mặt trời GemSolar là gì?</div><img
                                        src="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c2/69420cbdd4e2e39b5eb77afe_Chevron.png"
                                        loading="lazy" alt="Downward-facing chevron arrow icon." class="faq-icon" />
                                </div>
                            </div>
                            <nav class="answer w-dropdown-list">
                                <p class="faq-answer">GemSolar giúp tiết kiệm từ 40-70% hóa đơn tiền điện, hoàn vốn nhanh và
                                    thân thiện với môi trường.</p>
                            </nav>
                        </div>
                        <div class="faq-line"></div>
                        <div data-hover="false" data-delay="0" data-w-id="e6d22c1f-ed6d-610d-abb9-3b1ab855a592"
                            class="single-faq w-dropdown">
                            <div class="question w-dropdown-toggle">
                                <div class="question-wrapper">
                                    <div>GemLock có cung cấp dịch vụ lắp đặt không?</div><img
                                        src="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c2/69420cbdd4e2e39b5eb77afe_Chevron.png"
                                        loading="lazy" alt="Downward-facing chevron arrow icon." class="faq-icon" />
                                </div>
                            </div>
                            <nav class="answer w-dropdown-list">
                                <p class="faq-answer">Có, chúng tôi cung cấp dịch vụ tư vấn, thiết kế và lắp đặt trọn gói,
                                    đảm bảo chất lượng và sự hài lòng cho khách hàng.</p>
                            </nav>
                        </div>
                        <div class="faq-line"></div>
                        <div data-hover="false" data-delay="0" data-w-id="e6d22c1f-ed6d-610d-abb9-3b1ab855a59c"
                            class="single-faq padding-none w-dropdown">
                            <div class="question w-dropdown-toggle">
                                <div class="question-wrapper">
                                    <div>Tại sao chọn GemLock?</div><img
                                        src="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c2/69420cbdd4e2e39b5eb77afe_Chevron.png"
                                        loading="lazy" alt="Downward-facing chevron arrow icon." class="faq-icon" />
                                </div>
                            </div>
                            <nav class="answer padding-none w-dropdown-list">
                                <p class="faq-answer">Bạn có thể liên hệ với chúng tôi qua số điện thoại hotline hoặc gửi
                                    email trực tiếp qua website.</p>
                            </nav>
                        </div>
                    </div><img src="{{ asset('image/perfect_house_09.png') }}" loading="lazy"
                        data-w-id="e6d22c1f-ed6d-610d-abb9-3b1ab855a5a5" alt="Perfect House Support" class="faq-image" />
                </div>
            </div>
        </div>
    </section>
    <section class="cta" style="background-color: #ffffff; padding: 100px 0;">
        <div class="w-layout-blockcontainer container w-container">
            <div data-w-id="a90f08e8-b8cb-0d7a-1c6e-ea4374ad5744" class="cta-content"
                style="background-color: #ffd700; border-radius: 30px; padding: 80px 40px; position: relative; overflow: hidden; box-shadow: 0 20px 40px rgba(0,0,0,0.1);">
                <div class="cta-text">
                    <div class="title-2">
                        <h1 class="heading-h2 white" style="color: #333;">Kết nối <span class="text-span-2">tương lai</span>
                        </h1>
                        <p class="cta-subtitle" style="color: #555;">Liên hệ với chúng tôi để bắt đầu hành trình nâng tầm
                            không gian sống của bạn
                            với giải pháp Smart Home và Năng lượng sạch.</p>
                    </div><a data-w-id="511fb6fc-d96d-c424-3b08-d14cbd2da632" href="/booking"
                        class="secondary-button-white w-inline-block" style="background-color: #333; color: white;">
                        <p>Liên hệ ngay</p>
                        <div class="arrow-wrapper"><img loading="lazy"
                                src="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c2/69420cbdd4e2e39b5eb77ae3_arrow-up-right%20(1).svg"
                                alt="Right Icon" style="filter: invert(1);" /></div>
                    </a>
                </div>
                <div data-w-id="a90f08e8-b8cb-0d7a-1c6e-ea4374ad574d" class="cta-line">
                    <div class="cta-image-wrapper"><img src="{{ asset('image/Logo Tách Nền.png') }}" loading="lazy"
                            data-w-id="a90f08e8-b8cb-0d7a-1c6e-ea4374ad574e" alt="Partner Brand" class="cta-avatar-image"
                            style="background: white; padding: 10px; border-radius: 50%; object-fit: contain;" /><img
                            src="https://content.pancake.vn/1/s750x750/fwebp/a0/10/53/ce/0c8b304d1a5c085e4718387faaa3e33a09f9f9b5dc201adb4b2db48d-w:5906-h:5906-l:419034-t:image/png.png"
                            loading="lazy" data-w-id="a90f08e8-b8cb-0d7a-1c6e-ea4374ad574f" alt="Partner Brand"
                            class="cta-avatar-image"
                            style="background: white; padding: 10px; border-radius: 50%; object-fit: contain;" /></div>
                    <div class="cta-image-wrapper vartical"><img
                            src="https://content.pancake.vn/1/s569x499/fwebp/07/26/cd/7b/6196f9de02559345bba69d77cd42f862fe5e878c55935a4fbd3720ce-w:4009-h:3509-l:303004-t:image/png.png"
                            loading="lazy" data-w-id="8841373c-85bc-8a3d-0925-3d73763368d2" alt="Partner Brand"
                            class="cta-avatar-image vartical"
                            style="background: white; padding: 10px; border-radius: 50%; object-fit: contain;" /><img
                            src="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c9/69420cbdd4e2e39b5eb779d5_Vector%20(7).svg"
                            loading="lazy" data-w-id="8841373c-85bc-8a3d-0925-3d73763368d3" alt="Partner Brand"
                            class="cta-avatar-image vartical"
                            style="background: white; padding: 10px; border-radius: 50%; object-fit: contain;" /></div>
                </div>
                <div data-w-id="a90f08e8-b8cb-0d7a-1c6e-ea4374ad5750" class="cta-line medium">
                    <div class="cta-image-wrapper"><img src="{{ asset('image/Logo Tách Nền.png') }}" loading="lazy"
                            data-w-id="a90f08e8-b8cb-0d7a-1c6e-ea4374ad5751" alt="Partner Brand" class="cta-avatar-image"
                            style="background: white; padding: 10px; border-radius: 50%; object-fit: contain;" /><img
                            src="https://content.pancake.vn/1/s750x750/fwebp/a0/10/53/ce/0c8b304d1a5c085e4718387faaa3e33a09f9f9b5dc201adb4b2db48d-w:5906-h:5906-l:419034-t:image/png.png"
                            loading="lazy" data-w-id="a90f08e8-b8cb-0d7a-1c6e-ea4374ad5752" alt="Partner Brand"
                            class="cta-avatar-image"
                            style="background: white; padding: 10px; border-radius: 50%; object-fit: contain;" /></div>
                    <div class="cta-image-wrapper vartical"><img
                            src="https://content.pancake.vn/1/s569x499/fwebp/07/26/cd/7b/6196f9de02559345bba69d77cd42f862fe5e878c55935a4fbd3720ce-w:4009-h:3509-l:303004-t:image/png.png"
                            loading="lazy" data-w-id="29a3c8a7-39f3-fbff-022b-959c6fa6b621" alt="Partner Brand"
                            class="cta-avatar-image vartical"
                            style="background: white; padding: 10px; border-radius: 50%; object-fit: contain;" /><img
                            src="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c9/69420cbdd4e2e39b5eb779d5_Vector%20(7).svg"
                            loading="lazy" data-w-id="29a3c8a7-39f3-fbff-022b-959c6fa6b622" alt="Partner Brand"
                            class="cta-avatar-image vartical"
                            style="background: white; padding: 10px; border-radius: 50%; object-fit: contain;" /></div>
                </div>
                <div data-w-id="a90f08e8-b8cb-0d7a-1c6e-ea4374ad5753" class="cta-line small">
                    <div class="cta-image-wrapper"><img src="{{ asset('image/Logo Tách Nền.png') }}" loading="lazy"
                            data-w-id="a90f08e8-b8cb-0d7a-1c6e-ea4374ad5754" alt="Partner Brand" class="cta-avatar-image"
                            style="background: white; padding: 10px; border-radius: 50%; object-fit: contain;" /><img
                            src="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c9/69420cbdd4e2e39b5eb779d3_Vector%20(5).svg"
                            loading="lazy" data-w-id="a90f08e8-b8cb-0d7a-1c6e-ea4374ad5755" alt="Partner Brand"
                            class="cta-avatar-image"
                            style="background: white; padding: 10px; border-radius: 50%; object-fit: contain;" /></div>
                    <div class="cta-image-wrapper vartical"><img
                            src="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c9/69420cbdd4e2e39b5eb779d4_Vector%20(6).svg"
                            loading="lazy" data-w-id="6f3df56e-b1e8-3726-8bf9-e8f61f1f2159" alt="Partner Brand"
                            class="cta-avatar-image vartical"
                            style="background: white; padding: 10px; border-radius: 50%; object-fit: contain;" /><img
                            src="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c9/69420cbdd4e2e39b5eb779d5_Vector%20(7).svg"
                            loading="lazy" data-w-id="6f3df56e-b1e8-3726-8bf9-e8f61f1f215a" alt="Partner Brand"
                            class="cta-avatar-image vartical"
                            style="background: white; padding: 10px; border-radius: 50%; object-fit: contain;" /></div>
                </div>
            </div>
        </div>
    </section>

    <style>
        /* Gallery Slider */
        .gallery-slider {
            overflow: hidden;
            padding: 40px 0;
            white-space: nowrap;
        }

        .gallery-track {
            display: inline-flex;
            gap: 20px;
            animation: scroll 20s linear infinite;
            /* Adjust speed here (lower = faster) */
            align-items: center;
            /* Center items vertically */
        }

        /* Auto-scroll Animation */
        @keyframes scroll {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }

            /* Access first half of duplicate set */
        }

        .gallery-item {
            border-radius: 20px;
            object-fit: cover;
            flex-shrink: 0;
            transition: transform 0.4s ease, box-shadow 0.4s ease;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .gallery-item:hover {
            transform: scale(1.05);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
            z-index: 10;
        }

        .img-tall {
            height: 450px;
            width: 600px;
        }

        .img-short {
            height: 350px;
            width: 400px;
        }

        @media (max-width: 768px) {
            .img-tall {
                height: 300px;
                width: 400px;
            }

            .img-short {
                height: 250px;
                width: 300px;
            }
        }

        /* Custom Animations */
        .fade-in-up {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }

        .fade-in-up.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        .zoom-in {
            opacity: 0;
            transform: scale(0.9);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }

        .zoom-in.is-visible {
            opacity: 1;
            transform: scale(1);
        }

        /* Ensure logos fit correctly */
        .cta-avatar-image {
            width: 60px;
            height: 60px;
            object-fit: contain;
            background: white;
            border-radius: 50%;
            padding: 10px;
        }

        /* Hover Effects */
        .team-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .team-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(255, 215, 0, 0.2);
        }

        .stats-wrapper {
            transition: transform 0.3s ease;
        }

        .stats-wrapper:hover {
            transform: scale(1.02);
        }

        /* Staggered transition delays for team cards */
        .team-card:nth-child(1) {
            transition-delay: 0.1s;
        }

        .team-card:nth-child(2) {
            transition-delay: 0.2s;
        }

        .team-card:nth-child(3) {
            transition-delay: 0.3s;
        }

        .team-card:nth-child(4) {
            transition-delay: 0.4s;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Intersection Observer for scroll animations
            const observerOptions = {
                root: null,
                rootMargin: '0px',
                threshold: 0.15
            };

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');

                        // Trigger counter animation if it's the stats section
                        if (entry.target.classList.contains('stats-wrapper')) {
                            animateNumbers();
                        }

                        observer.unobserve(entry.target); // Only animate once
                    }
                });
            }, observerOptions);

            // Observe elements
            document.querySelectorAll('.team-card').forEach(el => {
                el.classList.add('fade-in-up');
                observer.observe(el);
            });

            document.querySelectorAll('.heading-h2').forEach(el => {
                el.classList.add('fade-in-up');
                observer.observe(el);
            });

            const statsWrapper = document.querySelector('.stats-wrapper');
            if (statsWrapper) {
                statsWrapper.classList.add('zoom-in');
                observer.observe(statsWrapper);
            }

            // Number Counter Animation
            function animateNumbers() {
                const statsNumbers = document.querySelectorAll('.large-stats-number');
                statsNumbers.forEach(counter => {
                    const targetText = counter.innerText;
                    const target = parseInt(targetText.replace(/\D/g, '')); // Remove non-digits like '+'
                    const suffix = targetText.replace(/[0-9]/g, ''); // Keep suffix like '+' or '%'

                    let count = 0;
                    const duration = 2000; // 2 seconds
                    const increment = target / (duration / 16); // 60fps

                    const updateCount = () => {
                        count += increment;
                        if (count < target) {
                            counter.innerText = Math.ceil(count) + suffix;
                            requestAnimationFrame(updateCount);
                        } else {
                            counter.innerText = target + suffix;
                        }
                    };
                    updateCount();
                });
            }
        });
    </script>
@endsection