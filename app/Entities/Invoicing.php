<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Invoicing.
 *
 * @package namespace App\Entities;
 */
class Invoicing extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'amount',
        'billing_date',
        'sale_id'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function sale(): BelongsTo
    {
        return $this->belongsTo(Sale::class);
    }
}
