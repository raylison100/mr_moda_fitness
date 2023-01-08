<?php

namespace App\Services;

use App\Repositories\SpendingRepository;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * UserService
 */
class SpendingService extends AppService
{
    protected RepositoryInterface $repository;

    /**
     * @param SpendingRepository $repository
     */
    public function __construct(
        SpendingRepository $repository,
    ) {
        $this->repository = $repository;
    }
}
