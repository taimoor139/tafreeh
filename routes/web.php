<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\DistrictsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PointsController;
use App\Http\Controllers\StatesController;
use App\Http\Controllers\TownsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => 'guest'], function (){
    Route::get('/register', [AuthenticationController::class, 'registrationForm'])->name('register');
    Route::post('/register', [AuthenticationController::class, 'register'])->name('register');
    Route::get('/login', [AuthenticationController::class, 'loginForm'])->name('login');
    Route::post('/login', [AuthenticationController::class, 'login'])->name('login');
});

Route::group(['middleware' => 'auth'], function (){
    Route::get('/home', [HomeController::class, 'index']);
    Route::get('/logout', [AuthenticationController::class, 'logout'])->name('logout');

    Route::resource('countries', CountriesController::class);
    Route::resource('states', StatesController::class);
    Route::resource('districts', DistrictsController::class);
    Route::resource('towns', TownsController::class);
    Route::resource('points', PointsController::class);
});
