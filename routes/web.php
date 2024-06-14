<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;

//No Auth Routes
Route::get('/', [DashboardController::class,'index']);

Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified',])->group(function () {
    //Auth Routes
    Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
    Route::get('/users',[UserController::class,'index'])->name('users');
});
