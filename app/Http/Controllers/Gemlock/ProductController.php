<?php

namespace App\Http\Controllers\Gemlock;

use App\Http\Controllers\Controller;
use App\Services\ProductService;

class ProductController extends Controller
{
    public function index()
    {
        $products = ProductService::getAllProducts();

        return view('gemlock.product.list', compact('products'));
    }

    public function show(string $slug = 'n81b')
    {
        $product = ProductService::getProductBySlug($slug);
        $relatedProducts = ProductService::getAllProducts();

        return view('gemlock.product.detail', compact('product', 'relatedProducts'));
    }
}

