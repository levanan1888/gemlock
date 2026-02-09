<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageContent extends Model
{
    protected $fillable = [
        'page_type',
        'section',
        'content',
        'title',
        'description',
    ];

    protected function casts(): array
    {
        return [];
    }

    public static function getContent(string $pageType, string $section): ?string
    {
        $pageContent = self::where('page_type', $pageType)
            ->where('section', $section)
            ->first();

        return $pageContent?->content;
    }

    public static function getSections(string $pageType): array
    {
        $contents = self::where('page_type', $pageType)->get();

        $sections = [];
        foreach ($contents as $content) {
            $sections[$content->section] = $content->content ?? '';
        }

        return $sections;
    }
}
