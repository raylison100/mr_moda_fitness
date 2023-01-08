<?php

namespace App\Presenters;

use App\Transformers\ProductStatusTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ProductStatusesPresenter.
 *
 * @package namespace App\Presenters;
 */
class ProductStatusPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return ProductStatusTransformer
     */
    public function getTransformer(): ProductStatusTransformer
    {
        return new ProductStatusTransformer();
    }
}
