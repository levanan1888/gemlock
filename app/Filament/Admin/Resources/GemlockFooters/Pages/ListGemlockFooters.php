<?php

namespace App\Filament\Admin\Resources\GemlockFooters\Pages;

use App\Filament\Admin\Resources\GemlockFooters\GemlockFooterResource;
use App\Models\ContentItem;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListGemlockFooters extends ListRecords
{
    protected static string $resource = GemlockFooterResource::class;

    private const REQUIRED_KEYS = [
        [
            'key' => 'footer_description_gemlock',
            'label' => 'Mô tả footer',
            'type' => 'text',
            'value' => 'Perfect House Việt Nam - Kết nối tương lai. Chuyên cung cấp giải pháp Smart Home và Năng lượng sạch.',
            'order' => 1,
        ],
        [
            'key' => 'footer_social_title_gemlock',
            'label' => 'Tiêu đề liên kết mạng xã hội',
            'type' => 'text',
            'value' => 'Liên kết mạng xã hội',
            'order' => 2,
        ],
        [
            'key' => 'footer_company_title_gemlock',
            'label' => 'Tiêu đề cột Công ty',
            'type' => 'text',
            'value' => 'Công ty',
            'order' => 3,
        ],
        [
            'key' => 'footer_more_title_gemlock',
            'label' => 'Tiêu đề cột Thêm',
            'type' => 'text',
            'value' => 'Thêm',
            'order' => 4,
        ],
        [
            'key' => 'footer_policy_title_gemlock',
            'label' => 'Tiêu đề cột Chính sách',
            'type' => 'text',
            'value' => 'Chính sách & Pháp lý',
            'order' => 5,
        ],
        [
            'key' => 'footer_logo_gemlock',
            'label' => 'Logo footer',
            'type' => 'image',
            'value' => 'image/Logo Tách Nền.png',
            'order' => 6,
        ],
    ];

    public function mount(): void
    {
        parent::mount();

        foreach (self::REQUIRED_KEYS as $item) {
            ContentItem::updateOrCreate(
                [
                    'page_type' => 'gemlock',
                    'section' => 'footer',
                    'key' => $item['key'],
                ],
                [
                    'label' => $item['label'],
                    'type' => $item['type'],
                    'value' => $item['value'],
                    'order' => $item['order'],
                    'is_active' => true,
                ],
            );
        }
    }

    protected function getHeaderActions(): array
    {
        return [];
    }

    protected function getTableQuery(): Builder
    {
        $allowedKeys = array_column(self::REQUIRED_KEYS, 'key');
        $fieldOrder = implode("', '", $allowedKeys);

        return parent::getTableQuery()
            ->where('page_type', 'gemlock')
            ->where('section', 'footer')
            ->whereIn('key', $allowedKeys)
            ->orderByRaw("FIELD(`key`, '{$fieldOrder}')");
    }
}
