<?php

namespace App\Services\Task\SearchById;

use App\Repositories\TaskRepository;
use App\Util\Constants;
use App\Services\Service;

class SearchByIdTaskService extends Service
{
    private $repository;

    public function __construct(
        TaskRepository $repository
    ) {
        $this->repository = $repository;
    }

    public function find($id)
    {
        $entity = $this->repository->find($id);
        return $entity ? $this->resolve(false, Constants::OK, $entity) : $this->resolve(true, Constants::REGISTER_NOT_FOUND, null, Constants::STATUS_NOT_FOUND);
    }
}
