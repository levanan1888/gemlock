<?php

namespace App\Services;

class ProductService
{
    public static function getCategories()
    {
        return [
            [
                'slug' => 'biet-thu',
                'name' => 'Giải Pháp Biệt Thự Cao Cấp',
                'icon' => 'villa',
                'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDrumd5Y-qG4yxu3qF_ClpLyRM2oq7AoNKxW4RGpX8R_tcYVy8edwj77vZFd0066K9GvWNHiZM4_zwBVL3erNVs6I_OHX8L59kdLlSrxJwvGe9Ro1BukBdR-pa1pa8EPkJdDXqIlmCBqHA8t3YSuTY6_Y9Op5geBma05dVofVmuf5xqiDPEvA6F06STDZq0Ug8a45F1BHhZ48TfwB47yvHaFJGHWCeS7b90stqLcGsrY5wjBic4FE1DmVYQs9Cwad34W-UePe3teL-E',
                'series' => 'Gem Villa Series',
                'title' => 'An Ninh Đa Lớp',
                'features' => [
                    ['icon' => 'verified_user', 'text' => 'Nhận diện khuôn mặt 3D'],
                    ['icon' => 'fingerprint', 'text' => 'Cảm biến vân tay FPC Thụy Điển'],
                    ['icon' => 'notifications_active', 'text' => 'Cảnh báo đột nhập thời gian thực'],
                ],
            ],
            [
                'slug' => 'can-ho',
                'name' => 'Giải Pháp Căn Hộ Hiện Đại',
                'icon' => 'apartment',
                'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuA7Gfwy4xK5Z0iu0pM9uNQdSpRVb5nMGd-QAEztuWY0IYfncPxhm0sq8-Zfq6fVHNQcgxUHsP6qML90UxgfnOnqEXm9ygx__mtOfIEznzLdFul4FEWvq7osDTyi3_qYMmuW_UuIl2_QrriyEMpPnYMH9aE-tD9BhP9u1Yn1RD6dYKXUsXYKtKqyDBWWadyBaPYKRJkxTIu9WlKotvtg0QoCOGaQe5Od7dgoQVhd--2ix04v0fiEq1eRlC3dGk2SarHnad9zhaEKxwA-',
                'series' => 'Gem Smart Home',
                'title' => 'Kết Nối Thông Minh',
                'features' => [
                    ['icon' => 'wifi', 'text' => 'Quản lý từ xa qua App'],
                    ['icon' => 'schedule', 'text' => 'Tạo mã khóa dùng 1 lần'],
                    ['icon' => 'link', 'text' => 'Liên kết hệ sinh thái SmartHome'],
                ],
            ],
            [
                'slug' => 'van-phong',
                'name' => 'Giải Pháp Văn Phòng - Kính',
                'icon' => 'business',
                'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuA-i7o2wSTxNqBK6Vco_3TpP2q4o9SseKwoSyFnyHum_XJh0_8WUJ9UH4vS68hSf4Sl2S7Vse8C_KGD99ef5hoZf6fOWE2AUFEiB9Txyez_VYFDSAkVOjslZYYEOzESdNYwx_QIHUfou_dA7IrMNlSSsoBk0Tjqjdo5cWu1Eq7axFnNeFAuSHGu5oDvTfd4ZV3VxPquJkFPzZ0qJsnET4xiUgWa5pK6MscAG2qpbV4RKQYhu8XRxeG6UaWLpcWfsvbzPspUpySj9GnG',
                'series' => 'Gem Office Security',
                'title' => 'Chuyên Dụng Cửa Kính',
                'features' => [
                    ['icon' => 'install_mobile', 'text' => 'Lắp đặt không cần khoan kính'],
                    ['icon' => 'badge', 'text' => 'Tích hợp chấm công vân tay'],
                    ['icon' => 'group', 'text' => 'Lưu trữ 1000 ID người dùng'],
                ],
            ],
        ];
    }

    public static function getAllProducts()
    {
        return [
            [
                'slug' => 'n81b',
                'name' => 'KHÓA THÔNG MINH CAO CẤP GEM - N81B',
                'brand' => 'Gem Smart Lock',
                'category' => 'biet-thu',
                'price' => '9.900.000đ',
                'image' => 'https://gemcorp.vn/images/N81B.png',
                'images' => [
                    'https://gemcorp.vn/images/N81B.png',
                    'https://gemcorp.vn/images/N86.png',
                    'https://gemcorp.vn/images/N88B.png'
                ],
                'description' => 'Gemlock N81B không chỉ là một chiếc khóa thông minh, mà là tuyên ngôn về sự thành đạt của chủ nhân. Thiết kế đen bóng sang trọng cùng hệ thống bảo mật đa tầng: nhận diện khuôn mặt 3D, tĩnh mạch lòng bàn tay.',
                'features' => [
                    ['title' => 'Nhận diện khuôn mặt 3D AI', 'desc' => 'Công nghệ AI quét sâu các đường nét, nhận diện chính xác ngay cả trong bóng tối.', 'icon' => 'fas fa-eye'],
                    ['title' => 'Tĩnh mạch lòng bàn tay', 'desc' => 'Phương thức bảo mật không tiếp xúc tiên tiến nhất, nhận diện qua cấu trúc mạch máu.', 'icon' => 'fas fa-hand-paper'],
                    ['title' => 'Cảm biến vân tay', 'desc' => 'Công nghệ bán dẫn siêu nhạy, chống làm giả, mở cửa chỉ với một chạm.', 'icon' => 'fas fa-fingerprint'],
                    ['title' => 'Quản lý qua App', 'desc' => 'Quản lý mở cửa từ xa, kiểm tra lịch sử ra vào mọi lúc mọi nơi qua điện thoại.', 'icon' => 'fas fa-mobile-alt'],
                    ['title' => 'Màn hình Indoor LCD', 'desc' => 'Tích hợp màn hình bên trong giúp quan sát bên ngoài cửa rõ nét và an toàn.', 'icon' => 'fas fa-desktop']
                ],
                'specs' => [
                    'Chất liệu' => 'Hợp kim nhôm + nhựa ABS',
                    'Mặt khóa' => 'Kính cường lực Tempered Glass',
                    'Nguồn' => 'Pin Lithium sạc lại',
                    'Độ dày cửa' => '33 - 90 mm',
                    'Lưu trữ' => '300 người dùng'
                ]
            ],
            [
                'slug' => 'n86',
                'name' => 'KHÓA THÔNG MINH CAO CẤP GEM - N86',
                'brand' => 'Gem Smart Lock',
                'category' => 'biet-thu',
                'price' => '12.500.000đ',
                'image' => 'https://gemcorp.vn/images/N86.png',
                'images' => [
                    'https://gemcorp.vn/images/N86.png',
                    'https://gemcorp.vn/images/N81B.png'
                ],
                'description' => 'Dòng khóa cao cấp hội tụ đầy đủ các tính năng hiện đại nhất. Thiết kế khối chắc chắn, bền bỉ với thời gian.',
                'features' => [
                    ['title' => 'Vân tay siêu nhạy', 'desc' => 'Nhận diện trong 0.5s', 'icon' => 'fas fa-fingerprint'],
                    ['title' => 'Bảo mật đa tầng', 'desc' => 'Mã số, thẻ từ, chìa cơ', 'icon' => 'fas fa-shield-alt']
                ],
                'specs' => ['Chất liệu' => 'Hợp kim kẽm', 'Bảo hành' => '24 tháng']
            ],
            [
                'slug' => 'n90-pro',
                'name' => 'KHÓA THÔNG MINH GEM N90 PRO',
                'brand' => 'Gem Smart Lock',
                'category' => 'biet-thu',
                'price' => '15.900.000đ',
                'image' => 'https://gemcorp.vn/images/N86.png',
                'description' => 'Flagship 2024 - Nhận diện khuôn mặt 3D + Camera AI 2K tích hợp. Bảo mật cao nhất dành cho biệt thự.',
                'features' => [
                    ['title' => 'Camera AI 2K', 'desc' => 'Ghi hình và nhận diện người lạ', 'icon' => 'fas fa-video'],
                    ['title' => 'Pin dự phòng', 'desc' => 'Hoạt động 12 tháng không cần sạc', 'icon' => 'fas fa-battery-full']
                ],
                'specs' => ['Chất liệu' => 'Titan Grade 5', 'Bảo hành' => '36 tháng']
            ],
            [
                'slug' => 'n85-plus',
                'name' => 'KHÓA THÔNG MINH GEM N85 PLUS',
                'brand' => 'Gem Smart Lock',
                'category' => 'biet-thu',
                'price' => '8.500.000đ',
                'image' => 'https://gemcorp.vn/images/N81B.png',
                'description' => 'Phiên bản nâng cấp với màn hình cảm ứng IPS và chuông hình thông minh tích hợp.',
                'features' => [
                    ['title' => 'Màn hình IPS 4.5 inch', 'desc' => 'Hiển thị sắc nét, cảm ứng mượt', 'icon' => 'fas fa-tv'],
                    ['title' => 'Chuông hình HD', 'desc' => 'Xem khách từ xa qua điện thoại', 'icon' => 'fas fa-bell']
                ],
                'specs' => ['Màn hình' => 'IPS 4.5 inch', 'Bảo hành' => '24 tháng']
            ],
            [
                'slug' => 'n82-face',
                'name' => 'KHÓA VÂN TAY KHUÔN MẶT GEM N82',
                'brand' => 'Gem Smart Lock',
                'category' => 'biet-thu',
                'price' => '11.200.000đ',
                'image' => 'https://gemcorp.vn/images/N86.png',
                'description' => 'Công nghệ nhận diện khuôn mặt 3D infrared, hoạt động tốt trong mọi điều kiện ánh sáng.',
                'features' => [
                    ['title' => '3D Infrared Face ID', 'desc' => 'Nhận diện trong bóng tối', 'icon' => 'fas fa-user-check'],
                    ['title' => 'Chống giả mạo', 'desc' => 'Không mở bằng ảnh/video', 'icon' => 'fas fa-shield-virus']
                ],
                'specs' => ['Công nghệ' => '3D Structured Light', 'Bảo hành' => '24 tháng']
            ],
            [
                'slug' => 'n88b',
                'name' => 'KHÓA THÔNG MINH CAO CẤP GEM-N88B',
                'brand' => 'Gem Smart Lock',
                'category' => 'can-ho',
                'price' => '7.200.000đ',
                'image' => 'https://gemcorp.vn/images/N88B.png',
                'images' => [
                    'https://gemcorp.vn/images/N88B.png'
                ],
                'description' => 'Thiết kế Push-Pull hiện đại, mở cửa chỉ với một thao tác kéo hoặc đẩy nhẹ nhàng.',
                'features' => [
                    ['title' => 'Thiết kế Push-Pull', 'desc' => 'Kéo đẩy nhẹ nhàng', 'icon' => 'fas fa-door-open']
                ],
                'specs' => ['Dòng sản phẩm' => 'Push-Pull']
            ],
            [
                'slug' => 'n282',
                'name' => 'KHÓA THÔNG MINH CAO CẤP GEM – N282',
                'brand' => 'Gem Smart Lock',
                'category' => 'can-ho',
                'price' => '4.500.000đ',
                'image' => 'https://gemcorp.vn/images/N282.png',
                'description' => 'Mẫu khóa quốc dân với giá thành hợp lý nhưng vẫn đảm bảo độ bảo mật cực cao.',
                'features' => [
                    ['title' => 'Bảo mật tuyệt đối', 'desc' => 'Chống sao chép thẻ từ, mã số ảo', 'icon' => 'fas fa-user-shield']
                ],
                'specs' => ['Chất liệu' => 'Hợp kim cao cấp']
            ],
            [
                'slug' => 'n300-wifi',
                'name' => 'KHÓA WIFI THÔNG MINH GEM N300',
                'brand' => 'Gem Smart Lock',
                'category' => 'can-ho',
                'price' => '5.200.000đ',
                'image' => 'https://gemcorp.vn/images/N88B.png',
                'description' => 'Kết nối WiFi trực tiếp, không cần Gateway. Mở cửa từ xa mọi lúc mọi nơi qua App Tuya.',
                'features' => [
                    ['title' => 'WiFi 2.4GHz', 'desc' => 'Không cần Gateway trung gian', 'icon' => 'fas fa-wifi'],
                    ['title' => 'Tuya Smart', 'desc' => 'Tích hợp hệ sinh thái Smart Home', 'icon' => 'fas fa-home']
                ],
                'specs' => ['Kết nối' => 'WiFi 2.4GHz', 'App' => 'Tuya Smart']
            ],
            [
                'slug' => 'n255-slim',
                'name' => 'KHÓA SIÊU MỎNG GEM N255 SLIM',
                'brand' => 'Gem Smart Lock',
                'category' => 'can-ho',
                'price' => '3.900.000đ',
                'image' => 'https://gemcorp.vn/images/N282.png',
                'description' => 'Thiết kế siêu mỏng chỉ 23mm, phù hợp cửa chung cư đố nhỏ. Lắp đặt dễ dàng.',
                'features' => [
                    ['title' => 'Siêu mỏng 23mm', 'desc' => 'Phù hợp mọi loại cửa', 'icon' => 'fas fa-compress-alt'],
                    ['title' => 'Lắp đặt nhanh', 'desc' => 'Chỉ 30 phút hoàn thiện', 'icon' => 'fas fa-tools']
                ],
                'specs' => ['Độ dày' => '23mm', 'Bảo hành' => '18 tháng']
            ],
            [
                'slug' => 'n310-card',
                'name' => 'KHÓA THẺ TỪ GEM N310',
                'brand' => 'Gem Smart Lock',
                'category' => 'can-ho',
                'price' => '2.900.000đ',
                'image' => 'https://gemcorp.vn/images/N88B.png',
                'description' => 'Giải pháp khóa thẻ từ kinh tế cho căn hộ cho thuê. Quản lý dễ dàng, chi phí thấp.',
                'features' => [
                    ['title' => 'Thẻ từ RFID', 'desc' => 'Tương thích thẻ chung cư', 'icon' => 'fas fa-id-card'],
                    ['title' => 'Giá hợp lý', 'desc' => 'Phù hợp cho thuê', 'icon' => 'fas fa-tags']
                ],
                'specs' => ['Loại thẻ' => 'RFID 13.56MHz', 'Bảo hành' => '12 tháng']
            ],
            [
                'slug' => 'n288-premium',
                'name' => 'KHÓA CĂN HỘ CAO CẤP GEM N288',
                'brand' => 'Gem Smart Lock',
                'category' => 'can-ho',
                'price' => '6.800.000đ',
                'image' => 'https://gemcorp.vn/images/N282.png',
                'description' => 'Dòng khóa căn hộ cao cấp với đầy đủ 5 phương thức mở: vân tay, mã số, thẻ từ, App, chìa cơ.',
                'features' => [
                    ['title' => '5 phương thức mở', 'desc' => 'Linh hoạt cho mọi thành viên', 'icon' => 'fas fa-key'],
                    ['title' => 'Cảnh báo thông minh', 'desc' => 'Chống cạy, chống phá', 'icon' => 'fas fa-exclamation-triangle']
                ],
                'specs' => ['Phương thức' => '5 in 1', 'Bảo hành' => '24 tháng']
            ],
            [
                'slug' => 'n68',
                'name' => 'KHÓA THÔNG MINH CAO CẤP GEM-N68',
                'brand' => 'Gem Smart Lock',
                'category' => 'van-phong',
                'price' => '4.200.000đ',
                'image' => 'https://gemcorp.vn/images/N68.png',
                'description' => 'Chuyên dụng cho các dòng cửa nhôm hệ, cửa Xingfa với thiết kế đố nhỏ.',
                'features' => [
                    ['title' => 'Chống nước IP65', 'desc' => 'Lắp đặt tốt ngoài trời/ẩm ướt', 'icon' => 'fas fa-tint']
                ],
                'specs' => ['Loại cửa' => 'Cửa nhôm / Cửa sắt']
            ],
            [
                'slug' => 'h29',
                'name' => 'KHÓA THÔNG MINH GEM-H29',
                'brand' => 'Gem Smart Lock',
                'category' => 'van-phong',
                'price' => '3.200.000đ',
                'image' => 'https://gemcorp.vn/images/H29.png',
                'description' => 'Giải pháp khóa khách sạn thông minh, quản lý tập trung qua phần mềm.',
                'features' => [
                    ['title' => 'Quản lý tập trung', 'desc' => 'Phần mềm quản lý chuyên dụng cho khách sạn', 'icon' => 'fas fa-hotel']
                ],
                'specs' => ['Loại' => 'Khóa khách sạn']
            ],
            [
                'slug' => 'g100-glass',
                'name' => 'KHÓA CỬA KÍNH GEM G100',
                'brand' => 'Gem Smart Lock',
                'category' => 'van-phong',
                'price' => '4.800.000đ',
                'image' => 'https://gemcorp.vn/images/N68.png',
                'description' => 'Thiết kế dành riêng cho cửa kính văn phòng. Lắp không cần khoan, giữ nguyên tính thẩm mỹ.',
                'features' => [
                    ['title' => 'Không khoan kính', 'desc' => 'Lắp đặt bằng kẹp chuyên dụng', 'icon' => 'fas fa-compress'],
                    ['title' => 'Chấm công vân tay', 'desc' => 'Tích hợp quản lý nhân sự', 'icon' => 'fas fa-user-clock']
                ],
                'specs' => ['Độ dày kính' => '10-12mm', 'Bảo hành' => '24 tháng']
            ],
            [
                'slug' => 'g150-double',
                'name' => 'KHÓA CỬA KÍNH ĐÔI GEM G150',
                'brand' => 'Gem Smart Lock',
                'category' => 'van-phong',
                'price' => '7.500.000đ',
                'image' => 'https://gemcorp.vn/images/H29.png',
                'description' => 'Giải pháp cho cửa kính đôi (cửa trượt/cửa mở). Khóa đồng bộ cả 2 cánh.',
                'features' => [
                    ['title' => 'Khóa cửa đôi', 'desc' => 'Đồng bộ 2 cánh cửa', 'icon' => 'fas fa-door-closed'],
                    ['title' => 'Remote điều khiển', 'desc' => 'Mở từ xa tiện lợi', 'icon' => 'fas fa-broadcast-tower']
                ],
                'specs' => ['Loại cửa' => 'Cửa kính đôi', 'Bảo hành' => '24 tháng']
            ],
            [
                'slug' => 'h50-hotel',
                'name' => 'KHÓA KHÁCH SẠN GEM H50 PRO',
                'brand' => 'Gem Smart Lock',
                'category' => 'van-phong',
                'price' => '2.800.000đ',
                'image' => 'https://gemcorp.vn/images/H29.png',
                'description' => 'Khóa thẻ từ chuyên nghiệp cho khách sạn, nhà nghỉ. Tương thích hệ thống quản lý PMS.',
                'features' => [
                    ['title' => 'Tương thích PMS', 'desc' => 'Kết nối phần mềm quản lý khách sạn', 'icon' => 'fas fa-server'],
                    ['title' => 'Thẻ master', 'desc' => 'Quản lý đa tầng', 'icon' => 'fas fa-layer-group']
                ],
                'specs' => ['Giao thức' => 'Mifare', 'Bảo hành' => '18 tháng']
            ],
            [
                'slug' => 'n75-aluminum',
                'name' => 'KHÓA CỬA NHÔM GEM N75',
                'brand' => 'Gem Smart Lock',
                'category' => 'van-phong',
                'price' => '3.500.000đ',
                'image' => 'https://gemcorp.vn/images/N68.png',
                'description' => 'Chuyên dụng cho cửa nhôm Xingfa, cửa nhôm hệ cao. Thiết kế gọn, lắp đặt dễ dàng.',
                'features' => [
                    ['title' => 'Cửa nhôm chuyên dụng', 'desc' => 'Xingfa, Việt Pháp, JMA...', 'icon' => 'fas fa-border-style'],
                    ['title' => 'Chống nước IP54', 'desc' => 'Phù hợp ngoài trời', 'icon' => 'fas fa-cloud-rain']
                ],
                'specs' => ['Loại cửa' => 'Nhôm hệ', 'Bảo hành' => '18 tháng']
            ],
            [
                'slug' => 'a200-access',
                'name' => 'HỆ THỐNG KIỂM SOÁT RA VÀO GEM A200',
                'brand' => 'Gem Smart Lock',
                'category' => 'van-phong',
                'price' => '12.000.000đ',
                'image' => 'https://gemcorp.vn/images/H29.png',
                'description' => 'Hệ thống Access Control chuyên nghiệp: quẹt thẻ, vân tay, khuôn mặt + chấm công.',
                'features' => [
                    ['title' => 'Chấm công 3 in 1', 'desc' => 'Thẻ + Vân tay + Khuôn mặt', 'icon' => 'fas fa-id-badge'],
                    ['title' => 'Báo cáo Excel', 'desc' => 'Xuất dữ liệu chấm công tự động', 'icon' => 'fas fa-file-excel']
                ],
                'specs' => ['Dung lượng' => '3000 người dùng', 'Bảo hành' => '24 tháng']
            ]
        ];
    }

    public static function getProductBySlug($slug)
    {
        $products = self::getAllProducts();
        foreach ($products as $product) {
            if ($product['slug'] === $slug) {
                return $product;
            }
        }
        return $products[0]; // Fallback to first
    }

    public static function getProductsByCategory($categorySlug)
    {
        $products = self::getAllProducts();
        return array_filter($products, function ($product) use ($categorySlug) {
            return isset($product['category']) && $product['category'] === $categorySlug;
        });
    }

    public static function getProductsGroupedByCategory()
    {
        $categories = self::getCategories();
        $products = self::getAllProducts();
        $grouped = [];

        foreach ($categories as $category) {
            $categoryProducts = array_filter($products, function ($product) use ($category) {
                return isset($product['category']) && $product['category'] === $category['slug'];
            });
            $grouped[] = [
                'category' => $category,
                'products' => array_values($categoryProducts),
            ];
        }

        return $grouped;
    }
}
