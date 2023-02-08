<?php

namespace App\Http\Controllers;

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

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'code' => 'required|alpha_dash|unique:articles,code',
            'title' => 'required|min:5|max:100',
            'detail' => 'required|max:255',
            'body' => 'required',
            'published' => 'required'
        ]);

        //dd($attributes);

        Article::create($attributes);
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
//
//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function edit($id)
//    {
//        //
//    }
//
//    /**
//     * Update the specified resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function update(Request $request, $id)
//    {
//        //
//    }
//
//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function destroy($id)
//    {
//        //
//    }
}
