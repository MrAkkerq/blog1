<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function index(Tag $tag)
    {
        $tasks = $tag->tasks()->with('tags')->simplePaginate(5);

        return view('tasks.index', compact('tasks'));
    }
}
