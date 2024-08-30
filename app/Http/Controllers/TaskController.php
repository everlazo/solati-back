<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Task\Create\CreateTaskService;
use App\Services\Task\Delete\DeleteTaskService;
use App\Services\Task\Search\GetAllTaskService;
use App\Services\Task\SearchById\SearchByIdTaskService;
use App\Services\Task\Update\UpdateTaskService;

class TaskController extends Controller
{
    private $getAllTaskService;
    private $createTaskService;
    private $deleteTaskService;
    private $updateTaskService;
    private $getByIdTaskService;

    public function __construct(
        CreateTaskService $createTaskService,
        GetAllTaskService $getAllTaskService,
        DeleteTaskService $deleteTaskService,
        UpdateTaskService $updateTaskService,
        SearchByIdTaskService $getByIdTaskService
    ) {
        $this->getAllTaskService = $getAllTaskService;
        $this->createTaskService = $createTaskService;
        $this->deleteTaskService = $deleteTaskService;
        $this->updateTaskService = $updateTaskService;
        $this->getByIdTaskService = $getByIdTaskService;
    }

    public function all()
    {
        return $this->getAllTaskService->all();
    }

    public function find($id)
    {
        return $this->getByIdTaskService->find($id);
    }

    public function create(Request $request)
    {
        return $this->createTaskService->create($request);
    }

    public function update(Request $request, $id)
    {
        return $this->updateTaskService->update($request, $id);
    }

    public function delete($id)
    {
        return $this->deleteTaskService->delete($id);
    }
}
