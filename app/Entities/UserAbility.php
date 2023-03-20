<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class UserAbilities.
 *
 * @package namespace App\Entities;
 */
class UserAbility extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'user_id',
        'action_id',
        'subject_id',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function action(): BelongsTo
    {
        return $this->belongsTo(Actions::class);
    }

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }
}
