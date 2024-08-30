<?php

namespace App\Services\User\SearchById;

use App\Repositories\UserRepository;
use App\Util\Constants;
use App\Services\Service;

class SearchByIdUserService extends Service
{
    private $repository;

    public function __construct(
        UserRepository $repository
    ) {
        $this->repository = $repository;
    }

    public function find($id)
    {
        $entity = $this->repository->find($id);
        return $entity ? $this->resolve(false, Constants::OK, $entity) : $this->resolve(true, Constants::REGISTER_NOT_FOUND, null, Constants::STATUS_NOT_FOUND);
    }
}
