<?php

namespace App\Services;

use Prettus\Repository\Contracts\RepositoryInterface;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * AppService
 */
class AppService
{
    protected RepositoryInterface $repository;

    /**
     * @param int $limit
     * @return mixed
     */
    public function all(int $limit = 20): mixed
    {
        return $this->repository
            ->resetCriteria()
            ->pushCriteria(app(RequestCriteria::class))
            ->paginate($limit);
    }

    /**
     * @param array $data
     * @param bool $skipPresenter
     * @return mixed
     */
    public function create(array $data, bool $skipPresenter = false): mixed
    {
        if (isset($data['password']) && !empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }
        return $this->repository->skipPresenter($skipPresenter)->create($data);
    }

    /**
     * @param $id
     * @param bool $skipPresenter
     * @return mixed
     */
    public function find($id, bool $skipPresenter = false): mixed
    {
        return $this->repository->skipPresenter($skipPresenter)->find($id);
    }

    /**
     * @param array $data
     * @param $id
     * @param bool $skipPresenter
     * @return array|mixed
     */
    public function update(array $data, $id, bool $skipPresenter = false): mixed
    {
        if (isset($data['password']) && !empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }
        return $this->repository->skipPresenter($skipPresenter)->update($data, $id);
    }

    /**
     * Remove the specified resource from storage using softDelete.
     * =
     * @param $id
     * @return array
     */
    public function delete($id): array
    {
        return ['success' => (boolean)$this->repository->delete($id)];
    }
}
