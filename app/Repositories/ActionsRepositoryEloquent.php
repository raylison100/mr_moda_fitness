<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ActionsRepository;
use App\Entities\Actions;
use App\Validators\ActionsValidator;

/**
 * Class ActionsRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ActionsRepositoryEloquent extends BaseRepository implements ActionsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Actions::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
