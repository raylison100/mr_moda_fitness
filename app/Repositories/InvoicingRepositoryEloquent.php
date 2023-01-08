<?php

namespace App\Repositories;

use App\Entities\Invoicing;
use App\Presenters\InvoicingPresenter;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class InvoicingRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class InvoicingRepositoryEloquent extends BaseRepository implements InvoicingRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return Invoicing::class;
    }

    /**
     * @return string
     */
    public function presenter(): string
    {
        return InvoicingPresenter::class;
    }
}
