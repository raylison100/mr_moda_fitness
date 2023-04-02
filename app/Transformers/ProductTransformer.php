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
            'code' => $model->code,
            "purchase_price" => number_format($model->purchase_price, 2),
            "percentage_on_sale" => $model->percentage_on_sale,
            "final_value" => number_format($model->final_value, 2),
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

        foreach ($model->stocks as $iten) {
            $stocks[] = [
                'id' => $iten->id,
                'code' => $iten->code,
                'size' => $iten->size,
                'qtd' => $iten->qtd,
            ];
        }

        return $stocks;
    }
}
