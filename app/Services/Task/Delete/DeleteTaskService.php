<?php

namespace App\Services\Task\Delete;

use App\Repositories\TaskRepository;
use App\Util\Constants;
use App\Services\Service;

class DeleteTaskService extends Service
{
    private $repository;
    public function __construct(
        TaskRepository $repository
    ) {
        $this->repository = $repository;
    }

    public function delete($id)
    {
        $model = $this->repository->find($id);
        if ($model) {
            $delete = $this->repository->delete($model);
            return $delete ? $this->resolve(false, Constants::DELETE_SUCESSFULL) : $this->resolve(true, Constants::DELETE_UNSUCESSFULL);
        } else {
            return $this->resolve(true, Constants::REGISTER_NOT_FOUND, null, Constants::STATUS_BAD_REQUEST);
        }
    }
}
