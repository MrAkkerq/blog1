<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'main');
Route::view('/about', 'about');
Route::get('/admin/articles', 'TestController@index')->middleware('role:admin');
Route::get('/admin/feedback', 'FeedBackController@index')->middleware('role:admin');

Route::get('/contacts', 'ContactsController@index');
Route::post('/contacts', 'ContactsController@store');

Route::get('/articles/tags/{tag}', 'TagsController@index');
Route::resource('/articles', 'ArticlesController');

Auth::routes();
