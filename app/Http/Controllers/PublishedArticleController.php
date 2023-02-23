<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PublishedArticleController extends Controller
{
    public function store(Article $article)
    {
        $article->published();

        return back();
    }

    public function destroy(Article $article)
    {
        $article->inPublished();

        return back();
    }
}
