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
            "purchase_price" => $model->purchase_price,
            "percentage_on_sale" => $model->percentage_on_sale,
            "final_value" => $model->final_value,
            "product_type" => $model->product_type,
            "stocks" => $this->getStocks($model),
            "departament" => [
                "id" => $model->subCategory->category->department->id,
                "name" => $model->subCategory->category->department->name,
            ],
            "category" => [
                "id" => $model->subCategory->category->id,
                "name" => $model->subCategory->category->name,
            ],
            "sub_category" => [
                "id" => $model->subCategory->id,
                "name" => $model->subCategory->name
            ]
        ];
    }

    private function getStocks(Product $model): array
    {
        $stocks = [];

        foreach ($model->stocks as $iten){
            $stocks[] = [
                'id' => $iten->id,
                'size' => $iten->size,
                'qtd' => $iten->qtd,
            ];
        }

        return $stocks;
    }
}
