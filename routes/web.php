<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

//login
Route::get('/login',[AuthController::class,'index']);
Route::post('/login',[AuthController::class,'login'])->name('login');

//register
Route::get('/register',[AuthController::class,'register']);
// Route::resource('agenda',AgendaController::class);
Route::post('/register',[AuthController::class,'registerStore'])->name('register');

//logout
Route::get('/logout',[AuthController::class,'logout']);

//dashboard
Route::group(['middleware' => ['auth','role:admin,staff,customer']],function(){
    Route::get('/dashboard',[DashboardController::class,'index']);
});

//admin

//staff

//customer


