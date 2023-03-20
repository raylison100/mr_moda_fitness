<?php

namespace App\Repositories;

use App\Entities\SaleItem;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class SaleItemRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class SaleItemRepositoryEloquent extends BaseRepository implements SaleItemRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return SaleItem::class;
    }
}
