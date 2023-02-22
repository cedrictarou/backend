<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// posts用のルート
Route::apiResource('/v1/posts', PostController::class);

// users用のルート
Route::get('/v1/users', [UserController::class, "index"]);

// likes用のルート
Route::post('/v1/like/{postId}', [LikeController::class, 'store']);
Route::delete('/v1/unlike/{postId}', [LikeController::class, 'destroy']);

// comments用のルート
Route::post('/v1/comments/{postId}', [CommentController::class, 'store']);
