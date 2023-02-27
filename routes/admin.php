<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\AreasController;

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
    }
    
    );
});