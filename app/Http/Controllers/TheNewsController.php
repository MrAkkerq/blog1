<?php

namespace App\Http\Controllers;

use App\Models\TheNew;
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
    }

    public function store(Request $request)
    {
    }

    public function show(TheNew $theNew)
    {
        return view('news.show', compact('theNew'));
    }

    public function edit(TheNew $theNew)
    {
        return view('news.edit', compact('theNew'));
    }

    public function update(Request $request, TheNew $theNew)
    {
    }

    public function destroy(TheNew $theNew)
    {
    }
}
