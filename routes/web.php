<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
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


Route::get('/', [\App\Http\Controllers\IndexController::class, 'index']);
Route::get('single_property/{id}', [PropertyController::class, 'showProperty'])->name('single.property');

Route::middleware('auth')->group(function () {
    Route::get('home2', [\App\Http\Controllers\IndexController::class, 'index2'])->name('home2');
    Route::get('home3', [\App\Http\Controllers\IndexController::class, 'index3'])->name('home3');
    Route::get('contactUs', [\App\Http\Controllers\ContactUsController::class, 'index'])->name('contactUs');
    Route::post('contactUs', [\App\Http\Controllers\ContactUsController::class, 'store'])->name('contactUs.store');
    Route::prefix('my-profile')->group(function () {
        Route::get('/', [ProfileController::class, 'index'])->name('my-profile');
        Route::get('change-password', [ProfileController::class, 'profilePassword'])->name('profilePassword');
        Route::post('change-password', [ProfileController::class, 'changePassword'])->name('changePassword');
        Route::post('profile/update', [ProfileController::class, 'profileUpdate'])->name('profile.update');
//        Route::get('property', [PropertyController::class, 'index'])->name('profile.property');
//        Route::post('property', [PropertyController::class, 'store'])->name('property.store');
//        Route::get('show', [PropertyController::class, 'show'])->name('property.show');
//        Route::get('edit/{id}', [PropertyController::class, 'edit'])->name('property.edit');
//        Route::put('update/{id}', [PropertyController::class, 'update'])->name('property.update');
//        Route::delete('destroy/{id}', [PropertyController::class, 'destroy'])->name('property.destroy');
        Route::resource('property', PropertyController::class);
    });

});

Auth::routes();


