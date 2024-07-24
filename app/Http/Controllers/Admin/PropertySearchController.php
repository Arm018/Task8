<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertySearchController extends Controller
{
    public function search(Request $request)
    {
        $admin = Admin::query()->first();
        $query = Property::query();

        if ($request->has('search_id') && $request->get('search_id') !== null) {
            $query->where('id', $request->get('search_id'));
        }

        if ($request->has('search_title') && $request->get('search_title') !== null) {
            $query->where('title', 'like', "%" . $request->get('search_title') . "%");
        }

        if ($request->has('search_status') && $request->get('search_status') !== null) {
            $query->where('status', $request->get('search_status'));
        }

        if ($request->has('search_type') && $request->get('search_type') !== null) {
            $query->where('type', $request->get('search_type'));
        }

        if ($request->has('search_price') && $request->get('search_price') !== null) {
            $query->where('price', 'like', "%" . $request->get('search_price') . "%");
        }

        if ($request->has('search_area') && $request->get('search_area') !== null) {
            $query->where('area', 'like', "%" . $request->get('search_area') . "%");
        }

        if ($request->has('search_rooms') && $request->get('search_rooms') !== null) {
            $query->where('rooms', 'like', "%" . $request->get('search_rooms') . "%");
        }

        if ($request->has('search_location') && $request->get('search_location') !== null) {
            $query->where(function($q) use ($request) {
                $term = $request->get('search_location');
                $q->where('address', 'like', "%{$term}%")
                    ->orWhere('city', 'like', "%{$term}%")
                    ->orWhere('state', 'like', "%{$term}%")
                    ->orWhere('zip_code', 'like', "%{$term}%");
            });
        }

        if ($request->has('search_date') && $request->get('search_date') !== null) {
            $query->whereDate('created_at', $request->get('search_date'));
        }

        $properties = $query->paginate(10);

        return view('admin.properties.properties', compact('properties', 'admin'));
    }


}
