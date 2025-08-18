<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KepalaRumahController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/',[DashboardController::class,'index']);
Route::prefix('/kepala_rumah')->group(function () {
    Route::get('/',[KepalaRumahController::class,'index'])->name('kepalaRumah.index');
    Route::get('/create',[KepalaRumahController::class,'create'])->name('kepalaRumah.create');
});