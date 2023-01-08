<?php

namespace App\Services;

use App\Repositories\SubCategoryRepository;
use Prettus\Repository\Contracts\RepositoryInterface;

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
}
