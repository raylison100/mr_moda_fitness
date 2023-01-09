<?php

namespace App\Services;

use App\Criterias\FilterByDepartmentId;
use App\Repositories\CategoryRepository;
use Prettus\Repository\Contracts\RepositoryInterface;
use Prettus\Repository\Exceptions\RepositoryException;

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

    /**
     * @throws RepositoryException
     */
    public function all(int $limit = 20): mixed
    {
        return $this->repository
            ->resetCriteria()
            ->pushCriteria(app(FilterByDepartmentId::class))
            ->paginate($limit);
    }
}
