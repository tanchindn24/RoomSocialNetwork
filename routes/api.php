<?php

use App\Http\Controllers\PublicApi\ApiCategoryPostController;
use App\Http\Controllers\PublicApi\ApiPostsController;
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

Route::get('/posts', [ApiPostsController::class, 'getPosts']);
Route::get('/category', [ApiCategoryPostController::class, 'getCategory']);
Route::get('/post/{id}', [ApiPostsController::class, 'getDetailPost']);
