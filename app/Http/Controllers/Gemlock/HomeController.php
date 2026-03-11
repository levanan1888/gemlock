<?php

namespace App\Http\Controllers\Gemlock;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Services\ProductService;

class HomeController extends Controller
{
    public function index()
    {
        $products = ProductService::getAllProducts();
        $groupedProducts = ProductService::getProductsGroupedByCategory();

        // Lấy 3 tin tức mới nhất
        $latestNews = Blog::query()
            ->published()
            ->with(['thumbnailMedia', 'category'])
            ->orderByDesc('published_at')
            ->limit(3)
            ->get();

        return view('gemlock.home', compact('products', 'groupedProducts', 'latestNews'));
    }
}

