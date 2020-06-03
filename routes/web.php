<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/** appliction routes */

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('/posts','PostsController');

Route::post('/posts/{post}/comment','CommentController@store')->name('comment');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profiles/{user}', 'ProfileController@show')->name('profile');
