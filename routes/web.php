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
Route::get('/texts', 'TextFileController@index')->name('text-files');
Route::post('/texts', 'TextFileController@testPost')->name('text-files-post');
Route::post('/texts2', 'TextFileController@testPost2')->name('text-files-post2');
Route::post('/texts3', 'TextFileController@testPost3')->name('text-files-post3');