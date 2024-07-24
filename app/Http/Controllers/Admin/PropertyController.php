<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminPropertyRequest;
use App\Models\Admin;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        $admin = Admin::query()->first();
        $properties = Property::query()->with('details')->paginate(10);
        return view('admin.properties.properties', compact('admin', 'properties'));
    }

    public function edit(Property $property)
    {
        $admin = Admin::query()->first();
        return view('admin.properties.edit_property', compact('admin', 'property'));
    }

    public function update(AdminPropertyRequest $request, $id)
    {
        $property = Property::findOrFail($id);
        $property->update($request->validated());
        return redirect()->route('admin.properties')->with('success', 'Property updated successfully');
    }

    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->route('admin.properties')->with('success', 'Property deleted successfully');
    }


}
