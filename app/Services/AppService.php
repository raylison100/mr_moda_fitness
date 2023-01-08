<?php

namespace App\Services;

use Prettus\Repository\Contracts\RepositoryInterface;

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
        return $this->repository->paginate($limit);
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
        return $skipPresenter ? $this->repository->skipPresenter()->create($data) : $this->repository->create($data);
    }

    /**
     * @param $id
     * @param bool $skipPresenter
     * @return mixed
     */
    public function find($id, bool $skipPresenter = false): mixed
    {
        if ($skipPresenter) {
            return $this->repository->skipPresenter()->find($id);
        }
        return $this->repository->find($id);
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
        return $skipPresenter ? $this->repository->skipPresenter()->update($data, $id) : $this->repository->update(
            $data,
            $id
        );
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
