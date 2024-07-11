<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyDetailRequest;
use App\Http\Requests\PropertyRequest;
use App\Models\Property;
use App\Models\PropertyDetail;
use App\Models\PropertyImage;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        return view('profile.property.submit_property');
    }

    public function store(PropertyRequest $propertyRequest, PropertyDetailRequest $detailRequest)
    {


        $property = new Property();
        $property->fill(array_merge(['user_id' => auth()->id()], $propertyRequest->validated()));
        $property->save();


        $propertyDetails = new PropertyDetail();
        $propertyDetails->fill(array_merge(['property_id' => $property->id], $detailRequest->validated()));
        $propertyDetails->save();


        return redirect()->route('profile.property')->with('success', 'Property created successfully');

    }
    public function uploadImage(Request $request)
    {
        dd($request->all());
        $uploadedFiles = $request->file('file');

        foreach ($uploadedFiles as $file) {
            // Validate and store each uploaded file
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/images', $fileName);

            // Save file path to database
            $propertyImage = new PropertyImage();
            $propertyImage->property_id = $request->property_id; // Adjust as per your property_id handling
            $propertyImage->image = 'storage/images/' . $fileName;
            $propertyImage->save();
        }

        return response()->json(['success' => 'Images uploaded successfully.']);
    }


}
