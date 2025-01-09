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
   Route::namespace('App\Http\Controllers')->group(function () {
       Route::resource('discussions', DiscussionController::class)->only(['create', 'store', 'edit', 'update', 'destroy']);
   });
});

Route::namespace('App\Http\Controllers')->group(function () {
    Route::resource(('discussions'), DiscussionController::class)->only(['index', 'show']);
});

Route::get('/', function () {
    return view('home');
})->name('home');

Route::namespace('App\Http\Controllers\Auth')->group(function () {
    Route::get('login', 'LoginController@show')->name('login');
    Route::post('login', 'LoginController@login')->name('login.post');
    Route::post('logout', 'LoginController@logout')->name('logout');

    Route::get('sign-up', 'SignUpController@show')->name('sign-up');
    Route::post('sign-up', 'SignUpController@signUp')->name('sign-up.post');

});

Route::get('discussions/show', function () {
    return view('pages.discussions.show');
})->name('discussions.show');

Route::get('answers/create', function () {
    return view('pages.answers.form');
})->name('answers.create');

Route::get('users/bimargg', function () {
    return view('pages.users.show');
})->name('users.show');

Route::get('users/bimargg/edit', function () {
    return view('pages.users.form');
})->name('users.form');
