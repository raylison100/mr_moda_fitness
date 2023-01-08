<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * UserService
 */
class ProductService extends AppService
{
    protected RepositoryInterface $repository;

    /**
     * @param ProductRepository $repository
     */
    public function __construct(
        ProductRepository $repository,
    ) {
        $this->repository = $repository;
    }
}
