<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\Property;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $properties = Property::query()->where('user_id', Auth::id())->get();
        return view('profile.my-profile', compact('properties'));
    }

    public function profilePassword()
    {
        return view('profile.password-change');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
            'new_password_confirmation' => 'required|min:8'
        ]);

        $user = Auth::user();


        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['old_password' => 'The provided password does not match your current password.']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();
        return redirect()->route('profilePassword')->with('success', 'Password changed successfully!');

    }

    public function profileUpdate(ProfileRequest $request)
    {
        $user = Auth::user();
        $user->name = $request->name;
        $user->save();

        $userInfo = $user->userInfo ?? new UserInfo;

        $userInfo->phone = $request->phone;
        $userInfo->about = $request->about;
        $userInfo->title = $request->title;
        $userInfo->twitter = $request->twitter;
        $userInfo->facebook = $request->facebook;
        $userInfo->google_plus = $request->google_plus;
        $userInfo->linkedin = $request->linkedin;

        if ($request->hasFile('profile_photo')) {
            if ($userInfo->image) {
                Storage::disk('public')->delete($userInfo->image);
            }
            $imagePath = $request->file('profile_photo')->store('images', 'public');
            $userInfo->image = $imagePath;
        }

        $user->userInfo()->save($userInfo);

        return back()->with('success', 'Profile updated successfully.');
    }
}
