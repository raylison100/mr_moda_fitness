<?php

namespace App\Repositories;

use App\Entities\Stock;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class StockRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class StockRepositoryEloquent extends BaseRepository implements StockRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return Stock::class;
    }
}
