<?php

namespace App\Presenters;

use App\Transformers\DepartmentTransformer;
use League\Fractal\TransformerAbstract;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class DepartmentPresenter.
 *
 * @package namespace App\Presenters;
 */
class DepartmentPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return DepartmentTransformer
     */
    public function getTransformer(): DepartmentTransformer
    {
        return new DepartmentTransformer();
    }
}
