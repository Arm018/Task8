<?php

namespace App\Services;

use App\Models\FavoriteProperty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteService
{
    public function getFavorites()
    {
        return FavoriteProperty::query()->where('user_id', Auth::id())->with(['property.images'])->get();
    }

    public function toggleFavorite($propertyId)
    {
        $favorite = Auth::user()->favorites()->where('property_id', $propertyId)->first();

        if ($favorite) {
            $favorite->delete();
            return ['message' => 'Property removed from bookmarks'];
        } else {
            $favorite = new FavoriteProperty();
            $favorite->user_id = Auth::user()->id;
            $favorite->property_id = $propertyId;
            $favorite->save();
            return ['message' => 'Property bookmarked successfully'];
        }
    }

    public function deleteFavorite($propertyId)
    {
        $favorite = Auth::user()->favorites()->where('property_id', $propertyId)->first();
        if ($favorite) {
            $favorite->delete();
            return redirect()->back()->with('success', 'Property removed from bookmarks.');
        }
    }
}
