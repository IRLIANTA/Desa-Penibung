<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\StatistikController;
use App\Http\Controllers\Admin\DevelopmentController;
use App\Http\Controllers\Admin\KepalaRumahController;
use App\Http\Controllers\Admin\SocialAssistanceController;

Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
Route::prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    // middleware
    Route::middleware('auth')->group(function () {
        Route::get('/editdusun', [DashboardController::class, 'update'])->name('dashboard.editdusun');
        Route::get('/ubah', [DashboardController::class, 'ubah'])->name('dashboard.ubah');
        // Statistik
        Route::put('/updatestatistik', [StatistikController::class, 'updateStatistik'])->name('dashboard.updatestatistik');
        // penduduk
        Route::put('/updatependuduk', [StatistikController::class, 'updatePenduduk'])->name('dashboard.updatependuduk');
        // dusun
        Route::post('/storedusun', [DashboardController::class, 'storeDusun'])->name('dashboard.storedusun');
        Route::put('/updatedusun/{id}', [DashboardController::class, 'updateDusun'])->name('dashboard.updatedusun');
        Route::delete('/deletedusun/{id}', [DashboardController::class, 'deleteDusun'])->name('dashboard.deletedusun');
    });
});


// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::middleware('auth')->group(function () {});


Route::prefix('/kepala_rumah')->group(function () {
    Route::get('/', [KepalaRumahController::class, 'index'])->name('kepalaRumah.index');
    Route::get('/manage', [KepalaRumahController::class, 'manage'])->name('kepalaRumah.manage');
    // middleware
    Route::middleware('auth')->group(function () {
        Route::get('/create', [KepalaRumahController::class, 'create'])->name('kepalaRumah.create');
    });
});

Route::prefix('/profile')->group(function () {
    Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
    // middleware
    Route::middleware('auth')->group(function () {
        Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/update', [ProfileController::class, 'update'])->name('profile.update');
        Route::get('/media-foto', [ProfileController::class, 'media'])->name('profile.media.index');
        // Media
        Route::post('/storefoto', [MediaController::class, 'store'])->name('profile.media.store');
        Route::put('/updatefoto/{id}', [MediaController::class, 'update'])->name('profile.media.update');
        Route::delete('/destroyfoto/{id}', [MediaController::class, 'destroy'])->name('profile.media.destroy');
    });
});

Route::prefix('/user')->group(function () {
    Route::get('/', [ProfileController::class, 'index'])->name('user.profile.index');
});

Route::prefix('/social-assistance')->group(function () {
    Route::get('/', [SocialAssistanceController::class, 'index'])->name('social-assistance.index');
    Route::get('/manage/{id}', [SocialAssistanceController::class, 'manage'])->name('social-assistance.manage');
    // middleware
    Route::middleware('auth')->group(function () {
        Route::get('/create', [SocialAssistanceController::class, 'create'])->name('social-assistance.create');
        Route::post('/store', [SocialAssistanceController::class, 'store'])->name('social-assistance.store');
        Route::get('/edit/{id}', [SocialAssistanceController::class, 'edit'])->name('social-assistance.edit');
        Route::put('/update/', [SocialAssistanceController::class, 'update'])->name('social-assistance.update');
        Route::delete('/delete/{id}', [SocialAssistanceController::class, 'destroy'])->name('social-assistance.destroy');
    });
});

Route::prefix('/development')->group(function () {
    Route::get('/', [DevelopmentController::class, 'index'])->name('development.index');
    Route::get('/manage/{id}', [DevelopmentController::class, 'manage'])->name('development.manage');
    // middleware
    Route::middleware('auth')->group(function () {
        Route::get('/create', [DevelopmentController::class, 'create'])->name('development.create');
        Route::post('/store', [DevelopmentController::class, 'store'])->name('development.store');
        Route::get('/edit/{id}', [DevelopmentController::class, 'edit'])->name('development.edit');
        Route::put('/update', [DevelopmentController::class, 'update'])->name('development.update');
        Route::delete('/destroy{id}', [DevelopmentController::class, 'destroy'])->name('development.destroy');
    });
});

Route::prefix('/event')->group(function () {
    Route::get('/', [EventController::class, 'index'])->name('event.index');
    Route::get('/manage/{id}', [EventController::class, 'manage'])->name('event.manage');
    // middleware
    Route::middleware('auth')->group(function () {
        Route::get('/create', [EventController::class, 'create'])->name('event.create');
        Route::get('/edit/{id}', [EventController::class, 'edit'])->name('event.edit');
        Route::put('/update/', [EventController::class, 'update'])->name('event.update');
        Route::delete('/delete/{id}', [EventController::class, 'destroy'])->name('event.destroy');
        Route::post('/store', [EventController::class, 'store'])->name('event.store');
    });
});

Route::prefix('/feedback')->group(function () {
    // middleware selain admin
    Route::middleware(['cekAdmin'])->group(function () {
        Route::get('/', [FeedbackController::class, 'index'])->name('feedback.index');
        Route::get('/manage/{id}', [FeedbackController::class, 'manage'])->name('feedback.manage');
        Route::post('/store', [FeedbackController::class, 'store'])->name('feedback.store');
    });

    // middleware
    Route::middleware('auth')->group(function () {
        Route::get('/user', [FeedbackController::class, 'feedbackUser'])->name('feedback.user');
        Route::get('/getdata', [FeedbackController::class, 'getData'])->name('feedback.data');
        Route::post('/updatestatus/{id}', [FeedbackController::class, 'updateStatus']);
        Route::get('/widget-data', [FeedbackController::class, 'widgetData']);
        Route::post('/{id}/mark-as-read', [FeedbackController::class, 'dibaca'])->name('feedback.markAsRead');
        Route::get('/edit/{id}', [FeedbackController::class, 'edit'])->name('feedback.edit');
        Route::put('/update/', [FeedbackController::class, 'update'])->name('feedback.update');
        Route::delete('/delete/{id}', [FeedbackController::class, 'destroy'])->name('feedback.destroy');
    });
});


require __DIR__ . '/auth.php';
