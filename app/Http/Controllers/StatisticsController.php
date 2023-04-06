<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\TheNew;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class StatisticsController extends Controller
{
    public function __invoke()
    {
        $articlesCount = Article::where('published', true)->count();

        $newsCount = TheNew::count();

        $userNameWithMostArticles = DB::table('users')
            ->join('articles', 'users.id', '=', 'articles.owner_id')
            ->select(DB::raw('count(articles.id) as articles_count, users.name'))
            ->groupBy('users.name')
            ->orderByRaw('articles_count desc')
            ->first();
        $mostActiveUserName = !is_null($userNameWithMostArticles) ? $userNameWithMostArticles->name : null;

        $lengthArticlesBody = DB::table('articles')->selectRaw('char_length(body) as len')
            ->orderByRaw('len desc')
            ->get();

        $maxArticleBody = $lengthArticlesBody[0]->len;
        $minArticleBody = $lengthArticlesBody[count($lengthArticlesBody) - 1]->len;

//        dd($maxArticleBody->len);

        return view('statistics', compact('articlesCount', 'newsCount', 'mostActiveUserName', 'maxArticleBody', 'minArticleBody'));
    }
}
