<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticlesStoreRequest;
use App\Http\Requests\ArticlesUpdateRequest;
use App\Models\Article;
use App\Service\TagsSynchronizer;

use function PHPUnit\Framework\isNull;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Article::with('tags')->latest()->get();
        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(ArticlesStoreRequest $request, TagsSynchronizer $tagsSynchronizer)
    {
        $article = Article::create($request->validated());

        $tags = collect(explode(',', $request->get('tags')))->keyBy(function ($item) { return $item; });
        $tagsSynchronizer->sync($tags, $article);

        return redirect('/');
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    public function update(ArticlesUpdateRequest $request, Article $article, TagsSynchronizer $tagsSynchronizer)
    {
        $article->update($request->validatedWithPublished()->toArray());

        $tags = collect(explode(',', $request->get('tags')))->keyBy(function ($item) { return $item; });
        $tagsSynchronizer->sync($tags, $article);

        return redirect('/');
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect('/');
    }
}
