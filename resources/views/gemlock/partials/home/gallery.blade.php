@php
    use App\Helpers\ContentHelper;

    $galleryTitle = ContentHelper::text('gallery_title', 'Sản phẩm & Giải pháp');
    $gallerySubtitle = ContentHelper::text('gallery_subtitle', 'Perfect House cung cấp giải pháp thông minh và bền vững cho ngôi nhà của bạn.');
    $galleryButtonText = ContentHelper::text('gallery_button_text', 'Tìm hiểu thêm');
    $galleryButtonLink = ContentHelper::link('gallery_button_link', '/about');

    $galleryImage1 = ContentHelper::image('gallery_image_1', 'image/banner2.jpg');
    $galleryImage2 = ContentHelper::image('gallery_image_2', 'furni/images/img-grid-1.jpg');
    $galleryImage3 = ContentHelper::image('gallery_image_3', 'image/Banner Solar 1.png');
    $galleryImage4 = ContentHelper::image('gallery_image_4', 'furni/images/img-grid-2.jpg');
@endphp

<section class="gallery section-tint">
    <div class="w-layout-blockcontainer container w-container">
        <div data-w-id="a8b3ed35-d0d6-484a-a7de-5e4e34eccb6d" class="gallery-content-wrapper">
            <div class="title">
                <h1 class="heading-h2">{!! $galleryTitle !!}</h1>
                <p class="hero-subtitle">{{ $gallerySubtitle }}</p>
            </div>
            <a data-w-id="7a0890ec-d742-e9b4-eddc-c0ce1ae0ce88" href="{{ $galleryButtonLink }}"
               class="secondary-button w-inline-block">
                <p>{{ $galleryButtonText }}</p>
                <div class="arrow-wrapper">
                    <img loading="lazy"
                         src="https://cdn.prod.website-files.com/69420cbdd4e2e39b5eb779c2/69420cbdd4e2e39b5eb77ac0_arrow-up-right.svg"
                         alt="Right ICon"/>
                </div>
            </a>
        </div>
    </div>
    <div class="gallery-slider">
        <div class="gallery-track">
            <img src="{{ $galleryImage1 }}" loading="lazy" alt="Gallery Image"
                 class="gallery-item img-tall"/>
            <img src="{{ $galleryImage2 }}" loading="lazy" alt="Gallery Image"
                 class="gallery-item img-short"/>
            <img src="{{ $galleryImage3 }}" loading="lazy" alt="Gallery Image"
                 class="gallery-item img-tall"/>
            <img src="{{ $galleryImage4 }}" loading="lazy" alt="Gallery Image"
                 class="gallery-item img-short"/>
        </div>
    </div>
</section>

