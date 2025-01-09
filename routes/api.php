<?php

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

Route::post('/login', [\App\Http\Controllers\Api\LoginController::class, 'login']);

Route::get('/discussions', [\App\Http\Controllers\Api\DiscussionController::class, 'discussions'])->middleware('auth:sanctum');

Route::get('/answers/{id}', [\App\Http\Controllers\Api\AnswerController::class, 'answersByDiscussion'])->middleware('auth:sanctum');

Route::post('/discussions-like', [\App\Http\Controllers\Api\DiscussionController::class, 'discussionLike'])->middleware('auth:sanctum');

Route::post('/answers-like', [\App\Http\Controllers\Api\AnswerController::class, 'answerLike'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
