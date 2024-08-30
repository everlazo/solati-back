<?php

namespace App\Services\Task\Search;

use App\Repositories\TaskRepository;
use App\Util\Constants;
use App\Services\Service;

class GetAllTaskService extends Service
{
    private $repository;

    public function __construct(
        TaskRepository $repository
    ) {
        $this->repository = $repository;
    }

    public function all()
    {
        $entities = $this->repository->all();
        return $this->resolve(false, Constants::OK, $entities);
    }
}
