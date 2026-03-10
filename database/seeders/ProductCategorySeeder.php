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
                'name' => 'Nhẫn',
                'slug' => 'nhan',
                'is_active' => true,
            ],
            [
                'name' => 'Vòng tay',
                'slug' => 'vong-tay',
                'is_active' => true,
            ],
            [
                'name' => 'Hoa tai',
                'slug' => 'hoa-tai',
                'is_active' => true,
            ],
            [
                'name' => 'Dây chuyền',
                'slug' => 'day-chuyen',
                'is_active' => true,
            ],
            [
                'name' => 'Bông tay',
                'slug' => 'bong-tay',
                'is_active' => true,
            ],
            [
                'name' => 'Phụ kiện',
                'slug' => 'phu-kien',
                'is_active' => true,
            ],
        ];

        foreach ($categories as $category) {
            ProductCategory::create($category);
        }
    }
}
