<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\TheNew;
use App\Service\CommentAdd;
use Illuminate\Http\Request;

class CommentController extends Controller
{
//    public function index(Article $article)
//    {
//        return view('comments.index', compact('article'));
//    }

    public function toArticle(Request $request, Article $item, CommentAdd $commentAdd)
    {
//        dd($item);
        $comment = $request->validate([
            'comment' => ['required', 'min:10']
        ]);
        $comment['owner_id'] = auth()->id();

        $commentAdd->push($comment, $item);

        //TODO flash
        return redirect()->back();
    }

    public function toTheNew(Request $request, TheNew $item, CommentAdd $commentAdd)
    {
//        dd($item);
        $comment = $request->validate([
            'comment' => ['required', 'min:10']
        ]);
        $comment['owner_id'] = auth()->id();

        $commentAdd->push($comment, $item);

        //TODO flash
        return redirect()->back();
    }
}
