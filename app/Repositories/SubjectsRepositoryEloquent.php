<?php

namespace App\Repositories;

use App\Entities\Subject;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class SubjectsRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class SubjectsRepositoryEloquent extends BaseRepository implements SubjectsRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return Subject::class;
    }
}
