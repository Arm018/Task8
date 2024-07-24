<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use App\Services\Admin\UserSearchService;
use Illuminate\Http\Request;

class UserSearchController extends Controller
{
    protected UserSearchService $userSearchService;

    public function __construct(UserSearchService $userSearchService)
    {
        $this->userSearchService = $userSearchService;
    }

    public function search(Request $request)
    {
        $users = $this->userSearchService->search($request);
        return view('admin.user_list', compact('users'));
    }
}
