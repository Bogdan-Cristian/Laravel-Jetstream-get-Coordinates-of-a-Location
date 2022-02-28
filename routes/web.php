<?php

use Illuminate\Support\Facades\Route;
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

Route::middleware(['auth:sanctum', 'verified'])->group(function (){
//    Dashboard
    Route::get('/dashboard', function (){
       return \Inertia\Inertia::render('Dashboard');
    })->name('dashboard');

//    Addresses list
    Route::resource('/addresses', \App\Http\Controllers\AddressesController::class);

//    Radius Search
    Route::get('/searchradius',  [\App\Http\Controllers\SearchRadiusController::class, 'index'])->name('searchradius');
    Route::post('/searchradius/search',  [\App\Http\Controllers\SearchRadiusController::class, 'search'])->name('searchradius.search');
});

