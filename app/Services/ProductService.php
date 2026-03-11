<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    public static function getCategories()
    {
        // Lấy categories từ database
        $dbCategories = \App\Models\ProductCategory::where('is_active', true)
            ->orderBy('order')
            ->get();

        if ($dbCategories->isNotEmpty()) {
            return $dbCategories->map(function ($category) {
                return [
                    'slug' => $category->slug,
                    'name' => $category->name,
                    'icon' => $category->icon ?? 'bi-caret-right-fill',
                    'image' => $category->image,
                    'series' => $category->series,
                    'title' => $category->title,
                    'features' => is_array($category->features) ? $category->features : json_decode($category->features, true),
                ];
            })->toArray();
        }

        // Fallback data nếu không có trong database
        return [
            [
                'slug' => 'biet-thu',
                'name' => 'Giải Pháp Biệt Thự Cao Cấp',
                'icon' => 'villa',
                'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDrumd5Y-qG4yxu3qF_ClpLyRM2oq7AoNKxW4RGpX8R_tcYVy8edwj77vZFd0066K9GvWNHiZM4_zwBVL3erNVs6I_OHX8L59kdLlSrxJwvGe9Ro1BukBdR-pa1pa8EPkJdDXqIlmCBqHA8t3YSuTY6_Y9Op5geBma05dVofVmuf5xqiDPEvA6F06STDZq0Ug8a45F1BHhZ48TfwB47yvHaFJGHWCeS7b90stqLcGsrY5wjBic4FE1DmVYQs9Cwad34W-UePe3teL-E',
                'series' => 'Gem Villa Series',
                'title' => 'An Ninh Đa Lớp',
                'features' => [
                    ['icon' => 'verified_user', 'text' => 'Nhận diện khuôn mặt 3D'],
                    ['icon' => 'fingerprint', 'text' => 'Cảm biến vân tay FPC Thụy Điển'],
                    ['icon' => 'notifications_active', 'text' => 'Cảnh báo đột nhập thời gian thực'],
                ],
            ],
            [
                'slug' => 'can-ho',
                'name' => 'Giải Pháp Căn Hộ Hiện Đại',
                'icon' => 'apartment',
                'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuA7Gfwy4xK5Z0iu0pM9uNQdSpRVb5nMGd-QAEztuWY0IYfncPxhm0sq8-Zfq6fVHNQcgxUHsP6qML90UxgfnOnqEXm9ygx__mtOfIEznzLdFul4FEWvq7osDTyi3_qYMmuW_UuIl2_QrriyEMpPnYMH9aE-tD9BhP9u1Yn1RD6dYKXUsXYKtKqyDBWWadyBaPYKRJkxTIu9WlKotvtg0QoCOGaQe5Od7dgoQVhd--2ix04v0fiEq1eRlC3dGk2SarHnad9zhaEKxwA-',
                'series' => 'Gem Smart Home',
                'title' => 'Kết Nối Thông Minh',
                'features' => [
                    ['icon' => 'wifi', 'text' => 'Quản lý từ xa qua App'],
                    ['icon' => 'schedule', 'text' => 'Tạo mã khóa dùng 1 lần'],
                    ['icon' => 'link', 'text' => 'Liên kết hệ sinh thái SmartHome'],
                ],
            ],
            [
                'slug' => 'van-phong',
                'name' => 'Giải Pháp Văn Phòng - Kính',
                'icon' => 'business',
                'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuA-i7o2wSTxNqBK6Vco_3TpP2q4o9SseKwoSyFnyHum_XJh0_8WUJ9UH4vS68hSf4Sl2S7Vse8C_KGD99ef5hoZf6fOWE2AUFEiB9Txyez_VYFDSAkVOjslZYYEOzESdNYwx_QIHUfou_dA7IrMNlSSsoBk0Tjqjdo5cWu1Eq7axFnNeFAuSHGu5oDvTfd4ZV3VxPquJkFPzZ0qJsnET4xiUgWa5pK6MscAG2qpbV4RKQYhu8XRxeG6UaWLpcWfsvbzPspUpySj9GnG',
                'series' => 'Gem Office Security',
                'title' => 'Chuyên Dụng Cửa Kính',
                'features' => [
                    ['icon' => 'install_mobile', 'text' => 'Lắp đặt không cần khoan kính'],
                    ['icon' => 'badge', 'text' => 'Tích hợp chấm công vân tay'],
                    ['icon' => 'group', 'text' => 'Lưu trữ 1000 ID người dùng'],
                ],
            ],
        ];
    }

    public static function getAllProducts()
    {
        return Product::getActiveProducts();
    }

    public static function getProductBySlug($slug)
    {
        $product = Product::getProductBySlug($slug);
        if (!$product) {
            $products = Product::getActiveProducts();
            return $products[0] ?? null;
        }
        return $product;
    }

    public static function getProductsByCategory($categorySlug)
    {
        return Product::getProductsByCategory($categorySlug);
    }

    public static function getProductsGroupedByCategory()
    {
        $categories = self::getCategories();
        $grouped = [];

        foreach ($categories as $category) {
            $categoryProducts = Product::getProductsByCategory($category['slug']);
            $grouped[] = [
                'category' => $category,
                'products' => $categoryProducts,
            ];
        }

        return $grouped;
    }

    /**
     * Lọc sản phẩm theo các tiêu chí
     */
    public static function filterProducts(array $filters = []): array
    {
        $query = Product::query()->where('is_active', true)
            ->with(['image', 'brand', 'category']);

        // Lọc theo danh mục (category)
        if (!empty($filters['categories'])) {
            $query->whereHas('category', function ($q) use ($filters) {
                $q->whereIn('slug', $filters['categories']);
            });
        }

        // Lọc theo khoảng giá
        if (!empty($filters['price_range'])) {
            $query->where(function ($q) use ($filters) {
                foreach ($filters['price_range'] as $range) {
                    $q->orWhere(function ($sub) use ($range) {
                        $sub->whereRaw('COALESCE(sale_price, price) ' . match ($range) {
                            'under_2' => '< 2000000',
                            '2_5' => 'BETWEEN 2000000 AND 5000000',
                            '5_10' => 'BETWEEN 5000000 AND 10000000',
                            'over_10' => '> 10000000',
                        });
                    });
                }
            });
        }

        // Tìm kiếm theo tên
        if (!empty($filters['search'])) {
            $search = $filters['search'];
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Sắp xếp
        $sortBy = $filters['sort'] ?? 'order';
        $sortDir = $filters['direction'] ?? 'asc';

        $validSorts = ['price', 'sale_price', 'name', 'order', 'created_at'];
        if (in_array($sortBy, $validSorts)) {
            $query->orderBy($sortBy, $sortDir);
        } else {
            $query->orderBy('order');
        }

        $products = $query->get();

        return $products->map(function ($product) {
            return self::formatProduct($product);
        })->toArray();
    }

    /**
     * Format product data từ model
     */
    private static function formatProduct($product): array
    {
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
    }
}
