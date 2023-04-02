<?php

namespace App\Presenters;

use App\Transformers\SaleItemTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class SaleItemsPresenter.
 *
 * @package namespace App\Presenters;
 */
class SaleItemPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return SaleItemTransformer
     */
    public function getTransformer(): SaleItemTransformer
    {
        return new SaleItemTransformer();
    }
}
