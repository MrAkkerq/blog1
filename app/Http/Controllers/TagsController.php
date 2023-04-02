<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function index(Tag $tag)
    {
        $articles = $tag->articles()->where('published', true)->with('tags')->simplePaginate(5);

        return view('articles.index', compact('articles'));
    }
}
