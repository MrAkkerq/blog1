<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use App\Models\TheNew;
use App\Service\TagsSynchronizer;
use Illuminate\Http\Request;

class TheNewsController extends Controller
{
    public function index()
    {
        $news = TheNew::query()->latest()->simplePaginate(3);

        return view('news.index', compact('news'));
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(NewsRequest $request, TagsSynchronizer $tagsSynchronizer)
    {
        $attributes = $request->validated();

        $theNew = TheNew::create($attributes);

        $tags = collect(explode(',', $request->get('tags')))->keyBy(function ($item) { return $item; });
        $tagsSynchronizer->sync($tags, $theNew);

        flash('Новость создана');

        return redirect('/admin/news');
    }

    public function show(TheNew $theNew)
    {
        return view('news.show', compact('theNew'));
    }

    public function edit(TheNew $theNew)
    {
        return view('news.edit', compact('theNew'));
    }

    public function update(NewsRequest $request, TheNew $theNew, TagsSynchronizer $tagsSynchronizer)
    {
        $theNew->update($request->validated());

        $tags = collect(explode(',', $request->get('tags')))->keyBy(function ($item) { return $item; });
        $tagsSynchronizer->sync($tags, $theNew);

        flash('Новость обновлена');

        return redirect('/admin/news');
    }

    public function destroy(TheNew $theNew)
    {
        $theNew->delete();

        flash('Новость удалена', 'warning');

        return redirect('news');
    }
}
