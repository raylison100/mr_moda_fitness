<?php

namespace App\Repositories;

use App\Entities\Spending;
use App\Presenters\SpendingPresenter;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class SpendingRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class SpendingRepositoryEloquent extends BaseRepository implements SpendingRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return Spending::class;
    }

    /**
     * @return string
     */
    public function presenter(): string
    {
        return SpendingPresenter::class;
    }
}
