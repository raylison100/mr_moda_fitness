<?php

namespace App\Repositories;

use App\Entities\Department;
use App\Presenters\DepartmentPresenter;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class DepartmentRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class DepartmentRepositoryEloquent extends BaseRepository implements DepartmentRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return Department::class;
    }

    /**
     * @return string
     */
    public function presenter(): string
    {
        return DepartmentPresenter::class;
    }
}
