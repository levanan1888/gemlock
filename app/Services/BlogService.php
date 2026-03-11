<?php

namespace App\Services;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Collection;

class BlogService
{
    public function getLatestNews(int $limit = 3): Collection
    {
        return Blog::query()
            ->published()
            ->with(['thumbnailMedia', 'category'])
            ->orderByDesc('published_at')
            ->limit($limit)
            ->get();
    }
}
