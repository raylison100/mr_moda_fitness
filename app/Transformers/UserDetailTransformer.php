<?php

namespace App\Transformers;

use App\Entities\User;
use League\Fractal\TransformerAbstract;

/**
 * Class UserTransformer.
 *
 * @package namespace App\Transformers;
 */
class UserDetailTransformer extends TransformerAbstract
{
    /**
     * Transform the User entity.
     *
     * @param User $model
     *
     * @return array
     */
    public function transform(User $model): array
    {
        return [
            'id' => (int)$model->id,
            'name' => $model->name,
            'email' => $model->email,
            'abilities' => $this->getAbilities($model),
            'created_at' => $model->created_at->toDateTimeString(),
            'updated_at' => $model->updated_at->toDateTimeString()
        ];
    }

    /**
     * @param User $model
     * @return array
     */
    private function getAbilities(User $model): array
    {
        $abilities = [];

        foreach ($model->userAbility as $ability) {
            $subjectId = $ability->subject_id;

            if (isset($abilities[$subjectId])) {
                $abilities[$subjectId]['actions'][] = [
                    'id' => $ability->action_id,
                    'name' => $ability->action->name,
                ];
            } else {
                $abilities[$subjectId] = [
                    'id' => $ability->id,
                    'subject_id' => $subjectId,
                    'subject_name' => $ability->subject->name,
                    'actions' => [[
                        'id' => $ability->action_id,
                        'name' => $ability->action->name,
                    ]]
                ];
            }
        }

        return array_values($abilities);
    }
}
