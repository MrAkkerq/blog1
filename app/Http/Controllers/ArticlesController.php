<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticlesStoreRequest;
use App\Http\Requests\ArticlesUpdateRequest;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->get();

        return view('welcome', compact('articles'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(ArticlesStoreRequest $request)
    {
//        $attributes = $request->validate([
//            'code' => 'required|alpha_dash|unique:articles,code',
//            'title' => 'required|min:5|max:100',
//            'detail' => 'required|max:255',
//            'body' => 'required',
//            'published' => 'boolean'
//        ]);

        //dd($attributes);

        Article::create($request->validated());
//        $request->validate([
//            'code' => 'required|alpha_dash|unique:articles,code',
//            'title' => 'required|min:5|max:100',
//            'detail' => 'required|max:255',
//            'body' => 'required',
//            'published' => 'required'
//        ]);
//
//        Article::create($request->all());

        return redirect('/');
    }

    public function show(Article $article)
    {
        //dd($article);
        //$article = Article::where('code', $code)->first();
        return view('articles.show', compact('article'));
    }

    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    public function update(ArticlesUpdateRequest $request, Article $article)
    {
//        $attributes = $request->validate([
//            'code' => 'required|alpha_dash',
//            'title' => 'required|min:5|max:100',
//            'detail' => 'required|max:255',
//            'body' => 'required',
//            'published' => 'boolean'
//        ]);

        $article->update($request->validated());

        return redirect('/');
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect('/');
    }
}
