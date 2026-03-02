<?php

namespace App\Services;

use App\Repositories\Contracts\BaseRepositoryInterface;

/**
 * BaseService: lớp cơ sở cho các service sử dụng repository.
 *
 * Service con chỉ cần kế thừa và truyền repository cụ thể qua constructor.
 */
abstract class BaseService
{
    public function __construct(
        protected BaseRepositoryInterface $repository,
    ) {
    }
}

