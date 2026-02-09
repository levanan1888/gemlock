<?php

namespace App\Services;

use App\Models\ContentItem;
use App\Models\PageContent;

class Home1ContentService
{
    public static function getSections(string $pageType = 'perfect_house'): array
    {
        // Ưu tiên sử dụng ContentItem từ database
        $head = ContentItem::get("{$pageType}_head", null, $pageType);
        $main = ContentItem::get("{$pageType}_main", null, $pageType);
        $footer = ContentItem::get("{$pageType}_footer", null, $pageType);

        // Nếu chưa có trong ContentItem, thử lấy từ PageContent
        if (! $head || ! $main || ! $footer) {
            $sections = PageContent::getSections($pageType);
            $head = $head ?? $sections['head'] ?? '';
            $main = $main ?? $sections['main'] ?? '';
            $footer = $footer ?? $sections['footer'] ?? '';
        }

        // Fallback to file if database is empty
        if (empty($head) && empty($main) && empty($footer)) {
            $path = base_path('home1.html');
            if (is_file($path)) {
                $html = file_get_contents($path);
                $lines = preg_split('/\r\n|\r|\n/', $html);

                $head = implode("\n", array_slice($lines, 0, 318));
                $main = implode("\n", array_slice($lines, 318, 482));
                $footer = implode("\n", array_slice($lines, 800, 127));
            }
        }

        return [
            'head' => $head ?? '',
            'main' => $main ?? '',
            'footer' => $footer ?? '',
        ];
    }
}
