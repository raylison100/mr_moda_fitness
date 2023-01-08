<?php

namespace App\Transformers;

use App\Entities\SaleIten;
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
     * @param SaleIten $model
     *
     * @return array
     */
    public function transform(SaleIten $model): array
    {
        return [
            'id' => (int)$model->id,

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
