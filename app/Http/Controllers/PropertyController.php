<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyDetailRequest;
use App\Http\Requests\PropertyRequest;
use App\Models\Feature;
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
        $features = Feature::all();
        return view('property.submit_property', compact('features'));
    }

    public function store(PropertyRequest $propertyRequest, PropertyDetailRequest $detailRequest, Property $property, PropertyDetail $propertyDetails)
    {

        $property->user_id = Auth::id();
        $property->fill($propertyRequest->validated());
        $property->save();

        $propertyDetails->property_id = $property->id;
        $propertyDetails->fill($detailRequest->validated());
        $propertyDetails->save();


        if ($propertyRequest->has('features')) {
            $property->features()->attach($propertyRequest->input('features'));
        }

        $this->handleImages($property->id, $propertyRequest);

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
        $property = Property::findOrFail($id);
        $property->fill(array_merge(['user_id' => auth()->id()], $propertyRequest->validated()));
        $property->save();

        $propertyDetails = PropertyDetail::where('property_id', $property->id)->first() ?? new PropertyDetail();
        $propertyDetails->fill(array_merge(['property_id' => $property->id], $detailRequest->validated()));
        $propertyDetails->save();

        $property->features()->sync($propertyRequest->input('features'));

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
