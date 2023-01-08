<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * UserService
 */
class UserService extends AppService
{
    protected RepositoryInterface $repository;

    /**
     * @param UserRepository $repository
     */
    public function __construct(
        UserRepository $repository,
    ) {
        $this->repository = $repository;
    }
}
