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
                'slug' => 'khoa-thong-minh-gem-n81b',
                'name' => 'KHOÁ THÔNG MINH CAO CẤP GEM - N81B',
                'brand' => 'Gem Smart Lock',
                'category' => 'Khoá thông minh',
                'price' => 9900000,
                'description' => 'Khoá thông minh cao cấp với công nghệ AI tiên tiến, nhận diện khuôn mặt 3D, vân tay và quản lý qua app.',
                'image' => 'products/n81b.jpg',
                'images' => json_encode([
                    'products/n81b-1.jpg',
                    'products/n81b-2.jpg',
                    'products/n81b-3.jpg',
                ]),
                'features' => json_encode([
                    'Nhận diện khuôn mặt 3D AI',
                    'Công nghệ nhận dạng mạch máu ngón tay',
                    'Cảm biến vân tay sinh trắc học',
                    'Quản lý qua ứng dụng di động',
                    'Màn hình LCD trong nhà',
                ]),
                'specs' => json_encode([
                    'Chất liệu' => 'Hợp kim nhôm + ABS',
                    'Mặt khóa' => 'Kính cường lực Tempered Glass',
                    'Nguồn' => 'Pin Lithium-ion',
                    'Độ dày cửa' => '33 - 90 mm',
                    'Lưu trữ' => '300 người dùng',
                ]),
                'is_active' => true,
                'order' => 1,
            ],
            [
                'slug' => 'khoa-thong-minh-gem-f500',
                'name' => 'KHOÁ THÔNG MINH GEM - F500',
                'brand' => 'Gem Smart Lock',
                'category' => 'Khoá thông minh',
                'price' => 7500000,
                'description' => 'Khoá thông minh với cảm biến vân tay nhanh chóng, thiết kế hiện đại và sang trọng.',
                'image' => 'products/f500.jpg',
                'images' => json_encode([
                    'products/f500-1.jpg',
                    'products/f500-2.jpg',
                ]),
                'features' => json_encode([
                    'Cảm biến vân tay nhanh 0.3s',
                    'Mã PIN 6-12 số',
                    'Chìa cơ dự phòng',
                    'Báo động chống đột nhập',
                ]),
                'specs' => json_encode([
                    'Chất liệu' => 'Hợp kim nhôm',
                    'Mặt khóa' => 'Kính cường lực',
                    'Nguồn' => 'Pin AA x 4',
                    'Độ dày cửa' => '35 - 80 mm',
                ]),
                'is_active' => true,
                'order' => 2,
            ],
            [
                'slug' => 'khoa-thong-minh-samsung-shp-p50',
                'name' => 'KHOÁ THÔNG MINH SAMSUNG - SHP-P50',
                'brand' => 'Samsung',
                'category' => 'Khoá thông minh',
                'price' => 12500000,
                'description' => 'Khoá thông minh cao cấp của Samsung với công nghệ Wi-Fi tích hợp và điều khiển từ xa.',
                'image' => 'products/samsung-p50.jpg',
                'images' => json_encode([
                    'products/samsung-p50-1.jpg',
                ]),
                'features' => json_encode([
                    'Kết nối Wi-Fi',
                    'Điều khiển từ xa qua app',
                    'Thông báo đẩy real-time',
                    'Chia sẻ quyền truy cập',
                ]),
                'specs' => json_encode([
                    'Chất liệu' => 'Hợp kim nhôm + ABS',
                    'Mặt khóa' => 'Kính cường lực',
                    'Nguồn' => 'Pin AA x 4',
                    'Kết nối' => 'Wi-Fi 2.4GHz',
                ]),
                'is_active' => true,
                'order' => 3,
            ],
            [
                'slug' => 'khoa-thong-minh-phips-7300',
                'name' => 'KHOÁ THÔNG MINH PHILIPS - 7300',
                'brand' => 'Philips',
                'category' => 'Khoá thông minh',
                'price' => 8900000,
                'description' => 'Khoá thông minh Philips với thiết kế sang trọng, đèn LED tự động và nhiều phương thức mở khóa.',
                'image' => 'products/philips-7300.jpg',
                'images' => json_encode([
                    'products/philips-7300-1.jpg',
                ]),
                'features' => json_encode([
                    'Đèn LED tự động',
                    'Vân tay 360°',
                    'Thẻ NFC',
                    'Mã PIN',
                    'Chìa cơ',
                ]),
                'specs' => json_encode([
                    'Chất liệu' => 'Hợp kim kẽm',
                    'Mặt khóa' => 'Kính cường lực',
                    'Nguồn' => 'Pin AA x 4',
                    'Bảo hành' => '2 năm',
                ]),
                'is_active' => true,
                'order' => 4,
            ],
            [
                'slug' => 'khoa-thong-minh-yale-assure',
                'name' => 'KHOÁ THÔNG MINH YALE - ASSURE',
                'brand' => 'Yale',
                'category' => 'Khoá thông minh',
                'price' => 10500000,
                'description' => 'Khoá thông minh Yale với thiết kế châu Âu, tích hợp Alexa và Google Assistant.',
                'image' => 'products/yale-assure.jpg',
                'images' => json_encode([
                    'products/yale-assure-1.jpg',
                ]),
                'features' => json_encode([
                    'Tích hợp Alexa, Google Assistant',
                    'Vân tay',
                    'Mã PIN',
                    'Thẻ từ',
                    'App Yale Access',
                ]),
                'specs' => json_encode([
                    'Chất liệu' => 'Hợp kim nhôm',
                    'Kết nối' => 'Bluetooth + Wi-Fi',
                    'Nguồn' => 'Pin AA x 4',
                ]),
                'is_active' => true,
                'order' => 5,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
