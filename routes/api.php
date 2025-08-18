<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\AuthController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

    Route::middleware('auth:sanctum')->get('/me', [AuthController::class, 'me']);
    Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);