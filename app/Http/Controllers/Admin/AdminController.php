<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $admin = Admin::query()->first();
        $users = User::query()->count();
        $properties = Property::query()->count();
        return view('admin.dashboard', compact('admin','users','properties'));
    }
}
