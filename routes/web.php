<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminViewController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\SearchController;
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
Route::get('home2', [IndexController::class, 'index2'])->name('home2');
Route::get('home3', [IndexController::class, 'index3'])->name('home3');
Route::get('home4', [IndexController::class, 'index4'])->name('home4');

Route::get('single_property/{id}', [PropertyController::class, 'show'])->name('single.property');

Route::get('search', [SearchController::class, 'search'])->name('search');
Route::get('order', [OrderController::class, 'order'])->name('order');

Route::prefix('admin')->group(function () {
    Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [AdminAuthController::class, 'login']);
});


Route::prefix('admin')->middleware('admin')->group(function () {
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    Route::get('dashboard', [AdminViewController::class,'dashboard'])->name('admin.dashboard');
    Route::get('users', [AdminViewController::class,'users'])->name('admin.users');
    Route::get('properties', [AdminViewController::class,'properties'])->name('admin.properties');
    Route::get('properties/{property}/edit', [AdminViewController::class, 'editProperty'])->name('admin.properties.edit');
    Route::put('properties/{property}', [AdminViewController::class, 'updateProperty'])->name('admin.properties.update');
    Route::delete('properties/{property}', [AdminViewController::class, 'destroyProperty'])->name('admin.properties.destroy');
});



Route::middleware('auth')->group(function () {

    Route::get('contacts', [ContactController::class, 'index'])->name('contact');
    Route::post('contacts', [ContactController::class, 'store'])->name('contact.store');

    Route::post('bookmark/toggle', [FavoriteController::class, 'toggle'])->name('bookmark.toggle');
    Route::prefix('my-profile')->group(function () {
        Route::get('/', [ProfileController::class, 'index'])->name('my-profile');
        Route::get('favorites', [FavoriteController::class, 'index'])->name('favorites');
        Route::delete('/favorites/{propertyId}', [FavoriteController::class, 'destroy'])->name('favorite.destroy');
        Route::get('change-password', [ProfileController::class, 'profilePassword'])->name('profilePassword');
        Route::post('change-password', [ProfileController::class, 'changePassword'])->name('changePassword');
        Route::post('profile/update', [ProfileController::class, 'profileUpdate'])->name('profile.update');
        Route::resource('property', PropertyController::class);
    });

});

Auth::routes();


