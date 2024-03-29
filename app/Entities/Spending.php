<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Spending.
 *
 * @package namespace App\Entities;
 */
class Spending extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'description',
        'value',
        'spending_type',
    ];
}
