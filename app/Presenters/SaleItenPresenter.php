<?php

namespace App\Presenters;

use App\Transformers\SaleItenTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class SaleItens]Presenter.
 *
 * @package namespace App\Presenters;
 */
class SaleItenPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return SaleItenTransformer
     */
    public function getTransformer(): SaleItenTransformer
    {
        return new SaleItenTransformer();
    }
}
