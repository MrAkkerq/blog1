<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticlesStoreRequest;
use App\Http\Requests\ArticlesUpdateRequest;
use App\Models\Article;
use App\Models\ArticleComments;
use App\Service\TagsSynchronizer;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show', 'addComment');
        $this->middleware('can:update,article')->except(['index', 'show', 'create', 'store', 'addComment']);
//        $this->middleware('can:show,article')->except(['index', 'store', 'create', 'edit']);
//        $this->middleware('can:edit,article')->except(['index', 'show', 'create', 'update']);

    }

    public function index()
    {
        $articles = Article::with('tags')->latest()->where('published', true)->simplePaginate(5)/*->allPublished()*/;

        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(ArticlesStoreRequest $request, TagsSynchronizer $tagsSynchronizer)
    {
        $attributes = $request->validated();
        $attributes['owner_id'] = auth()->id();

        $article = Article::create($attributes);

        $tags = collect(explode(',', $request->get('tags')))->keyBy(function ($item) { return $item; });
        $tagsSynchronizer->sync($tags, $article);

        flash('Статья создана');

        push_all($attributes['title'], $attributes['detail']);

        return redirect('/articles');
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

        flash('Статья обновлена');

        return redirect('/articles');
    }

    public function destroy(Article $article)
    {
        $article->delete();

        flash('Статья удалена', 'warning');

        return redirect('/articles');
    }

//    public function addComment(Request $request, Article $article, ArticleComments $comments)
//    {
//        $attributes = $request->validate([
//            'comment' => 'required|min:10']);
//
//        $attributes['user_id'] = auth()->id();
//        $attributes['article_id'] = $article->id;
//
//        $comments->create($attributes);
//
//        return back();
//    }
}
