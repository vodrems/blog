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
    return redirect('login/');
});

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::resource('/tasks', 'TasksController');
});

Route::get('login', 'LoginController@showLoginForm')->name('loginForm');
Route::post('login', 'LoginController@login')->name('auth');
Route::get('reg', 'LoginController@showRegForm')->name('regForm');
Route::post('reg', 'LoginController@reg')->name('reg');
Route::post('logout', 'LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/hack', 'LoginController@hack');
