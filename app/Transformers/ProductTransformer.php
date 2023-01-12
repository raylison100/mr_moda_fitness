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
            'name' => $model->name,
            "purchase_price"=> $model->purchase_price,
            "percentage_on_sale"=> $model->percentage_on_sale,
            "final_value"=> $model->final_value,
            "sub_category_id"=> $model->sub_category_id,
            "product_type"=> $model->product_type,
            "size"=> $model->stock?->size,
            "qtd"=> $model->stock?->qtd
        ];
    }
}
