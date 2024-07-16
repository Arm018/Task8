<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\IndexController;
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


Route::get('/', [IndexController::class, 'index']);
Route::get('single_property/{id}', [PropertyController::class, 'show'])->name('single.property');

Route::middleware('auth')->group(function () {

    Route::get('home2', [IndexController::class, 'index2'])->name('home2');
    Route::get('home3', [IndexController::class, 'index3'])->name('home3');
    Route::get('home4', [IndexController::class, 'index4'])->name('home4');

    Route::get('contactUs', [ContactUsController::class, 'index'])->name('contactUs');
    Route::post('contactUs', [ContactUsController::class, 'store'])->name('contactUs.store');

    Route::prefix('my-profile')->group(function () {
        Route::get('/', [ProfileController::class, 'index'])->name('my-profile');
        Route::get('change-password', [ProfileController::class, 'profilePassword'])->name('profilePassword');
        Route::post('change-password', [ProfileController::class, 'changePassword'])->name('changePassword');
        Route::post('profile/update', [ProfileController::class, 'profileUpdate'])->name('profile.update');
        Route::resource('property', PropertyController::class);
    });

});

Auth::routes();


