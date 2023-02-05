<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index() {
        $tasks = Task::latest()->get();

        return view('tasks.index', compact('tasks'));
    }

    public function show(Task $task) {
        return view('tasks.show', compact('task'));
    }

    public function create() {
        return view('tasks.create');
    }

    public function store(Request $request) {

//        Task::create([
//            'title' => request('title'),
//            'body' => request('body')
//        ]);
//        $this->validate(request(), [
//           'title' => 'required',
//           'body' => 'required',
//        ]);
        $attributes = $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);


        Task::create($attributes);
        //dd(request()->get('title'), request(['title', 'body']));

        return redirect('/tasks');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $attributes = $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $task->update($attributes);
        //$task->update(request(['title', 'body']));

        return redirect('/tasks/');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect('/tasks/');
    }
}
