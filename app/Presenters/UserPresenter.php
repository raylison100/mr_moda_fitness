<?php

namespace App\Presenters;

use App\Transformers\UserTransformer;
use League\Fractal\TransformerAbstract;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class UserPresenter.
 *
 * @package namespace App\Presenters;
 */
class UserPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return UserTransformer
     */
    public function getTransformer(): UserTransformer
    {
        return new UserTransformer();
    }
}
