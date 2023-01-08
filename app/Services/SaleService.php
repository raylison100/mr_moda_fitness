<?php

namespace App\Services;

use App\Repositories\SaleRepository;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * UserService
 */
class SaleService extends AppService
{
    protected RepositoryInterface $repository;

    /**
     * @param SaleRepository $repository
     */
    public function __construct(
        SaleRepository $repository,
    ) {
        $this->repository = $repository;
    }
}
