<?php

namespace App\Transformers;

use App\Entities\SaleItem;
use League\Fractal\TransformerAbstract;

/**
 * Class SaleItens]Transformer.
 *
 * @package namespace App\Transformers;
 */
class SaleItenTransformer extends TransformerAbstract
{
    /**
     * Transform the SaleItens] entity.
     *
     * @param SaleItem $model
     *
     * @return array
     */
    public function transform(SaleItem $model): array
    {
        return [
            'id' => (int)$model->id,

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
