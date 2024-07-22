<?php

namespace App\Services;

use App\Models\Property;
use Illuminate\Http\Request;

class SearchService
{
    public function searchProperties(Request $request)
    {
        $min_price = $request->input('min_price');
        $max_price = $request->input('max_price');
        $type = $request->input('type');
        $address = $request->input('address');
        $min_area = $request->input('min_area');
        $max_area = $request->input('max_area');
        $beds = $request->input('beds');
        $baths = $request->input('baths');
        $status = $request->input('status');
        $rooms = $request->input('rooms');
        $age = $request->input('age');

        $checkboxes = ['air_conditioning', 'swimming_pool', 'central_heating', 'laundry_room', 'gym', 'alarm', 'window_covering'];

        $query = Property::query()
            ->join('property_details', 'property_details.property_id', '=', 'properties.id')
            ->when($min_price, function ($query, $min_price) {
                return $query->where('price', '>=', $min_price);
            })
            ->when($max_price, function ($query, $max_price) {
                return $query->where('price', '<=', $max_price);
            })
            ->when($type, function ($query, $type) {
                return $query->where('type', $type);
            })
            ->when($rooms, function ($query, $rooms) {
                return $query->where('rooms', $rooms);
            })
            ->when($address, function ($query, $address) {
                return $query->where('address', 'LIKE', '%' . $address . '%');
            })
            ->when($min_area, function ($query, $min_area) {
                return $query->where('area', '>=', $min_area);
            })
            ->when($max_area, function ($query, $max_area) {
                return $query->where('area', '<=', $max_area);
            })
            ->when($status, function ($query, $status) {
                return $query->where('status', $status);
            })
            ->when($age, function ($query, $age) {
                return $query->where('property_details.building_age', '=', $age);
            })
            ->when($beds, function ($query, $beds) {
                return $query->where('property_details.bedrooms', '=', $beds);
            })
            ->when($baths, function ($query, $baths) {
                return $query->where('property_details.bathrooms', '=', $baths);
            })
            ->when(count($request->only($checkboxes)), function ($query) use ($request, $checkboxes) {
                $query->where(function ($query) use ($request, $checkboxes) {
                    foreach ($checkboxes as $checkbox) {
                        if ($request->has($checkbox)) {
                            $query->orWhere("property_details.{$checkbox}", '=', 1);
                        }
                    }
                });
            })
            ->orderBy('properties.created_at')
            ->paginate(6);

        return $query;
    }
}
