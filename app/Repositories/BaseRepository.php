<?php

namespace App\Repositories;

use App\Repositories\Contracts\BaseRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * BaseRepository: lớp cơ sở cho các repository Eloquent.
 *
 * Repository cụ thể chỉ cần kế thừa lớp này và gán $model cho đúng class Eloquent.
 */
abstract class BaseRepository implements BaseRepositoryInterface
{
    /**
     * @var class-string<Model>
     */
    protected string $model;

    public function __construct()
    {
        if (! isset($this->model)) {
            throw new \LogicException(static::class . ' phải khai báo thuộc tính $model.');
        }
    }

    protected function newQuery()
    {
        /** @var Model $model */
        $model = new $this->model;

        return $model->newQuery();
    }

    public function all(array $columns = ['*']): Collection
    {
        return $this->newQuery()->get($columns);
    }

    public function paginate(int $perPage = 15, array $columns = ['*']): LengthAwarePaginator
    {
        return $this->newQuery()->paginate($perPage, $columns);
    }

    public function find(mixed $id, array $columns = ['*']): ?Model
    {
        return $this->newQuery()->select($columns)->find($id);
    }

    public function create(array $attributes): Model
    {
        return $this->newQuery()->create($attributes);
    }

    public function update(mixed $id, array $attributes): bool
    {
        $model = $this->find($id);

        if (! $model) {
            return false;
        }

        return $model->update($attributes);
    }

    public function delete(mixed $id): bool
    {
        $model = $this->find($id);

        if (! $model) {
            return false;
        }

        return (bool) $model->delete();
    }
}

