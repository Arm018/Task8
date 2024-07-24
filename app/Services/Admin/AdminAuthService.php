<?php

namespace App\Services\Admin;

use Illuminate\Support\Facades\Auth;

class AdminAuthService
{
    public function login($credentials)
    {
        return Auth::guard('admin')->attempt($credentials);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
    }

}
