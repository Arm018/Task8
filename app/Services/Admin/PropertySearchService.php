<?php

namespace App\Services\Admin;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertySearchService
{
    public function search(Request $request)
    {
        $query = Property::query();
        $query
            ->when($request->get('search_id'), function ($q) use ($request) {
                $q->where('id', $request->get('search_id'));
            })
            ->when($request->get('search_title'), function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->get('search_title') . '%');
            })
            ->when(isset($request->search_status), function ($q) use ($request) {
                $q->where('status', $request->search_status);
            })
            ->when(isset($request->search_type), function ($q) use ($request) {
                $q->where('type', $request->search_type);
            })
            ->when($request->get('search_price'), function ($q) use ($request) {
                $q->where('price', $request->get('search_price'));
            })
            ->when($request->get('search_area'), function ($q) use ($request) {
                $q->where('area', $request->get('search_area'));
            })
            ->when($request->get('search_rooms'), function ($q) use ($request) {
                $q->where('rooms', $request->get('search_rooms'));
            })
            ->when($request->get('search_location'), function ($q) use ($request) {
                $term = $request->get('search_location');
                $q->where(function ($q) use ($term) {
                    $q->where('address', 'like', "%{$term}%")
                        ->orWhere('city', 'like', "%{$term}%")
                        ->orWhere('state', 'like', "%{$term}%")
                        ->orWhere('zip_code', 'like', "%{$term}%");
                });
            })
            ->when($request->get('search_date'), function ($q) use ($request) {
                $q->whereDate('created_at', $request->get('search_date'));
            });

        return $query->paginate(10);
    }
}
