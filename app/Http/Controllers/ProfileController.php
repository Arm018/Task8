<?php

namespace App\Http\Controllers;

use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.my-profile');
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

    public function profileUpdate(Request $request)
    {

        $request->validate([
            'name' => 'required|string',
            'twitter' => 'nullable|url',
            'facebook' => 'nullable|url',
            'google_plus' => 'nullable|url',
            'linkedin' => 'nullable|url',
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->save();
        if ($user->userInfo) {
            $user->userInfo->phone = $request->phone;
            $user->userInfo->about = $request->about;
            $user->userInfo->title = $request->title;
            $user->userInfo->twitter = $request->twitter;
            $user->userInfo->facebook = $request->facebook;
            $user->userInfo->google_plus = $request->google_plus;
            $user->userInfo->linkedin = $request->linkedin;
            if ($request->hasFile('profile_photo')) {
                $imagePath = $request->file('profile_photo')->store('images', 'public');
                $user->userInfo->image = $imagePath;
            }
            $user->userInfo()->save($user->userInfo);
            return back()->with('success', 'Profile updated successfully.');
        } else {
            $userInfo = new UserInfo([
                'phone' => $request->phone,
                'about' => $request->about,
                'title' => $request->title,
                'twitter' => $request->twitter,
                'facebook' => $request->facebook,
                'google_plus' => $request->google_plus,
                'linkedin' => $request->linkedin,
            ]);
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
}
