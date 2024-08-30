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
        $data = $this->repository->find($id);
        return $this->resolve(false, Constants::OK, $data);
    }
}
