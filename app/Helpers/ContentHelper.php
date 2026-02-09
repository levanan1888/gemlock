<?php

namespace App\Helpers;

use App\Models\ContentItem;

class ContentHelper
{
    public static function get(string $key, string $default = '', string $pageType = 'perfect_house', ?string $section = null): string
    {
        $query = ContentItem::where('key', $key)
            ->where('page_type', $pageType)
            ->where('is_active', true);

        if ($section) {
            $query->where('section', $section);
        }

        $item = $query->first();

        return $item ? ($item->value ?? $default) : $default;
    }

    public static function image(string $key, string $default = '', string $pageType = 'perfect_house', ?string $section = null): string
    {
        $value = self::get($key, $default, $pageType, $section);

        return $value ? asset($value) : ($default ? asset($default) : '');
    }

    public static function text(string $key, string $default = '', string $pageType = 'perfect_house', ?string $section = null): string
    {
        return self::get($key, $default, $pageType, $section);
    }

    public static function html(string $key, string $default = '', string $pageType = 'perfect_house', ?string $section = null): string
    {
        return self::get($key, $default, $pageType, $section);
    }

    public static function link(string $key, string $default = '#', string $pageType = 'perfect_house', ?string $section = null): string
    {
        return self::get($key, $default, $pageType, $section);
    }

    public static function number(string $key, int|float $default = 0, string $pageType = 'perfect_house', ?string $section = null): int|float
    {
        $value = self::get($key, (string) $default, $pageType, $section);

        return (float) $value;
    }
}
