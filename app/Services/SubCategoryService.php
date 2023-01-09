<?php

namespace App\Services;

use App\Criterias\FilterByCategoryId;
use App\Repositories\SubCategoryRepository;
use Prettus\Repository\Contracts\RepositoryInterface;
use Prettus\Repository\Exceptions\RepositoryException;

/**
 * UserService
 */
class SubCategoryService extends AppService
{
    protected RepositoryInterface $repository;

    /**
     * @param SubCategoryRepository $repository
     */
    public function __construct(
        SubCategoryRepository $repository,
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
            ->pushCriteria(app(FilterByCategoryId::class))
            ->paginate($limit);
    }
}
