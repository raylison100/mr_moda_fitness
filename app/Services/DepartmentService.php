<?php

namespace App\Services;

use App\Repositories\DepartmentRepository;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * UserService
 */
class DepartmentService extends AppService
{
    protected RepositoryInterface $repository;

    /**
     * @param DepartmentRepository $repository
     */
    public function __construct(
        DepartmentRepository $repository,
    ) {
        $this->repository = $repository;
    }
}
