<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    protected $fillable =
        [
            'air_conditioning',
            'swimming_pool',
            'central_heating',
            'laundry_room',
            'gym',
            'alarm',
            'window_covering'
        ];

    public function properties()
    {
        return $this->belongsToMany(Property::class, 'property_features');
    }

}
