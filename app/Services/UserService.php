<?php

namespace App\Services;

use App\Presenters\UserDetailPresenter;
use App\Repositories\ActionsRepository;
use App\Repositories\SubjectsRepository;
use App\Repositories\UserRepository;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * UserService
 */
class UserService extends AppService
{
    protected RepositoryInterface $repository;

    private ActionsRepository $actionsRepository;

    private SubjectsRepository $subjectsRepository;

    /**
     * @param UserRepository $repository
     * @param ActionsRepository $actionsRepository
     * @param SubjectsRepository $subjectsRepository
     */
    public function __construct(
        UserRepository $repository,
        ActionsRepository $actionsRepository,
        SubjectsRepository $subjectsRepository,
    ) {
        $this->repository = $repository;
        $this->actionsRepository = $actionsRepository;
        $this->subjectsRepository = $subjectsRepository;
    }

    public function userAbilities(): array
    {
        $abilities = [];
        $subjects = $this->subjectsRepository->skipPresenter()->all();
        $actions = $this->actionsRepository->skipPresenter()->all();

        foreach ($subjects as $subject) {
            $abilities[] = [
                'subject' => [
                  'id' => $subject->id,
                  'name' => $subject->name
                ],
                'actions' => array_map(function ($item) {
                    return [
                        'id' => $item['id'],
                        'name' => $item['name']
                    ];
                }, $actions->toArray())
            ];
        }

        return $abilities;
    }

    /**
     * @param $id
     * @param bool $skipPresenter
     * @return mixed
     */
    public function find($id, bool $skipPresenter = false): mixed
    {
        return $this->repository
            ->setPresenter(UserDetailPresenter::class)
            ->skipPresenter($skipPresenter)->find($id);
    }
}
