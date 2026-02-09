<?php

namespace Database\Seeders;

use App\Models\MenuItem;
use Illuminate\Database\Seeder;

class MenuItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Perfect House Header Menu
        $perfectHouseHeaderMenus = [
            ['label' => 'Trang chủ', 'url' => '/', 'icon' => 'home', 'order' => 1],
            ['label' => 'Sản phẩm', 'url' => '/product', 'icon' => 'shopping_bag', 'order' => 2],
            ['label' => 'Tin tức sự kiện', 'url' => '/blog', 'icon' => 'article', 'order' => 3],
            ['label' => 'Liên hệ với chúng tôi', 'url' => '/contact', 'icon' => 'contact_mail', 'order' => 4],
        ];

        foreach ($perfectHouseHeaderMenus as $menu) {
            MenuItem::updateOrCreate(
                [
                    'page_type' => 'perfect_house',
                    'menu_type' => 'header',
                    'label' => $menu['label'],
                ],
                array_merge($menu, [
                    'page_type' => 'perfect_house',
                    'menu_type' => 'header',
                    'is_active' => true,
                    'open_in_new_tab' => false,
                ])
            );
        }

        // Perfect House Footer Menu
        $perfectHouseFooterMenus = [
            ['label' => 'Công ty', 'url' => '#', 'icon' => null, 'order' => 1, 'children' => [
                ['label' => 'Trang chủ', 'url' => '/', 'order' => 1],
                ['label' => 'Giới thiệu', 'url' => '/about', 'order' => 2],
                ['label' => 'Tin tức', 'url' => '/blog', 'order' => 3],
            ]],
            ['label' => 'Thêm', 'url' => '#', 'icon' => null, 'order' => 2, 'children' => [
                ['label' => 'Cảm nhận', 'url' => '/testimonial', 'order' => 1],
                ['label' => 'Liên hệ', 'url' => '/contact', 'order' => 2],
                ['label' => 'Giấy phép', 'url' => '/license', 'order' => 3],
            ]],
            ['label' => 'Chính sách & Pháp lý', 'url' => '#', 'icon' => null, 'order' => 3, 'children' => [
                ['label' => 'Chính sách bảo mật', 'url' => '/privacy-policy', 'order' => 1],
                ['label' => 'Điều khoản sử dụng', 'url' => '/terms-conditions', 'order' => 2],
            ]],
        ];

        foreach ($perfectHouseFooterMenus as $parentMenu) {
            $children = $parentMenu['children'] ?? [];
            unset($parentMenu['children']);

            $parent = MenuItem::updateOrCreate(
                [
                    'page_type' => 'perfect_house',
                    'menu_type' => 'footer',
                    'label' => $parentMenu['label'],
                ],
                array_merge($parentMenu, [
                    'page_type' => 'perfect_house',
                    'menu_type' => 'footer',
                    'is_active' => true,
                    'open_in_new_tab' => false,
                ])
            );

            foreach ($children as $child) {
                MenuItem::updateOrCreate(
                    [
                        'page_type' => 'perfect_house',
                        'menu_type' => 'footer',
                        'label' => $child['label'],
                        'parent_id' => $parent->id,
                    ],
                    array_merge($child, [
                        'page_type' => 'perfect_house',
                        'menu_type' => 'footer',
                        'parent_id' => $parent->id,
                        'is_active' => true,
                        'open_in_new_tab' => false,
                    ])
                );
            }
        }

        // Gemlock Header Menu (tương tự Perfect House)
        foreach ($perfectHouseHeaderMenus as $menu) {
            MenuItem::updateOrCreate(
                [
                    'page_type' => 'gemlock',
                    'menu_type' => 'header',
                    'label' => $menu['label'],
                ],
                array_merge($menu, [
                    'page_type' => 'gemlock',
                    'menu_type' => 'header',
                    'is_active' => true,
                    'open_in_new_tab' => false,
                ])
            );
        }

        // Gemlock Footer Menu (tương tự Perfect House)
        foreach ($perfectHouseFooterMenus as $parentMenu) {
            $children = $parentMenu['children'] ?? [];
            unset($parentMenu['children']);

            $parent = MenuItem::updateOrCreate(
                [
                    'page_type' => 'gemlock',
                    'menu_type' => 'footer',
                    'label' => $parentMenu['label'],
                ],
                array_merge($parentMenu, [
                    'page_type' => 'gemlock',
                    'menu_type' => 'footer',
                    'is_active' => true,
                    'open_in_new_tab' => false,
                ])
            );

            foreach ($children as $child) {
                MenuItem::updateOrCreate(
                    [
                        'page_type' => 'gemlock',
                        'menu_type' => 'footer',
                        'label' => $child['label'],
                        'parent_id' => $parent->id,
                    ],
                    array_merge($child, [
                        'page_type' => 'gemlock',
                        'menu_type' => 'footer',
                        'parent_id' => $parent->id,
                        'is_active' => true,
                        'open_in_new_tab' => false,
                    ])
                );
            }
        }

        $this->command->info('Menu items seeded successfully!');
    }
}
