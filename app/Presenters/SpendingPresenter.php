<?php

namespace App\Presenters;

use App\Transformers\SpendingTransformer;
use League\Fractal\TransformerAbstract;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class SpendingPresenter.
 *
 * @package namespace App\Presenters;
 */
class SpendingPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return SpendingTransformer
     */
    public function getTransformer(): SpendingTransformer
    {
        return new SpendingTransformer();
    }
}
