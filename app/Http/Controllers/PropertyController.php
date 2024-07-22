<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyDetailRequest;
use App\Http\Requests\PropertyRequest;
use App\Models\Feature;
use App\Models\Property;
use App\Models\PropertyDetail;
use App\Models\PropertyImage;
use App\Services\PropertyService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{
    protected $propertyService;

    public function __construct(PropertyService $propertyService)
    {
        $this->propertyService = $propertyService;
    }

    public function index()
    {
        $properties = Auth::user()->properties;
        return view('property.my_properties', compact('properties'));
    }

    public function create()
    {
        $features = Feature::all();
        return view('property.submit_property', compact('features'));
    }

    public function store(PropertyRequest $propertyRequest, PropertyDetailRequest $detailRequest, Property $property, PropertyDetail $propertyDetails)
    {
        $this->propertyService->createProperty($propertyRequest, $detailRequest, $property, $propertyDetails);
        return redirect()->route('property.index')->with('success', 'Property created successfully');
    }

    public function show($id)
    {
        $property = Property::with(['details', 'images', 'user', 'features'])->findOrFail($id);
        return view('property.single_property', compact('property'));
    }

    public function edit($id)
    {
        $property = Property::with('features')->findOrFail($id);
        $features = Feature::all();
        return view('property.edit_property', compact('property', 'features'));
    }

    public function update($id, PropertyRequest $propertyRequest, PropertyDetailRequest $detailRequest)
    {

        $this->propertyService->updateProperty($id, $propertyRequest, $detailRequest);
        return redirect()->route('property.index')->with('success', 'Property updated successfully.');
    }

    public function destroy($id)
    {
        $this->propertyService->destroyProperty($id);
        return redirect()->route('property.index')->with('success', 'Property deleted successfully');
    }


}
