<?php

use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//   return view('welcome');
//});

//Route::get('/about', function () {
//   return view('about');
//});

//Route::get('/admin/feedback', function () {
//   return view('admin/feedback/index');
//});

Route::view('/about', 'about');

Route::get('/admin/feedback', 'FeedBackController@index');

//Route::get('/tasks', 'TasksController@index');
//Route::get('/tasks/create', 'TasksController@create');
//Route::get('/tasks/{task}', 'TasksController@show');
//Route::post('/tasks', 'TasksController@store');
//Route::get('/tasks/{task}/edit', 'TasksController@edit');
//Route::patch('/tasks/{task}', 'TasksController@update');
//Route::delete('/tasks/{task}', 'TasksController@destroy');
Route::get('/tasks/tags/{tag}', 'TagsController@index');

Route::resource('/tasks', 'TasksController');

Route::post('/tasks/{task}/steps', 'TaskStepsController@store');
//Route::patch('/steps/{step}', 'TaskStepsController@update');

Route::post('/completed-steps/{step}', 'CompletedStepsController@store');
Route::delete('/completed-steps/{step}', 'CompletedStepsController@destroy');

Route::get('/contacts', 'ContactsController@index');
Route::post('/contacts', 'ContactsController@store');

//Route::get('/', 'ArticlesController@index');
//Route::get('/articles/create', 'ArticlesController@create');
//Route::post('/', 'ArticlesController@store');
//Route::get('/articles/{article}', 'ArticlesController@show');
Route::get('/', 'ArticlesController@index');
Route::resource('/articles', 'ArticlesController');

