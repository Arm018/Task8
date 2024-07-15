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
            return view('profile.property.submit_property');
        }

        public function store(Request $request, PropertyRequest $propertyRequest, PropertyDetailRequest $detailRequest)
        {

            $property = new Property();
            $property->fill(array_merge(['user_id' => auth()->id()], $propertyRequest->validated()));
            $property->save();


            $propertyDetails = new PropertyDetail();
            $propertyDetails->fill(array_merge(['property_id' => $property->id], $detailRequest->validated()));
            $propertyDetails->save();

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $filePath = $image->store('public/images');
                    $propertyImage = new PropertyImage();
                    $propertyImage->property_id = $property->id;
                    $propertyImage->image = $filePath;
                    $propertyImage->save();
                }
            }

            return redirect()->route('property.show')->with('success', 'Property created successfully');

        }

        public function show()
        {
            $properties = Auth::user()->properties;
            return view('profile.property.my_properties', compact('properties'));

        }

        public function edit($id)
        {

            $property = Property::findOrFail($id);
            return view('profile.property.edit_property', compact('property'));
        }

        public function update($id, Request $request, PropertyRequest $propertyRequest, PropertyDetailRequest $detailRequest)
        {
            $property = Property::findOrFail($id);
            $property->fill(array_merge(['user_id' => auth()->id()], $propertyRequest->validated()));
            $property->save();

            $propertyDetails = PropertyDetail::where('property_id', $property->id)->first();

            if ($propertyDetails) {
                $propertyDetails->fill($detailRequest->validated());
            } else {
                $propertyDetails = new PropertyDetail();
                $propertyDetails->fill(array_merge(['property_id' => $property->id], $detailRequest->validated()));
            }
            $propertyDetails->save();

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $filePath = $image->store('public/images');
                    $propertyImage = new PropertyImage();
                    $propertyImage->property_id = $property->id;
                    $propertyImage->image = $filePath;
                    $propertyImage->save();
                }
            }

            return redirect()->route('property.show')->with('success', 'Property updated successfully.');
        }

        public function destroy($id)
        {
            $property = Property::findOrFail($id);
            $property->images()->delete();
            $property->details()->delete();
            $property->delete();
            return redirect()->route('property.show')->with('success', 'Property deleted successfully');
        }


    }
