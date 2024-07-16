<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyDetailRequest;
use App\Http\Requests\PropertyRequest;
use App\Models\Property;
use App\Models\PropertyDetail;
use App\Models\PropertyImage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Auth::user()->properties;
        return view('property.my_properties', compact('properties'));
    }

    public function create()
    {
        return view('property.submit_property');
    }

    public function store(PropertyRequest $propertyRequest, PropertyDetailRequest $detailRequest)
    {
        $property = new Property();
        $property->fill(array_merge(['user_id' => auth()->id()], $propertyRequest->validated()));
        $property->save();

        $propertyDetails = new PropertyDetail();
        $propertyDetails->fill(array_merge(['property_id' => $property->id], $detailRequest->validated()));
        $propertyDetails->save();

        $this->handleImages($property->id, $propertyRequest);

        return redirect()->route('property.index')->with('success', 'Property created successfully');
    }

    public function show($id)
    {
        $property = Property::with(['details', 'images', 'user'])->findOrFail($id);
        return view('property.single_property', compact('property'));
    }

    public function edit($id)
    {
        $property = Property::findOrFail($id);
        return view('property.edit_property', compact('property'));
    }

    public function update($id, PropertyRequest $propertyRequest, PropertyDetailRequest $detailRequest)
    {
        $property = Property::findOrFail($id);
        $property->fill(array_merge(['user_id' => auth()->id()], $propertyRequest->validated()));
        $property->save();

        $propertyDetails = PropertyDetail::where('property_id', $property->id)->first() ?? new PropertyDetail();
        $propertyDetails->fill(array_merge(['property_id' => $property->id], $detailRequest->validated()));
        $propertyDetails->save();

        $this->handleImages($property->id, $propertyRequest);

        return redirect()->route('property.index')->with('success', 'Property updated successfully.');
    }

    public function destroy($id)
    {
        $property = Property::findOrFail($id);
        $property->images()->delete();
        $property->details()->delete();
        $property->delete();
        return redirect()->route('property.index')->with('success', 'Property deleted successfully');
    }

    private function handleImages(int $propertyId, Request $request)
    {
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filePath = $image->store('public/images');
                $propertyImage = new PropertyImage();
                $propertyImage->property_id = $propertyId;
                $propertyImage->image = $filePath;
                $propertyImage->save();
            }
        }
    }
}
