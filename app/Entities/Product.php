<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Product.
 *
 * @package namespace App\Entities;
 */
class Product extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'name',
        'purchase_price',
        'percentage_on_sale',
        'final_value',
        'sub_category_id',
        'product_type'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function subCategory(): BelongsTo
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function saleItens(): HasMany
    {
        return $this->hasMany(SaleIten::class);
    }
}
