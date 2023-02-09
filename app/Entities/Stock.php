<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Stock.
 *
 * @package namespace App\Entities;
 */
class Stock extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'size',
        'code',
        'product_id',
        'qtd'
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
