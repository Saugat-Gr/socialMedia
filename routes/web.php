<?php

use App\Http\Controllers\UserController;
use App\Models\Comment;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Middleware\TestMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;



Route::middleware('web')->prefix('/auth')->group(function () {
    Route::post('/login', [UserController::class, 'login']);
    Route::post('/register', [UserController::class, 'register']);
    Route::post('/logout', [UserController::class, 'logout']);
});


Route::prefix('api/')->middleware('auth:sanctum')->group(function () {
    Route::prefix('posts')->controller(PostController::class)->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::put('/{id}', 'updatePost')->whereUuid("id");
        Route::delete('/{id}', 'deletePost');
    });


    // Route::apiResource("posts", PostController::class);

    Route::prefix('likes')->controller(LikeController::class)->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::delete('/{id}', 'delete');
    });

    Route::prefix('comments')->controller(CommentController::class)->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::put('/{id}', 'update');
        Route::delete('/{id}', 'delete');
    });


    Route::prefix('follows')->controller(FollowController::class)->group(function () {

        Route::get('/', 'index');
    });
});
