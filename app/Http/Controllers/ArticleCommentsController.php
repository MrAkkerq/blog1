<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleComments;
use Illuminate\Http\Request;

class ArticleCommentsController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
    }

    public function store(Request $request, Article $article, ArticleComments $comments)
    {
        $attributes = $request->validate([
            'comment' => 'required|min:10']);

        $attributes['user_id'] = auth()->id();
        $attributes['article_id'] = $article->id;

        ArticleComments::create($attributes);

        return back();

    }

    public function show(ArticleComments $articleComments)
    {
    }

    public function edit(ArticleComments $articleComments)
    {
    }

    public function update(Request $request, ArticleComments $articleComments)
    {
    }

    public function destroy(ArticleComments $articleComments)
    {
    }
}
