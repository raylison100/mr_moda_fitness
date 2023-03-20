<?php

namespace App\Presenters;

use App\Transformers\UserAbilityTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class UserAbilityPresenter.
 *
 * @package namespace App\Presenters;
 */
class UserAbilityPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return UserAbilityTransformer
     */
    public function getTransformer(): UserAbilityTransformer
    {
        return new UserAbilityTransformer();
    }
}
