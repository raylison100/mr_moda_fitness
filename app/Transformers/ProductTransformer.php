<?php

namespace App\Transformers;

use App\Entities\Product;
use League\Fractal\TransformerAbstract;

/**
 * Class ProductTransformer.
 *
 * @package namespace App\Transformers;
 */
class ProductTransformer extends TransformerAbstract
{
    /**
     * Transform the Product entity.
     *
     * @param Product $model
     *
     * @return array
     */
    public function transform(Product $model): array
    {
        return [
            'id' => (int)$model->id,

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
