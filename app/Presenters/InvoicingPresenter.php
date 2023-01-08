<?php

namespace App\Presenters;

use App\Transformers\InvoicingTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class InvoicingPresenter.
 *
 * @package namespace App\Presenters;
 */
class InvoicingPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return InvoicingTransformer
     */
    public function getTransformer(): InvoicingTransformer
    {
        return new InvoicingTransformer();
    }
}
