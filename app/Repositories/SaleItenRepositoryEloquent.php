<?php

namespace App\Repositories;

use App\Entities\SaleIten;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class SaleItens]RepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class SaleItenRepositoryEloquent extends BaseRepository implements SaleItenRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return SaleIten::class;
    }
}
