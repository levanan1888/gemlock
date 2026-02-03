<?php

use Illuminate\Support\Facades\Route;

use App\Services\ProductService;

Route::get('/', function () {
    $products = ProductService::getAllProducts();
    return view('home', compact('products'));
});

Route::get('/product', function () {
    $products = ProductService::getAllProducts();
    return view('product', compact('products'));
});

Route::get('/product-detail/{slug?}', function ($slug = 'n81b') {
    $product = ProductService::getProductBySlug($slug);
    $relatedProducts = ProductService::getAllProducts();
    return view('product_detail', compact('product', 'relatedProducts'));
})->name('product.detail');

use App\Http\Controllers\CartController;

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('cart.add');
Route::patch('/update-cart', [CartController::class, 'update'])->name('cart.update');
Route::delete('/remove-from-cart', [CartController::class, 'remove'])->name('cart.remove');
