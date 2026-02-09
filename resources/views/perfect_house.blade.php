@php
    use App\Helpers\ContentHelper;
    
    // Meta Tags
    $metaTitle = ContentHelper::text('meta_title', 'Kết nối tương lai - Connecting the Future');
    $metaDescription = ContentHelper::text('meta_description', 'Với CP Perfect House Việt Nam, bạn không chỉ hợp tác với một nhà thầu mà là một chuyên gia uy tín hàng đầu tại Thái Bình về giải pháp Smart Home, Camera an ninh và Hạ tầng viễn thông.');
    
    // Hero Section
    $heroTitle = ContentHelper::html('hero_title', 'PERFECT HOUSE VIỆT NAM');
    $heroSubtitleVn = ContentHelper::text('hero_subtitle_vn', 'Kết nối tương lai -');
    $heroSubtitleEn = ContentHelper::text('hero_subtitle_en', 'Connecting the Future');
    $heroDescription = ContentHelper::html('hero_description', 'Với CP Perfect House Việt Nam, bạn không chỉ hợp tác với một nhà thầu mà là một chuyên gia uy tín hàng đầu tại Thái Bình về giải pháp Smart Home, Camera an ninh và Hạ tầng viễn thông.');
    $heroButtonText = ContentHelper::text('hero_button_text', 'TƯ VẤN NGAY');
    $heroButtonLink = ContentHelper::link('hero_button_link', '/#lien-he');
    $heroBackgroundImage = ContentHelper::image('hero_background_image', 'image/banner2.jpg');
    
    // About Section
    $aboutTitle = ContentHelper::html('about_title', 'VỀ CHÚNG TÔI');
    $aboutDescription = ContentHelper::html('about_description', 'Công ty Cổ phần Perfect House Việt Nam là đơn vị chuyên tư vấn, thiết kế, gia công, sản xuất, lắp đặt cửa và các sản phẩm cơ khí.');
    $aboutTagline = ContentHelper::html('about_tagline', '"Công ty Cổ phần Perfect House Việt Nam - Connecting the Futures"');
    $aboutImage = ContentHelper::image('about_image', 'image/perfect_house_09.png');
    
    // Mission Section
    $missionTitle = ContentHelper::html('mission_title', 'MỤC TIÊU');
    $missionDescription = ContentHelper::html('mission_description', 'Trở thành một đơn vị uy tín, có năng lực cạnh tranh mạnh mẽ, cung cấp những giải pháp công nghệ hiện đại.');
    
    // Why Choose Section
    $whyChooseTitle = ContentHelper::html('why_choose_title', 'Tại Sao Nên Chọn Perfect House');
    $whyChooseItem1Title = ContentHelper::text('why_choose_item_1_title', 'Cam kết về chất lượng và uy tín');
    $whyChooseItem1Description = ContentHelper::html('why_choose_item_1_description', 'Tất cả sản phẩm, dịch vụ của Perfect House đều được kiểm soát nghiêm ngặt theo quy trình chất lượng cao.');
    $whyChooseItem2Title = ContentHelper::text('why_choose_item_2_title', 'Hợp tác bền vững – Phát triển lâu dài');
    $whyChooseItem2Description = ContentHelper::html('why_choose_item_2_description', 'Perfect House hướng tới mối quan hệ hợp tác bền chặt – lâu dài – đôi bên cùng có lợi.');
    $whyChooseItem3Title = ContentHelper::text('why_choose_item_3_title', 'Lấy khách hàng làm trung tâm');
    $whyChooseItem3Description = ContentHelper::html('why_choose_item_3_description', 'Với trọng tâm là khách hàng, Perfect House Việt Nam ngoài đem đến sản phẩm chất lượng chúng tôi còn cam kết đồng hành cùng khách hàng trên mọi chặng đường.');
    $whyChooseSlogan = ContentHelper::html('why_choose_slogan', '"Kinh doanh từ tâm, Hạnh phúc để cống hiến"');
    
    // Services Section
    $service1Title = ContentHelper::text('service_1_title', 'Khóa cửa thông minh');
    $service1Description = ContentHelper::html('service_1_description', 'Khóa cửa thông minh: nhận diện khuôn mặt, vân tay, mã số, thẻ từ – đảm bảo an ninh tuyệt đối.');
    
    // Contact Section
    $contactAddress = ContentHelper::html('contact_address', 'Trụ sở chính: Công ty CP Perfect House Việt Nam - Đông Hòa - Thành phố Thái Bình - Tỉnh Thái Bình');
    $contactPhone = ContentHelper::text('contact_phone', '0967 057 057');
    $contactFormButtonText = ContentHelper::text('contact_form_button_text', 'tư vấn ngay');
    $contactFormButtonLink = ContentHelper::link('contact_form_button_link', '/#lien-he');
@endphp

@extends('layouts.app')

@section('title', $metaTitle)
@section('body_class', 'perfect-house-page')

@section('meta')
    <meta name="description" content="{{ $metaDescription }}">
    <meta property="og:title" content="{{ $metaTitle }}">
    <meta property="og:description" content="{{ $metaDescription }}">
@endsection

@section('content')
    @include('partials.header')

    {{-- Hero Section --}}
    <section class="hero-section" style="background-image: url('{{ $heroBackgroundImage }}'); background-size: cover; background-position: center; min-height: 80vh; display: flex; align-items: center; position: relative;">
        <div class="hero-overlay" style="position: absolute; inset: 0; background: linear-gradient(135deg, rgba(26, 16, 0, 0.7) 0%, rgba(212, 168, 0, 0.3) 100%);"></div>
        <div class="container" style="position: relative; z-index: 1; color: white; text-align: center;">
            <h1 class="hero-title" style="font-size: 48px; font-weight: 700; margin-bottom: 20px;">{!! $heroTitle !!}</h1>
            <p class="hero-subtitle" style="font-size: 24px; margin-bottom: 10px;">{{ $heroSubtitleVn }}</p>
            <p class="hero-subtitle-en" style="font-size: 24px; margin-bottom: 30px;">{{ $heroSubtitleEn }}</p>
            <div class="hero-description" style="font-size: 18px; max-width: 800px; margin: 0 auto 40px; line-height: 1.6;">
                {!! $heroDescription !!}
            </div>
            <a href="{{ $heroButtonLink }}" class="hero-button" style="display: inline-block; padding: 16px 40px; background: #D4A800; color: #1a1000; font-weight: 700; text-decoration: none; border-radius: 50px; transition: all 0.3s ease;">
                {{ $heroButtonText }}
            </a>
        </div>
    </section>

    {{-- About Section --}}
    <section class="about-section section-white" style="padding: 80px 0;">
        <div class="container">
            <div class="row" style="display: flex; align-items: center; gap: 60px;">
                <div class="col-md-6">
                    <h2 class="section-title" style="font-size: 36px; font-weight: 700; margin-bottom: 30px; color: #1a1000;">{!! $aboutTitle !!}</h2>
                    <div class="about-description" style="font-size: 16px; line-height: 1.8; color: #555; margin-bottom: 20px;">
                        {!! $aboutDescription !!}
                    </div>
                    <p class="about-tagline" style="font-size: 18px; font-weight: 600; color: #D4A800; font-style: italic;">
                        {!! $aboutTagline !!}
                    </p>
                </div>
                <div class="col-md-6">
                    <img src="{{ $aboutImage }}" alt="About Perfect House" style="width: 100%; border-radius: 20px; box-shadow: 0 20px 60px rgba(0,0,0,0.1);">
                </div>
            </div>
        </div>
    </section>

    {{-- Mission Section --}}
    <section class="mission-section section-tint" style="padding: 80px 0;">
        <div class="container">
            <h2 class="section-title" style="font-size: 36px; font-weight: 700; margin-bottom: 30px; color: #1a1000; text-align: center;">{!! $missionTitle !!}</h2>
            <p class="mission-description" style="font-size: 18px; line-height: 1.8; color: #555; max-width: 900px; margin: 0 auto; text-align: center;">
                {!! $missionDescription !!}
            </p>
        </div>
    </section>

    {{-- Why Choose Section --}}
    <section class="why-choose-section section-white" style="padding: 80px 0;">
        <div class="container">
            <h2 class="section-title" style="font-size: 36px; font-weight: 700; margin-bottom: 50px; color: #1a1000; text-align: center;">{!! $whyChooseTitle !!}</h2>
            <div class="row" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 30px;">
                <div class="why-choose-item" style="padding: 40px; background: white; border-radius: 20px; box-shadow: 0 10px 40px rgba(0,0,0,0.1);">
                    <h3 style="font-size: 24px; font-weight: 700; margin-bottom: 20px; color: #1a1000;">{{ $whyChooseItem1Title }}</h3>
                    <p style="font-size: 16px; line-height: 1.6; color: #555;">{!! $whyChooseItem1Description !!}</p>
                </div>
                <div class="why-choose-item" style="padding: 40px; background: white; border-radius: 20px; box-shadow: 0 10px 40px rgba(0,0,0,0.1);">
                    <h3 style="font-size: 24px; font-weight: 700; margin-bottom: 20px; color: #1a1000;">{{ $whyChooseItem2Title }}</h3>
                    <p style="font-size: 16px; line-height: 1.6; color: #555;">{!! $whyChooseItem2Description !!}</p>
                </div>
                <div class="why-choose-item" style="padding: 40px; background: white; border-radius: 20px; box-shadow: 0 10px 40px rgba(0,0,0,0.1);">
                    <h3 style="font-size: 24px; font-weight: 700; margin-bottom: 20px; color: #1a1000;">{{ $whyChooseItem3Title }}</h3>
                    <p style="font-size: 16px; line-height: 1.6; color: #555;">{!! $whyChooseItem3Description !!}</p>
                </div>
            </div>
            <div class="why-choose-slogan" style="text-align: center; margin-top: 50px; padding: 30px; background: linear-gradient(135deg, #D4A800 0%, #E6B800 100%); border-radius: 20px; color: #1a1000;">
                <p style="font-size: 20px; font-weight: 600; margin: 0;">{!! $whyChooseSlogan !!}</p>
            </div>
        </div>
    </section>

    {{-- Services Section --}}
    <section class="services-section section-tint" style="padding: 80px 0;">
        <div class="container">
            <h2 class="section-title" style="font-size: 36px; font-weight: 700; margin-bottom: 50px; color: #1a1000; text-align: center;">Dịch vụ của chúng tôi</h2>
            <div class="service-item" style="max-width: 800px; margin: 0 auto; padding: 40px; background: white; border-radius: 20px; box-shadow: 0 10px 40px rgba(0,0,0,0.1);">
                <h3 style="font-size: 28px; font-weight: 700; margin-bottom: 20px; color: #1a1000;">{{ $service1Title }}</h3>
                <p style="font-size: 16px; line-height: 1.8; color: #555;">{!! $service1Description !!}</p>
            </div>
        </div>
    </section>

    {{-- Contact Section --}}
    <section class="contact-section section-white" style="padding: 80px 0;">
        <div class="container">
            <h2 class="section-title" style="font-size: 36px; font-weight: 700; margin-bottom: 50px; color: #1a1000; text-align: center;">Liên hệ với chúng tôi</h2>
            <div class="contact-info" style="max-width: 600px; margin: 0 auto; text-align: center;">
                <p style="font-size: 18px; line-height: 1.8; color: #555; margin-bottom: 20px;">{!! $contactAddress !!}</p>
                <p style="font-size: 20px; font-weight: 700; color: #1a1000; margin-bottom: 30px;">
                    <a href="tel:{{ str_replace(' ', '', $contactPhone) }}" style="color: #D4A800; text-decoration: none;">{{ $contactPhone }}</a>
                </p>
                <a href="{{ $contactFormButtonLink }}" class="contact-button" style="display: inline-block; padding: 16px 40px; background: #D4A800; color: #1a1000; font-weight: 700; text-decoration: none; border-radius: 50px; transition: all 0.3s ease;">
                    {{ $contactFormButtonText }}
                </a>
            </div>
        </div>
    </section>

    @include('partials.footer')
@endsection
