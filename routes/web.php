<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DevelopmentController;
use App\Http\Controllers\Admin\KepalaRumahController;
use App\Http\Controllers\Admin\SocialAssistanceController;


use App\Http\Controllers\User\ProfileController as UserProfileController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\SocialAssistanceController as UserSocialAssistanceController;
use App\Http\Controllers\User\DevelopmentController as UserDevelopmentController;
use App\Http\Controllers\User\EventController as UserEventController;


Route::prefix('dashboard')->middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/editinfo', [DashboardController::class, 'edit'])->name('dashboard.editinfo');
    Route::get('/editdusun', [DashboardController::class, 'update'])->name('dashboard.editdusun');
    Route::get('/ubah', [DashboardController::class, 'ubah'])->name('dashboard.ubah');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::prefix('/kepala_rumah')->group(function () {
    Route::get('/', [KepalaRumahController::class, 'index'])->name('kepalaRumah.index');
    Route::get('/create', [KepalaRumahController::class, 'create'])->name('kepalaRumah.create');
    Route::get('/manage', [KepalaRumahController::class, 'manage'])->name('kepalaRumah.manage');
});

Route::prefix('/')->group(function () {
    Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
});

Route::prefix('/user')->group(function () {
    Route::get('/', [ProfileController::class, 'index'])->name('user.profile.index');
});



Route::prefix('/social-assistance')->group(function () {
    Route::get('/', [SocialAssistanceController::class, 'index'])->name('social-assistance.index');
    Route::get('/create', [SocialAssistanceController::class, 'create'])->name('social-assistance.create');
    Route::get('/manage', [SocialAssistanceController::class, 'manage'])->name('social-assistance.manage');
    Route::get('/edit', [SocialAssistanceController::class, 'edit'])->name('social-assistance.edit');
});

Route::prefix('/development')->group(function () {
    Route::get('/', [DevelopmentController::class, 'index'])->name('development.index');
    Route::get('/create', [DevelopmentController::class, 'create'])->name('development.create');
    Route::get('/manage', [DevelopmentController::class, 'manage'])->name('development.manage');
    Route::get('/edit', [DevelopmentController::class, 'edit'])->name('development.edit');
});

Route::prefix('/event')->group(function () {
    Route::get('/', [EventController::class, 'index'])->name('event.index');
    Route::get('/create', [EventController::class, 'create'])->name('event.create');
    Route::get('/edit/{id}', [EventController::class, 'edit'])->name('event.edit');
    Route::put('/update/', [EventController::class, 'update'])->name('event.update');
    Route::get('/manage/{id}', [EventController::class, 'manage'])->name('event.manage');
    Route::post('/store', [EventController::class, 'store'])->name('event.store');
});


// ===== USER =====
Route::prefix('/user')->group(function () {
    Route::get('/profile', [UserProfileController::class, 'index'])->name('user.profile.index');
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard.index');
    Route::get('/social-assistance', [UserSocialAssistanceController::class, 'index'])->name('user.social-assistance.index');
    Route::get('/development', [UserDevelopmentController::class, 'index'])->name('user.development.index');
    Route::get('/event', [UserEventController::class, 'index'])->name('user.event.index');
});

require __DIR__.'/auth.php';
