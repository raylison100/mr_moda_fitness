<?php

namespace App\Transformers;

use App\Entities\ProductStatus;
use League\Fractal\TransformerAbstract;

/**
 * Class ProductStatusesTransformer.
 *
 * @package namespace App\Transformers;
 */
class ProductStatusTransformer extends TransformerAbstract
{
    /**
     * Transform the ProductStatuses entity.
     *
     * @param ProductStatus $model
     *
     * @return array
     */
    public function transform(ProductStatus $model): array
    {
        return [
            'id' => (int)$model->id,

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
