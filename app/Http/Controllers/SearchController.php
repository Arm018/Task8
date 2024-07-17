<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {

        $min_price = $request->input('min_price');
        $max_price = $request->input('max_price');
        $type = $request->input('type');
        $address = $request->input('address');
        $min_area = $request->input('min_area');
        $max_area = $request->input('max_area');
        $beds = $request->input('beds');
        $baths = $request->input('baths');
        $checkboxes = ['air_conditioning', 'swimming_pool', 'central_heating', 'laundry_room', 'gym', 'alarm', 'window_covering'];

        $filteredProperties = Property::query()
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
            ->when($address, function ($query, $address) {
                return $query->where('address', 'LIKE', '%' . $address . '%');
            })
            ->when($min_area, function ($query, $min_area) {
                return $query->where('area', '>=', $min_area);
            })
            ->when($max_area, function ($query, $max_area) {
                return $query->where('area', '<=', $max_area);
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
                return $query;
            })
            ->orderBy('properties.created_at')
            ->paginate(2);

        return view('listing.listing_list_sidebar', compact('filteredProperties'));
    }


}
