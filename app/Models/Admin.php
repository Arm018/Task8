<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class Admin extends Authenticatable
{
    protected $fillable = [
        'name',
        'email',
        'password'
    ];

    public static function getAuthAdmin()
    {
        return Auth::guard('admin')->user();
    }
}
