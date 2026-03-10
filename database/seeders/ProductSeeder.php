<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'slug' => 'n81b',
                'name' => 'KHÓA THÔNG MINH CAO CẤP GEM - N81B',
                'brand' => 'Gem Smart Lock',
                'category' => 'biet-thu',
                'price' => '12023000',
                'description' => 'Gemlock N81B không chỉ là một chiếc khóa thông minh, mà là tuyên ngôn về sự thành đạt của chủ nhân. Thiết kế đen bóng sang trọng cùng hệ thống bảo mật đa tầng: nhận diện khuôn mặt 3D, tĩnh mạch lòng bàn tay.',
                'image' => 'https://gemcorp.vn/images/N81B.png',
                'images' => json_encode([
                    'https://gemcorp.vn/images/N81B.png',
                    'https://gemcorp.vn/images/N86.png',
                    'https://gemcorp.vn/images/N88B.png'
                ]),
                'features' => json_encode([
                    ['title' => 'Nhận diện khuôn mặt 3D AI', 'desc' => 'Công nghệ AI quét sâu các đường nét, nhận diện chính xác ngay cả trong bóng tối.', 'icon' => 'fas fa-eye'],
                    ['title' => 'Tĩnh mạch lòng bàn tay', 'desc' => 'Phương thức bảo mật không tiếp xúc tiên tiến nhất, nhận diện qua cấu trúc mạch máu.', 'icon' => 'fas fa-hand-paper'],
                    ['title' => 'Cảm biến vân tay', 'desc' => 'Công nghệ bán dẫn siêu nhạy, chống làm giả, mở cửa chỉ với một chạm.', 'icon' => 'fas fa-fingerprint'],
                    ['title' => 'Quản lý qua App', 'desc' => 'Quản lý mở cửa từ xa, kiểm tra lịch sử ra vào mọi lúc mọi nơi qua điện thoại.', 'icon' => 'fas fa-mobile-alt'],
                    ['title' => 'Màn hình Indoor LCD', 'desc' => 'Tích hợp màn hình bên trong giúp quan sát bên ngoài cửa rõ nét và an toàn.', 'icon' => 'fas fa-desktop']
                ]),
                'specs' => json_encode([
                    'Chất liệu' => 'Hợp kim nhôm + nhựa ABS',
                    'Mặt khóa' => 'Kính cường lực Tempered Glass',
                    'Nguồn' => 'Pin Lithium sạc lại',
                    'Độ dày cửa' => '33 - 90 mm',
                    'Lưu trữ' => '300 người dùng'
                ]),
                'is_active' => true,
                'order' => 1,
            ],
            [
                'slug' => 'n86',
                'name' => 'KHÓA THÔNG MINH CAO CẤP GEM - N86',
                'brand' => 'Gem Smart Lock',
                'category' => 'biet-thu',
                'price' => '122130000',
                'description' => 'Dòng khóa cao cấp hội tụ đầy đủ các tính năng hiện đại nhất. Thiết kế khối chắc chắn, bền bỉ với thời gian.',
                'image' => 'https://gemcorp.vn/images/N86.png',
                'images' => json_encode([
                    'https://gemcorp.vn/images/N86.png',
                    'https://gemcorp.vn/images/N81B.png'
                ]),
                'features' => json_encode([
                    ['title' => 'Vân tay siêu nhạy', 'desc' => 'Nhận diện trong 0.5s', 'icon' => 'fas fa-fingerprint'],
                    ['title' => 'Bảo mật đa tầng', 'desc' => 'Mã số, thẻ từ, chìa cơ', 'icon' => 'fas fa-shield-alt']
                ]),
                'specs' => json_encode([
                    'Chất liệu' => 'Hợp kim kẽm',
                    'Bảo hành' => '24 tháng'
                ]),
                'is_active' => true,
                'order' => 2,
            ],
            [
                'slug' => 'n90-pro',
                'name' => 'KHÓA THÔNG MINH GEM N90 PRO',
                'brand' => 'Gem Smart Lock',
                'category' => 'biet-thu',
                'price' => '1320000',
                'description' => 'Flagship 2024 - Nhận diện khuôn mặt 3D + Camera AI 2K tích hợp. Bảo mật cao nhất dành cho biệt thự.',
                'image' => 'https://gemcorp.vn/images/N86.png',
                'images' => json_encode([]),
                'features' => json_encode([
                    ['title' => 'Camera AI 2K', 'desc' => 'Ghi hình và nhận diện người lạ', 'icon' => 'fas fa-video'],
                    ['title' => 'Pin dự phòng', 'desc' => 'Hoạt động 12 tháng không cần sạc', 'icon' => 'fas fa-battery-full']
                ]),
                'specs' => json_encode([
                    'Chất liệu' => 'Titan Grade 5',
                    'Bảo hành' => '36 tháng'
                ]),
                'is_active' => true,
                'order' => 3,
            ],
            [
                'slug' => 'n85-plus',
                'name' => 'KHÓA THÔNG MINH GEM N85 PLUS',
                'brand' => 'Gem Smart Lock',
                'category' => 'biet-thu',
                'price' => '130000',
                'description' => 'Phiên bản nâng cấp với màn hình cảm ứng IPS và chuông hình thông minh tích hợp.',
                'image' => 'https://gemcorp.vn/images/N81B.png',
                'images' => json_encode([]),
                'features' => json_encode([
                    ['title' => 'Màn hình IPS 4.5 inch', 'desc' => 'Hiển thị sắc nét, cảm ứng mượt', 'icon' => 'fas fa-tv'],
                    ['title' => 'Chuông hình HD', 'desc' => 'Xem khách từ xa qua điện thoại', 'icon' => 'fas fa-bell']
                ]),
                'specs' => json_encode([
                    'Màn hình' => 'IPS 4.5 inch',
                    'Bảo hành' => '24 tháng'
                ]),
                'is_active' => true,
                'order' => 4,
            ],
            [
                'slug' => 'n82-face',
                'name' => 'KHÓA VÂN TAY KHUÔN MẶT GEM N82',
                'brand' => 'Gem Smart Lock',
                'category' => 'biet-thu',
                'price' => '120000',
                'description' => 'Công nghệ nhận diện khuôn mặt 3D infrared, hoạt động tốt trong mọi điều kiện ánh sáng.',
                'image' => 'https://gemcorp.vn/images/N86.png',
                'images' => json_encode([]),
                'features' => json_encode([
                    ['title' => '3D Infrared Face ID', 'desc' => 'Nhận diện trong bóng tối', 'icon' => 'fas fa-user-check'],
                    ['title' => 'Chống giả mạo', 'desc' => 'Không mở bằng ảnh/video', 'icon' => 'fas fa-shield-virus']
                ]),
                'specs' => json_encode([
                    'Công nghệ' => '3D Structured Light',
                    'Bảo hành' => '24 tháng'
                ]),
                'is_active' => true,
                'order' => 5,
            ],
            [
                'slug' => 'n88b',
                'name' => 'KHÓA THÔNG MINH CAO CẤP GEM-N88B',
                'brand' => 'Gem Smart Lock',
                'category' => 'can-ho',
                'price' => '123123',
                'description' => 'Thiết kế Push-Pull hiện đại, mở cửa chỉ với một thao tác kéo hoặc đẩy nhẹ nhàng.',
                'image' => 'https://gemcorp.vn/images/N88B.png',
                'images' => json_encode([
                    'https://gemcorp.vn/images/N88B.png'
                ]),
                'features' => json_encode([
                    ['title' => 'Thiết kế Push-Pull', 'desc' => 'Kéo đẩy nhẹ nhàng', 'icon' => 'fas fa-door-open']
                ]),
                'specs' => json_encode([
                    'Dòng sản phẩm' => 'Push-Pull'
                ]),
                'is_active' => true,
                'order' => 6,
            ],
            [
                'slug' => 'n282',
                'name' => 'KHÓA THÔNG MINH CAO CẤP GEM – N282',
                'brand' => 'Gem Smart Lock',
                'category' => 'can-ho',
                'price' => '140000',
                'description' => 'Mẫu khóa quốc dân với giá thành hợp lý nhưng vẫn đảm bảo độ bảo mật cực cao.',
                'image' => 'https://gemcorp.vn/images/N282.png',
                'images' => json_encode([]),
                'features' => json_encode([
                    ['title' => 'Bảo mật tuyệt đối', 'desc' => 'Chống sao chép thẻ từ, mã số ảo', 'icon' => 'fas fa-user-shield']
                ]),
                'specs' => json_encode([
                    'Chất liệu' => 'Hợp kim cao cấp'
                ]),
                'is_active' => true,
                'order' => 7,
            ],
            [
                'slug' => 'n300-wifi',
                'name' => 'KHÓA WIFI THÔNG MINH GEM N300',
                'brand' => 'Gem Smart Lock',
                'category' => 'can-ho',
                'price' => '150000',
                'description' => 'Kết nối WiFi trực tiếp, không cần Gateway. Mở cửa từ xa mọi lúc mọi nơi qua App Tuya.',
                'image' => 'https://gemcorp.vn/images/N88B.png',
                'images' => json_encode([]),
                'features' => json_encode([
                    ['title' => 'WiFi 2.4GHz', 'desc' => 'Không cần Gateway trung gian', 'icon' => 'fas fa-wifi'],
                    ['title' => 'Tuya Smart', 'desc' => 'Tích hợp hệ sinh thái Smart Home', 'icon' => 'fas fa-home']
                ]),
                'specs' => json_encode([
                    'Kết nối' => 'WiFi 2.4GHz',
                    'App' => 'Tuya Smart'
                ]),
                'is_active' => true,
                'order' => 8,
            ],
            [
                'slug' => 'n255-slim',
                'name' => 'KHÓA SIÊU MỎNG GEM N255 SLIM',
                'brand' => 'Gem Smart Lock',
                'category' => 'can-ho',
                'price' => '1120000',
                'description' => 'Thiết kế siêu mỏng chỉ 23mm, phù hợp cửa chung cư đố nhỏ. Lắp đặt dễ dàng.',
                'image' => 'https://gemcorp.vn/images/N282.png',
                'images' => json_encode([]),
                'features' => json_encode([
                    ['title' => 'Siêu mỏng 23mm', 'desc' => 'Phù hợp mọi loại cửa', 'icon' => 'fas fa-compress-alt'],
                    ['title' => 'Lắp đặt nhanh', 'desc' => 'Chỉ 30 phút hoàn thiện', 'icon' => 'fas fa-tools']
                ]),
                'specs' => json_encode([
                    'Độ dày' => '23mm',
                    'Bảo hành' => '18 tháng'
                ]),
                'is_active' => true,
                'order' => 9,
            ],
            [
                'slug' => 'n310-card',
                'name' => 'KHÓA THẺ TỪ GEM N310',
                'brand' => 'Gem Smart Lock',
                'category' => 'can-ho',
                'price' => '1320000',
                'description' => 'Giải pháp khóa thẻ từ kinh tế cho căn hộ cho thuê. Quản lý dễ dàng, chi phí thấp.',
                'image' => 'https://gemcorp.vn/images/N88B.png',
                'images' => json_encode([]),
                'features' => json_encode([
                    ['title' => 'Thẻ từ RFID', 'desc' => 'Tương thích thẻ chung cư', 'icon' => 'fas fa-id-card'],
                    ['title' => 'Giá hợp lý', 'desc' => 'Phù hợp cho thuê', 'icon' => 'fas fa-tags']
                ]),
                'specs' => json_encode([
                    'Loại thẻ' => 'RFID 13.56MHz',
                    'Bảo hành' => '12 tháng'
                ]),
                'is_active' => true,
                'order' => 10,
            ],
            [
                'slug' => 'n288-premium',
                'name' => 'KHÓA CĂN HỘ CAO CẤP GEM N288',
                'brand' => 'Gem Smart Lock',
                'category' => 'can-ho',
                'price' => '50000',
                'description' => 'Dòng khóa căn hộ cao cấp với đầy đủ 5 phương thức mở: vân tay, mã số, thẻ từ, App, chìa cơ.',
                'image' => 'https://gemcorp.vn/images/N282.png',
                'images' => json_encode([]),
                'features' => json_encode([
                    ['title' => '5 phương thức mở', 'desc' => 'Linh hoạt cho mọi thành viên', 'icon' => 'fas fa-key'],
                    ['title' => 'Cảnh báo thông minh', 'desc' => 'Chống cạy, chống phá', 'icon' => 'fas fa-exclamation-triangle']
                ]),
                'specs' => json_encode([
                    'Phương thức' => '5 in 1',
                    'Bảo hành' => '24 tháng'
                ]),
                'is_active' => true,
                'order' => 11,
            ],
            [
                'slug' => 'n68',
                'name' => 'KHÓA THÔNG MINH CAO CẤP GEM-N68',
                'brand' => 'Gem Smart Lock',
                'category' => 'van-phong',
                'price' => '420000',
                'description' => 'Chuyên dụng cho các dòng cửa nhôm hệ, cửa Xingfa với thiết kế đố nhỏ.',
                'image' => 'https://gemcorp.vn/images/N68.png',
                'images' => json_encode([]),
                'features' => json_encode([
                    ['title' => 'Chống nước IP65', 'desc' => 'Lắp đặt tốt ngoài trời/ẩm ướt', 'icon' => 'fas fa-tint']
                ]),
                'specs' => json_encode([
                    'Loại cửa' => 'Cửa nhôm / Cửa sắt'
                ]),
                'is_active' => true,
                'order' => 12,
            ],
            [
                'slug' => 'h29',
                'name' => 'KHÓA THÔNG MINH GEM-H29',
                'brand' => 'Gem Smart Lock',
                'category' => 'van-phong',
                'price' => '720000',
                'description' => 'Giải pháp khóa khách sạn thông minh, quản lý tập trung qua phần mềm.',
                'image' => 'https://gemcorp.vn/images/H29.png',
                'images' => json_encode([]),
                'features' => json_encode([
                    ['title' => 'Quản lý tập trung', 'desc' => 'Phần mềm quản lý chuyên dụng cho khách sạn', 'icon' => 'fas fa-hotel']
                ]),
                'specs' => json_encode([
                    'Loại' => 'Khóa khách sạn'
                ]),
                'is_active' => true,
                'order' => 13,
            ],
            [
                'slug' => 'g100-glass',
                'name' => 'KHÓA CỬA KÍNH GEM G100',
                'brand' => 'Gem Smart Lock',
                'category' => 'van-phong',
                'price' => '620000',
                'description' => 'Thiết kế dành riêng cho cửa kính văn phòng. Lắp không cần khoan, giữ nguyên tính thẩm mỹ.',
                'image' => 'https://gemcorp.vn/images/N68.png',
                'images' => json_encode([]),
                'features' => json_encode([
                    ['title' => 'Không khoan kính', 'desc' => 'Lắp đặt bằng kẹp chuyên dụng', 'icon' => 'fas fa-compress'],
                    ['title' => 'Chấm công vân tay', 'desc' => 'Tích hợp quản lý nhân sự', 'icon' => 'fas fa-user-clock']
                ]),
                'specs' => json_encode([
                    'Độ dày kính' => '10-12mm',
                    'Bảo hành' => '24 tháng'
                ]),
                'is_active' => true,
                'order' => 14,
            ],
            [
                'slug' => 'g150-double',
                'name' => 'KHÓA CỬA KÍNH ĐÔI GEM G150',
                'brand' => 'Gem Smart Lock',
                'category' => 'van-phong',
                'price' => '920000',
                'description' => 'Giải pháp cho cửa kính đôi (cửa trượt/cửa mở). Khóa đồng bộ cả 2 cánh.',
                'image' => 'https://gemcorp.vn/images/H29.png',
                'images' => json_encode([]),
                'features' => json_encode([
                    ['title' => 'Khóa cửa đôi', 'desc' => 'Đồng bộ 2 cánh cửa', 'icon' => 'fas fa-door-closed'],
                    ['title' => 'Remote điều khiển', 'desc' => 'Mở từ xa tiện lợi', 'icon' => 'fas fa-broadcast-tower']
                ]),
                'specs' => json_encode([
                    'Loại cửa' => 'Cửa kính đôi',
                    'Bảo hành' => '24 tháng'
                ]),
                'is_active' => true,
                'order' => 15,
            ],
            [
                'slug' => 'h50-hotel',
                'name' => 'KHÓA KHÁCH SẠN GEM H50 PRO',
                'brand' => 'Gem Smart Lock',
                'category' => 'van-phong',
                'price' => '220000',
                'description' => 'Khóa thẻ từ chuyên nghiệp cho khách sạn, nhà nghỉ. Tương thích hệ thống quản lý PMS.',
                'image' => 'https://gemcorp.vn/images/H29.png',
                'images' => json_encode([]),
                'features' => json_encode([
                    ['title' => 'Tương thích PMS', 'desc' => 'Kết nối phần mềm quản lý khách sạn', 'icon' => 'fas fa-server'],
                    ['title' => 'Thẻ master', 'desc' => 'Quản lý đa tầng', 'icon' => 'fas fa-layer-group']
                ]),
                'specs' => json_encode([
                    'Giao thức' => 'Mifare',
                    'Bảo hành' => '18 tháng'
                ]),
                'is_active' => true,
                'order' => 16,
            ],
            [
                'slug' => 'n75-aluminum',
                'name' => 'KHÓA CỬA NHÔM GEM N75',
                'brand' => 'Gem Smart Lock',
                'category' => 'van-phong',
                'price' => '920000',
                'description' => 'Chuyên dụng cho cửa nhôm Xingfa, cửa nhôm hệ cao. Thiết kế gọn, lắp đặt dễ dàng.',
                'image' => 'https://gemcorp.vn/images/N68.png',
                'images' => json_encode([]),
                'features' => json_encode([
                    ['title' => 'Cửa nhôm chuyên dụng', 'desc' => 'Xingfa, Việt Pháp, JMA...', 'icon' => 'fas fa-border-style'],
                    ['title' => 'Chống nước IP54', 'desc' => 'Phù hợp ngoài trời', 'icon' => 'fas fa-cloud-rain']
                ]),
                'specs' => json_encode([
                    'Loại cửa' => 'Nhôm hệ',
                    'Bảo hành' => '18 tháng'
                ]),
                'is_active' => true,
                'order' => 17,
            ],
            [
                'slug' => 'a200-access',
                'name' => 'HỆ THỐNG KIỂM SOÁT RA VÀO GEM A200',
                'brand' => 'Gem Smart Lock',
                'category' => 'van-phong',
                'price' => '420000',
                'description' => 'Hệ thống Access Control chuyên nghiệp: quẹt thẻ, vân tay, khuôn mặt + chấm công.',
                'image' => 'https://gemcorp.vn/images/H29.png',
                'images' => json_encode([]),
                'features' => json_encode([
                    ['title' => 'Chấm công 3 in 1', 'desc' => 'Thẻ + Vân tay + Khuôn mặt', 'icon' => 'fas fa-id-badge'],
                    ['title' => 'Báo cáo Excel', 'desc' => 'Xuất dữ liệu chấm công tự động', 'icon' => 'fas fa-file-excel']
                ]),
                'specs' => json_encode([
                    'Dung lượng' => '3000 người dùng',
                    'Bảo hành' => '24 tháng'
                ]),
                'is_active' => true,
                'order' => 18,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
