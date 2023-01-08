<?php

namespace App\Transformers;

use App\Entities\Spending;
use League\Fractal\TransformerAbstract;

/**
 * Class SpendingTransformer.
 *
 * @package namespace App\Transformers;
 */
class SpendingTransformer extends TransformerAbstract
{
    /**
     * Transform the Spending entity.
     *
     * @param Spending $model
     *
     * @return array
     */
    public function transform(Spending $model): array
    {
        return [
            'id' => (int)$model->id,

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
