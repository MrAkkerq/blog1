<?php

use Illuminate\Support\Facades\Route;

Route::view('/about', 'about');
Route::get('/admin/feedback', 'FeedBackController@index');

Route::get('/contacts', 'ContactsController@index');
Route::post('/contacts', 'ContactsController@store');

Route::get('/', 'ArticlesController@index');
Route::get('/articles/tags/{tag}', 'TagsController@index');
Route::resource('/articles', 'ArticlesController');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
