<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\NewsCategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Version 1 of the API
Route::prefix('v1')->group(function () {
    // Place your V1 API routes here

    // Public routes for V1
    Route::get('/categories', [NewsCategoryController::class, 'index']);

    // Protected routes for V1
    Route::middleware('auth:sanctum')->group(function () {
        // Place any routes that require authentication here
        // For example, updating user preferences
        Route::put('/user/preferences', [UserPreferenceController::class, 'update']);

        // Other protected routes...
    });
});
