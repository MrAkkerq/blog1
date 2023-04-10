<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\TheNew;
use Illuminate\Support\Facades\DB;

class StatisticsController extends Controller
{
    public function __invoke()
    {
        $articlesCount = Article::where('published', true)->count();

        $newsCount = TheNew::count();

        $userNameWithMostArticles = DB::table('users')
            ->join('articles', 'users.id', '=', 'articles.owner_id')
            ->where('articles.published', true)
            ->select(DB::raw('count(articles.id) as articles_count, users.name'))
            ->groupBy('users.name')
            ->orderByRaw('articles_count desc')
            ->get();

        $mostActiveUserName = !is_null($userNameWithMostArticles) ? $userNameWithMostArticles[0]->name : null;
        $avgCountOfArticlesUsers = (int)$userNameWithMostArticles->avg('articles_count');

        $lengthArticlesBody = DB::table('articles')
            ->where('published', true)
            ->select(DB::raw('char_length(body) as len, title, code'))
            ->orderByRaw('len desc')
            ->get();

        $longArticle = count($lengthArticlesBody) > 0
            ? ['len' => $lengthArticlesBody[0]->len, 'code' => $lengthArticlesBody[0]->code, 'title' => $lengthArticlesBody[0]->title]
            : null;
        $shortArticle = count($lengthArticlesBody) > 1
            ? ['len' => $lengthArticlesBody[count($lengthArticlesBody) - 1]->len, 'code' => $lengthArticlesBody[count($lengthArticlesBody) - 1]->code, 'title' => $lengthArticlesBody[count($lengthArticlesBody) - 1]->title]
            : null;

        $mostChangedArticle = DB::table('articles')
            ->join('histories', 'articles.id', '=', 'histories.article_id')
            ->select(DB::raw('count(articles.id) as articles_count, articles.title, articles.code'))
            ->groupBy('articles.code')
            ->orderByRaw('articles_count desc')
            ->first();

        $changedArticle = !is_null($mostChangedArticle)
            ? ['code' => $mostChangedArticle->code, 'title' => $mostChangedArticle->title]
            : null;

        $mostCommentedArticle = DB::table('articles')
            ->join('commentables', 'articles.id', '=', 'commentables.commentable_id')
            ->where('commentables.commentable_type', 'App\Models\Article')
            ->select(DB::raw('count(commentables.comment_id) as count, articles.title, articles.code'))
            ->groupBy('articles.code')
            ->orderByRaw('count desc')
            ->first();

        $commentedArticle = !is_null($mostCommentedArticle)
            ? ['code' => $mostCommentedArticle->code, 'title' => $mostCommentedArticle->title]
            : null;

        return view('statistics', compact('articlesCount', 'newsCount', 'mostActiveUserName', 'longArticle', 'shortArticle', 'avgCountOfArticlesUsers', 'changedArticle', 'commentedArticle'));
    }
}
