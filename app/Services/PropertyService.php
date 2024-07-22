<?php

namespace App\Services;

use App\Http\Requests\PropertyDetailRequest;
use App\Http\Requests\PropertyRequest;
use App\Models\Property;
use App\Models\PropertyDetail;
use App\Models\PropertyImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertyService
{

    public function createProperty($propertyRequest, $detailRequest, Property $property, PropertyDetail $propertyDetails)
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

        return $property;

    }

    public function updateProperty($id, PropertyRequest $propertyRequest, PropertyDetailRequest $detailRequest)
    {
        $property = Property::findOrFail($id);
        $property->fill(array_merge(['user_id' => auth()->id()], $propertyRequest->validated()));
        $property->save();

        $propertyDetails = PropertyDetail::where('property_id', $property->id)->first() ?? new PropertyDetail();
        $propertyDetails->fill(array_merge(['property_id' => $property->id], $detailRequest->validated()));
        $propertyDetails->save();

        $property->features()->sync($propertyRequest->input('features'));

        $this->handleImages($property->id, $propertyRequest);

        return $property;
    }

    public function destroyProperty($id)
    {
        $property = Property::findOrFail($id);
        $property->images()->delete();
        $property->details()->delete();
        $property->delete();
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
