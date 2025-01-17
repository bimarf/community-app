<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('auth')->group(function () {
    Route::namespace('App\Http\Controllers\My')->group(function () {
        Route::resource('users', UserController::class)->only(['edit', 'update']);
    });

   Route::namespace('App\Http\Controllers')->group(function () {
       Route::resource('discussions', DiscussionController::class)->only(['create', 'store', 'edit', 'update', 'destroy']);

       Route::post('discussions/{discussion}/like', 'LikeController@discussionLike')
            ->name('discussions.like.like');
        Route::post('discussions/{discussion}/unlike', 'LikeController@discussionUnlike')
            ->name('discussions.like.unlike');

        Route::post('discussions/{discussion}/answer', 'AnswerController@store')
            ->name('discussions.answer.store');

        Route::resource('answers', AnswerController::class)->only(['edit', 'update', 'destroy']);
        Route::post('answers/{answer}/like', 'LikeController@answerLike')->name('answers.like.like');
        Route::post('answers/{answer}/unlike', 'LikeController@answerUnlike')->name('answers.like.unlike');

    });
});

Route::namespace('App\Http\Controllers')->group(function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::resource(('discussions'), DiscussionController::class)->only(['index', 'show']);

    Route::get('discussions/category/{category}', 'CategoryController@show')->name('discussions.categories.show');
});

Route::middleware('guest')->group(function () {
    Route::namespace('App\Http\Controllers\Auth')->group(function () {
        Route::get('login', 'LoginController@show')->name('login');
        Route::post('login', 'LoginController@login')->name('login.post');
        Route::post('logout', 'LoginController@logout')->name('logout');

        Route::get('sign-up', 'SignUpController@show')->name('sign-up');
        Route::post('sign-up', 'SignUpController@signUp')->name('sign-up.post');

    });
});

Route::namespace('App\Http\Controllers\Auth')->group(function () {
    Route::post('logout', 'LoginController@logout')->name('logout');
});

Route::namespace('App\Http\Controllers\My')->group(function () {
    Route::resource('users', UserController::class)->only(['show']);
});
