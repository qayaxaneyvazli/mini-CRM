<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployerController;
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
    if(auth()->user()){
        auth()->user()->assignRole('user');
    }
    if(auth()->user()==='admin'){
        auth()->user()->assignRole('admin');
    }
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function(){


    Route::get('/companies', function () {
        return view('companies.companies');
    });
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/employers', function () {
        return view('employers.employers');

    });
    Route::resource('/companies', CompanyController::class);
    Route::resource('/employers', EmployerController::class);
});
