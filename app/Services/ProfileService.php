<?php

namespace App\Services;

use App\Models\Property;
use App\Models\Social;
use App\Models\User;
use App\Models\UserInfo;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileService
{
    public function getUserProfile($userId)
    {
        return User::query()
            ->where('id', $userId)
            ->with('socialLinks')
            ->with('userInfo')
            ->first();
    }

    public function getUserProperties($userId)
    {
        return Property::query()
            ->where('user_id', $userId)
            ->get();
    }

    public function updatePassword($user, $oldPassword, $newPassword)
    {

        if (!Hash::check($oldPassword, $user->password)) {
            return [
                'error' => 'The provided password does not match your current password.'
            ];
        }

        $user->password = Hash::make($newPassword);
        $user->save();

        return [
            'success' => 'Password changed successfully!'
        ];
    }

    public function updateProfile($user, $request)
    {
        $user->name = $request->name;
        $user->save();

        $userInfo = $user->userInfo ?? new UserInfo;
        $userInfo->fill($request->only(['title', 'phone', 'about']));

        if ($request->hasFile('profile_photo')) {
            if ($userInfo->image) {
                Storage::disk('public')->delete($userInfo->image);
            }
            $imagePath = $request->file('profile_photo')->store('images', 'public');
            $userInfo->image = $imagePath;
        }

        $socialLinks = $user->socialLinks ?? new Social;
        $socialLinks->fill($request->only(['twitter', 'facebook', 'google_plus', 'linkedin']));
        $socialLinks->user_id = $user->id;
        $socialLinks->save();

        $user->userInfo()->save($userInfo);

        return ['success' => 'Profile updated successfully.'];
    }
}
