<?php

namespace App\Services\User\Delete;

use App\Repositories\UserRepository;
use App\Util\Constants;
use App\Services\Service;

class DeleteUserService extends Service
{
    private $repository;
    public function __construct(
        UserRepository $repository
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
