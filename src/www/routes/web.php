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

Route::get('signup', 'SignupController@index')->name('signup.index');
Route::post('signup', 'SignupController@postIndex');
Route::get('signup/confirm', 'SignupController@confirm')->name('signup.confirm');
Route::post('signup/confirm', 'SignupController@postConfirm');
Route::get('signup/thanks', 'SignupController@thanks')->name('signup.thanks');

Route::prefix('user')->namespace('User')->as('user.')->group(function () {
    Route::middleware('guest:user')->group(function () {
        Route::get('login', 'LoginController@showLoginForm')->name('login');
        Route::post('login', 'LoginController@login');
    });
    Route::middleware('auth:user')->group(function () {
        Route::get('', 'IndexController@index')->name('top');
        Route::get('logout', 'LoginController@logout')->name('logout');

        Route::get('profile/edit', 'ProfileController@edit')->name('profile.edit');
        Route::post('profile/edit', 'ProfileController@update');

        Route::get('message', 'MessageController@index')->name('message');
        Route::get('message/show/{message}', 'MessageController@show')->name('message.show');
    });
});

Route::prefix('admin')->namespace('Admin')->as('admin.')->group(function () {
    Route::middleware('guest:admin')->group(function () {
        Route::get('login', 'LoginController@showLoginForm')->name('login');
        Route::post('login', 'LoginController@login');
    });
    Route::middleware('auth:admin')->group(function () {
        Route::get('logout', 'LoginController@logout')->name('logout');
        Route::get('', 'IndexController@index')->name('top');

        Route::get('message', 'MessageController@index')->name('message');
        Route::get('message/create', 'MessageController@create')->name('message.create');
        Route::post('message/create', 'MessageController@store');
        Route::get('message/edit/{message}', 'MessageController@edit')->name('message.edit');
        Route::post('message/edit/{message}', 'MessageController@update');

        Route::get('user', 'UserController@index')->name('user');
        Route::delete('user/delete', 'UserController@delete')->name('user.delete');
    });
});


Route::get('/', function () {
    return view('welcome');
});
