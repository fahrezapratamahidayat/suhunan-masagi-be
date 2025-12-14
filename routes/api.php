<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\CollectionController;
use App\Http\Controllers\Api\ActivityController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



// API v1 Routes
Route::prefix('v1')->group(function () {
    // Articles
    Route::get('articles', [ArticleController::class, 'index']);
    Route::get('articles/{slug}', [ArticleController::class, 'show']);

    // Collections
    Route::get('collections', [CollectionController::class, 'index']);
    Route::get('collections/{slug}', [CollectionController::class, 'show']);

    // Activities
    Route::get('activities', [ActivityController::class, 'index']);
    Route::get('activities/{slug}', [ActivityController::class, 'show']);

    // Heroes
    Route::get('heroes', [App\Http\Controllers\Api\HeroController::class, 'index']);

    // Dashboard / Analytics
    Route::get('dashboard/stats', [App\Http\Controllers\Api\DashboardController::class, 'stats']);

    // Team Members (Structure)
    Route::get('team-members', [App\Http\Controllers\Api\TeamMemberController::class, 'index']);

    // Visits
    Route::post('/visits', [App\Http\Controllers\Api\VisitorController::class, 'store']);
});
