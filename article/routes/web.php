<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::middleware('auth')->group(function() {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/articles', [ArticleController::class, 'index'])->name('articles');
    
    Route::get('/add-article', [ArticleController::class, 'create']);
    Route::post('/add-article', [ArticleController::class, 'store']);

    Route::get('/edit-article/{id}', [ArticleController::class, 'edit']);
    Route::put('/edit-article/{id}', [ArticleController::class, 'update']);

    Route::get('/delete-article/{id}', [ArticleController::class, 'destroy']);
});
