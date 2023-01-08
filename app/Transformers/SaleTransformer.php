<?php

namespace App\Transformers;

use App\Entities\Sale;
use League\Fractal\TransformerAbstract;

/**
 * Class SalesTransformer.
 *
 * @package namespace App\Transformers;
 */
class SaleTransformer extends TransformerAbstract
{
    /**
     * Transform the Sales entity.
     *
     * @param Sale $model
     *
     * @return array
     */
    public function transform(Sale $model): array
    {
        return [
            'id' => (int)$model->id,

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
