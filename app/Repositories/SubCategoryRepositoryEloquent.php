<?php

namespace App\Repositories;

use App\Entities\SubCategory;
use App\Presenters\SubCategoriesPresenter;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class SubCategoriesRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class SubCategoryRepositoryEloquent extends BaseRepository implements SubCategoryRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return SubCategory::class;
    }

    /**
     * @return string
     */
    public function presenter(): string
    {
        return SubCategoriesPresenter::class;
    }
}
