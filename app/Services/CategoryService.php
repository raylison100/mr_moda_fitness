<?php

namespace App\Services;

use App\Criterias\FilterByDepartmentId;
use App\Repositories\CategoryRepository;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * UserService
 */
class CategoryService extends AppService
{
    protected RepositoryInterface $repository;

    /**
     * @param CategoryRepository $repository
     */
    public function __construct(
        CategoryRepository $repository,
    ) {
        $this->repository = $repository;
    }

    public function all(int $limit = 20): mixed
    {
        return $this->repository
            ->resetCriteria()
            ->pushCriteria(app(FilterByDepartmentId::class))
            ->paginate($limit);
    }
}
