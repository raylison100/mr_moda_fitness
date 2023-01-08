<?php

namespace App\Transformers;

use App\Entities\Department;
use League\Fractal\TransformerAbstract;

/**
 * Class DepartmentTransformer.
 *
 * @package namespace App\Transformers;
 */
class DepartmentTransformer extends TransformerAbstract
{
    /**
     * Transform the Department entity.
     *
     * @param Department $model
     *
     * @return array
     */
    public function transform(Department $model): array
    {
        return [
            'id' => (int)$model->id,
            'name' => $model->name,
        ];
    }
}
