<?php

namespace App\Repositories;

use App\Entities\Category;
use App\Presenters\CategoryPresenter;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class CategoryRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class CategoryRepositoryEloquent extends BaseRepository implements CategoryRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return Category::class;
    }

    /**
     * @return string
     */
    public function presenter(): string
    {
        return CategoryPresenter::class;
    }
}
