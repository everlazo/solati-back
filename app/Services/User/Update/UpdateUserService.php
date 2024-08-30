<?php

namespace App\Services\User\Update;

use App\Repositories\UserRepository;
use App\Util\Constants;
use App\Services\Service;
use App\Services\Shared\ValidatorService;
use App\Services\User\Create\EncryptorService;

class UpdateUserService extends Service
{
    private $repository;
    private $validatorService;
    private $encryptorService;

    public function __construct(
        UserRepository $repository,
        ValidatorService $validatorService,
        EncryptorService $encryptorService
    ) {
        $this->repository = $repository;
        $this->validatorService = $validatorService;
        $this->encryptorService = $encryptorService;
    }

    public function update($request, $id)
    {
        $model = $this->repository->find($id);
        
        if (!$model) {
            return $this->resolve(true, Constants::REGISTER_NOT_FOUND, null, Constants::STATUS_NOT_FOUND);
        }
        
        $model->fill($request->all());
        $errors = $this->validatorService->validate($request, $model);

        if (count($errors) > 0) {
            return $this->resolve(true, Constants::UPDATE_UNSUCESSFULL, $errors, Constants::STATUS_BAD_REQUEST);
        }

        $model->password = $this->encryptorService->encrypt($model->password);

        $entity = $this->repository->update($model);

        if ($entity->id == null) {
            return $this->resolve(true, Constants::UPDATE_UNSUCESSFULL, $entity->errors, Constants::STATUS_BAD_REQUEST);
        }

        return $this->resolve(false, Constants::UPDATE_SUCESSFULL);
    }
}
