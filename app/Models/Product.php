<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'slug',
        'name',
        'brand',
        'category',
        'price',
        'description',
        'image',
        'images',
        'features',
        'specs',
        'is_active',
        'order',
    ];

    protected function casts(): array
    {
        return [
            'images' => 'array',
            'features' => 'array',
            'specs' => 'array',
            'is_active' => 'boolean',
            'order' => 'integer',
        ];
    }

    public static function getActiveProducts()
    {
        return self::where('is_active', true)
            ->orderBy('order')
            ->get()
            ->toArray();
    }

    public static function getProductBySlug(string $slug): ?array
    {
        $product = self::where('slug', $slug)->first();
        return $product?->toArray();
    }

    public static function getProductsByCategory(string $categorySlug): array
    {
        return self::where('category', $categorySlug)
            ->where('is_active', true)
            ->orderBy('order')
            ->get()
            ->toArray();
    }
}
