<?php

use App\Services\ProductService;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->file(base_path('home1.html'));
});

Route::get('/gemlock', function () {
    $products = ProductService::getAllProducts();
    $groupedProducts = ProductService::getProductsGroupedByCategory();

    return view('home', compact('products', 'groupedProducts'));
});

// Trang Gemlock Home mới (kết hợp từ home1.html và home2.html)
Route::get('/home-gemlock', function () {
    $products = ProductService::getAllProducts();
    $groupedProducts = ProductService::getProductsGroupedByCategory();

    return view('home_gemlock', compact('products', 'groupedProducts'));
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
Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::post('/checkout', [CartController::class, 'processCheckout'])->name('cart.checkout.process');
