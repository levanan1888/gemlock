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

        if (! $value) {
            return $default ? asset($default) : '';
        }

        if (str_starts_with($value, 'http://') || str_starts_with($value, 'https://')) {
            return $value;
        }

        if (str_starts_with($value, 'image/') || str_starts_with($value, 'storage/')) {
            return asset($value);
        }

        return asset('storage/' . ltrim($value, '/'));
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
