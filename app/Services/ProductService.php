<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    public static function getCategories()
    {
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
}
