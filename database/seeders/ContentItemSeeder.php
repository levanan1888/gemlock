<?php

namespace Database\Seeders;

use App\Models\ContentItem;
use Illuminate\Database\Seeder;

class ContentItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->seedPerfectHouse();
        $this->command->info('Perfect House content items seeded successfully!');
    }

    private function seedPerfectHouse(): void
    {
        $pageType = 'perfect_house';

        $contentItems = [
            // Meta Tags (SEO)
            ['key' => 'meta_title', 'section' => 'meta', 'type' => 'text', 'label' => 'Meta Title', 'value' => 'Kết nối tương lai - Connecting the Future', 'order' => 1],
            ['key' => 'meta_description', 'section' => 'meta', 'type' => 'text', 'label' => 'Meta Description', 'value' => 'Với CP Perfect House Việt Nam, bạn không chỉ hợp tác với một nhà thầu mà là một chuyên gia uy tín hàng đầu tại Thái Bình về giải pháp Smart Home, Camera an ninh và Hạ tầng viễn thông.', 'order' => 2],
            ['key' => 'og_title', 'section' => 'meta', 'type' => 'text', 'label' => 'OG Title', 'value' => 'Kết nối tương lai - Connecting the Future', 'order' => 3],
            ['key' => 'og_description', 'section' => 'meta', 'type' => 'text', 'label' => 'OG Description', 'value' => 'Với CP Perfect House Việt Nam, bạn không chỉ hợp tác với một nhà thầu mà là một chuyên gia uy tín hàng đầu tại Thái Bình về giải pháp Smart Home, Camera an ninh và Hạ tầng viễn thông.', 'order' => 4],

            // Hero Section
            ['key' => 'hero_title', 'section' => 'hero', 'type' => 'html', 'label' => 'Hero - Tiêu đề chính', 'value' => 'PERFECT HOUSE VIỆT NAM', 'order' => 10],
            ['key' => 'hero_subtitle_vn', 'section' => 'hero', 'type' => 'text', 'label' => 'Hero - Phụ đề tiếng Việt', 'value' => 'Kết nối tương lai -', 'order' => 11],
            ['key' => 'hero_subtitle_en', 'section' => 'hero', 'type' => 'text', 'label' => 'Hero - Phụ đề tiếng Anh', 'value' => 'Connecting the Future', 'order' => 12],
            ['key' => 'hero_description', 'section' => 'hero', 'type' => 'html', 'label' => 'Hero - Mô tả', 'value' => 'Với CP Perfect House Việt Nam, bạn không chỉ hợp tác với một nhà thầu mà là một chuyên gia uy tín hàng đầu tại Thái Bình về giải pháp Smart Home, Camera an ninh và Hạ tầng viễn thông. Chúng tôi lấy khách hàng làm trọng tâm, cam kết mang đến sản phẩm chất lượng cao và phong cách phục vụ chuyên nghiệp, hiện đại để đảm bảo sự hài lòng tuyệt đối của bạn.', 'order' => 13],
            ['key' => 'hero_button_text', 'section' => 'hero', 'type' => 'text', 'label' => 'Hero - Nút bấm', 'value' => 'TƯ VẤN NGAY', 'order' => 14],
            ['key' => 'hero_button_link', 'section' => 'hero', 'type' => 'link', 'label' => 'Hero - Link nút bấm', 'value' => '/#lien-he', 'order' => 15],
            ['key' => 'hero_background_image', 'section' => 'hero', 'type' => 'image', 'label' => 'Hero - Hình nền', 'value' => 'image/banner2.jpg', 'order' => 16],

            // About Section
            ['key' => 'about_title', 'section' => 'about', 'type' => 'html', 'label' => 'About - Tiêu đề', 'value' => 'VỀ CHÚNG TÔI', 'order' => 20],
            ['key' => 'about_description', 'section' => 'about', 'type' => 'html', 'label' => 'About - Mô tả', 'value' => 'Công ty Cổ phần Perfect House Việt Nam là đơn vị chuyên tư vấn, thiết kế, gia công, sản xuất, lắp đặt cửa và các sản phẩm cơ khí, cung cấp thiết bị, vận hành và quản lý hệ thống hạ tầng viễn thông và CNTT.<br><br>Với nhiều năm kinh nghiệm trong lĩnh vực sản xuất, gia công, chế tạo cơ khí, kinh doanh ngành cửa, cung cấp thiết bị, vận hành và quản lý hệ thống hạ tầng viễn thông và CNTT, Công ty CP Perfect House Việt Nam từng bước phát triển, lấy con người làm trung tâm của mọi sự phát triển cùng với việc đầu tư trang thiết bị, máy móc hiện đại đã nhanh chóng trở thành nhà thầu có uy tín, nhận được sự tín nhiệm của Quý đối tác, quý khách hàng.', 'order' => 21],
            ['key' => 'about_tagline', 'section' => 'about', 'type' => 'html', 'label' => 'About - Tagline', 'value' => '"Công ty Cổ phần Perfect House Việt Nam - Connecting the Futures"', 'order' => 22],
            ['key' => 'about_image', 'section' => 'about', 'type' => 'image', 'label' => 'About - Hình ảnh', 'value' => 'image/perfect_house_09.png', 'order' => 23],

            // Mission Section
            ['key' => 'mission_title', 'section' => 'about', 'type' => 'html', 'label' => 'Mission - Tiêu đề', 'value' => 'MỤC TIÊU', 'order' => 30],
            ['key' => 'mission_description', 'section' => 'about', 'type' => 'html', 'label' => 'Mission - Mô tả', 'value' => 'Trở thành một đơn vị uy tín, có năng lực cạnh tranh mạnh mẽ, cung cấp những giải pháp công nghệ hiện đại, góp phần nâng cao chất lượng cuộc sống trên địa bàn các tỉnh thành phía Bắc và toàn quốc.', 'order' => 31],

            // Why Choose Section
            ['key' => 'why_choose_title', 'section' => 'why_choose', 'type' => 'html', 'label' => 'Why Choose - Tiêu đề', 'value' => 'Tại Sao Nên Chọn Perfect House', 'order' => 40],
            ['key' => 'why_choose_item_1_title', 'section' => 'why_choose', 'type' => 'text', 'label' => 'Why Choose - Item 1 Tiêu đề', 'value' => 'Cam kết về chất lượng và uy tín', 'order' => 41],
            ['key' => 'why_choose_item_1_description', 'section' => 'why_choose', 'type' => 'html', 'label' => 'Why Choose - Item 1 Mô tả', 'value' => 'Tất cả sản phẩm, dịch vụ của Perfect House đều được kiểm soát nghiêm ngặt theo quy trình chất lượng cao, đảm bảo tính ổn định, độ bền và an toàn tuyệt đối. Uy tín thương hiệu được chúng tôi xây dựng từ chính sự hài lòng và tin tưởng của khách hàng qua từng dự án.', 'order' => 42],
            ['key' => 'why_choose_item_2_title', 'section' => 'why_choose', 'type' => 'text', 'label' => 'Why Choose - Item 2 Tiêu đề', 'value' => 'Hợp tác bền vững – Phát triển lâu dài', 'order' => 43],
            ['key' => 'why_choose_item_2_description', 'section' => 'why_choose', 'type' => 'html', 'label' => 'Why Choose - Item 2 Mô tả', 'value' => 'Perfect House hướng tới mối quan hệ hợp tác bền chặt – lâu dài – đôi bên cùng có lợi. Chúng tôi không ngừng cải tiến, đổi mới công nghệ và nâng cao năng lực để mang lại giá trị ngày càng cao cho đối tác và khách hàng.', 'order' => 44],
            ['key' => 'why_choose_item_3_title', 'section' => 'why_choose', 'type' => 'text', 'label' => 'Why Choose - Item 3 Tiêu đề', 'value' => 'Lấy khách hàng làm trung tâm', 'order' => 45],
            ['key' => 'why_choose_item_3_description', 'section' => 'why_choose', 'type' => 'html', 'label' => 'Why Choose - Item 3 Mô tả', 'value' => 'Với trọng tâm là khách hàng, Perfect House Việt Nam ngoài đem đến sản phẩm chất lượng chúng tôi còn cam kết đồng hành cùng khách hàng trên mọi chặng đường.', 'order' => 46],
            ['key' => 'why_choose_slogan', 'section' => 'why_choose', 'type' => 'html', 'label' => 'Why Choose - Slogan', 'value' => '"Kinh doanh từ tâm, Hạnh phúc để cống hiến" - Chúng tôi hân hạnh được chung tay đồng hành cùng sự phát triển và hội nhập công nghệ mới của quý doanh nghiệp, quý công ty khách hàng', 'order' => 47],

            // Services Section
            ['key' => 'service_1_title', 'section' => 'services', 'type' => 'text', 'label' => 'Service 1 - Tiêu đề', 'value' => 'Khóa cửa thông minh', 'order' => 50],
            ['key' => 'service_1_description', 'section' => 'services', 'type' => 'html', 'label' => 'Service 1 - Mô tả', 'value' => 'Khóa cửa thông minh: nhận diện khuôn mặt, vân tay, mã số, thẻ từ – đảm bảo an ninh tuyệt đối.', 'order' => 51],

            // Contact Section
            ['key' => 'contact_address', 'section' => 'contact', 'type' => 'html', 'label' => 'Contact - Địa chỉ', 'value' => 'Trụ sở chính: Công ty CP Perfect House Việt Nam - Đông Hòa - Thành phố Thái Bình - Tỉnh Thái Bình', 'order' => 60],
            ['key' => 'contact_phone', 'section' => 'contact', 'type' => 'text', 'label' => 'Contact - Số điện thoại', 'value' => '0967 057 057', 'order' => 61],
            ['key' => 'contact_form_button_text', 'section' => 'contact', 'type' => 'text', 'label' => 'Contact - Nút form', 'value' => 'tư vấn ngay', 'order' => 62],
            ['key' => 'contact_form_button_link', 'section' => 'contact', 'type' => 'link', 'label' => 'Contact - Link form', 'value' => '/#lien-he', 'order' => 63],
            ['key' => 'hero_slide_2_image', 'section' => 'hero', 'type' => 'image', 'label' => 'Hero Slide 2 - Hình ảnh', 'value' => 'image/Banner Solar 1.png', 'order' => 2],
            ['key' => 'hero_slide_1_alt', 'section' => 'hero', 'type' => 'text', 'label' => 'Hero Slide 1 - Alt text', 'value' => 'Slide 1', 'order' => 3],
            ['key' => 'hero_slide_2_alt', 'section' => 'hero', 'type' => 'text', 'label' => 'Hero Slide 2 - Alt text', 'value' => 'Slide 2', 'order' => 4],

            // Gallery Section
            ['key' => 'gallery_title', 'section' => 'gallery', 'type' => 'html', 'label' => 'Gallery - Tiêu đề', 'value' => 'Sản phẩm & <span class="text-span">Giải pháp</span>', 'order' => 10],
            ['key' => 'gallery_subtitle', 'section' => 'gallery', 'type' => 'text', 'label' => 'Gallery - Mô tả', 'value' => 'Perfect House cung cấp giải pháp thông minh và bền vững cho ngôi nhà của bạn.', 'order' => 11],
            ['key' => 'gallery_button_text', 'section' => 'gallery', 'type' => 'text', 'label' => 'Gallery - Nút bấm', 'value' => 'Tìm hiểu thêm', 'order' => 12],
            ['key' => 'gallery_button_link', 'section' => 'gallery', 'type' => 'link', 'label' => 'Gallery - Link nút', 'value' => '/about', 'order' => 13],
            ['key' => 'gallery_image_1', 'section' => 'gallery', 'type' => 'image', 'label' => 'Gallery - Hình ảnh 1', 'value' => 'image/banner2.jpg', 'order' => 14],
            ['key' => 'gallery_image_2', 'section' => 'gallery', 'type' => 'image', 'label' => 'Gallery - Hình ảnh 2', 'value' => 'furni/images/img-grid-1.jpg', 'order' => 15],
            ['key' => 'gallery_image_3', 'section' => 'gallery', 'type' => 'image', 'label' => 'Gallery - Hình ảnh 3', 'value' => 'image/Banner Solar 1.png', 'order' => 16],
            ['key' => 'gallery_image_4', 'section' => 'gallery', 'type' => 'image', 'label' => 'Gallery - Hình ảnh 4', 'value' => 'furni/images/img-grid-2.jpg', 'order' => 17],

            // Stats Section
            ['key' => 'stats_item_1_number', 'section' => 'stats', 'type' => 'text', 'label' => 'Stats - Số liệu 1', 'value' => '5+', 'order' => 20],
            ['key' => 'stats_item_1_text', 'section' => 'stats', 'type' => 'text', 'label' => 'Stats - Mô tả 1', 'value' => 'Năm kinh nghiệm trong ngành', 'order' => 21],
            ['key' => 'stats_item_2_number', 'section' => 'stats', 'type' => 'text', 'label' => 'Stats - Số liệu 2', 'value' => '1,000+', 'order' => 22],
            ['key' => 'stats_item_2_text', 'section' => 'stats', 'type' => 'text', 'label' => 'Stats - Mô tả 2', 'value' => 'Khách hàng tin tưởng và hài lòng', 'order' => 23],
            ['key' => 'stats_item_3_number', 'section' => 'stats', 'type' => 'text', 'label' => 'Stats - Số liệu 3', 'value' => '50+', 'order' => 24],
            ['key' => 'stats_item_3_text', 'section' => 'stats', 'type' => 'text', 'label' => 'Stats - Mô tả 3', 'value' => 'Nhân sự chuyên môn cao', 'order' => 25],
            ['key' => 'stats_item_4_number', 'section' => 'stats', 'type' => 'text', 'label' => 'Stats - Số liệu 4', 'value' => '99%', 'order' => 26],
            ['key' => 'stats_item_4_text', 'section' => 'stats', 'type' => 'text', 'label' => 'Stats - Mô tả 4', 'value' => 'Tỷ lệ hoàn thành dự án xuất sắc', 'order' => 27],

            // Testimonial Section
            ['key' => 'testimonial_title', 'section' => 'testimonial', 'type' => 'html', 'label' => 'Testimonial - Tiêu đề', 'value' => 'Khách hàng <span class="text-span">Nói gì</span>', 'order' => 30],
            ['key' => 'testimonial_subtitle', 'section' => 'testimonial', 'type' => 'text', 'label' => 'Testimonial - Mô tả', 'value' => 'Sự hài lòng của khách hàng là thước đo thành công lớn nhất của chúng tôi.', 'order' => 31],
            ['key' => 'testimonial_1_image', 'section' => 'testimonial', 'type' => 'image', 'label' => 'Testimonial 1 - Hình ảnh', 'value' => 'furni/images/person_1.jpg', 'order' => 32],
            ['key' => 'testimonial_1_text', 'section' => 'testimonial', 'type' => 'text', 'label' => 'Testimonial 1 - Nội dung', 'value' => 'Từ khi lắp đặt khóa GemLock, tôi cảm thấy rất an tâm mỗi khi vắng nhà. Công nghệ vân tay rất nhạy và tiện lợi.', 'order' => 33],
            ['key' => 'testimonial_1_name', 'section' => 'testimonial', 'type' => 'text', 'label' => 'Testimonial 1 - Tên', 'value' => 'Anh Hoàng', 'order' => 34],
            ['key' => 'testimonial_1_service', 'section' => 'testimonial', 'type' => 'text', 'label' => 'Testimonial 1 - Dịch vụ', 'value' => 'Khóa thông minh', 'order' => 35],
            ['key' => 'testimonial_2_image', 'section' => 'testimonial', 'type' => 'image', 'label' => 'Testimonial 2 - Hình ảnh', 'value' => 'furni/images/person_2.jpg', 'order' => 36],
            ['key' => 'testimonial_2_text', 'section' => 'testimonial', 'type' => 'text', 'label' => 'Testimonial 2 - Nội dung', 'value' => 'Hệ thống điện mặt trời GemSolar giúp gia đình tôi tiết kiệm đáng kể chi phí tiền điện hàng tháng. Dịch vụ lắp đặt rất chuyên nghiệp.', 'order' => 37],
            ['key' => 'testimonial_2_name', 'section' => 'testimonial', 'type' => 'text', 'label' => 'Testimonial 2 - Tên', 'value' => 'Chị Lan', 'order' => 38],
            ['key' => 'testimonial_2_service', 'section' => 'testimonial', 'type' => 'text', 'label' => 'Testimonial 2 - Dịch vụ', 'value' => 'Điện mặt trời', 'order' => 39],

            // FAQ Section
            ['key' => 'faq_title', 'section' => 'faq', 'type' => 'text', 'label' => 'FAQ - Tiêu đề', 'value' => 'Câu hỏi thường gặp', 'order' => 40],
            ['key' => 'faq_subtitle', 'section' => 'faq', 'type' => 'text', 'label' => 'FAQ - Mô tả', 'value' => 'Giải đáp thắc mắc của bạn về sản phẩm và dịch vụ của chúng tôi.', 'order' => 41],
            ['key' => 'faq_1_question', 'section' => 'faq', 'type' => 'text', 'label' => 'FAQ 1 - Câu hỏi', 'value' => 'Khóa thông minh GemLock có an toàn không?', 'order' => 42],
            ['key' => 'faq_1_answer', 'section' => 'faq', 'type' => 'text', 'label' => 'FAQ 1 - Câu trả lời', 'value' => 'Có, GemLock sử dụng công nghệ bảo mật tiên tiến nhất, giúp bảo vệ ngôi nhà của bạn an toàn tuyệt đối trước mọi nguy cơ.', 'order' => 43],
            ['key' => 'faq_2_question', 'section' => 'faq', 'type' => 'text', 'label' => 'FAQ 2 - Câu hỏi', 'value' => 'Lợi ích của điện mặt trời GemSolar là gì?', 'order' => 44],
            ['key' => 'faq_2_answer', 'section' => 'faq', 'type' => 'text', 'label' => 'FAQ 2 - Câu trả lời', 'value' => 'GemSolar giúp tiết kiệm từ 40-70% hóa đơn tiền điện, hoàn vốn nhanh và thân thiện với môi trường.', 'order' => 45],
            ['key' => 'faq_3_question', 'section' => 'faq', 'type' => 'text', 'label' => 'FAQ 3 - Câu hỏi', 'value' => 'GemLock có cung cấp dịch vụ lắp đặt không?', 'order' => 46],
            ['key' => 'faq_3_answer', 'section' => 'faq', 'type' => 'text', 'label' => 'FAQ 3 - Câu trả lời', 'value' => 'Có, chúng tôi cung cấp dịch vụ tư vấn, thiết kế và lắp đặt trọn gói, đảm bảo chất lượng và sự hài lòng cho khách hàng.', 'order' => 47],
            ['key' => 'faq_4_question', 'section' => 'faq', 'type' => 'text', 'label' => 'FAQ 4 - Câu hỏi', 'value' => 'Tại sao chọn GemLock?', 'order' => 48],
            ['key' => 'faq_4_answer', 'section' => 'faq', 'type' => 'text', 'label' => 'FAQ 4 - Câu trả lời', 'value' => 'Bạn có thể liên hệ với chúng tôi qua số điện thoại hotline hoặc gửi email trực tiếp qua website.', 'order' => 49],

            // News Section
            ['key' => 'news_title', 'section' => 'news', 'type' => 'html', 'label' => 'News - Tiêu đề', 'value' => 'Tin tức <span class="text-span">Mới nhất</span>', 'order' => 50],
            ['key' => 'news_subtitle', 'section' => 'news', 'type' => 'text', 'label' => 'News - Mô tả', 'value' => 'Cập nhật những thông tin mới nhất về sản phẩm và công nghệ Smart Home.', 'order' => 51],
            ['key' => 'news_1_image', 'section' => 'news', 'type' => 'image', 'label' => 'News 1 - Hình ảnh', 'value' => 'furni/images/img-grid-1.jpg', 'order' => 52],
            ['key' => 'news_1_category', 'section' => 'news', 'type' => 'text', 'label' => 'News 1 - Danh mục', 'value' => 'Khóa thông minh', 'order' => 53],
            ['key' => 'news_1_date', 'section' => 'news', 'type' => 'text', 'label' => 'News 1 - Ngày', 'value' => '15/01/2026', 'order' => 54],
            ['key' => 'news_1_read_time', 'section' => 'news', 'type' => 'text', 'label' => 'News 1 - Thời gian đọc', 'value' => '5 phút đọc', 'order' => 55],
            ['key' => 'news_1_title', 'section' => 'news', 'type' => 'text', 'label' => 'News 1 - Tiêu đề', 'value' => 'Top 5 khóa thông minh bán chạy nhất năm 2026', 'order' => 56],
            ['key' => 'news_1_description', 'section' => 'news', 'type' => 'text', 'label' => 'News 1 - Mô tả', 'value' => 'Khám phá những mẫu khóa thông minh được người dùng Việt Nam yêu thích nhất với công nghệ tiên tiến và thiết kế sang trọng.', 'order' => 57],
            ['key' => 'news_2_image', 'section' => 'news', 'type' => 'image', 'label' => 'News 2 - Hình ảnh', 'value' => 'image/solar.png', 'order' => 58],
            ['key' => 'news_2_category', 'section' => 'news', 'type' => 'text', 'label' => 'News 2 - Danh mục', 'value' => 'Điện mặt trời', 'order' => 59],
            ['key' => 'news_2_date', 'section' => 'news', 'type' => 'text', 'label' => 'News 2 - Ngày', 'value' => '10/01/2026', 'order' => 60],
            ['key' => 'news_2_read_time', 'section' => 'news', 'type' => 'text', 'label' => 'News 2 - Thời gian đọc', 'value' => '7 phút đọc', 'order' => 61],
            ['key' => 'news_2_title', 'section' => 'news', 'type' => 'text', 'label' => 'News 2 - Tiêu đề', 'value' => 'Lợi ích của điện mặt trời cho gia đình Việt', 'order' => 62],
            ['key' => 'news_2_description', 'section' => 'news', 'type' => 'text', 'label' => 'News 2 - Mô tả', 'value' => 'Tìm hiểu cách điện mặt trời giúp tiết kiệm chi phí điện năng và bảo vệ môi trường cho ngôi nhà của bạn.', 'order' => 63],
            ['key' => 'news_3_image', 'section' => 'news', 'type' => 'image', 'label' => 'News 3 - Hình ảnh', 'value' => 'image/perfect_house_09.png', 'order' => 64],
            ['key' => 'news_3_category', 'section' => 'news', 'type' => 'text', 'label' => 'News 3 - Danh mục', 'value' => 'Smart Home', 'order' => 65],
            ['key' => 'news_3_date', 'section' => 'news', 'type' => 'text', 'label' => 'News 3 - Ngày', 'value' => '05/01/2026', 'order' => 66],
            ['key' => 'news_3_read_time', 'section' => 'news', 'type' => 'text', 'label' => 'News 3 - Thời gian đọc', 'value' => '6 phút đọc', 'order' => 67],
            ['key' => 'news_3_title', 'section' => 'news', 'type' => 'text', 'label' => 'News 3 - Tiêu đề', 'value' => 'Xu hướng Smart Home năm 2026: Những điều cần biết', 'order' => 68],
            ['key' => 'news_3_description', 'section' => 'news', 'type' => 'text', 'label' => 'News 3 - Mô tả', 'value' => 'Cập nhật những xu hướng công nghệ nhà thông minh mới nhất và cách áp dụng cho ngôi nhà của bạn.', 'order' => 69],

            // CTA Section
            ['key' => 'cta_title', 'section' => 'cta', 'type' => 'html', 'label' => 'CTA - Tiêu đề', 'value' => 'Kết nối <span class="text-span-2" style="color: #1a1000; font-weight: 700;">tương lai</span>', 'order' => 70],
            ['key' => 'cta_subtitle', 'section' => 'cta', 'type' => 'text', 'label' => 'CTA - Mô tả', 'value' => 'Liên hệ với chúng tôi để bắt đầu hành trình nâng tầm không gian sống của bạn với giải pháp Smart Home và Năng lượng sạch.', 'order' => 71],
            ['key' => 'cta_button_text', 'section' => 'cta', 'type' => 'text', 'label' => 'CTA - Nút bấm', 'value' => 'Liên hệ ngay', 'order' => 72],
            ['key' => 'cta_button_link', 'section' => 'cta', 'type' => 'link', 'label' => 'CTA - Link nút', 'value' => '/booking', 'order' => 73],

            // Header (Perfect House)
            ['key' => 'header_logo_perfect_house', 'section' => 'header', 'type' => 'image', 'label' => 'Header - Logo Perfect House', 'value' => 'image/Logo Tách Nền.png', 'order' => 100],
            ['key' => 'header_phone_perfect_house', 'section' => 'header', 'type' => 'text', 'label' => 'Header - Số điện thoại Perfect House', 'value' => '0967 263 944', 'order' => 101],

            // Footer (Perfect House)
            ['key' => 'footer_description_perfect_house', 'section' => 'footer', 'type' => 'text', 'label' => 'Footer - Mô tả Perfect House', 'value' => 'Perfect House Việt Nam - Kết nối tương lai. Chuyên cung cấp giải pháp Smart Home và Năng lượng sạch.', 'order' => 200],
            ['key' => 'footer_social_title_perfect_house', 'section' => 'footer', 'type' => 'text', 'label' => 'Footer - Tiêu đề mạng xã hội Perfect House', 'value' => 'Liên kết mạng xã hội', 'order' => 201],
            ['key' => 'footer_social_facebook_perfect_house', 'section' => 'footer', 'type' => 'link', 'label' => 'Footer - Facebook Perfect House', 'value' => 'https://facebook.com/', 'order' => 202],
            ['key' => 'footer_social_youtube_perfect_house', 'section' => 'footer', 'type' => 'link', 'label' => 'Footer - Youtube Perfect House', 'value' => 'https://youtube.com/', 'order' => 203],
            ['key' => 'footer_social_zalo_perfect_house', 'section' => 'footer', 'type' => 'link', 'label' => 'Footer - Zalo Perfect House', 'value' => 'https://zalo.me/', 'order' => 204],
            ['key' => 'footer_copyright_perfect_house', 'section' => 'footer', 'type' => 'text', 'label' => 'Footer - Copyright Perfect House', 'value' => 'Copyright © 2025 Perfect House Việt Nam.', 'order' => 205],
            ['key' => 'footer_logo_perfect_house', 'section' => 'footer', 'type' => 'image', 'label' => 'Footer - Logo Perfect House', 'value' => 'image/Logo Tách Nền.png', 'order' => 206],

            // Header (Gemlock)
            ['key' => 'header_logo_gemlock', 'section' => 'header', 'type' => 'image', 'label' => 'Header - Logo Gemlock', 'value' => 'image/Logo Tách Nền.png', 'order' => 300],
            ['key' => 'header_phone_gemlock', 'section' => 'header', 'type' => 'text', 'label' => 'Header - Số điện thoại Gemlock', 'value' => '0967 263 944', 'order' => 301],

            // Footer (Gemlock)
            ['key' => 'footer_description_gemlock', 'section' => 'footer', 'type' => 'text', 'label' => 'Footer - Mô tả Gemlock', 'value' => 'Perfect House Việt Nam - Kết nối tương lai. Chuyên cung cấp giải pháp Smart Home và Năng lượng sạch.', 'order' => 400],
            ['key' => 'footer_social_title_gemlock', 'section' => 'footer', 'type' => 'text', 'label' => 'Footer - Tiêu đề mạng xã hội Gemlock', 'value' => 'Liên kết mạng xã hội', 'order' => 401],
            ['key' => 'footer_social_facebook_gemlock', 'section' => 'footer', 'type' => 'link', 'label' => 'Footer - Facebook Gemlock', 'value' => 'https://facebook.com/', 'order' => 402],
            ['key' => 'footer_social_youtube_gemlock', 'section' => 'footer', 'type' => 'link', 'label' => 'Footer - Youtube Gemlock', 'value' => 'https://youtube.com/', 'order' => 403],
            ['key' => 'footer_social_zalo_gemlock', 'section' => 'footer', 'type' => 'link', 'label' => 'Footer - Zalo Gemlock', 'value' => 'https://zalo.me/', 'order' => 404],
            ['key' => 'footer_copyright_gemlock', 'section' => 'footer', 'type' => 'text', 'label' => 'Footer - Copyright Gemlock', 'value' => 'Copyright © 2025 Perfect House Việt Nam.', 'order' => 405],
            ['key' => 'footer_logo_gemlock', 'section' => 'footer', 'type' => 'image', 'label' => 'Footer - Logo Gemlock', 'value' => 'image/Logo Tách Nền.png', 'order' => 406],
        ];

        foreach ($contentItems as $item) {
            ContentItem::updateOrCreate(
                ['key' => $item['key'], 'page_type' => $pageType],
                array_merge($item, ['page_type' => $pageType, 'is_active' => true])
            );
        }

        // Import HTML từ home1.html vào database
        $this->importHome1Html($pageType);
    }

    private function importHome1Html(string $pageType): void
    {
        $path = base_path('home1.html');
        if (! is_file($path)) {
            return;
        }

        $html = file_get_contents($path);
        $lines = preg_split('/\r\n|\r|\n/', $html);

        // Head: dòng 1-318
        $head = implode("\n", array_slice($lines, 0, 318));
        ContentItem::updateOrCreate(
            ['key' => "{$pageType}_head", 'page_type' => $pageType],
            [
                'key' => "{$pageType}_head",
                'page_type' => $pageType,
                'section' => 'head',
                'type' => 'html',
                'label' => 'Perfect House - Head HTML',
                'value' => $head,
                'order' => 1,
                'is_active' => true,
            ]
        );

        // Main: dòng 319-800
        $main = implode("\n", array_slice($lines, 318, 482));
        ContentItem::updateOrCreate(
            ['key' => "{$pageType}_main", 'page_type' => $pageType],
            [
                'key' => "{$pageType}_main",
                'page_type' => $pageType,
                'section' => 'main',
                'type' => 'html',
                'label' => 'Perfect House - Main Content HTML',
                'value' => $main,
                'order' => 2,
                'is_active' => true,
            ]
        );

        // Footer: dòng 801-927
        $footer = implode("\n", array_slice($lines, 800, 127));
        ContentItem::updateOrCreate(
            ['key' => "{$pageType}_footer", 'page_type' => $pageType],
            [
                'key' => "{$pageType}_footer",
                'page_type' => $pageType,
                'section' => 'footer',
                'type' => 'html',
                'label' => 'Perfect House - Footer HTML',
                'value' => $footer,
                'order' => 3,
                'is_active' => true,
            ]
        );

        $this->command->info('Home1.html imported to database successfully!');
    }
}
