<?php

namespace App\Repositories;

use App\Entities\Product;
use App\Presenters\ProductPresenter;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class ProductRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ProductRepositoryEloquent extends BaseRepository implements ProductRepository
{
    protected $fieldSearchable = [
        'name'=>'like',
        'id'
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return Product::class;
    }

    /**
     * @return string
     */
    public function presenter(): string
    {
        return ProductPresenter::class;
    }
}
