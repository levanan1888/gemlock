<?php

namespace App\Repositories\Contracts;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface BaseRepositoryInterface
{
    public function all(array $columns = ['*']): Collection;

    public function paginate(int $perPage = 15, array $columns = ['*']): LengthAwarePaginator;

    public function find(mixed $id, array $columns = ['*']): ?Model;

    public function create(array $attributes): Model;

    public function update(mixed $id, array $attributes): bool;

    public function delete(mixed $id): bool;
}

