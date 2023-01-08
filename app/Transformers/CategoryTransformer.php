<?php

namespace App\Transformers;

use App\Entities\Category;
use League\Fractal\TransformerAbstract;

/**
 * Class CategoryTransformer.
 *
 * @package namespace App\Transformers;
 */
class CategoryTransformer extends TransformerAbstract
{
    /**
     * Transform the Category entity.
     *
     * @param Category $model
     *
     * @return array
     */
    public function transform(Category $model): array
    {
        return [
            'id' => (int)$model->id,
            'name' => $model->name,
        ];
    }
}
