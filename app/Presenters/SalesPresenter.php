<?php

namespace App\Presenters;

use App\Transformers\SaleTransformer;
use League\Fractal\TransformerAbstract;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class SalesPresenter.
 *
 * @package namespace App\Presenters;
 */
class SalesPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return SaleTransformer
     */
    public function getTransformer(): SaleTransformer
    {
        return new SaleTransformer();
    }
}
