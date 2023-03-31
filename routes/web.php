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

Route::view('/demo', 'demo');

//Route::get('/test', function(\Illuminate\Http\Request $request) {
//   //dd($request->session()->all());
//
//   return session('name', 'klasjdflk');
//});

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

Route::middleware('auth')->post('/company', function () {
    auth()->user()->company()->create(request()->validate(['name' => 'required']));
});

Route::get('/service', 'PushServiceController@form')->middleware('auth');
Route::post('/service', 'PushServiceController@send')->middleware('auth');

Route::get('/test', function () {
    //return \App\Models\User::all()->makeVisible('email');

//    return \App\Models\User::all()->each->append(['is_manager']);

//    return \App\Models\User::whereHas('tasks', function ($query) {
//        $query->where('type', 'new');
//    })->with('tasks')->get();

//    return \App\Models\User::doesntHave('tasks')->with('tasks')->get();

//    return \App\Models\User::withCount(['tasks', 'tasks as new_count_tasks' => function ($query) {
//        $query->new();
//    }])->with(['tasks' => function ($query) {
//        $query->select(['id', 'title', 'owner_id', 'type'])->new();
//    }])->get();

//    $users = \App\Models\User::withCount(['tasks', 'tasks as new_count_tasks' => function ($query) {
//        $query->new();
//    }])->get();
//    $users->load('tasks', 'tasks.steps');
//    return $users;

//    \App\Models\User::first()->tasks()->save(new \App\Models\Task(['title' => 'new Task']));

//    \App\Models\User::first()->tasks()->saveMany([
//        new \App\Models\Task(['title' => 'new Task 1', 'body' => 'ladjfklasjdf']),
//        new \App\Models\Task(['title' => 'new Task 2', 'body' => 'ladjfkledfwqfwefasjdf']),
//    ]);
//    return \App\Models\User::with('tasks')->get();

//    \App\Models\Company::first()->user()->associate(\App\Models\User::first());

    //return \App\Models\Task::first()->with('changes')->get();
//    return \App\Models\User::first()->with('changes')->get();
//    dump(\DB::select('select * from users where id = ?', [1]));
//    dump(\DB::select('select * from users where id = :id ', ['id' => 1]));
//    dump(\DB::select('insert into users (name, email, password) values (?, ?, ?)', ['User 2', 'user2@mail.ru', Hash::make(123)]));
//    dump(\DB::update('update users set email = ? where id = ?', ['user1@mail.ru', 1]));
//    dump(\DB::delete('delete from users where id = ?', [2]));
//    dump(\DB::statement('drop table users'));
//    dump(\DB::select('select * from users'));
//    DB::transaction(function () {
//        DB::table('tasks')->update(['type' => 'Old']);
//        DB::table('steps')->delete();
//    }, 5);

//    $tasks = DB::table('tasks')->get();
    //$tasks = DB::table('tasks')->where('id', '=', 1)->value('title');
//    $tasks = DB::table('tasks')->pluck('title', 'id');
    //dump($tasks);

//    $tasks = DB::table('tasks')->orderBy('id')->chunk(2, function ($tasks) {
//        dump($tasks);
//    });

//    $tasks = DB::table('tasks')->where('completed', false)
//        ->chunkById(2, function ($tasks) {
//            DB::table('tasks')->whereIn('id', $tasks->pluck('id'))->update(['completed' => true]);
//    });

//    $tasks = DB::table('tasks')->count();
//    $tasks = DB::table('tasks')->max('id');
//    $tasks = DB::table('tasks')->average('id');

//    $tasks = DB::table('tasks')->where('completed', false)->doesntExist();

    //$tasks = DB::table('tasks')->select('title', 'body')->addSelect('type')->get();
//    $tasks = DB::table('tasks')->select('type')->distinct()->get();

//    $tasks = DB::table('tasks')
//        ->select(DB::raw('count(*) as task_count, type'))->groupBy('type')->get();

    //    $tasks = DB::table('tasks')
//        ->select(DB::raw('count(*) as task_count, type'))
//        ->groupBy('type')
//        ->havingRaw('count(*) > ?', [1])
//        ->get();

//    $tasks = DB::table('tasks')
//        ->selectRaw('id * ? as big_id', [10])
//        ->get();

//    $tasks = DB::table('tasks')
//        ->whereRaw('type = IF(id > 2, ?, "New")', ['Old'])
//        ->get();

//    $tasks = DB::table('tasks')
//        ->orderByRaw('updated_at - created_at DESC')
//        ->get();

//    $tasks = DB::table('users')
//        ->join('tasks', 'users.id', '=', 'tasks.owner_id')
//        ->join('companies', 'users.id', '=', 'companies.owner_id')
//        ->select('users.id', 'users.email', 'tasks.title', 'companies.name')
//        ->get();

//    $tasks = DB::table('users')
//        ->leftJoin('companies', 'users.id', '=', 'companies.owner_id')
//        ->select('users.id', 'users.email', 'companies.name')
//        ->get();

//    $tasks = DB::table('users')
//        ->rightJoin('companies', 'users.id', '=', 'companies.owner_id')
//        ->select('users.id', 'users.email', 'companies.name')
//        ->get();

//    $tasks = DB::table('users')
//        ->crossJoin('companies')
//        ->select('users.id', 'users.email', 'companies.name')
//        ->get();

//    $users = DB::table('users')
//        ->leftJoin('companies', function ($join) {
//            $join->on('users.id', '=', 'companies.owner_id')
//                ->where('companies.id', '>', 1);
//        })
//        ->select('users.id', 'users.email', 'companies.name')
//        ->get();

//    $latestTask = DB::table('tasks')
//        ->select('owner_id', DB::raw('MAX(updated_at) as last_task_updated_at'))
//        ->where('completed', false)
//        ->groupBy('owner_id');
//    $users = DB::table('users')
//        ->joinSub($latestTask, 'latest_completed_task', function ($join) {
//            $join->on('users.id', '=', 'latest_completed_task.owner_id');
//        })
//        ->get();

//    $first = DB::table('users')->where('id', 1);
//    $users = DB::table('users')
//        ->where('id', 2)
//        ->union($first)
//        ->get();

//    $tasks = DB::table('tasks')
//        ->where('type', 'like','%e%')
//        ->get();

//    $tasks = DB::table('tasks')
//        ->where([
//            ['type', '=','New'],
//            ['completed', true]
//        ])
//        ->get();

//    $tasks = DB::table('tasks')
//        ->where('type', 'Old')
//        ->orWhere('type', 'New')
//        ->orderBy('type')
//        ->get();
//
//    $tasks = DB::table('tasks')
//        //->whereBetween('id', [2, 4])
//        ->whereNotBetween('id', [2, 4])
//        ->get();

//    $tasks = DB::table('tasks')
//        ->whereBetween('id', [1, 2])
//        ->orWhereBetween('id', [4, 5])
//        ->get();

//    $tasks = DB::table('tasks')
////        ->whereIn('id', [1, 3, 5])
//        ->whereNotIn('id', [1, 3, 5])
//        ->select('id', 'title')
//        ->get();

//    $tasks = DB::table('tasks')
//        ->whereNull('options')
//        ->get();

//    $tasks = DB::table('tasks')
//        ->whereDate('created_at', '2023-03-17')
//        ->whereMonth('created_at', '12')
//        ->whereDay('created_at', '31')
//        ->whereYear('created_at', '2006')
//        ->whereTime('created_at', '11:22:33')
//        ->get();

//    $tasks = DB::table('tasks')
//        ->whereColumn('updated_at', '>', 'created_at')
//        ->get()

//    $tasks = DB::table('tasks')
//        ->where('type', 'New')
//        ->orWhere(function ($query) {
//            $query
//                ->where('type', '<>', 'New')
//                ->where('completed', true);
//        })
//        ->get();

//    $tasks = DB::table('users')
//        ->whereExists(function ($query) {
//            $query
//                ->select(DB::raw(1))
//                ->from('tasks')
//                ->whereRaw('tasks.owner_id = users.id');
//        })
//        ->get();

//    $tasks = DB::table('tasks')
//        ->where('options->lang', 'ru')
//        ->get();

//    $tasks = DB::table('tasks')
////        ->orderByDesc('title')
////        ->latest('viewed_at')
////        ->inRandomOrder()
//        ->groupBy('type', 'completed')
//        ->having('id', '>', 5)
//        ->select('id', 'title')
//        ->get();

    $tasks = DB::table('tasks')
        ->paginate();

    dump($tasks);

//    $tasks = DB::table('tasks')
//        ->when(\request()->has('old'), function ($query){
//            $query->where('type', 'Old');
//        }, function ($query) {
//            $query->where('type', '<>', 'Old')
//                ->get();
//        })
//        ->get();

//    $tasks = DB::table('companies')
//        ->insert([
//            ['name' => 'New CO', 'owner_id' => 1],
//            ['name' => 'Skill', 'owner_id' => 1],
//            ['name' => 'Hui', 'owner_id' => 1],
//        ]);
//
//    $tasks = DB::table('companies')
//        ->insertGetId(['name' => 'NoName', 'owner_id' => 1]);
//
//    dump($tasks);

//    $tasks = DB::table('companies')
//        ->update(['owner_id' => 2]);

//    $tasks = DB::table('companies')
//        ->updateOrInsert(
//            ['name' => 'Test'],
//            ['owner_id' => 4]
//        );

//    $tasks = DB::table('companies')
//        ->where('id', 1)
//        ->increment('field', 1)
//        ->decrement('field', 3);

//    $tasks = DB::table('companies')
//        ->where('id', '>=', 3)
////        ->delete();
//        ->truncate();

//    $tasks = DB::table('companies')
//        ->where('id', '>=', 3)
//        ->lockForUpdate()
//        ->lock()
//        ->get();
//
//
//    dump($tasks);

});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
