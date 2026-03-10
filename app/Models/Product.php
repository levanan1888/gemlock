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

    public static function getActiveProducts(): array
    {
        return self::where('is_active', true)
            ->orderBy('order')
            ->get()
            ->map(function ($product) {
                $featuresRaw = is_array($product->features) ? $product->features : json_decode($product->features, true);
                $features = [];
                if (is_array($featuresRaw)) {
                    foreach ($featuresRaw as $title => $desc) {
                        $features[] = [
                            'title' => $title,
                            'desc' => $desc,
                        ];
                    }
                }

                $specsRaw = is_array($product->specs) ? $product->specs : json_decode($product->specs, true);
                $specs = [];
                if (is_array($specsRaw)) {
                    foreach ($specsRaw as $label => $value) {
                        $specs[$label] = $value;
                    }
                }

                return [
                    'slug' => $product->slug,
                    'name' => $product->name,
                    'brand' => $product->brand,
                    'category' => $product->category,
                    'price' => $product->price,
                    'description' => $product->description,
                    'image' => $product->image,
                    'images' => is_array($product->images) ? $product->images : json_decode($product->images, true),
                    'features' => $features,
                    'specs' => $specs,
                    'is_active' => $product->is_active,
                    'order' => $product->order,
                ];
            })
            ->toArray();
    }

    public static function getProductBySlug(string $slug): ?array
    {
        $product = self::where('slug', $slug)->first();
        if (!$product) {
            return null;
        }

        $featuresRaw = is_array($product->features) ? $product->features : json_decode($product->features, true);
        $features = [];
        if (is_array($featuresRaw)) {
            foreach ($featuresRaw as $title => $desc) {
                $features[] = [
                    'title' => $title,
                    'desc' => $desc,
                ];
            }
        }

        $specsRaw = is_array($product->specs) ? $product->specs : json_decode($product->specs, true);
        $specs = [];
        if (is_array($specsRaw)) {
            foreach ($specsRaw as $label => $value) {
                $specs[$label] = $value;
            }
        }

        return [
            'slug' => $product->slug,
            'name' => $product->name,
            'brand' => $product->brand,
            'category' => $product->category,
            'price' => $product->price,
            'description' => $product->description,
            'image' => $product->image,
            'images' => is_array($product->images) ? $product->images : json_decode($product->images, true),
            'features' => $features,
            'specs' => $specs,
            'is_active' => $product->is_active,
            'order' => $product->order,
        ];
    }

    public static function getProductsByCategory(string $categorySlug): array
    {
        return self::where('category', $categorySlug)
            ->where('is_active', true)
            ->orderBy('order')
            ->get()
            ->map(function ($product) {
                return [
                    'slug' => $product->slug,
                    'name' => $product->name,
                    'brand' => $product->brand,
                    'category' => $product->category,
                    'price' => $product->price,
                    'description' => $product->description,
                    'image' => $product->image,
                    'images' => is_array($product->images) ? $product->images : json_decode($product->images, true),
                    'features' => is_array($product->features) ? $product->features : json_decode($product->features, true),
                    'specs' => is_array($product->specs) ? $product->specs : json_decode($product->specs, true),
                    'is_active' => $product->is_active,
                    'order' => $product->order,
                ];
            })
            ->toArray();
    }
}
