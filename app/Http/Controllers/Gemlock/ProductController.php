<?php

namespace App\Http\Controllers\Gemlock;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Services\ProductService;

class ProductController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::where('is_active', true)
            ->withCount('products')
            ->get();
        $allProducts = ProductService::getAllProducts();

        // Get filter params
        $filters = [
            'categories' => request()->input('categories', []),
            'price_range' => request()->input('price_range', []),
            'search' => request()->input('search', ''),
            'sort' => request()->input('sort', 'order'),
            'direction' => request()->input('direction', 'asc'),
        ];

        // Filter products
        if (!empty($filters['categories']) || !empty($filters['price_range']) || !empty($filters['search'])) {
            $products = ProductService::filterProducts($filters);
        } else {
            $products = $allProducts;
        }

        return view('gemlock.product.list', compact('products', 'categories', 'allProducts'));
    }

    public function show(string $slug = 'n81b')
    {
        $product = ProductService::getProductBySlug($slug);
        $relatedProducts = ProductService::getAllProducts();

        return view('gemlock.product.detail', compact('product', 'relatedProducts'));
    }
}

