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
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();



//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@loginView')->name('login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/logout', 'Auth\LoginController@logout');
Route::post('/logout', 'Auth\LoginController@logout');

Route::get('/register', 'Auth\RegisterController@registerForm');
Route::post('/register/post', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');




Route::group(['middleware' => 'auth'], function(){
//ログイン中のページ
Route::get('/top','PostsController@index');

Route::post('/top','PostsController@post')->name('top');

Route::get('/post/{id}', 'PostsController@delete')->name('delete');

Route::post('/post/edit/{id}','PostsController@editPost');

Route::get('/profile','UsersController@profile');

Route::post('/profile-update','UsersController@updateProfile');

Route::get('/search','UsersController@search');

Route::post('/resultword','UsersController@searchResult');

Route::get('/follow-list','PostsController@index');
Route::get('/follower-list','PostsController@index');

//フォローする
Route::post('/follow/{id}','FollowsController@follow')->name('follow');
//フォローするend

//フォローを外す
Route::post('/unfollow/{id}','FollowsController@unfollow')->name('unfollow');
//フォローを外すend


Route::get('/followList','FollowsController@followList');

Route::get('/followerList','FollowsController@followerList');

Route::get('/otherProfile/{id}','UsersController@otherProfile')->name('users.otherProfile');

});