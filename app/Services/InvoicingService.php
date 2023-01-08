<?php

namespace App\Services;

use App\Repositories\InvoicingRepository;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * UserService
 */
class InvoicingService extends AppService
{
    protected RepositoryInterface $repository;

    /**
     * @param InvoicingRepository $repository
     */
    public function __construct(
        InvoicingRepository $repository,
    ) {
        $this->repository = $repository;
    }
}
