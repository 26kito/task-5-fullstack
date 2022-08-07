<?php

use App\Http\Controllers\Api\ArticleController;
use Illuminate\Http\Request;
use Illuminate\Routing\RouteGroup;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'article'], function() {
    Route::get('/', [ArticleController::class, 'index'])->middleware('client');
    Route::post('/add-article', [ArticleController::class, 'store']);
    Route::get('/category/{id}', [ArticleController::class, 'show'])->middleware('client');
    Route::post('/edit/{id}', [ArticleController::class, 'update']);
    Route::delete('/delete/{id}', [ArticleController::class, 'destroy']);
});