<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Contact;
use App\Models\TheNew;
use PhpParser\Node\Expr\New_;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin/index');
    }

    public function feedBack()
    {
        $feedBack = Contact::latest()->get();

        return view('admin/feedback/index', compact('feedBack'));
    }

    public function articles()
    {
        $articles = Article::latest()->get();

        return view('admin/articles/index', compact('articles'));
    }

    public function publishArticle(Article $article)
    {
        $article->published();

        return back();
    }

    public function unsublishArticle(Article $article)
    {
        $article->inPublished();

        return back();
    }

    public function news()
    {
        $news = TheNew::latest()->get();

        return view('admin/news/index', compact('news'));
    }

    public function hiddeTheNew(TheNew $theNew)
    {
        $theNew->hidden();

        return back();
    }

    public function breakTheNew(TheNew $theNew)
    {
        $theNew->inHidden();

        return back();
    }
}
