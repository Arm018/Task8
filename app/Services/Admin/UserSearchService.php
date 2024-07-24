<?php

namespace App\Services\Admin;

use App\Models\User;
use Illuminate\Http\Request;


class UserSearchService
{
    public function search(Request $request)
    {
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

        return $query->paginate(10);
    }
}
