<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PublicController::class, "homepage"])->name("homepage");
Route::get('/articles/create', [ArticleController::class, "create"])->name("article.create");
Route::post('/articles/store', [ArticleController::class, "store"])->name("article.store");
Route::get('/articles/index', [ArticleController::class, "index"])->name("article.index");
Route::get('/articles/show{article}', [ArticleController::class, "show"])->name("article.show");
Route::get('/articles/category{category}', [ArticleController::class, "byCategory"])->name("article.byCategory");
Route::get('/articles/user/{user}', [ArticleController::class, 'byUser'])->name('article.byUser');
