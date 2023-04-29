<?php

namespace App\Presenters;

use App\Transformers\UserDetailTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class UserPresenter.
 *
 * @package namespace App\Presenters;
 */
class UserDetailPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return UserDetailTransformer
     */
    public function getTransformer(): UserDetailTransformer
    {
        return new UserDetailTransformer();
    }
}
