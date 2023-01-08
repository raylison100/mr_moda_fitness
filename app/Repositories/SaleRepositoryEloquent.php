<?php

namespace App\Repositories;

use App\Entities\Sale;
use App\Presenters\SalesPresenter;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class SalesRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class SaleRepositoryEloquent extends BaseRepository implements SaleRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return Sale::class;
    }

    /**
     * @return string
     */
    public function presenter(): string
    {
        return SalesPresenter::class;
    }
}
