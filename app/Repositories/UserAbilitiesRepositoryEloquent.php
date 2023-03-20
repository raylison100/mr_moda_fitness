<?php

namespace App\Repositories;

use App\Entities\UserAbility;
use App\Presenters\UserAbilityPresenter;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class UserAbilitiesRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class UserAbilitiesRepositoryEloquent extends BaseRepository implements UserAbilitiesRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return UserAbility::class;
    }

    public function presenter(): string
    {
        return UserAbilityPresenter::class;
    }
}
