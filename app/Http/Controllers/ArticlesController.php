<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticlesStoreRequest;
use App\Http\Requests\ArticlesUpdateRequest;
use App\Models\Article;
use App\Models\Tag;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Article::with('tags')->latest()->get();
        //dd($articles);
        return view('articles.index', compact('articles'));
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
        //dd($request);
//        dd($request['published']);
//        if(!$request->has('published'))
//        {
//            $request->merge(['published' => 0]);
//        }
        //dd($request->test());

        $article->update($request->validatedWithPublished()->toArray());
        //dd($request->get('tags'));
        $articleTags = $article->tags->keyBy('name');
        $tags = collect(explode(',', $request->get('tags')))->keyBy(function ($item) { return $item; });

        $syncIds = $articleTags->intersectByKeys($tags)->pluck('id')->toArray();
//        dd($syncIds);
        $tagsToAttach = $tags->diffKeys($articleTags);
        //dd($tagsToAttach);

        foreach ($tagsToAttach as $tag) {
            $tag = Tag::firstOrCreate(['name' => $tag]);

            $syncIds[] = $tag->id;
        }

        $article->tags()->sync($syncIds);

        return redirect('/');
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return redirect('/');
    }
}
