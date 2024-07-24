<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Property;
use App\Services\Admin\PropertySearchService;
use Illuminate\Http\Request;

class PropertySearchController extends Controller
{
    protected PropertySearchService $propertySearchService;

    public function __construct(PropertySearchService $propertySearchService)
    {
        $this->propertySearchService = $propertySearchService;
    }

    public function search(Request $request)
    {
        $properties = $this->propertySearchService->search($request);
        return view('admin.properties.properties', compact('properties'));
    }


}
