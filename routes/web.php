<?php

use App\Http\Controllers\{ArticleController, CategoryController};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::middleware('auth')->group(function () {
    // Routes for article
    Route::get('/article', [ArticleController::class, 'index'])->name('Article');
    Route::get('/article/create', [ArticleController::class, 'create'])->name('Create Article');
    Route::post('/article/create', [ArticleController::class, 'store'])->name('storeArticle');
    Route::get('/article/edit/{article}', [ArticleController::class, 'edit'])->name('Edit Article');
    Route::post('/article/edit/{article}', [ArticleController::class, 'update'])->name('updateArticle');
    Route::get('/article/delete/{article}', [ArticleController::class, 'destroy'])->name('destroyArticle');

    // Routes for category
    Route::get('/category', [CategoryController::class, 'index'])->name('Category');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('Create Category');
    Route::post('/category/create', [CategoryController::class, 'store'])->name('storeCategory');
    Route::get('/category/edit/{category}', [CategoryController::class, 'edit'])->name('Edit Category');
    Route::post('/category/edit/{category}', [CategoryController::class, 'update'])->name('updateCategory');
    Route::get('/category/delete/{category}', [CategoryController::class, 'destroy'])->name('destroyCategory');

    // Logout
    Route::post('/logout', function (Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    })->name('logout');
});
