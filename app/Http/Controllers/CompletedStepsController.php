<?php

namespace App\Http\Controllers;

use App\Models\Step;
use App\Notifications\TaskStepCompleted;
use Illuminate\Http\Request;

class CompletedStepsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('can:update,step');
    }

    public function store(Step $step)
    {
        $step->complete();

        //auth()->user()->notify(new TaskStepCompleted());
        $step->task->owner->notify(new TaskStepCompleted());

        return back();
    }

    public function destroy(Step $step)
    {
        $step->incomplete();
        return back();
    }
}
