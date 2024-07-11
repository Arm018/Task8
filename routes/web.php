<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\SocialiteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('my-profile',[\App\Http\Controllers\ProfileController::class,'index'])->name('my-profile');
Route::get('change-password',[\App\Http\Controllers\ProfileController::class,'profilePassword'])->name('profilePassword');
Route::post('change-password',[\App\Http\Controllers\ProfileController::class,'changePassword'])->name('changePassword');
Route::post('profile/update',[\App\Http\Controllers\ProfileController::class,'profileUpdate'])->name('profile.update');
Route::get('my-profile/property',[\App\Http\Controllers\PropertyController::class,'index'])->name('profile.property');
Route::post('my-profile/property',[\App\Http\Controllers\PropertyController::class,'store'])->name('property.store');
Route::post('/property/image/upload', [PropertyController::class, 'uploadImage'])->name('property.image.upload');

Auth::routes();


