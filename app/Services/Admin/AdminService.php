<?php

namespace App\Services\Admin;

use App\Models\Property;
use App\Models\User;

class AdminService
{

    public function getUsersCount(): int
    {
        return User::all()->count();
    }

    public function getPropertyCount(): int
    {
        return Property::all()->count();
    }
}
