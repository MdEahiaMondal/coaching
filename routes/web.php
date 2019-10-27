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
    return view('backend.pages.home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/user-register', ['uses'=>'UserRegisterController@showRegisterForm', 'as' => 'user-register'])->middleware('auth');
Route::post('/user-register', ['uses'=>'UserRegisterController@userSave', 'as' => 'user-save'])->middleware('auth');
Route::get('/user-list', ['uses'=>'UserRegisterController@userList', 'as' =>'user-list']);
