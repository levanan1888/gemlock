<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{

    protected $fillable = [
        'slug',
        'name',
        'brand_id',
        'category_id',
        'price',
        'sale_price',
        'description',
        'image_id',
        'gallery_image',
        'features',
        'specs',
        'is_active',
        'order',
    ];

    protected function casts(): array
    {
        return [
            'features' => 'array',
            'specs' => 'array',
            'gallery_image' => 'array',
            'is_active' => 'boolean',
            'order' => 'integer',
        ];
    }

    /**
     * Ảnh đại diện của sản phẩm
     */
    public function image(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Curator::class, 'image_id');
    }

    /**
     * Thương hiệu
     */
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * Danh mục sản phẩm
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public static function getActiveProducts(): array
    {
        return self::where('is_active', true)
            ->with(['image', 'brand', 'category'])
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

                $galleryIds = is_array($product->gallery_image) ? $product->gallery_image : json_decode($product->gallery_image, true);
                $gallery = [];
                if (is_array($galleryIds)) {
                    $galleryImages = \App\Models\Curator::whereIn('id', $galleryIds)->get();
                    $gallery = $galleryImages->pluck('url')->toArray();
                }

                return [
                    'slug' => $product->slug,
                    'name' => $product->name,
                    'brand' => $product->brand?->name,
                    'brand_id' => $product->brand_id,
                    'category' => $product->category?->slug,
                    'category_id' => $product->category_id,
                    'price' => $product->price,
                    'sale_price' => $product->sale_price,
                    'description' => $product->description,
                    'image' => $product->image?->url,
                    'images' => $gallery,
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
        $product = self::where('slug', $slug)
            ->with(['image', 'brand', 'category'])
            ->first();

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

        // Lấy gallery từ curator IDs
        $galleryIds = is_array($product->gallery_image) ? $product->gallery_image : json_decode($product->gallery_image, true);
        $gallery = [];
        if (is_array($galleryIds)) {
            $galleryImages = \App\Models\Curator::whereIn('id', $galleryIds)->get();
            $gallery = $galleryImages->pluck('url')->toArray();
        }

        return [
            'slug' => $product->slug,
            'name' => $product->name,
            'brand' => $product->brand?->name,
            'brand_id' => $product->brand_id,
            'category' => $product->category?->slug,
            'category_id' => $product->category_id,
            'price' => $product->price,
            'sale_price' => $product->sale_price,
            'description' => $product->description,
            'image' => $product->image?->url,
            'images' => $gallery,
            'features' => $features,
            'specs' => $specs,
            'is_active' => $product->is_active,
            'order' => $product->order,
        ];
    }

    public static function getProductsByCategory(string $categorySlug): array
    {
        return self::whereHas('category', function ($query) use ($categorySlug) {
                $query->where('slug', $categorySlug);
            })
            ->where('is_active', true)
            ->with(['image', 'brand', 'category'])
            ->orderBy('order')
            ->get()
            ->map(function ($product) {
                // Lấy gallery từ curator IDs
                $galleryIds = is_array($product->gallery_image) ? $product->gallery_image : json_decode($product->gallery_image, true);
                $gallery = [];
                if (is_array($galleryIds)) {
                    $galleryImages = \App\Models\Curator::whereIn('id', $galleryIds)->get();
                    $gallery = $galleryImages->pluck('url')->toArray();
                }

                return [
                    'slug' => $product->slug,
                    'name' => $product->name,
                    'brand' => $product->brand?->name,
                    'brand_id' => $product->brand_id,
                    'category' => $product->category?->slug,
                    'category_id' => $product->category_id,
                    'price' => $product->price,
                    'sale_price' => $product->sale_price,
                    'description' => $product->description,
                    'image' => $product->image?->url,
                    'images' => $gallery,
                    'features' => is_array($product->features) ? $product->features : json_decode($product->features, true),
                    'specs' => is_array($product->specs) ? $product->specs : json_decode($product->specs, true),
                    'is_active' => $product->is_active,
                    'order' => $product->order,
                ];
            })
            ->toArray();
    }
}
