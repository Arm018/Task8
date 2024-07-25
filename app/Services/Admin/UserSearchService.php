<?php

namespace App\Services\Admin;

use App\Models\User;
use Illuminate\Http\Request;


class UserSearchService
{
    public function search(Request $request)
    {
        $query = User::query();
        $query
            ->when($request->get('search_id'), function ($q) use ($request) {
                $q->where('id', $request->get('search_id'));
            })
            ->when($request->get('search_name'), function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->get('search_name') . '%');
            })
            ->when($request->get('search_email'), function ($q) use ($request) {
                $q->where('email', 'like', '%' . $request->get('search_email') . '%');
            })
            ->when($request->get('search_phone'), function ($q) use ($request) {
                $q->where('phone', 'like', '%' . $request->get('search_phone') . '%');
            })
            ->when($request->get('search_date'), function ($q) use ($request) {
                $q->where('created_at', 'like', '%' . $request->get('search_date') . '%');
            });


        return $query->paginate(10);
    }
}
