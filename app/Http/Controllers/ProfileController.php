<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\ProfileRequest;
use App\Services\ProfileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    protected $profileService;

    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }

    public function index()
    {
        $properties = $this->profileService->getUserProperties(Auth::id());
        $user = $this->profileService->getUserProfile(Auth::id());
        return view('profile.my-profile', compact('properties', 'user'));
    }

    public function profilePassword()
    {
        return view('profile.password-change');
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $result = $this->profileService->updatePassword(Auth::user(), $request->old_password, $request->new_password);

        if (isset($result['error'])) {
            return back()->withErrors(['old_password' => $result['error']]);
        }

        return redirect()->route('profilePassword')->with('success', $result['success']);
    }

    public function profileUpdate(ProfileRequest $request)
    {

        $result = $this->profileService->updateProfile(Auth::user(), $request);

        return back()->with('success', $result['success']);
    }
}
