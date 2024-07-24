<?php

namespace App\Services\Admin;

use App\Models\Property;

class PropertyService
{

    public function getProperties()
    {
        return Property::query()->with('details')->paginate(10);
    }

    public function updateProperty(Property $property, array $data)
    {
        $property->update($data);
    }

    public function deleteProperty(Property $property)
    {
        $property->delete();
    }
}
