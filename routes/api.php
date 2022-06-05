<?php

use App\Http\Controllers\Api\ArticleController;
use Illuminate\Http\Request;
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

Route::get('/article', [ArticleController::class, 'allPost']);
Route::get('/article/{article}', [ArticleController::class, 'show']);
Route::post('/article', [ArticleController::class, 'create']);
Route::patch('/article/{article}', [ArticleController::class, 'update']);
Route::delete('/article/{article}', [ArticleController::class, 'delete']);
