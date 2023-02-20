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

//dd(app(\Illuminate\Filesystem\Filesystem::class));
//dd(app(App\Models\Task::class));

//app()->bind(\App\SimplePriceFormatter::class, function () {
//   return new \App\SimplePriceFormatter();
//});

//Route::get('/test', function(\App\SimplePriceFormatter $formatter) {
//    dd($formatter->format(10000));
//});

//app()->bind(\App\PriceFormater::class, function () {
//   return new \App\SimplePriceFormatter();
//});
//app()->bind(\App\PriceFormater::class, function () {
//   return new \App\OtherPriceFormatter();
//});
//
//Route::get('/test', function(\App\PriceFormater $formatter, \App\SimplePriceFormatter $simplePriceFormatter) {
//    dd($formatter->format(10000), $simplePriceFormatter->format(10000));
//});

//or bind
//app()->singleton(App\Service\Pushall::class, function() {
//    return new App\Service\Pushall('private-key');
//});

//dd(app('pushall'));

//Route::get('/test', function() {
//   dd(app('example'));
//});

//Route::get('/test', function(\App\Service\Pushall $pushall) {
//   dd($pushall);
//});
//Route::get('/test', 'TestController@index');
//Route::get('/test', 'TestController@index')->middleware('test');
//Route::get('/test', 'TestController@index')->middleware(\App\Http\Middleware\CustomAuthenticate::class);

//function flash($message, $type = 'success')
//{
//    session()->flash('message', $message);
//    session()->flash('message_type', $type);
//}

Route::get('/test', function(\Illuminate\Http\Request $request) {
   //dd($request->session()->all());

   return session('name', 'klasjdflk');
});

Route::view('/about', 'about');

Route::get('/admin/feedback', 'FeedBackController@index');

Route::get('/tasks/tags/{tag}', 'TagsController@index');
Route::resource('/tasks', 'TasksController');
Route::post('/tasks/{task}/steps', 'TaskStepsController@store');
Route::post('/completed-steps/{step}', 'CompletedStepsController@store');
Route::delete('/completed-steps/{step}', 'CompletedStepsController@destroy');
Route::get('/', function() {
    return view('index');
});

Route::get('/contacts', 'ContactsController@index');
Route::post('/contacts', 'ContactsController@store');


Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
