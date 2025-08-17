<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\AuthController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::middleware('auth:sanctum')->get('/profile', [AuthController::class, 'profile']);
    Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);
});