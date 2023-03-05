<?php

namespace App\Presenters;

use App\Transformers\SaleDetailTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class SalesDetailPresenter.
 *
 * @package namespace App\Presenters;
 */
class SaleDetailPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return SaleDetailTransformer
     */
    public function getTransformer(): SaleDetailTransformer
    {
        return new SaleDetailTransformer();
    }
}
