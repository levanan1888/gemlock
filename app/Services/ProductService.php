<?php

namespace App\Services;

class ProductService
{
    public static function getAllProducts()
    {
        return [
            [
                'slug' => 'n81b',
                'name' => 'KHÓA THÔNG MINH CAO CẤP GEM - N81B',
                'brand' => 'Gem Smart Lock',
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
                'price' => 'Liên hệ',
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
                'slug' => 'n88b',
                'name' => 'KHÓA THÔNG MINH CAO CẤP GEM-N88B',
                'brand' => 'Gem Smart Lock',
                'price' => 'Liên hệ',
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
                'price' => 'Liên hệ',
                'image' => 'https://gemcorp.vn/images/N282.png',
                'description' => 'Mẫu khóa quốc dân với giá thành hợp lý nhưng vẫn đảm bảo độ bảo mật cực cao.',
                'features' => [
                    ['title' => 'Bảo mật tuyệt đối', 'desc' => 'Chống sao chép thẻ từ, mã số ảo', 'icon' => 'fas fa-user-shield']
                ],
                'specs' => ['Chất liệu' => 'Hợp kim cao cấp']
            ],
            [
                'slug' => 'n68',
                'name' => 'KHÓA THÔNG MINH CAO CẤP GEM-N68',
                'brand' => 'Gem Smart Lock',
                'price' => 'Liên hệ',
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
                'price' => 'Liên hệ',
                'image' => 'https://gemcorp.vn/images/H29.png',
                'description' => 'Giải pháp khóa khách sạn thông minh, quản lý tập trung qua phần mềm.',
                'features' => [
                    ['title' => 'Quản lý tập trung', 'desc' => 'Phần mềm quản lý chuyên dụng cho khách sạn', 'icon' => 'fas fa-hotel']
                ],
                'specs' => ['Loại' => 'Khóa khách sạn']
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
}
