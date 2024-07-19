<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    const STATUS_SALE = 0;
    const STATUS_RENT = 1;
    const TYPE_APARTMENT = 0;
    const TYPE_HOUSE = 1;
    const TYPE_COMMERCIAL = 2;
    const TYPE_GARAGE = 3;
    const TYPE_LOT = 4;
    const STATUSES = [
        self::STATUS_SALE => 'For Sale',
        self::STATUS_RENT => 'For Rent',
    ];
    const TYPES = [
        self::TYPE_APARTMENT => 'Apartment',
        self::TYPE_HOUSE => 'House',
        self::TYPE_COMMERCIAL => 'Commercial',
        self::TYPE_GARAGE => 'Garage',
        self::TYPE_LOT => 'Lot',
    ];


    protected $fillable = [
        'title',
        'status',
        'type',
        'price',
        'area',
        'rooms',
        'address',
        'city',
        'state',
        'zip_code',
        'expiration_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function details()
    {
        return $this->hasOne(PropertyDetail::class, 'property_id', 'id');
    }

    public function images()
    {
        return $this->hasMany(PropertyImage::class, 'property_id', 'id');
    }

    public function features()
    {
        return $this->belongsToMany(Feature::class, 'property_features');
    }

    public function getStatusName()
    {
        return self::STATUSES[$this->status];
    }

    public function getTypeName()
    {
        return self::TYPES[$this->type];
    }


}
