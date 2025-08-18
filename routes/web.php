<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KepalaRumahController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/',[DashboardController::class,'index']);
Route::get('/kepala_rumah',[KepalaRumahController::class,'index'])->name('kepalaRumah.index');