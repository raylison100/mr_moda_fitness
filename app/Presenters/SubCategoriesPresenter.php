<?php

namespace App\Presenters;

use App\Transformers\SubCategoryTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class SubCategoriesPresenter.
 *
 * @package namespace App\Presenters;
 */
class SubCategoriesPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return SubCategoryTransformer
     */
    public function getTransformer(): SubCategoryTransformer
    {
        return new SubCategoryTransformer();
    }
}
