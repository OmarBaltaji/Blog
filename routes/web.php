<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ArticleLikeController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/articles', [ArticlesController::class, 'index'])->name('articles');
//Home


Route::middleware('auth')->group(function () {
    Route::get('/articles/create', [ArticlesController::class, 'create'])->name('articles.create');
    //Create a new article (redirects to a form)

    Route::post('/articles', [ArticlesController::class, 'store']);
    //store articles to database

    Route::post('/articles/{article}/like', [ArticleLikeController::class, 'store']);
    //Store like to database

    Route::delete('/articles/{article}/like', [ArticleLikeController::class, 'destroy']);
    //Delete like from database

    Route::delete('/articles/{article}', [ArticlesController::class, 'destroy']);
    //Delete an article

    Route::get('/articles/{article}/edit', [ArticlesController::class,'edit']);

    Route::put('/articles/{article}', [ArticlesController::class, 'update']);

    Route::post('/articles/{article}', [CommentController::class, 'store']);
    //Store comments to database

    Route::delete('/articles/{article}/comment/{comment}', [CommentController::class, 'destroy']);
});

Route::get('/articles/{article}', [ArticlesController::class, 'show'])->name('articles.show');
//Show each individual Article












