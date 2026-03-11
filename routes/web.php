<?php

use App\Models\ContentItem;
use App\Services\Home1ContentService;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Gemlock\HomeController;
use App\Http\Controllers\Gemlock\AboutController;
use App\Http\Controllers\Gemlock\BlogController;
use App\Http\Controllers\Gemlock\ProductController;
use App\Http\Controllers\Gemlock\ContactController;

Route::get('/', function () {
    $sections = Home1ContentService::getSections('perfect_house');
    $homeContent = ContentItem::getAllByPage('perfect_house')['home'] ?? [];

    return view('home1', [
        'head' => $sections['head'],
        'home1PageContent' => $sections['main'],
        'footer' => $sections['footer'],
        'homeContent' => $homeContent,
    ]);
});

// Gemlock - prefix /gemlock
Route::prefix('gemlock')->group(function () {
    Route::get('/', [HomeController::class, 'index']);

    Route::get('/about', [AboutController::class, 'index']);

    Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
    Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::get('/product-detail/{slug?}', [ProductController::class, 'show'])->name('product.detail');

    Route::get('/contact', [ContactController::class, 'index'])->name('gemlock.contact');
    Route::post('/contact', [ContactController::class, 'submit'])->name('gemlock.contact.submit');
});

Route::get('/gemsolar', function () {
    $products = ProductService::getAllProducts();
    $groupedProducts = ProductService::getProductsGroupedByCategory();

    return view('home', compact('products', 'groupedProducts'));
});

Route::get('/home-gemlock', function () {
    $products = ProductService::getAllProducts();
    $groupedProducts = ProductService::getProductsGroupedByCategory();

    return view('home', compact('products', 'groupedProducts'));
});

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('cart.add');
Route::patch('/update-cart', [CartController::class, 'update'])->name('cart.update');
Route::delete('/remove-from-cart', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::post('/checkout', [CartController::class, 'processCheckout'])->name('cart.checkout.process');
