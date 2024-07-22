<?php

namespace App\Http\Controllers;

use App\Services\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function order(Request $request)
    {
        $sort = $request->input('sort');
        $view = $request->input('view', 'list');

        $result = $this->orderService->getSortedProperties($sort, $view);

        return $this->renderView($result['view'], $result['filteredProperties']);
    }

    private function renderView($view, $filteredProperties)
    {
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
