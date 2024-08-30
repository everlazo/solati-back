<?php

namespace App\Services\Task\Update;

use App\Repositories\TaskRepository;
use App\Util\Constants;
use App\Services\Service;
use App\Services\Shared\ValidatorService;

class UpdateTaskService extends Service
{
    private $repository;
    private $validatorService;

    public function __construct(
        TaskRepository $repository,
        ValidatorService $validatorService
    ) {
        $this->repository = $repository;
        $this->validatorService = $validatorService;
    }

    public function update($request, $id)
    {
        $model = $this->repository->find($id);

        if (!$model) {
            return $this->resolve(true, Constants::REGISTER_NOT_FOUND, null, Constants::STATUS_NOT_FOUND);
        }
        
        $model->id_user = auth()->user()->id;
        $model->fill($request->all());
        $errors = $this->validatorService->validate($request, $model);

        if (count($errors) > 0) {
            return $this->resolve(true, Constants::UPDATE_UNSUCESSFULL, $errors, Constants::STATUS_BAD_REQUEST);
        }

        $entity = $this->repository->update($model);

        if ($entity->id == null) {
            return $this->resolve(true, Constants::UPDATE_UNSUCESSFULL, $entity->errors, Constants::STATUS_BAD_REQUEST);
        }

        return $this->resolve(false, Constants::UPDATE_SUCESSFULL);
    }
}
