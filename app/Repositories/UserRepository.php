<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository extends Repository
{

    public function all()
    {
        return User::all();
    }

    public function find($value)
    {
        return User::find($value);
    }
}
