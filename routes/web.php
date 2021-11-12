<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LanguageController;

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

//Route::middleware(['verified'])->group(['prefix'=>'{language}'],function(){
//
//
//
//});


Route::middleware(['auth:sanctum', 'verified'])->group(function(){
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('/companies', CompanyController::class);
    Route::resource('/employers', EmployerController::class);


});

//Users section only for Admins
Route::middleware(['auth:sanctum','role:Admin', 'verified'])->group(function(){
        Route::resource('/users', UserController::class);
});
