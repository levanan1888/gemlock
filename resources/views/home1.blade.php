{!! $head !!}
<body ontouchstart>
@include('partials.home1_page', ['home1PageContent' => $home1PageContent])

@php
    $homeContent = $homeContent ?? [];
@endphp

<script>
    (function () {
        const content = @json($homeContent);

        if (! content) {
            return;
        }

        function setText(selector, key, isHtml = false) {
            if (! content[key]) {
                return;
            }

            const el = document.querySelector(selector);

            if (! el) {
                return;
            }

            if (isHtml) {
                el.innerHTML = content[key];
            } else {
                el.textContent = content[key];
            }
        }

        function setSectionBackground(sectionId, key) {
            if (! content[key]) {
                return;
            }

            const section = document.getElementById(sectionId);

            if (! section) {
                return;
            }

            const bg = section.querySelector('.section-background');

            if (! bg) {
                return;
            }

            bg.style.backgroundImage = 'url(' + content[key] + ')';
            bg.classList.remove('lazy');
        }

        // Hero (section id="w-ktga7yu5")
        // Tiêu đề chính
        setText('#w-zyaw2wme .text-block h3', 'hero_title');
        // Phụ đề / tagline
        setText('#w-20dlz0ha .text-block h3', 'hero_subtitle_vn');
        // Mô tả đoạn văn
        setText('#w-17vbzjjf .text-block p', 'hero_description', true);
        // Nút bấm
        setText('#w-bmvqukhs .button-text', 'hero_button_text');
        // Ảnh nền hero
        setSectionBackground('w-ktga7yu5', 'hero_background_image');

        // Section 2 - Tại Sao Nên Chọn Perfect House & các bullet
        setText('#w-rz5i7foj .text-block h1', 'section2_title');
        setText('#w-h03zn9sr .text-block', 'section2_description', true);
        setSectionBackground('w-zm8vjjbb', 'section2_background_image');

        // Section 3 - Sứ mệnh & Giá trị cốt lõi
        setText('#w-sufhg7mi .text-block p', 'section3_title', true);
        setText('#w-joblnvn2 .text-block', 'section3_description', true);
        setSectionBackground('w-vgiz3u9m', 'section3_background_image');

        // Section 4 - CAM KẾT CỦA CHÚNG TÔI / dịch vụ
        setText('#w-w747lnt6 .text-block h1', 'section4_title');
        setText('#w-smp6xhp2 .text-block', 'section4_description', true);
        setSectionBackground('w-qesmjs5l', 'section4_background_image');

        // Section 5 - Giới thiệu Perfect House
        setText('#w-r7g6rwjs .text-block', 'section5_description', true);
        setSectionBackground('w-nypif9tt', 'section5_background_image');

        // Section 6 - Về chúng tôi
        setText('#w-7cg3aocx .text-block h3', 'section6_title');
        setText('#w-pw5ncj9x .text-block', 'section6_description', true);
        setSectionBackground('w-j7njhkti', 'section6_background_image');

        // Section 8 - TẠI SAO CHỌN CHÚNG TÔI / đối tác
        setText('#w-wikj0qtf .text-block h1', 'section8_title');
        setSectionBackground('w-ynofe2b1', 'section8_background_image');

        // Section 9 - form liên hệ
        setText('#w-bxautnru .text-block h3', 'section9_title');
        setText('#w-1hjtppu6 .text-block h3', 'section9_description', true);
        setSectionBackground('w-2pll8ynd', 'section9_background_image');

        // Section 10 - footer contact info
        setText('#w-bg1kek7b .text-block', 'section10_description', true);
        setSectionBackground('w-efrfvi0v', 'section10_background_image');
    })();
</script>

{!! $footer !!}
