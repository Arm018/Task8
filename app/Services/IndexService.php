<?php

namespace App\Services;

use App\Models\Property;

class IndexService
{
    public function getProperties()
    {
        return Property::query()
            ->with(['user', 'details', 'images'])
            ->orderByDesc('created_at')
            ->take(5)
            ->get();
    }

}
