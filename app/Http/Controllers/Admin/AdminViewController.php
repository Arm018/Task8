<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminPropertyRequest;
use App\Http\Requests\PropertyRequest;
use App\Models\Admin;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;

class AdminViewController extends Controller
{

    public function dashboard()
    {
        $admin = Admin::query()->first();
        $users = User::query()->count();
        $properties = Property::query()->count();
        return view('admin.dashboard', compact('admin','users','properties'));
    }

    public function users()
    {
        $admin = Admin::query()->first();
        $users = User::query()->with('userInfo')->paginate(10);
        return view('admin.user_list', compact('users', 'admin'));
    }

    public function properties()
    {
        $admin = Admin::query()->first();
        $properties = Property::query()->with('details')->paginate(10);
        return view('admin.properties.properties', compact('admin', 'properties'));
    }

    public function editProperty(Property $property)
    {
        $admin = Admin::query()->first();
        return view('admin.properties.edit_property', compact('admin', 'property'));
    }

    public function updateProperty(AdminPropertyRequest $request, $id)
    {
        $property = Property::findOrFail($id);


        $property->update($request->validated());

        return redirect()->route('admin.properties')->with('success', 'Property updated successfully');
    }

    public function destroyProperty(Property $property)
    {
        $property->delete();

        return redirect()->route('admin.properties')->with('success', 'Property deleted successfully');
    }
}
