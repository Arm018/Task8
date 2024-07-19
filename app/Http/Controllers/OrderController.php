<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order(Request $request)
    {
        $sort = $request->input('sort');

        $query = Property::query();

        switch ($sort) {
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            case 'newest':
                $query->orderBy('created_at', 'desc');
                break;
            case 'oldest':
                $query->orderBy('created_at', 'asc');
                break;
            default:

                break;
        }

        $filteredProperties = $query->paginate(6);
        $view = $request->input('view', 'list');
        switch ($view) {
            case 'full':
                return view('listing.listing_list_full', compact('filteredProperties'));
            case 'map':
                return view('listing.listing_list_map', compact('filteredProperties'));
            case 'list':
            default:
                return view('listing.listing_list_sidebar', compact('filteredProperties'));
        }
    }
}
