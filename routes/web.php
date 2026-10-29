<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/login',[AuthController::class,'index']);
Route::post('/login',[AuthController::class,'login'])->name('login');
Route::get('/logout',[AuthController::class,'logout']);
Route::group(['middleware' => ['auth','role:admin,finance']],function(){
    Route::get('/dashboard',[DashboardController::class,'index']);
});
// MASIH ADA KESALAHAN DI ROUTE STAFF
// Route::group(['middleware' => ['auth','role:staff']],function(){
//     Route::get('/staff', function(){
//         return 'halaman staff';
//     });
// });