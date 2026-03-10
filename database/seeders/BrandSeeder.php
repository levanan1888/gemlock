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
                'is_active' => true,
            ],
            [
                'name' => 'Samsung',
                'is_active' => true,
            ],
            [
                'name' => 'Philips',
                'is_active' => true,
            ],
            [
                'name' => 'Yale',
                'is_active' => true,
            ],
            [
                'name' => 'Schlage',
                'is_active' => true,
            ],
            [
                'name' => 'August',
                'is_active' => true,
            ],
        ];

        foreach ($brands as $brand) {
            Brand::create($brand);
        }
    }
}
