<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'main');
Route::view('/about', 'about');
Route::get('/admin', 'AdminController@index')->middleware('role:Super-Admin');
Route::get('/admin/articles', 'AdminController@articles')->middleware('role:Super-Admin');
Route::get('/admin/feedback', 'AdminController@feedBack')->middleware('role:Super-Admin');
Route::get('/admin/news', 'AdminController@news')->middleware('role:Super-Admin');
//Route::post('/admin/articles/{article}', 'PublishedArticleController@store')->middleware('role:Super-Admin');;
//Route::delete('/admin/articles/{article}', 'PublishedArticleController@destroy')->middleware('role:Super-Admin');;
Route::post('/admin/articles/{article}', 'AdminController@publishArticle')->middleware('role:Super-Admin');
Route::delete('/admin/articles/{article}', 'AdminController@unsublishArticle')->middleware('role:Super-Admin');

Route::post('/admin/news/{theNew}', 'AdminController@breakTheNew')->middleware('role:Super-Admin');
Route::delete('/admin/news/{theNew}', 'AdminController@hiddeTheNew')->middleware('role:Super-Admin');

Route::get('/contacts', 'ContactsController@index');
Route::post('/contacts', 'ContactsController@store');

Route::get('/articles/tags/{tag}', 'TagsController@index');
Route::resource('/articles', 'ArticlesController');
Route::post('/articles/{article}/comments', 'ArticlesController@addComment');

Route::get('/news', 'TheNewsController@index');
Route::get('/news/{theNew}', 'TheNewsController@show');
Route::get('/news/{theNew}/edit', 'TheNewsController@edit');
Auth::routes();
