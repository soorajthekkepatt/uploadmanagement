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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'FilemanagerController@filemanagement')->name('home');
Route::get('/filemanagement', 'FilemanagerController@filemanagement')->name('filemanagement');
Route::get('/uploadfiles', 'FilemanagerController@uploadfiles')->name('uploadfiles');
Route::post('/storedata', 'FilemanagerController@storedata')->name('storedata');
Route::get('/activitylog', 'FilemanagerController@activitylog')->name('activitylog');

Route::get('/deleterecord/{id}', 'FilemanagerController@deleterecord')->name('deleterecord');




