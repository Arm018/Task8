<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $admin = Admin::query()->first();
        $users = User::query()->with('userInfo')->paginate(10);
        return view('admin.user_list', compact('users', 'admin'));
    }

}
