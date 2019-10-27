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
Route::get('/user-profile/{user}', ['uses'=>'UserRegisterController@userProfile', 'as' =>'user-profile']);
Route::get('/change-info/{user}', ['uses'=>'UserRegisterController@changeInfo', 'as' =>'change-info']);
Route::post('/user-info-update/{user}', ['uses'=>'UserRegisterController@updateInfo', 'as' =>'user-info-update']);
Route::get('/change-user-photo/{user}', ['uses'=>'UserRegisterController@changePhoto', 'as' =>'change-user-photo']);
Route::post('/user-photo-update/{user}', ['uses'=>'UserRegisterController@updatePhoto', 'as' =>'user-photo-update']);
