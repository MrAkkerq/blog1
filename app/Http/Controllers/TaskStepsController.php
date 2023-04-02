<?php

namespace App\Http\Controllers;

use App\Models\Step;
use App\Models\Tag;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskStepsController extends Controller
{
    public function store(Request $request, Task $task)
    {
        $step = $task->addStep($request->validate([
            'description' => 'required|min:5'
        ]));

        $tagsToAttach = collect(explode(',', $request->get('tags')))->keyBy(function ($item) { return $item; });

        $syncIds = [];

        foreach ($tagsToAttach as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);

            $syncIds[] = $tag->id;
        }

        $step->tags()->sync($syncIds);

//        $task->addStep([
//           'description' => $request->get('description')
//        ]);

//        Step::create([
//            'description' => $request->get('description'),
//            'task_id' => $task->id,
//        ]);

        return back();
    }

//    public function update(Request $request, Step $step): \Illuminate\Http\RedirectResponse
//    {
//        //$step->complete($request->has('completed'));
////        $step->complete($request);
//        //$step->update(['completed' => $request->has('completed')]);
////        if ($request->has('completed')) {
////            $step->complete();
////        } else {
////            $step->incomplete();
////        }
////        $request->has('completed') ? $step->complete() : $step->incomplete();
//        $method = $request->has('completed') ? 'complete' : 'incomplete';
//        $step->{$method}();
//
//        return back();
//    }
}
