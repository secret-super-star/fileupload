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

Route::get('/yandex', 'YandexController@index')->name('yandex');

Route::get('/delete/{id}', 'HomeController@delete')->name('delete');

Route::get('/users', 'UsersContoller@index')->name('users');
Route::get('/deleteuser/{id}', 'UsersContoller@delete')->name('deleteuser');

Route::get('/upload', 'HomeController@upload')->name('upload');

Route::get('/generate', 'YandexController@generate')->name('generate');
Route::Post('/generate', 'YandexController@generate_link')->name('generate');

Route::get('/approve/{id}', 'ApproveController@approve')->name('approve');

Route::get('/error', 'ErrorController@index')->name('error');

Route::get('/settings', 'SettingContoller@index')->name('settings');
Route::Post('/settings', 'SettingContoller@update')->name('settings');

Route::Post('/fileupload', 'FileuploadController@fileupload')->name('fileupload');
