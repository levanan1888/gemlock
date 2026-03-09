<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use Illuminate\Database\Seeder;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Tin tức',
                'is_active' => true,
            ],
            [
                'name' => 'Kiến thức',
                'is_active' => true,
            ],
            [
                'name' => 'Hướng dẫn sử dụng',
                'is_active' => true,
            ],
        ];

        foreach ($categories as $data) {
            BlogCategory::updateOrCreate(
                ['name' => $data['name']],
                $data,
            );
        }
    }
}

