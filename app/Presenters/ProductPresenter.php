<?php

namespace App\Presenters;

use App\Transformers\ProductTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ProductPresenter.
 *
 * @package namespace App\Presenters;
 */
class ProductPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return ProductTransformer
     */
    public function getTransformer(): ProductTransformer
    {
        return new ProductTransformer();
    }
}
