<?php

namespace App\Services\User\Search;

use App\Repositories\UserRepository;
use App\Util\Constants;
use App\Services\Service;

class GetAllUserService extends Service
{
    private $repository;

    public function __construct(
        UserRepository $repository
    ) {
        $this->repository = $repository;
    }

    public function all()
    {
        $entities = $this->repository->all();
        return $this->resolve(false, Constants::OK, $entities);
    }
}
