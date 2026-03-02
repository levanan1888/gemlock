<?php

namespace App\Repositories\Eloquent;

use App\Models\Product;
use App\Repositories\BaseRepository;
use App\Repositories\Contracts\ProductRepositoryInterface;

class EloquentProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    protected string $model = Product::class;
}

