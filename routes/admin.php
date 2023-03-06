<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\AreasController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\StaytypeController;
use App\Http\Controllers\Admin\AmenitiesController;
use App\Http\Controllers\Admin\AmenityListController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::get('login', [LoginController::class, 'showAdminLoginForm'])->name('show.admin.form');
    Route::post('submit', [LoginController::class, 'adminlogin'])->name('submit.login');

    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/logout',[LoginController::class,'logout'])->name('logout');
        // Route::get('/logout',[LoginController::class,'logout'])->name('logout');

        // Location
        Route::resource('locations', LocationController::class);
        Route::get('{locationId}/areas/',[AreasController::class,'index'])->name('areas');
        Route::get('{locationId}/areas/edit/{id}',[AreasController::class,'edit'])->name('areas.edit');
        Route::patch('{locationId}/areas/update/{id}',[AreasController::class,'update'])->name('areas.update');
        Route::get('{locationId}/areas/create',[AreasController::class,'create'])->name('areas.create');
        Route::post('{locationId}/areas/create',[AreasController::class,'store'])->name('areas.store');
        Route::delete('{locationId}/areas/delete/{id}',[AreasController::class,'destroy'])->name('areas.delete');

        Route::get('/vacancyupdate/{id}', [RoomController::class,'vacancyupdate'])->name('room.vacancyupdate');
        Route::get('roomvacancyupdate/{id}',[RoomController::class,'roomvacancyupdate'])->name('room.roomvacancyupdate');
        Route::get('vacancyupdate',[RoomController::class,'vacancyroomupdate'])->name('room.vacancyroomupdate');

        Route::post('roomavailability',[RoomController::class,'availabilityUpdate'])->name('rooms.availabiltyupdate');
        Route::post('availabiltybulkupdate', [RoomController::class,'availabiltybulkupdate'])->name('rooms.availabiltybulkupdate');
        // Dashboard related routes
        Route::post('owner/approved',[DashboardController::class,'ownerApprovel'])->name('ownerapprovel');
        Route::post('property/approved',[DashboardController::class,'propertyApprovel'])->name('propertyapprovel');


        // Property routes
        Route::resource('properties-categories', StaytypeController::class);

        // Amenties
        Route::get('amenities/{level}',[AmenitiesController::class,'index'])->name('amenities');       
        Route::get('amenities/{level}/create',[AmenitiesController::class,'create'])->name('amenities.create');       
        Route::post('amenities/create',[AmenitiesController::class,'store'])->name('amenities.create.store');       
        Route::patch('amenities/{level}/update/{id}',[AmenitiesController::class,'update'])->name('amenities.update');       
        Route::get('amenities/{level}/edit/{id}',[AmenitiesController::class,'edit'])->name('amenities.edit');       
        Route::delete('amenities/{id}',[AmenitiesController::class,'destroy'])->name('amenities.destroy');

        // Route for amenity list
        Route::get('amenities/list/{parentid}/',[AmenityListController::class,'index'])->name('amenities.list');     
        Route::get('amenities/list/{parentid}/create',[AmenityListController::class,'create'])->name('amenities.list.create');   
        Route::post('amenities/list/{parentid}/create',[AmenityListController::class,'store'])->name('amenities.list.store');   

        Route::get('amenities/list/{parentid}/edit/{id}',[AmenityListController::class,'edit'])->name('amenities.list.edit');   
        Route::patch('amenities/list/{parentid}/edit/{id}/update',[AmenityListController::class,'update'])->name('amenities.list.update');   
        Route::delete('amenities/list/{id}',[AmenityListController::class,'destroy'])->name('amenities.list.destroy');

    });


});

