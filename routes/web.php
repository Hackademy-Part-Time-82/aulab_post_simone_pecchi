<?php


use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PublicController::class, 'homepage'])->name('homepage');

// Articoli

Route::get('/articles/index', [ArticleController::class, 'index'])->name('article.index');
Route::get('/articles/show/{article}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/articles/category/{category}', [ArticleController::class, 'byCategory'])->name('article.byCategory');
Route::get('/articles/user/{user}', [ArticleController::class, 'byUser'])->name('article.byUser');
Route::get('/articles/search', [ArticleController::class, 'articleSearch'])->name('article.search');

// Lavora con noi
Route::get('/careers', [PublicController::class, 'careers'])->name('careers');
Route::post('/careers/submit', [PublicController::class, 'careersSubmit'])->name('careers.submit');


// Admin
Route::middleware('admin')->group(function () {
    
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::patch('/admin/{user}/set-admin', [AdminController::class, 'setAdmin'])->name('admin.setAdmin');
    Route::patch('/admin/{user}/set-revisor', [AdminController::class, 'setRevisor'])->name('admin.setRevisor');
    Route::patch('/admin/{user}/set-writer', [AdminController::class, 'setWriter'])->name('admin.setWriter');
});
//Revisore
Route::middleware('revisor')->group(function () {
    Route::get('/revisor/dashboard', [RevisorController::class, 'dashboard'])->name('revisor.dashboard');
    Route::post('/revisor/{article}/accept', [RevisorController::class, 'acceptArticle'])->name('revisor.acceptArticle');
    Route::post('/revisor/{article}/reject', [RevisorController::class, 'rejectArticle'])->name('revisor.rejectArticle');
    Route::post('/revisor/{article}/undo', [RevisorController::class, 'undoArticle'])->name('revisor.undoArticle');
});

//Writer
Route::middleware('writer')->group(function () {
    Route::get('/articles/create', [ArticleController::class, 'create'])->name('article.create');
    Route::post('/articles/store', [ArticleController::class, 'store'])->name('article.store');   
});


