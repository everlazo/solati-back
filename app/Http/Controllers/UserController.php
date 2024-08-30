<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\User\Create\CreateUserService;
use App\Services\User\Delete\DeleteUserService;
use App\Services\User\Search\GetAllUserService;
use App\Services\User\SearchById\SearchByIdUserService;
use App\Services\User\Update\UpdateUserService;

class UserController extends Controller
{
    private $getAllUserService;
    private $createUserService;
    private $deleteUserService;
    private $updateUserService;
    private $getByIdUserService;

    public function __construct(
        CreateUserService $createUserService,
        GetAllUserService $getAllUserService,
        DeleteUserService $deleteUserService,
        UpdateUserService $updateUserService,
        SearchByIdUserService $getByIdUserService
    ) {
        $this->getAllUserService = $getAllUserService;
        $this->createUserService = $createUserService;
        $this->deleteUserService = $deleteUserService;
        $this->updateUserService = $updateUserService;
        $this->getByIdUserService = $getByIdUserService;
    }

    public function all()
    {
        return $this->getAllUserService->all();
    }

    public function find($id)
    {
        return $this->getByIdUserService->find($id);
    }

    public function create(Request $request)
    {
        return $this->createUserService->create($request);
    }

    public function update(Request $request, $id)
    {
        return $this->updateUserService->update($request, $id);
    }

    public function delete($id)
    {
        return $this->deleteUserService->delete($id);
    }
}
