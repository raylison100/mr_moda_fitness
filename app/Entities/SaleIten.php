<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class SaleIten.
 *
 * @package namespace App\Entities;
 */
class SaleIten extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'qtd',
        'amount',
        'product_id',
        'sale_id',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function sale(): BelongsTo
    {
        return $this->belongsTo(Sale::class);
    }
}
