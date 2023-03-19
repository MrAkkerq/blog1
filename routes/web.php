<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'main');
Route::view('/about', 'about');
Route::get('/admin/articles', 'TestController@index')->middleware('role:admin');
Route::get('/admin/feedback', 'FeedBackController@index')->middleware('role:admin');
Route::post('/admin/articles/{article}', 'PublishedArticleController@store')->middleware('role:admin');;
Route::delete('/admin/articles/{article}', 'PublishedArticleController@destroy')->middleware('role:admin');;

Route::get('/contacts', 'ContactsController@index');
Route::post('/contacts', 'ContactsController@store');

Route::get('/articles/tags/{tag}', 'TagsController@index');
Route::resource('/articles', 'ArticlesController');
Route::post('/articles/{article}/comments', 'ArticleCommentsController@store');


Route::view('/test', 'test');

Auth::routes();
