<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminPropertyRequest;
use App\Models\Admin;
use App\Models\Property;
use App\Services\Admin\PropertyService;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    protected PropertyService $propertyService;

    public function __construct(PropertyService $propertyService)
    {
        $this->propertyService = $propertyService;
    }

    public function index()
    {
        $properties = $this->propertyService->getProperties();
        return view('admin.properties.properties', compact('properties'));
    }

    public function edit(Property $property)
    {
        return view('admin.properties.edit_property', compact('property'));
    }

    public function update(AdminPropertyRequest $request, $id)
    {
        $property = Property::findOrFail($id);
        $this->propertyService->updateProperty($property, $request->validated());
        return redirect()->route('admin.properties')->with('success', 'Property updated successfully');
    }

    public function destroy(Property $property)
    {
        $this->propertyService->deleteProperty($property);
        return redirect()->route('admin.properties')->with('success', 'Property deleted successfully');
    }


}
