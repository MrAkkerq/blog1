<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\TheNew;
use App\Service\CommentAdd;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function toArticle(Request $request, Article $item, CommentAdd $commentAdd)
    {
        $comment = $request->validate([
            'comment' => ['required', 'min:10']
        ]);

        $commentAdd->push($comment, $item);

        flash('Комментарий для статьи опубликован');

        return redirect()->back();
    }

    public function toTheNew(Request $request, TheNew $item, CommentAdd $commentAdd)
    {
        $comment = $request->validate([
            'comment' => ['required', 'min:10']
        ]);

        $commentAdd->push($comment, $item);

        flash('Комментарий для новости опубликован');

        return redirect()->back();
    }
}
