<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Sale.
 *
 * @package namespace App\Entities;
 */
class Sale extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'amount',
        'installment',
        'installment_qtd',
        'installment_value',
        'cash_value',
        'discount_value',
        'status'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function saleItems(): HasMany
    {
        return $this->hasMany(SaleItem::class);
    }
}
