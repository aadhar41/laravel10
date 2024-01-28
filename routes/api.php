<?php

use App\Http\Controllers\Api\V1\PostCommentController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::prefix('v1')->name('api.v1.')->namespace('Api\V1')->group(function () {
Route::prefix('v1')->name('api.v1.')->group(function () {
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
