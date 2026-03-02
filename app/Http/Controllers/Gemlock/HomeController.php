<?php

namespace App\Http\Controllers\Gemlock;

use App\Http\Controllers\Controller;
use App\Services\ProductService;

class HomeController extends Controller
{
    public function index()
    {
        $products = ProductService::getAllProducts();
        $groupedProducts = ProductService::getProductsGroupedByCategory();

        return view('gemlock.home', compact('products', 'groupedProducts'));
    }
}

