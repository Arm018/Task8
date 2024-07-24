<?php

namespace App\Services\Admin;

use App\Models\User;

class UserService
{
    public function getUsers()
    {
        return User::query()->with('userInfo')->paginate(10);
    }
}
