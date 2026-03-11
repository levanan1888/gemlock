<?php

namespace App\Http\Controllers\Gemlock;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Services\ProductService;

class ProductController extends Controller
{
    public function __construct(private readonly ProductService $productService)
    {
    }

    public function index()
    {
        $categories = ProductCategory::where('is_active', true)
            ->withCount('products')
            ->get();
        $allProducts = $this->productService->getAllProducts();

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
            $products = $this->productService->filterProducts($filters);
        } else {
            $products = $allProducts;
        }

        return view('gemlock.product.list', compact('products', 'categories', 'allProducts'));
    }

    public function show(string $slug = 'n81b')
    {
        $product = $this->productService->getProductBySlug($slug);
        $relatedProducts = $this->productService->getAllProducts();

        return view('gemlock.product.detail', compact('product', 'relatedProducts'));
    }
}

