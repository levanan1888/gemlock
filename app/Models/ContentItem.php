<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContentItem extends Model
{
    protected $fillable = [
        'page_type',
        'section',
        'key',
        'type',
        'label',
        'value',
        'description',
        'order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'order' => 'integer',
        ];
    }

    public static function get(string $key, ?string $default = null, string $pageType = 'perfect_house', ?string $section = null): ?string
    {
        $query = self::where('key', $key)
            ->where('page_type', $pageType)
            ->where('is_active', true);

        if ($section) {
            $query->where('section', $section);
        }

        $item = $query->first();

        return $item?->value ?? $default;
    }

    public static function getBySection(string $pageType, string $section): array
    {
        return self::where('page_type', $pageType)
            ->where('section', $section)
            ->where('is_active', true)
            ->orderBy('order')
            ->get()
            ->mapWithKeys(function ($item) {
                return [$item->key => $item->value];
            })
            ->toArray();
    }

    public static function getAllByPage(string $pageType): array
    {
        return self::where('page_type', $pageType)
            ->where('is_active', true)
            ->orderBy('section')
            ->orderBy('order')
            ->get()
            ->groupBy('section')
            ->map(function ($items) {
                return $items->mapWithKeys(function ($item) {
                    return [$item->key => $item->value];
                })->toArray();
            })
            ->toArray();
    }
}
