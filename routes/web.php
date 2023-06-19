<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Clients\ClientsController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\UserController;

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

// start route font-end
Route::prefix('Clients')->name('Clients.')->group(function()
{
    // route pages contents clients
    Route::group(['prefix' =>'Contents'], function()
    {
        Route::get('/',[ClientsController::class,'index'])->name('index');

        Route::get('shop',[ClientsController::class,'shop'])->name('shop');

        Route::get('shopdetail',[ClientsController::class,'shopdetail'])->name('shopdetail');

        Route::get('cart',[ClientsController::class,'cart'])->name('cart');

        Route::get('checkout',[ClientsController::class,'checkout'])->name('checkout');

        Route::get('contact',[ClientsController::class,'contact'])->name('contact');

        // Route::get('search',[ClientsController::class,'search'])->name('search');
    });

});
// end route font-end

// ===============================================================================================================

// start route admin
Route::prefix('Admins')->name('Admins.')->group(function()
{
    Route::get('/',[LoginController::class,'getLogin'])->name('login');
    
    Route::get('index/',[AdminController::class,'index'])->name('index');

    // route login 
    Route::group(['prefix' =>'login'], function()
    {           
        Route::post('login/',[LoginController::class,'postLogin'])->name('postLogin');    
    });

    // group route của users
    Route::group(['prefix' =>'users'], function()
    {
        // route của trang quản lý users
        Route::get('listuser/',[UserController::class,'listuser'])->name('listuser');
        // route của trang bảng users
        Route::get('manageusers/',[UserController::class,'manageusers'])->name('manageusers');
            
        Route::get('create/',[UserController::class,'getCreate'])->name('create');
            
        Route::post('create/',[UserController::class,'postCreate']);
            
        Route::get('edit/{id}',[UserController::class,'getEditCate']);

        Route::post('edit/{id}',[UserController::class,'postEditCate']);
            
        Route::get('delete/{id}',[UserController::class,'delete']);      
    });



});



// end route back-end