<?php

namespace App\Transformers;

use App\Entities\UserAbility;
use League\Fractal\TransformerAbstract;

/**
 * Class UserAbilityTransformer.
 *
 * @package namespace App\Transformers;
 */
class UserAbilityTransformer extends TransformerAbstract
{
    /**
     * Transform the UserAbility entity.
     *
     * @param UserAbility $model
     *
     * @return array
     */
    public function transform(UserAbility $model): array
    {
        return [
            'id' => (int)$model->id,
            'action' => $model->action->name,
            'subject' => $model->subject->name
        ];
    }
}
