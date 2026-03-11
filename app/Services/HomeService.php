<?php

namespace App\Services;

class HomeService
{
    public function __construct(private readonly BlogService $blogService)
    {
    }

    public function getHomeData(): array
    {
        return [
            'products' => ProductService::getAllProducts(),
            'groupedProducts' => ProductService::getProductsGroupedByCategory(),
            'latestNews' => $this->blogService->getLatestNews(),
        ];
    }
}
