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

//ポスト一覧
Route::get('posts','User\PostController@list')->name('post.list');

//ポストをするページをこの下にViewsはuser/posts/create.blade.phpを指定する。


//実際にpostしてDBにデータを入れる処理を書く
Route::post('posts','User\PostController@store')->name('post.store');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
