<?php

namespace App\Criterias;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class FilterByDepartmentId
 * @package namespace App\Criteria;
 */
class FilterByDepartmentId extends AppCriteria implements CriteriaInterface
{
    /**
     * @param $model
     * @param RepositoryInterface $repository
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository): mixed
    {
        $departmentId = $this->request->query->get('department_id');

        if ($departmentId) {
            $model = $model->where('department_id', $departmentId);
        }
        return $model;
    }
}
