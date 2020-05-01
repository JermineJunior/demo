<?php


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

Route::get('/posts/{post}', 'PostsController@show')->name('posts.show');
Route::get('/posts', 'PostsController@index')->name('posts');
Route::post('/posts', 'PostsController@store')->name('posts.store');


Route::get('/home', 'HomeController@index')->name('home');
