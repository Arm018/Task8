<?php

namespace App\Http\Controllers;

use App\Services\SearchService;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    protected $searchService;

    public function __construct(SearchService $searchService)
    {
        $this->searchService = $searchService;
    }

    public function search(Request $request)
    {
        $filteredProperties = $this->searchService->searchProperties($request);

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
