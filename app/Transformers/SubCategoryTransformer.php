<?php

namespace App\Transformers;

use App\Entities\SubCategory;
use League\Fractal\TransformerAbstract;

/**
 * Class SubCategoriesTransformer.
 *
 * @package namespace App\Transformers;
 */
class SubCategoryTransformer extends TransformerAbstract
{
    /**
     * Transform the SubCategories entity.
     *
     * @param SubCategory $model
     *
     * @return array
     */
    public function transform(SubCategory $model): array
    {
        return [
            'id' => (int)$model->id,
            'name' => $model->name,
        ];
    }
}
