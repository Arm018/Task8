<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
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
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function details()
    {
        return $this->hasMany(PropertyDetail::class,'property_id','id');
    }
    public function images()
    {
        return $this->hasMany(PropertyImage::class, 'property_id', 'id');
    }
    public function timeFormat(Property $property)
    {
        $createdAt = $property->created_at;
        $createdAtPlus10 = $createdAt->copy()->addDays(10);
        $formattedDate = $createdAtPlus10->format('F d, Y');

        return $formattedDate;
    }
}
