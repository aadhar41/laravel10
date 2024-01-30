<?php

use App\Http\Controllers\Api\V1\PostCommentController;
use App\Http\Controllers\Api\V1\UserAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::fallback(function () {
    return response()->json([
        'message' => 'Not Found!',
    ], 404);
})->name('api.fallback');


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::prefix('v1')->name('api.v1.')->namespace('Api\V1')->group(function () {
Route::prefix('v1')->name('api.v1.')->group(function () {
    Route::post('register', [UserAuthController::class, 'register'])->name('register');
    Route::post('login', [UserAuthController::class, 'login'])->name('login');
    Route::post('logout', [UserAuthController::class, 'logout'])->name('logout')->middleware('auth:sanctum');
    Route::get('/status', function () {
        return response()->json(['status' => 'OK']);
    })->name('status');

    Route::apiResource('posts.comments', PostCommentController::class);
});

Route::prefix('v2')->group(function () {
    Route::get('/status', function () {
        return response()->json(['status' => true]);
    });
});
