<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        $brands = [
            [
                'name' => 'Gem Smart Lock',
                'slug' => 'gem-smart-lock',
                'is_active' => true,
            ],
            [
                'name' => 'Samsung',
                'slug' => 'samsung',
                'is_active' => true,
            ],
            [
                'name' => 'Philips',
                'slug' => 'philips',
                'is_active' => true,
            ],
            [
                'name' => 'Yale',
                'slug' => 'yale',
                'is_active' => true,
            ],
            [
                'name' => 'Schlage',
                'slug' => 'schlage',
                'is_active' => true,
            ],
            [
                'name' => 'August',
                'slug' => 'august',
                'is_active' => true,
            ],
        ];

        foreach ($brands as $brand) {
            Brand::updateOrCreate(
                ['slug' => $brand['slug']],
                $brand
            );
        }
    }
}
