<?php
use App\Http\Controllers\GoalController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::apiResource('goals', GoalController::class);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});