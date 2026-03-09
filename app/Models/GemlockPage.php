<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class GemlockPage extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'noindex',
        'excerpt',
        'content',
        'custom_js',
        'banner',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'noindex' => 'boolean',
            'is_active' => 'boolean',
        ];
    }

    protected static function booted(): void
    {
        static::saving(function (GemlockPage $page) {
            if (blank($page->slug) && filled($page->title)) {
                $page->slug = Str::slug($page->title);
            }
        });
    }
}
