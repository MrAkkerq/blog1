<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->get();

        return view('admin/articles/index', compact('articles'));
    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
