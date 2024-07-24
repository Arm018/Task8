<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;

class UserSearchController extends Controller
{
    public function search(Request $request)
    {
        $admin = Admin::query()->first();
        $query = User::query();

        if ($searchId = $request->get('search_id')) {
            $query->where('id', $searchId);
        }
        if ($searchName = $request->get('search_name')) {
            $query->where('name', 'like', "%{$searchName}%");
        }

        if ($searchEmail = $request->get('search_email')) {
            $query->where('email', 'like', "%{$searchEmail}%");
        }
        if ($searchPhone = $request->get('search_phone')) {
            $query->whereHas('userInfo', function ($q) use ($searchPhone) {
                $q->where('phone', 'like', "%{$searchPhone}%");
            });
        }
        if ($searchDate = $request->get('search_date')) {
            $query->whereDate('created_at', 'like', "%{$searchDate}%");
        }

        $users = $query->paginate(10);

        return view('admin.user_list', compact('users', 'admin'));
    }
}
