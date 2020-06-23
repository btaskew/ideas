<?php

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

Route::get('/', function () {
    return redirect('/ideas');
});

Route::get('/ideas', 'IdeasController@index')->name('home');
Route::get('/ideas/create', 'IdeasController@create')->middleware('auth');
Route::get('/ideas/{idea}', 'IdeasController@show');
Route::post('/ideas', 'IdeasController@store');

Route::post('/ideas/{idea}/comments', 'CommentsController@store');

Route::post('/login-vote', 'LoginVoteController@store');

Auth::routes(['verify' => false, 'confirm' => false]);
