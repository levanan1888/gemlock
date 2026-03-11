<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Giải Pháp Biệt Thự Cao Cấp',
                'slug' => 'biet-thu',
                'icon' => 'villa',
                'image' => '',
                'series' => 'Gem Villa Series',
                'title' => 'An Ninh Đa Lớp',
                'features' => [
                    ['icon' => 'verified_user', 'text' => 'Nhận diện khuôn mặt 3D'],
                    ['icon' => 'fingerprint', 'text' => 'Cảm biến vân tay FPC Thụy Điển'],
                    ['icon' => 'notifications_active', 'text' => 'Cảnh báo đột nhập thời gian thực'],
                ],
                'is_active' => true,
                'order' => 1,
            ],
            [
                'name' => 'Giải Pháp Căn Hộ Hiện Đại',
                'slug' => 'can-ho',
                'icon' => 'apartment',
                'image' => '',
                'series' => 'Gem Smart Home',
                'title' => 'Kết Nối Thông Minh',
                'features' => [
                    ['icon' => 'wifi', 'text' => 'Quản lý từ xa qua App'],
                    ['icon' => 'schedule', 'text' => 'Tạo mã khóa dùng 1 lần'],
                    ['icon' => 'link', 'text' => 'Liên kết hệ sinh thái SmartHome'],
                ],
                'is_active' => true,
                'order' => 2,
            ],
            [
                'name' => 'Giải Pháp Văn Phòng - Kính',
                'slug' => 'van-phong',
                'icon' => 'business',
                'image' => '',
                'series' => 'Gem Office Security',
                'title' => 'Chuyên Dụng Cửa Kính',
                'features' => [
                    ['icon' => 'install_mobile', 'text' => 'Lắp đặt không cần khoan kính'],
                    ['icon' => 'badge', 'text' => 'Tích hợp chấm công vân tay'],
                    ['icon' => 'group', 'text' => 'Lưu trữ 1000 ID người dùng'],
                ],
                'is_active' => true,
                'order' => 3,
            ],
        ];

        foreach ($categories as $category) {
            ProductCategory::updateOrCreate(
                ['slug' => $category['slug']],
                $category
            );
        }
    }
}
