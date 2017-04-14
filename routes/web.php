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

Route::get('/', 'PostController@index');
Route::get('/posts/create', 'PostController@create');
Route::post('/posts/create', 'PostController@store');
Route::get('/posts/edit/{post}', 'PostController@edit');
Route::post('/posts/edit/{post}', 'PostController@editStore');
Route::get('/posts/delete/{post}', 'PostController@delete');

Route::get('categories/create', 'CategoryController@create');
Route::post('categories/crate', 'CategoryController@store');

Auth::routes();
