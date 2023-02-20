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
            'amount' => number_format($model->amount, 2),
            'installment' => $model->installment,
            'installment_qtd' => $model->installment_qtd,
            'installment_value' => number_format($model->installment_value, 2),
            'cash_value' => number_format($model->cash_value ?? 0, 2),
            'discount_value' => number_format($model->discount_value ?? 0, 2),
            "itens" => $this->getItens($model),
        ];
    }

    private function getItens(Sale $model): array
    {
        $itens = [];

        foreach ($model->saleItens as $iten) {
            $itens[] = [
                'qtd' => $iten->qtd,
                'amount' => $iten->amount,
                'product' => [
                    'id' => $iten->product->id,
                    'name' => $iten->product->name,
                ],
            ];
        }

        return $itens;
    }
}
