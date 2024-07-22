<?php

namespace App\Http\Controllers;

use App\Models\FavoriteProperty;
use App\Services\FavoriteService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    protected $favoriteService;

    public function __construct(FavoriteService $favoriteService)
    {
        $this->favoriteService = $favoriteService;
    }

    public function index()
    {
        $favorites = $this->favoriteService->getFavorites();
        return view('profile.favorites', compact('favorites'));
    }

    public function toggle(Request $request)
    {
        $propertyId = $request->input('property_id');
        $response = $this->favoriteService->toggleFavorite($propertyId);

        return response()->json($response);
    }

    public function destroy($propertyId)
    {
        $this->favoriteService->deleteFavorite($propertyId);
        return redirect()->back();
    }

}
