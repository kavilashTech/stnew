<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;


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
    }
    
    );
});