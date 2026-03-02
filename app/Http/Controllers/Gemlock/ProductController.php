<?php

namespace App\Http\Controllers\Gemlock;

use App\Http\Controllers\Controller;
use App\Services\ProductService;

class ProductController extends Controller
{
    public function index()
    {
        // Hiện tại vẫn dùng ProductService tĩnh như cũ
        $products = ProductService::getAllProducts();

        return view('gemlock.product', compact('products'));
    }

    public function show(string $slug = 'n81b')
    {
        $product = ProductService::getProductBySlug($slug);
        $relatedProducts = ProductService::getAllProducts();

        return view('gemlock.product_detail', compact('product', 'relatedProducts'));
    }
}

