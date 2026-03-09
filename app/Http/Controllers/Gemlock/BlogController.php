<?php

namespace App\Http\Controllers\Gemlock;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $q = trim((string) $request->query('q', ''));
        $category = (string) $request->query('category', '');
        $sort = (string) $request->query('sort', 'newest');

        $query = Blog::query()
            ->published()
            ->when($q !== '', function (Builder $builder) use ($q) {
                $builder->where(function (Builder $subQuery) use ($q) {
                    $subQuery
                        ->where('title', 'like', "%{$q}%")
                        ->orWhere('excerpt', 'like', "%{$q}%")
                        ->orWhere('content', 'like', "%{$q}%");
                });
            })
            ->when($category !== '', function (Builder $builder) use ($category) {
                $builder->where('category', $category);
            });

        if ($sort === 'oldest') {
            $query->orderBy('published_at')->orderBy('id');
        } else {
            $query->orderByDesc('published_at')->orderByDesc('id');
        }

        $posts = $query
            ->with('thumbnailMedia')
            ->paginate(6)
            ->withQueryString();

        $categories = Blog::query()
            ->published()
            ->whereNotNull('category')
            ->where('category', '!=', '')
            ->distinct()
            ->orderBy('category')
            ->pluck('category');

        return view('gemlock.blog.index', compact('posts', 'categories', 'q', 'category', 'sort'));
    }

    public function show(string $slug)
    {
        $post = Blog::query()
            ->published()
            ->with('thumbnailMedia')
            ->where('slug', $slug)
            ->firstOrFail();

        $popularPosts = Blog::query()
            ->published()
            ->with('thumbnailMedia')
            ->whereKeyNot($post->id)
            ->orderByDesc('is_featured')
            ->orderByDesc('published_at')
            ->limit(3)
            ->get(['title', 'slug', 'thumbnail', 'published_at']);

        return view('gemlock.blog.detail', compact('post', 'popularPosts'));
    }
}
