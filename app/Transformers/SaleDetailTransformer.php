<?php

namespace App\Transformers;

use App\Entities\Sale;
use League\Fractal\TransformerAbstract;

/**
 * Class SalesTransformer.
 *
 * @package namespace App\Transformers;
 */
class SaleDetailTransformer extends TransformerAbstract
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
            'amount' => number_format($model->amount, 2),
            'status' => $model->status,
            'installment' => $model->installment,
            'installment_qtd' => $model->installment_qtd,
            'installment_value' => number_format($model->installment_value, 2),
            'cash_value' => number_format($model->cash_value ?? 0, 2),
            'discount_value' => number_format($model->discount_value ?? 0, 2),
            "items" => $this->getItems($model),
        ];
    }

    private function getItems(Sale $model): array
    {
        $items = [];

        foreach ($model->saleItems as $item) {
            $items[] = [
                'qtd' => $item->qtd,
                'amount' => $item->amount,
                'stock' => [
                    'code' => $item->stock->code
                ],
                'product' => [
                    'id' => $item->stock->product->id,
                    'name' => $item->stock->product->name,
                    'final_value' => $item->stock->product->final_value,
                ],
            ];
        }

        return $items;
    }
}
