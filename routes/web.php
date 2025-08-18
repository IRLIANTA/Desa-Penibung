<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KepalaRumahController;
use App\Http\Controllers\Admin\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', [DashboardController::class, 'index']);
Route::prefix('/kepala_rumah')->group(function () {
    Route::get('/', [KepalaRumahController::class, 'index'])->name('kepalaRumah.index');
    Route::get('/create', [KepalaRumahController::class, 'create'])->name('kepalaRumah.create');
    Route::get('/manage', [KepalaRumahController::class, 'manage'])->name('kepalaRumah.manage');
});

Route::prefix('/')->group(function () {
    Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
});
