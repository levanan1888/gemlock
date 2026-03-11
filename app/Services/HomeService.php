<?php

namespace App\Services;

class HomeService
{
    public function __construct(
        private readonly BlogService $blogService,
        private readonly ProductService $productService
    ) {
    }

    public function getHomeData(): array
    {
        return [
            'products' => $this->productService->getAllProducts(),
            'groupedProducts' => $this->productService->getProductsGroupedByCategory(),
            'latestNews' => $this->blogService->getLatestNews(),
        ];
    }
}
