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
    return redirect(route('login'));
});

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::get('/delete/{id}', 'HomeController@delete')->name('delete');

Route::get('/users', 'UsersContoller@index')->name('users');

Route::get('/upload', 'HomeController@upload')->name('upload');

Route::get('/settings', 'SettingContoller@index')->name('settings');
Route::Post('/settings', 'SettingContoller@update')->name('settings');

Route::Post('/fileupload', 'FileuploadController@fileupload')->name('fileupload');
