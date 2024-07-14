<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfileController;
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

    Route::middleware('auth')->group(function () {
        Route::prefix('my-profile')->group(function () {
            Route::get('/', [ProfileController::class, 'index'])->name('my-profile');
            Route::get('change-password', [ProfileController::class, 'profilePassword'])->name('profilePassword');
            Route::post('change-password', [ProfileController::class, 'changePassword'])->name('changePassword');
            Route::post('profile/update', [ProfileController::class, 'profileUpdate'])->name('profile.update');
            Route::get('property', [PropertyController::class, 'index'])->name('profile.property');
            Route::post('property', [PropertyController::class, 'store'])->name('property.store');
            Route::get('show', [PropertyController::class, 'show'])->name('property.show');
            Route::get('edit/{id}', [PropertyController::class, 'edit'])->name('property.edit');
        });
    });

Auth::routes();


