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

Route::get('/', 'PostController@all')->name('all.post');


Route::get('/admin/home', 'AdminController@index')->name('home');

Route::post('/application/store', 'ApplicationController@store')->name('store.application');
Route::get('/application/success/{id}', 'ApplicationController@success')->name('successful.application');
Route::get('/application/reject/{id}', 'ApplicationController@reject')->name('reject.application');
Route::get('/application/accept/{id}', 'ApplicationController@accept')->name('accept.application');

Route::post('/post/store', 'PostController@store')->name('store.post');
Route::post('/post/update', 'PostController@update')->name('update.post');
Route::get('/post/create', 'PostController@create')->name('create.post');
Route::get('/post/edit/{id}', 'PostController@edit')->name('edit.post');
Route::get('/post/delete/{id}', 'PostController@delete')->name('delete.post');
Route::get('/post/{id}/applications', 'PostController@applications')->name('applications.post');

Route::post('/response/store', 'ResponseController@store')->name('store.response');

// USER FRONT END - change post to job
Route::get('/job/{slug}/{id}', 'PostController@show')->name('show.post');

Auth::routes();