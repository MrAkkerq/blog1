<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Task;
use Illuminate\Auth\Access\Gate;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth', ['only']);
        $this->middleware('auth');
        $this->middleware('can:update,task')->except(['index', 'store', 'create']);
    }
    public function index()
    {
        //$tasks = Task::with('tags')->latest()->get();
        //$tasks = Task::where('owner_id', auth()->id())->with('tags')->latest()->get();
        $tasks = auth()->user()->tasks()->with('tags')->latest()->get();

        return view('tasks.index', compact('tasks'));
    }

    public function show(Task $task)
    {
        //abort_if($task->owner_id !== auth()->id(), 403);

        return view('tasks.show', compact('task'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {

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

        $attributes['owner_id'] = auth()->id();

        //dd($attributes);

        Task::create($attributes);
        //dd(request()->get('title'), request(['title', 'body']));

        return redirect('/tasks');
    }

    public function edit(Task $task)
    {
        //abort_if($task->owner_id !== auth()->id(), 403);
        //abort_if(! auth()->user()->owns($task), 403);
        //Gate::denies ??
        //$this->authorize('update', $task);

        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $attributes = $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $attributes['owner_id'] = auth()->id();

        $task->update($attributes);
        //$task->update(request(['title', 'body']));
        $taskTags = $task->tags->keyBy('name');
        $tags = collect(explode(',', $request->get('tags')))->keyBy(function ($item) { return $item; });

        $syncIds = $taskTags->intersectByKeys($tags)->pluck('id')->toArray();
        $tagsToAttach = $tags->diffKeys($taskTags);
//        $tagsToDetach = $taskTags->diffKeys($tags);
//
//        foreach ($tagsToAttach as $tag) {
//            $tag = Tag::firstOrCreate(['name' => $tag]);
//            $task->tags()->attach($tag);
//        }
//
//        foreach ($tagsToDetach as $tag) {
//            $task->tags()->detach($tag);
//        }

        foreach ($tagsToAttach as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);

            $syncIds[] = $tag->id;
        }

        $task->tags()->sync($syncIds);

        return redirect('/tasks');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect('/tasks');
    }
}
