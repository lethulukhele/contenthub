<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ContentController;
use App\Http\Controllers\Api\AuthController;

Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/auth/logout', [AuthController::class, 'logout']);
    
    Route::apiResource('content', ContentController::class);
    Route::get('content/published', [ContentController::class, 'published']);
});
