<?php

namespace App\Services;

use App\Models\Property;

class OrderService
{
    public function getSortedProperties($sort, $view)
    {
        $query = Property::query();

        switch ($sort) {
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            case 'newest':
                $query->orderBy('created_at', 'desc');
                break;
            case 'oldest':
                $query->orderBy('created_at', 'asc');
                break;
            default:
                break;
        }

        $filteredProperties = $query->paginate(6);

        return [
            'filteredProperties' => $filteredProperties,
            'view' => $view
        ];
    }
}
