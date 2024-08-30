<?php

namespace App\Repositories;

use App\Models\Task;

class TaskRepository extends Repository
{

    public function all()
    {
        return Task::all();
    }

    public function find($value)
    {
        return Task::find($value);
    }
}
