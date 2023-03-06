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
            'description' => $model->description,
            'value' => $model->value,
            'spending_type' => $model->spending_type
        ];
    }
}
