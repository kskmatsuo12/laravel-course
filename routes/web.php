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

// Route::get('/', function () {
//     return view('welcome');
// });

//ポスト一覧
Route::get('posts','User\PostController@list')->name('post.list');

//ポストをするページをこの下にViewsはuser/posts/create.blade.phpを指定する。
Route::get('create','User\PostController@create')->name('post.create');

//実際にpostしてDBにデータを入れる処理を書く
Route::post('user/store','User\PostController@store')->name('user.store');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



//Shops用会員登録ページ
Route::get('/shop/register','Shop\Auth\RegisterController@showRegistrationForm')->name('shop.register.form');
//Shops用会員登録ボタン
Route::post('/shop/register','Shop\Auth\RegisterController@register')->name('shop.register');
//Shops用ログインページ
Route::get('/shop/login','Shop\Auth\LoginController@showLoginForm')->name('shop.login.form');
//Shops用ログインボタンクリック時
Route::post('/shop/login','Shop\Auth\LoginController@login')->name('shop.login');
//Shops用ログアウトボタンクリック時
Route::post('/shop/logout','Shop\Auth\LoginController@logout')->name('shop.logout');

//Shops用ログイン後のページ
Route::get('/shop/home','Shop\HomeController@index');


// web.phpで認可によって表示させる、させないを書ける
Route::group(['middleware' => ['auth:shop', 'can:normal-user']], function () {
    Route::get('/shop/home','Shop\HomeController@index');   
});

//リレーションJoinで使う表示
Route::get('/lesson3/users','Lesson3Controller@users')->name('users');
Route::get('/lesson3/user/{id}','Lesson3Controller@userDetail')->name('user.detail');
Route::post('/lesson3/like/post','Lesson3Controller@like')->name('like');

Route::get('/lesson3/image','Lesson3Controller@image')->name('image');
Route::post('/lesson3/image/post','Lesson3Controller@imagePost')->name('image.post');


Route::get('/test/get_user','Lesson3Controller@getUsers');

Route::get('/{any}', 'Lesson3Controller@home')->where('any','.*');
