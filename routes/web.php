<?php

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\Owner\DashboardController;
use App\Http\Controllers\Owner\Auth\OwnerLoginController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about-us', [HomeController::class, 'aboutUs'])->name('aboutus');
Route::get('/contact-us', [HomeController::class, 'contactUs'])->name('contactus');
Route::post('/contact-us', [HomeController::class, 'postContactUs
'])->name('post.contactus');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');

Route::controller(PropertyController::class)->group(function () {
    //mobile app balnk page for webview
    Route::get('/detail/{slug}', 'detail')->name('property.detail');
    Route::get('/property/{id}', 'propertyview')->name('property.page');
    Route::get('/locationdata','locationdata')->name('property.location');
    Route::get('/property','index')->name('property.search'); // Search
    Route::post('/checkavailabilty','generateRandomRoomAvailabilityData')->name('property.availabilty');

});

Auth::routes(['verify' => true]);
Route::post('register',[UserController::class, 'userRegister'])->name('auth.register');

//Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);


    Route::controller(ProductController::class)->group(function(){
        Route::get('demo-search', 'index');
        Route::get('autocomplete', 'autocomplete')->name('autocomplete');

    });
});


// 27-02-2023

// Owner Login
Route::group(['as' => 'owner.','prefix'=>'owner'], function() {
    Route::post('login',[OwnerLoginController::class,'ownerlogin'] )->name('login');
    Route::get('logout',[OwnerLoginController::class,'logout'] )->name('logout');

    Route::group(['middleware' => ["auth","web"]],function(){
        Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
    });
});





