<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminAuthRequest;
use App\Models\Admin;
use App\Services\Admin\AdminAuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{

    protected $authService;

    public function __construct(AdminAuthService $authService)
    {
        $this->authService = $authService;
    }

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(AdminAuthRequest $request)
    {

        if ($this->authService->login($request->only('email', 'password'))) {
            return redirect()->route('admin.dashboard');
        } else {
            return back()->withErrors(['email' => 'These credentials do not match our records.']);
        }
    }

    public function logout()
    {
        $this->authService->logout();
        return redirect()->route('admin.login');
    }


}
