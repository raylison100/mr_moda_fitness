<?php

namespace App\Presenters;

use App\Transformers\CategoryTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class CategoryPresenter.
 *
 * @package namespace App\Presenters;
 */
class CategoryPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return CategoryTransformer
     */
    public function getTransformer(): CategoryTransformer
    {
        return new CategoryTransformer();
    }
}
