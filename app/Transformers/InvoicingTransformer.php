<?php

namespace App\Transformers;

use App\Entities\Invoicing;
use League\Fractal\TransformerAbstract;

/**
 * Class InvoicingTransformer.
 *
 * @package namespace App\Transformers;
 */
class InvoicingTransformer extends TransformerAbstract
{
    /**
     * Transform the Invoicing entity.
     *
     * @param Invoicing $model
     *
     * @return array
     */
    public function transform(Invoicing $model): array
    {
        return [
            'id' => (int)$model->id,

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
