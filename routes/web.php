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
//main
Route::get('/', 'MainController@home')->name('home');
Route::get('/search', 'MainController@search')->name('search');
//wardobe
Route::get('/wardobe/show/{id}', 'WardobeController@show')->name('wardobe');
Route::get('/wardobe/destroy/{id}', 'WardobeController@destroy')->name('wardobedestroy');
Route::get('/wardobe/create', 'WardobeController@newwardobe')->name('wardobecreate');

//cell
Route::get('/cell/{id}', 'CellController@show')->name('cell');
Route::get('/cell/add/{parent_id}', 'CellController@store')->name('cellstore');
Route::get('/cell/destroy/{id}', 'CellController@destroy')->name('celldestroy');

//folder
Route::get('/folder/show/{id}', 'FolderController@show')->name('folder');
Route::post('/folder/add/{id}', 'FolderController@create')->name('foldercreate');
Route::get('/folder/edit/{id}', 'FolderController@edit')->name('folderedit');
Route::post('/folder/update/{id}', 'FolderController@update')->name('folderupdate');
Route::get('/folder/destroy/{id}', 'FolderController@destroy')->name('folderdestroy');

//file
Route::get('/file/{id}', 'FileController@show')->name('file');
Route::post('/file/add/{id}', 'FileController@create')->name('filecreate');
Route::get('/file/destroy/{id}', 'FileController@destroy')->name('filedestroy');



//ajax
Route::get('/celles/{id}', 'MainController@celles');