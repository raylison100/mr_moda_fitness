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
            'amount' => $model->amount,
            'installment' => $model->installment,
            'installment_qtd' => $model->installment_qtd,
            'installment_value' => $model->installment_value,
            'cash_value' => $model->cash_value,
            'discount_value' => $model->discount_value,
            "itens" => $this->getItens($model),
        ];
    }

    private function getItens(Sale $model): array
    {
        $itens = [];

        foreach ($model->saleItens as $iten){
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
