<?php

namespace App\Criterias;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class FilterByDepartmentId
 * @package namespace App\Criteria;
 */
class FilterByCategoryId extends AppCriteria implements CriteriaInterface
{
    /**
     * @param $model
     * @param RepositoryInterface $repository
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository): mixed
    {
        $categoryId = $this->request->query->get('category_id');

        if ($categoryId) {
            $model = $model->where('category_id', $categoryId);
        }
        return $model;
    }
}
